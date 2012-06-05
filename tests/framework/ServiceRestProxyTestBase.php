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
use WindowsAzure\Common\Configuration;
use Tests\Framework\TestResources;
use WindowsAzure\Common\Models\ServiceProperties;
use WindowsAzure\Common\Internal\Serialization\XmlSerializer;

/**
 * TestBase class for Storage Services test classes.
 *
 * @category  Microsoft
 * @package   Tests\Framework
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class ServiceRestProxyTestBase extends RestProxyTestBase
{
    protected $propertiesChanged;
    protected $defaultProperties;
    
    public static function setUpBeforeClass()
    {
        $storageKey = TestResources::accountKey();
        $storageName = TestResources::accountName();
        
        if (empty($storageKey)) {
            throw new \Exception('AZURE_STORAGE_KEY envionment variable is missing');
        }
        
        if (empty($storageName)) {
            throw new \Exception('AZURE_STORAGE_ACCOUNT envionment variable is missing');
        }
    }
    
    private function _createDefaultProperties()
    {
        $this->propertiesChanged = false;
        $propertiesArray = array();
        $propertiesArray['Logging']['Version'] = '1.0';
        $propertiesArray['Logging']['Delete'] = 'false';
        $propertiesArray['Logging']['Read'] = 'false';
        $propertiesArray['Logging']['Write'] = 'false';
        $propertiesArray['Logging']['RetentionPolicy']['Enabled'] = 'false';
        $propertiesArray['Metrics']['Version'] = '1.0';
        $propertiesArray['Metrics']['Enabled'] = 'false';
        $propertiesArray['Metrics']['IncludeAPIs'] = 'false';
        $propertiesArray['Metrics']['RetentionPolicy']['Enabled'] = 'false';
        $this->defaultProperties = ServiceProperties::create($propertiesArray);
    }
    
    public function __construct($config, $serviceRestProxy)
    {
        parent::__construct($config, $serviceRestProxy);
        $this->_createDefaultProperties();
    }
    
    public function setServiceProperties($properties, $options = null)
    {
        $this->restProxy->setServiceProperties($properties, $options);
        $this->propertiesChanged = true;
    }

    protected function tearDown()
    {
        parent::tearDown();
        
        if ($this->propertiesChanged) {
            $this->restProxy->setServiceProperties($this->defaultProperties);
        }
    }
}

?>
