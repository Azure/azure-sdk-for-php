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
use WindowsAzure\MediaServices\Models\MediaProcessor;

/**
 * Represents access policy object used in media services
 *
 * @category  Microsoft
 * @package   WindowsAzure\MediaServices\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.4.0_2014-01
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

class MediaProcessorTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @covers WindowsAzure\MediaServices\Models\MediaProcessor::createFromOptions
     * @covers WindowsAzure\MediaServices\Models\MediaProcessor::fromArray
     */
    public function testCreateFromOptions(){

        // Setup
        $options = array(
                'Id'                  => 'sfgsfg34',
                'Name'                => 'Some Name',
                'Description'         => 'Description of media processor',
                'Sku'                 => '456-123-789',
                'Vendor'              => 'Vendors name',
                'Version'             => '3.6.5',
        );

        // Test
        $mediaProc = MediaProcessor::createFromOptions($options);

        // Assert
        $this->assertEquals($options['Id'], $mediaProc->getId());
        $this->assertEquals($options['Name'], $mediaProc->getName());
        $this->assertEquals($options['Description'], $mediaProc->getDescription());
        $this->assertEquals($options['Sku'], $mediaProc->getSku());
        $this->assertEquals($options['Vendor'], $mediaProc->getVendor());
        $this->assertEquals($options['Version'], $mediaProc->getVersion());
    }

    /**
     * @covers WindowsAzure\MediaServices\Models\MediaProcessor::getId
     * @covers WindowsAzure\MediaServices\Models\MediaProcessor::__construct
     */
    public function testGetId(){

        // Setup
        $options = array(
                'Id'             => 'sfgsfg34',
        );
        $mediaProc = MediaProcessor::createFromOptions($options);

        // Test
        $result = $mediaProc->getId();

        // Assert
        $this->assertEquals($options['Id'], $result);
    }

    /**
     * @covers WindowsAzure\MediaServices\Models\MediaProcessor::getName
     */
    public function testGetName(){

        // Setup
        $options = array(
                'Name'           => 'Some Name',
        );
        $mediaProc = MediaProcessor::createFromOptions($options);

        // Test
        $result = $mediaProc->getName();

        // Assert
        $this->assertEquals($options['Name'], $result);
    }

    /**
     * @covers WindowsAzure\MediaServices\Models\MediaProcessor::getDescription
     */
    public function testGetDescription(){

        // Setup
        $options = array(
                'Description'          => 'Description of media processor'
        );
        $mediaProc = MediaProcessor::createFromOptions($options);

        // Test
        $result = $mediaProc->getDescription();

        // Assert
        $this->assertEquals($options['Description'], $result);
    }

    /**
     * @covers WindowsAzure\MediaServices\Models\MediaProcessor::getSku
     */
    public function testGetSku(){

        // Setup
        $options = array(
                'Sku'        => '123-456-789'
        );
        $mediaProc = MediaProcessor::createFromOptions($options);

        // Test
        $result = $mediaProc->getSku();

        // Assert
        $this->assertEquals($options['Sku'], $result);
    }

    /**
     * @covers WindowsAzure\MediaServices\Models\MediaProcessor::getVendor
     */
    public function testGetVendor(){

        // Setup
        $options = array(
                'Vendor'        => 'Vendors name'
        );
        $mediaProc = MediaProcessor::createFromOptions($options);

        // Test
        $result = $mediaProc->getVendor();

        // Assert
        $this->assertEquals($options['Vendor'], $result);
    }

    /**
     * @covers WindowsAzure\MediaServices\Models\MediaProcessor::getVersion
     */
    public function testGetVersion(){

        // Setup
        $options = array(
                'Version'        => '3.6.5'
        );
        $mediaProc = MediaProcessor::createFromOptions($options);

        // Test
        $result = $mediaProc->getVersion();

        // Assert
        $this->assertEquals($options['Version'], $result);
    }
}
