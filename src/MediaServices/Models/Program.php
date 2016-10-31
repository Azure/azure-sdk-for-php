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
 * Represents Program object used in media services.
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
class Program
{
    /**
     * Program unique identifier.
     *
     * @var string
     */
    private $_id;

    /**
     * Program name.
     *
     * @var string
     */
    private $_name;

    /**
     * Program asset id.
     *
     * @var string
     */
    private $_assetId;

    /**
     * Program creation date.
     *
     * @var \DateTime
     */
    private $_created;

    /**
     * Program description.
     *
     * @var string
     */
    private $_description;

    /**
     * Program archive window length.
     *
     * @var \DateInterval
     */
    private $_archiveWindowLength;

    /**
     * Program last modification date.
     *
     * @var \DateTime
     */
    private $_lastModified;

    /**
     * Program streaming manifest name.
     *
     * @var string
     */
    private $_manifestName;

    /**
     * Program state.
     *
     * @var int
     */
    private $_state;

    /**
     * Program channel id.
     *
     * @var string
     */
    private $_channelId;

    /**
     * Create Program from array.
     *
     * @param array $options Array containing values for object properties
     *
     * @return Program
     */
    public static function createFromOptions($options)
    {
        $program = new self();
        $program->fromArray($options);

        return $program;
    }

    /**
     * Create Program.
     */
    public function __construct()
    {
    }

    /**
     * Fill Operation from array.
     *
     * @param array $options Array containing values for object properties
     */
    public function fromArray($options)
    {
        if (isset($options['Id'])) {
            Validate::isString($options['Id'], 'options[Id]');
            $this->_id = $options['Id'];
        }

        if (isset($options['Name'])) {
            Validate::isString($options['Name'], 'options[Name]');
            $this->_name = $options['Name'];
        }

        if (isset($options['AssetId'])) {
            Validate::isString($options['AssetId'], 'options[AssetId]');
            $this->_assetId = $options['AssetId'];
        }

        if (isset($options['Created'])) {
            Validate::isDateString($options['Created'], 'options[Created]');
            $this->_created = new \DateTime($options['Created']);
        }

        if (isset($options['Description'])) {
            Validate::isString($options['Description'], 'options[Description]');
            $this->_description = $options['Description'];
        }

        if (isset($options['ArchiveWindowLength'])) {
            Validate::isDateInterval($options['ArchiveWindowLength'], 'ArchiveWindowLength[Created]');
            $this->_archiveWindowLength = new \DateInterval($options['ArchiveWindowLength']);
        }

        if (isset($options['LastModified'])) {
            Validate::isDateString($options['LastModified'], 'options[LastModified]');
            $this->_lastModified = new \DateTime($options['LastModified']);
        }

        if (isset($options['ManifestName'])) {
            Validate::isString($options['ManifestName'], 'options[ManifestName]');
            $this->_manifestName = $options['ManifestName'];
        }

        if (isset($options['State'])) {
            Validate::isInteger($options['State'], 'options[State]');
            $this->_state = $options['State'];
        }

        if (isset($options['ChannelId'])) {
            Validate::isString($options['ChannelId'], 'options[ChannelId]');
            $this->_channelId = $options['ChannelId'];
        }
    }

    /**
     * Get the program identifier.
     *
     * @return string
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * Get the program name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * Set the program name.
     *
     * @param string $value Name
     */
    public function setName($value)
    {
        $this->_name = $value;
    }

    /**
     * Get the program asset id.
     *
     * @return string AssetId
     */
    public function getAssetId()
    {
        return $this->_assetId;
    }

    /**
     * Set the program asset id.
     *
     * @param string $value AssetId
     */
    public function setAssetId($value)
    {
        $this->_assetId = $value;
    }

    /**
     * Get the program creation date.
     *
     * @return \DateTime Created
     */
    public function getCreated()
    {
        return $this->_created;
    }

    /**
     * Get the program description.
     *
     * @return string Description
     */
    public function getDescription()
    {
        return $this->_description;
    }

    /**
     * Set the program Description.
     *
     * @param string $value Description
     */
    public function setDescription($value)
    {
        $this->_description = $value;
    }

    /**
     * Get the program archive window length.
     *
     * @return \DateInterval ArchiveWindowLength
     */
    public function getArchiveWindowLength()
    {
        return $this->_archiveWindowLength;
    }

    /**
     * Set the program archive window length.
     *
     * @param \DateInterval $value Description
     */
    public function setArchiveWindowLength($value)
    {
        $this->_archiveWindowLength = $value;
    }

    /**
     * Get the program last modified date.
     *
     * @return \DateTime LastModified
     */
    public function getLastModified()
    {
        return $this->_lastModified;
    }

    /**
     * Get the program streaming manifest name.
     *
     * @return string ManifestName
     */
    public function getManifestName()
    {
        return $this->_manifestName;
    }

    /**
     * Set the program streaming manifest name.
     *
     * @param string $value ManifestName
     */
    public function setManifestName($value)
    {
        $this->_manifestName = $value;
    }

    /**
     * Get the program State.
     *
     * @return int State
     */
    public function getState()
    {
        return $this->_state;
    }

    /**
     * Get the program parent channel Id.
     *
     * @return string channel Id
     */
    public function getChannelId()
    {
        return $this->_channelId;
    }

    /**
     * Set the program parent channel Id.
     *
     * @param string $value channel Id
     */
    public function setChannelId($value)
    {
        $this->_channelId = $value;
    }
}
