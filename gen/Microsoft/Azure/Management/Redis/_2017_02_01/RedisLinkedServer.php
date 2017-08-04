<?php
namespace Microsoft\Azure\Management\Redis\_2017_02_01;
final class RedisLinkedServer
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Create_operation = $_client->createOperation('RedisLinkedServer_Create');
        $this->_Delete_operation = $_client->createOperation('RedisLinkedServer_Delete');
        $this->_Get_operation = $_client->createOperation('RedisLinkedServer_Get');
        $this->_List_operation = $_client->createOperation('RedisLinkedServer_List');
    }
    /**
     * Adds a linked server to the Redis cache (requires Premium SKU).
     * @param string $resourceGroupName
     * @param string $name
     * @param string $linkedServerName
     * @param array $parameters
     * @return array
     */
    public function create(
        $resourceGroupName,
        $name,
        $linkedServerName,
        array $parameters
    )
    {
        return $this->_Create_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'linkedServerName' => $linkedServerName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Deletes the linked server from a redis cache (requires Premium SKU).
     * @param string $resourceGroupName
     * @param string $name
     * @param string $linkedServerName
     */
    public function delete(
        $resourceGroupName,
        $name,
        $linkedServerName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'linkedServerName' => $linkedServerName
        ]);
    }
    /**
     * Gets the detailed information about a linked server of a redis cache (requires Premium SKU).
     * @param string $resourceGroupName
     * @param string $name
     * @param string $linkedServerName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $name,
        $linkedServerName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'linkedServerName' => $linkedServerName
        ]);
    }
    /**
     * Gets the list of linked servers associated with this redis cache (requires Premium SKU).
     * @param string $resourceGroupName
     * @param string $name
     * @return array
     */
    public function list_(
        $resourceGroupName,
        $name
    )
    {
        return $this->_List_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Create_operation;
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
    private $_List_operation;
}
