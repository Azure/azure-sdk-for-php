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
use WindowsAzure\Common\Internal\Logger;
use WindowsAzure\Common\Internal\Serialization\XmlSerializer;
use WindowsAzure\Common\ServicesBuilder;

/**
 * Testbase for all REST proxy tests.
 *
 * @category  Microsoft
 * @package   Tests\Framework
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class RestProxyTestBase extends \PHPUnit_Framework_TestCase
{
    protected $restProxy;
    protected $xmlSerializer;
    protected $builder;
    
    public function __construct()
    {
        $this->xmlSerializer = new XmlSerializer();
        $this->builder = new ServicesBuilder();
        Logger::setLogFile('C:\log.txt');
    }
    
    public function setProxy($serviceRestProxy)
    {
        $this->restProxy = $serviceRestProxy;
    }
    
    protected function onNotSuccessfulTest(\Exception $e)
    {
        parent::onNotSuccessfulTest($e);
        
        $this->tearDown();
        throw $e;
    }
}


