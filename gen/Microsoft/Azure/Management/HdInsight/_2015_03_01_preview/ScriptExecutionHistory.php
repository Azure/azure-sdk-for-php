<?php
namespace Microsoft\Azure\Management\HdInsight\_2015_03_01_preview;
final class ScriptExecutionHistory
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Get_operation = $_client->createOperation('ScriptExecutionHistory_Get');
        $this->_List_operation = $_client->createOperation('ScriptExecutionHistory_List');
        $this->_Promote_operation = $_client->createOperation('ScriptExecutionHistory_Promote');
    }
    /**
     * Gets the script execution detail for the given script execution id.
     * @param string $resourceGroupName
     * @param string $clusterName
     * @param string $scriptExecutionId
     * @return array
     */
    public function get(
        $resourceGroupName,
        $clusterName,
        $scriptExecutionId
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'clusterName' => $clusterName,
            'scriptExecutionId' => $scriptExecutionId
        ]);
    }
    /**
     * Lists all scripts execution history for the given cluster.
     * @param string $resourceGroupName
     * @param string $clusterName
     * @return array
     */
    public function list_(
        $resourceGroupName,
        $clusterName
    )
    {
        return $this->_List_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'clusterName' => $clusterName
        ]);
    }
    /**
     * Promote ad-hoc script execution to a persisted script.
     * @param string $resourceGroupName
     * @param string $clusterName
     * @param string $scriptExecutionId
     */
    public function promote(
        $resourceGroupName,
        $clusterName,
        $scriptExecutionId
    )
    {
        return $this->_Promote_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'clusterName' => $clusterName,
            'scriptExecutionId' => $scriptExecutionId
        ]);
    }
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
    private $_Promote_operation;
}
