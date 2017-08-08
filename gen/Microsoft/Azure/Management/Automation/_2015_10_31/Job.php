<?php
namespace Microsoft\Azure\Management\Automation\_2015_10_31;
final class Job
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_GetOutput_operation = $_client->createOperation('Job_GetOutput');
        $this->_GetRunbookContent_operation = $_client->createOperation('Job_GetRunbookContent');
        $this->_Suspend_operation = $_client->createOperation('Job_Suspend');
        $this->_Stop_operation = $_client->createOperation('Job_Stop');
        $this->_Get_operation = $_client->createOperation('Job_Get');
        $this->_Create_operation = $_client->createOperation('Job_Create');
        $this->_ListByAutomationAccount_operation = $_client->createOperation('Job_ListByAutomationAccount');
        $this->_Resume_operation = $_client->createOperation('Job_Resume');
    }
    /**
     * Retrieve the job output identified by job id.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param string $jobId
     * @return string
     */
    public function getOutput(
        $resourceGroupName,
        $automationAccountName,
        $jobId
    )
    {
        return $this->_GetOutput_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            'jobId' => $jobId
        ]);
    }
    /**
     * Retrieve the runbook content of the job identified by job id.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param string $jobId
     * @return string
     */
    public function getRunbookContent(
        $resourceGroupName,
        $automationAccountName,
        $jobId
    )
    {
        return $this->_GetRunbookContent_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            'jobId' => $jobId
        ]);
    }
    /**
     * Suspend the job identified by jobId.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param string $jobId
     */
    public function suspend(
        $resourceGroupName,
        $automationAccountName,
        $jobId
    )
    {
        return $this->_Suspend_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            'jobId' => $jobId
        ]);
    }
    /**
     * Stop the job identified by jobId.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param string $jobId
     */
    public function stop(
        $resourceGroupName,
        $automationAccountName,
        $jobId
    )
    {
        return $this->_Stop_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            'jobId' => $jobId
        ]);
    }
    /**
     * Retrieve the job identified by job id.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param string $jobId
     * @return array
     */
    public function get(
        $resourceGroupName,
        $automationAccountName,
        $jobId
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            'jobId' => $jobId
        ]);
    }
    /**
     * Create a job of the runbook.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param string $jobId
     * @param array $parameters
     * @return array
     */
    public function create(
        $resourceGroupName,
        $automationAccountName,
        $jobId,
        array $parameters
    )
    {
        return $this->_Create_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            'jobId' => $jobId,
            'parameters' => $parameters
        ]);
    }
    /**
     * Retrieve a list of jobs.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param string $_filter
     * @return array
     */
    public function listByAutomationAccount(
        $resourceGroupName,
        $automationAccountName,
        $_filter
    )
    {
        return $this->_ListByAutomationAccount_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            '$filter' => $_filter
        ]);
    }
    /**
     * Resume the job identified by jobId.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param string $jobId
     */
    public function resume(
        $resourceGroupName,
        $automationAccountName,
        $jobId
    )
    {
        return $this->_Resume_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            'jobId' => $jobId
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetOutput_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetRunbookContent_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Suspend_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Stop_operation;
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
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Resume_operation;
}
