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
 
namespace WindowsAzure\Services\Blob\Models;
use WindowsAzure\Validate;

/**
 * optional parameters for CopyBlobOptions wrapper
 *
 * @category  Microsoft
 * @package   PEAR2\WindowsAzure\Services\Blob\Models
 * @author    Albert Cheng <gongchen at the largest software company>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class CopyBlobOptions extends BlobServiceOptions
{ 
    /**
     * @var AccessCondition
     */
    private $_accessCondition;
    
    /**
     * @var \Date
     */
    private $_date;

    /**
     * @var string
     */
    private $_copySource;
    
    /**
     * @var array
     */
    private $_metadata;
    
    /**
     * @var \DateTime
     */
    private $_sourceIfModifiedSince;
    
    /**
     * @var \DateTime
     */
    private $_sourceIfUnModifiedSince;
    
    /**
     * @var string
     */
    private $_sourceIfMatch;
    
    /**
     * @var string
     */
    private $_sourceIfNoneMatch; 
    
    /**
     * @var string 
     */
    private $_sourceSnapshot;
    
    /**
     * @var \DateTime
     */
    private $_ifModifiedSince; 
    
    /**
     * @var \DateTime
     */
    private $_ifUnmodifiedSince; 
    
    /** 
     * @var string
     */
    private $_ifMatch;
    
    /**
     * @var string
     */
    private $_ifNoneMatch; 
    
    /**
     * @var string
     */
    private $_leaseId;
    
    /**
     * @var sourceLeaseId
     */
    private $_sourceLeaseId;
    
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
     * Gets the Coordinated Universal Time (UTC) for the request.
     *
     * @return \DateTime.
     */
    public function getDate()
    {
        return $this->_date;
    }

    /**
     * Sets the Coordinated Universal Time (UTC) for the request.
     *
     * @param \DateTime $date value.
     *
     * @return none.
     */
    public function setDate($date)
    {
        $this->_date = $date;
    }
    
    /**
     * Gets copy source.
     *
     * @return string.
     */
    public function getCopySource()
    {
        return $this->_copySource;
    }

    /**
     * Sets copy source.
     *
     * @param string $copySource value.
     *
     * @return none.
     */
    public function setCopySource($copySource)
    {
        $this->_copySource = $copySource;
    }
    
    /**
     * Gets metadata.
     *
     * @return array.
     */
    public function getMetadata()
    {
        return $this->_metadata;
    }

    /**
     * Sets metadata.
     *
     * @param array $metadata value.
     *
     * @return none.
     */
    public function setMetadata($metadata)
    {
        $this->_metadata = $metadata;
    }
    
    /**
     * Gets source if modified since.
     *
     * @return \DateTime.
     */
    public function getSourceIfModifiedSince()
    {
        return $this->_sourceIfModifiedSince;
    }
    
    /**
     * Sets source if modified since.
     *
     * @param \DateTime $sourceIfModifiedSince value to use.
     * 
     * @return none.
     */
    public function setSourceIfModifiedSince($sourceIfModifiedSince)
    {
        $this->_sourceIfModifiedSince = $sourceIfModifiedSince;
    }
    
    /**
     * Gets source if unmodified since.
     *
     * @return \DateTime.
     */
    public function getSourceIfUnmodifiedSince()
    {
        return $this->_sourceIfUnModifiedSince;
    }

    /**
     * Sets source if unmodified since.
     *
     * @param \DateTime $sourceIfUnmodifiedSince value.
     *
     * @return none.
     */
    public function setSourceIfUnmodifiedSince($sourceIfUnmodifiedSince)
    {
        $this->_sourceIfUnModifiedSince = $sourceIfUnmodifiedSince;
    }
    
    /**
     * Gets source if match.
     *
     * @return string.
     */
    public function getSourceIfMatch()
    {
        return $this->_sourceIfMatch;
    }

    /**
     * Sets source if match.
     *
     * @param string $sourceIfMatch value.
     *
     * @return none.
     */
    public function setSourceIfMatch($sourceIfMatch)
    {
        $this->_sourceIfMatch = $sourceIfMatch;
    }
    
    /**
     * Gets source if none match.
     *
     * @return string.
     */
    public function getSourceIfNoneMatch()
    {
        return $this->_sourceIfNoneMatch;
    }

    /**
     * Sets source if none match.
     *
     * @param $sourceIfNoneMatch value.
     *
     * @return none.
     */
    public function setSourceIfNoneMatch($sourceIfNoneMatch)
    {
        $this->_sourceIfNoneMatch = $sourceIfNoneMatch;
    }
    
    /**
     * Gets source snapshot. 
     * 
     * @return string
     */
    public function getSourceSnapshot()
    {
        return $this->_sourceSnapshot;
    }
       
    /**
     * Sets source snapshot. 
     * 
     * @param type $sourceSnapshot 
     * 
     * @return none
     */
    public function setSourceSnapshot($sourceSnapshot)
    {
        $this->_sourceSnapshot = $sourceSnapshot;
    }
    
    /**
     * Gets if modified since.
     *
     * @return \DateTime.
     */
    public function getIfModifiedSince()
    {
        return $this->_ifModifiedSince;
    }

    /**
     * Sets if modified since.
     *
     * @param \DateTime $ifModifiedSince value.
     *
     * @return none.
     */
    public function setIfModifiedSince($ifModifiedSince)
    {
        $this->_ifModifiedSince = $ifModifiedSince;
    }
    
    /**
     * Gets if unmodified since.
     *
     * @return \DateTime.
     */
    public function getIfUnmodifiedSince()
    {
        return $this->_ifUnmodifiedSince;
    }

    /**
     * Sets if unmodified since.
     *
     * @param \DateTime $ifUnmodifiedSince value.
     *
     * @return none.
     */
    public function setIfUnmodifiedSince($ifUnmodifiedSince)
    {
        $this->_ifUnmodifiedSince = $ifUnmodifiedSince;
    }
    
    /**
     * Gets ifMatch.
     *
     * @return string.
     */
    public function getIfMatch()
    {
        return $this->_ifMatch;
    }
    
    /**
     * Sets if match.
     *
     * @param string $ifMatch value.
     * 
     * @return none.
     */
    public function setIfMatch($ifMatch)
    {
        $this->_ifMatch = $ifMatch;
    }
    
    /**
     * Gets if none match.
     * 
     * @return string.
     */
    public function getIfNoneMatch()
    {
        return $this->_ifNoneMatch;
    }
    
    /**
     * Sets if none match.
     * 
     * @param string if none match.
     * 
     * @return none.
     */
    public function setIfNoneMatch($ifNoneMatch)
    {
        $this->_ifNoneMatch = $ifNoneMatch;
    }
    
    /**
     * Gets lease ID.
     *
     * @return string.
     */
    public function getLeaseId()
    {
        return $this->_leaseId;
    }

    /**
     * Sets lease ID.
     *
     * @param string $leaseId value.
     * 
     * @return none.
     */
    public function setLeaseId($leaseId)
    {
        $this->_leaseId = $leaseId;
    }
    
    /**
     * Gets source lease ID.
     *
     * @return string.
     */
    public function getSourceLeaseId()
    {
        return $this->_sourceLeaseId;
    }

    /**
     * Sets source lease ID.
     *
     * @param string $sourceLeaseId value.
     * 
     * @return none.
     */
    public function setSourceLeaseId($sourceLeaseId)
    {
        $this->_sourceLeaseId = $sourceLeaseId;
    }
}

?>
