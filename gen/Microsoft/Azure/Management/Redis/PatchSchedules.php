<?php
namespace Microsoft\Azure\Management\Redis;
final class PatchSchedules
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_CreateOrUpdate_operation = $_client->createOperation('PatchSchedules_CreateOrUpdate');
        $this->_Delete_operation = $_client->createOperation('PatchSchedules_Delete');
        $this->_Get_operation = $_client->createOperation('PatchSchedules_Get');
    }
    /**
     * Create or replace the patching schedule for Redis cache (requires Premium SKU).
     * @param string $resourceGroupName
     * @param string $name
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $name,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'parameters' => $parameters
        ]);
    }
    /**
     * Deletes the patching schedule of a redis cache (requires Premium SKU).
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
     * Gets the patching schedule of a redis cache (requires Premium SKU).
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
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateOrUpdate_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Delete_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
}
