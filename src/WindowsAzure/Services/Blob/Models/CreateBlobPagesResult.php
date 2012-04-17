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
use WindowsAzure\Utilities;
use WindowsAzure\Core\WindowsAzureUtilities;

/**
 * Holds result of calling create or clear blob pages
 *
 * @category  Microsoft
 * @package   WindowsAzure\Services\Blob\Models
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class CreateBlobPagesResult
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
     * @var integer
     */
    private $_sequenceNumber;
    
    /**
     * @var string
     */
    private $_contentMD5;
    
    /**
     * Creates CreateBlobPagesResult object from $parsed response in array 
     * representation
     * 
     * @param array $headers HTTP response headers
     * 
     * @return CreateBlobPagesResult
     */
    public static function create($headers)
    {
        $result = new CreateBlobPagesResult();
        $clean  = Utilities::keysToLower($headers);
        
        $date = $clean[Resources::LAST_MODIFIED];
        $date = WindowsAzureUtilities::rfc1123ToDateTime($date);
        $result->setEtag($clean[Resources::ETAG]);
        $result->setLastModified($date);
        $result->setContentMD5(
            Utilities::tryGetValue($clean, Resources::CONTENT_MD5)
        );
        $result->setSequenceNumber(
            intval(
                Utilities::tryGetValue($clean, Resources::X_MS_BLOB_SEQUENCE_NUMBER)
            )
        );
        
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
