<?php
namespace Microsoft\Azure\Management\Logic;
final class WorkflowVersions
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_List_operation = $_client->createOperation('WorkflowVersions_List');
        $this->_Get_operation = $_client->createOperation('WorkflowVersions_Get');
        $this->_ListCallbackUrl_operation = $_client->createOperation('WorkflowVersions_ListCallbackUrl');
    }
    /**
     * Gets a list of workflow versions.
     * @param string $resourceGroupName
     * @param string $workflowName
     * @param integer $_top
     * @return array
     */
    public function list_(
        $resourceGroupName,
        $workflowName,
        $_top
    )
    {
        return $this->_List_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'workflowName' => $workflowName,
            '$top' => $_top
        ]);
    }
    /**
     * Gets a workflow version.
     * @param string $resourceGroupName
     * @param string $workflowName
     * @param string $versionId
     * @return array
     */
    public function get(
        $resourceGroupName,
        $workflowName,
        $versionId
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'workflowName' => $workflowName,
            'versionId' => $versionId
        ]);
    }
    /**
     * Lists the callback URL for a trigger of a workflow version.
     * @param string $resourceGroupName
     * @param string $workflowName
     * @param string $versionId
     * @param string $triggerName
     * @param array $parameters
     * @return array
     */
    public function listCallbackUrl(
        $resourceGroupName,
        $workflowName,
        $versionId,
        $triggerName,
        array $parameters
    )
    {
        return $this->_ListCallbackUrl_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'workflowName' => $workflowName,
            'versionId' => $versionId,
            'triggerName' => $triggerName,
            'parameters' => $parameters
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
    private $_ListCallbackUrl_operation;
}
