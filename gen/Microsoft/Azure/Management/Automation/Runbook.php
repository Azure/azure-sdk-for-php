<?php
namespace Microsoft\Azure\Management\Automation;
final class Runbook
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_GetContent_operation = $_client->createOperation('Runbook_GetContent');
        $this->_Get_operation = $_client->createOperation('Runbook_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('Runbook_CreateOrUpdate');
        $this->_Update_operation = $_client->createOperation('Runbook_Update');
        $this->_Delete_operation = $_client->createOperation('Runbook_Delete');
        $this->_ListByAutomationAccount_operation = $_client->createOperation('Runbook_ListByAutomationAccount');
    }
    /**
     * Retrieve the content of runbook identified by runbook name.
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
     * Retrieve the runbook identified by runbook name.
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
     * Create the runbook identified by runbook name.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param string $runbookName
     * @param array $parameters
     */
    public function createOrUpdate(
        $resourceGroupName,
        $automationAccountName,
        $runbookName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            'runbookName' => $runbookName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Update the runbook identified by runbook name.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param string $runbookName
     * @param array $parameters
     * @return array
     */
    public function update(
        $resourceGroupName,
        $automationAccountName,
        $runbookName,
        array $parameters
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            'runbookName' => $runbookName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Delete the runbook by name.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param string $runbookName
     */
    public function delete(
        $resourceGroupName,
        $automationAccountName,
        $runbookName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            'runbookName' => $runbookName
        ]);
    }
    /**
     * Retrieve a list of runbooks.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @return array
     */
    public function listByAutomationAccount(
        $resourceGroupName,
        $automationAccountName
    )
    {
        return $this->_ListByAutomationAccount_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetContent_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateOrUpdate_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Update_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Delete_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByAutomationAccount_operation;
}
