<?php
namespace Microsoft\Azure\Management\StreamAnalytics\_2016_03_01;
final class StreamingJobs
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_CreateOrReplace_operation = $_client->createOperation('StreamingJobs_CreateOrReplace');
        $this->_Update_operation = $_client->createOperation('StreamingJobs_Update');
        $this->_Delete_operation = $_client->createOperation('StreamingJobs_Delete');
        $this->_Get_operation = $_client->createOperation('StreamingJobs_Get');
        $this->_ListByResourceGroup_operation = $_client->createOperation('StreamingJobs_ListByResourceGroup');
        $this->_List_operation = $_client->createOperation('StreamingJobs_List');
        $this->_Start_operation = $_client->createOperation('StreamingJobs_Start');
        $this->_Stop_operation = $_client->createOperation('StreamingJobs_Stop');
    }
    /**
     * Creates a streaming job or replaces an already existing streaming job.
     * @param array $streamingJob
     * @param string $if_Match
     * @param string $if_None_Match
     * @param string $resourceGroupName
     * @param string $jobName
     * @return array
     */
    public function createOrReplace(
        array $streamingJob,
        $if_Match,
        $if_None_Match,
        $resourceGroupName,
        $jobName
    )
    {
        return $this->_CreateOrReplace_operation->call([
            'streamingJob' => $streamingJob,
            'If-Match' => $if_Match,
            'If-None-Match' => $if_None_Match,
            'resourceGroupName' => $resourceGroupName,
            'jobName' => $jobName
        ]);
    }
    /**
     * Updates an existing streaming job. This can be used to partially update (ie. update one or two properties) a streaming job without affecting the rest the job definition.
     * @param array $streamingJob
     * @param string $if_Match
     * @param string $resourceGroupName
     * @param string $jobName
     * @return array
     */
    public function update(
        array $streamingJob,
        $if_Match,
        $resourceGroupName,
        $jobName
    )
    {
        return $this->_Update_operation->call([
            'streamingJob' => $streamingJob,
            'If-Match' => $if_Match,
            'resourceGroupName' => $resourceGroupName,
            'jobName' => $jobName
        ]);
    }
    /**
     * Deletes a streaming job.
     * @param string $resourceGroupName
     * @param string $jobName
     */
    public function delete(
        $resourceGroupName,
        $jobName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'jobName' => $jobName
        ]);
    }
    /**
     * Gets details about the specified streaming job.
     * @param string $_expand
     * @param string $resourceGroupName
     * @param string $jobName
     * @return array
     */
    public function get(
        $_expand,
        $resourceGroupName,
        $jobName
    )
    {
        return $this->_Get_operation->call([
            '$expand' => $_expand,
            'resourceGroupName' => $resourceGroupName,
            'jobName' => $jobName
        ]);
    }
    /**
     * Lists all of the streaming jobs in the specified resource group.
     * @param string $_expand
     * @param string $resourceGroupName
     * @return array
     */
    public function listByResourceGroup(
        $_expand,
        $resourceGroupName
    )
    {
        return $this->_ListByResourceGroup_operation->call([
            '$expand' => $_expand,
            'resourceGroupName' => $resourceGroupName
        ]);
    }
    /**
     * Lists all of the streaming jobs in the given subscription.
     * @param string $_expand
     * @return array
     */
    public function list_($_expand)
    {
        return $this->_List_operation->call(['$expand' => $_expand]);
    }
    /**
     * Starts a streaming job. Once a job is started it will start processing input events and produce output.
     * @param array $startJobParameters
     * @param string $resourceGroupName
     * @param string $jobName
     */
    public function start(
        array $startJobParameters,
        $resourceGroupName,
        $jobName
    )
    {
        return $this->_Start_operation->call([
            'startJobParameters' => $startJobParameters,
            'resourceGroupName' => $resourceGroupName,
            'jobName' => $jobName
        ]);
    }
    /**
     * Stops a running streaming job. This will cause a running streaming job to stop processing input events and producing output.
     * @param string $resourceGroupName
     * @param string $jobName
     */
    public function stop(
        $resourceGroupName,
        $jobName
    )
    {
        return $this->_Stop_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'jobName' => $jobName
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateOrReplace_operation;
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
    private $_Get_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByResourceGroup_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Start_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Stop_operation;
}
