<?php
namespace Microsoft\Azure\Management\ApiManagement;
final class ApiManagementService
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Restore_operation = $_client->createOperation('ApiManagementService_Restore');
        $this->_Backup_operation = $_client->createOperation('ApiManagementService_Backup');
        $this->_CreateOrUpdate_operation = $_client->createOperation('ApiManagementService_CreateOrUpdate');
        $this->_Update_operation = $_client->createOperation('ApiManagementService_Update');
        $this->_Get_operation = $_client->createOperation('ApiManagementService_Get');
        $this->_Delete_operation = $_client->createOperation('ApiManagementService_Delete');
        $this->_ListByResourceGroup_operation = $_client->createOperation('ApiManagementService_ListByResourceGroup');
        $this->_List_operation = $_client->createOperation('ApiManagementService_List');
        $this->_GetSsoToken_operation = $_client->createOperation('ApiManagementService_GetSsoToken');
        $this->_CheckNameAvailability_operation = $_client->createOperation('ApiManagementService_CheckNameAvailability');
        $this->_ApplyNetworkConfigurationUpdates_operation = $_client->createOperation('ApiManagementService_ApplyNetworkConfigurationUpdates');
    }
    /**
     * Restores a backup of an API Management service created using the ApiManagementService_Backup operation on the current service. This is a long running operation and could take several minutes to complete.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param array $parameters
     * @return array
     */
    public function restore(
        $resourceGroupName,
        $serviceName,
        array $parameters
    )
    {
        return $this->_Restore_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Creates a backup of the API Management service to the given Azure Storage Account. This is long running operation and could take several minutes to complete.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param array $parameters
     * @return array
     */
    public function backup(
        $resourceGroupName,
        $serviceName,
        array $parameters
    )
    {
        return $this->_Backup_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Creates or updates an API Management service. This is long running operation and could take several minutes to complete.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $serviceName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Updates an existing API Management service.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param array $parameters
     * @return array
     */
    public function update(
        $resourceGroupName,
        $serviceName,
        array $parameters
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Gets an API Management service resource description.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $serviceName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName
        ]);
    }
    /**
     * Deletes an existing API Management service.
     * @param string $resourceGroupName
     * @param string $serviceName
     */
    public function delete(
        $resourceGroupName,
        $serviceName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName
        ]);
    }
    /**
     * List all API Management services within a resource group.
     * @param string $resourceGroupName
     * @return array
     */
    public function listByResourceGroup($resourceGroupName)
    {
        return $this->_ListByResourceGroup_operation->call(['resourceGroupName' => $resourceGroupName]);
    }
    /**
     * Lists all API Management services within an Azure subscription.
     * @return array
     */
    public function list_()
    {
        return $this->_List_operation->call([]);
    }
    /**
     * Gets the Single-Sign-On token for the API Management Service which is valid for 5 Minutes.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @return array
     */
    public function getSsoToken(
        $resourceGroupName,
        $serviceName
    )
    {
        return $this->_GetSsoToken_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName
        ]);
    }
    /**
     * Checks availability and correctness of a name for an API Management service.
     * @param array $parameters
     * @return array
     */
    public function checkNameAvailability(array $parameters)
    {
        return $this->_CheckNameAvailability_operation->call(['parameters' => $parameters]);
    }
    /**
     * Updates the Microsoft.ApiManagement resource running in the Virtual network to pick the updated network settings.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param array $parameters
     * @return array
     */
    public function applyNetworkConfigurationUpdates(
        $resourceGroupName,
        $serviceName,
        array $parameters
    )
    {
        return $this->_ApplyNetworkConfigurationUpdates_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'parameters' => $parameters
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Restore_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Backup_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateOrUpdate_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Update_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Delete_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByResourceGroup_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetSsoToken_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CheckNameAvailability_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ApplyNetworkConfigurationUpdates_operation;
}
