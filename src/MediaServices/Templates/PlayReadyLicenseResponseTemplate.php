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
 * Represents PlayReadyLicenseTemplate object used in media services.
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
class PlayReadyLicenseResponseTemplate
{
    /**
     * PlayReadyLicenseResponseTemplate LicenseTemplates.
     *
     * @var PlayReadyLicenseTemplate[]
     */
    private $_licenseTemplates;

    /**
     * PlayReadyLicenseResponseTemplate ResponseCustomData.
     *
     * @var string
     */
    private $_responseCustomData;

    /**
     * Create PlayReadyLicenseTemplate.
     */
    public function __construct()
    {
        $this->_licenseTemplates = [];
    }

    /**
     * List of licenses to be returned to the client upon a license request.  Typically this just
     * has one license template configured.
     *
     * @return PlayReadyLicenseTemplate[] LicenseTemplates
     */
    public function getLicenseTemplates()
    {
        return $this->_licenseTemplates;
    }

    /**
     * List of licenses to be returned to the client upon a license request.  Typically this just
     * has one license template configured.
     *
     * @param PlayReadyLicenseTemplate[] $value LicenseTemplates
     */
    public function setLicenseTemplates($value)
    {
        $this->_licenseTemplates = $value;
    }

    /**
     * A string returned to the client in the license response.  The client may or may not examine
     * this data but it can be used for sending data to custom client implementations or adding
     * data for diagnostic purposes.
     *
     * @return string ResponseCustomData
     */
    public function getResponseCustomData()
    {
        return $this->_responseCustomData;
    }

    /**
     * A string returned to the client in the license response.  The client may or may not examine
     * this data but it can be used for sending data to custom client implementations or adding
     * data for diagnostic purposes.
     *
     * @param string $value ResponseCustomData
     */
    public function setResponseCustomData($value)
    {
        $this->_responseCustomData = $value;
    }
}
