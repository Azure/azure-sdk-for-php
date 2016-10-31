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

use WindowsAzure\MediaServices\Models\StorageAccount;

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
class StorageAccountTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \WindowsAzure\MediaServices\Models\StorageAccount::createFromOptions
     * @covers \WindowsAzure\MediaServices\Models\StorageAccount::fromArray
     * @covers \WindowsAzure\MediaServices\Models\StorageAccount::__construct
     */
    public function testCreateFromArray()
    {
        // Setup
        $name = 'SomeName-42';
        $isDefault = true;
        $options = [
                'Name' => $name,
                'IsDefault' => $isDefault,
        ];

        // Test
        $storageAccount = StorageAccount::createFromOptions($options);

        // Assert
        $this->assertEquals($name, $storageAccount->getName());
        $this->assertEquals($isDefault, $storageAccount->getIsDefault());
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\StorageAccount::getName
     */
    public function testGetName()
    {
        // Setup
        $name = 'SomeName-42';
        $options = [
                'Name' => $name,
        ];
        $storageAccount = StorageAccount::createFromOptions($options);

        // Test
        $result = $storageAccount->getName();

        // Assert
        $this->assertEquals($name, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\StorageAccount::getIsDefault
     */
    public function testGetIsDefault()
    {
        // Setup
        $isDefault = true;
        $options = [
                'IsDefault' => $isDefault,
        ];
        $storageAccount = StorageAccount::createFromOptions($options);

        // Test
        $result = $storageAccount->getIsDefault();

        // Assert
        $this->assertEquals($isDefault, $result);
    }
}
