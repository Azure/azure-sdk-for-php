<?php
namespace Microsoft\Azure\Management\Automation;
final class HybridRunbookWorkerGroup
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Delete_operation = $_client->createOperation('HybridRunbookWorkerGroup_Delete');
        $this->_Get_operation = $_client->createOperation('HybridRunbookWorkerGroup_Get');
        $this->_Update_operation = $_client->createOperation('HybridRunbookWorkerGroup_Update');
        $this->_ListByAutomationAccount_operation = $_client->createOperation('HybridRunbookWorkerGroup_ListByAutomationAccount');
    }
    /**
     * Delete a hybrid runbook worker group.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param string $hybridRunbookWorkerGroupName
     */
    public function delete(
        $resourceGroupName,
        $automationAccountName,
        $hybridRunbookWorkerGroupName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            'hybridRunbookWorkerGroupName' => $hybridRunbookWorkerGroupName
        ]);
    }
    /**
     * Retrieve a hybrid runbook worker group.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param string $hybridRunbookWorkerGroupName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $automationAccountName,
        $hybridRunbookWorkerGroupName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            'hybridRunbookWorkerGroupName' => $hybridRunbookWorkerGroupName
        ]);
    }
    /**
     * Update a hybrid runbook worker group.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param string $hybridRunbookWorkerGroupName
     * @param array $parameters
     * @return array
     */
    public function update(
        $resourceGroupName,
        $automationAccountName,
        $hybridRunbookWorkerGroupName,
        array $parameters
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            'hybridRunbookWorkerGroupName' => $hybridRunbookWorkerGroupName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Retrieve a list of hybrid runbook worker groups.
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
    private $_Delete_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Update_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByAutomationAccount_operation;
}
