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
 * @package   PEAR2\WindowsAzure
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
namespace Tests\Framework;
use PEAR2\WindowsAzure\Services\Core\Configuration;
use PEAR2\Tests\Framework\TestResources;
use PEAR2\WindowsAzure\Services\Core\Models\ServiceProperties;

/**
 * TestBase class for each unit test class.
 *
 * @category  Microsoft
 * @package   PEAR2\WindowsAzure
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class RestProxyTestBase extends \PHPUnit_Framework_TestCase
{
    protected $config;
    protected $propertiesChanged;
    protected $defaultProperties;
    protected $wrapper;
    
    const NOT_SUPPORTED = 'The storage emulator doesn\'t support this API';
    
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
    
    public function __construct($config, $serviceWrapper)
    {
        $this->config = $config;
        $this->wrapper = $serviceWrapper;
        $this->_createDefaultProperties();
    }
    
    public function setServiceProperties($properties, $options = null)
    {
        $this->wrapper->setServiceProperties($properties, $options);
        $this->propertiesChanged = true;
    }

    protected function tearDown()
    {
        if ($this->propertiesChanged) {
            $this->wrapper->setServiceProperties($this->defaultProperties);
        }
    }
    
    protected function onNotSuccessfulTest(\Exception $e)
    {
        $this->tearDown();
        throw $e;
    }
}

?>
