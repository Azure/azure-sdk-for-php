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

namespace WindowsAzure\MediaServices\Models;

use WindowsAzure\Common\Internal\Validate;

/**
 * Represents Encoding ComplexType object used in media services.
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
class ChannelEncoding
{
    /**
     * Encoding AdMarkerSource.
     *
     * @var string
     */
    private $_adMarkerSource;

    /**
     * Encoding IgnoreCea708ClosedCaptions.
     *
     * @var bool
     */
    private $_ignoreCea708ClosedCaptions = false;

    /**
     * Encoding VideoStreams.
     *
     * @var VideoStream[]
     */
    private $_videoStreams;

    /**
     * Encoding AudioStreams.
     *
     * @var AudioStream[]
     */
    private $_audioStreams;

    /**
     * Encoding SystemPreset.
     *
     * @var string
     */
    private $_systemPreset;

    /**
     * Create Encoding from array.
     *
     * @param array $options Array containing values for object properties
     *
     * @return ChannelEncoding
     */
    public static function createFromOptions(array $options)
    {
        $operation = new self();
        $operation->fromArray($options);

        return $operation;
    }

    /**
     * Create Encoding.
     */
    public function __construct()
    {
        $this->_videoStreams = [];
        $this->_audioStreams = [];
    }

    /**
     * Fill Encoding from array.
     *
     * @param array $options Array containing values for object properties
     */
    public function fromArray($options)
    {
        if (isset($options['AdMarkerSource'])) {
            Validate::isString($options['AdMarkerSource'], 'options[AdMarkerSource]');
            $this->_adMarkerSource = $options['AdMarkerSource'];
        }

        if (isset($options['IgnoreCea708ClosedCaptions'])) {
            Validate::isString($options['IgnoreCea708ClosedCaptions'], 'options[IgnoreCea708ClosedCaptions]');
            $this->_ignoreCea708ClosedCaptions = (bool) $options['IgnoreCea708ClosedCaptions'];
        }

        if (!empty($options['VideoStreams'])) {
            Validate::isArray($options['VideoStreams'], 'options[VideoStreams]');
            foreach ($options['VideoStreams'] as $videoStream) {
                $this->_videoStreams[] = VideoStream::createFromOptions($videoStream);
            }
        }

        if (!empty($options['AudioStreams'])) {
            Validate::isArray($options['AudioStreams'], 'options[AudioStreams]');
            foreach ($options['AudioStreams'] as $audioStream) {
                $this->_audioStreams[] = AudioStream::createFromOptions($audioStream);
            }
        }

        if (isset($options['SystemPreset'])) {
            Validate::isString($options['SystemPreset'], 'options[SystemPreset]');
            $this->_systemPreset = $options['SystemPreset'];
        }
    }

    /**
     * Get the Encoding AdMarkerSource.
     *
     * @return string
     */
    public function getAdMarkerSource()
    {
        return $this->_adMarkerSource;
    }

    /**
     * Set the Encoding AdMarkerSource.
     *
     * @param string $value Encoding AdMarkerSource
     */
    public function setAdMarkerSource($value)
    {
        $this->_adMarkerSource = $value;
    }

    /**
     * Get the Encoding IgnoreCea708ClosedCaptions.
     *
     * @return string
     */
    public function getIgnoreCea708ClosedCaptions()
    {
        return $this->_ignoreCea708ClosedCaptions;
    }

    /**
     * Set the Encoding IgnoreCea708ClosedCaptions.
     *
     * @param string $value Encoding IgnoreCea708ClosedCaptions
     */
    public function setIgnoreCea708ClosedCaptions($value)
    {
        $this->_ignoreCea708ClosedCaptions = $value;
    }

    /**
     * Get the Encoding VideoStream.
     *
     * @return VideoStream[]
     */
    public function getVideoStreams()
    {
        return $this->_videoStreams;
    }

    /**
     * Set the Encoding VideoStreams.
     *
     * @param VideoStream[] $value Encoding VideoStreams
     */
    public function setVideoStreams(array $value)
    {
        $this->_videoStreams = $value;
    }

    /**
     * Get the Encoding AudioStreams.
     *
     * @return AudioStream[]
     */
    public function getAudioStreams()
    {
        return $this->_audioStreams;
    }

    /**
     * Set the Encoding AudioStreams.
     *
     * @param AudioStream[] $value Encoding AudioStreams
     */
    public function setAudioStreams(array $value)
    {
        $this->_audioStreams = $value;
    }

    /**
     * Get the Encoding SystemPreset.
     *
     * @return string
     */
    public function getSystemPreset()
    {
        return $this->_systemPreset;
    }

    /**
     * Set the Encoding SystemPreset.
     *
     * @param string $value Encoding SystemPreset
     */
    public function setSystemPreset($value)
    {
        $this->_systemPreset = $value;
    }
}
