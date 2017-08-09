<?php
namespace Microsoft\Azure\Management\Automation;
final class RunbookDraft
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_GetContent_operation = $_client->createOperation('RunbookDraft_GetContent');
        $this->_CreateOrUpdate_operation = $_client->createOperation('RunbookDraft_CreateOrUpdate');
        $this->_Get_operation = $_client->createOperation('RunbookDraft_Get');
        $this->_Publish_operation = $_client->createOperation('RunbookDraft_Publish');
        $this->_UndoEdit_operation = $_client->createOperation('RunbookDraft_UndoEdit');
    }
    /**
     * Retrieve the content of runbook draft identified by runbook name.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param string $runbookName
     * @return string
     */
    public function getContent(
        $resourceGroupName,
        $automationAccountName,
        $runbookName
    )
    {
        return $this->_GetContent_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            'runbookName' => $runbookName
        ]);
    }
    /**
     * Updates the runbook draft with runbookStream as its content.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param string $runbookName
     * @param string $runbookContent
     */
    public function createOrUpdate(
        $resourceGroupName,
        $automationAccountName,
        $runbookName,
        $runbookContent
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            'runbookName' => $runbookName,
            'runbookContent' => $runbookContent
        ]);
    }
    /**
     * Retrieve the runbook draft identified by runbook name.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param string $runbookName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $automationAccountName,
        $runbookName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            'runbookName' => $runbookName
        ]);
    }
    /**
     * Publish runbook draft.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param string $runbookName
     * @return array
     */
    public function publish(
        $resourceGroupName,
        $automationAccountName,
        $runbookName
    )
    {
        return $this->_Publish_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            'runbookName' => $runbookName
        ]);
    }
    /**
     * Retrieve the runbook identified by runbook name.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param string $runbookName
     * @return array
     */
    public function undoEdit(
        $resourceGroupName,
        $automationAccountName,
        $runbookName
    )
    {
        return $this->_UndoEdit_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            'runbookName' => $runbookName
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetContent_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateOrUpdate_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Publish_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_UndoEdit_operation;
}
