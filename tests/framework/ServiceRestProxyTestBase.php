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

use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\Common\Models\ServiceProperties;

/**
 * TestBase class for Storage Services test classes.
 *
 * @category  Microsoft
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @version   Release: 0.5.0_2016-11
 *
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class ServiceRestProxyTestBase extends RestProxyTestBase
{
    protected $propertiesChanged;
    protected $defaultProperties;
    protected $connectionString;

    const NOT_SUPPORTED = 'The storage emulator doesn\'t support this API';
    const TAKE_TOO_LONG = 'This test takes long time, skip.';
    const SKIPPED_AFTER_SEVERAL_ATTEMPTS = 'Test skipped after several fails.';

    protected function skipIfEmulated()
    {
        if ($this->isEmulated()) {
            $this->markTestSkipped(self::NOT_SUPPORTED);
        }
    }

    protected function skipIfOSX()
    {
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'DAR') {
            $this->markTestSkipped('This test does not run on OS X at this time');
        }
    }

    protected function isEmulated()
    {
        return strpos($this->connectionString, Resources::USE_DEVELOPMENT_STORAGE_NAME) !== false;
    }

    public function __construct()
    {
        parent::__construct();
        $this->connectionString = TestResources::getWindowsAzureStorageServicesConnectionString();
    }

    public function setUp()
    {
        parent::setUp();
        $this->_createDefaultProperties();
    }

    private function _createDefaultProperties()
    {
        $this->propertiesChanged = false;
        $propertiesArray = [];
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
