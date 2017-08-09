<?php
namespace Microsoft\Azure\Management\Automation;
final class JobStream
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Get_operation = $_client->createOperation('JobStream_Get');
        $this->_ListByJob_operation = $_client->createOperation('JobStream_ListByJob');
    }
    /**
     * Retrieve the job stream identified by job stream id.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param string $jobId
     * @param string $jobStreamId
     * @return array
     */
    public function get(
        $resourceGroupName,
        $automationAccountName,
        $jobId,
        $jobStreamId
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            'jobId' => $jobId,
            'jobStreamId' => $jobStreamId
        ]);
    }
    /**
     * Retrieve a list of jobs streams identified by job id.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param string $jobId
     * @param string $_filter
     * @return array
     */
    public function listByJob(
        $resourceGroupName,
        $automationAccountName,
        $jobId,
        $_filter
    )
    {
        return $this->_ListByJob_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            'jobId' => $jobId,
            '$filter' => $_filter
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByJob_operation;
}
