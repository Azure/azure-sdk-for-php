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
 * @author    Albert Cheng <gongchen at the largest software company>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
 
namespace PEAR2\WindowsAzure\Services\Blob\Models;
use PEAR2\WindowsAzure\Resources;
use PEAR2\WindowsAzure\Validate;
use PEAR2\WindowsAzure\Utilities;
use PEAR2\WindowsAzure\Core\WindowsAzureUtilities;

/**
 * The result of copying a blob. 
 *
 * @category  Microsoft
 * @package   PEAR2\WindowsAzure\Services\Blob\Models
 * @author    Albert Cheng <gongchen at the largest software company>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class CopyBlobResult
{
    /**
     * The ETag for the destination blob. 
     * @var string
     */
    private $_eTag;
    
    /**
     * The date/time that the copy operation to the destination blob completed. 
     * @var \DateTime
     */
    private $_lastModified;
    
    /**
     * The unique identifier of the request. 
     * @var string
     */
    private $_requestId;
    
    /**
     * The version of the Blob service. 
     * @var string
     */
    private $_version;
    
    /**
     * The date/time value (in UTC) of when the response was initiatied. 
     * @var \DateTime
     */
    private $_date;
    
    /**
     * Creates CopyBlobResult object from the response of the copy blob request.
     * 
     * @param array $header HTTP response header
     * 
     * @return CopyBlobResult
     */
    public static function create($header)
    {
        $copyBlobResult = new CopyBlobesult();
        $headerWithLowerCaseKey  = Utilities::keysToLower($header);

        $copyBlobResult->setEtag($headerWithLowerCaseKey[Resources::ETAG]);
        
        $copyBlobResult->setLastModified(
            WindowsAzureUtilities::rfc1123ToDateTime(
                $headerWithLowerCaseKey[Resources::LAST_MODIFIED]
            ));
        
        $copyBlobResult->setRequestId(
            $headerWithLowerCaseKey[Resources::X_MS_REQUEST_ID]
            );
        
        $copyBlobResult->setVersion(
            $headerWithLowerCaseKey[Resources::X_MS_VERSION]
            );
        
        $copyBlobResult->setDate(
            $headerWithLowerCaseKey[Resources::DATE]
            );
        
        return $copyBlobResult;
    }
    
    /**
     * Gets ETag.
     * 
     * @return string. 
     */
    public function getETag()
    {
        return $this->_eTag;
    }

    /**
     * Sets ETag.
     */
    public function setETag($eTag)
    {
        $this->_eTag = $eTag;
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
     * Gets request ID.
     * 
     * @return string.   
     */
    public function getRequestId()
    {
        return $this->_requestId;    
    }
    
    /**
     * Sets request ID. 
     * 
     * @param string $requestId value. 
     * 
     * @return none.
     */
    public function setRequestId($requestId)
    {
        $this->_requestId = $requestId;
    }
    
    /** 
     * Gets version.  
     * 
     * @return string.
     */
    public function getVersion()
    {
        return $this->_version;
    }
    
    /**
     * Sets version. 
     * 
     * @param string $version value.
     * 
     * @return none. 
     */
    public function setVersion($version)
    {
        $this->_version = $version; 
    }
    
    /**
     * Gets date.  
     * 
     * @return \DateTime. 
     */
    public function getDate()
    {
        return $this->_date;
    }
    
    /**
     * Sets date. 
     * 
     * @param \DateTime $date value.
     * 
     * @return none; 
     */
    public function setDate($date)
    {
        $this->_date = $date; 
    }
}

?>
