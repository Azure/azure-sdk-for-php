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
 * Represents IngestManifestAsset object used in media services.
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
class IngestManifestAsset
{
    /**
     * ManifestAsset id.
     *
     * @var string
     */
    private $_id;

    /**
     * Created.
     *
     * @var \DateTime
     */
    private $_created;

    /**
     * Last modified.
     *
     * @var \DateTime
     */
    private $_lastModified;

    /**
     * ParentIngestManifestId.
     *
     * @var string
     */
    private $_parentIngestManifestId;

    /**
     * Create IngestManifestAsset from array.
     *
     * @param array $options Array containing values for object properties
     *
     * @return IngestManifestAsset
     */
    public static function createFromOptions(array $options)
    {
        Validate::notNull(
            $options['ParentIngestManifestId'],
            'options[ParentIngestManifestId]'
        );

        $asset = new self($options['ParentIngestManifestId']);
        $asset->fromArray($options);

        return $asset;
    }

    /**
     * Create IngestManifestAsset.
     *
     * @param int $parentIngestManifestId Parent IngestManifest id
     */
    public function __construct($parentIngestManifestId)
    {
        $this->_parentIngestManifestId = $parentIngestManifestId;
    }

    /**
     * Fill IngestManifestAsset from array.
     *
     * @param array $options Array containing values for object properties
     */
    public function fromArray(array $options)
    {
        if (isset($options['Id'])) {
            Validate::isString($options['Id'], 'options[Id]');
            $this->_id = $options['Id'];
        }

        if (isset($options['Created'])) {
            Validate::isDateString($options['Created'], 'options[Created]');
            $this->_created = new \DateTime($options['Created']);
        }

        if (isset($options['LastModified'])) {
            Validate::isDateString(
                $options['LastModified'],
                'options[LastModified]'
            );
            $this->_lastModified = new \DateTime($options['LastModified']);
        }

        if (isset($options['ParentIngestManifestId'])) {
            Validate::isString(
                $options['ParentIngestManifestId'],
                'options[ParentIngestManifestId]'
            );
            $this->_parentIngestManifestId = $options['ParentIngestManifestId'];
        }
    }

    /**
     * Get "ParentIngestManifestId".
     *
     * @return string
     */
    public function getParentIngestManifestId()
    {
        return $this->_parentIngestManifestId;
    }

    /**
     * Get "Last modified".
     *
     * @return \DateTime
     */
    public function getLastModified()
    {
        return $this->_lastModified;
    }

    /**
     * Get "Created".
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->_created;
    }

    /**
     * Get "ManifestAsset id".
     *
     * @return string
     */
    public function getId()
    {
        return $this->_id;
    }
}
