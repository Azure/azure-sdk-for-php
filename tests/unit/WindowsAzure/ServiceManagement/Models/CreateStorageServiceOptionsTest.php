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

namespace Tests\Unit\WindowsAzure\CreateServiceOptionsManagement\Models;

use WindowsAzure\ServiceManagement\Models\CreateServiceOptions;

/**
 * Unit tests for class CreateServiceOptions.
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
class CreateStorageServiceOptionsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \WindowsAzure\ServiceManagement\Models\CreateServiceOptions::setDescription
     * @covers \WindowsAzure\ServiceManagement\Models\CreateServiceOptions::getDescription
     */
    public function testSetDescription()
    {
        // Setup
        $options = new CreateServiceOptions();
        $expected = 'Description';

        // Test
        $options->setDescription($expected);

        // Assert
        $this->assertEquals($expected, $options->getDescription());
    }

    /**
     * @covers \WindowsAzure\ServiceManagement\Models\CreateServiceOptions::setLocation
     * @covers \WindowsAzure\ServiceManagement\Models\CreateServiceOptions::getLocation
     */
    public function testSetLocation()
    {
        // Setup
        $options = new CreateServiceOptions();
        $expected = 'Location';

        // Test
        $options->setLocation($expected);

        // Assert
        $this->assertEquals($expected, $options->getLocation());
    }

    /**
     * @covers \WindowsAzure\ServiceManagement\Models\CreateServiceOptions::setAffinityGroup
     * @covers \WindowsAzure\ServiceManagement\Models\CreateServiceOptions::getAffinityGroup
     */
    public function testSetAffinityGroup()
    {
        // Setup
        $options = new CreateServiceOptions();
        $expected = 'MyGroup';

        // Test
        $options->setAffinityGroup($expected);

        // Assert
        $this->assertEquals($expected, $options->getAffinityGroup());
    }
}
