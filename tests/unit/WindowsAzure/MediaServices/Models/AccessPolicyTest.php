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
 * @package   WindowsAzure\MediaServices\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace Tests\Unit\WindowsAzure\MediaServices\Models;
use WindowsAzure\MediaServices\Models\AccessPolicy;

/**
 * Represents access policy object used in media services
 *
 * @category  Microsoft
 * @package   WindowsAzure\MediaServices\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.3.1_2011-08
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

class AccessPolicyTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @covers WindowsAzure\MediaServices\Models\AccessPolicy::__construct
     */
    public function test__construct(){

        // Setup
        $name = 'Name';

        // Test
        $result = new AccessPolicy('Name');

        // Assert
        $this->assertNotNull($name, $result->getName());
    }

    /**
     * @covers WindowsAzure\MediaServices\Models\AccessPolicy::getPermissions
     * @covers WindowsAzure\MediaServices\Models\AccessPolicy::setPermissions
     */
    public function testGetPermissions() {

        // Setup
        $name = 'newName';
        $value = new AccessPolicy($name);
        $expected = 1;
        $value->setPermissions($expected);

        // Test
        $actual = $value->getPermissions();

        // Assert
        $this->assertEquals($expected, $actual);
    }

    /**
     * @covers WindowsAzure\MediaServices\Models\AccessPolicy::getDurationInMinutes
     * @covers WindowsAzure\MediaServices\Models\AccessPolicy::setDurationInMinutes
     */
       public function testGetDurationInMinutes(){

        // Setup
        $name = 'newName';
        $value = new AccessPolicy($name);
        $expected = 25.21;
        $value->setDurationInMinutes($expected);

        // Test
        $actual = $value->getDurationInMinutes();

        // Assert
        $this->assertEquals($expected, $actual);

    }

    /**
     * @covers WindowsAzure\MediaServices\Models\AccessPolicy::setName
     * @covers WindowsAzure\MediaServices\Models\AccessPolicy::getName
     */
    public function testGetName(){
        // Setup
        $name = 'newName';
        $value = new AccessPolicy($name);
        $expected = 'NameName';
        $value->setName($expected);

        // Test
        $actual = $value->getName();

        // Assert
        $this->assertEquals($expected, $actual);
    }

    /**
     * @covers WindowsAzure\MediaServices\Models\AccessPolicy::getLastModified
     */
    public function testGetLastModified() {

        // Setup
        $name = 'newName';
        $value = new AccessPolicy($name);

        // Test
        $actual = $value->getLastModified();

        // Assert
        $this->assertNull($actual);

    }

    /**
     * @covers WindowsAzure\MediaServices\Models\AccessPolicy::getCreated
     */
    public function testGetCreated() {

        // Setup
        $name = 'newName';
        $value = new AccessPolicy($name);

        // Test
        $actual = $value->getCreated();

        // Assert
        $this->assertNull($actual);
    }

    /**
     * @covers WindowsAzure\MediaServices\Models\AccessPolicy::getId
     */
    public function testGetId() {

        // Setup
        $name = 'newName';
        $value = new AccessPolicy($name);

        // Test
        $actual = $value->getId();

        // Assert
        $this->assertNull($actual);
    }
}
