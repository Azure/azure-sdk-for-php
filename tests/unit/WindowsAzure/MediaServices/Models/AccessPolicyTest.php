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
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace Tests\unit\WindowsAzure\MediaServices\Models;

use WindowsAzure\MediaServices\Models\AccessPolicy;

/**
 * Represents access policy object used in media services.
 *
 * @category  Microsoft
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @version   Release: 0.5.0_2016-11
 *
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class AccessPolicyTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \WindowsAzure\MediaServices\Models\AccessPolicy::__construct
     */
    public function test__construct()
    {

        // Setup
        $name = 'Name';

        // Test
        $result = new AccessPolicy($name);

        // Assert
        $this->assertEquals($name, $result->getName());
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\AccessPolicy::getPermissions
     * @covers \WindowsAzure\MediaServices\Models\AccessPolicy::setPermissions
     */
    public function testGetPermissions()
    {

        // Setup
        $name = 'newName';
        $value = new AccessPolicy($name);
        $expected = AccessPolicy::PERMISSIONS_READ;
        $value->setPermissions($expected);

        // Test
        $actual = $value->getPermissions();

        // Assert
        $this->assertEquals($expected, $actual);
    }

       /**
        * @covers \WindowsAzure\MediaServices\Models\AccessPolicy::getDurationInMinutes
        * @covers \WindowsAzure\MediaServices\Models\AccessPolicy::setDurationInMinutes
        */
       public function testGetDurationInMinutes()
       {

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
     * @covers \WindowsAzure\MediaServices\Models\AccessPolicy::setName
     * @covers \WindowsAzure\MediaServices\Models\AccessPolicy::getName
     */
    public function testGetName()
    {
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
     * @covers \WindowsAzure\MediaServices\Models\AccessPolicy::getLastModified
     */
    public function testGetLastModified()
    {

        // Setup
        $accessPolicyArray = [
            'Name' => 'newName',
            'LastModified' => '2013-11-21',
        ];
        $modified = new \Datetime($accessPolicyArray['LastModified']);
        $value = AccessPolicy::createFromOptions($accessPolicyArray);

        // Test
        $actual = $value->getLastModified();

        // Assert
        $this->assertEquals($modified->getTimestamp(), $actual->getTimestamp());
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\AccessPolicy::getCreated
     */
    public function testGetCreated()
    {

        // Setup
        $accesPolicyArray = [
            'Name' => 'newName',
            'Created' => '2013-11-21',
        ];
        $created = new \Datetime($accesPolicyArray['Created']);
        $value = AccessPolicy::createFromOptions($accesPolicyArray);

        // Test
        $actual = $value->getCreated();

        // Assert
        $this->assertEquals($created->getTimestamp(), $actual->getTimestamp());
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\AccessPolicy::getId
     */
    public function testGetId()
    {

        // Setup
        $accesPolicyArray = [
            'Id' => 'hjgd67',
            'Name' => 'newName',
        ];
        $value = AccessPolicy::createFromOptions($accesPolicyArray);

        // Test
        $actual = $value->getId();

        // Assert
        $this->assertEquals($accesPolicyArray['Id'], $actual);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\AccessPolicy::createFromOptions
     * @covers \WindowsAzure\MediaServices\Models\AccessPolicy::fromArray
     */
    public function testAccessPolicyFromOptions()
    {

        // Setup
        $accessArray = [
            'Id' => '1',
            'Created' => '2013-11-19',
            'LastModified' => '2013-11-19',
            'Name' => 'newName',
            'DurationInMinutes' => 25,
            'Permissions' => AccessPolicy::PERMISSIONS_READ + AccessPolicy::PERMISSIONS_WRITE
                + AccessPolicy::PERMISSIONS_DELETE + AccessPolicy::PERMISSIONS_LIST,
        ];
        $created = new \Datetime($accessArray['Created']);
        $modified = new \Datetime($accessArray['LastModified']);

        // Test
        $resultAccess = AccessPolicy::createFromOptions($accessArray);

        // Assert
        $this->assertEquals($accessArray['Id'], $resultAccess->getId());
        $this->assertEquals($created->getTimestamp(), $resultAccess->getCreated()->getTimestamp());
        $this->assertEquals($modified->getTimestamp(), $resultAccess->getLastModified()->getTimestamp());
        $this->assertEquals($accessArray['Name'], $resultAccess->getName());
        $this->assertEquals($accessArray['DurationInMinutes'], $resultAccess->getDurationInMinutes());
        $this->assertEquals($accessArray['Permissions'], $resultAccess->getPermissions());
    }
}
