<?php
namespace Microsoft\Azure\Management\Automation\_2015_10_31;
final class DscNode
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Delete_operation = $_client->createOperation('DscNode_Delete');
        $this->_Get_operation = $_client->createOperation('DscNode_Get');
        $this->_Update_operation = $_client->createOperation('DscNode_Update');
        $this->_ListByAutomationAccount_operation = $_client->createOperation('DscNode_ListByAutomationAccount');
    }
    /**
     * Delete the dsc node identified by node id.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param string $nodeId
     * @return array
     */
    public function delete(
        $resourceGroupName,
        $automationAccountName,
        $nodeId
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            'nodeId' => $nodeId
        ]);
    }
    /**
     * Retrieve the dsc node identified by node id.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param string $nodeId
     * @return array
     */
    public function get(
        $resourceGroupName,
        $automationAccountName,
        $nodeId
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            'nodeId' => $nodeId
        ]);
    }
    /**
     * Update the dsc node.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param string $nodeId
     * @param array $parameters
     * @return array
     */
    public function update(
        $resourceGroupName,
        $automationAccountName,
        $nodeId,
        array $parameters
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            'nodeId' => $nodeId,
            'parameters' => $parameters
        ]);
    }
    /**
     * Retrieve a list of dsc nodes.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param string $_filter
     * @return array
     */
    public function listByAutomationAccount(
        $resourceGroupName,
        $automationAccountName,
        $_filter
    )
    {
        return $this->_ListByAutomationAccount_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            '$filter' => $_filter
        ]);
    }
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
    private $_Update_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByAutomationAccount_operation;
}
