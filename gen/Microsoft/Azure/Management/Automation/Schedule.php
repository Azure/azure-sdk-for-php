<?php
namespace Microsoft\Azure\Management\Automation;
final class Schedule
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_CreateOrUpdate_operation = $_client->createOperation('Schedule_CreateOrUpdate');
        $this->_Update_operation = $_client->createOperation('Schedule_Update');
        $this->_Get_operation = $_client->createOperation('Schedule_Get');
        $this->_Delete_operation = $_client->createOperation('Schedule_Delete');
        $this->_ListByAutomationAccount_operation = $_client->createOperation('Schedule_ListByAutomationAccount');
    }
    /**
     * Create a schedule.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param string $scheduleName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $automationAccountName,
        $scheduleName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            'scheduleName' => $scheduleName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Update the schedule identified by schedule name.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param string $scheduleName
     * @param array $parameters
     * @return array
     */
    public function update(
        $resourceGroupName,
        $automationAccountName,
        $scheduleName,
        array $parameters
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            'scheduleName' => $scheduleName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Retrieve the schedule identified by schedule name.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param string $scheduleName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $automationAccountName,
        $scheduleName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            'scheduleName' => $scheduleName
        ]);
    }
    /**
     * Delete the schedule identified by schedule name.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param string $scheduleName
     */
    public function delete(
        $resourceGroupName,
        $automationAccountName,
        $scheduleName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            'scheduleName' => $scheduleName
        ]);
    }
    /**
     * Retrieve a list of schedules.
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
    private $_CreateOrUpdate_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Update_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Delete_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByAutomationAccount_operation;
}
