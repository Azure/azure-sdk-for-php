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

namespace Tests\unit\WindowsAzure\MediaServices\Templates;

use WindowsAzure\MediaServices\Templates\PlayReadyPlayRight;
use WindowsAzure\MediaServices\Templates\ScmsRestriction;
use WindowsAzure\MediaServices\Templates\AgcAndColorStripeRestriction;
use WindowsAzure\MediaServices\Templates\ExplicitAnalogTelevisionRestriction;
use WindowsAzure\MediaServices\Templates\UnknownOutputPassingOption;
use WindowsAzure\MediaServices\Templates\ErrorMessages;

/**
 * Unit Tests for PlayReadyPlayRight.
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
class PlayReadyPlayRightTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \WindowsAzure\MediaServices\Templates\PlayReadyPlayRight::getFirstPlayExpiration
     * @covers \WindowsAzure\MediaServices\Templates\PlayReadyPlayRight::setFirstPlayExpiration
     */
    public function testGetSetFirstPlayExpiration()
    {
        // Setup
        $entity = new PlayReadyPlayRight();
        $payload = new \DateInterval('PT30S');

        // Test
        $entity->setFirstPlayExpiration($payload);
        $result = $entity->getFirstPlayExpiration();

        // Assert
        $this->assertEquals($payload, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Templates\PlayReadyPlayRight::getScmsRestriction
     * @covers \WindowsAzure\MediaServices\Templates\PlayReadyPlayRight::setScmsRestriction
     */
    public function testGetSetScmsRestriction()
    {
        // Setup
        $entity = new PlayReadyPlayRight();
        $payload = new ScmsRestriction(1);

        // Test
        $entity->setScmsRestriction($payload);
        $result = $entity->getScmsRestriction();

        // Assert
        $this->assertEquals($payload, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Templates\PlayReadyPlayRight::getAgcAndColorStripeRestriction
     * @covers \WindowsAzure\MediaServices\Templates\PlayReadyPlayRight::setAgcAndColorStripeRestriction
     */
    public function testGetSetAgcAndColorStripeRestriction()
    {
        // Setup
        $entity = new PlayReadyPlayRight();
        $payload = new AgcAndColorStripeRestriction(1);

        // Test
        $entity->setAgcAndColorStripeRestriction($payload);
        $result = $entity->getAgcAndColorStripeRestriction();

        // Assert
        $this->assertEquals($payload, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Templates\PlayReadyPlayRight::getExplicitAnalogTelevisionOutputRestriction
     * @covers \WindowsAzure\MediaServices\Templates\PlayReadyPlayRight::setExplicitAnalogTelevisionOutputRestriction
     */
    public function testGetSetExplicitAnalogTelevisionOutputRestriction()
    {
        // Setup
        $entity = new PlayReadyPlayRight();
        $payload = new ExplicitAnalogTelevisionRestriction(1);

        // Test
        $entity->setExplicitAnalogTelevisionOutputRestriction($payload);
        $result = $entity->getExplicitAnalogTelevisionOutputRestriction();

        // Assert
        $this->assertEquals($payload, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Templates\PlayReadyPlayRight::getDigitalVideoOnlyContentRestriction
     * @covers \WindowsAzure\MediaServices\Templates\PlayReadyPlayRight::setDigitalVideoOnlyContentRestriction
     */
    public function testGetSetDigitalVideoOnlyContentRestriction()
    {
        // Setup
        $entity = new PlayReadyPlayRight();
        $payload = true;

        // Test
        $entity->setDigitalVideoOnlyContentRestriction($payload);
        $result = $entity->getDigitalVideoOnlyContentRestriction();

        // Assert
        $this->assertEquals($payload, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Templates\PlayReadyPlayRight::getImageConstraintForAnalogComponentVideoRestriction
     * @covers \WindowsAzure\MediaServices\Templates\PlayReadyPlayRight::setImageConstraintForAnalogComponentVideoRestriction
     */
    public function testGetSetImageConstraintForAnalogComponentVideoRestriction()
    {
        // Setup
        $entity = new PlayReadyPlayRight();
        $payload = true;

        // Test
        $entity->setImageConstraintForAnalogComponentVideoRestriction($payload);
        $result = $entity->getImageConstraintForAnalogComponentVideoRestriction();

        // Assert
        $this->assertEquals($payload, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Templates\PlayReadyPlayRight::getImageConstraintForAnalogComputerMonitorRestriction
     * @covers \WindowsAzure\MediaServices\Templates\PlayReadyPlayRight::setImageConstraintForAnalogComputerMonitorRestriction
     */
    public function testGetSetImageConstraintForAnalogComputerMonitorRestriction()
    {
        // Setup
        $entity = new PlayReadyPlayRight();
        $payload = true;

        // Test
        $entity->setImageConstraintForAnalogComputerMonitorRestriction($payload);
        $result = $entity->getImageConstraintForAnalogComputerMonitorRestriction();

        // Assert
        $this->assertEquals($payload, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Templates\PlayReadyPlayRight::getAllowPassingVideoContentToUnknownOutput
     * @covers \WindowsAzure\MediaServices\Templates\PlayReadyPlayRight::setAllowPassingVideoContentToUnknownOutput
     */
    public function testGetSetAllowPassingVideoContentToUnknownOutput()
    {
        // Setup
        $entity = new PlayReadyPlayRight();
        $payload = UnknownOutputPassingOption::ALLOWED;

        // Test
        $entity->setAllowPassingVideoContentToUnknownOutput($payload);
        $result = $entity->getAllowPassingVideoContentToUnknownOutput();

        // Assert
        $this->assertEquals($payload, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Templates\PlayReadyPlayRight::getUncompressedDigitalVideoOpl
     * @covers \WindowsAzure\MediaServices\Templates\PlayReadyPlayRight::setUncompressedDigitalVideoOpl
     */
    public function testGetSetUncompressedDigitalVideoOpl()
    {
        // Setup
        $entity = new PlayReadyPlayRight();
        $payload = 100;

        // Test
        $entity->setUncompressedDigitalVideoOpl($payload);
        $result = $entity->getUncompressedDigitalVideoOpl();

        // Assert
        $this->assertEquals($payload, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Templates\PlayReadyPlayRight::setUncompressedDigitalVideoOpl
     */
    public function testSetInvalidUncompressedDigitalVideoOplShouldThrown()
    {
        // Setup
        $entity = new PlayReadyPlayRight();
        $payload = 105;
        $this->setExpectedException('InvalidArgumentException', ErrorMessages::UNCOMPRESSED_DIGITAL_VIDEO_OPL_VALUE_ERROR);

        // Test
        $entity->setUncompressedDigitalVideoOpl($payload);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Templates\PlayReadyPlayRight::getCompressedDigitalVideoOpl
     * @covers \WindowsAzure\MediaServices\Templates\PlayReadyPlayRight::setCompressedDigitalVideoOpl
     */
    public function testGetSetCompressedDigitalVideoOpl()
    {
        // Setup
        $entity = new PlayReadyPlayRight();
        $payload = 400;

        // Test
        $entity->setCompressedDigitalVideoOpl($payload);
        $result = $entity->getCompressedDigitalVideoOpl();

        // Assert
        $this->assertEquals($payload, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Templates\PlayReadyPlayRight::setCompressedDigitalVideoOpl
     */
    public function testSetInvalidCompressedDigitalVideoOplShouldThrown()
    {
        // Setup
        $entity = new PlayReadyPlayRight();
        $payload = 405;
        $this->setExpectedException('InvalidArgumentException', ErrorMessages::COMPRESSED_DIGITAL_VIDEO_OPL_VALUE_ERROR);

        // Test
        $entity->setCompressedDigitalVideoOpl($payload);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Templates\PlayReadyPlayRight::getAnalogVideoOpl
     * @covers \WindowsAzure\MediaServices\Templates\PlayReadyPlayRight::setAnalogVideoOpl
     */
    public function testGetSetAnalogVideoOpl()
    {
        // Setup
        $entity = new PlayReadyPlayRight();
        $payload = 100;

        // Test
        $entity->setAnalogVideoOpl($payload);
        $result = $entity->getAnalogVideoOpl();

        // Assert
        $this->assertEquals($payload, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Templates\PlayReadyPlayRight::setAnalogVideoOpl
     */
    public function testSetInvalidAnalogVideoOplShouldThrown()
    {
        // Setup
        $entity = new PlayReadyPlayRight();
        $payload = 105;
        $this->setExpectedException('InvalidArgumentException', ErrorMessages::ANALOG_VIDEO_OPL_VALUE_ERROR);

        // Test
        $entity->setAnalogVideoOpl($payload);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Templates\PlayReadyPlayRight::getCompressedDigitalAudioOpl
     * @covers \WindowsAzure\MediaServices\Templates\PlayReadyPlayRight::setCompressedDigitalAudioOpl
     */
    public function testGetSetCompressedDigitalAudioOpl()
    {
        // Setup
        $entity = new PlayReadyPlayRight();
        $payload = 100;

        // Test
        $entity->setCompressedDigitalAudioOpl($payload);
        $result = $entity->getCompressedDigitalAudioOpl();

        // Assert
        $this->assertEquals($payload, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Templates\PlayReadyPlayRight::setCompressedDigitalAudioOpl
     */
    public function testSetInvalidCompressedDigitalAudioOplShouldThrown()
    {
        // Setup
        $entity = new PlayReadyPlayRight();
        $payload = 105;
        $this->setExpectedException('InvalidArgumentException', ErrorMessages::COMPRESSED_DIGITAL_AUDIO_OPL_VALUE_ERROR);

        // Test
        $entity->setCompressedDigitalAudioOpl($payload);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Templates\PlayReadyPlayRight::getUncompressedDigitalAudioOpl
     * @covers \WindowsAzure\MediaServices\Templates\PlayReadyPlayRight::setUncompressedDigitalAudioOpl
     */
    public function testGetSetUncompressedDigitalAudioOpl()
    {
        // Setup
        $entity = new PlayReadyPlayRight();
        $payload = 100;

        // Test
        $entity->setUncompressedDigitalAudioOpl($payload);
        $result = $entity->getUncompressedDigitalAudioOpl();

        // Assert
        $this->assertEquals($payload, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Templates\PlayReadyPlayRight::setUncompressedDigitalAudioOpl
     */
    public function testSetInvalidUncompressedDigitalAudioOplShouldThrown()
    {
        // Setup
        $entity = new PlayReadyPlayRight();
        $payload = 105;
        $this->setExpectedException('InvalidArgumentException', ErrorMessages::UNCOMPRESSED_DIGITAL_AUDIO_OPL_VALUE_ERROR);

        // Test
        $entity->setUncompressedDigitalAudioOpl($payload);
    }
}
