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
use WindowsAzure\ServiceManagement\Internal\ServicePropertiesResult;

/**
 * The result of calling listHostedServices API.
 *
 * @category  Microsoft
 * @package   WindowsAzure\ServiceManagement\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class ListHostedServicesResult extends ServicePropertiesResult
{
    /**
     * @var array
     */
    private $_hostedServices;
    
    /**
     * Creates new ListHostedServicesResult from parsed response body.
     * 
     * @param array $parsed The parsed response body.
     * 
     * @return ListHostedServicesResult
     */
    public static function create($parsed)
    {
        $result                  = new ListHostedServicesResult(
            $parsed,
            Resources::XTAG_HOSTED_SERVICE
        );
        $generalProperties       = $result->services;
        $result->_hostedServices = array();
        
        assert(count($result->entries) == count($generalProperties));
        
        for ($i = 0; $i < count($result->entries); $i++) {
            $hService = new HostedServiceProperties();
            $prop     = Utilities::tryGetArray(
                Resources::XTAG_HOSTED_SERVICE_PROPERTIES,
                $result->entries[$i]
            );
            $name     = $generalProperties[$i]->getServiceName();
            $url      = $generalProperties[$i]->getUrl();
            $desc     = Utilities::tryGetValue($prop, Resources::XTAG_DESCRIPTION);
            $location = Utilities::tryGetValue($prop, Resources::XTAG_LOCATION);
            $label    = Utilities::tryGetValue($prop, Resources::XTAG_LABEL);
            
            $hService->setServiceName($name);
            $hService->setUrl($url);
            $hService->setDescription($desc);
            $hService->setLabel($label);
            $hService->setLocation($location);
            
            $result->_hostedServices[] = $hService;
        }
        
        return $result;
    }
    
    /**
     * Gets hosted accounts.
     * 
     * @return array
     */
    public function getHostedServices()
    {
        return $this->_hostedServices;
    }
    
    /**
     * Sets hosted accounts.
     * 
     * @param array $hostedServices The hosted accounts.
     * 
     * @return none
     */
    public function setHostedServices($hostedServices)
    {
        $this->_hostedServices = $hostedServices;
    }
}