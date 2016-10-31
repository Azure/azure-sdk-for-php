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

use WindowsAzure\ServiceManagement\Models\GetDeploymentOptions;

/**
 * Unit tests for class GetDeploymentOptions.
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
class GetDeploymentOptionsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \WindowsAzure\ServiceManagement\Models\GetDeploymentOptions::setSlot
     * @covers \WindowsAzure\ServiceManagement\Models\GetDeploymentOptions::getSlot
     */
    public function testSetSlot()
    {
        // Setup
        $expected = 'production';
        $options = new GetDeploymentOptions();

        // Test
        $options->setSlot($expected);

        // Assert
        $this->assertEquals($expected, $options->getSlot());
    }

    /**
     * @covers \WindowsAzure\ServiceManagement\Models\GetDeploymentOptions::setDeploymentName
     * @covers \WindowsAzure\ServiceManagement\Models\GetDeploymentOptions::getDeploymentName
     */
    public function testSetDeploymentName()
    {
        // Setup
        $expected = 'my deployment';
        $options = new GetDeploymentOptions();

        // Test
        $options->setDeploymentName($expected);

        // Assert
        $this->assertEquals($expected, $options->getDeploymentName());
    }
}
