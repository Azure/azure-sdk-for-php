<?php
namespace Microsoft\Azure\Management\HdInsight;
final class ScriptActions
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Delete_operation = $_client->createOperation('ScriptActions_Delete');
        $this->_List_operation = $_client->createOperation('ScriptActions_List');
    }
    /**
     * Deletes a given persisted script action of the cluster.
     * @param string $resourceGroupName
     * @param string $clusterName
     * @param string $scriptName
     */
    public function delete(
        $resourceGroupName,
        $clusterName,
        $scriptName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'clusterName' => $clusterName,
            'scriptName' => $scriptName
        ]);
    }
    /**
     * Lists all persisted script actions for the given cluster.
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
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Delete_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
}
