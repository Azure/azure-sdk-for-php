<?php
namespace Microsoft\Azure\Management\StreamAnalytics;
final class Functions
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_CreateOrReplace_operation = $_client->createOperation('Functions_CreateOrReplace');
        $this->_Update_operation = $_client->createOperation('Functions_Update');
        $this->_Delete_operation = $_client->createOperation('Functions_Delete');
        $this->_Get_operation = $_client->createOperation('Functions_Get');
        $this->_ListByStreamingJob_operation = $_client->createOperation('Functions_ListByStreamingJob');
        $this->_Test_operation = $_client->createOperation('Functions_Test');
        $this->_RetrieveDefaultDefinition_operation = $_client->createOperation('Functions_RetrieveDefaultDefinition');
    }
    /**
     * Creates a function or replaces an already existing function under an existing streaming job.
     * @param array $function
     * @param string|null $if_Match
     * @param string|null $if_None_Match
     * @param string $resourceGroupName
     * @param string $jobName
     * @param string $functionName
     * @return array
     */
    public function createOrReplace(
        array $function,
        $if_Match = null,
        $if_None_Match = null,
        $resourceGroupName,
        $jobName,
        $functionName
    )
    {
        return $this->_CreateOrReplace_operation->call([
            'function' => $function,
            'If-Match' => $if_Match,
            'If-None-Match' => $if_None_Match,
            'resourceGroupName' => $resourceGroupName,
            'jobName' => $jobName,
            'functionName' => $functionName
        ]);
    }
    /**
     * Updates an existing function under an existing streaming job. This can be used to partially update (ie. update one or two properties) a function without affecting the rest the job or function definition.
     * @param array $function
     * @param string|null $if_Match
     * @param string $resourceGroupName
     * @param string $jobName
     * @param string $functionName
     * @return array
     */
    public function update(
        array $function,
        $if_Match = null,
        $resourceGroupName,
        $jobName,
        $functionName
    )
    {
        return $this->_Update_operation->call([
            'function' => $function,
            'If-Match' => $if_Match,
            'resourceGroupName' => $resourceGroupName,
            'jobName' => $jobName,
            'functionName' => $functionName
        ]);
    }
    /**
     * Deletes a function from the streaming job.
     * @param string $resourceGroupName
     * @param string $jobName
     * @param string $functionName
     */
    public function delete(
        $resourceGroupName,
        $jobName,
        $functionName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'jobName' => $jobName,
            'functionName' => $functionName
        ]);
    }
    /**
     * Gets details about the specified function.
     * @param string $resourceGroupName
     * @param string $jobName
     * @param string $functionName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $jobName,
        $functionName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'jobName' => $jobName,
            'functionName' => $functionName
        ]);
    }
    /**
     * Lists all of the functions under the specified streaming job.
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
     * Tests if the information provided for a function is valid. This can range from testing the connection to the underlying web service behind the function or making sure the function code provided is syntactically correct.
     * @param array|null $function
     * @param string $resourceGroupName
     * @param string $jobName
     * @param string $functionName
     * @return array
     */
    public function test(
        array $function = null,
        $resourceGroupName,
        $jobName,
        $functionName
    )
    {
        return $this->_Test_operation->call([
            'function' => $function,
            'resourceGroupName' => $resourceGroupName,
            'jobName' => $jobName,
            'functionName' => $functionName
        ]);
    }
    /**
     * Retrieves the default definition of a function based on the parameters specified.
     * @param array|null $functionRetrieveDefaultDefinitionParameters
     * @param string $resourceGroupName
     * @param string $jobName
     * @param string $functionName
     * @return array
     */
    public function retrieveDefaultDefinition(
        array $functionRetrieveDefaultDefinitionParameters = null,
        $resourceGroupName,
        $jobName,
        $functionName
    )
    {
        return $this->_RetrieveDefaultDefinition_operation->call([
            'functionRetrieveDefaultDefinitionParameters' => $functionRetrieveDefaultDefinitionParameters,
            'resourceGroupName' => $resourceGroupName,
            'jobName' => $jobName,
            'functionName' => $functionName
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
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_RetrieveDefaultDefinition_operation;
}
