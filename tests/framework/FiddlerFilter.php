<?php

/**
 * LICENSE: Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * 
 * PHP version 5
 *
 * @category  Microsoft
 * @package   Tests\Framework
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
 
namespace Tests\Framework;

use WindowsAzure\Common\Internal\IServiceFilter;

class FiddlerFilter implements IServiceFilter {
    protected static $site = '127.0.0.1';
    protected static $mockPortHttp = 7777;
    protected static $mockPortHttps = 7778;
    protected static $fiddlerPort = 8888;
    protected static $isChecked = false;
    protected static $isHttpMockOn = false;
    protected static $isHttpsMockOn = false;
    protected static $isFiddlerOn = false;
    protected static $mockServerMode;
    
    public function __construct() {
        if (!self::$isChecked) {
            set_error_handler(array('Tests\Framework\FiddlerFilter', 'errorHandler'));

            self::$isChecked = true;
            self::$isFiddlerOn = self::isLocalProxyPortAvailable(self::$fiddlerPort);

            self::$mockServerMode = TestResources::mockServerMode();
            if (!empty(self::$mockServerMode)) {
                self::$isHttpMockOn = self::isLocalProxyPortAvailable(self::$mockPortHttp);
                self::$isHttpsMockOn = self::isLocalProxyPortAvailable(self::$mockPortHttps);
            }

            if (self::$isFiddlerOn && self::$isHttpMockOn) {
                self::rawMockSend(self::$mockPortHttp,
                        'PUT', 'proxy', '{"host":"' . self::$site . '","port":"' . self::$fiddlerPort . '"}');
            }
            if (self::$isFiddlerOn && self::$isHttpsMockOn) {
                self::rawMockSend(self::$mockPortHttps,
                        'PUT', 'proxy', '{"host":"' . self::$site . '","port":"' . self::$fiddlerPort . '"}');
            }
            restore_error_handler();

        }
    }

    private static function isLocalProxyPortAvailable($port) {
        try {
            $fp = fsockopen(self::$site, $port);
            if ($fp) {
                fclose($fp);
                return true;
            }
        } catch(\Exception $e) {
        }
        return false;
    }

    public static function startRecording($recordingName) {
        self::startRecordingWorker(self::$isHttpMockOn, self::$mockPortHttp, $recordingName);
        self::startRecordingWorker(self::$isHttpsMockOn, self::$mockPortHttps, $recordingName);
    }

    public static function stopRecording() {
        self::stopRecordingWorker(self::$isHttpMockOn, self::$mockPortHttp);
        self::stopRecordingWorker(self::$isHttpsMockOn, self::$mockPortHttps);
    }

    private static function startRecordingWorker($isMockOn, $port, $recordingName) {
        if ($isMockOn && !empty(self::$mockServerMode)) {
            self::rawMockSend($port,
                    'PUT',
                    'session',
                    '{"mode":"' . self::$mockServerMode . '","name":"' . $recordingName . '"}');
        }
    }

    private static function stopRecordingWorker($isMockOn, $port) {
        if ($isMockOn && !empty(self::$mockServerMode)) {
            self::rawMockSend($port, 'DELETE', 'session');
        }
    }

    private static function rawMockSend($port, $verb, $path, $data = null) {
        $protocol = ($port == self::$mockPortHttp ? 'tcp://' : 'ssl://');
        $target   = $protocol . self::$site . ':' . $port;
        $message  = $verb . ' http://localhost/' . $path . ' HTTP/1.1' . "\r\n" .
                (is_null($data) ? '' : 'Content-Length: ' . strlen($data). "\r\n") .
                'Host: localhost:' . $port . "\r\n\r\n" .
                (is_null($data) ? '' : $data . "\r\n\r\n");

        $fp = stream_socket_client($target, $errno, $errstr, 30);
        if ($fp) {
            fwrite($fp, $message);
            fclose($fp);
        }
    }
    
    public function handleRequest($request) {
        if (self::$isFiddlerOn || self::$isHttpMockOn || self::$isHttpsMockOn) {
            $port = self::$fiddlerPort;
            $urlParts = explode(':', $request->getUrl()->getUrl());
            if ($urlParts[0] == 'http' && self::$isHttpMockOn) {
                $port = self::$mockPortHttp;
            }
            if ($urlParts[0] == 'https' && self::$isHttpsMockOn) {
                $port = self::$mockPortHttps;
            }
            $request->setConfig('proxy_host', self::$site);
            $request->setConfig('proxy_port', $port);
        }
        return $request;
    }

    public function handleResponse($request, $response) {
        return $response;
    }

    public static function errorHandler($errno, $errorMessage, $errorFile, $errorLine)
    {
        return ($errno == E_WARNING ? true : false);
    }
}


