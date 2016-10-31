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

use WindowsAzure\ServiceManagement\Models\Location;

/**
 * Unit tests for class Location.
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
class LocationTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \WindowsAzure\ServiceManagement\Models\Location::setName
     * @covers \WindowsAzure\ServiceManagement\Models\Location::getName
     */
    public function testSetName()
    {
        // Setup
        $Location = new Location();
        $expected = 'Name';

        // Test
        $Location->setName($expected);

        // Assert
        $this->assertEquals($expected, $Location->getName());
    }

    /**
     * @covers \WindowsAzure\ServiceManagement\Models\Location::setDisplayName
     * @covers \WindowsAzure\ServiceManagement\Models\Location::getDisplayName
     */
    public function testSetDisplayName()
    {
        // Setup
        $Location = new Location();
        $expected = 'DisplayName';

        // Test
        $Location->setDisplayName($expected);

        // Assert
        $this->assertEquals($expected, $Location->getDisplayName());
    }
}
