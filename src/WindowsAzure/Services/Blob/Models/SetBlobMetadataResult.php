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
 * @package   WindowsAzure\Services\Blob\Models
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
 
namespace WindowsAzure\Services\Blob\Models;
use WindowsAzure\Resources;
use WindowsAzure\Validate;
use WindowsAzure\Core\WindowsAzureUtilities;

/**
 * Holds results of calling getBlobMetadata wrapper
 *
 * @category  Microsoft
 * @package   WindowsAzure\Services\Blob\Models
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class SetBlobMetadataResult
{
    
    /**
     * @var \DateTime
     */
    private $_lastModified;
    
    /**
     * @var string
     */
    private $_etag;
    
    /**
     * Creates SetBlobMetadataResult from response headers.
     * 
     * @param array $headers response headers
     * 
     * @return SetBlobMetadataResult
     */
    public static function create($headers)
    {
        $result = new SetBlobMetadataResult();
        $date   = $headers[Resources::LAST_MODIFIED];
        $result->setLastModified(WindowsAzureUtilities::rfc1123ToDateTime($date));
        $result->setEtag($headers[Resources::ETAG]);
        
        return $result;
    }
    
    /**
     * Gets blob lastModified.
     *
     * @return \DateTime.
     */
    public function getLastModified()
    {
        return $this->_lastModified;
    }

    /**
     * Sets blob lastModified.
     *
     * @param \DateTime $lastModified value.
     *
     * @return none.
     */
    public function setLastModified($lastModified)
    {
        Validate::isDate($lastModified);
        $this->_lastModified = $lastModified;
    }

    /**
     * Gets blob etag.
     *
     * @return string.
     */
    public function getEtag()
    {
        return $this->_etag;
    }

    /**
     * Sets blob etag.
     *
     * @param string $etag value.
     *
     * @return none.
     */
    public function setEtag($etag)
    {
        Validate::notNullOrEmpty($etag);
        $this->_etag = $etag;
    }
}

?>
