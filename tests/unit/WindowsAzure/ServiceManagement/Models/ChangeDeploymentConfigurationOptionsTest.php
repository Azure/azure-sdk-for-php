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

namespace Tests\unit\WindowsAzure\ServiceManagement\Models;

use WindowsAzure\ServiceManagement\Models\ChangeDeploymentConfigurationOptions;

/**
 * Unit tests for class ChangeDeploymentConfigurationOptions.
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
class ChangeDeploymentConfigurationOptionsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \WindowsAzure\ServiceManagement\Models\ChangeDeploymentConfigurationOptions::setTreatWarningsAsErrors
     * @covers \WindowsAzure\ServiceManagement\Models\ChangeDeploymentConfigurationOptions::getTreatWarningsAsErrors
     * @covers \WindowsAzure\ServiceManagement\Models\ChangeDeploymentConfigurationOptions::__construct
     */
    public function testSetTreatWarningsAsErrors()
    {
        // Setup
        $expected = true;
        $options = new ChangeDeploymentConfigurationOptions();

        // Test
        $options->setTreatWarningsAsErrors($expected);

        // Assert
        $this->assertEquals($expected, $options->getTreatWarningsAsErrors());
    }

    /**
     * @covers \WindowsAzure\ServiceManagement\Models\ChangeDeploymentConfigurationOptions::setMode
     * @covers \WindowsAzure\ServiceManagement\Models\ChangeDeploymentConfigurationOptions::getMode
     * @covers \WindowsAzure\ServiceManagement\Models\ChangeDeploymentConfigurationOptions::__construct
     */
    public function testSetMode()
    {
        // Setup
        $expected = 'Auto';
        $options = new ChangeDeploymentConfigurationOptions();

        // Test
        $options->setMode($expected);

        // Assert
        $this->assertEquals($expected, $options->getMode());
    }
}
