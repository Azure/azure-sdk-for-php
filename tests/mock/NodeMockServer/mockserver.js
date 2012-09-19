/**
* Copyright (c) Microsoft.  All rights reserved.
*
* Licensed under the Apache License, Version 2.0 (the "License");
* you may not use this file except in compliance with the License.
* You may obtain a copy of the License at
*   http://www.apache.org/licenses/LICENSE-2.0
*
* Unless required by applicable law or agreed to in writing, software
* distributed under the License is distributed on an "AS IS" BASIS,
* WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
* See the License for the specific language governing permissions and
* limitations under the License.
*/

var http = require('http');
var https = require('https');
var fs = require('fs');
var url = require('url');
var net = require('net');

var sessionsRootPath = 'recordings';
var httpsPort = 7778;

exports.log = true;

if (!fs.existsSync) {
  fs.existsSync = require('path').existsSync;
}

if (!fs.existsSync(process.env.CLIENT_KEY)) {
  throw "CLIENT_KEY environment variable must point to a KEY file";
}
if (!fs.existsSync(process.env.CLIENT_CRT)) {
  throw "CLIENT_CRT environment variable must point to a CRT file";
}
var clientKey = fs.readFileSync(process.env.CLIENT_KEY);
var clientCert = fs.readFileSync(process.env.CLIENT_CRT);

function writeLog(msg) {
  if (exports.log) {
    console.log(msg);
  }
}

var driverFactory = {
  modes: {},
  create: function (proxy, session) {
    // call the factory method which matches the session.mode
    return this.modes[session.mode](proxy, session);
  }
};

var utils = {};

utils.buildRequestOptions = function (request, requestUrl, proxy) {
  var options = {
    host: proxy.host,
    port: proxy.port,
    method: request.method,
    path: requestUrl,
    headers: request.headers,
    key : clientKey,
    cert : clientCert
  };

  if (!proxy.host) {
    var u = url.parse(requestUrl);
    options.host = u.hostname;
    options.path = u.path;
    options.port = u.port;
    if (!u.port) {
      options.port = (u.protocol == 'https:') ? '443' : '80';
    }
  }

  return options;
};

utils.hostFromSocket = new Array();

utils.getHostFromSocket = function (socket) {
  for (var i = 0; i < utils.hostFromSocket.length; i++) {
    var cur = utils.hostFromSocket[i];
    if (cur.socket === socket) {
      return cur.host;
    }
  }
  return null;
}

utils.setHostForSocket = function (socket, host) {
  for (var i = 0; i < utils.hostFromSocket.length; i++) {
    var cur = utils.hostFromSocket[i];
    if (cur.socket === socket) {
      cur.host = host;
      return;
    }
  }
  utils.hostFromSocket.push({ socket: socket, host: host });
}

utils.processRequestUrl = function (request, forPlayback) {
    var requestUrl = request.url;
    var host = utils.getHostFromSocket(request.socket.socket);
    if (host !== null) {
        if (forPlayback) {
            host = 'playback' + host.substring(host.indexOf('.'));
        }
        requestUrl = 'https://' + host + ":443" + requestUrl;
    }
    return requestUrl;
}

utils.startsWithCapLetters = function (data, count) {
  if (data.length < count) return false;
  for (var i = 0; i < count; i++) {
    var datum = data[i];
    if (65 > datum || datum > 90) return false;
  }
  return true;
}

function makeTcpRequestHandler(server) {
  var requestHandlers = server.listeners("request");
  return function (socket) {
    var dataListeners = socket.listeners('data');
    socket.removeAllListeners('data');
    socket.addListener("data", function (data) {
      // This is an HTTPS port, so everything should be encrypted
      // except for HTTP requests.
      if (utils.startsWithCapLetters(data, 3)) {
        // Appears to be an unemcrypted stream. Most likely HTTP request.
        var verb = data.toString().split(" ")[0];
        var host = data.toString().split(" ")[1].split(":")[0];
        var restOfMessage = data.toString().split("\r\n").slice(1).join("\r\n");
        writeLog("Got HTTP " + verb + " message for " + host);
        if (verb == 'CONNECT') {
          utils.setHostForSocket(socket, host);
          var srvUrl = url.parse('http://' + host + ":443");
          // connect to an origin server
          var srvSocket = net.connect(srvUrl.port, srvUrl.hostname);
          srvSocket.write(data);
          srvSocket.pipe(socket);
          socket.write('HTTP/1.1 200 Connection Established\r\n' +
                        'Proxy-agent: mockserver\r\n' +
                        '\r\n');
          socket.pipe(srvSocket);
        } else {
          // Plain HTTP verb
          var srvUrl = url.parse('http://' + host);
          // TODO: Figure out how to pipe this request into the Request pipeline.
        }
      } else {
        // Reuse the original listeners
        for (i in dataListeners) {
          dataListeners[i](data);
        }
      }
    });
  }
}

function driverToServer(record) {
  return function (proxy, session) {
    var sessionPath = sessionsRootPath + '/' + session.name;
    if (record) {
      if (!fs.existsSync(sessionsRootPath)) {
        fs.mkdirSync(sessionsRootPath, 0755);
      }
      if (!fs.existsSync(sessionPath)) {
        fs.mkdirSync(sessionPath, 0755);
      }

      // files.create returns a worker which creates .dat files the first time .write is called
      var files = { count: 0 };
      files.create = function (entry, entryProperty) {
        var file = {};
        var stream = null;
        file.write = function (chunk) {
          if (stream == null) {
            files.count = files.count + 1;
            var name = 'x' + files.count + '.dat';
            entry[entryProperty] = name;
            stream = fs.createWriteStream(sessionPath + '/' + name);
            writeLog('    ' + entryProperty + ' ' + name);
          }
          stream.write(chunk);
        };
        file.end = function () {
          if (stream != null) {
            stream.end();
          }
        };

        return file;
      };
    }

    var records = [];
    var driver = {};
    driver.call = function (request, response) {
      var requestUrl = utils.processRequestUrl(request);
      var entry = {
        requestMethod: request.method,
        requestUrl: requestUrl,
        requestHeaders: request.headers
      };
      records.push(entry);

      if (record) {
        var requestFile = files.create(entry, "requestFile");
        var responseFile = files.create(entry, "responseFile");
      }

      writeLog('  REQUEST: ' + request.method + ' ' + requestUrl);
      var options = utils.buildRequestOptions(request, requestUrl, proxy);

      var requestStart = new Date();
      var protocolType = https;
      if (proxy.host) {
        protocolType = http;
      } else {
        options.agent = new https.Agent(options);
      }
      var proxyRequest = protocolType.request(options, function (proxyResponse) {
        var responseFileContent = '';
        var requestStop = new Date();

        entry.responseStatusCode = proxyResponse.statusCode;
        entry.responseHeaders = proxyResponse.headers;

        writeLog("    STATUS: " + proxyResponse.statusCode + ' ' + (requestStop.getTime() - requestStart.getTime()) + 'ms');

        proxyResponse.on('data', function (chunk) {
          writeLog('      >proxy_response.on data');
          responseFileContent += chunk;

          if (!response.write(chunk, 'binary')) {
            writeLog('      >proxy_response.pause()');
            proxyResponse.pause();
          }
        });
        response.on('drain', function () {
          writeLog('      >response.on drain');
          proxyResponse.resume();
        });
        proxyResponse.on('end', function () {
          writeLog('      >proxy_response.on end');

          if (responseFileContent) {
            // normalize line feeds by always using carriage return + line feeds on recording
            responseFileContent = responseFileContent.replace(/\n/g, '\r\n');

            if (record) {
              responseFile.write(responseFileContent);
              responseFile.end();
            }
          }

          response.end();
        });

        proxyResponse.on('error', function (err) {
          writeLog('      >proxy_response.on error ' + err);
        });

        response.writeHead(proxyResponse.statusCode, proxyResponse.headers);
      });

      request.on('data', function (chunk) {
        writeLog('      >request.on data');
        if (record) {
          requestFile.write(chunk);
        }
        if (!proxyRequest.write(chunk, 'binary')) {
          request.pause();
        }
      });
      proxyRequest.on('drain', function () {
        request.resume();
      });
      request.on('end', function () {
        writeLog('      >request.on end');
        if (record) {
          requestFile.end();
        }
        proxyRequest.end();
      });

      request.on('error', function (err) {
        writeLog('      >request.on error ' + err);
      });
      response.on('error', function (err) {
        writeLog('      >response.on error ' + err);
      });
      proxyRequest.on('error', function (err) {
        writeLog('      >proxy_request.on error ' + err);
        entry.used = true; // prevent use in playback
        response.end();
      });
    };
    driver.close = function () {
      // Update records for storing
      for (var i in records) {
        // strip request authorization header
        delete records[i].requestHeaders['authorization'];

        // Strip request host header
        delete records[i].requestHeaders['host'];

        if (records[i].responseHeaders) {
          // Strip response location header
          delete records[i].responseHeaders['location'];
        }

        // Strip account from url and replace by "playback" account
        var u = url.parse(records[i].requestUrl);
        u.hostname = 'playback' + u.hostname.substring(u.hostname.indexOf('.'));
        u.host = u.hostname + ':' + u.port;
        delete u.href;
        records[i].requestUrl = url.format(u);
      }

      if (record) {
        fs.writeFile(sessionPath + '/index.json', JSON.stringify(records), function (err) {
          if (err) throw err;
          writeLog('  Saved ' + sessionPath + '/index.json');
        });
      }
    };

    return driver;
  };
};

// session.mode 'neutral' allows requests to pass through to actual proxy
driverFactory.modes.neutral = driverToServer(false);

// session.mode 'recording' saves all request/response information to a session subdirectory
driverFactory.modes.recording = driverToServer(true);

driverFactory.modes.playback = function (proxy, session) {
  var sessionPath = sessionsRootPath + '/' + session.name;
  if (fs.existsSync(sessionPath + '/index.json')) {

    var records = JSON.parse(fs.readFileSync(sessionPath + '/index.json'));
    var driver = {};
    driver.call = function (request, response) {
      var requestUrl = utils.processRequestUrl(request, true);
      writeLog('  REQUEST: ' + request.method + ' ' + requestUrl);

      requestUrl = url.format(url.parse(requestUrl));

      var entry = null;
      for (var k in records) {
        var match = records[k];
        if (match.used) {
          continue;
        }

        if (request.method != match.requestMethod ||
          requestUrl != match.requestUrl) {
          continue;
        }

        writeLog('    matched index ' + k);
        match.used = true;
        entry = match;
        break;
      }

      if (entry == null) {
        writeLog('    STATUS: 500 Unexpected Request');
        response.statusCode = 500;
        response.end('Unexpected request');
        return;
      }

      writeLog('    STATUS: ' + entry.responseStatusCode);

      response.statusCode = entry.responseStatusCode;
      for (k in entry.responseHeaders) {
        response.setHeader(k, entry.responseHeaders[k]);
      }

      if (!entry.responseFile) {
        response.end();
      }
      else {
        writeLog('    sending: ' + entry.responseFile);
        var responseFileContent = fs.readFileSync(sessionPath + '/' + entry.responseFile);
        // Make sure only the last line feed contains a carriage return
        if (responseFileContent) {
          responseFileContent = responseFileContent.toString().replace(/\r\n/g, '\n');

          if (responseFileContent[responseFileContent.length - 1] === '\n') {
            responseFileContent[responseFileContent.length - 1] = '\r';
            responseFileContent += '\n';
          }

          response.write(responseFileContent);
          response.end();
        }
      }
    };
    driver.close = function () { };
  }
  else {
    var driver = {};
    driver.call = function (request, response) {
      writeLog('  REQUEST: ' + request.method + ' ' + requestUrl);

      writeLog('    STATUS: 500 Unexpected Request');
      response.statusCode = 500;
      response.end('Unexpected request');
    };

    driver.close = function () { };
  }

  return driver;
};

// factory method for the service context
function mockProxy(host, port) {
  // this state is GET or PUT on the https://localhost:httpsPort/proxy url
  // a test framework is expected to PUT this value to correct proxy if needed
  var proxy = { host: host, port: port };

  // this state is GET, PUT, or DELETE on the https://localhost:httpsPort/session url
  // a test framework is expected to PUT before and DELETE after each test
  // valid modes include 'neutral', 'recording', and 'playback'
  var session = { mode: 'neutral', name: '' };

  // this is the current driver, it's updated when the /session state is altered
  var driver = driverFactory.create(proxy, session);

  return function (request, response) {
    var u = url.parse(request.url, true);
    var isLocal = 
        (request.headers.host == 'localhost:' + httpsPort) || 
        (u.host == 'localhost:' + httpsPort);
    if (!isLocal) {
      driver.call(request, response);
      return;
    }

    writeLog("CONTROL: " + request.method + ' ' + u.pathname);
    response.setHeader('Content-Type', 'text/plain');
    if (u.pathname == '/') {
      response.setHeader('Content-Type', 'text/html');
      response.end(fs.readFileSync("index.html"));
    }
    else if (u.pathname == '/proxy') {
      if (request.method == "GET") {
        response.end(JSON.stringify(proxy));
      }
      else if (request.method == "PUT") {
        var data = '';
        request.on('data', function (chunk) {
          data += chunk;
        });
        request.on('end', function () {
          writeLog("  " + data);
          var put = JSON.parse(data);
          proxy.host = put.host;
          proxy.port = put.port;
          response.end();
        });
      }
      else {
        response.end();
      }
    }
    else if (u.pathname == '/session') {
      if (request.method == "GET") {
        response.end(JSON.stringify(session));
      }
      else if (request.method == "PUT") {
        var data = '';
        request.on('data', function (chunk) {
          data += chunk;
        });
        request.on('end', function () {
          writeLog("  " + data);
          var put = JSON.parse(data);
          session = { mode: put.mode, name: put.name };
          driver.close();
          driver = driverFactory.create(proxy, session);
          response.end();
        });
      }
      else if (request.method == "DELETE") {
        driver.close();
        session = { mode: 'neutral', name: '' };
        driver = driverFactory.create(proxy, session);
        response.end();
      }
      else {
        response.end();
      }
    }
    else if (u.pathname == '/sessions') {
      var sessions = fs.readdirSync(sessionsRootPath);
      response.setHeader('Content-Type', 'text/html');
      response.write('<ul>');
      for (k in sessions) {
        response.write('<li><a href="sessions/');
        response.write(sessions[k]);
        response.write('">');
        response.write(sessions[k]);
        response.write('</a></li>');
      }
      response.write('</ul>');
      response.end();
    }
    else if (u.pathname.indexOf('/sessions/') == 0) {
      var records = JSON.parse(fs.readFileSync(sessionsRootPath + '/' + u.pathname.split('/')[2] + '/index.json'));
      response.setHeader('Content-Type', 'text/html');
      response.write('<ul>');
      for (var k in records) {
        response.write('<li>');
        response.write(records[k].requestMethod);
        response.write(' ');
        response.write(records[k].requestUrl);
        response.write('</li>');
      }

      response.write('</ul>');
      response.end();
    }
    else {
      response.statusCode = 404;
      response.write('404 Huh?');
      response.end();
    }
  };
};

var options = {
  key : clientKey, 
  cert: clientCert
};
var server = https.createServer(options, mockProxy(null, null));
server.on('connection', makeTcpRequestHandler(server));
server.listen(httpsPort);
writeLog('Proxy server started on [http|https]://localhost:' + httpsPort);
