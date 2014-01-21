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
 * @package   Tests\Unit\WindowsAzure\Table\internal
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace Tests\Unit\WindowsAzure\Table\internal;
use Tests\Framework\TestResources;
use WindowsAzure\Common\Internal\Utilities;
use WindowsAzure\Table\Internal\AtomReaderWriter;
use WindowsAzure\Table\Models\EdmType;

/**
 * Unit tests for class AtomReaderWriter
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\Table\internal
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.4.0_2014-01
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class AtomReaderWriterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\Table\Internal\AtomReaderWriter::getTable
     * @covers WindowsAzure\Table\Internal\AtomReaderWriter::__construct
     * @covers WindowsAzure\Table\Internal\AtomReaderWriter::_serializeAtom
     * @covers WindowsAzure\Table\Internal\AtomReaderWriter::_generateProperties
     */
    public function testGetTable()
    {
        // Setup
        $atomSerializer = new AtomReaderWriter();
        $expected = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>' . "\n" .
                    '<entry xmlns:d="http://schemas.microsoft.com/ado/2007/08/dataservices" xmlns:m="http://schemas.microsoft.com/ado/2007/08/dataservices/metadata" xmlns="http://www.w3.org/2005/Atom">' . "\n" .
                    ' <title/>' . "\n" .
                    ' <updated>' . Utilities::isoDate() . '</updated>' . "\n" .
                    ' <author>' . "\n" .
                    '  <name/>' . "\n" .
                    ' </author>' . "\n" .
                    ' <id/>' . "\n" .
                    ' <content type="application/xml">' . "\n" .
                    '  <m:properties>' . "\n" .
                    '   <d:TableName>customers</d:TableName>' . "\n" .
                    '  </m:properties>' . "\n" .
                    ' </content>' . "\n" .
                    '</entry>' . "\n";
        
        // Test
        $actual = $atomSerializer->getTable('customers');
        
        // Assert
        $this->assertEquals($expected, $actual);
        
        return $actual;
    }
    
    /**
     * @covers WindowsAzure\Table\Internal\AtomReaderWriter::getEntity
     * @covers WindowsAzure\Table\Internal\AtomReaderWriter::__construct
     * @covers WindowsAzure\Table\Internal\AtomReaderWriter::_serializeAtom
     * @covers WindowsAzure\Table\Internal\AtomReaderWriter::_generateProperties
     */
    public function testGetEntity()
    {
        // Setup
        $atomSerializer = new AtomReaderWriter();
        $entity = TestResources::getTestEntity('123', '456');
        $entity->addProperty('Cost', EdmType::DOUBLE, 12.45);
        $expected = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>' . "\n" .
                    '<entry xmlns:d="http://schemas.microsoft.com/ado/2007/08/dataservices" xmlns:m="http://schemas.microsoft.com/ado/2007/08/dataservices/metadata" xmlns="http://www.w3.org/2005/Atom">' . "\n" .
                    ' <title/>' . "\n" .
                    ' <updated>' . Utilities::isoDate() . '</updated>' . "\n" .
                    ' <author>' . "\n" .
                    '  <name/>' . "\n" .
                    ' </author>' . "\n" .
                    ' <id/>' . "\n" .
                    ' <content type="application/xml">' . "\n" .
                    '  <m:properties>' . "\n" .
                    '   <d:PartitionKey>123</d:PartitionKey>' . "\n" .
                    '   <d:RowKey>456</d:RowKey>' . "\n" .
                    '   <d:CustomerId m:type="Edm.Int32">890</d:CustomerId>' . "\n" .
                    '   <d:CustomerName>John</d:CustomerName>' . "\n" .
                    '   <d:IsNew m:type="Edm.Boolean">1</d:IsNew>' . "\n" .
                    '   <d:JoinDate m:type="Edm.DateTime">2012-01-26T18:26:19Z</d:JoinDate>' . "\n" .
                    '   <d:Cost m:type="Edm.Double">12.45</d:Cost>' . "\n" .
                    '  </m:properties>' . "\n" .
                    ' </content>' . "\n" .
                    '</entry>' . "\n";
        
        // Test
        $actual = $atomSerializer->getEntity($entity);
        
        // Assert
        $this->assertEquals($expected, $actual);
        
        return $actual;
    }
    
    /**
     * @covers WindowsAzure\Table\Internal\AtomReaderWriter::parseTable
     * @covers WindowsAzure\Table\Internal\AtomReaderWriter::__construct
     * @covers WindowsAzure\Table\Internal\AtomReaderWriter::_serializeAtom
     * @covers WindowsAzure\Table\Internal\AtomReaderWriter::_generateProperties
     * @covers WindowsAzure\Table\Internal\AtomReaderWriter::_parseOneTable
     * @depends testGetTable
     */
    public function testParseTable($tableAtom)
    {
        // Setup
        $atomSerializer = new AtomReaderWriter();
        $expected = 'customers';
        
        // Test
        $actual = $atomSerializer->parseTable($tableAtom);
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Table\Internal\AtomReaderWriter::parseTableEntries
     * @covers WindowsAzure\Table\Internal\AtomReaderWriter::__construct
     * @covers WindowsAzure\Table\Internal\AtomReaderWriter::_serializeAtom
     * @covers WindowsAzure\Table\Internal\AtomReaderWriter::_generateProperties
     * @covers WindowsAzure\Table\Internal\AtomReaderWriter::_parseOneTable
     */
    public function testParseTables()
    {
        // Setup
        $atomSerializer = new AtomReaderWriter();
        $expected = array('querytablessimple1', 'querytablessimple2');
        $tablesAtom = '<?xml version="1.0" encoding="utf-8" standalone="yes"?>
                       <feed xml:base="http://aogail2.table.core.windows.net/" xmlns:d="http://schemas.microsoft.com/ado/2007/08/dataservices" xmlns:m="http://schemas.microsoft.com/ado/2007/08/dataservices/metadata" xmlns="http://www.w3.org/2005/Atom">
                       <title type="text">Tables</title>
                       <id>http://aogail2.table.core.windows.net/Tables</id>
                       <updated>2012-05-17T00:30:14Z</updated>
                        <link rel="self" title="Tables" href="Tables" />
                        <entry>
                            <id>http://aogail2.table.core.windows.net/Tables(\'querytablessimple1\')</id>
                            <title type="text"></title>
                            <updated>2012-05-17T00:30:14Z</updated>
                            <author>
                            <name />
                            </author>
                            <link rel="edit" title="Tables" href="Tables(\'querytablessimple1\')" />
                            <category term="aogail2.Tables" scheme="http://schemas.microsoft.com/ado/2007/08/dataservices/scheme" />
                            <content type="application/xml">
                            <m:properties>
                                <d:TableName>querytablessimple1</d:TableName>
                            </m:properties>
                            </content>
                        </entry>
                        <entry>
                            <id>http://aogail2.table.core.windows.net/Tables(\'querytablessimple2\')</id>
                            <title type="text"></title>
                            <updated>2012-05-17T00:30:14Z</updated>
                            <author>
                            <name />
                            </author>
                            <link rel="edit" title="Tables" href="Tables(\'querytablessimple2\')" />
                            <category term="aogail2.Tables" scheme="http://schemas.microsoft.com/ado/2007/08/dataservices/scheme" />
                            <content type="application/xml">
                            <m:properties>
                                <d:TableName>querytablessimple2</d:TableName>
                            </m:properties>
                            </content>
                        </entry>
                        </feed>' . "\n";
        
        // Test
        $actual = $atomSerializer->parseTableEntries($tablesAtom);
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Table\Internal\AtomReaderWriter::parseEntity
     * @covers WindowsAzure\Table\Internal\AtomReaderWriter::__construct
     * @covers WindowsAzure\Table\Internal\AtomReaderWriter::_serializeAtom
     * @covers WindowsAzure\Table\Internal\AtomReaderWriter::_generateProperties
     * @depends testGetEntity
     */
    public function testParseEntity($entityAtom)
    {
        // Setup
        $atomSerializer = new AtomReaderWriter();
        $expected = TestResources::getTestEntity('123', '456');
        $expected->addProperty('Cost', EdmType::DOUBLE, 12.45);
        
        // Test
        $actual = $atomSerializer->parseEntity($entityAtom);
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    public function testParseEntities()
    {
        // Setup
        $atomSerializer = new AtomReaderWriter();
        $pk1 = '123';
        $pk2 = '124';
        $pk3 = '125';
        $e1 = TestResources::getTestEntity($pk1, '1');
        $e2 = TestResources::getTestEntity($pk2, '2');
        $e3 = TestResources::getTestEntity($pk3, '3');
        $e1->setETag('W/"datetime\'2012-05-17T00%3A59%3A32.1131734Z\'"');
        $e2->setETag('W/"datetime\'2012-05-17T00%3A59%3A32.4252358Z\'"');
        $e3->setETag('W/"datetime\'2012-05-17T00%3A59%3A32.7533014Z\'"');
        $e1->setTimestamp(Utilities::convertToDateTime('2012-05-17T00:59:32.0000473Z'));
        $e2->setTimestamp(Utilities::convertToDateTime('2012-05-17T00:59:32.0000473Z'));
        $e3->setTimestamp(Utilities::convertToDateTime('2012-05-17T00:59:32.0000473Z'));
        $expected = array($e1, $e2, $e3);
        $entitiesAtom = '<?xml version="1.0" encoding="utf-8" standalone="yes"?>
                        <feed xml:base="http://aogail2.table.core.windows.net/" xmlns:d="http://schemas.microsoft.com/ado/2007/08/dataservices" xmlns:m="http://schemas.microsoft.com/ado/2007/08/dataservices/metadata" xmlns="http://www.w3.org/2005/Atom">
                        <title type="text">queryentitieswithmultipleentities</title>
                        <id>http://aogail2.table.core.windows.net/queryentitieswithmultipleentities</id>
                        <updated>2012-05-17T00:59:32Z</updated>
                        <link rel="self" title="queryentitieswithmultipleentities" href="queryentitieswithmultipleentities" />
                        <entry m:etag="W/&quot;datetime\'2012-05-17T00%3A59%3A32.1131734Z\'&quot;">
                            <id>http://aogail2.table.core.windows.net/queryentitieswithmultipleentities(PartitionKey=\'123\',RowKey=\'1\')</id>
                            <title type="text"></title>
                            <updated>2012-05-17T00:59:32Z</updated>
                            <author>
                            <name />
                            </author>
                            <link rel="edit" title="queryentitieswithmultipleentities" href="queryentitieswithmultipleentities(PartitionKey=\'123\',RowKey=\'1\')" />
                            <category term="aogail2.queryentitieswithmultipleentities" scheme="http://schemas.microsoft.com/ado/2007/08/dataservices/scheme" />
                            <content type="application/xml">
                            <m:properties>
                                <d:PartitionKey>123</d:PartitionKey>
                                <d:RowKey>1</d:RowKey>
                                <d:Timestamp m:type="Edm.DateTime">2012-05-17T00:59:32.1131734Z</d:Timestamp>
                                <d:CustomerId m:type="Edm.Int32">890</d:CustomerId>
                                <d:CustomerName>John</d:CustomerName>
                                <d:IsNew m:type="Edm.Boolean">true</d:IsNew>
                                <d:JoinDate m:type="Edm.DateTime">2012-01-26T18:26:19Z</d:JoinDate>
                            </m:properties>
                            </content>
                        </entry>
                        <entry m:etag="W/&quot;datetime\'2012-05-17T00%3A59%3A32.4252358Z\'&quot;">
                            <id>http://aogail2.table.core.windows.net/queryentitieswithmultipleentities(PartitionKey=\'124\',RowKey=\'2\')</id>
                            <title type="text"></title>
                            <updated>2012-05-17T00:59:32Z</updated>
                            <author>
                            <name />
                            </author>
                            <link rel="edit" title="queryentitieswithmultipleentities" href="queryentitieswithmultipleentities(PartitionKey=\'124\',RowKey=\'2\')" />
                            <category term="aogail2.queryentitieswithmultipleentities" scheme="http://schemas.microsoft.com/ado/2007/08/dataservices/scheme" />
                            <content type="application/xml">
                            <m:properties>
                                <d:PartitionKey>124</d:PartitionKey>
                                <d:RowKey>2</d:RowKey>
                                <d:Timestamp m:type="Edm.DateTime">2012-05-17T00:59:32.4252358Z</d:Timestamp>
                                <d:CustomerId m:type="Edm.Int32">890</d:CustomerId>
                                <d:CustomerName>John</d:CustomerName>
                                <d:IsNew m:type="Edm.Boolean">true</d:IsNew>
                                <d:JoinDate m:type="Edm.DateTime">2012-01-26T18:26:19Z</d:JoinDate>
                            </m:properties>
                            </content>
                        </entry>
                        <entry m:etag="W/&quot;datetime\'2012-05-17T00%3A59%3A32.7533014Z\'&quot;">
                            <id>http://aogail2.table.core.windows.net/queryentitieswithmultipleentities(PartitionKey=\'125\',RowKey=\'3\')</id>
                            <title type="text"></title>
                            <updated>2012-05-17T00:59:32Z</updated>
                            <author>
                            <name />
                            </author>
                            <link rel="edit" title="queryentitieswithmultipleentities" href="queryentitieswithmultipleentities(PartitionKey=\'125\',RowKey=\'3\')" />
                            <category term="aogail2.queryentitieswithmultipleentities" scheme="http://schemas.microsoft.com/ado/2007/08/dataservices/scheme" />
                            <content type="application/xml">
                            <m:properties>
                                <d:PartitionKey>125</d:PartitionKey>
                                <d:RowKey>3</d:RowKey>
                                <d:Timestamp m:type="Edm.DateTime">2012-05-17T00:59:32.7533014Z</d:Timestamp>
                                <d:CustomerId m:type="Edm.Int32">890</d:CustomerId>
                                <d:CustomerName>John</d:CustomerName>
                                <d:IsNew m:type="Edm.Boolean">true</d:IsNew>
                                <d:JoinDate m:type="Edm.DateTime">2012-01-26T18:26:19Z</d:JoinDate>
                            </m:properties>
                            </content>
                        </entry>
                        </feed>
                        ';
        
        // Test
        $actual = $atomSerializer->parseEntities($entitiesAtom);
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
}


