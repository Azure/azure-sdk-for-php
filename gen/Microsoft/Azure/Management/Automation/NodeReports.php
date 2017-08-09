<?php
namespace Microsoft\Azure\Management\Automation;
final class NodeReports
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListByNode_operation = $_client->createOperation('NodeReports_ListByNode');
        $this->_Get_operation = $_client->createOperation('NodeReports_Get');
        $this->_GetContent_operation = $_client->createOperation('NodeReports_GetContent');
    }
    /**
     * Retrieve the Dsc node report list by node id.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param string $nodeId
     * @param string|null $_filter
     * @return array
     */
    public function listByNode(
        $resourceGroupName,
        $automationAccountName,
        $nodeId,
        $_filter = null
    )
    {
        return $this->_ListByNode_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            'nodeId' => $nodeId,
            '$filter' => $_filter
        ]);
    }
    /**
     * Retrieve the Dsc node report data by node id and report id.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param string $nodeId
     * @param string $reportId
     * @return array
     */
    public function get(
        $resourceGroupName,
        $automationAccountName,
        $nodeId,
        $reportId
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            'nodeId' => $nodeId,
            'reportId' => $reportId
        ]);
    }
    /**
     * Retrieve the Dsc node reports by node id and report id.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param string $nodeId
     * @param string $reportId
     * @return string
     */
    public function getContent(
        $resourceGroupName,
        $automationAccountName,
        $nodeId,
        $reportId
    )
    {
        return $this->_GetContent_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            'nodeId' => $nodeId,
            'reportId' => $reportId
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByNode_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetContent_operation;
}
