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
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace Tests\unit\WindowsAzure\ServiceManagement\Internal;

use WindowsAzure\Common\Internal\Serialization\JsonSerializer;
use WindowsAzure\ServiceManagement\Internal\Service;
use WindowsAzure\Common\Internal\Serialization\XmlSerializer;
use WindowsAzure\Common\Internal\Resources;

/**
 * Unit tests for class Service.
 *
 * @category  Microsoft
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @version   Release: 0.5.0_2016-11
 *
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class ServiceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \WindowsAzure\ServiceManagement\Internal\Service::setName
     * @covers \WindowsAzure\ServiceManagement\Internal\Service::getName
     * @covers \WindowsAzure\ServiceManagement\Internal\Service::__construct
     */
    public function testSetName()
    {
        // Setup
        $service = new Service();
        $expected = 'Name';

        // Test
        $service->setName($expected);

        // Assert
        $this->assertEquals($expected, $service->getName());
    }

    /**
     * @covers \WindowsAzure\ServiceManagement\Internal\Service::setLabel
     * @covers \WindowsAzure\ServiceManagement\Internal\Service::getLabel
     * @covers \WindowsAzure\ServiceManagement\Internal\Service::__construct
     */
    public function testSetLabel()
    {
        // Setup
        $service = new Service();
        $expected = 'Label';

        // Test
        $service->setLabel($expected);

        // Assert
        $this->assertEquals($expected, $service->getLabel());
    }

    /**
     * @covers \WindowsAzure\ServiceManagement\Internal\Service::setDescription
     * @covers \WindowsAzure\ServiceManagement\Internal\Service::getDescription
     * @covers \WindowsAzure\ServiceManagement\Internal\Service::__construct
     */
    public function testSetDescription()
    {
        // Setup
        $service = new Service();
        $expected = 'Description';

        // Test
        $service->setDescription($expected);

        // Assert
        $this->assertEquals($expected, $service->getDescription());
    }

    /**
     * @covers \WindowsAzure\ServiceManagement\Internal\Service::setLocation
     * @covers \WindowsAzure\ServiceManagement\Internal\Service::getLocation
     * @covers \WindowsAzure\ServiceManagement\Internal\Service::__construct
     */
    public function testSetLocation()
    {
        // Setup
        $service = new Service();
        $expected = 'Location';

        // Test
        $service->setLocation($expected);

        // Assert
        $this->assertEquals($expected, $service->getLocation());
    }

    /**
     * @covers \WindowsAzure\ServiceManagement\Internal\Service::addSerializationProperty
     * @covers \WindowsAzure\ServiceManagement\Internal\Service::getSerializationPropertyValue
     * @covers \WindowsAzure\ServiceManagement\Internal\Service::__construct
     */
    public function testAddSerializationProperty()
    {
        // Setup
        $service = new Service();
        $expectedKey = 'Key';
        $expectedValue = 'Value';

        // Test
        $service->addSerializationProperty($expectedKey, $expectedValue);

        // Assert
        $this->assertEquals($expectedValue, $service->getSerializationPropertyValue($expectedKey));
    }

    /**
     * @covers \WindowsAzure\ServiceManagement\Internal\Service::serialize
     * @covers \WindowsAzure\ServiceManagement\Internal\Service::__construct
     * @covers \WindowsAzure\ServiceManagement\Internal\Service::toArray
     */
    public function testSerialize()
    {
        // Setup
        $serializer = new XmlSerializer();
        $expected = '<?xml version="1.0" encoding="UTF-8"?>'."\n";
        $expected .= '<CreateService xmlns="http://schemas.microsoft.com/windowsazure">'."\n";
        $expected .= ' <Label>Label</Label>'."\n";
        $expected .= ' <Description>Description</Description>'."\n";
        $expected .= ' <Location>Location</Location>'."\n";
        $expected .= '</CreateService>'."\n";
        $service = new Service();
        $service->setName('Name');
        $service->setLabel('Label');
        $service->setLocation('Location');
        $service->setDescription('Description');
        $service->addSerializationProperty(
            XmlSerializer::ROOT_NAME,
            'CreateService'
        );

        // Test
        $actual = $service->serialize($serializer);

        // Assert
        $this->assertEquals($expected, $actual);
    }

    /**
     * @covers \WindowsAzure\ServiceManagement\Internal\Service::serialize
     */
    public function testSerializeWithInvalidSerializer()
    {
        // Setup
        $this->setExpectedException('\InvalidArgumentException', Resources::UNKNOWN_SRILZER_MSG);
        $service = new Service();

        // Test
        $service->serialize(new JsonSerializer());
    }
}
