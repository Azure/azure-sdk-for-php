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
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
 
namespace WindowsAzure\ServiceManagement;
use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\Common\Internal\Validate;
use WindowsAzure\Common\Internal\RestProxy;
use WindowsAzure\Common\Internal\Http\HttpCallContext;
use WindowsAzure\Common\Internal\Serialization\XmlSerializer;
use WindowsAzure\ServiceManagement\Internal\IServiceManagement;
use WindowsAzure\ServiceManagement\Models\CreateAffinityGroupOptions;
use WindowsAzure\ServiceManagement\Models\AffinityGroup;
use WindowsAzure\ServiceManagement\Models\ListAffinityGroupsResult;
use WindowsAzure\ServiceManagement\Models\GetAffinityGroupPropertiesResult;
use WindowsAzure\ServiceManagement\Models\ListLocationsResult;
use WindowsAzure\ServiceManagement\Models\StorageService;
use WindowsAzure\ServiceManagement\Models\ListStorageServicesResult;
use WindowsAzure\ServiceManagement\Models\GetOperationStatusResult;
use WindowsAzure\ServiceManagement\Models\AsynchronousOperationResult;
use WindowsAzure\ServiceManagement\Models\UpdateStorageServiceOptions;
use WindowsAzure\ServiceManagement\Models\GetStorageServicePropertiesResult;
use WindowsAzure\ServiceManagement\Models\GetStorageServiceKeysResult;

/**
 * This class constructs HTTP requests and receive HTTP responses for service 
 * management service layer.
 *
 * @category  Microsoft
 * @package   WindowsAzure\ServiceManagement
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class ServiceManagementRestProxy extends RestProxy
    implements IServiceManagement
{
    /**
     * @var string
     */
    private $_subscriptionId;
    
    /**
     * Constructs URI path for given service management resource.
     * 
     * @param string $serviceManagementResource The resource name.
     * @param string $name                      The service name.
     * 
     * @return string 
     */
    private function _getPath($serviceManagementResource, $name)
    {
        $path = $this->_subscriptionId . '/' . $serviceManagementResource;
        
        if (!is_null($name)) {
            $path .= '/' . $name;
        }
        
        return $path;
    }
    
    /**
     * Constructs URI path for locations.
     * 
     * @return string
     */
    private function _getLocationPath()
    {
        return $this->_getPath('locations', null);
    }
    
    /**
     * Constructs URI path for affinity group.
     * 
     * @param string $name The affinity group name.
     * 
     * @return string
     */
    private function _getAffinityGroupPath($name = null)
    {
        return $this->_getPath('affinitygroups', $name);
    }
    
    /**
     * Constructs URI path for storage services.
     * 
     * @param string $name The storage service name.
     * 
     * @return string
     */
    private function _getStorageServicePath($name = null)
    {
        return $this->_getPath('services/storageservices', $name);
    }
    
    /**
     * Constructs URI path for storage service key.
     * 
     * @param string $name The storage service name.
     * 
     * @return string
     */
    private function _getStorageServiceKeysPath($name = null)
    {
        return $this->_getPath('services/storageservices', $name) . '/keys';
    }
    
    /**
     * Constructs URI path for operations.
     * 
     * @param string $name The operation resource name.
     * 
     * @return string
     */
    private function _getOperationPath($name = null)
    {
        return $this->_getPath('operations', $name);
    }
    
    /**
     * Initializes new ServiceManagementRestProxy object.
     * 
     * @param IHttpClient $channel        The HTTP channel.
     * @param string      $subscriptionId The user subscription id.
     * @param string      $uri            The service URI.
     * @param ISerializer $dataSerializer The data serializer.
     */
    public function __construct($channel, $subscriptionId, $uri, $dataSerializer)
    {
        parent::__construct(
            $channel,
            $dataSerializer,
            $uri
        );
        $this->_subscriptionId = $subscriptionId;
    }
    
    /**
     * Lists the storage accounts available under the current subscription.
     * 
     * @return Models\ListStorageServicesResult
     * 
     * @see http://msdn.microsoft.com/en-us/library/windowsazure/ee460787.aspx
     */
    public function listStorageServices()
    {
        $context = new HttpCallContext();
        $context->setMethod(Resources::HTTP_GET);
        $context->setPath($this->_getStorageServicePath());
        $context->addStatusCode(Resources::STATUS_OK);
        
        $response   = $this->sendContext($context);
        $serialized = $this->dataSerializer->unserialize($response->getBody());
        
        return ListStorageServicesResult::create($serialized);
    }
    
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
    public function getStorageServiceProperties($name)
    {
        Validate::isString($name, 'name');
        Validate::notNullOrEmpty($name, 'name');
        
        $context = new HttpCallContext();
        $context->setMethod(Resources::HTTP_GET);
        $context->setPath($this->_getStorageServicePath($name));
        $context->addStatusCode(Resources::STATUS_OK);
        
        $response = $this->sendContext($context);
        $parsed   = $this->dataSerializer->unserialize($response->getBody());
        
        return GetStorageServicePropertiesResult::create($parsed);
    }
    
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
    public function getStorageServiceKeys($name)
    {
        Validate::isString($name, 'name');
        Validate::notNullOrEmpty($name, 'name');
        
        $context = new HttpCallContext();
        $context->setMethod(Resources::HTTP_GET);
        $context->setPath($this->_getStorageServiceKeysPath($name));
        $context->addStatusCode(Resources::STATUS_OK);
        
        $response = $this->sendContext($context);
        $parsed   = $this->dataSerializer->unserialize($response->getBody());
        
        return GetStorageServiceKeysResult::create($parsed);
    }
    
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
    public function regenerateStorageServiceKeys($name, $keyType)
    {
        Validate::isString($name, 'name');
        Validate::notNullOrEmpty($name, 'name');
        Validate::isString($keyType, '$keyType');
        Validate::notNullOrEmpty($keyType, '$keyType');

        $properties = array(XmlSerializer::ROOT_NAME => 'RegenerateKeys');
        $reqArray   = array(
            Resources::XTAG_NAMESPACE => array(Resources::WA_XML_NAMESPACE => null),
            Resources::XTAG_KEY_TYPE  => $keyType
        );
        $body       = $this->dataSerializer->serialize($reqArray, $properties);
        
        $context = new HttpCallContext();
        $context->setMethod(Resources::HTTP_POST);
        $context->setPath($this->_getStorageServiceKeysPath($name));
        $context->addStatusCode(Resources::STATUS_OK);
        $context->addQueryParameter(Resources::QP_ACTION, 'regenerate');
        $context->setBody($body);
        $context->addHeader(
            Resources::CONTENT_TYPE,
            Resources::XML_ATOM_CONTENT_TYPE
        );
        
        $response = $this->sendContext($context);
        $parsed   = $this->dataSerializer->unserialize($response->getBody());
        
        return GetStorageServiceKeysResult::create($parsed);
    }
    
    /**
     * Creates a new storage account in Windows Azure.
     * 
     * In the optional parameters either location or affinity group must be provided.
     * Because Create Storage Account is an asynchronous operation, it always returns
     * status code 202 (Accepted). To determine the status code for the operation 
     * once it is complete, call getOperationStatus API. The status code is embedded 
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
    public function createStorageService($name, $label, $options)
    {
        Validate::isString($name, 'name');
        Validate::notNullOrEmpty($name, 'name');
        Validate::isString($label, 'label');
        Validate::notNullOrEmpty($label, 'label');
        Validate::notNullOrEmpty($options, 'options');
        $affinityGroup = $options->getAffinityGroup();
        $location      = $options->getLocation();
        Validate::isTrue(
            !empty($location) || !empty($affinityGroup),
            Resources::INVALID_CSA_OPT_MSG
        );
        
        $storageService = new StorageService();
        $storageService->setName($name);
        $storageService->setLabel($label);
        $storageService->setLocation($options->getLocation());
        $storageService->setAffinityGroup($options->getAffinityGroup());
        $storageService->setDescription($options->getDescription());
        $storageService->addSerializationProperty(
            XmlSerializer::ROOT_NAME,
            'CreateStorageServiceInput'
        );
        
        $context = new HttpCallContext();
        $context->setMethod(Resources::HTTP_POST);
        $context->setPath($this->_getStorageServicePath());
        $context->addStatusCode(Resources::STATUS_ACCEPTED);
        $context->setBody($storageService->serialize($this->dataSerializer));
        $context->addHeader(
            Resources::CONTENT_TYPE,
            Resources::XML_ATOM_CONTENT_TYPE
        );
        
        $response = $this->sendContext($context);
        
        return AsynchronousOperationResult::create($response->getHeader());
    }
    
    /**
     * Deletes the specified storage account from Windows Azure.
     * 
     * @param string $name The storage account name.
     * 
     * @return none
     * 
     * @see http://msdn.microsoft.com/en-us/library/windowsazure/hh264517.aspx 
     */
    public function deleteStorageService($name)
    {
        Validate::isString($name, 'name');
        Validate::notNullOrEmpty($name, 'name');
        
        $context = new HttpCallContext();
        $context->setMethod(Resources::HTTP_DELETE);
        $context->setPath($this->_getStorageServicePath($name));
        $context->addStatusCode(Resources::STATUS_OK);
        
        $this->sendContext($context);
    }
    
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
    public function updateStorageService($name, $options)
    {
        Validate::isString($name, 'name');
        Validate::notNullOrEmpty($name, 'name');
        $label       = $options->getLabel();
        $description = $options->getDescription();
        Validate::isTrue(
            !empty($label) || !empty($description),
            Resources::INVALID_USA_OPT_MSG
        );
        
        $storageService = new StorageService();
        $storageService->setLabel($options->getLabel());
        $storageService->setDescription($options->getDescription());
        $storageService->addSerializationProperty(
            XmlSerializer::ROOT_NAME,
            'UpdateStorageServiceInput'
        );
        
        $context = new HttpCallContext();
        $context->setMethod(Resources::HTTP_PUT);
        $context->setPath($this->_getStorageServicePath($name));
        $context->addStatusCode(Resources::STATUS_OK);
        $context->setBody($storageService->serialize($this->dataSerializer));
        $context->addHeader(
            Resources::CONTENT_TYPE,
            Resources::XML_ATOM_CONTENT_TYPE
        );
        $this->sendContext($context);
    }
    
    /**
     * Lists the affinity groups associated with the specified subscription.
     * 
     * @return Models\ListAffinityGroupsResult
     * 
     * @see http://msdn.microsoft.com/en-us/library/windowsazure/ee460797.aspx
     */
    public function listAffinityGroups()
    {
        $context = new HttpCallContext();
        $context->setMethod(Resources::HTTP_GET);
        $context->setPath($this->_getAffinityGroupPath());
        $context->addStatusCode(Resources::STATUS_OK);
        
        $response   = $this->sendContext($context);
        $serialized = $this->dataSerializer->unserialize($response->getBody());
        
        return ListAffinityGroupsResult::create($serialized);
    }
    
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
    public function createAffinityGroup($name, $label, $location, $options = null)
    {
        Validate::isString($name, 'name');
        Validate::notNullOrEmpty($name, 'name');
        Validate::isString($label, 'label');
        Validate::notNullOrEmpty($label, 'label');
        Validate::isString($location, 'location');
        Validate::notNullOrEmpty($location, 'location');
        
        if (is_null($options)) {
            $options = new CreateAffinityGroupOptions();
        }
        
        $affinityGroup = new AffinityGroup();
        $affinityGroup->setName($name);
        $affinityGroup->setLabel($label);
        $affinityGroup->setLocation($location);
        $affinityGroup->setDescription($options->getDescription());
        $affinityGroup->addSerializationProperty(
            XmlSerializer::ROOT_NAME,
            'CreateAffinityGroup'
        );
        
        $context = new HttpCallContext();
        $context->setMethod(Resources::HTTP_POST);
        $context->setPath($this->_getAffinityGroupPath());
        $context->addStatusCode(Resources::STATUS_CREATED);
        $context->setBody($affinityGroup->serialize($this->dataSerializer));
        $context->addHeader(
            Resources::CONTENT_TYPE,
            Resources::XML_ATOM_CONTENT_TYPE
        );
        
        $this->sendContext($context);
    }
    
    /**
     * Deletes an affinity group in the specified subscription.
     * 
     * @param string $name The affinity group name.
     * 
     * @return none
     * 
     * @see http://msdn.microsoft.com/en-us/library/windowsazure/gg715314.aspx
     */
    public function deleteAffinityGroup($name)
    {
        Validate::isString($name, 'name');
        Validate::notNullOrEmpty($name, 'name');
        
        $context = new HttpCallContext();
        $context->setMethod(Resources::HTTP_DELETE);
        $context->setPath($this->_getAffinityGroupPath($name));
        $context->addStatusCode(Resources::STATUS_OK);
        
        $this->sendContext($context);
    }
    
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
    public function updateAffinityGroup($name, $label, $options = null)
    {
        Validate::isString($name, 'name');
        Validate::notNullOrEmpty($name, 'name');
        Validate::isString($label, 'label');
        Validate::notNullOrEmpty($label, 'label');
        
        if (is_null($options)) {
            $options = new CreateAffinityGroupOptions();
        }
        
        $affinityGroup = new AffinityGroup();
        $affinityGroup->setLabel($label);
        $affinityGroup->setDescription($options->getDescription());
        $affinityGroup->addSerializationProperty(
            XmlSerializer::ROOT_NAME,
            'UpdateAffinityGroup'
        );
        
        $context = new HttpCallContext();
        $context->setMethod(Resources::HTTP_PUT);
        $context->setPath($this->_getAffinityGroupPath($name));
        $context->addStatusCode(Resources::STATUS_OK);
        $context->setBody($affinityGroup->serialize($this->dataSerializer));
        $context->addHeader(
            Resources::CONTENT_TYPE,
            Resources::XML_ATOM_CONTENT_TYPE
        );
        
        $this->sendContext($context);
    }
    
    /**
     * Returns the system properties associated with the specified affinity group.
     * 
     * @param string $name The affinity group name.
     * 
     * @return Models\GetAffinityGroupPropertiesResult
     * 
     * @see http://msdn.microsoft.com/en-us/library/windowsazure/ee460789.aspx
     */
    public function getAffinityGroupProperties($name)
    {
        Validate::isString($name, 'name');
        Validate::notNullOrEmpty($name, 'name');
        
        $context = new HttpCallContext();
        $context->setMethod(Resources::HTTP_GET);
        $context->setPath($this->_getAffinityGroupPath($name));
        $context->addStatusCode(Resources::STATUS_OK);
        
        $response = $this->sendContext($context);
        $parsed   = $this->dataSerializer->unserialize($response->getBody());
        
        return GetAffinityGroupPropertiesResult::create($parsed);
    }
    
    /**
     * Lists all of the data center locations that are valid for your subscription.
     * 
     * @return Models\ListLocationsResult
     * 
     * @see http://msdn.microsoft.com/en-us/library/windowsazure/gg441293.aspx
     */
    public function listLocations()
    {
        $context = new HttpCallContext();
        $context->setMethod(Resources::HTTP_GET);
        $context->setPath($this->_getLocationPath());
        $context->addStatusCode(Resources::STATUS_OK);
        
        $response   = $this->sendContext($context);
        $serialized = $this->dataSerializer->unserialize($response->getBody());
        
        return ListLocationsResult::create($serialized);
    }
    
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
    public function getOperationStatus($requestId)
    {
        $context = new HttpCallContext();
        $context->setMethod(Resources::HTTP_GET);
        $context->setPath($this->_getOperationPath($requestId));
        $context->addStatusCode(Resources::STATUS_OK);
        
        $response   = $this->sendContext($context);
        $serialized = $this->dataSerializer->unserialize($response->getBody());
        
        return GetOperationStatusResult::create($serialized);
    }
}

?>
