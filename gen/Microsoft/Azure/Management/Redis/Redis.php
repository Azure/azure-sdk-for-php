<?php
namespace Microsoft\Azure\Management\Redis;
final class Redis
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Create_operation = $_client->createOperation('Redis_Create');
        $this->_Update_operation = $_client->createOperation('Redis_Update');
        $this->_Delete_operation = $_client->createOperation('Redis_Delete');
        $this->_Get_operation = $_client->createOperation('Redis_Get');
        $this->_ListByResourceGroup_operation = $_client->createOperation('Redis_ListByResourceGroup');
        $this->_List_operation = $_client->createOperation('Redis_List');
        $this->_ListKeys_operation = $_client->createOperation('Redis_ListKeys');
        $this->_RegenerateKey_operation = $_client->createOperation('Redis_RegenerateKey');
        $this->_ForceReboot_operation = $_client->createOperation('Redis_ForceReboot');
        $this->_ImportData_operation = $_client->createOperation('Redis_ImportData');
        $this->_ExportData_operation = $_client->createOperation('Redis_ExportData');
    }
    /**
     * Create or replace (overwrite/recreate, with potential downtime) an existing Redis cache.
     * @param string $resourceGroupName
     * @param string $name
     * @param array $parameters
     * @return array
     */
    public function create(
        $resourceGroupName,
        $name,
        array $parameters
    )
    {
        return $this->_Create_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'parameters' => $parameters
        ]);
    }
    /**
     * Update an existing Redis cache.
     * @param string $resourceGroupName
     * @param string $name
     * @param array $parameters
     * @return array
     */
    public function update(
        $resourceGroupName,
        $name,
        array $parameters
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'parameters' => $parameters
        ]);
    }
    /**
     * Deletes a Redis cache.
     * @param string $resourceGroupName
     * @param string $name
     */
    public function delete(
        $resourceGroupName,
        $name
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name
        ]);
    }
    /**
     * Gets a Redis cache (resource description).
     * @param string $resourceGroupName
     * @param string $name
     * @return array
     */
    public function get(
        $resourceGroupName,
        $name
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name
        ]);
    }
    /**
     * Lists all Redis caches in a resource group.
     * @param string $resourceGroupName
     * @return array
     */
    public function listByResourceGroup($resourceGroupName)
    {
        return $this->_ListByResourceGroup_operation->call(['resourceGroupName' => $resourceGroupName]);
    }
    /**
     * Gets all Redis caches in the specified subscription.
     * @return array
     */
    public function list_()
    {
        return $this->_List_operation->call([]);
    }
    /**
     * Retrieve a Redis cache's access keys. This operation requires write permission to the cache resource.
     * @param string $resourceGroupName
     * @param string $name
     * @return array
     */
    public function listKeys(
        $resourceGroupName,
        $name
    )
    {
        return $this->_ListKeys_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name
        ]);
    }
    /**
     * Regenerate Redis cache's access keys. This operation requires write permission to the cache resource.
     * @param string $resourceGroupName
     * @param string $name
     * @param array $parameters
     * @return array
     */
    public function regenerateKey(
        $resourceGroupName,
        $name,
        array $parameters
    )
    {
        return $this->_RegenerateKey_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'parameters' => $parameters
        ]);
    }
    /**
     * Reboot specified Redis node(s). This operation requires write permission to the cache resource. There can be potential data loss.
     * @param string $resourceGroupName
     * @param string $name
     * @param array $parameters
     * @return array
     */
    public function forceReboot(
        $resourceGroupName,
        $name,
        array $parameters
    )
    {
        return $this->_ForceReboot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'parameters' => $parameters
        ]);
    }
    /**
     * Import data into Redis cache.
     * @param string $resourceGroupName
     * @param string $name
     * @param array $parameters
     */
    public function importData(
        $resourceGroupName,
        $name,
        array $parameters
    )
    {
        return $this->_ImportData_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'parameters' => $parameters
        ]);
    }
    /**
     * Export data from the redis cache to blobs in a container.
     * @param string $resourceGroupName
     * @param string $name
     * @param array $parameters
     */
    public function exportData(
        $resourceGroupName,
        $name,
        array $parameters
    )
    {
        return $this->_ExportData_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'parameters' => $parameters
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Create_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Update_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Delete_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
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
    private $_ListKeys_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_RegenerateKey_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ForceReboot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ImportData_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ExportData_operation;
}
