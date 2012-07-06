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
 * @package   WindowsAzure\Blob\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
 
namespace WindowsAzure\Blob\Models;
use WindowsAzure\Common\Internal\Validate;

/**
 * Optional parameters for setBlobProperties wrapper
 *
 * @category  Microsoft
 * @package   WindowsAzure\Blob\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class SetBlobPropertiesOptions extends BlobServiceOptions
{
    /**
     * @var string
     */
    private $_blobContentType;
    
    /**
     * @var string
     */
    private $_blobContentEncoding;
    
    /**
     * @var string
     */
    private $_blobContentLanguage;
    
    /**
     * @var integer
     */
    private $_blobContentLength;
    
    /**
     * @var string
     */
    private $_blobContentMD5;
    
    /**
     * @var string
     */
    private $_blobCacheControl;
    
    /**
     * @var string
     */
    private $_leaseId;
    
    /**
     * @var integer
     */
    private $_sequenceNumber;
    
    /**
     * @var string
     */
    private $_sequenceNumberAction;
    
    /**
     * @var AccessCondition
     */
    private $_accessCondition;
    
    /**
     * Gets access condition
     * 
     * @return AccessCondition
     */
    public function getAccessCondition()
    {
        return $this->_accessCondition;
    }
    
    /**
     * Sets access condition
     * 
     * @param AccessCondition $accessCondition value to use.
     * 
     * @return none.
     */
    public function setAccessCondition($accessCondition)
    {
        $this->_accessCondition = $accessCondition;
    }
    
    /**
     * Gets blob sequenceNumber.
     *
     * @return integer.
     */
    public function getSequenceNumber()
    {
        return $this->_sequenceNumber;
    }

    /**
     * Sets blob sequenceNumber.
     *
     * @param integer $sequenceNumber value.
     *
     * @return none.
     */
    public function setSequenceNumber($sequenceNumber)
    {
        Validate::isInteger($sequenceNumber, 'sequenceNumber');
        $this->_sequenceNumber = $sequenceNumber;
    }
    
    /**
     * Gets lease Id for the blob
     * 
     * @return string
     */
    public function getSequenceNumberAction()
    {
        return $this->_sequenceNumberAction;
    }
    
    /**
     * Sets lease Id for the blob
     * 
     * @param string $sequenceNumberAction action.
     * 
     * @return none
     */
    public function setSequenceNumberAction($sequenceNumberAction)
    {
        $this->_sequenceNumberAction = $sequenceNumberAction;
    }
    
    /**
     * Gets lease Id for the blob
     * 
     * @return string
     */
    public function getLeaseId()
    {
        return $this->_leaseId;
    }
    
    /**
     * Sets lease Id for the blob
     * 
     * @param string $leaseId the blob lease id.
     * 
     * @return none
     */
    public function setLeaseId($leaseId)
    {
        $this->_leaseId = $leaseId;
    }
    
    /**
     * Gets blob blobContentLength.
     *
     * @return integer.
     */
    public function getBlobContentLength()
    {
        return $this->_blobContentLength;
    }

    /**
     * Sets blob blobContentLength.
     *
     * @param integer $blobContentLength value.
     *
     * @return none.
     */
    public function setBlobContentLength($blobContentLength)
    {
        Validate::isInteger($blobContentLength, 'blobContentLength');
        $this->_blobContentLength = $blobContentLength;
    }
    
    /**
     * Gets blob ContentType.
     *
     * @return string.
     */
    public function getBlobContentType()
    {
        return $this->_blobContentType;
    }

    /**
     * Sets blob ContentType.
     *
     * @param string $blobContentType value.
     *
     * @return none.
     */
    public function setBlobContentType($blobContentType)
    {
        $this->_blobContentType = $blobContentType;
    }
    
    /**
     * Gets blob ContentEncoding.
     *
     * @return string.
     */
    public function getBlobContentEncoding()
    {
        return $this->_blobContentEncoding;
    }

    /**
     * Sets blob ContentEncoding.
     *
     * @param string $blobContentEncoding value.
     *
     * @return none.
     */
    public function setBlobContentEncoding($blobContentEncoding)
    {
        $this->_blobContentEncoding = $blobContentEncoding;
    }
    
    /**
     * Gets blob ContentLanguage.
     *
     * @return string.
     */
    public function getBlobContentLanguage()
    {
        return $this->_blobContentLanguage;
    }

    /**
     * Sets blob ContentLanguage.
     *
     * @param string $blobContentLanguage value.
     *
     * @return none.
     */
    public function setBlobContentLanguage($blobContentLanguage)
    {
        $this->_blobContentLanguage = $blobContentLanguage;
    }
    
    /**
     * Gets blob ContentMD5.
     *
     * @return string.
     */
    public function getBlobContentMD5()
    {
        return $this->_blobContentMD5;
    }

    /**
     * Sets blob ContentMD5.
     *
     * @param string $blobContentMD5 value.
     *
     * @return none.
     */
    public function setBlobContentMD5($blobContentMD5)
    {
        $this->_blobContentMD5 = $blobContentMD5;
    }
    
    /**
     * Gets blob cache control.
     *
     * @return string.
     */
    public function getBlobCacheControl()
    {
        return $this->_blobCacheControl;
    }
    
    /**
     * Sets blob cacheControl.
     *
     * @param string $blobCacheControl value to use.
     * 
     * @return none.
     */
    public function setBlobCacheControl($blobCacheControl)
    {
        $this->_blobCacheControl = $blobCacheControl;
    }
}


