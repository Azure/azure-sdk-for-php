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
 * @package   WindowsAzure\ServiceManagement
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
 
namespace WindowsAzure\ServiceManagement;
use WindowsAzure\Core\FilterableService;

/**
 * The Windows Azure service management REST API wrappers.
 *
 * @category  Microsoft
 * @package   WindowsAzure\ServiceManagement
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
interface IServiceManagement extends FilterableService
{
    /**
     * Lists the storage accounts available under the current subscription.
     * 
     * @return Models\ListStorageAccountsResult
     * 
     * @see http://msdn.microsoft.com/en-us/library/windowsazure/ee460787.aspx
     */
    public function listStorageAccounts();
    
    /**
     * Returns the system properties for the specified storage account.
     * 
     * These properties include: the address, description, and label of the storage
     * account; and the name of the affinity group to which the service belongs, 
     * or its geo-location if it is not part of an affinity group.
     * 
     * @param string $name The storage account name.
     * 
     * @return Models\GetStorageAccountPropertiesResult
     * 
     * @see http://msdn.microsoft.com/en-us/library/windowsazure/ee460802.aspx 
     */
    public function getStorageAccountProperties($name);
    
    /**
     * Returns the primary and secondary access keys for the specified storage 
     * account.
     * 
     * @param string $name The storage account name.
     * 
     * @return Models\GetStorageAccountKeysResult
     * 
     * @see http://msdn.microsoft.com/en-us/library/windowsazure/ee460785.aspx 
     */
    public function getStorageAccountKeys($name);
    
    
    /**
     * Regenerates the primary or secondary access key for the specified storage 
     * account.
     * 
     * @param string $name    The storage account name.
     * @param string $keyType Specifies which key to regenerate.
     * 
     * @return Models\RegenerateStorageAccountKeysResult
     * 
     * @see http://msdn.microsoft.com/en-us/library/windowsazure/ee460795.aspx
     */
    public function regenerateStorageAccountKeys($name, $keyType);
    
    /**
     * Creates a new storage account in Windows Azure.
     * 
     * @param string                             $name    The storage account name.
     * @param string                             $label   Name for the storage
     * account specified as a base64-encoded string. The name may be up to 100
     * characters in length. The name can be used identify the storage account for
     * your tracking purposes.
     * @param Models\CreateStorageAccountOptions $options The optional parameters.
     * 
     * @return none
     * 
     * @see http://msdn.microsoft.com/en-us/library/windowsazure/hh264518.aspx 
     */
    public function createStorageAccount($name, $label, $options = null);
    
    /**
     * Deletes the specified storage account from Windows Azure.
     * 
     * @param string $name The storage account name.
     * 
     * @return none
     * 
     * @see http://msdn.microsoft.com/en-us/library/windowsazure/hh264517.aspx 
     */
    public function deleteStorageAccount($name);
    
    /**
     * Updates the label and/or the description for a storage account in Windows 
     * Azure.
     * 
     * @param string                             $name    The storage account name.
     * @param Models\UpdateStorageAccountOptions $options The optional parameters.
     * 
     * @return none
     * 
     * @see http://msdn.microsoft.com/en-us/library/windowsazure/hh264516.aspx 
     */
    public function updateStorageAccount($name, $options = null);
    
    /**
     * Lists the affinity groups associated with the specified subscription.
     * 
     * @return Models\ListAffinityGroupsResult
     * 
     * @see http://msdn.microsoft.com/en-us/library/windowsazure/ee460797.aspx
     */
    public function listAffinityGroups();
    
    /**
     * Creates a new affinity group for the specified subscription.
     * 
     * @param string                            $name     The affinity group name.
     * @param string                            $label    A base-64 encoded name for
     * the affinity group. The name can be up to 100 characters in length.
     * @param string                            $location The data center location
     * where the affinity group will be created. To list available locations, use 
     * the listLocations API.
     * @param Models\CreateAffinityGroupOptions $options  The optional parameters.
     * 
     * @return none
     * 
     * @see http://msdn.microsoft.com/en-us/library/windowsazure/gg715317.aspx
     */
    public function createAffinityGroup($name, $label, $location, $options = null);
    
    /**
     * Deletes an affinity group in the specified subscription.
     * 
     * @param string $name The affinity group name.
     * 
     * @return none
     * 
     * @see http://msdn.microsoft.com/en-us/library/windowsazure/gg715314.aspx
     */
    public function deleteAffinityGroup($name);
    
    /**
     * Updates the label and/or the description for an affinity group for the 
     * specified subscription.
     * 
     * @param string                            $name    The affinity group name.
     * @param string                            $label   The affinity group label.
     * @param Models\CreateAffinityGroupOptions $options The optional parameters.
     * 
     * @return none
     * 
     * @see http://msdn.microsoft.com/en-us/library/windowsazure/gg715316.aspx
     */
    public function updateAffinityGroup($name, $label, $options = null);
    
    /**
     * Returns the system properties associated with the specified affinity group.
     * 
     * @param string $name The affinity group name.
     * 
     * @return Models\GetAffinityGroupPropertiesResult
     * 
     * @see http://msdn.microsoft.com/en-us/library/windowsazure/ee460789.aspx
     */
    public function getAffinityGroupProperties($name);
    
    /**
     * Lists all of the data center locations that are valid for your subscription.
     * 
     * @return Models\ListLocationsResult
     * 
     * @see http://msdn.microsoft.com/en-us/library/windowsazure/gg441293.aspx
     */
    public function listLocations();
}

?>