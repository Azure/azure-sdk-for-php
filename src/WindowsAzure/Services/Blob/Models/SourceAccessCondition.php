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
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
 
namespace WindowsAzure\Services\Blob\Models;
use WindowsAzure\Validate;
use WindowsAzure\Resources;
use WindowsAzure\Core\WindowsAzureUtilities;

/**
 * Represents a set of source access conditions to be used for operations
 * against the storage services.
 *
 * @category  Microsoft
 * @package   WindowsAzure\Services\Blob\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class SourceAccessCondition
{
    /**
     * Represents the header type.
     * 
     * @var string
     */
    private $_header = Resources::EMPTY_STRING;
    
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
     * @return \WindowsAzure\Services\Blob\Models\SourceAccessCondition 
     */
    public static function none()
    {
        return new SourceAccessCondition(Resources::EMPTY_STRING, null);
    }
    
    /**
     * Returns an access condition such that an operation will be performed only if 
     * the resource's ETag value matches the specified ETag value.
     * <p>
     * Setting this access condition modifies the request to include the HTTP 
     * <i>x-ms-source-if-match</i> conditional header. If this access condition 
     * is set, the operation is performed only if the ETag of the resource 
     * matches the specified ETag.
     * <p>
     * For more information, see 
     * <a href= 'http://go.microsoft.com/fwlink/?LinkID=224642&clcid=0x409'>
     * Specifying Conditional Headers for Blob Service Operations</a>.
     *
     * @param string $etag a string that represents the ETag value to check.
     *
     * @return \WindowsAzure\Services\Blob\Models\SourceAccessCondition
     */
    public static function sourceIfMatch($etag)
    {
        return new SourceAccessCondition(Resources::X_MS_SOURCE_IF_MATCH, $etag);
    }
    
    /**
     * Returns an source access condition such that an operation will be 
     * performed only if the resource has been modified since the specified 
     * time.
     * <p>
     * Setting this access condition modifies the request to include the HTTP 
     * <i>x-ms-source-if-modified-since</i> conditional header. If this 
     * access condition is set, the operation is performed only if the 
     * resource has been modified since the specified time.
     * <p>
     * For more information, see 
     * <a href= 'http://go.microsoft.com/fwlink/?LinkID=224642&clcid=0x409'>
     * Specifying Conditional Headers for Blob Service Operations</a>.
     *
     * @param \DateTime $lastModified date that represents the last-modified
     * time to check for the resource.
     *
     * @return \WindowsAzure\Services\Blob\Models\SourceAccessCondition
     */
    public static function sourceIfModifiedSince($lastModified)
    {
        Validate::isDate($lastModified);
        return new SourceAccessCondition(
            Resources::X_MS_SOURCE_IF_MODIFIED_SINCE,
            $lastModified
        );
    }
    
    /**
     * Returns a source access condition such that an operation will be 
     * performed only if the resource's ETag value does not match the 
     * specified ETag value.
     * <p>
     * Setting this access condition modifies the request to include the HTTP 
     * <i>x-ms-source-if-none-match</i> conditional header. If this access 
     * condition is set, the operation is performed only if the ETag of 
     * the resource does not match the specified ETag.
     * <p>
     * For more information,
     * see <a href= 'http://go.microsoft.com/fwlink/?LinkID=224642&clcid=0x409'>
     * Specifying Conditional Headers for Blob Service Operations</a>.
     *
     * @param string $eTag string that represents the ETag value to check.
     *
     * @return \WindowsAzure\Services\Blob\Models\SourceAccessCondition
     */
    public static function sourceIfNoneMatch($eTag)
    {
        return new SourceAccessCondition(
            Resources::X_MS_SOURCE_IF_NONE_MATCH, 
            $eTag
        );
    }
    
    /**
     * Returns a source access condition such that an operation will be performed 
     * only if the resource has not been modified since the specified time.
     * <p>
     * Setting this access condition modifies the request to include the HTTP 
     * <i>x-ms-source-if-unmodified-since</i> conditional header. If this access
     * condition is set, the operation is performed only if the resource has not 
     * been modified since the specified time.
     * <p>
     * For more information, see
     * <a href= 'http://go.microsoft.com/fwlink/?LinkID=224642&clcid=0x409'>
     * Specifying Conditional Headers for Blob Service Operations</a>.
     *
     * @param \DateTime $lastModified date that represents the last-modified
     * time to check for the resource.
     *
     * @return \WindowsAzure\Services\Blob\Models\SourceAccessCondition
     */
    public static function sourceIfNotModifiedSince($lastModified)
    {
        Validate::isDate($lastModified);
        return new SourceAccessCondition(
            Resources::X_MS_SOURCE_IF_UNMODIFIED_SINCE,
            $lastModified
        );
    }
    
    /**
     * Sets header type
     * 
     * @param string $headerType can be one of Resources
     * 
     * @return none.
     */
    public function setHeader($headerType)
    {
        $valid = SourceAccessCondition::isValid($headerType);
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
    
    /**
     * Check if the $headerType belongs to valid header types
     * 
     * @param string $headerType candidate header type
     * 
     * @return boolean 
     */
    public static function isValid($headerType)
    {
        if (   $headerType == Resources::EMPTY_STRING
            || $headerType == Resources::X_MS_SOURCE_IF_UNMODIFIED_SINCE
            || $headerType == Resources::X_MS_SOURCE_IF_MATCH
            || $headerType == Resources::X_MS_SOURCE_IF_MODIFIED_SINCE
            || $headerType == Resources::X_MS_SOURCE_IF_NONE_MATCH
        ) {
            return true;
        } else {
            return false;
        }
    }
}

?>
