<?php
namespace Microsoft\Azure\Management\MachineLearning;
final class WebServices
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_CreateOrUpdate_operation = $_client->createOperation('WebServices_CreateOrUpdate');
        $this->_Get_operation = $_client->createOperation('WebServices_Get');
        $this->_Patch_operation = $_client->createOperation('WebServices_Patch');
        $this->_Remove_operation = $_client->createOperation('WebServices_Remove');
        $this->_CreateRegionalProperties_operation = $_client->createOperation('WebServices_CreateRegionalProperties');
        $this->_ListKeys_operation = $_client->createOperation('WebServices_ListKeys');
        $this->_ListByResourceGroup_operation = $_client->createOperation('WebServices_ListByResourceGroup');
        $this->_ListBySubscriptionId_operation = $_client->createOperation('WebServices_ListBySubscriptionId');
    }
    /**
     * Create or update a web service. This call will overwrite an existing web service. Note that there is no warning or confirmation. This is a nonrecoverable operation. If your intent is to create a new web service, call the Get operation first to verify that it does not exist.
     * @param string $resourceGroupName
     * @param string $webServiceName
     * @param array $createOrUpdatePayload
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $webServiceName,
        array $createOrUpdatePayload
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'webServiceName' => $webServiceName,
            'createOrUpdatePayload' => $createOrUpdatePayload
        ]);
    }
    /**
     * Gets the Web Service Definition as specified by a subscription, resource group, and name. Note that the storage credentials and web service keys are not returned by this call. To get the web service access keys, call List Keys.
     * @param string $resourceGroupName
     * @param string $webServiceName
     * @param string $region
     * @return array
     */
    public function get(
        $resourceGroupName,
        $webServiceName,
        $region
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'webServiceName' => $webServiceName,
            'region' => $region
        ]);
    }
    /**
     * Modifies an existing web service resource. The PATCH API call is an asynchronous operation. To determine whether it has completed successfully, you must perform a Get operation.
     * @param string $resourceGroupName
     * @param string $webServiceName
     * @param array $patchPayload
     * @return array
     */
    public function patch(
        $resourceGroupName,
        $webServiceName,
        array $patchPayload
    )
    {
        return $this->_Patch_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'webServiceName' => $webServiceName,
            'patchPayload' => $patchPayload
        ]);
    }
    /**
     * Deletes the specified web service.
     * @param string $resourceGroupName
     * @param string $webServiceName
     */
    public function remove(
        $resourceGroupName,
        $webServiceName
    )
    {
        return $this->_Remove_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'webServiceName' => $webServiceName
        ]);
    }
    /**
     * Creates an encrypted credentials parameter blob for the specified region. To get the web service from a region other than the region in which it has been created, you must first call Create Regional Web Services Properties to create a copy of the encrypted credential parameter blob in that region. You only need to do this before the first time that you get the web service in the new region.
     * @param string $resourceGroupName
     * @param string $webServiceName
     * @param string $region
     * @return array
     */
    public function createRegionalProperties(
        $resourceGroupName,
        $webServiceName,
        $region
    )
    {
        return $this->_CreateRegionalProperties_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'webServiceName' => $webServiceName,
            'region' => $region
        ]);
    }
    /**
     * Gets the access keys for the specified web service.
     * @param string $resourceGroupName
     * @param string $webServiceName
     * @return array
     */
    public function listKeys(
        $resourceGroupName,
        $webServiceName
    )
    {
        return $this->_ListKeys_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'webServiceName' => $webServiceName
        ]);
    }
    /**
     * Gets the web services in the specified resource group.
     * @param string $resourceGroupName
     * @param string $_skiptoken
     * @return array
     */
    public function listByResourceGroup(
        $resourceGroupName,
        $_skiptoken
    )
    {
        return $this->_ListByResourceGroup_operation->call([
            'resourceGroupName' => $resourceGroupName,
            '$skiptoken' => $_skiptoken
        ]);
    }
    /**
     * Gets the web services in the specified subscription.
     * @param string $_skiptoken
     * @return array
     */
    public function listBySubscriptionId($_skiptoken)
    {
        return $this->_ListBySubscriptionId_operation->call(['$skiptoken' => $_skiptoken]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateOrUpdate_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Patch_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Remove_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateRegionalProperties_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListKeys_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByResourceGroup_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListBySubscriptionId_operation;
}
