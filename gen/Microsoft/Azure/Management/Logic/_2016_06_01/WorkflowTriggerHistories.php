<?php
namespace Microsoft\Azure\Management\Logic\_2016_06_01;
final class WorkflowTriggerHistories
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_List_operation = $_client->createOperation('WorkflowTriggerHistories_List');
        $this->_Get_operation = $_client->createOperation('WorkflowTriggerHistories_Get');
        $this->_Resubmit_operation = $_client->createOperation('WorkflowTriggerHistories_Resubmit');
    }
    /**
     * Gets a list of workflow trigger histories.
     * @param string $resourceGroupName
     * @param string $workflowName
     * @param string $triggerName
     * @param integer $_top
     * @param string $_filter
     * @return array
     */
    public function list_(
        $resourceGroupName,
        $workflowName,
        $triggerName,
        $_top,
        $_filter
    )
    {
        return $this->_List_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'workflowName' => $workflowName,
            'triggerName' => $triggerName,
            '$top' => $_top,
            '$filter' => $_filter
        ]);
    }
    /**
     * Gets a workflow trigger history.
     * @param string $resourceGroupName
     * @param string $workflowName
     * @param string $triggerName
     * @param string $historyName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $workflowName,
        $triggerName,
        $historyName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'workflowName' => $workflowName,
            'triggerName' => $triggerName,
            'historyName' => $historyName
        ]);
    }
    /**
     * Resubmits a workflow run based on the trigger history.
     * @param string $resourceGroupName
     * @param string $workflowName
     * @param string $triggerName
     * @param string $historyName
     */
    public function resubmit(
        $resourceGroupName,
        $workflowName,
        $triggerName,
        $historyName
    )
    {
        return $this->_Resubmit_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'workflowName' => $workflowName,
            'triggerName' => $triggerName,
            'historyName' => $historyName
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
    private $_Resubmit_operation;
}
