<?php
namespace Microsoft\Azure\Management\ServiceFabric\_2016_09_01;
final class Clusters
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Update_operation = $_client->createOperation('Clusters_Update');
        $this->_Get_operation = $_client->createOperation('Clusters_Get');
        $this->_Create_operation = $_client->createOperation('Clusters_Create');
        $this->_Delete_operation = $_client->createOperation('Clusters_Delete');
        $this->_ListByResourceGroup_operation = $_client->createOperation('Clusters_ListByResourceGroup');
        $this->_List_operation = $_client->createOperation('Clusters_List');
    }
    /**
     * Update cluster configuration
     * @param string $resourceGroupName
     * @param string $clusterName
     * @param array $parameters
     * @return array
     */
    public function update(
        $resourceGroupName,
        $clusterName,
        array $parameters
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'clusterName' => $clusterName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Get cluster resource
     * @param string $resourceGroupName
     * @param string $clusterName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $clusterName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'clusterName' => $clusterName
        ]);
    }
    /**
     * Create cluster resource
     * @param string $resourceGroupName
     * @param string $clusterName
     * @param array $parameters
     * @return array
     */
    public function create(
        $resourceGroupName,
        $clusterName,
        array $parameters
    )
    {
        return $this->_Create_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'clusterName' => $clusterName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Delete cluster resource
     * @param string $resourceGroupName
     * @param string $clusterName
     */
    public function delete(
        $resourceGroupName,
        $clusterName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'clusterName' => $clusterName
        ]);
    }
    /**
     * List cluster resource by resource group
     * @param string $resourceGroupName
     * @return array
     */
    public function listByResourceGroup($resourceGroupName)
    {
        return $this->_ListByResourceGroup_operation->call(['resourceGroupName' => $resourceGroupName]);
    }
    /**
     * List cluster resource
     * @return array
     */
    public function list_()
    {
        return $this->_List_operation->call([]);
    }
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
    private $_Create_operation;
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
}
