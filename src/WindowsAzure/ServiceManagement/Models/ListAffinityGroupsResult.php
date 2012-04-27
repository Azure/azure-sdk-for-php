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
 * The result of calling listAfinityGroups API.
 *
 * @category  Microsoft
 * @package   WindowsAzure\ServiceManagement\Models
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class ListAffinityGroupsResult
{
    /**
     * @var array
     */
    private $_affinityGroups;
    
    /**
     * Creates new ListAffinityGroupsResult from parsed response body.
     * 
     * @param array $parsed The parsed response body.
     * 
     * @return ListAffinityGroupsResult
     */
    public static function create($parsed)
    {
        $result = new ListAffinityGroupsResult();
        
        $result->_affinityGroups = array();
        $entries                 = array();
        
        if (!empty($parsed)) {
            $entries = Utilities::getArray($parsed[Resources::XTAG_AFFINITY_GROUP]);
        }
        
        foreach ($entries as $value) {
            $result->_affinityGroups[] = AffinityGroup::create($value);
        }
        
        return $result;
    }
    
    /**
     * Gets affinity groups.
     * 
     * @return array
     */
    public function getAffinityGroups()
    {
        return $this->_affinityGroups;
    }
    
    /**
     * Sets affinity groups.
     * 
     * @param array $affinityGroups The affinity groups.
     * 
     * @return none
     */
    public function setAffinityGroups($affinityGroups)
    {
        $this->_affinityGroups = $affinityGroups;
    }
}

?>
