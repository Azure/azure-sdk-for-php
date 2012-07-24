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
 * The result of calling getHostedServiceProperties API.
 *
 * @category  Microsoft
 * @package   WindowsAzure\ServiceManagement\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class GetHostedServicePropertiesResult
{
    /**
     * @var HostedServiceProperties
     */
    private $_hostedService;
    
    /**
     * Creates GetHostedServicePropertiesResult from parsed response.
     * 
     * @param array $parsed The parsed response in array representation.
     * 
     * @return GetHostedServicePropertiesResult 
     */
    public static function create($parsed)
    {
        $result                 = new GetHostedServicePropertiesResult();
        $result->_hostedService = new HostedServiceProperties();
        $prop                   = Utilities::tryGetValue(
            $parsed,
            Resources::XTAG_HOSTED_SERVICE_PROPERTIES
        );
        
        $result->_hostedService->setServiceName(
            Utilities::tryGetValue($parsed, Resources::XTAG_SERVICE_NAME)
        );
        $result->_hostedService->setUrl(
            Utilities::tryGetValue($parsed, Resources::XTAG_URL)
        );
        $result->_hostedService->setDescription(
            Utilities::tryGetValue($prop, Resources::XTAG_DESCRIPTION)
        );
        $result->_hostedService->setLocation(
            Utilities::tryGetValue($prop, Resources::XTAG_LOCATION)
        );
        $result->_hostedService->setAffinityGroup(
            Utilities::tryGetValue($prop, Resources::XTAG_AFFINITY_GROUP)
        );
        $result->_hostedService->setLabel(
            Utilities::tryGetValue($prop, Resources::XTAG_LABEL)
        );
        
        return $result;
    }
    
    /**
     * Gets the hostedService.
     * 
     * @return HostedService
     */
    public function getHostedService()
    {
        return $this->_hostedService;
    }
    
    /**
     * Sets the hostedService.
     * 
     * @param HostedService $hostedService The hostedService.
     * 
     * @return none
     */
    public function setHostedService($hostedService)
    {
        $this->_hostedService = $hostedService;
    }
}