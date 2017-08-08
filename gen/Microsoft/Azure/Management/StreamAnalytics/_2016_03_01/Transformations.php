<?php
namespace Microsoft\Azure\Management\StreamAnalytics\_2016_03_01;
final class Transformations
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_CreateOrReplace_operation = $_client->createOperation('Transformations_CreateOrReplace');
        $this->_Update_operation = $_client->createOperation('Transformations_Update');
        $this->_Get_operation = $_client->createOperation('Transformations_Get');
    }
    /**
     * Creates a transformation or replaces an already existing transformation under an existing streaming job.
     * @param array $transformation
     * @param string $if_Match
     * @param string $if_None_Match
     * @param string $resourceGroupName
     * @param string $jobName
     * @param string $transformationName
     * @return array
     */
    public function createOrReplace(
        array $transformation,
        $if_Match,
        $if_None_Match,
        $resourceGroupName,
        $jobName,
        $transformationName
    )
    {
        return $this->_CreateOrReplace_operation->call([
            'transformation' => $transformation,
            'If-Match' => $if_Match,
            'If-None-Match' => $if_None_Match,
            'resourceGroupName' => $resourceGroupName,
            'jobName' => $jobName,
            'transformationName' => $transformationName
        ]);
    }
    /**
     * Updates an existing transformation under an existing streaming job. This can be used to partially update (ie. update one or two properties) a transformation without affecting the rest the job or transformation definition.
     * @param array $transformation
     * @param string $if_Match
     * @param string $resourceGroupName
     * @param string $jobName
     * @param string $transformationName
     * @return array
     */
    public function update(
        array $transformation,
        $if_Match,
        $resourceGroupName,
        $jobName,
        $transformationName
    )
    {
        return $this->_Update_operation->call([
            'transformation' => $transformation,
            'If-Match' => $if_Match,
            'resourceGroupName' => $resourceGroupName,
            'jobName' => $jobName,
            'transformationName' => $transformationName
        ]);
    }
    /**
     * Gets details about the specified transformation.
     * @param string $resourceGroupName
     * @param string $jobName
     * @param string $transformationName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $jobName,
        $transformationName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'jobName' => $jobName,
            'transformationName' => $transformationName
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
    private $_Get_operation;
}
