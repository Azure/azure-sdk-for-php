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

abstract class ProxyFilterBase implements IServiceFilter {
    protected static function isLocalProxyPortAvailable($site, $port) {
        set_error_handler(array('Tests\Framework\ProxyFilterBase', 'errorHandler'));
        try {
            $fp = fsockopen($site, $port);
            if ($fp) {
                fclose($fp);
                return true;
            }
        } catch(\Exception $e) {
        }

        restore_error_handler();
        return false;
    }

    public function handleRequest($request) {
        // Expect derived classes to override this.
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


