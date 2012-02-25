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
 * @package   PEAR2\WindowsAzure\Utilities
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
 
namespace PEAR2\WindowsAzure\Utilities;

/**
 * Logger.
 *
 * @category  Microsoft
 * @package   PEAR2\WindowsAzure\Utilities
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class Logger
{
    private static $_filePath = "C:\log.txt";

    /**
     * Logs $var to file
     *
     * @param mix $var data to log.
     * 
     * @static
     * 
     * @return none.
     */
    public static function log($var)
    {
        if (is_array($var)) {
            error_log(print_r($var, true), 3, self::$_filePath);
        } else {
            error_log($var . "\n", 3, self::$_filePath);
        }
    }
    
    /**
     * Sets file path to set
     *
     * @param string $filePath log file path.
     * 
     * @static
     * 
     * @return none.
     */
    public static function setLogFile($filePath)
    {
        $this->_filePath = $filePath;
    }
}

?>
