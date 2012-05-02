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
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
 
namespace WindowsAzure\ServiceManagement\Models;
use WindowsAzure\Utilities;
use WindowsAzure\Resources;

/**
 * The result of calling listStorageServices API.
 *
 * @category  Microsoft
 * @package   WindowsAzure\ServiceManagement\Models
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class ListStorageServicesResult
{
    /**
     * @var array
     */
    private $_storageServices;
    
    /**
     * Creates new ListStorageServicesResult from parsed response body.
     * 
     * @param array $parsed The parsed response body.
     * 
     * @return ListStorageServicesResult
     */
    public static function create($parsed)
    {
        $result = new ListStorageServicesResult();
        
        $result->_storageServices = array();
        $entries                  = Utilities::tryGetArray(
            Resources::XTAG_STORAGE_SERVICE,
            $parsed
        );
        
        foreach ($entries as $value) {
            $properties = new ServiceProperties();
            $properties->setServiceName(
                Utilities::tryGetValue($value, Resources::XTAG_SERVICE_NAME)
            );
            $properties->setUrl(
                Utilities::tryGetValue($value, Resources::XTAG_URL)
            );
            $result->_storageServices[] = $properties;
        }
        
        return $result;
    }
    
    /**
     * Gets storage accounts.
     * 
     * @return array
     */
    public function getStorageServices()
    {
        return $this->_storageServices;
    }
    
    /**
     * Sets storage accounts.
     * 
     * @param array $storageServices The storage accounts.
     * 
     * @return none
     */
    public function setStorageServices($storageServices)
    {
        $this->_storageServices = $storageServices;
    }
}

?>
