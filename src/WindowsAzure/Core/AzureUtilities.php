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
 * @package   PEAR2\WindowsAzure\Core
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
 
namespace PEAR2\WindowsAzure\Core;
use PEAR2\WindowsAzure\Resources;
use PEAR2\WindowsAzure\Utilities;

/**
 * General utilities for communicating with azure.
 *
 * @category  Microsoft
 * @package   PEAR2\WindowsAzure\Core
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class AzureUtilities
{
    /**
     * Generates metadata headers by prefixing each element with 'x-ms-meta'.
     *
     * @param array $metadata user defined metadata.
     * 
     * @return array.
     */
    public static function generateMetadataHeaders($metadata)
    {
        $metadataHeaders = array();
        
        if (is_array($metadata) && !empty($metadata)) {
            foreach ($metadata as $key => $value) {
                $headerName = Resources::X_MS_META_HEADER_PREFIX;
                if (   strpos($value, "\r") !== false
                    || strpos($value, "\n") !== false
                ) {
                    throw new \InvalidArgumentException(Resources::INVALID_META_MSG);
                }
                
                $headerName                  .= strtolower($key);
                $metadataHeaders[$headerName] = $value;
            }
        }
        
        return $metadataHeaders;
    }
    
    /**
     * Gets metadata array by parsing them from given headers.
     *
     * @param array $headers HTTP headers containing metadata elements.
     * 
     * @return array.
     */
    public static function getMetadataArray($headers)
    {
        $metadata = array();
        foreach ($headers as $key => $value) {
            $isMetadataHeader = Utilities::startsWith(
                strtolower($key),
                Resources::X_MS_META_HEADER_PREFIX
            );
            
            if ($isMetadataHeader) {
                $MetadataName = str_replace(
                    Resources::X_MS_META_HEADER_PREFIX,
                    Resources::EMPTY_STRING,
                    strtolower($key)
                );
                
                $metadata[$MetadataName] = $value;
            }
        }
        
        return $metadata;
    }
    
    /**
     * Converts a given date string into \DateTime object
     * 
     * @param string $date windows azure date ins string represntation.
     * 
     * @return \DateTime
     */
    public static function windowsAzureDateToDateTime($date)
    {
        $timeZone = new \DateTimeZone('GMT');
        $format   = Resources::AZURE_DATE_FORMAT;
        
        return \DateTime::createFromFormat($format, $date, $timeZone);
    }
}

?>
