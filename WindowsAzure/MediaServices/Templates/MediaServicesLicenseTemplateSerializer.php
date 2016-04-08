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

namespace WindowsAzure\MediaServices\Templates;
use \Firebase\JWT\JWT;
use WindowsAzure\Common\Internal\Validate;
use WindowsAzure\Common\Internal\Utilities;
use WindowsAzure\Common\Internal\Resources;

/**
 * Represents PlayReadyLicenseResponseTemplate serializer helper class used in media services
 *
 * @category  Microsoft
 * @package   WindowsAzure\MediaServices\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.4.2_2016-04
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class MediaServicesLicenseTemplateSerializer
{
    /**
     * Deserialize a PlayReadyLicenseResponseTemplate xml into a PlayReadyLicenseResponseTemplate object.
     *
     * @param string $options Array containing values for object properties
     *
     * @return PlayReadyLicenseResponseTemplate
     */
    public static function deserialize($template)
    {
        $xml = simplexml_load_string($template);
        $result = new PlayReadyLicenseResponseTemplate();

        // Validation
        if ($xml->getName() !== 'PlayReadyLicenseResponseTemplate') {
            throw new \RuntimeException("This is not a PlayReadyLicenseResponseTemplate, it is a '{$xml->getName()}'");
        }
        if (!isset($xml->LicenseTemplates)) {
            throw new \RuntimeException("The PlayReadyLicenseResponseTemplate must contains an 'LicenseTemplates' element");
        }

        // decoding
        $result->setLicenseTemplates(MediaServicesLicenseTemplateSerializer::deserializeLicenseTemplates($xml->LicenseTemplates));

        if (isset($xml->ResponseCustomData)) {
            $result->setResponseCustomData((string)$xml->ResponseCustomData);
        }

        MediaServicesLicenseTemplateSerializer::ValidateLicenseResponseTemplate($result);
        
        return $result;
    }

    /**
     * Serialize a PlayReadyLicenseResponseTemplate object into a PlayReadyLicenseResponseTemplate XML
     * @param PlayReadyLicenseResponseTemplate $template
     * @return string The PlayReadyLicenseResponseTemplate XML
     */
    public static function serialize($template) {

        MediaServicesLicenseTemplateSerializer::ValidateLicenseResponseTemplate($template);

        $writer = new \XMLWriter();

        $writer->openMemory();
        $writer->startElementNS(null, 'PlayReadyLicenseResponseTemplate', Resources::PRL_XML_NAMESPACE);
        $writer->writeAttributeNS('xmlns','i', null, Resources::XSI_XML_NAMESPACE);

        MediaServicesLicenseTemplateSerializer::serializeLicenseTemplates($writer, $template->getLicenseTemplates());
        $writer->writeElement('ResponseCustomData', $template->getResponseCustomData());
        
        $writer->endElement();
        return $writer->outputMemory();
    }

    /**
     * @param PlayReadyLicenseResponseTemplate $template
     */
    private static function ValidateLicenseResponseTemplate($template) {
        // Validate the PlayReadyLicenseResponseTemplate has at least one license
        if (count($template->getLicenseTemplates()) <= 0) {
            throw new \RuntimeException(ErrorMessages::AT_LEAST_ONE_LICENSE_TEMPLATE_REQUIRED);
        }

        foreach($template->getLicenseTemplates() as $license) {
            // This is actually enforced in the DataContract with the IsRequired attribute
            // so this check should never fail.
            if ($license->getContentKey() == null) {
                throw new \RuntimeException(ErrorMessages::PLAY_READY_CONTENT_KEY_REQUIRED);
            }

            // A PlayReady license must have at least one Right in it.  Today we only
            // support the PlayRight so it is required.  In the future we might support
            // other types of rights (CopyRight, perhaps an extensible Right, whatever)
            // so we enforce this in code and not in the DataContract itself.
            if ($license->getPlayRight() == null) {
                throw new \RuntimeException(ErrorMessages::PLAY_READY_PLAY_RIGHT_REQUIRED);
            }

            //  Per the PlayReady Compliance rules (section 3.8 - Output Control for Unknown Outputs), passing content to 
            //  unknown output is prohibited if the DigitalVideoOnlyContentRestriction is enabled.
            if ($license->getPlayRight()->getDigitalVideoOnlyContentRestriction()) {
                if (($license->getPlayRight()->getAllowPassingVideoContentToUnknownOutput() == UnknownOutputPassingOption::ALLOWED) ||
                    ($license->getPlayRight()->getAllowPassingVideoContentToUnknownOutput() == UnknownOutputPassingOption::ALLOWED_WITH_VIDEO_CONSTRICTION)) {
                    throw new \RuntimeException(ErrorMessages::DIGITAL_VIDEO_ONLY_MUTUALLY_EXCLUSIVE_WITH_PASSING_TO_UNKNOWN_OUTPUT_ERROR);
                }                
            }

            //  License template should not have both BeginDate and RelativeBeginDate set.
            //  Only one of these two values should be set.
            if (($license->getBeginDate() != null) && ($license->getRelativeBeginDate() != null))
            {
                throw new \RuntimeException(ErrorMessages::BEGIN_DATE_AND_RELATIVE_BEGIN_DATE_CANNOTBE_SET_SIMULTANEOUSLY_ERROR);
            }
            
            //  License template should not have both ExpirationDate and RelativeExpirationDate set.
            //  Only one of these two values should be set.
            if (($license->getExpirationDate() != null) && ($license->getRelativeExpirationDate() != null))
            {
                throw new \RuntimeException(ErrorMessages::EXPIRATION_DATE_AND_RELATIVE_EXPIRATION_DATE_CANNOTBE_SET_SIMULTANEOUSLY_ERROR);
            }

            if ($license->getLicenseType() == PlayReadyLicenseType::NON_PERSISTENT) {
                //  The PlayReady Rights Manager SDK will return an error if you try to specify a license
                //  that is non-persistent and has a first play expiration set.  The event log message related
                //  to the error will say "LicenseGenerationFailure: FirstPlayExpiration can not be set on Non 
                //  Persistent license PlayRight."
                if ($license->getPlayRight()->getFirstPlayExpiration() != null) {
                    throw new \RuntimeException(ErrorMessages::FIRST_PLAY_EXPIRATION_CANNOT_BE_SET_ON_NON_PERSISTENT_LICENSE);
                }

                //  The PlayReady Rights Manager SDK will return an error if you try to specify a license
                //  that is non-persistent and has a GracePeriod set.
                if ($license->getGracePeriod() != null) {
                    throw new \RuntimeException(ErrorMessages::GRACE_PERIOD_CANNOT_BE_SET_ON_NON_PERSISTENT_LICENSE);
                }

                //  The PlayReady Rights Manager SDK will return an error if you try to specify a license
                //  that is non-persistent and has a GracePeriod set.  The event log message related
                //  to the error will say "LicenseGenerationFailure: BeginDate or ExpirationDate should not be set 
                //  on Non Persistent licenses"
                if ($license->getBeginDate() != null) {
                    throw new \RuntimeException(ErrorMessages::BEGIN_DATE_CANNOT_BE_SET_ON_NON_PERSISTENT_LICENSE);
                }

                //  The PlayReady Rights Manager SDK will return an error if you try to specify a license
                //  that is non-persistent and has a GracePeriod set.  The event log message related
                //  to the error will say "LicenseGenerationFailure: BeginDate or ExpirationDate should not be set 
                //  on Non Persistent licenses"
                if ($license->getExpirationDate() != null) {
                    throw new \RuntimeException(ErrorMessages::EXPIRATION_CANNOT_BE_SET_ON_NON_PERSISTENT_LICENSE);
                }
            }
        }

        return true;
    }

    /**
     *
     * @param \XMLWriter $writer XML writer
     * @param PlayReadyLicenseTemplate[] $templates
     */
    private static function serializeLicenseTemplates($writer, $templates) {
        $writer->startElement('LicenseTemplates');
        foreach($templates as $template) {           
            MediaServicesLicenseTemplateSerializer::serializeLicenseTemplate($writer, $template);
        }
        $writer->endElement();
    }

    /**
     *
     * @param \XMLWriter $writer XML writer
     * @param PlayReadyLicenseTemplate $template
     */
    private static function serializeLicenseTemplate($writer, $template) {
        $writer->startElement('PlayReadyLicenseTemplate');

        if ($template->getAllowTestDevices()) {
            $writer->writeElement('AllowTestDevices', 'true');
        }

        if ($template->getBeginDate() != null) {
            $writer->writeElement('BeginDate', $template->getBeginDate()->format(\DateTime::ATOM));
        }

        MediaServicesLicenseTemplateSerializer::serializeContentKey($writer, $template->getContentKey());

        if ($template->getExpirationDate() != null) {
            $writer->writeElement('ExpirationDate', $template->getExpirationDate()->format(\DateTime::ATOM));
        }

        if ($template->getGracePeriod() != null) {
            $writer->writeElement('GracePeriod', MediaServicesLicenseTemplateSerializer::getSpecString($template->getGracePeriod()));
        }
        
        if (!empty($template->getLicenseType())) {
            $writer->writeElement('LicenseType', (string)$template->getLicenseType());
        }

        MediaServicesLicenseTemplateSerializer::serializePlayRight($writer, $template->getPlayRight());

        if ($template->getRelativeBeginDate() != null) {
            $writer->writeElement('RelativeBeginDate', MediaServicesLicenseTemplateSerializer::getSpecString($template->getRelativeBeginDate()));
        }

        if ($template->getRelativeExpirationDate() != null) {
            $writer->writeElement('RelativeExpirationDate', MediaServicesLicenseTemplateSerializer::getSpecString($template->getRelativeExpirationDate()));
        }
        
        $writer->endElement();
    }

    /**
     * @param mixed $writer
     * @param PlayReadyPlayRight $playright
     */
    private static function serializePlayRight($writer, $playright) {
        $writer->startElement('PlayRight');
        
        if ($playright->getAgcAndColorStripeRestriction() != null) {
            $writer->startElement('AgcAndColorStripeRestriction');
            $writer->writeElement('ConfigurationData', $playright->getAgcAndColorStripeRestriction()->getConfigurationData());
            $writer->endElement();
        }

        if (!empty($playright->getAllowPassingVideoContentToUnknownOutput())) {
            $writer->writeElement('AllowPassingVideoContentToUnknownOutput', $playright->getAllowPassingVideoContentToUnknownOutput());
        }

        if ($playright->getAnalogVideoOpl() > 0) {
            $writer->writeElement('AnalogVideoOpl', $playright->getAnalogVideoOpl());
        }

        if ($playright->getCompressedDigitalAudioOpl() > 0) {
            $writer->writeElement('CompressedDigitalAudioOpl', $playright->getCompressedDigitalAudioOpl());
        }

        if ($playright->getCompressedDigitalVideoOpl() > 0) {
            $writer->writeElement('CompressedDigitalVideoOpl', $playright->getCompressedDigitalVideoOpl());
        }

        if ($playright->getDigitalVideoOnlyContentRestriction()) {
            $writer->writeElement('DigitalVideoOnlyContentRestriction', 'true');
        }

        if ($playright->getExplicitAnalogTelevisionOutputRestriction()) {
            $restriction = $playright->getExplicitAnalogTelevisionOutputRestriction();
            $writer->startElement('ExplicitAnalogTelevisionOutputRestriction');
            $writer->writeElement('BestEffort', $restriction->getBestEffort() ? 'true' : 'false');
            $writer->writeElement('ConfigurationData', $restriction->getConfigurationData());
            $writer->endElement();
        }

        if ($playright->getFirstPlayExpiration() != null) {
            $writer->writeElement('FirstPlayExpiration', MediaServicesLicenseTemplateSerializer::getSpecString($playright->getFirstPlayExpiration()));
        }

        if ($playright->getImageConstraintForAnalogComponentVideoRestriction()) {
            $writer->writeElement('ImageConstraintForAnalogComponentVideoRestriction', 'true');
        }

        if ($playright->getImageConstraintForAnalogComputerMonitorRestriction()) {
            $writer->writeElement('ImageConstraintForAnalogComputerMonitorRestriction', 'true');
        }

        if ($playright->getScmsRestriction() != null) {
            $writer->startElement('ScmsRestriction');
            $writer->writeElement('ConfigurationData', $playright->getScmsRestriction()->getConfigurationData());
            $writer->endElement();
        }

        if ($playright->getUncompressedDigitalAudioOpl() > 0) {
            $writer->writeElement('UncompressedDigitalAudioOpl', $playright->getUncompressedDigitalAudioOpl());
        }

        if ($playright->getUncompressedDigitalVideoOpl() > 0) {
            $writer->writeElement('UncompressedDigitalVideoOpl', $playright->getUncompressedDigitalVideoOpl());
        }

        $writer->endElement();    
    }

    /**
     * @param mixed $writer
     * @param PlayReadyContentKey $contentKey
     */
    private static function serializeContentKey($writer, $contentKey) {
        if ($contentKey instanceof ContentEncryptionKeyFromHeader) {
            $writer->startElement('ContentKey');
            $writer->writeAttributeNS('i', 'type', null, "ContentEncryptionKeyFromHeader");
            $writer->endElement();
        }

        if ($contentKey instanceof ContentEncryptionKeyFromKeyIdentifier) {
            $writer->startElement('ContentKey');
            $writer->writeAttributeNS('i', 'type', null, "ContentEncryptionKeyFromKeyIdentifier");
            $writer->writeElement("KeyIdentifier", $contentKey->getKeyIdentifier());
            $writer->endElement();            
        }
    }

    /**
     * @param mixed $xmlElement
     * @return PlayReadyLicenseTemplate[]
     */
    private static function deserializeLicenseTemplates($xmlElement) {
        $result = array();

        foreach($xmlElement->children() as $child) {
            $result[] = MediaServicesLicenseTemplateSerializer::deserializePlayReadyLicenseTemplate($child);
        }

        return $result;
    }

    /**
     * @param mixed $xmlElement
     * @return PlayReadyLicenseTemplate
     */
    private static function deserializePlayReadyLicenseTemplate($xmlElement) {

        if (!isset($xmlElement->PlayRight)) {
            throw new \RuntimeException("The PlayReadyLicenseTemplate must contains an 'PlayRight' element");
        }

        if (!isset($xmlElement->ContentKey)) {
            throw new \RuntimeException("The PlayReadyLicenseTemplate must contains an 'ContentKey' element");
        }
        
        $result = new PlayReadyLicenseTemplate();

        if (isset($xmlElement->AllowTestDevices)) {
            $result->setAllowTestDevices($xmlElement->AllowTestDevices == "true");
        }

        if (isset($xmlElement->BeginDate)) {
            if (isset($xmlElement->BeginDate->attributes(Resources::XSI_XML_NAMESPACE)->nil) &&
                $xmlElement->BeginDate->attributes(Resources::XSI_XML_NAMESPACE)->nil == "true") {
                $result->setBeginDate(null);
            } else {
                $result->setBeginDate(new \DateTime((string)$xmlElement->BeginDate));
            }            
        }

        if (isset($xmlElement->ExpirationDate)) {
            if (isset($xmlElement->ExpirationDate->attributes(Resources::XSI_XML_NAMESPACE)->nil) &&
               $xmlElement->ExpirationDate->attributes(Resources::XSI_XML_NAMESPACE)->nil == "true") {
                $result->setExpirationDate(null);
            } else {
                $result->setExpirationDate(new \DateTime((string)$xmlElement->setExpirationDate));
            }    
        }

        if (isset($xmlElement->RelativeBeginDate)) {
            $result->setRelativeBeginDate(new \DateInterval((string)$xmlElement->RelativeBeginDate));
        }

        if (isset($xmlElement->RelativeExpirationDate)) {
            $result->setRelativeExpirationDate(new \DateInterval((string)$xmlElement->RelativeExpirationDate));
        }

        if (isset($xmlElement->GracePeriod)) {
            $result->setGracePeriod(new \DateInterval((string)$xmlElement->GracePeriod));
        }

        $result->setPlayRight(MediaServicesLicenseTemplateSerializer::deserializePlayReadyPlayRight($xmlElement->PlayRight));

        if (isset($xmlElement->LicenseType)) {
            $result->setLicenseType((string)$xmlElement->LicenseType);
        }

        $result->setContentKey(MediaServicesLicenseTemplateSerializer::deserializePlayReadyContentKey($xmlElement->ContentKey));

        return $result;  
    }

    /**
     * @param mixed $xmlElement
     * @return PlayReadyPlayRight PlayReadyPlayRight
     */
    private static function deserializePlayReadyPlayRight($xmlElement) {

        $result = new PlayReadyPlayRight();
        
        if (isset($xmlElement->FirstPlayExpiration)) {
            $result->setFirstPlayExpiration(new \DateInterval((string)$xmlElement->FirstPlayExpiration));
        }

        if (isset($xmlElement->ScmsRestriction) && isset($xmlElement->ScmsRestriction->ConfigurationData)) {
            $result->setScmsRestriction(new ScmsRestriction(intval((string)$xmlElement->ScmsRestriction->ConfigurationData)));
        }

        if (isset($xmlElement->AgcAndColorStripeRestriction) && isset($xmlElement->AgcAndColorStripeRestriction->ConfigurationData)) {
            $result->setAgcAndColorStripeRestriction(new AgcAndColorStripeRestriction(intval((string)$xmlElement->AgcAndColorStripeRestriction->ConfigurationData)));
        }

        if (isset($xmlElement->ExplicitAnalogTelevisionOutputRestriction) && isset($xmlElement->ExplicitAnalogTelevisionOutputRestriction->ConfigurationData)) {
            $bestEffort = false;
            if (isset($xmlElement->ExplicitAnalogTelevisionOutputRestriction->BestEffort)) {
                $bestEffort = $xmlElement->ExplicitAnalogTelevisionOutputRestriction->BestEffort  == "true";
            }
            $configurationData = intval((string)$xmlElement->ExplicitAnalogTelevisionOutputRestriction->ConfigurationData);
            $result->setExplicitAnalogTelevisionOutputRestriction(new ExplicitAnalogTelevisionRestriction($configurationData, $bestEffort));            
        }

        if (isset($xmlElement->DigitalVideoOnlyContentRestriction)) {
            $result->setDigitalVideoOnlyContentRestriction($xmlElement->DigitalVideoOnlyContentRestriction == "true");
        }

        if (isset($xmlElement->ImageConstraintForAnalogComponentVideoRestriction)) {
            $result->setImageConstraintForAnalogComponentVideoRestriction($xmlElement->ImageConstraintForAnalogComponentVideoRestriction == "true");
        }

        if (isset($xmlElement->ImageConstraintForAnalogComputerMonitorRestriction)) {
            $result->setImageConstraintForAnalogComputerMonitorRestriction($xmlElement->ImageConstraintForAnalogComputerMonitorRestriction == "true");
        }

        if (isset($xmlElement->AllowPassingVideoContentToUnknownOutput)) {
            $result->setAllowPassingVideoContentToUnknownOutput((string)$xmlElement->AllowPassingVideoContentToUnknownOutput);
        }

        if (isset($xmlElement->UncompressedDigitalVideoOpl)) {
            $result->setUncompressedDigitalVideoOpl((int)$xmlElement->UncompressedDigitalVideoOpl);
        }

        if (isset($xmlElement->CompressedDigitalVideoOpl)) {
            $result->setCompressedDigitalVideoOpl((int)$xmlElement->CompressedDigitalVideoOpl);
        }

        if (isset($xmlElement->AnalogVideoOpl)) {
            $result->setAnalogVideoOpl((int)$xmlElement->AnalogVideoOpl);
        }

        if (isset($xmlElement->CompressedDigitalAudioOpl)) {
            $result->setCompressedDigitalAudioOpl((int)$xmlElement->CompressedDigitalAudioOpl);
        }

        if (isset($xmlElement->UncompressedDigitalAudioOpl)) {
            $result->setUncompressedDigitalAudioOpl((int)$xmlElement->UncompressedDigitalAudioOpl);
        }

        return $result;
    }

    /**
     * @param mixed $xmlElement
     * @return PlayReadyContentKey PlayReadyContentKey
     */
    private static function deserializePlayReadyContentKey($xmlElement) {
        $type = $xmlElement->attributes(Resources::XSI_XML_NAMESPACE)->type;

        if ($type == "ContentEncryptionKeyFromHeader") {
            return new ContentEncryptionKeyFromHeader();
        }

        if ($type == "ContentEncryptionKeyFromKeyIdentifier") {
            return new ContentEncryptionKeyFromKeyIdentifier($xmlElement->KeyIdentifier);
        }
       
        throw new \RuntimeException("Unknown PlayReadyContentKey type={$type}");        
    }


    private static function getSpecString(\DateInterval $delta){
        $date = array_filter(array('Y' => $delta->y, 'M' => $delta->m, 'D' => $delta->d));
        $time = array_filter(array('H' => $delta->h, 'M' => $delta->i, 'S' => $delta->s));

        foreach($date as $key => &$value) $value = $value.$key;
        foreach($time as $key => &$value) $value = $value.$key;

        $spec = 'P' . implode('', $date);            
        
        if(count($time)>0) $spec .= 'T' . implode('', $time);
        return $spec;        
    }   
}


