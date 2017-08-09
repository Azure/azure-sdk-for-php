<?php
namespace Microsoft\Azure\Management\Automation;
final class DscCompilationJob
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Create_operation = $_client->createOperation('DscCompilationJob_Create');
        $this->_Get_operation = $_client->createOperation('DscCompilationJob_Get');
        $this->_ListByAutomationAccount_operation = $_client->createOperation('DscCompilationJob_ListByAutomationAccount');
        $this->_GetStream_operation = $_client->createOperation('DscCompilationJob_GetStream');
    }
    /**
     * Creates the Dsc compilation job of the configuration.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param string $compilationJobId
     * @param array $parameters
     * @return array
     */
    public function create(
        $resourceGroupName,
        $automationAccountName,
        $compilationJobId,
        array $parameters
    )
    {
        return $this->_Create_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            'compilationJobId' => $compilationJobId,
            'parameters' => $parameters
        ]);
    }
    /**
     * Retrieve the Dsc configuration compilation job identified by job id.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param string $compilationJobId
     * @return array
     */
    public function get(
        $resourceGroupName,
        $automationAccountName,
        $compilationJobId
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            'compilationJobId' => $compilationJobId
        ]);
    }
    /**
     * Retrieve a list of dsc compilation jobs.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param string|null $_filter
     * @return array
     */
    public function listByAutomationAccount(
        $resourceGroupName,
        $automationAccountName,
        $_filter = null
    )
    {
        return $this->_ListByAutomationAccount_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            '$filter' => $_filter
        ]);
    }
    /**
     * Retrieve the job stream identified by job stream id.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param string $jobId
     * @param string $jobStreamId
     * @return array
     */
    public function getStream(
        $resourceGroupName,
        $automationAccountName,
        $jobId,
        $jobStreamId
    )
    {
        return $this->_GetStream_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            'jobId' => $jobId,
            'jobStreamId' => $jobStreamId
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
    private $_ListByAutomationAccount_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetStream_operation;
}
