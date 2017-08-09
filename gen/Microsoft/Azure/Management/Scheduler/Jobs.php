<?php
namespace Microsoft\Azure\Management\Scheduler;
final class Jobs
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Get_operation = $_client->createOperation('Jobs_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('Jobs_CreateOrUpdate');
        $this->_Patch_operation = $_client->createOperation('Jobs_Patch');
        $this->_Delete_operation = $_client->createOperation('Jobs_Delete');
        $this->_Run_operation = $_client->createOperation('Jobs_Run');
        $this->_List_operation = $_client->createOperation('Jobs_List');
        $this->_ListJobHistory_operation = $_client->createOperation('Jobs_ListJobHistory');
    }
    /**
     * Gets a job.
     * @param string $resourceGroupName
     * @param string $jobCollectionName
     * @param string $jobName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $jobCollectionName,
        $jobName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'jobCollectionName' => $jobCollectionName,
            'jobName' => $jobName
        ]);
    }
    /**
     * Provisions a new job or updates an existing job.
     * @param string $resourceGroupName
     * @param string $jobCollectionName
     * @param string $jobName
     * @param array $job
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $jobCollectionName,
        $jobName,
        array $job
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'jobCollectionName' => $jobCollectionName,
            'jobName' => $jobName,
            'job' => $job
        ]);
    }
    /**
     * Patches an existing job.
     * @param string $resourceGroupName
     * @param string $jobCollectionName
     * @param string $jobName
     * @param array $job
     * @return array
     */
    public function patch(
        $resourceGroupName,
        $jobCollectionName,
        $jobName,
        array $job
    )
    {
        return $this->_Patch_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'jobCollectionName' => $jobCollectionName,
            'jobName' => $jobName,
            'job' => $job
        ]);
    }
    /**
     * Deletes a job.
     * @param string $resourceGroupName
     * @param string $jobCollectionName
     * @param string $jobName
     */
    public function delete(
        $resourceGroupName,
        $jobCollectionName,
        $jobName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'jobCollectionName' => $jobCollectionName,
            'jobName' => $jobName
        ]);
    }
    /**
     * Runs a job.
     * @param string $resourceGroupName
     * @param string $jobCollectionName
     * @param string $jobName
     */
    public function run(
        $resourceGroupName,
        $jobCollectionName,
        $jobName
    )
    {
        return $this->_Run_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'jobCollectionName' => $jobCollectionName,
            'jobName' => $jobName
        ]);
    }
    /**
     * Lists all jobs under the specified job collection.
     * @param string $resourceGroupName
     * @param string $jobCollectionName
     * @param integer|null $_top
     * @param integer|null $_skip
     * @param string|null $_filter
     * @return array
     */
    public function list_(
        $resourceGroupName,
        $jobCollectionName,
        $_top = null,
        $_skip = null,
        $_filter = null
    )
    {
        return $this->_List_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'jobCollectionName' => $jobCollectionName,
            '$top' => $_top,
            '$skip' => $_skip,
            '$filter' => $_filter
        ]);
    }
    /**
     * Lists job history.
     * @param string $resourceGroupName
     * @param string $jobCollectionName
     * @param string $jobName
     * @param integer|null $_top
     * @param integer|null $_skip
     * @param string|null $_filter
     * @return array
     */
    public function listJobHistory(
        $resourceGroupName,
        $jobCollectionName,
        $jobName,
        $_top = null,
        $_skip = null,
        $_filter = null
    )
    {
        return $this->_ListJobHistory_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'jobCollectionName' => $jobCollectionName,
            'jobName' => $jobName,
            '$top' => $_top,
            '$skip' => $_skip,
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
    private $_CreateOrUpdate_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Patch_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Delete_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Run_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListJobHistory_operation;
}
