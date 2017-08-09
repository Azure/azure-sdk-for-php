<?php
namespace Microsoft\Azure\Management\Logic;
final class WorkflowTriggers
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_List_operation = $_client->createOperation('WorkflowTriggers_List');
        $this->_Get_operation = $_client->createOperation('WorkflowTriggers_Get');
        $this->_Run_operation = $_client->createOperation('WorkflowTriggers_Run');
        $this->_ListCallbackUrl_operation = $_client->createOperation('WorkflowTriggers_ListCallbackUrl');
    }
    /**
     * Gets a list of workflow triggers.
     * @param string $resourceGroupName
     * @param string $workflowName
     * @param integer $_top
     * @param string $_filter
     * @return array
     */
    public function list_(
        $resourceGroupName,
        $workflowName,
        $_top,
        $_filter
    )
    {
        return $this->_List_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'workflowName' => $workflowName,
            '$top' => $_top,
            '$filter' => $_filter
        ]);
    }
    /**
     * Gets a workflow trigger.
     * @param string $resourceGroupName
     * @param string $workflowName
     * @param string $triggerName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $workflowName,
        $triggerName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'workflowName' => $workflowName,
            'triggerName' => $triggerName
        ]);
    }
    /**
     * Runs a workflow trigger.
     * @param string $resourceGroupName
     * @param string $workflowName
     * @param string $triggerName
     * @return array
     */
    public function run(
        $resourceGroupName,
        $workflowName,
        $triggerName
    )
    {
        return $this->_Run_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'workflowName' => $workflowName,
            'triggerName' => $triggerName
        ]);
    }
    /**
     * Gets the callback URL for a workflow trigger.
     * @param string $resourceGroupName
     * @param string $workflowName
     * @param string $triggerName
     * @return array
     */
    public function listCallbackUrl(
        $resourceGroupName,
        $workflowName,
        $triggerName
    )
    {
        return $this->_ListCallbackUrl_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'workflowName' => $workflowName,
            'triggerName' => $triggerName
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Run_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListCallbackUrl_operation;
}
