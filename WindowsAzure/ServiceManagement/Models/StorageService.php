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
use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\Common\Internal\Utilities;

/**
 * The storage service class.
 *
 * @category  Microsoft
 * @package   WindowsAzure\ServiceManagement\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class StorageService extends Service
{
    /**
     * @var string
     */
    private $_affinityGroup;
    
    /**
     * Constructs new storage service object.
     * 
     * @param array $raw The array representation for storage service.
     */
    public function __construct($raw = null)
    {
        parent::__construct($raw);
        $this->setAffinityGroup(
            Utilities::tryGetValue($raw, Resources::XTAG_AFFINITY_GROUP)
        );
        $this->setName(
            Utilities::tryGetValue($raw, Resources::XTAG_SERVICE_NAME)
        );
    }
    
    /**
     * Converts the current object into ordered array representation.
     * 
     * @return array
     */
    protected function toArray()
    {
        $arr   = parent::toArray();
        $order = array(
            Resources::XTAG_NAMESPACE,
            Resources::XTAG_SERVICE_NAME,
            Resources::XTAG_DESCRIPTION,
            Resources::XTAG_LABEL,
            Resources::XTAG_AFFINITY_GROUP,
            Resources::XTAG_LOCATION
        );
        Utilities::addIfNotEmpty(
            Resources::XTAG_SERVICE_NAME, $this->getName(),
            $arr
        );
        Utilities::addIfNotEmpty(
            Resources::XTAG_AFFINITY_GROUP, $this->_affinityGroup,
            $arr
        );
        $ordered = Utilities::orderArray($arr, $order);
        
        return $ordered;
    }
    
    /**
     * Gets the affinityGroup name.
     * 
     * @return string 
     */
    public function getAffinityGroup()
    {
        return $this->_affinityGroup;
    }
    
    /**
     * Sets the affinityGroup name.
     * 
     * @param string $affinityGroup The affinityGroup name.
     * 
     * @return none
     */
    public function setAffinityGroup($affinityGroup)
    {
        $this->_affinityGroup = $affinityGroup;
    }
}

?>
