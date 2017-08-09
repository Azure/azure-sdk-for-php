<?php
namespace Microsoft\Azure\Management\Logic;
final class WorkflowRunActions
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_List_operation = $_client->createOperation('WorkflowRunActions_List');
        $this->_Get_operation = $_client->createOperation('WorkflowRunActions_Get');
    }
    /**
     * Gets a list of workflow run actions.
     * @param string $resourceGroupName
     * @param string $workflowName
     * @param string $runName
     * @param integer|null $_top
     * @param string|null $_filter
     * @return array
     */
    public function list_(
        $resourceGroupName,
        $workflowName,
        $runName,
        $_top = null,
        $_filter = null
    )
    {
        return $this->_List_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'workflowName' => $workflowName,
            'runName' => $runName,
            '$top' => $_top,
            '$filter' => $_filter
        ]);
    }
    /**
     * Gets a workflow run action.
     * @param string $resourceGroupName
     * @param string $workflowName
     * @param string $runName
     * @param string $actionName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $workflowName,
        $runName,
        $actionName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'workflowName' => $workflowName,
            'runName' => $runName,
            'actionName' => $actionName
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
}
