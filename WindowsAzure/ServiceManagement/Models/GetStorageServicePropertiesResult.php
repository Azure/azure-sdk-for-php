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
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
 
namespace WindowsAzure\ServiceManagement\Models;
use WindowsAzure\Common\Internal\Utilities;
use WindowsAzure\Common\Internal\Resources;

/**
 * The result of calling getStorageServiceProperties API.
 *
 * @category  Microsoft
 * @package   WindowsAzure\ServiceManagement\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class GetStorageServicePropertiesResult
{
    /**
     * @var StorageService
     */
    private $_storageService;
    
    /**
     * @var string
     */
    private $_url;
    
    /**
     * @var array
     */
    private $_endpoints;
    
    /**
     * @var string
     */
    private $_status;
    
    /**
     * Creates GetStorageServicePropertiesResult from parsed response.
     * 
     * @param array $parsed The parsed response in array representation.
     * 
     * @return GetStorageServicePropertiesResult 
     */
    public static function create($parsed)
    {
        $result = new GetStorageServicePropertiesResult();
        $prop   = Utilities::tryGetValue(
            $parsed,
            Resources::XTAG_STORAGE_SERVICE_PROPERTIES
        );
        
        $result->_storageService = new StorageService($prop);
        $result->_storageService->setName(
            Utilities::tryGetValue($parsed, Resources::XTAG_SERVICE_NAME)
        );
        $result->_status    = Utilities::tryGetValue($prop, Resources::XTAG_STATUS);
        $result->_url       = Utilities::tryGetValue($parsed, Resources::XTAG_URL);
        $endpoints          = Utilities::tryGetValue(
            $prop,
            Resources::XTAG_ENDPOINTS
        );
        $result->_endpoints = Utilities::tryGetValue(
            $endpoints,
            Resources::XTAG_ENDPOINT
        );
        
        return $result;
    }
    
    /**
     * Gets the storageService.
     * 
     * @return StorageService
     */
    public function getStorageService()
    {
        return $this->_storageService;
    }
    
    /**
     * Sets the storageService.
     * 
     * @param StorageService $storageService The storageService.
     * 
     * @return none
     */
    public function setStorageService($storageService)
    {
        $this->_storageService = $storageService;
    }
    
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
     * Gets the endpoints.
     * 
     * @return array
     */
    public function getEndpoints()
    {
        return $this->_endpoints;
    }
    
    /**
     * Sets the endpoints.
     * 
     * @param array $endpoints The endpoints.
     * 
     * @return none
     */
    public function setEndpoints($endpoints)
    {
        $this->_endpoints = $endpoints;
    }
    
    /**
     * Gets the status.
     * 
     * @return string
     */
    public function getStatus()
    {
        return $this->_status;
    }
    
    /**
     * Sets the status.
     * 
     * @param string $status The status.
     * 
     * @return none
     */
    public function setStatus($status)
    {
        $this->_status = $status;
    }
}


