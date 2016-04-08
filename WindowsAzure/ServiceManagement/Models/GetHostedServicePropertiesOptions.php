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
use WindowsAzure\Common\Internal\Validate;

/**
 * The optional parameter for getHostedServiceProperties API.
 *
 * @category  Microsoft
 * @package   WindowsAzure\ServiceManagement\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.4.2_2016-04
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class GetHostedServicePropertiesOptions
{
    /**
     * @var boolean
     */
    private $_embedDetail;
    
    /**
     * Constructs new GetHostedServicePropertiesOptions instance.
     */
    public function __construct()
    {
        $this->_embedDetail = false;
    }
    
    /**
     * Sets the embed detail flag.
     * 
     * @param boolean $embedDetail The embed detail flag.
     * 
     * @return none
     */
    public function setEmbedDetail($embedDetail)
    {
        Validate::isBoolean($embedDetail);
        
        $this->_embedDetail = $embedDetail;
    }
    
    /**
     * Gets the embed detail flag.
     * 
     * @return boolean 
     */
    public function getEmbedDetail()
    {
        return $this->_embedDetail;
    }
}