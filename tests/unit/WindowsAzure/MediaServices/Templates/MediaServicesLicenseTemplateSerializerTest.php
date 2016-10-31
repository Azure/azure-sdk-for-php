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

use WindowsAzure\MediaServices\Templates\MediaServicesLicenseTemplateSerializer;
use WindowsAzure\MediaServices\Templates\PlayReadyContentKey;
use WindowsAzure\MediaServices\Templates\PlayReadyLicenseResponseTemplate;
use WindowsAzure\MediaServices\Templates\PlayReadyLicenseTemplate;
use WindowsAzure\MediaServices\Templates\PlayReadyPlayRight;
use WindowsAzure\MediaServices\Templates\ScmsRestriction;
use WindowsAzure\MediaServices\Templates\AgcAndColorStripeRestriction;
use WindowsAzure\MediaServices\Templates\ContentEncryptionKeyFromHeader;
use WindowsAzure\MediaServices\Templates\ContentEncryptionKeyFromKeyIdentifier;
use WindowsAzure\MediaServices\Templates\ExplicitAnalogTelevisionRestriction;
use WindowsAzure\MediaServices\Templates\PlayReadyLicenseType;
use WindowsAzure\MediaServices\Templates\UnknownOutputPassingOption;
use WindowsAzure\MediaServices\Templates\ErrorMessages;

/**
 * Unit Tests for MediaServicesLicenseTemplateSerializer.
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
class MediaServicesLicenseTemplateSerializerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \WindowsAzure\MediaServices\Templates\MediaServicesLicenseTemplateSerializer::deserialize
     */
    public function testKnownGoodInput()
    {
        // Setup
        $template = '<PlayReadyLicenseResponseTemplate xmlns:i="http://www.w3.org/2001/XMLSchema-instance" xmlns="http://schemas.microsoft.com/Azure/MediaServices/KeyDelivery/PlayReadyTemplate/v1"><LicenseTemplates><PlayReadyLicenseTemplate><AllowTestDevices>true</AllowTestDevices><BeginDate i:nil="true" /><ContentKey i:type="ContentEncryptionKeyFromHeader" /><ContentType>Unspecified</ContentType><ExpirationDate i:nil="true" /><LicenseType>Nonpersistent</LicenseType><PlayRight><AgcAndColorStripeRestriction><ConfigurationData>1</ConfigurationData></AgcAndColorStripeRestriction><AllowPassingVideoContentToUnknownOutput>Allowed</AllowPassingVideoContentToUnknownOutput><AnalogVideoOpl>100</AnalogVideoOpl><CompressedDigitalAudioOpl>300</CompressedDigitalAudioOpl><CompressedDigitalVideoOpl>400</CompressedDigitalVideoOpl><DigitalVideoOnlyContentRestriction>false</DigitalVideoOnlyContentRestriction><ExplicitAnalogTelevisionOutputRestriction><BestEffort>true</BestEffort><ConfigurationData>0</ConfigurationData></ExplicitAnalogTelevisionOutputRestriction><ImageConstraintForAnalogComponentVideoRestriction>true</ImageConstraintForAnalogComponentVideoRestriction><ImageConstraintForAnalogComputerMonitorRestriction>true</ImageConstraintForAnalogComputerMonitorRestriction><ScmsRestriction><ConfigurationData>2</ConfigurationData></ScmsRestriction><UncompressedDigitalAudioOpl>250</UncompressedDigitalAudioOpl><UncompressedDigitalVideoOpl>270</UncompressedDigitalVideoOpl></PlayRight></PlayReadyLicenseTemplate></LicenseTemplates><ResponseCustomData>This is my response custom data</ResponseCustomData></PlayReadyLicenseResponseTemplate>';

        // Test
        $playreadyLicense = MediaServicesLicenseTemplateSerializer::deserialize($template);

        // Assert
        $this->assertNotNull($playreadyLicense);
        $this->assertEquals(1, count($playreadyLicense->getLicenseTemplates()));
        $licence = $playreadyLicense->getLicenseTemplates()[0];
        $this->assertEquals(true, $licence->getAllowTestDevices());
        $this->assertEquals(PlayReadyLicenseType::NON_PERSISTENT, $licence->getLicenseType());
        $this->assertEquals('This is my response custom data', $playreadyLicense->getResponseCustomData());
        $this->assertNull($licence->getBeginDate());
        $this->assertNull($licence->getExpirationDate());
        //$this->assertTrue(instanceof);
        $right = $licence->getPlayRight();
        $this->assertNotNull($right);
        $this->assertEquals(1, $right->getAgcAndColorStripeRestriction()->getConfigurationData());
        $this->assertEquals(UnknownOutputPassingOption::ALLOWED, $right->getAllowPassingVideoContentToUnknownOutput());
        $this->assertEquals(100, $right->getAnalogVideoOpl());
        $this->assertEquals(300, $right->getCompressedDigitalAudioOpl());
        $this->assertEquals(false, $right->getDigitalVideoOnlyContentRestriction());
        $this->assertEquals(true, $right->getExplicitAnalogTelevisionOutputRestriction()->getBestEffort());
        $this->assertEquals(0, $right->getExplicitAnalogTelevisionOutputRestriction()->getConfigurationData());
    }

    /**
     * @covers \WindowsAzure\MediaServices\Templates\MediaServicesLicenseTemplateSerializer::deserialize
     */
    public function testKnownGoodInputMinimalLicense()
    {
        // Setup
        $template = '<PlayReadyLicenseResponseTemplate xmlns:i="http://www.w3.org/2001/XMLSchema-instance" xmlns="http://schemas.microsoft.com/Azure/MediaServices/KeyDelivery/PlayReadyTemplate/v1"><LicenseTemplates><PlayReadyLicenseTemplate><ContentKey i:type="ContentEncryptionKeyFromHeader" /><PlayRight /></PlayReadyLicenseTemplate></LicenseTemplates></PlayReadyLicenseResponseTemplate>';

        // Test
        $playreadyLicense = MediaServicesLicenseTemplateSerializer::deserialize($template);

        // Assert
        $this->assertNotNull($playreadyLicense);
        $this->assertEquals(1, count($playreadyLicense->getLicenseTemplates()));
    }

    /**
     * @covers \WindowsAzure\MediaServices\Templates\MediaServicesLicenseTemplateSerializer::deserialize
     */
    public function testInputMissingContentKeyShouldThrow()
    {
        // Setup
        $template = '<PlayReadyLicenseResponseTemplate xmlns:i="http://www.w3.org/2001/XMLSchema-instance" xmlns="http://schemas.microsoft.com/Azure/MediaServices/KeyDelivery/PlayReadyTemplate/v1"><LicenseTemplates><PlayReadyLicenseTemplate><PlayRight /></PlayReadyLicenseTemplate></LicenseTemplates></PlayReadyLicenseResponseTemplate>';
        $this->setExpectedException('RuntimeException', "The PlayReadyLicenseTemplate must contains an 'ContentKey' element");

        // Test
        MediaServicesLicenseTemplateSerializer::deserialize($template);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Templates\MediaServicesLicenseTemplateSerializer::deserialize
     */
    public function testInputMissingPlayRightShouldThrow()
    {
        // Setup
        $template = '<PlayReadyLicenseResponseTemplate xmlns:i="http://www.w3.org/2001/XMLSchema-instance" xmlns="http://schemas.microsoft.com/Azure/MediaServices/KeyDelivery/PlayReadyTemplate/v1"><LicenseTemplates><PlayReadyLicenseTemplate><ContentKey i:type="ContentEncryptionKeyFromHeader" /></PlayReadyLicenseTemplate></LicenseTemplates></PlayReadyLicenseResponseTemplate>';
        $this->setExpectedException('RuntimeException', "The PlayReadyLicenseTemplate must contains an 'PlayRight' element");

        // Test
        MediaServicesLicenseTemplateSerializer::deserialize($template);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Templates\MediaServicesLicenseTemplateSerializer::deserialize
     */
    public function testInputMissingLicenseTemplatesShouldThrow()
    {
        // Setup
        $template = '<PlayReadyLicenseResponseTemplate xmlns:i="http://www.w3.org/2001/XMLSchema-instance" xmlns="http://schemas.microsoft.com/Azure/MediaServices/KeyDelivery/PlayReadyTemplate/v1"><LicenseTemplates></LicenseTemplates></PlayReadyLicenseResponseTemplate>';
        $this->setExpectedException('RuntimeException', ErrorMessages::AT_LEAST_ONE_LICENSE_TEMPLATE_REQUIRED);

        // Test
        MediaServicesLicenseTemplateSerializer::deserialize($template);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Templates\MediaServicesLicenseTemplateSerializer::serialize
     * @covers \WindowsAzure\MediaServices\Templates\MediaServicesLicenseTemplateSerializer::deserialize
     */
    public function testRoundTripTest()
    {
        $template = new PlayReadyLicenseResponseTemplate();
        $template->setResponseCustomData('test custom data');

        $licenseTemplate = new PlayReadyLicenseTemplate();
        $template->setLicenseTemplates([$licenseTemplate]);

        $licenseTemplate->setLicenseType(PlayReadyLicenseType::PERSISTENT);
        $licenseTemplate->setBeginDate(new \DateTime('now'));
        $licenseTemplate->setRelativeExpirationDate(new \DateInterval('PT6H'));
        $licenseTemplate->setContentKey(new ContentEncryptionKeyFromKeyIdentifier('test custom id'));

        $playRight = new PlayReadyPlayRight();
        $licenseTemplate->setPlayRight($playRight);

        $playRight->setAgcAndColorStripeRestriction(new AgcAndColorStripeRestriction(1));
        $playRight->setAllowPassingVideoContentToUnknownOutput(UnknownOutputPassingOption::ALLOWED);
        $playRight->setAnalogVideoOpl(100);
        $playRight->setCompressedDigitalAudioOpl(300);
        $playRight->setCompressedDigitalVideoOpl(400);
        $playRight->setExplicitAnalogTelevisionOutputRestriction(new ExplicitAnalogTelevisionRestriction(0, true));
        $playRight->setImageConstraintForAnalogComponentVideoRestriction(true);
        $playRight->setImageConstraintForAnalogComputerMonitorRestriction(true);
        $playRight->setScmsRestriction(new ScmsRestriction(2));
        $playRight->setUncompressedDigitalAudioOpl(250);
        $playRight->setUncompressedDigitalVideoOpl(270);

        $result = MediaServicesLicenseTemplateSerializer::serialize($template);

        $playreadyLicense = MediaServicesLicenseTemplateSerializer::deserialize($result);

        $this->assertEqualsLicenseResponseTemplate($template, $playreadyLicense);
    }

    public function assertEqualsLicenseResponseTemplate(
        PlayReadyLicenseResponseTemplate $expected,
        PlayReadyLicenseResponseTemplate $actual
    ) {
        $this->assertEquals(count($expected->getLicenseTemplates()), count($actual->getLicenseTemplates()));
        for ($i = 0; $i < count($expected->getLicenseTemplates()); ++$i) {
            $this->assertEqualsLicenseTemplate($expected->getLicenseTemplates()[$i], $actual->getLicenseTemplates()[$i]);
        }
        $this->assertEquals($expected->getResponseCustomData(), $actual->getResponseCustomData());
    }

    public function assertEqualsLicenseTemplate(
        PlayReadyLicenseTemplate $expected,
        PlayReadyLicenseTemplate $actual
    ) {
        $this->assertEquals($expected->getAllowTestDevices(), $actual->getAllowTestDevices());
        $this->assertEquals($expected->getLicenseType(), $actual->getLicenseType());
        $this->assertEquals($expected->getBeginDate(), $actual->getBeginDate());
        $this->assertEquals($expected->getExpirationDate(), $actual->getExpirationDate());
        $this->assertEquals($expected->getRelativeBeginDate(), $actual->getRelativeBeginDate());
        $this->assertEquals($expected->getRelativeExpirationDate(), $actual->getRelativeExpirationDate());
        $this->assertEquals($expected->getGracePeriod(), $actual->getGracePeriod());
        $this->assertEquals($expected->getLicenseType(), $actual->getLicenseType());
        $this->assertEqualsPlayRight($expected->getPlayRight(), $actual->getPlayRight());
        $this->assertEqualsContentKey($expected->getContentKey(), $actual->getContentKey());
    }

    public function assertEqualsContentKey(
        PlayReadyContentKey $expected, PlayReadyContentKey $actual
    ) {
        if ($expected instanceof ContentEncryptionKeyFromHeader) {
            $this->assertTrue($actual instanceof ContentEncryptionKeyFromHeader);
        }

        if ($expected instanceof ContentEncryptionKeyFromKeyIdentifier) {
            if ($actual instanceof ContentEncryptionKeyFromKeyIdentifier) {
                $this->assertEquals($expected->getKeyIdentifier(), $actual->getKeyIdentifier());
            } else {
                $this->fail();
            }
        }
    }

    public function assertEqualsPlayRight(PlayReadyPlayRight $expected, PlayReadyPlayRight $actual)
    {
        $this->assertNotNull($expected);
        $this->assertNotNull($actual);

        $this->assertEquals($expected->getAllowPassingVideoContentToUnknownOutput(), $actual->getAllowPassingVideoContentToUnknownOutput());
        $this->assertEquals($expected->getDigitalVideoOnlyContentRestriction(), $actual->getDigitalVideoOnlyContentRestriction());
        $this->assertEquals($expected->getAnalogVideoOpl(), $actual->getAnalogVideoOpl());
        $this->assertEquals($expected->getCompressedDigitalAudioOpl(), $actual->getCompressedDigitalAudioOpl());
        $this->assertEquals($expected->getImageConstraintForAnalogComponentVideoRestriction(), $actual->getImageConstraintForAnalogComponentVideoRestriction());
        $this->assertEquals($expected->getImageConstraintForAnalogComputerMonitorRestriction(), $actual->getImageConstraintForAnalogComputerMonitorRestriction());
        $this->assertEquals($expected->getCompressedDigitalVideoOpl(), $actual->getCompressedDigitalVideoOpl());
        $this->assertEquals($expected->getUncompressedDigitalAudioOpl(), $actual->getUncompressedDigitalAudioOpl());

        if ($expected->getScmsRestriction() != null) {
            $this->assertNotNull($actual->getScmsRestriction());
            $this->assertEquals($expected->getScmsRestriction()->getConfigurationData(), $actual->getScmsRestriction()->getConfigurationData());
        }

        if ($expected->getAgcAndColorStripeRestriction() != null) {
            $this->assertNotNull($actual->getAgcAndColorStripeRestriction());
            $this->assertEquals($expected->getAgcAndColorStripeRestriction()->getConfigurationData(), $actual->getAgcAndColorStripeRestriction()->getConfigurationData());
        }

        if ($expected->getExplicitAnalogTelevisionOutputRestriction() != null) {
            $this->assertNotNull($actual->getExplicitAnalogTelevisionOutputRestriction());
            $this->assertEquals($expected->getExplicitAnalogTelevisionOutputRestriction()->getBestEffort(), $actual->getExplicitAnalogTelevisionOutputRestriction()->getBestEffort());
            $this->assertEquals($expected->getExplicitAnalogTelevisionOutputRestriction()->getConfigurationData(), $actual->getExplicitAnalogTelevisionOutputRestriction()->getConfigurationData());
        }
    }
}
