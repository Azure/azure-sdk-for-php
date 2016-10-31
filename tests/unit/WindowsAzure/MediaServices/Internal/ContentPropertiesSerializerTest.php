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
 * @link      https://github.com/WindowsAzure/azure-sdk-for-php
 */

namespace Tests\unit\WindowsAzure\MediaServices\Internal;

use WindowsAzure\MediaServices\Internal\ContentPropertiesSerializer;
use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\MediaServices\Models\Asset;
use WindowsAzure\MediaServices\Models\IngestManifest;
use WindowsAzure\MediaServices\Models\Task;
use WindowsAzure\MediaServices\Models\TaskOptions;

/**
 * Unit tests for class ContentPropertiesSerializer.
 *
 * @category  Microsoft
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @version   Release: 0.5.0_2016-11
 *
 * @link      https://github.com/WindowsAzure/azure-sdk-for-php
 */
class ContentPropertiesSerializerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \WindowsAzure\MediaServices\Internal\ContentPropertiesSerializer::unserialize
     * @covers \WindowsAzure\MediaServices\Internal\ContentPropertiesSerializer::_unserializeRecursive
     */
    public function testUnserializeSimple()
    {

        // Setup
        $testString = 'testString';
        $nameKey = 'name';
        $xmlString = '<properties xmlns="'.Resources::DSM_XML_NAMESPACE.'" xmlns:d="'.Resources::DS_XML_NAMESPACE.'">
                       <d:'.$nameKey.'>'.$testString.'</d:'.$nameKey.'>
                      </properties>';
        $xml = simplexml_load_string($xmlString);

        // Test
        $result = ContentPropertiesSerializer::unserialize($xml);

        // Assert
        $this->assertEquals(1, count($result));
        $this->assertEquals($testString, $result[$nameKey]);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Internal\ContentPropertiesSerializer::unserialize
     * @covers \WindowsAzure\MediaServices\Internal\ContentPropertiesSerializer::_unserializeRecursive
     */
    public function testUnserializeElement()
    {

        // Setup
        $testString = 'testString';
        $nameKey = 'name';
        $objectKey = 'object';
        $xmlString = '<properties xmlns="'.Resources::DSM_XML_NAMESPACE.'" xmlns:d="'.Resources::DS_XML_NAMESPACE.'">
                       <d:'.$nameKey.'>'.$testString.'</d:'.$nameKey.'>
                       <d:'.$objectKey.'>
                         <d:'.$nameKey.'>'.$testString.'</d:'.$nameKey.'>
                       </d:'.$objectKey.'>
                      </properties>';
        $xml = simplexml_load_string($xmlString);

        // Test
        $result = ContentPropertiesSerializer::unserialize($xml);

        // Assert
        $this->assertEquals(2, count($result));
        $this->assertEquals($testString, $result[$nameKey]);

        $this->assertEquals(1, count($result[$objectKey]));
        $this->assertEquals($testString, $result[$objectKey][$nameKey]);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Internal\ContentPropertiesSerializer::unserialize
     * @covers \WindowsAzure\MediaServices\Internal\ContentPropertiesSerializer::_unserializeRecursive
     */
    public function testUnserializeCollection()
    {

        // Setup
        $testString = 'testString';
        $nameKey = 'name';
        $otherNameKey = 'name';
        $objectKey = 'object';
        $xmlString = '<properties xmlns="'.Resources::DSM_XML_NAMESPACE.'" xmlns:d="'.Resources::DS_XML_NAMESPACE.'">
                       <d:'.$nameKey.'>'.$testString.'</d:'.$nameKey.'>
                       <d:'.$objectKey.'>
                         <d:element>
                           <d:'.$nameKey.'>'.$testString.'</d:'.$nameKey.'>
                         </d:element>
                         <d:element>
                           <d:'.$otherNameKey.'>'.$testString.'</d:'.$otherNameKey.'>
                         </d:element>
                       </d:'.$objectKey.'>
                      </properties>';
        $xml = simplexml_load_string($xmlString);

        // Test
        $result = ContentPropertiesSerializer::unserialize($xml);

        // Assert
        $this->assertEquals(2, count($result));
        $this->assertEquals($testString, $result[$nameKey]);

        $this->assertEquals(2, count($result[$objectKey]));
        $this->assertEquals(1, count($result[$objectKey][0]));
        $this->assertEquals($testString, $result[$objectKey][0][$nameKey]);
        $this->assertEquals(1, count($result[$objectKey][1]));
        $this->assertEquals($testString, $result[$objectKey][1][$otherNameKey]);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Internal\ContentPropertiesSerializer::serialize
     * @covers \WindowsAzure\MediaServices\Internal\ContentPropertiesSerializer::_serializeRecursive
     */
    public function testSerializeSimple()
    {

        // Setup
        $name = 'NameName';
        $nameKey = 'Name';
        $optionsKey = 'Options';
        $option = Asset::OPTIONS_STORAGE_ENCRYPTED;
        $assetArray = [
            $nameKey => $name,
            $optionsKey => $option,
        ];
        $asset = Asset::createFromOptions($assetArray);

        $expected = '
            <meta:properties xmlns:meta="http://schemas.microsoft.com/ado/2007/08/dataservices/metadata">
                <data:'.$optionsKey.' xmlns:data="http://schemas.microsoft.com/ado/2007/08/dataservices">'.$option.'</data:'.$optionsKey.'>
                <data:'.$nameKey.' xmlns:data="http://schemas.microsoft.com/ado/2007/08/dataservices">'.$name.'</data:'.$nameKey.'>
            </meta:properties>
        ';

        // Test
        $result = ContentPropertiesSerializer::serialize($asset);

        // Assert
        $this->assertXmlStringEqualsXmlString($expected, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Internal\ContentPropertiesSerializer::serialize
     * @covers \WindowsAzure\MediaServices\Internal\ContentPropertiesSerializer::_serializeRecursive
     */
    public function testSerializeDate()
    {

        // Setup
        $name = 'NameName';
        $nameKey = 'Name';
        $optionsKey = 'Options';
        $option = Asset::OPTIONS_STORAGE_ENCRYPTED;
        $dateKey = 'Created';
        $date = '2013-12-31T01:16:25+01:00';
        $assetArray = [
            $nameKey => $name,
            $optionsKey => $option,
            $dateKey => $date,
        ];
        $asset = Asset::createFromOptions($assetArray);

        $expected = '
            <meta:properties xmlns:meta="http://schemas.microsoft.com/ado/2007/08/dataservices/metadata">
                <data:'.$optionsKey.' xmlns:data="http://schemas.microsoft.com/ado/2007/08/dataservices">'.$option.'</data:'.$optionsKey.'>
                <data:'.$nameKey.' xmlns:data="http://schemas.microsoft.com/ado/2007/08/dataservices">'.$name.'</data:'.$nameKey.'>
                <data:'.$dateKey.' xmlns:data="http://schemas.microsoft.com/ado/2007/08/dataservices">'.$date.'</data:'.$dateKey.'>
            </meta:properties>
        ';

        // Test
        $result = ContentPropertiesSerializer::serialize($asset);

        // Assert
        $this->assertXmlStringEqualsXmlString($expected, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Internal\ContentPropertiesSerializer::serialize
     * @covers \WindowsAzure\MediaServices\Internal\ContentPropertiesSerializer::_serializeRecursive
     */
    public function testSerializeElement()
    {

        // Setup
        $name = 'NameName';
        $nameKey = 'Name';
        $statKey = 'Statistics';
        $statPendingFilesKey = 'PendingFilesCount';
        $statPendingFiles = 1;
        $statFinishedFilesKey = 'FinishedFilesCount';
        $statFinishedFiles = 2;
        $stat = [
            $statPendingFilesKey => $statPendingFiles,
            $statFinishedFilesKey => $statFinishedFiles,
        ];
        $objArray = [
            $nameKey => $name,
            $statKey => $stat,
        ];
        $obj = IngestManifest::createFromOptions($objArray);

        $expected = '
            <meta:properties xmlns:meta="http://schemas.microsoft.com/ado/2007/08/dataservices/metadata">
                <data:'.$statKey.' xmlns:data="http://schemas.microsoft.com/ado/2007/08/dataservices">
                    <data:'.$statFinishedFilesKey.' xmlns:data="http://schemas.microsoft.com/ado/2007/08/dataservices">'.$statFinishedFiles.'</data:'.$statFinishedFilesKey.'>
                    <data:'.$statPendingFilesKey.' xmlns:data="http://schemas.microsoft.com/ado/2007/08/dataservices">'.$statPendingFiles.'</data:'.$statPendingFilesKey.'>
                </data:'.$statKey.'>
                <data:'.$nameKey.' xmlns:data="http://schemas.microsoft.com/ado/2007/08/dataservices">'.$name.'</data:'.$nameKey.'>
            </meta:properties>
        ';

        // Test
        $result = ContentPropertiesSerializer::serialize($obj);

        // Assert
        $this->assertXmlStringEqualsXmlString($expected, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Internal\ContentPropertiesSerializer::serialize
     * @covers \WindowsAzure\MediaServices\Internal\ContentPropertiesSerializer::_serializeRecursive
     */
    public function testSerializeCollection()
    {

        // Setup
        $taskBodyKey = 'TaskBody';
        $taskBody = 'TaskBody';
        $optionsKey = 'Options';
        $options = TaskOptions::NONE;
        $mediaProcessorIdKey = 'MediaProcessorId';
        $mediaProcessorId = 'MediaProcessorId';

        $errorKey = 'ErrorDetails';
        $errorCodeKey = 'Code';
        $errorCode = 1;
        $errorMessageKey = 'Message';
        $errorMessage = 'Error message';
        $error = [
            [
                $errorCodeKey => $errorCode,
                $errorMessageKey => $errorMessage,
            ],
            [
                $errorCodeKey => $errorCode,
                $errorMessageKey => $errorMessage,
            ],
        ];
        $objArray = [
            $taskBodyKey => $taskBody,
            $optionsKey => $options,
            $mediaProcessorIdKey => $mediaProcessorId,
            $errorKey => $error,
        ];
        $obj = Task::createFromOptions($objArray);

        $expected = '
            <meta:properties xmlns:meta="http://schemas.microsoft.com/ado/2007/08/dataservices/metadata">
                <data:'.$taskBodyKey.' xmlns:data="http://schemas.microsoft.com/ado/2007/08/dataservices">'.$taskBody.'</data:'.$taskBodyKey.'>
                <data:'.$mediaProcessorIdKey.' xmlns:data="http://schemas.microsoft.com/ado/2007/08/dataservices">'.$mediaProcessorId.'</data:'.$mediaProcessorIdKey.'>
                <data:'.$errorKey.' xmlns:data="http://schemas.microsoft.com/ado/2007/08/dataservices">
                    <data:element xmlns:data="http://schemas.microsoft.com/ado/2007/08/dataservices">
                        <data:'.$errorMessageKey.' xmlns:data="http://schemas.microsoft.com/ado/2007/08/dataservices">'.$errorMessage.'</data:'.$errorMessageKey.'>
                        <data:'.$errorCodeKey.' xmlns:data="http://schemas.microsoft.com/ado/2007/08/dataservices">'.$errorCode.'</data:'.$errorCodeKey.'>
                    </data:element>
                    <data:element xmlns:data="http://schemas.microsoft.com/ado/2007/08/dataservices">
                        <data:'.$errorMessageKey.' xmlns:data="http://schemas.microsoft.com/ado/2007/08/dataservices">'.$errorMessage.'</data:'.$errorMessageKey.'>
                        <data:'.$errorCodeKey.' xmlns:data="http://schemas.microsoft.com/ado/2007/08/dataservices">'.$errorCode.'</data:'.$errorCodeKey.'>
                    </data:element>
                </data:'.$errorKey.'>
            </meta:properties>
        ';

        // Test
        $result = ContentPropertiesSerializer::serialize($obj);

        // Assert
        $this->assertXmlStringEqualsXmlString($expected, $result);
    }
}
