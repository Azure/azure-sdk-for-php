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
 * @package   WindowsAzure\ServiceManagement\Internal
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
 
namespace WindowsAzure\ServiceManagement\Internal;
use WindowsAzure\Common\Internal\FilterableService;

/**
 * The Windows Azure service management REST API wrappers.
 *
 * @category  Microsoft
 * @package   WindowsAzure\ServiceManagement\Internal
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
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
     * @return Models\ListStorageServicesResult
     * 
     * @see http://msdn.microsoft.com/en-us/library/windowsazure/ee460787.aspx
     */
    public function listStorageServices();
    
    /**
     * Returns the system properties for the specified storage account.
     * 
     * These properties include: the address, description, and label of the storage
     * account; and the name of the affinity group to which the service belongs, 
     * or its geo-location if it is not part of an affinity group.
     * 
     * @param string $name The storage account name.
     * 
     * @return Models\GetStorageServicePropertiesResult
     * 
     * @see http://msdn.microsoft.com/en-us/library/windowsazure/ee460802.aspx 
     */
    public function getStorageServiceProperties($name);
    
    /**
     * Returns the primary and secondary access keys for the specified storage 
     * account.
     * 
     * @param string $name The storage account name.
     * 
     * @return Models\GetStorageServiceKeysResult
     * 
     * @see http://msdn.microsoft.com/en-us/library/windowsazure/ee460785.aspx 
     */
    public function getStorageServiceKeys($name);
    
    
    /**
     * Regenerates the primary or secondary access key for the specified storage 
     * account.
     * 
     * @param string $name    The storage account name.
     * @param string $keyType Specifies which key to regenerate.
     * 
     * @return Models\GetStorageServiceKeysResult
     * 
     * @see http://msdn.microsoft.com/en-us/library/windowsazure/ee460795.aspx
     */
    public function regenerateStorageServiceKeys($name, $keyType);
    
    /**
     * Creates a new storage account in Windows Azure.
     * 
     * In the optional parameters either location or affinity group must be provided.
     * Because Create Storage Account is an asynchronous operation, it always returns
     * status code 202 (Accepted). To determine the status code for the operation 
     * once it is complete, call Get Operation Status. The status code is embedded 
     * in the response for this operation; if successful, it will be 
     * status code 200 (OK).
     * 
     * @param string                             $name    The storage account name.
     * @param string                             $label   Name for the storage
     * account specified as a base64-encoded string. The name may be up to 100
     * characters in length. The name can be used identify the storage account for
     * your tracking purposes.
     * @param Models\CreateStorageServiceOptions $options The optional parameters.
     * 
     * @return Models\AsynchronousOperationResult
     * 
     * @see http://msdn.microsoft.com/en-us/library/windowsazure/hh264518.aspx 
     */
    public function createStorageService($name, $label, $options);
    
    /**
     * Deletes the specified storage account from Windows Azure.
     * 
     * @param string $name The storage account name.
     * 
     * @return none
     * 
     * @see http://msdn.microsoft.com/en-us/library/windowsazure/hh264517.aspx 
     */
    public function deleteStorageService($name);
    
    /**
     * Updates the label and/or the description for a storage account in Windows 
     * Azure.
     * 
     * @param string                             $name    The storage account name.
     * @param Models\UpdateStorageServiceOptions $options The optional parameters.
     * 
     * @return none
     * 
     * @see http://msdn.microsoft.com/en-us/library/windowsazure/hh264516.aspx 
     */
    public function updateStorageService($name, $options);
    
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
    
    /**
     * Returns the status of the specified operation. After calling an asynchronous 
     * operation, you can call Get Operation Status to determine whether the 
     * operation has succeeded, failed, or is still in progress.
     * 
     * @param string $requestId The request ID for the request you wish to track.
     * 
     * @return Models\GetOperationStatusResult
     * 
     * @see http://msdn.microsoft.com/en-us/library/windowsazure/ee460783.aspx
     */
    public function getOperationStatus($requestId);
}

?>
