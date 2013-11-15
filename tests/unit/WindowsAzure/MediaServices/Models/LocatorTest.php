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
use WindowsAzure\MediaServices\Models\Locator;

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

class LocatorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\MediaServices\Models\Locator::__construct
     */
    public function test__construct(){

        // Setup
        $sample = 1;

        // Test
        $result = new Locator($sample);

        // Assert
        $this->assertEquals($sample, $result->getType());
    }

    /**
     * @covers WindowsAzure\MediaServices\Models\Locator::getAsset
     */
    public function testGetAsset(){

        // Setup
        $sample = new Locator(1);

        // Test
        $actual = $sample->getAsset();

        // Assert
        $this->assertNull($actual);
    }

    /**
     * @covers WindowsAzure\MediaServices\Models\Locator::getAssetPolicy
     */
    public function testAssetPolicy(){

        // Setup
        $sample = new Locator(1);

        // Test
        $actual = $sample->getAssetPolicy();

        // Assert
        $this->assertNull($actual);
    }

    /**
     * @covers WindowsAzure\MediaServices\Models\Locator::getStartTime
     * @covers WindowsAzure\MediaServices\Models\Locator::setStartTime
     */
    public function testGetStartTime(){

        // Setup
        $sample = new Locator(1);
        $start = new \Datetime('2013-11-14');
        $sample->setStartTime($start);

        // Test
        $actual = $sample->getStartTime();

        // Assert
        $this->assertEquals($start, $actual);
    }

    /**
     * @covers WindowsAzure\MediaServices\Models\Locator::getAssetId
     */
    public function testGetAssetId(){

        // Setup
        $sample = new Locator(1);

        // Test
        $actual = $sample->getAssetId();

        // Assert
        $this->assertNull($actual);
    }

    /**
     * @covers WindowsAzure\MediaServices\Models\Locator::getAccessPolicyId
     */
    public function testGetAccessPolicyId(){

        // Setup
        $sample = new Locator(1);

        // Test
        $actual = $sample->getAccessPolicyId();

        // Assert
        $this->assertNull($actual);
    }

    /**
     * @covers WindowsAzure\MediaServices\Models\Locator::getContentAccessComponent
     */
    public function testGetContentAccessComponent(){

        // Setup
        $sample = new Locator(1);

        // Test
        $actual = $sample->getContentAccessComponent();

        // Assert
        $this->assertNull($actual);
    }

    /**
     * @covers WindowsAzure\MediaServices\Models\Locator::getBaseUri
     */
    public function testGetBaseUri(){

        // Setup
        $sample = new Locator(1);

        // Test
        $actual = $sample->getBaseUri();

        // Assert
        $this->assertNull($actual);
    }

    /**
     * @covers WindowsAzure\MediaServices\Models\Locator::getPath
     */
    public function testGetPath(){

        // Setup
        $sample = new Locator(1);

        // Test
        $actual = $sample->getPath();

        // Assert
        $this->assertNull($actual);
    }

    /**
     * @covers WindowsAzure\MediaServices\Models\Locator::getType
     * @covers WindowsAzure\MediaServices\Models\Locator::setType
     */
    public function testGetType(){

        // Setup
        $sample = new Locator(1);
        $type = 12;
        $sample->setType($type);

        // Test
        $actual = $sample->getType();

        // Assert
        $this->assertEquals($type, $actual);
    }

    /**
     * @covers WindowsAzure\MediaServices\Models\Locator::getExpirationDateTime
     * @covers WindowsAzure\MediaServices\Models\Locator::setExpirationDateTime
     */
    public function testGetExpirationDateTime(){

        // Setup
        $sample = new Locator(1);
        $date = new \Datetime('2013-12-30');
        $sample->setExpirationDateTime($date);

        // Test
        $actual = $sample->getExpirationDateTime();

        // Assert
        $this->assertEquals($date, $actual);
    }

    /**
     * @covers WindowsAzure\MediaServices\Models\Locator::getName
     * @covers WindowsAzure\MediaServices\Models\Locator::setName
     */
    public function testGetName(){

        // Setup
        $sample = new Locator(1);
        $name = 'nameName';
        $sample->setName($name);

        // Test
        $actual = $sample->getName();

        // Assert
        $this->assertEquals($name, $actual);
    }

    /**
     * @covers WindowsAzure\MediaServices\Models\Locator::getId
     * @covers WindowsAzure\MediaServices\Models\Locator::setId
     */
    public function testGetId(){

        // Setup
        $sample = new Locator(1);
        $id = 'NameID';
        $sample->setId($id);

        // Test
        $actual = $sample->getId();

        // Assert
        $this->assertEquals($id, $actual);
    }

}