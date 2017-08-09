<?php
namespace Microsoft\Azure\Management\HdInsight;
final class Clusters
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Create_operation = $_client->createOperation('Clusters_Create');
        $this->_Update_operation = $_client->createOperation('Clusters_Update');
        $this->_Delete_operation = $_client->createOperation('Clusters_Delete');
        $this->_Get_operation = $_client->createOperation('Clusters_Get');
        $this->_ListByResourceGroup_operation = $_client->createOperation('Clusters_ListByResourceGroup');
        $this->_Resize_operation = $_client->createOperation('Clusters_Resize');
        $this->_List_operation = $_client->createOperation('Clusters_List');
        $this->_ChangeRdpSettings_operation = $_client->createOperation('Clusters_ChangeRdpSettings');
        $this->_ExecuteScriptActions_operation = $_client->createOperation('Clusters_ExecuteScriptActions');
    }
    /**
     * Begins creating a new HDInsight cluster with the specified parameters.
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
     * Patch HDInsight cluster with the specified parameters.
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
     * Begins deleting the specified HDInsight cluster.
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
     * Gets the specified cluster.
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
     * List the HDInsight clusters in a resource group.
     * @param string $resourceGroupName
     * @return array
     */
    public function listByResourceGroup($resourceGroupName)
    {
        return $this->_ListByResourceGroup_operation->call(['resourceGroupName' => $resourceGroupName]);
    }
    /**
     * Begins a resize operation on the specified HDInsight cluster.
     * @param string $resourceGroupName
     * @param string $clusterName
     * @param array $parameters
     */
    public function resize(
        $resourceGroupName,
        $clusterName,
        array $parameters
    )
    {
        return $this->_Resize_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'clusterName' => $clusterName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Lists HDInsight clusters under the subscription.
     * @return array
     */
    public function list_()
    {
        return $this->_List_operation->call([]);
    }
    /**
     * Begins changing the RDP settings on the specified cluster.
     * @param string $resourceGroupName
     * @param string $clusterName
     * @param array $parameters
     */
    public function changeRdpSettings(
        $resourceGroupName,
        $clusterName,
        array $parameters
    )
    {
        return $this->_ChangeRdpSettings_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'clusterName' => $clusterName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Begins executing script actions on the specified HDInsight cluster.
     * @param string $resourceGroupName
     * @param string $clusterName
     * @param array $parameters
     */
    public function executeScriptActions(
        $resourceGroupName,
        $clusterName,
        array $parameters
    )
    {
        return $this->_ExecuteScriptActions_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'clusterName' => $clusterName,
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
    private $_Resize_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ChangeRdpSettings_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ExecuteScriptActions_operation;
}
