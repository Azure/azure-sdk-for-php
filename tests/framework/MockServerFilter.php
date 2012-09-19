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

class MockServerFilter extends ProxyFilterBase {
    protected static $site = '127.0.0.1';
    protected static $mockPort = 7778;
    protected static $isChecked = false;
    protected static $isProxyChecked = false;
    protected static $isMockOn = false;
    protected static $mockServerMode;
    
    public function __construct() {
        if (!self::$isChecked) {
            self::$isChecked = true;

            self::$mockServerMode = TestResources::mockServerMode();
            self::$isMockOn = !empty(self::$mockServerMode) &&
                    self::isLocalProxyPortAvailable(self::$site, self::$mockPort);
        }
    }

    public static function startRecording($recordingName) {
        if (self::$isMockOn) {
            $msg = '{"mode":"' . self::$mockServerMode . '","name":"' . $recordingName . '"}';
            self::rawMockSend('PUT', 'session', $msg);
        }
    }

    public static function stopRecording() {
        if (self::$isMockOn) {        
            self::rawMockSend('DELETE', 'session');
        }
    }

    private static function rawMockSend($verb, $path, $data = null) {
        $target   = 'ssl://' . self::$site . ':' . self::$mockPort;
        $message  = $verb . ' http://localhost/' . $path . ' HTTP/1.1' . "\r\n" .
                (is_null($data) ? '' : 'Content-Length: ' . strlen($data). "\r\n") .
                'Host: localhost:' . self::$mockPort . "\r\n\r\n" .
                (is_null($data) ? '' : $data . "\r\n\r\n");

        $fp = stream_socket_client($target, $errno, $errstr, 30);
        if ($fp) {
            fwrite($fp, $message);
            fclose($fp);
        }
    }
    
    public function handleRequest($request) {
        if (self::$isMockOn) {
            if (!self::$isProxyChecked) {
                self::$isProxyChecked = true;

                $proxyHost = $request->getConfig('proxy_host');
                $proxyPort = $request->getConfig('proxy_port');
                if (!empty($proxyHost) && !empty($proxyPort)) {
                    $msg  = '{"host":"' . $proxyHost . '","port":"' . $proxyPort . '"}';
                    self::rawMockSend('PUT', 'proxy', $msg);
                }
            }

            $request->setConfig('proxy_host', self::$site);
            $request->setConfig('proxy_port', self::$mockPort);
        }
        return $request;
    }
}
