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

use WindowsAzure\MediaServices\Templates\PlayReadyLicenseTemplate;
use WindowsAzure\MediaServices\Templates\PlayReadyPlayRight;
use WindowsAzure\MediaServices\Templates\ContentEncryptionKeyFromKeyIdentifier;

/**
 * Unit Tests for PlayReadyLicenseTemplate.
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
class PlayReadyLicenseTemplateTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \WindowsAzure\MediaServices\Templates\PlayReadyLicenseTemplate::getAllowTestDevices
     * @covers \WindowsAzure\MediaServices\Templates\PlayReadyLicenseTemplate::setAllowTestDevices
     */
    public function testGetSetAllowTestDevices()
    {
        // Setup
        $entity = new PlayReadyLicenseTemplate();
        $payload = true;

        // Test
        $entity->setAllowTestDevices($payload);
        $result = $entity->getAllowTestDevices();

        // Assert
        $this->assertEquals($payload, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Templates\PlayReadyLicenseTemplate::getBeginDate
     * @covers \WindowsAzure\MediaServices\Templates\PlayReadyLicenseTemplate::setBeginDate
     */
    public function testGetSetBeginDate()
    {
        // Setup
        $entity = new PlayReadyLicenseTemplate();
        $payload = new \DateTime('now');

        // Test
        $entity->setBeginDate($payload);
        $result = $entity->getBeginDate();

        // Assert
        $this->assertEquals($payload, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Templates\PlayReadyLicenseTemplate::getExpirationDate
     * @covers \WindowsAzure\MediaServices\Templates\PlayReadyLicenseTemplate::setExpirationDate
     */
    public function testGetSetExpirationDate()
    {
        // Setup
        $entity = new PlayReadyLicenseTemplate();
        $payload = new \DateTime('now');

        // Test
        $entity->setExpirationDate($payload);
        $result = $entity->getExpirationDate();

        // Assert
        $this->assertEquals($payload, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Templates\PlayReadyLicenseTemplate::getRelativeBeginDate
     * @covers \WindowsAzure\MediaServices\Templates\PlayReadyLicenseTemplate::setRelativeBeginDate
     */
    public function testGetSetRelativeBeginDate()
    {
        // Setup
        $entity = new PlayReadyLicenseTemplate();
        $payload = new \DateInterval('PT30S');

        // Test
        $entity->setRelativeBeginDate($payload);
        $result = $entity->getRelativeBeginDate();

        // Assert
        $this->assertEquals($payload, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Templates\PlayReadyLicenseTemplate::getRelativeExpirationDate
     * @covers \WindowsAzure\MediaServices\Templates\PlayReadyLicenseTemplate::setRelativeExpirationDate
     */
    public function testGetSetRelativeExpirationDate()
    {
        // Setup
        $entity = new PlayReadyLicenseTemplate();
        $payload = new \DateInterval('PT30S');

        // Test
        $entity->setRelativeExpirationDate($payload);
        $result = $entity->getRelativeExpirationDate();

        // Assert
        $this->assertEquals($payload, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Templates\PlayReadyLicenseTemplate::getGracePeriod
     * @covers \WindowsAzure\MediaServices\Templates\PlayReadyLicenseTemplate::setGracePeriod
     */
    public function testGetSetGracePeriod()
    {
        // Setup
        $entity = new PlayReadyLicenseTemplate();
        $payload = new \DateInterval('PT30S');

        // Test
        $entity->setGracePeriod($payload);
        $result = $entity->getGracePeriod();

        // Assert
        $this->assertEquals($payload, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Templates\PlayReadyLicenseTemplate::getPlayRight
     * @covers \WindowsAzure\MediaServices\Templates\PlayReadyLicenseTemplate::setPlayRight
     */
    public function testGetSetPlayRight()
    {
        // Setup
        $entity = new PlayReadyLicenseTemplate();
        $payload = new PlayReadyPlayRight();

        // Test
        $entity->setPlayRight($payload);
        $result = $entity->getPlayRight();

        // Assert
        $this->assertEquals($payload, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Templates\PlayReadyLicenseTemplate::getLicenseType
     * @covers \WindowsAzure\MediaServices\Templates\PlayReadyLicenseTemplate::setLicenseType
     */
    public function testGetSetLicenseType()
    {
        // Setup
        $entity = new PlayReadyLicenseTemplate();
        $payload = 'payload';

        // Test
        $entity->setLicenseType($payload);
        $result = $entity->getLicenseType();

        // Assert
        $this->assertEquals($payload, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Templates\PlayReadyLicenseTemplate::getContentKey
     * @covers \WindowsAzure\MediaServices\Templates\PlayReadyLicenseTemplate::setContentKey
     */
    public function testGetSetContentKey()
    {
        // Setup
        $entity = new PlayReadyLicenseTemplate();
        $payload = new ContentEncryptionKeyFromKeyIdentifier('key id');

        // Test
        $entity->setContentKey($payload);
        $result = $entity->getContentKey();

        // Assert
        $this->assertEquals($payload, $result);
    }
}
