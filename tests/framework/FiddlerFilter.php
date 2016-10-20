<?php

/**
 * LICENSE: Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * http://www.apache.org/licenses/LICENSE-2.0.
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
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace Tests\framework;

use Psr\Http\Message\ResponseInterface;
use WindowsAzure\Common\Internal\Http\IHttpClient;
use WindowsAzure\Common\Internal\IServiceFilter;

class FiddlerFilter implements IServiceFilter
{
    protected $site = '127.0.0.1';
    protected $port = 8888;
    protected static $isChecked;
    protected static $isFiddlerOn;

    public function __construct()
    {
        if (!self::$isChecked) {
            set_error_handler(['Tests\Framework\FiddlerFilter', 'errorHandler']);
            self::$isChecked = true;
            self::$isFiddlerOn = false;
            try {
                $fp = fsockopen($this->site, $this->port);
                self::$isFiddlerOn = !(!$fp);
                if (self::$isFiddlerOn) {
                    fclose($fp);
                }
            } catch (\Exception $e) {
            }
            restore_error_handler();
        }
    }

    public function handleRequest(IHttpClient $request)
    {
        if (self::$isFiddlerOn) {
            $request->setConfig('proxy_host', $this->site);
            $request->setConfig('proxy_port', $this->port);
        }

        return $request;
    }

    public function handleResponse(IHttpClient $request, ResponseInterface $response)
    {
        return $response;
    }

    public static function errorHandler($errno, $errorMessage, $errorFile, $errorLine)
    {
        return $errno == E_WARNING ? true : false;
    }
}
