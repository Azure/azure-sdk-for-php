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
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
 
namespace WindowsAzure\Services\Blob\Models;

/**
 * Holds container access policy elements
 *
 * @category  Microsoft
 * @package   WindowsAzure\Services\Blob\Models
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class AccessPolicy
{
    /**
     * @var string
     */
    private $_start;
    
    /**
     * @var string
     */
    private $_expiry;
    
    /**
     * @var string
     */
    private $_permission;
    
    /**
     * Gets start.
     *
     * @return string.
     */
    public function getStart()
    {
        return $this->_start;
    }

    /**
     * Sets start.
     *
     * @param string $start value.
     * 
     * @return none.
     */
    public function setStart($start)
    {
        $this->_start = $start;
    }
    
    /**
     * Gets expiry.
     *
     * @return string.
     */
    public function getExpiry()
    {
        return $this->_expiry;
    }

    /**
     * Sets expiry.
     *
     * @param string $expiry value.
     * 
     * @return none.
     */
    public function setExpiry($expiry)
    {
        $this->_expiry = $expiry;
    }
    
    /**
     * Gets permission.
     *
     * @return string.
     */
    public function getPermission()
    {
        return $this->_permission;
    }

    /**
     * Sets permission.
     *
     * @param string $permission value.
     * 
     * @return none.
     */
    public function setPermission($permission)
    {
        $this->_permission = $permission;
    }
    
    /**
     * Converts this current object to XML representation.
     * 
     * @return array.
     */
    public function toArray()
    {
        $array = array();
        
        $array['Start']      = \WindowsAzure\Utilities::convertToEdmDateTime($this->_start);
        $array['Expiry']     = \WindowsAzure\Utilities::convertToEdmDateTime($this->_expiry);
        $array['Permission'] = $this->_permission;
        
        return $array;
    }
}

?>
