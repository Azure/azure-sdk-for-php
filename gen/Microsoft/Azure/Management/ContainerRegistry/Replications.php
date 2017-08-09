<?php
namespace Microsoft\Azure\Management\ContainerRegistry;
final class Replications
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Get_operation = $_client->createOperation('Replications_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('Replications_CreateOrUpdate');
        $this->_Delete_operation = $_client->createOperation('Replications_Delete');
        $this->_List_operation = $_client->createOperation('Replications_List');
    }
    /**
     * Gets the properties of the specified replication.
     * @param string $resourceGroupName
     * @param string $registryName
     * @param string $replicationName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $registryName,
        $replicationName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'registryName' => $registryName,
            'replicationName' => $replicationName
        ]);
    }
    /**
     * Creates or updates a replication for a container registry with the specified parameters.
     * @param string $resourceGroupName
     * @param string $registryName
     * @param string $replicationName
     * @param array $replication
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $registryName,
        $replicationName,
        array $replication
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'registryName' => $registryName,
            'replicationName' => $replicationName,
            'replication' => $replication
        ]);
    }
    /**
     * Deletes a replication from a container registry.
     * @param string $resourceGroupName
     * @param string $registryName
     * @param string $replicationName
     */
    public function delete(
        $resourceGroupName,
        $registryName,
        $replicationName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'registryName' => $registryName,
            'replicationName' => $replicationName
        ]);
    }
    /**
     * Lists all the replications for the specified container registry.
     * @param string $resourceGroupName
     * @param string $registryName
     * @return array
     */
    public function list_(
        $resourceGroupName,
        $registryName
    )
    {
        return $this->_List_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'registryName' => $registryName
        ]);
    }
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
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
}
