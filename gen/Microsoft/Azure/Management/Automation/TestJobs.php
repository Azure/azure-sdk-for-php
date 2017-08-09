<?php
namespace Microsoft\Azure\Management\Automation;
final class TestJobs
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Create_operation = $_client->createOperation('TestJobs_Create');
        $this->_Get_operation = $_client->createOperation('TestJobs_Get');
        $this->_Resume_operation = $_client->createOperation('TestJobs_Resume');
        $this->_Stop_operation = $_client->createOperation('TestJobs_Stop');
        $this->_Suspend_operation = $_client->createOperation('TestJobs_Suspend');
    }
    /**
     * Create a test job of the runbook.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param string $runbookName
     * @param array $parameters
     * @return array
     */
    public function create(
        $resourceGroupName,
        $automationAccountName,
        $runbookName,
        array $parameters
    )
    {
        return $this->_Create_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            'runbookName' => $runbookName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Retrieve the test job for the specified runbook.
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
     * Resume the test job.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param string $runbookName
     */
    public function resume(
        $resourceGroupName,
        $automationAccountName,
        $runbookName
    )
    {
        return $this->_Resume_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            'runbookName' => $runbookName
        ]);
    }
    /**
     * Stop the test job.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param string $runbookName
     */
    public function stop(
        $resourceGroupName,
        $automationAccountName,
        $runbookName
    )
    {
        return $this->_Stop_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            'runbookName' => $runbookName
        ]);
    }
    /**
     * Suspend the test job.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param string $runbookName
     */
    public function suspend(
        $resourceGroupName,
        $automationAccountName,
        $runbookName
    )
    {
        return $this->_Suspend_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            'runbookName' => $runbookName
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Create_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Resume_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Stop_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Suspend_operation;
}
