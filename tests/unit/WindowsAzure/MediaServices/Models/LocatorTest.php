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

use WindowsAzure\MediaServices\Models\Locator;

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
class LocatorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \WindowsAzure\MediaServices\Models\Locator::__construct
     */
    public function test__construct()
    {

        // Setup
        $assetId = 'uifygid75';
        $accessId = 'ljhsdfl45';
        $type = Locator::TYPE_NONE;

        // Test
        $result = new Locator($assetId, $accessId, $type);

        // Assert
        $this->assertEquals($assetId, $result->getAssetId());
        $this->assertEquals($accessId, $result->getAccessPolicyId());
        $this->assertEquals($type, $result->getType());
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\Locator::getStartTime
     * @covers \WindowsAzure\MediaServices\Models\Locator::setStartTime
     */
    public function testGetStartTime()
    {

        // Setup
        $assetId = 'uifygid75';
        $accessId = 'ljhsdfl45';
        $type = Locator::TYPE_NONE;
        $locator = new Locator($assetId, $accessId, $type);
        $start = new \Datetime('2013-11-14');
        $locator->setStartTime($start);

        // Test
        $actual = $locator->getStartTime();

        // Assert
        $this->assertEquals($start->getTimestamp(), $actual->getTimestamp());
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\Locator::getAssetId
     */
    public function testGetAssetId()
    {

        // Setup
        $assetId = 'uifygid75';
        $accessId = 'ljhsdfl45';
        $type = Locator::TYPE_NONE;
        $locator = new Locator($assetId, $accessId, $type);

        // Test
        $actual = $locator->getAssetId();

        // Assert
        $this->assertEquals($assetId, $actual);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\Locator::getAccessPolicyId
     */
    public function testGetAccessPolicyId()
    {

        // Setup
        $assetId = 'uifygid75';
        $accessId = 'ljhsdfl45';
        $type = Locator::TYPE_NONE;
        $locator = new Locator($assetId, $accessId, $type);

        // Test
        $actual = $locator->getAccessPolicyId();

        // Assert
        $this->assertEquals($accessId, $actual);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\Locator::getContentAccessComponent
     */
    public function testGetContentAccessComponent()
    {

        // Setup
        $locatorArray = [
            'Type' => Locator::TYPE_NONE,
            'ContentAccessComponent' => 'AccessComponent',
            'AccessPolicyId' => 'ljhsdfl45',
            'AssetId' => 'uifygid75',
        ];
        $result = Locator::createFromOptions($locatorArray);

        // Test
        $result = $result->getContentAccessComponent();

        // Assert
        $this->assertEquals($locatorArray['ContentAccessComponent'], $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\Locator::getBaseUri
     */
    public function testGetBaseUri()
    {

       // Setup
        $locatorArray = [
            'Type' => Locator::TYPE_NONE,
            'BaseUri' => 'http://someurl.com/uysfdu56y',
            'AccessPolicyId' => 'ljhsdfl45',
            'AssetId' => 'uifygid75',
        ];
        $result = Locator::createFromOptions($locatorArray);

        // Test
        $result = $result->getBaseUri();

        // Assert
        $this->assertEquals($locatorArray['BaseUri'], $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\Locator::getPath
     */
    public function testGetPath()
    {

        // Setup
        $locatorArray = [
            'Type' => Locator::TYPE_NONE,
            'Path' => 'http://someurl.com/uysfdu56y',
            'AccessPolicyId' => 'ljhsdfl45',
            'AssetId' => 'uifygid75',
        ];
        $result = Locator::createFromOptions($locatorArray);

        // Test
        $result = $result->getPath();

        // Assert
        $this->assertEquals($locatorArray['Path'], $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\Locator::getType
     * @covers \WindowsAzure\MediaServices\Models\Locator::setType
     */
    public function testGetType()
    {

        // Setup
        $assetId = 'uifygid75';
        $accessId = 'ljhsdfl45';
        $type = Locator::TYPE_NONE;
        $locator = new Locator($assetId, $accessId, Locator::TYPE_NONE);
        $type = Locator::TYPE_SAS;
        $locator->setType($type);

        // Test
        $actual = $locator->getType();

        // Assert
        $this->assertEquals($type, $actual);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\Locator::getExpirationDateTime
     * @covers \WindowsAzure\MediaServices\Models\Locator::setExpirationDateTime
     */
    public function testGetExpirationDateTime()
    {

        // Setup
        $assetId = 'uifygid75';
        $accessId = 'ljhsdfl45';
        $type = Locator::TYPE_NONE;
        $locator = new Locator($assetId, $accessId, Locator::TYPE_NONE);
        $date = new \Datetime('2013-12-30');
        $locator->setExpirationDateTime($date);

        // Test
        $actual = $locator->getExpirationDateTime();

        // Assert
        $this->assertEquals($date->getTimestamp(), $actual->getTimestamp());
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\Locator::getName
     * @covers \WindowsAzure\MediaServices\Models\Locator::setName
     */
    public function testGetName()
    {

        // Setup
        $assetId = 'uifygid75';
        $accessId = 'ljhsdfl45';
        $type = Locator::TYPE_NONE;
        $locator = new Locator($assetId, $accessId, $type);
        $name = 'nameName';
        $locator->setName($name);

        // Test
        $actual = $locator->getName();

        // Assert
        $this->assertEquals($name, $actual);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\Locator::getId
     * @covers \WindowsAzure\MediaServices\Models\Locator::setId
     */
    public function testGetId()
    {

        // Setup
        $assetId = 'uifygid75';
        $accessId = 'ljhsdfl45';
        $type = Locator::TYPE_NONE;
        $locator = new Locator($assetId, $accessId, $type);
        $id = 'NameID';
        $locator->setId($id);

        // Test
        $actual = $locator->getId();

        // Assert
        $this->assertEquals($id, $actual);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\Locator::createFromOptions
     * @covers \WindowsAzure\MediaServices\Models\Locator::fromArray
     */
    public function testLocatorFromOptions()
    {

        // Setup
        $locatorArray = [
            'Id' => 'kjshfs89',
            'Name' => 'newLocator',
            'ExpirationDateTime' => '2013-11-30',
            'Type' => Locator::TYPE_NONE,
            'Path' => 'http://someurl.com/gdkf76r',
            'BaseUri' => 'http://someurl.com/uysfdu56y',
            'ContentAccessComponent' => 'AccessComponent',
            'AccessPolicyId' => 'uifygid75',
            'AssetId' => 'ljhsdfl45',
            'StartTime' => '2013-11-19',
        ];
        $expiration = new \Datetime($locatorArray['ExpirationDateTime']);
        $start = new \Datetime($locatorArray['StartTime']);

        // Test
        $resultLocator = Locator::createFromOptions($locatorArray);

        // Assert
        $this->assertEquals($locatorArray['Id'], $resultLocator->getId());
        $this->assertEquals($locatorArray['Name'], $resultLocator->getName());
        $this->assertEquals($expiration->getTimestamp(), $resultLocator->getExpirationDateTime()->getTimestamp());
        $this->assertEquals($locatorArray['Type'], $resultLocator->getType());
        $this->assertEquals($locatorArray['Path'], $resultLocator->getPath());
        $this->assertEquals($locatorArray['BaseUri'], $resultLocator->getBaseUri());
        $this->assertEquals($locatorArray['ContentAccessComponent'], $resultLocator->getContentAccessComponent());
        $this->assertEquals($locatorArray['AccessPolicyId'], $resultLocator->getAccessPolicyId());
        $this->assertEquals($locatorArray['AssetId'], $resultLocator->getAssetId());
        $this->assertEquals($start->getTimestamp(), $resultLocator->getStartTime()->getTimestamp());
    }
}
