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
 * @package   PEAR2\WindowsAzure\Services\Queue\Models
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
 
namespace PEAR2\WindowsAzure\Services\Queue\Models;
use PEAR2\WindowsAzure\Utilities;

/**
 * Holds elements of queue properties retention policy field.
 *
 * @category  Microsoft
 * @package   PEAR2\WindowsAzure\Services\Queue\Models
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class RetentionPolicy
{
    /**
     * Indicates whether a retention policy is enabled for the storage service
     * 
     * @var bool.
     */
    private $_enabled;
    
    /**
     * If $_enabled is true then this field indicates the number of days that metrics
     * or logging data should be retained. All data older than this value will be 
     * deleted. The minimum value you can specify is 1; 
     * the largest value is 365 (one year)
     * 
     * @var int
     */
    private $_days;
    
    /**
     * Creates object from $parsedResponse.
     * 
     * @param array $parsedResponse XML response parsed into array.
     * 
     * @return PEAR2\WindowsAzure\Services\Queue\Models\RetentionPolicy
     */
    public static function create($parsedResponse)
    {
        $result = new RetentionPolicy();
        $result->setEnabled(Utilities::toBool($parsedResponse['Enabled']));
        if ($result->getEnabled()) {
            $result->setDays(intval($parsedResponse['Days']));
        }
        
        return $result;
    }
    
    /**
     * Gets enabled.
     * 
     * @return bool. 
     */
    public function getEnabled()
    {
        return $this->_enabled;
    }
    
    /**
     * Sets enabled.
     * 
     * @param bool $enabled value to use.
     * 
     * @return none. 
     */
    public function setEnabled($enabled)
    {
        $this->_enabled = $enabled;
    }
    
    /**
     * Gets days field.
     * 
     * @return int
     */
    public function getDays()
    {
        return $this->_days;
    }
    
    /**
     * Sets days field.
     * 
     * @param int $days value to use.
     * 
     * @return none
     */
    public function setDays($days)
    {
        $this->_days = $days;
    }
}

?>
