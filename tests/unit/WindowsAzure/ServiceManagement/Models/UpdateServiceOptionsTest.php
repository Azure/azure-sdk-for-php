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

use WindowsAzure\ServiceManagement\Models\UpdateServiceOptions;

/**
 * Unit tests for class UpdateServiceOptions.
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
class UpdateServiceOptionsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \WindowsAzure\ServiceManagement\Models\UpdateServiceOptions::setDescription
     * @covers \WindowsAzure\ServiceManagement\Models\UpdateServiceOptions::getDescription
     */
    public function testSetDescription()
    {
        // Setup
        $options = new UpdateServiceOptions();
        $expected = 'Description';

        // Test
        $options->setDescription($expected);

        // Assert
        $this->assertEquals($expected, $options->getDescription());
    }

    /**
     * @covers \WindowsAzure\ServiceManagement\Models\UpdateServiceOptions::setLabel
     * @covers \WindowsAzure\ServiceManagement\Models\UpdateServiceOptions::getLabel
     */
    public function testSetLabel()
    {
        // Setup
        $options = new UpdateServiceOptions();
        $expected = 'Label';

        // Test
        $options->setLabel($expected);

        // Assert
        $this->assertEquals($expected, $options->getLabel());
    }
}
