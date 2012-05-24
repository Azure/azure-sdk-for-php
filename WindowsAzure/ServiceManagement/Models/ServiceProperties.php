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
 * @package   WindowsAzure\ServiceManagement\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
 
namespace WindowsAzure\ServiceManagement\Models;

/**
 * Basic Windows Azure service properties.
 *
 * @category  Microsoft
 * @package   WindowsAzure\ServiceManagement\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class ServiceProperties
{
    /**
     * @var string
     */
    private $_url;
    
    /**
     * @var string
     */
    private $_serviceName;
    
    /**
     * Gets the url.
     * 
     * @return string
     */
    public function getUrl()
    {
        return $this->_url;
    }
    
    /**
     * Sets the url.
     * 
     * @param string $url The url.
     * 
     * @return none
     */
    public function setUrl($url)
    {
        $this->_url = $url;
    }
    
    /**
     * Gets the serviceName.
     * 
     * @return string
     */
    public function getServiceName()
    {
        return $this->_serviceName;
    }
    
    /**
     * Sets the serviceName.
     * 
     * @param string $serviceName The serviceName.
     * 
     * @return none
     */
    public function setServiceName($serviceName)
    {
        $this->_serviceName = $serviceName;
    }
}

?>
