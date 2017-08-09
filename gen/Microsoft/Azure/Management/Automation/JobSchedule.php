<?php
namespace Microsoft\Azure\Management\Automation;
final class JobSchedule
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Delete_operation = $_client->createOperation('JobSchedule_Delete');
        $this->_Get_operation = $_client->createOperation('JobSchedule_Get');
        $this->_Create_operation = $_client->createOperation('JobSchedule_Create');
        $this->_ListByAutomationAccount_operation = $_client->createOperation('JobSchedule_ListByAutomationAccount');
    }
    /**
     * Delete the job schedule identified by job schedule name.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param string $jobScheduleId
     */
    public function delete(
        $resourceGroupName,
        $automationAccountName,
        $jobScheduleId
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            'jobScheduleId' => $jobScheduleId
        ]);
    }
    /**
     * Retrieve the job schedule identified by job schedule name.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param string $jobScheduleId
     * @return array
     */
    public function get(
        $resourceGroupName,
        $automationAccountName,
        $jobScheduleId
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            'jobScheduleId' => $jobScheduleId
        ]);
    }
    /**
     * Create a job schedule.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param string $jobScheduleId
     * @param array $parameters
     * @return array
     */
    public function create(
        $resourceGroupName,
        $automationAccountName,
        $jobScheduleId,
        array $parameters
    )
    {
        return $this->_Create_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            'jobScheduleId' => $jobScheduleId,
            'parameters' => $parameters
        ]);
    }
    /**
     * Retrieve a list of job schedules.
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
    private $_Create_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByAutomationAccount_operation;
}
