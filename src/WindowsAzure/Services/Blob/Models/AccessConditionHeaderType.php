<?php

/**
 * LICENSE: Licensed under the Apache License, Version 2.0 (the 'License');
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an 'AS IS' BASIS,
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

/**
 * Specifies the kinds of conditional headers that may be set for a request.
 *
 * @category  Microsoft
 * @package   WindowsAzure\Services\Blob\Models
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class AccessConditionHeaderType
{
    /**
     * Specifies that no conditional headers are set.
     * 
     * @var string
     */
    const NONE = Resources::EMPTY_STRING;
    
    /**
     * Specifies the <i>If-Unmodified-Since</i> conditional header is set.
     * 
     * @var string
     */
    const IF_UNMODIFIED_SINCE = 'If-Unmodified-Since';

    /**
     * Specifies the <i>If-Match</i> conditional header is set.
     * 
     * @var string
     */
    const IF_MATCH = 'If-Match';

    /**
     * Specifies the <i>If-Modified-Since</i> conditional header is set.
     * 
     * @var string
     */
    const IF_MODIFIED_SINCE = 'If-Modified-Since';

    /**
     * Specifies the <i>If-None-Match</i> conditional header is set.
     * 
     * @var string
     */
    const IF_NONE_MATCH = 'If-None-Match';
    
    /**
     * Check if the $headerType belongs to valid header types
     * 
     * @param string $headerType candidate header type
     * 
     * @return boolean 
     */
    public static function isValid($headerType)
    {
        if (   $headerType == self::NONE
            || $headerType == self::IF_UNMODIFIED_SINCE
            || $headerType == self::IF_MATCH
            || $headerType == self::IF_MODIFIED_SINCE
            || $headerType == self::IF_NONE_MATCH
        ) {
            return true;
        } else {
            return false;
        }
    }
}

?>
