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
 * @package   PEAR2\WindowsAzure\Services\Table\Models
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
 
namespace PEAR2\WindowsAzure\Services\Table\Models;
use PEAR2\WindowsAzure\Utilities;
use PEAR2\WindowsAzure\Validate;
use PEAR2\WindowsAzure\Resources;

/**
 * Basic Windows Azure EDM Types used for table entity properties.
 *
 * @category  Microsoft
 * @package   PEAR2\WindowsAzure\Services\Table\Models
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class EdmType
{
    const DATETIME = 'Edm.DateTime';
    const BINARY   = 'Edm.Binary';
    const BOOLEAN  = 'Edm.Boolean';
    const DOUBLE   = 'Edm.Double';
    const GUID     = 'Edm.Guid';
    const INT32    = 'Edm.Int32';
    const INT64    = 'Edm.Int64';
    const STRING   = 'Edm.String';
    
    /**
     * Converts the type to string if it's empty and validates the type.
     * 
     * @param string $type The Edm type
     * 
     * @return string
     */
    public static function processType($type)
    {
        $type = empty($type) ? self::STRING : $type;
        Validate::isTrue(self::isValid($type), Resources::INVALID_EDM_MSG);
        
        return $type;
    }
    
    /**
     * Converts the value into its proper type.
     * 
     * @param string $type  The edm type.
     * @param string $value The edm value.
     * 
     * @return mix
     * 
     * @throws \InvalidArgumentException
     */
    public static function processValue($type, $value)
    {
        // Having null value means that the user wants to remove the property name
        // associated with this value. Leave the value as null so this hold.
        if (is_null($value)) return null;
        
        switch ($type) {
        case self::GUID:
        case self::STRING:
            return $value;
            
        case self::BINARY:
            return base64_decode($value);

        case self::DATETIME:
            return Utilities::convertToDateTime($value);

        case self::BOOLEAN:
            return Utilities::toBoolean($value);

        case self::DOUBLE:
        case self::INT32:
        case self::INT64:
            return intval($value);

        default:
            throw new \InvalidArgumentException();
        }
    }
    
    /**
     * Check if the $type belongs to valid header types.
     * 
     * @param string $type The type string to check.
     * 
     * @return boolean 
     */
    public static function isValid($type)
    {
        switch($type) {
        case $type == self::DATETIME:
        case $type == self::BINARY:
        case $type == self::BOOLEAN:
        case $type == self::DOUBLE:
        case $type == self::GUID:
        case $type == self::INT32:
        case $type == self::INT64:
        case $type == self::STRING:
            return true;
        
        default:
            return false;
                
        }
    }
}

?>
