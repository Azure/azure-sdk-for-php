<?php
namespace Microsoft\Azure\Management\ServerManagement\_2016_07_01_preview;
final class Node
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Create_operation = $_client->createOperation('Node_Create');
        $this->_Update_operation = $_client->createOperation('Node_Update');
        $this->_Delete_operation = $_client->createOperation('Node_Delete');
        $this->_Get_operation = $_client->createOperation('Node_Get');
        $this->_List_operation = $_client->createOperation('Node_List');
        $this->_ListForResourceGroup_operation = $_client->createOperation('Node_ListForResourceGroup');
    }
    /**
     * Creates or updates a management node.
     * @param string $resourceGroupName
     * @param string $nodeName
     * @param array $gatewayParameters
     * @return array
     */
    public function create(
        $resourceGroupName,
        $nodeName,
        array $gatewayParameters
    )
    {
        return $this->_Create_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'nodeName' => $nodeName,
            'GatewayParameters' => $gatewayParameters
        ]);
    }
    /**
     * Updates a management node.
     * @param string $resourceGroupName
     * @param string $nodeName
     * @param array $nodeParameters
     * @return array
     */
    public function update(
        $resourceGroupName,
        $nodeName,
        array $nodeParameters
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'nodeName' => $nodeName,
            'NodeParameters' => $nodeParameters
        ]);
    }
    /**
     * deletes a management node
     * @param string $resourceGroupName
     * @param string $nodeName
     */
    public function delete(
        $resourceGroupName,
        $nodeName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'nodeName' => $nodeName
        ]);
    }
    /**
     * Gets a management node.
     * @param string $resourceGroupName
     * @param string $nodeName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $nodeName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'nodeName' => $nodeName
        ]);
    }
    /**
     * Lists nodes in a subscription.
     * @return array
     */
    public function list_()
    {
        return $this->_List_operation->call([]);
    }
    /**
     * Lists nodes in a resource group.
     * @param string $resourceGroupName
     * @return array
     */
    public function listForResourceGroup($resourceGroupName)
    {
        return $this->_ListForResourceGroup_operation->call(['resourceGroupName' => $resourceGroupName]);
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
    private $_List_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListForResourceGroup_operation;
}
