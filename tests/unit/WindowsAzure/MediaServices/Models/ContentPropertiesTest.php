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
 * @package   Tests\Unit\WindowsAzure\MediaServices\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/WindowsAzure/azure-sdk-for-php
 */

namespace Tests\Unit\WindowsAzure\MediaServices\Models;
use WindowsAzure\MediaServices\Models\ContentProperties;
use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\MediaServices\Models\Asset;
/**
 * Unit tests for class ContentProperties
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\Common\Internal\Atom
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.4.0_2014-01
 * @link      https://github.com/WindowsAzure/azure-sdk-for-php
 */

class ContentPropertiesTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\MediaServices\Models\ContentProperties::__construct
     */
    public function test__construct(){

        // Setup

        // Test
        $prop = new ContentProperties();

        // Assert
        $this->assertNotNull($prop);
    }

    /**
     * @covers WindowsAzure\MediaServices\Models\ContentProperties::fromXml
     * @covers WindowsAzure\MediaServices\Models\ContentProperties::_fromXmlToArray
     * @covers WindowsAzure\MediaServices\Models\ContentProperties::getProperties
     */
    public function testFromXml(){

        // Setup
        $testString = 'testString';
        $nameKey = 'name';
        $objectKey = 'object';
        $xmlString = '<properties xmlns="' . Resources::DSM_XML_NAMESPACE . '" xmlns:d="' . Resources::DS_XML_NAMESPACE . '">
                       <d:' . $nameKey . '>' . $testString . '</d:' . $nameKey . '>
                       <d:' . $objectKey . '>
                         <d:element>
                           <d:' . $nameKey . '>' . $testString . '</d:' . $nameKey . '>
                         </d:element>
                       </d:' . $objectKey . '>
                      </properties>';
        $xml = simplexml_load_string($xmlString);
        $prop = new ContentProperties();

        // Test
        $prop->fromXml($xml);
        $result = $prop->getProperties();

        // Assert
        $this->assertEquals(2, count($result));
        $this->assertEquals($testString, $result[$nameKey]);

        $this->assertEquals(1, count($result[$objectKey]));
        $this->assertEquals(1, count($result[$objectKey][0]));
        $this->assertEquals($testString, $result[$objectKey][0][$nameKey]);
    }

    /**
     * @covers WindowsAzure\MediaServices\Models\ContentProperties::setPropertiesFromObject
     */
    public function testSetPropertiesFromObject(){

        // Setup
        $name = 'NameName';
        $nameKey = 'Name';
        $createdKey = 'Created';
        $optionsKey = 'Options';
        $option = Asset::OPTIONS_STORAGE_ENCRYPTED;
        $assetArray= array(
                $optionsKey          => $option,
                $createdKey          => '2013-11-21',
                $nameKey             => $name
        );
        $created = new \Datetime($assetArray[$createdKey]);
        $asset = Asset::createFromOptions($assetArray);
        $prop = new ContentProperties();

        // Test
        $prop->setPropertiesFromObject($asset);
        $result = $prop->getProperties();
        $createdFromResult = new \Datetime($result[$createdKey]);

        // Assert
        $this->assertEquals(3, count($result));
        $this->assertEquals($name, $result[$nameKey]);
        $this->assertEquals($option, $result[$optionsKey]);
        $this->assertEquals($created->getTimestamp(), $createdFromResult->getTimestamp());
    }

    /**
     * @covers WindowsAzure\MediaServices\Models\ContentProperties::writeXml
     */
    public function testWriteXml(){

        // Setup
        $name = 'Name';
        $option = Asset::OPTIONS_NONE;
        $asset = new Asset($option);
        $asset->setName($name);
        $asset->setOptions(Asset::OPTIONS_STORAGE_ENCRYPTED);
        $prop = new ContentProperties();
        $prop->setPropertiesFromObject($asset);
        $properties = $prop->getProperties();

        // Test
        $xmlWriter = new \XMLWriter();
        $xmlWriter->openMemory();
        $prop->writeXml($xmlWriter);
        $actual = $xmlWriter->outputMemory();
        $xml = simplexml_load_string($actual);
        $childrenCount = 0;
        foreach ($xml->children(Resources::DS_XML_NAMESPACE) as $child) {

            // Assert
            $this->assertContains((string)$child, $properties);
            $childrenCount++;
        }

        // Assert
        $this->assertEquals(2, $childrenCount);
    }

    /**
     * @covers WindowsAzure\MediaServices\Models\ContentProperties::writeInnerXml
     */
    public function testWriteInnerXml(){
        // Setup
        $name = 'Name';
        $option = Asset::OPTIONS_NONE;
        $asset = new Asset($option);
        $asset->setName($name);
        $asset->setOptions(Asset::OPTIONS_STORAGE_ENCRYPTED);
        $prop = new ContentProperties();
        $prop->setPropertiesFromObject($asset);

        // Test
        $xmlWriter = new \XMLWriter();
        $xmlWriter->openMemory();
        $prop->writeInnerXml($xmlWriter);
        $result = $xmlWriter->outputMemory();

        // Assert
        $this->assertContains(':Options', $result);
        $this->assertContains(':Name', $result);


    }

}