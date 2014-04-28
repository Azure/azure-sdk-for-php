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
 * @package   Tests\Unit\WindowsAzure\ServiceManagement\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace Tests\Unit\WindowsAzure\ServiceManagement\Models;
use WindowsAzure\ServiceManagement\Models\AffinityGroup;
use WindowsAzure\Common\Internal\Serialization\XmlSerializer;
use WindowsAzure\Common\Internal\Resources;

/**
 * Unit tests for class AffinityGroup
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\ServiceManagement\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.4.0_2014-01
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class AffinityGroupTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\ServiceManagement\Models\AffinityGroup::toArray
     * @covers WindowsAzure\ServiceManagement\Models\AffinityGroup::__construct
     */
    public function testSerialize()
    {
        // Setup
        $serializer = new XmlSerializer();
        $expected = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $expected .= '<CreateService xmlns="http://schemas.microsoft.com/windowsazure">' . "\n";
        $expected .= ' <Name>Name</Name>' . "\n";
        $expected .= ' <Label>Label</Label>' . "\n";
        $expected .= ' <Description>Description</Description>' . "\n";
        $expected .= ' <Location>Location</Location>' . "\n";
        $expected .= '</CreateService>' . "\n";
        $affinitygroup = new AffinityGroup();
        $affinitygroup->setName('Name');
        $affinitygroup->setLabel('Label');
        $affinitygroup->setLocation('Location');
        $affinitygroup->setDescription('Description');
        $affinitygroup->addSerializationProperty(
            XmlSerializer::ROOT_NAME,
            'CreateService'
        );
        
        // Test
        $actual = $affinitygroup->serialize($serializer);
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
}


