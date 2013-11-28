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
 * @package   Tests\Unit\WindowsAzure\Common\Internal\Atom
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/WindowsAzure/azure-sdk-for-php
 */

namespace Tests\Unit\WindowsAzure\Common\Internal\Atom;
use WindowsAzure\Common\Internal\Atom\AtomProperties;
use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\MediaServices\Models\Asset;
/**
 * Unit tests for class AtomLink
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\Common\Internal\Atom
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.3.1_2011-08
 * @link      https://github.com/WindowsAzure/azure-sdk-for-php
 */

class AtomPropertiesTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\Common\Internal\Atom\AtomProperties::__construct
     */
    public function test__construct(){

        // Setup

        // Test
        $atomProp = new AtomProperties();

        // Assert
        $this-> assertNotNull($atomProp);
    }

    /**
     * @covers WindowsAzure\Common\Internal\Atom\AtomProperties::fromXml
     * @covers WindowsAzure\Common\Internal\Atom\AtomProperties::getProperties
     */
    public function testFromXml(){

        // Setup
        $testString = 'testString';
        $nameKey = 'name';
        $xmlString = '<properties xmlns="' . Resources::DSM_XML_NAMESPACE . '" xmlns:d="' . Resources::DS_XML_NAMESPACE . '">
                       <d:' . $nameKey . '>' . $testString . '</d:' . $nameKey . '>
                      </properties>';
        $xml = simplexml_load_string($xmlString);
        $atomProp = new AtomProperties();

        // Test
        $atomProp->fromXml($xml);
        $result = $atomProp->getProperties();

        // Assert
        $this->assertEquals(1, count($result));
        $this->assertEquals($testString, $result[$nameKey]);
    }

    /**
     * @covers WindowsAzure\Common\Internal\Atom\AtomProperties::setPropertiesFromObject
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
        $atomProp = new AtomProperties();

        // Test
        $atomProp->setPropertiesFromObject($asset);
        $result = $atomProp->getProperties();
        $createdFromResult = new \Datetime($result[$createdKey]);

        // Assert
        $this->assertEquals(3, count($result));
        $this->assertEquals($name, $result[$nameKey]);
        $this->assertEquals($option, $result[$optionsKey]);
        $this->assertEquals($created->getTimestamp(), $createdFromResult->getTimestamp());
    }

    /**
     * @covers WindowsAzure\Common\Internal\Atom\AtomProperties::writeXml
     */
    public function testWriteXml(){

        // Setup
        $name = 'Name';
        $option = Asset::OPTIONS_NONE;
        $asset = new Asset($option);
        $asset->setName($name);
        $asset->setOptions(Asset::OPTIONS_STORAGE_ENCRYPTED);
        $atomProp = new AtomProperties();
        $atomProp->setPropertiesFromObject($asset);
        $properties = $atomProp->getProperties();

        // Test
        $xmlWriter = new \XMLWriter();
        $xmlWriter->openMemory();
        $atomProp->writeXml($xmlWriter);
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
     * @covers WindowsAzure\Common\Internal\Atom\AtomProperties::writeInnerXml
     */
    public function testWriteInnerXml(){
        // Setup
        $name = 'Name';
        $option = Asset::OPTIONS_NONE;
        $asset = new Asset($option);
        $asset->setName($name);
        $asset->setOptions(Asset::OPTIONS_STORAGE_ENCRYPTED);
        $atomProp = new AtomProperties();
        $atomProp->setPropertiesFromObject($asset);

        // Test
        $xmlWriter = new \XMLWriter();
        $xmlWriter->openMemory();
        $atomProp->writeInnerXml($xmlWriter);
        $result = $xmlWriter->outputMemory();

        // Assert
        $this->assertContains('data:Options', $result);
        $this->assertContains('data:Name', $result);


    }

}