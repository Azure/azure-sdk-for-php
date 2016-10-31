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

namespace WindowsAzure\MediaServices\Templates;

/**
 * Represents PlayReadyPlayRight object used in media services.
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
class PlayReadyPlayRight
{
    /**
     * PlayReadyPlayRight FirstPlayExpiration.
     *
     * @var \DateInterval
     */
    private $_firstPlayExpiration;

    /**
     * PlayReadyPlayRight ScmsRestriction.
     *
     * @var ScmsRestriction
     */
    private $_scmsRestriction;

    /**
     * PlayReadyPlayRight AgcAndColorStripeRestriction.
     *
     * @var AgcAndColorStripeRestriction
     */
    private $_agcAndColorStripeRestriction;

    /**
     * PlayReadyPlayRight ExplicitAnalogTelevisionOutputRestriction.
     *
     * @var ExplicitAnalogTelevisionRestriction
     */
    private $_explicitAnalogTelevisionOutputRestriction;

    /**
     * PlayReadyPlayRight DigitalVideoOnlyContentRestriction.
     *
     * @var bool
     */
    private $_digitalVideoOnlyContentRestriction;

    /**
     * PlayReadyPlayRight ImageConstraintForAnalogComponentVideoRestriction.
     *
     * @var bool
     */
    private $_imageConstraintForAnalogComponentVideoRestriction;

    /**
     * PlayReadyPlayRight ImageConstraintForAnalogComputerMonitorRestriction.
     *
     * @var bool
     */
    private $_imageConstraintForAnalogComputerMonitorRestriction;

    /**
     * PlayReadyPlayRight AllowPassingVideoContentToUnknownOutput.
     *
     * @var string
     */
    private $_allowPassingVideoContentToUnknownOutput;

    /**
     * PlayReadyPlayRight UncompressedDigitalVideoOpl.
     *
     * @var int
     */
    private $_uncompressedDigitalVideoOpl;

    /**
     * PlayReadyPlayRight CompressedDigitalVideoOpl.
     *
     * @var int
     */
    private $_compressedDigitalVideoOpl;

    /**
     * PlayReadyPlayRight AnalogVideoOpl.
     *
     * @var int
     */
    private $_analogVideoOpl;

    /**
     * PlayReadyPlayRight CompressedDigitalAudioOpl.
     *
     * @var int
     */
    private $_compressedDigitalAudioOpl;

    /**
     * PlayReadyPlayRight UncompressedDigitalAudioOpl.
     *
     * @var int
     */
    private $_uncompressedDigitalAudioOpl;

    /**
     * Create PlayReadyPlayRight.
     */
    public function __construct()
    {
    }

    /**
     * Specifies the amount of time that the license is valid after the license is first used to play content.
     *
     * @return \DateInterval FirstPlayExpiration
     */
    public function getFirstPlayExpiration()
    {
        return $this->_firstPlayExpiration;
    }

    /**
     * Specifies the amount of time that the license is valid after the license is first used to play content.
     *
     * @param \DateInterval $value FirstPlayExpiration
     */
    public function setFirstPlayExpiration($value)
    {
        $this->_firstPlayExpiration = $value;
    }

    /**
     * Configures the Serial Copy Management System (SCMS) in the license.  SCMS is a form of audio output protection.
     * For further details see the PlayReady Compliance Rules.
     *
     * @return ScmsRestriction ScmsRestriction
     */
    public function getScmsRestriction()
    {
        return $this->_scmsRestriction;
    }

    /**
     * Configures the Serial Copy Management System (SCMS) in the license.  SCMS is a form of audio output protection.
     * For further details see the PlayReady Compliance Rules.
     *
     * @param ScmsRestriction $value ScmsRestriction
     */
    public function setScmsRestriction($value)
    {
        $this->_scmsRestriction = $value;
    }

    /**
     * Configures Automatic Gain Control (AGC) and Color Stripe in the license. These are a form of video output
     * protection. For further details see the PlayReady Compliance Rules.
     *
     * @return AgcAndColorStripeRestriction AgcAndColorStripeRestriction
     */
    public function getAgcAndColorStripeRestriction()
    {
        return $this->_agcAndColorStripeRestriction;
    }

    /**
     * Configures Automatic Gain Control (AGC) and Color Stripe in the license. These are a form of video output
     * protection. For further details see the PlayReady Compliance Rules.
     *
     * @param AgcAndColorStripeRestriction $value AgcAndColorStripeRestriction
     */
    public function setAgcAndColorStripeRestriction($value)
    {
        $this->_agcAndColorStripeRestriction = $value;
    }

    /**
     * Configures the Explicit Analog Television Output Restriction in the license. This is a form of video output
     * protection. For further details see the PlayReady Compliance Rules.
     *
     * @return ExplicitAnalogTelevisionRestriction ExplicitAnalogTelevisionRestriction
     */
    public function getExplicitAnalogTelevisionOutputRestriction()
    {
        return $this->_explicitAnalogTelevisionOutputRestriction;
    }

    /**
     * Configures the Explicit Analog Television Output Restriction in the license. This is a form of video output
     * protection. For further details see the PlayReady Compliance Rules.
     *
     * @param ExplicitAnalogTelevisionRestriction $value ExplicitAnalogTelevisionRestriction
     */
    public function setExplicitAnalogTelevisionOutputRestriction($value)
    {
        $this->_explicitAnalogTelevisionOutputRestriction = $value;
    }

    /**
     * Enables the Digital Video Only Content Restriction in the license.  This is a form of video output protection
     * which requires the player to output the video portion of the content over Digital Video Outputs.  For further
     * details see the PlayReady Compliance Rules.
     *
     * @return bool DigitalVideoOnlyContentRestriction
     */
    public function getDigitalVideoOnlyContentRestriction()
    {
        return $this->_digitalVideoOnlyContentRestriction;
    }

    /**
     * Enables the Digital Video Only Content Restriction in the license.  This is a form of video output protection
     * which requires the player to output the video portion of the content over Digital Video Outputs.  For further
     * details see the PlayReady Compliance Rules.
     *
     * @param bool $value DigitalVideoOnlyContentRestriction
     */
    public function setDigitalVideoOnlyContentRestriction($value)
    {
        $this->_digitalVideoOnlyContentRestriction = $value;
    }

    /**
     * Enables the Image Constraint For Analog Component Video Restriction in the license. This is a form of video
     * output protection which requires the player constrain the resolution of the video portion of the content when
     * outputting it over an Analog Component Video Output. For further details see the PlayReady Compliance Rules.
     *
     * @return bool ImageConstraintForAnalogComponentVideoRestriction
     */
    public function getImageConstraintForAnalogComponentVideoRestriction()
    {
        return $this->_imageConstraintForAnalogComponentVideoRestriction;
    }

    /**
     * Enables the Image Constraint For Analog Component Video Restriction in the license.  This is a form of video
     * output protection which requires the player constrain the resolution of the video portion of the content when
     * outputting it over an Analog Component Video Output. For further details see the PlayReady Compliance Rules.
     *
     * @param bool $value ImageConstraintForAnalogComponentVideoRestriction
     */
    public function setImageConstraintForAnalogComponentVideoRestriction($value)
    {
        $this->_imageConstraintForAnalogComponentVideoRestriction = $value;
    }

    /**
     * Enables the Image Constraint For Analog Computer Monitor Restriction in the license. This is a form of video
     * output protection which requires the player constrain the resolution of the video portion of the content when
     * outputting it over an Analog Computer Monitor Output. For further details see the PlayReady Compliance Rules.
     *
     * @return bool ImageConstraintForAnalogComputerMonitorRestriction
     */
    public function getImageConstraintForAnalogComputerMonitorRestriction()
    {
        return $this->_imageConstraintForAnalogComputerMonitorRestriction;
    }

    /**
     * Enables the Image Constraint For Analog Computer Monitor Restriction in the license. This is a form of video
     * output protection which requires the player constrain the resolution of the video portion of the content when
     * outputting it over an Analog Computer Monitor Output. For further details see the PlayReady Compliance Rules.
     *
     * @param bool $value ImageConstraintForAnalogComputerMonitorRestriction
     */
    public function setImageConstraintForAnalogComputerMonitorRestriction($value)
    {
        $this->_imageConstraintForAnalogComputerMonitorRestriction = $value;
    }

    /**
     * This property configures Unknown output handling settings of the license. These settings tell the PlayReady DRM
     * runtime how it should handle unknown video outputs. For further details see the PlayReady Compliance Rules.
     *
     * @return string AllowPassingVideoContentToUnknownOutput
     */
    public function getAllowPassingVideoContentToUnknownOutput()
    {
        return $this->_allowPassingVideoContentToUnknownOutput;
    }

    /**
     * This property configures Unknown output handling settings of the license. These settings tell the PlayReady DRM
     * runtime how it should handle unknown video outputs.  For further details see the PlayReady Compliance Rules.
     *
     * @param string $value AllowPassingVideoContentToUnknownOutput
     */
    public function setAllowPassingVideoContentToUnknownOutput($value)
    {
        $this->_allowPassingVideoContentToUnknownOutput = $value;
    }

    /**
     * Specifies the output protection level for uncompressed digital video.  Valid values are null, 100, 250, 270, and
     * 300. When the property is set to null, the output protection level is not set in the license. For further details
     * on the meaning of the specific value see the PlayReady Compliance Rules.
     *
     * @return int UncompressedDigitalVideoOpl
     */
    public function getUncompressedDigitalVideoOpl()
    {
        return $this->_uncompressedDigitalVideoOpl;
    }

    /**
     * Specifies the output protection level for uncompressed digital video.  Valid values are null, 100, 250, 270, and
     * 300. When the property is set to null, the output protection level is not set in the license. For further details
     * on the meaning of the specific value see the PlayReady Compliance Rules.
     *
     * @param int $value UncompressedDigitalVideoOpl
     */
    public function setUncompressedDigitalVideoOpl($value)
    {
        if ($value != 100 && $value != 250 && $value != 270 && $value != 300) {
            throw new \InvalidArgumentException(ErrorMessages::UNCOMPRESSED_DIGITAL_VIDEO_OPL_VALUE_ERROR);
        }
        $this->_uncompressedDigitalVideoOpl = $value;
    }

    /**
     * Specifies the output protection level for compressed digital video. Valid values are null, 400, and 500. When the
     * property is set to null, the output protection level is not set in the license. For further details on the
     * meaning of the specific value see the PlayReady Compliance Rules.
     *
     * @return int CompressedDigitalVideoOpl
     */
    public function getCompressedDigitalVideoOpl()
    {
        return $this->_compressedDigitalVideoOpl;
    }

    /**
     * Specifies the output protection level for compressed digital video. Valid values are null, 400, and 500. When the
     * property is set to null, the output protection level is not set in the license. For further details on the
     * meaning of the specific value see the PlayReady Compliance Rules.
     *
     * @param int $value CompressedDigitalVideoOpl
     */
    public function setCompressedDigitalVideoOpl($value)
    {
        if ($value != 400 && $value != 500) {
            throw new \InvalidArgumentException(ErrorMessages::COMPRESSED_DIGITAL_VIDEO_OPL_VALUE_ERROR);
        }
        $this->_compressedDigitalVideoOpl = $value;
    }

    /**
     * Specifies the output protection level for analog video. Valid values are null, 100, 150, and 200. When the
     * property is set to null, the output protection level is not set in the license.  For further details on the
     * meaning of the specific value see the PlayReady Compliance Rules.
     *
     * @return int AnalogVideoOpl
     */
    public function getAnalogVideoOpl()
    {
        return $this->_analogVideoOpl;
    }

    /**
     * Specifies the output protection level for analog video. Valid values are null, 100, 150, and 200. When the
     * property is set to null, the output protection level is not set in the license. For further details on the
     * meaning of the specific value see the PlayReady Compliance Rules.
     *
     * @param int $value AnalogVideoOpl
     */
    public function setAnalogVideoOpl($value)
    {
        if ($value != 100 && $value != 150 && $value != 200) {
            throw new \InvalidArgumentException(ErrorMessages::ANALOG_VIDEO_OPL_VALUE_ERROR);
        }
        $this->_analogVideoOpl = $value;
    }

    /**
     * Specifies the output protection level for compressed digital audio. Valid values are null, 100, 150, 200, 250,
     * and 300. When the property is set to null, the output protection level is not set in the license. For further
     * details on the meaning of the specific value see the PlayReady Compliance Rules.
     *
     * @return int CompressedDigitalAudioOpl
     */
    public function getCompressedDigitalAudioOpl()
    {
        return $this->_compressedDigitalAudioOpl;
    }

    /**
     * Specifies the output protection level for compressed digital audio. Valid values are null, 100, 150, 200, 250,
     * and 300. When the property is set to null, the output protection level is not set in the license. For further
     * details on the meaning of the specific value see the PlayReady Compliance Rules.
     *
     * @param int $value CompressedDigitalAudioOpl
     */
    public function setCompressedDigitalAudioOpl($value)
    {
        if ($value != 100 && $value != 150 && $value != 200 && $value != 250 && $value != 300) {
            throw new \InvalidArgumentException(ErrorMessages::COMPRESSED_DIGITAL_AUDIO_OPL_VALUE_ERROR);
        }
        $this->_compressedDigitalAudioOpl = $value;
    }

    /**
     * Specifies the output protection level for uncompressed digital audio. Valid values are 100, 150, 200, 250, and
     * 300. When the property is set to null, the output protection level is not set in the license. For further details
     * on the meaning of the specific value see the PlayReady Compliance Rules.
     *
     * @return int UncompressedDigitalAudioOpl
     */
    public function getUncompressedDigitalAudioOpl()
    {
        return $this->_uncompressedDigitalAudioOpl;
    }

    /**
     * Specifies the output protection level for uncompressed digital audio. Valid values are 100, 150, 200, 250, and
     * 300. When the property is set to null, the output protection level is not set in the license. For further details
     * on the meaning of the specific value see the PlayReady Compliance Rules.
     *
     * @param int $value UncompressedDigitalAudioOpl
     */
    public function setUncompressedDigitalAudioOpl($value)
    {
        if ($value != 100 && $value != 150 && $value != 200 && $value != 250 && $value != 300) {
            throw new \InvalidArgumentException(ErrorMessages::UNCOMPRESSED_DIGITAL_AUDIO_OPL_VALUE_ERROR);
        }
        $this->_uncompressedDigitalAudioOpl = $value;
    }
}
