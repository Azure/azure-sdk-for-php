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
use WindowsAzure\MediaServices\Models\Asset;

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

class AssetTest extends \PHPUnit_Framework_TestCase
{
     /**
      * @covers WindowsAzure\MediaServices\Models\Asset::__construct
      */
    public function test__construct(){

        // Setup
        $option = 0;


        // Test
        $result = new Asset(0);

        // Assert
        $this->assertEquals($option, $result->getOptions());
    }

      /**
     * @covers WindowsAzure\MediaServices\Models\Asset::getStorageAccountName
     * @covers WindowsAzure\MediaServices\Models\Asset::setStorageAccountName
     */
    public function testGetStorageAccountName(){

        // Setup
        $sample = new Asset(0);
        $name = 'StorageName';
        $sample->setStorageAccountName($name);

        // Test
        $actual = $sample->getStorageAccountName();

        // Assert
        $this-> assertEquals($name, $actual);
    }

    /**
     * @covers WindowsAzure\MediaServices\Models\Asset::getStorageAccount
     */
    public function testGetStorageAccount(){

        // Setup
        $sample = new Asset(0);

        // Test
        $actual = $sample->getStorageAccount();

        // Assert
        $this-> assertNull($actual);
    }

    /**
     * @covers WindowsAzure\MediaServices\Models\Asset::getParentAssets
     * @covers WindowsAzure\MediaServices\Models\Asset::setParentAssets
     */
    public function testGetParentAssets(){

        // Setup
        $sample = new Asset(0);
        $value = array(1,2.3,'name');
        $sample->setParentAssets($value);

        // Test
        $actual = $sample->getParentAssets();

        // Assert
        $this->assertEquals($value, $actual);
    }

    /**
     * @covers WindowsAzure\MediaServices\Models\Asset::getFiles
     */
    public function testGetFiles(){

        // Setup
        $sample = new Asset(0);

        // Test
        $actual = $sample->getFiles();

        // Assert
        $this-> assertNull($actual);
    }

    /**
     * @covers WindowsAzure\MediaServices\Models\Asset::getLocators
     */
    public function testGetLocators(){

        // Setup
        $sample = new Asset(0);

        // Test
        $actual = $sample->getLocators();

        // Assert
        $this-> assertNull($actual);
    }

    /**
     * @covers WindowsAzure\MediaServices\Models\Asset::getUri
     */
    public function testGetUri(){

        // Setup
        $sample = new Asset(0);

        // Test
        $actual = $sample->getUri();

        // Assert
        $this-> assertNull($actual);
    }

    /**
     * @covers WindowsAzure\MediaServices\Models\Asset::getOptions
     * @covers WindowsAzure\MediaServices\Models\Asset::setOptions
     */
    public function testGetOptions(){

        // Setup
        $sample = new Asset(1);
        $option = 4;
        $sample->setOptions($option);

        // Test
        $actual = $sample->getOptions();

        // Assert
        $this->assertEquals($option, $actual);
    }

    /**
     * @covers WindowsAzure\MediaServices\Models\Asset::getName
     * @covers WindowsAzure\MediaServices\Models\Asset::setName
     */
    public function testGetName(){

        // Setup
        $sample = new Asset(0);
        $name = 'NewName';
        $sample->setName($name);

        // Test
        $actual = $sample->getName();

        // Assert
        $this->assertEquals($name, $actual);
    }

    /**
     * @covers WindowsAzure\MediaServices\Models\Asset::getAlternateId
     * @covers WindowsAzure\MediaServices\Models\Asset::setAlternateId
     */
    public function testGetAlternateId(){

        // Setup
        $sample = new Asset(0);
        $id = 'AlterID';
        $sample->setAlternateId($id);

        // Test
        $actual = $sample->getAlternateId();

        // Assert
        $this->assertEquals($id, $actual);
    }

    /**
     * @covers WindowsAzure\MediaServices\Models\Asset::getLastModified
     */
    public function testGetLastModified() {

        // Setup
        $value = new Asset(0);

        // Test
        $actual = $value->getLastModified();

        // Assert
        $this->assertNull($actual);
    }

    /**
     * @covers WindowsAzure\MediaServices\Models\Asset::getCreated
     */
    public function testGetCreated() {

        // Setup
        $value = new Asset(0);

        // Test
        $actual = $value->getCreated();

        // Assert
        $this->assertNull($actual);
    }

    /**
     * @covers WindowsAzure\MediaServices\Models\Asset::getState
     */
    public function testGetState() {

        // Setup
        $value = new Asset(0);

        // Test
        $actual = $value->getState();

        // Assert
        $this->assertNull($actual);
    }

    /**
     * @covers WindowsAzure\MediaServices\Models\Asset::getId
     */
    public function testGetId() {

        // Setup
        $value = new Asset(0);

        // Test
        $actual = $value->getId();

        // Assert
        $this->assertNull($actual);
    }

}