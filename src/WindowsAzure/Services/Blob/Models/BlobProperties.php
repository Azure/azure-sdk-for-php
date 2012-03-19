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
 * @package   PEAR2\WindowsAzure\Services\Blob\Models
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
 
namespace PEAR2\WindowsAzure\Services\Blob\Models;
use PEAR2\WindowsAzure\Validate;
use PEAR2\WindowsAzure\Resources;
use PEAR2\WindowsAzure\Core\WindowsAzureUtilities;

/**
 * Represents blob properties
 *
 * @category  Microsoft
 * @package   PEAR2\WindowsAzure\Services\Blob\Models
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class BlobProperties
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
     * @var string
     */
    private $_contentType;
    
    /**
     * @var integer
     */
    private $_contentLength;
    
    /**
     * @var string
     */
    private $_contentEncoding;
    
    /**
     * @var string
     */
    private $_contentLanguage;
    
    /**
     * @var string
     */
    private $_contentMD5;
    
    /**
     * @var string
     */
    private $_cacheControl;
    
    /**
     * @var string
     */
    private $_blobType;
    
    /**
     * @var string
     */
    private $_leaseStatus;
    
    /**
     * @var integer
     */
    private $_sequenceNumber;
    
    /**
     * Creates BlobProperties object from $parsed response in array representation
     * 
     * @param array $parsed parsed response in array format.
     * 
     * @return BlobProperties
     */
    public static function create($parsed)
    {
        $result = new BlobProperties();
        
        $result->setBlobType($parsed['BlobType']);
        $result->setCacheControl($parsed['Cache-Control']);
        $result->setContentEncoding($parsed['Content-Encoding']);
        $result->setContentLanguage($parsed['Content-Language']);
        $result->setContentLength(intval($parsed['Content-Length']));
        $result->setContentMD5($parsed['Content-MD5']);
        $result->setContentType($parsed['Content-Type']);
        $result->setEtag($parsed['Etag']);
        $date = WindowsAzureUtilities::rfc1123ToDateTime($parsed['Last-Modified']);
        $result->setLastModified($date);
        $result->setLeaseStatus($parsed['LeaseStatus']);
        $result->setSequenceNumber(intval(Resources::X_MS_BLOB_SEQUENCE_NUMBER));
        
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
    
    /**
     * Gets blob contentType.
     *
     * @return string.
     */
    public function getContentType()
    {
        return $this->_contentType;
    }

    /**
     * Sets blob contentType.
     *
     * @param string $contentType value.
     *
     * @return none.
     */
    public function setContentType($contentType)
    {
        $this->_contentType = $contentType;
    }
    
    /**
     * Gets blob contentLength.
     *
     * @return integer.
     */
    public function getContentLength()
    {
        return $this->_contentLength;
    }

    /**
     * Sets blob contentLength.
     *
     * @param integer $contentLength value.
     *
     * @return none.
     */
    public function setContentLength($contentLength)
    {
        Validate::isInteger($contentLength);
        $this->_contentLength = $contentLength;
    }
    
    /**
     * Gets blob contentEncoding.
     *
     * @return string.
     */
    public function getContentEncoding()
    {
        return $this->_contentEncoding;
    }

    /**
     * Sets blob contentEncoding.
     *
     * @param string $contentEncoding value.
     *
     * @return none.
     */
    public function setContentEncoding($contentEncoding)
    {
        $this->_contentEncoding = $contentEncoding;
    }
    
    /**
     * Gets blob contentLanguage.
     *
     * @return string.
     */
    public function getContentLanguage()
    {
        return $this->_contentLanguage;
    }

    /**
     * Sets blob contentLanguage.
     *
     * @param string $contentLanguage value.
     *
     * @return none.
     */
    public function setContentLanguage($contentLanguage)
    {
        $this->_contentLanguage = $contentLanguage;
    }
    
    /**
     * Gets blob contentMD5.
     *
     * @return string.
     */
    public function getContentMD5()
    {
        return $this->_contentMD5;
    }

    /**
     * Sets blob contentMD5.
     *
     * @param string $contentMD5 value.
     *
     * @return none.
     */
    public function setContentMD5($contentMD5)
    {
        $this->_contentMD5 = $contentMD5;
    }
    
    /**
     * Gets blob cacheControl.
     *
     * @return string.
     */
    public function getCacheControl()
    {
        return $this->_cacheControl;
    }

    /**
     * Sets blob cacheControl.
     *
     * @param string $cacheControl value.
     *
     * @return none.
     */
    public function setCacheControl($cacheControl)
    {
        $this->_cacheControl = $cacheControl;
    }
    
    /**
     * Gets blob blobType.
     *
     * @return string.
     */
    public function getBlobType()
    {
        return $this->_blobType;
    }

    /**
     * Sets blob blobType.
     *
     * @param string $blobType value.
     *
     * @return none.
     */
    public function setBlobType($blobType)
    {
        $this->_blobType = $blobType;
    }
    
    /**
     * Gets blob leaseStatus.
     *
     * @return string.
     */
    public function getLeaseStatus()
    {
        return $this->_leaseStatus;
    }

    /**
     * Sets blob leaseStatus.
     *
     * @param string $leaseStatus value.
     *
     * @return none.
     */
    public function setLeaseStatus($leaseStatus)
    {
        $this->_leaseStatus = $leaseStatus;
    }
    
    /**
     * Gets blob sequenceNumber.
     *
     * @return int.
     */
    public function getSequenceNumber()
    {
        return $this->_sequenceNumber;
    }

    /**
     * Sets blob sequenceNumber.
     *
     * @param int $sequenceNumber value.
     *
     * @return none.
     */
    public function setSequenceNumber($sequenceNumber)
    {
        Validate::isInteger($sequenceNumber);
        $this->_sequenceNumber = $sequenceNumber;
    }
}

?>
