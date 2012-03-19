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
use PEAR2\WindowsAzure\Services\Blob\Models\AccessConditionHeaderType;
use PEAR2\WindowsAzure\Validate;
use PEAR2\WindowsAzure\Resources;
use PEAR2\WindowsAzure\Core\WindowsAzureUtilities;

/**
 * Represents a set of access conditions to be used for operations against the 
 * storage services.
 *
 * @category  Microsoft
 * @package   PEAR2\WindowsAzure\Services\Blob\Models
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class AccessCondition
{
    /**
     * Represents the header type.
     * 
     * @var string
     */
    private $_header = AccessConditionHeaderType::NONE;
    
    /**
     * Represents the header value.
     * 
     * @var string
     */
    private $_value;

    /**
     * Constructor
     * 
     * @param string $headerType header name
     * @param string $value      header value
     */
    protected function __construct($headerType, $value)
    {
        $this->setHeader($headerType);
        $this->setValue($value);
    }
    
    /**
     * Specifies that no access condition is set.
     * 
     * @return \PEAR2\WindowsAzure\Services\Blob\Models\AccessCondition 
     */
    public static function none()
    {
        return new AccessCondition(AccessConditionHeaderType::NONE, null);
    }
    
    /**
     * Returns an access condition such that an operation will be performed only if 
     * the resource's ETag value matches the specified ETag value.
     * <p>
     * Setting this access condition modifies the request to include the HTTP 
     * <i>If-Match</i> conditional header. If this access condition is set, the 
     * operation is performed only if the ETag of the resource matches the specified
     * ETag.
     * <p>
     * For more information, see 
     * <a href= 'http://go.microsoft.com/fwlink/?LinkID=224642&clcid=0x409'>
     * Specifying Conditional Headers for Blob Service Operations</a>.
     *
     * @param string $etag a string that represents the ETag value to check.
     *
     * @return \PEAR2\WindowsAzure\Services\Blob\Models\AccessCondition
     */
    public static function ifMatch($etag)
    {
        return new AccessCondition(AccessConditionHeaderType::IF_MATCH, $etag);
    }
    
    /**
     * Returns an access condition such that an operation will be performed only if 
     * the resource has been modified since the specified time.
     * <p>
     * Setting this access condition modifies the request to include the HTTP 
     * <i>If-Modified-Since</i> conditional header. If this access condition is set,
     * the operation is performed only if the resource has been modified since the 
     * specified time.
     * <p>
     * For more information, see 
     * <a href= 'http://go.microsoft.com/fwlink/?LinkID=224642&clcid=0x409'>
     * Specifying Conditional Headers for Blob Service Operations</a>.
     *
     * @param \DateTime $lastModified date object that represents the last-modified 
     * time to check for the resource.
     *
     * @return \PEAR2\WindowsAzure\Services\Blob\Models\AccessCondition
     */
    public static function ifModifiedSince($lastModified)
    {
        return new AccessCondition(
            AccessConditionHeaderType::IF_MODIFIED_SINCE,
            WindowsAzureUtilities::rfc1123ToDateTime($lastModified)
        );
    }
    
    /**
     * Returns an access condition such that an operation will be performed only if 
     * the resource's ETag value does not match the specified ETag value.
     * <p>
     * Setting this access condition modifies the request to include the HTTP 
     * <i>If-None-Match</i> conditional header. If this access condition is set, the
     * operation is performed only if the ETag of the resource does not match the
     * specified ETag.
     * <p>
     * For more information,
     * see <a href= 'http://go.microsoft.com/fwlink/?LinkID=224642&clcid=0x409'>
     * Specifying Conditional Headers for Blob Service Operations</a>.
     *
     * @param string $etag string that represents the ETag value to check.
     *
     * @return \PEAR2\WindowsAzure\Services\Blob\Models\AccessCondition
     */
    public static function ifNoneMatch($etag)
    {
        return new AccessCondition(AccessConditionHeaderType::IF_NONE_MATCH, $etag);
    }
    
    /**
     * Returns an access condition such that an operation will be performed only if
     * the resource has not been modified since the specified time.
     * <p>
     * Setting this access condition modifies the request to include the HTTP 
     * <i>If-Unmodified-Since</i> conditional header. If this access condition is
     * set, the operation is performed only if the resource has not been modified 
     * since the specified time.
     * <p>
     * For more information, see
     * <a href= 'http://go.microsoft.com/fwlink/?LinkID=224642&clcid=0x409'>
     * Specifying Conditional Headers for Blob Service Operations</a>.
     *
     * @param \DateTime $lastModified date object that represents the last-modified 
     * time to check for the resource.
     *
     * @return \PEAR2\WindowsAzure\Services\Blob\Models\AccessCondition
     */
    public static function ifNotModifiedSince($lastModified)
    {
        return new AccessCondition(
            AccessConditionHeaderType::IF_UNMODIFIED_SINCE,
            WindowsAzureUtilities::rfc1123ToDateTime($lastModified)
        );
    }
    
    /**
     * Sets header type
     * 
     * @param string $headerType can be one of AccessConditionHeaderType
     * 
     * @return none.
     */
    public function setHeader($headerType)
    {
        $valid = AccessConditionHeaderType::isValid($headerType);
        Validate::isTrue($valid, Resources::INVALID_HT_MSG);
        
        $this->_header = $headerType;
    }
    
    /**
     * Gets header type
     * 
     * @return string.
     */
    public function getHeader()
    {
        return $this->_header;
    }
    
    /**
     * Sets the header value
     * 
     * @param string $value the value to use
     * 
     * @return none
     */
    public function setValue($value)
    {
        $this->_value = $value;
    }
    
    /**
     * Gets the header value
     * 
     * @return string
     */
    public function getValue()
    {
        return $this->_value;
    }
}

?>
