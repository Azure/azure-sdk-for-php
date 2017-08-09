<?php
namespace Microsoft\Azure\Management\Automation;
final class TestJobStreams
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Get_operation = $_client->createOperation('TestJobStreams_Get');
        $this->_ListByTestJob_operation = $_client->createOperation('TestJobStreams_ListByTestJob');
    }
    /**
     * Retrieve a test job streams identified by runbook name and stream id.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param string $runbookName
     * @param string $jobStreamId
     * @return array
     */
    public function get(
        $resourceGroupName,
        $automationAccountName,
        $runbookName,
        $jobStreamId
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            'runbookName' => $runbookName,
            'jobStreamId' => $jobStreamId
        ]);
    }
    /**
     * Retrieve a list of test job streams identified by runbook name.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param string $runbookName
     * @param string $_filter
     * @return array
     */
    public function listByTestJob(
        $resourceGroupName,
        $automationAccountName,
        $runbookName,
        $_filter
    )
    {
        return $this->_ListByTestJob_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            'runbookName' => $runbookName,
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
    private $_ListByTestJob_operation;
}
