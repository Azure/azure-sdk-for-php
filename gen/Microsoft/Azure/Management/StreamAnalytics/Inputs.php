<?php
namespace Microsoft\Azure\Management\StreamAnalytics;
final class Inputs
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_CreateOrReplace_operation = $_client->createOperation('Inputs_CreateOrReplace');
        $this->_Update_operation = $_client->createOperation('Inputs_Update');
        $this->_Delete_operation = $_client->createOperation('Inputs_Delete');
        $this->_Get_operation = $_client->createOperation('Inputs_Get');
        $this->_ListByStreamingJob_operation = $_client->createOperation('Inputs_ListByStreamingJob');
        $this->_Test_operation = $_client->createOperation('Inputs_Test');
    }
    /**
     * Creates an input or replaces an already existing input under an existing streaming job.
     * @param array $input
     * @param string $if_Match
     * @param string $if_None_Match
     * @param string $resourceGroupName
     * @param string $jobName
     * @param string $inputName
     * @return array
     */
    public function createOrReplace(
        array $input,
        $if_Match,
        $if_None_Match,
        $resourceGroupName,
        $jobName,
        $inputName
    )
    {
        return $this->_CreateOrReplace_operation->call([
            'input' => $input,
            'If-Match' => $if_Match,
            'If-None-Match' => $if_None_Match,
            'resourceGroupName' => $resourceGroupName,
            'jobName' => $jobName,
            'inputName' => $inputName
        ]);
    }
    /**
     * Updates an existing input under an existing streaming job. This can be used to partially update (ie. update one or two properties) an input without affecting the rest the job or input definition.
     * @param array $input
     * @param string $if_Match
     * @param string $resourceGroupName
     * @param string $jobName
     * @param string $inputName
     * @return array
     */
    public function update(
        array $input,
        $if_Match,
        $resourceGroupName,
        $jobName,
        $inputName
    )
    {
        return $this->_Update_operation->call([
            'input' => $input,
            'If-Match' => $if_Match,
            'resourceGroupName' => $resourceGroupName,
            'jobName' => $jobName,
            'inputName' => $inputName
        ]);
    }
    /**
     * Deletes an input from the streaming job.
     * @param string $resourceGroupName
     * @param string $jobName
     * @param string $inputName
     */
    public function delete(
        $resourceGroupName,
        $jobName,
        $inputName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'jobName' => $jobName,
            'inputName' => $inputName
        ]);
    }
    /**
     * Gets details about the specified input.
     * @param string $resourceGroupName
     * @param string $jobName
     * @param string $inputName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $jobName,
        $inputName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'jobName' => $jobName,
            'inputName' => $inputName
        ]);
    }
    /**
     * Lists all of the inputs under the specified streaming job.
     * @param string $_select
     * @param string $resourceGroupName
     * @param string $jobName
     * @return array
     */
    public function listByStreamingJob(
        $_select,
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
     * Tests whether an input’s datasource is reachable and usable by the Azure Stream Analytics service.
     * @param array $input
     * @param string $resourceGroupName
     * @param string $jobName
     * @param string $inputName
     * @return array
     */
    public function test(
        array $input,
        $resourceGroupName,
        $jobName,
        $inputName
    )
    {
        return $this->_Test_operation->call([
            'input' => $input,
            'resourceGroupName' => $resourceGroupName,
            'jobName' => $jobName,
            'inputName' => $inputName
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
