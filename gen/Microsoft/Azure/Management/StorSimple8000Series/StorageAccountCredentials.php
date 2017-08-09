<?php
namespace Microsoft\Azure\Management\StorSimple8000Series;
final class StorageAccountCredentials
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListByManager_operation = $_client->createOperation('StorageAccountCredentials_ListByManager');
        $this->_Get_operation = $_client->createOperation('StorageAccountCredentials_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('StorageAccountCredentials_CreateOrUpdate');
        $this->_Delete_operation = $_client->createOperation('StorageAccountCredentials_Delete');
    }
    /**
     * Gets all the storage account credentials in a manager.
     * @param string $resourceGroupName
     * @param string $managerName
     * @return array
     */
    public function listByManager(
        $resourceGroupName,
        $managerName
    )
    {
        return $this->_ListByManager_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'managerName' => $managerName
        ]);
    }
    /**
     * Gets the properties of the specified storage account credential name.
     * @param string $storageAccountCredentialName
     * @param string $resourceGroupName
     * @param string $managerName
     * @return array
     */
    public function get(
        $storageAccountCredentialName,
        $resourceGroupName,
        $managerName
    )
    {
        return $this->_Get_operation->call([
            'storageAccountCredentialName' => $storageAccountCredentialName,
            'resourceGroupName' => $resourceGroupName,
            'managerName' => $managerName
        ]);
    }
    /**
     * Creates or updates the storage account credential.
     * @param string $storageAccountCredentialName
     * @param array $parameters
     * @param string $resourceGroupName
     * @param string $managerName
     * @return array
     */
    public function createOrUpdate(
        $storageAccountCredentialName,
        array $parameters,
        $resourceGroupName,
        $managerName
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'storageAccountCredentialName' => $storageAccountCredentialName,
            'parameters' => $parameters,
            'resourceGroupName' => $resourceGroupName,
            'managerName' => $managerName
        ]);
    }
    /**
     * Deletes the storage account credential.
     * @param string $storageAccountCredentialName
     * @param string $resourceGroupName
     * @param string $managerName
     */
    public function delete(
        $storageAccountCredentialName,
        $resourceGroupName,
        $managerName
    )
    {
        return $this->_Delete_operation->call([
            'storageAccountCredentialName' => $storageAccountCredentialName,
            'resourceGroupName' => $resourceGroupName,
            'managerName' => $managerName
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByManager_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateOrUpdate_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Delete_operation;
}
