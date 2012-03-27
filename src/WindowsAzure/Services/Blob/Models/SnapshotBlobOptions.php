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
use PEAR2\WindowsAzure\Validate;

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
class SnapshotBlobOptions extends BlobServiceOptions
{ 
    /*
     * @var \DateTime
     */
    private $_date;

    /*
     * @var string
     */
    private $_version;
    
    /*
     * @var \NameValue
     */
    private $_metaData;
    
    /*
     * @var \DateTime
     */
    private $_ifModifiedSince; 
    
    /*
     * @var \DateTime
     */
    private $_ifUnmodifiedSince; 
    
    /* 
     * @var string
     */
    private $_ifMatch;
    
    /*
     * @var string
     */
    private $_ifNoneMatch; 
    
    /**
     * @var string
     */
    private $_leaseId;
     
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
     * Gets storage service version.
     *
     * @return string.
     */
    public function getVersion()
    {
        return $this->_version;
    }

    /**
     * Sets storage service version.
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
     * Gets meta data.
     *
     * @return string.
     */
    public function getMetaData()
    {
        return $this->_metaData;
    }

    /**
     * Sets meta data.
     *
     * @param string $metadata value.
     *
     * @return none.
     */
    public function setMetaData($metaData)
    {
        $this->_metaData = $metaData;
    }
    
    /*
     * Gets if modified since.
     * 
     * return \DateTime.
     */
    public function getIfModifiedSince()
    {
        return $this->_ifModifiedSince;
    }
    
    /*
     * Sets if modified since.
     * 
     * @param \DateTime $ifModifiedSince value
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
     * @param \DateTime $ifUnmodifiedsince value.
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
     * @return array.
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

}

?>
