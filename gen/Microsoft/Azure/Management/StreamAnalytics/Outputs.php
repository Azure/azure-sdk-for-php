<?php
namespace Microsoft\Azure\Management\StreamAnalytics;
final class Outputs
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_CreateOrReplace_operation = $_client->createOperation('Outputs_CreateOrReplace');
        $this->_Update_operation = $_client->createOperation('Outputs_Update');
        $this->_Delete_operation = $_client->createOperation('Outputs_Delete');
        $this->_Get_operation = $_client->createOperation('Outputs_Get');
        $this->_ListByStreamingJob_operation = $_client->createOperation('Outputs_ListByStreamingJob');
        $this->_Test_operation = $_client->createOperation('Outputs_Test');
    }
    /**
     * Creates an output or replaces an already existing output under an existing streaming job.
     * @param array $output
     * @param string|null $if_Match
     * @param string|null $if_None_Match
     * @param string $resourceGroupName
     * @param string $jobName
     * @param string $outputName
     * @return array
     */
    public function createOrReplace(
        array $output,
        $if_Match = null,
        $if_None_Match = null,
        $resourceGroupName,
        $jobName,
        $outputName
    )
    {
        return $this->_CreateOrReplace_operation->call([
            'output' => $output,
            'If-Match' => $if_Match,
            'If-None-Match' => $if_None_Match,
            'resourceGroupName' => $resourceGroupName,
            'jobName' => $jobName,
            'outputName' => $outputName
        ]);
    }
    /**
     * Updates an existing output under an existing streaming job. This can be used to partially update (ie. update one or two properties) an output without affecting the rest the job or output definition.
     * @param array $output
     * @param string|null $if_Match
     * @param string $resourceGroupName
     * @param string $jobName
     * @param string $outputName
     * @return array
     */
    public function update(
        array $output,
        $if_Match = null,
        $resourceGroupName,
        $jobName,
        $outputName
    )
    {
        return $this->_Update_operation->call([
            'output' => $output,
            'If-Match' => $if_Match,
            'resourceGroupName' => $resourceGroupName,
            'jobName' => $jobName,
            'outputName' => $outputName
        ]);
    }
    /**
     * Deletes an output from the streaming job.
     * @param string $resourceGroupName
     * @param string $jobName
     * @param string $outputName
     */
    public function delete(
        $resourceGroupName,
        $jobName,
        $outputName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'jobName' => $jobName,
            'outputName' => $outputName
        ]);
    }
    /**
     * Gets details about the specified output.
     * @param string $resourceGroupName
     * @param string $jobName
     * @param string $outputName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $jobName,
        $outputName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'jobName' => $jobName,
            'outputName' => $outputName
        ]);
    }
    /**
     * Lists all of the outputs under the specified streaming job.
     * @param string|null $_select
     * @param string $resourceGroupName
     * @param string $jobName
     * @return array
     */
    public function listByStreamingJob(
        $_select = null,
        $resourceGroupName,
        $jobName
    )
    {
        return $this->_ListByStreamingJob_operation->call([
            '$select' => $_select,
            'resourceGroupName' => $resourceGroupName,
            'jobName' => $jobName
        ]);
    }
    /**
     * Tests whether an output’s datasource is reachable and usable by the Azure Stream Analytics service.
     * @param array|null $output
     * @param string $resourceGroupName
     * @param string $jobName
     * @param string $outputName
     * @return array
     */
    public function test(
        array $output = null,
        $resourceGroupName,
        $jobName,
        $outputName
    )
    {
        return $this->_Test_operation->call([
            'output' => $output,
            'resourceGroupName' => $resourceGroupName,
            'jobName' => $jobName,
            'outputName' => $outputName
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
    private $_ListByStreamingJob_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Test_operation;
}
