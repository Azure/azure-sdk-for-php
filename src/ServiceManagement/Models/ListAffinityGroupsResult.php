<?php

/**
 * LICENSE: Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * http://www.apache.org/licenses/LICENSE-2.0.
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
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace WindowsAzure\ServiceManagement\Models;

use WindowsAzure\Common\Internal\Utilities;
use WindowsAzure\Common\Internal\Resources;

/**
 * The result of calling listAffinityGroups API.
 *
 * @category  Microsoft
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @version   Release: 0.5.0_2016-11
 *
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class ListAffinityGroupsResult
{
    /**
     * @var AffinityGroup[]
     */
    private $_affinityGroups;

    /**
     * Creates new ListAffinityGroupsResult from parsed response body.
     *
     * @param array $parsed The parsed response body
     *
     * @return ListAffinityGroupsResult
     */
    public static function create($parsed)
    {
        $result = new self();

        $result->_affinityGroups = [];
        $entries = Utilities::tryGetArray(
            Resources::XTAG_AFFINITY_GROUP,
            $parsed
        );

        foreach ($entries as $value) {
            $result->_affinityGroups[] = new AffinityGroup($value);
        }

        return $result;
    }

    /**
     * Gets affinity groups.
     *
     * @return AffinityGroup[]
     */
    public function getAffinityGroups()
    {
        return $this->_affinityGroups;
    }

    /**
     * Sets affinity groups.
     *
     * @param AffinityGroup[] $affinityGroups The affinity groups
     */
    public function setAffinityGroups(array $affinityGroups)
    {
        $this->_affinityGroups = $affinityGroups;
    }
}
