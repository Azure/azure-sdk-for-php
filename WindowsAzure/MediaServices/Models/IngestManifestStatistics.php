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

namespace WindowsAzure\MediaServices\Models;
use WindowsAzure\Common\Internal\Validate;



/**
 * Represents IngestManifestStatistics object used in media services
 *
 * @category  Microsoft
 * @package   WindowsAzure\MediaServices\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.4.2_2016-04
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class IngestManifestStatistics
{
    /**
     * PendingFilesCount
     *
     * @var int
     */
    private $_pendingFilesCount;

    /**
     * FinishedFilesCount
     *
     * @var int
     */
    private $_finishedFilesCount;

    /**
     * ErrorFilesCount
     *
     * @var int
     */
    private $_errorFilesCount;

    /**
     * ErrorFilesDetails
     *
     * @var string
     */
    private $_errorFilesDetails;

    /**
     * Create ManifestStatistics from array
     *
     * @param array $options Array containing values for object properties
     *
     * @return WindowsAzure\MediaServices\Models\IngestManifestStatistics
     */
    public static function createFromOptions($options)
    {
        $statistics = new IngestManifestStatistics();
        $statistics->fromArray($options);

        return $statistics;
    }

    /**
     * Fill ManifestStatistics from array
     *
     * @param array $options Array containing values for object properties
     *
     * @return none
     */
    public function fromArray($options)
    {
        if (isset($options['PendingFilesCount'])) {
            Validate::isInteger(
                $options['PendingFilesCount'],
                'options[PendingFilesCount]'
            );
            $this->_pendingFilesCount = $options['PendingFilesCount'];
        }

        if (isset($options['FinishedFilesCount'])) {
            Validate::isInteger(
                $options['FinishedFilesCount'],
                'options[FinishedFilesCount]'
            );
            $this->_finishedFilesCount = $options['FinishedFilesCount'];
        }

        if (isset($options['ErrorFilesCount'])) {
            Validate::isInteger(
                $options['ErrorFilesCount'],
                'options[ErrorFilesCount]'
            );
            $this->_errorFilesCount = $options['ErrorFilesCount'];
        }

        if (isset($options['ErrorFilesDetails'])) {
            Validate::isString(
                $options['ErrorFilesDetails'],
                'options[ErrorFilesDetails]'
            );
            $this->_errorFilesDetails = $options['ErrorFilesDetails'];
        }
    }

    /**
     * Get "ErrorFilesDetails"
     *
     * @return string
     */
    public function getErrorFilesDetails()
    {
        return $this->_errorFilesDetails;
    }

    /**
     * Get "ErrorFilesCount"
     *
     * @return int
     */
    public function getErrorFilesCount()
    {
        return $this->_errorFilesCount;
    }

    /**
     * Get "FinishedFilesCount"
     *
     * @return int
     */
    public function getFinishedFilesCount()
    {
        return $this->_finishedFilesCount;
    }

    /**
     * Get "PendingFilesCount"
     *
     * @return int
     */
    public function getPendingFilesCount()
    {
        return $this->_pendingFilesCount;
    }
}


