<?php
namespace Microsoft\Azure\Management\Logic;
final class WorkflowRuns
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_List_operation = $_client->createOperation('WorkflowRuns_List');
        $this->_Get_operation = $_client->createOperation('WorkflowRuns_Get');
        $this->_Cancel_operation = $_client->createOperation('WorkflowRuns_Cancel');
    }
    /**
     * Gets a list of workflow runs.
     * @param string $resourceGroupName
     * @param string $workflowName
     * @param integer|null $_top
     * @param string|null $_filter
     * @return array
     */
    public function list_(
        $resourceGroupName,
        $workflowName,
        $_top = null,
        $_filter = null
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
     * Gets a workflow run.
     * @param string $resourceGroupName
     * @param string $workflowName
     * @param string $runName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $workflowName,
        $runName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'workflowName' => $workflowName,
            'runName' => $runName
        ]);
    }
    /**
     * Cancels a workflow run.
     * @param string $resourceGroupName
     * @param string $workflowName
     * @param string $runName
     */
    public function cancel(
        $resourceGroupName,
        $workflowName,
        $runName
    )
    {
        return $this->_Cancel_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'workflowName' => $workflowName,
            'runName' => $runName
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
    private $_Cancel_operation;
}
