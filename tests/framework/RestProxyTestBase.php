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
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
 
namespace Tests\Framework;
use WindowsAzure\Common\Internal\Logger;
use WindowsAzure\Common\Internal\Serialization\XmlSerializer;
use WindowsAzure\Common\Configuration;

/**
 * Testbase for all REST proxy tests.
 *
 * @category  Microsoft
 * @package   Tests\Framework
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class RestProxyTestBase extends \PHPUnit_Framework_TestCase
{
    protected $config;
    protected $restProxy;
    protected $xmlSerializer;
    
    const NOT_SUPPORTED = 'The storage emulator doesn\'t support this API';
    
    protected function skipIfEmulated()
    {
        if (Configuration::isEmulated()) {
            $this->markTestSkipped(self::NOT_SUPPORTED);
        }
    }
    
    public function __construct($config, $serviceRestProxy)
    {
        $this->config = $config;
        $this->restProxy = $serviceRestProxy;
        $this->xmlSerializer = new XmlSerializer();
        Logger::setLogFile('C:\log.txt');
    }
    
    protected function onNotSuccessfulTest(\Exception $e)
    {
        parent::onNotSuccessfulTest($e);
        
        $this->tearDown();
        throw $e;
    }
}

?>
