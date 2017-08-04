<?php
namespace Microsoft\Azure\Management\Scheduler\_2016_03_01;
final class JobCollections
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListBySubscription_operation = $_client->createOperation('JobCollections_ListBySubscription');
        $this->_ListByResourceGroup_operation = $_client->createOperation('JobCollections_ListByResourceGroup');
        $this->_Get_operation = $_client->createOperation('JobCollections_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('JobCollections_CreateOrUpdate');
        $this->_Patch_operation = $_client->createOperation('JobCollections_Patch');
        $this->_Delete_operation = $_client->createOperation('JobCollections_Delete');
        $this->_Enable_operation = $_client->createOperation('JobCollections_Enable');
        $this->_Disable_operation = $_client->createOperation('JobCollections_Disable');
    }
    /**
     * Gets all job collections under specified subscription.
     * @return array
     */
    public function listBySubscription()
    {
        return $this->_ListBySubscription_operation->call([]);
    }
    /**
     * Gets all job collections under specified resource group.
     * @param string $resourceGroupName
     * @return array
     */
    public function listByResourceGroup($resourceGroupName)
    {
        return $this->_ListByResourceGroup_operation->call(['resourceGroupName' => $resourceGroupName]);
    }
    /**
     * Gets a job collection.
     * @param string $resourceGroupName
     * @param string $jobCollectionName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $jobCollectionName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'jobCollectionName' => $jobCollectionName
        ]);
    }
    /**
     * Provisions a new job collection or updates an existing job collection.
     * @param string $resourceGroupName
     * @param string $jobCollectionName
     * @param array $jobCollection
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $jobCollectionName,
        array $jobCollection
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'jobCollectionName' => $jobCollectionName,
            'jobCollection' => $jobCollection
        ]);
    }
    /**
     * Patches an existing job collection.
     * @param string $resourceGroupName
     * @param string $jobCollectionName
     * @param array $jobCollection
     * @return array
     */
    public function patch(
        $resourceGroupName,
        $jobCollectionName,
        array $jobCollection
    )
    {
        return $this->_Patch_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'jobCollectionName' => $jobCollectionName,
            'jobCollection' => $jobCollection
        ]);
    }
    /**
     * Deletes a job collection.
     * @param string $resourceGroupName
     * @param string $jobCollectionName
     */
    public function delete(
        $resourceGroupName,
        $jobCollectionName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'jobCollectionName' => $jobCollectionName
        ]);
    }
    /**
     * Enables all of the jobs in the job collection.
     * @param string $resourceGroupName
     * @param string $jobCollectionName
     */
    public function enable(
        $resourceGroupName,
        $jobCollectionName
    )
    {
        return $this->_Enable_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'jobCollectionName' => $jobCollectionName
        ]);
    }
    /**
     * Disables all of the jobs in the job collection.
     * @param string $resourceGroupName
     * @param string $jobCollectionName
     */
    public function disable(
        $resourceGroupName,
        $jobCollectionName
    )
    {
        return $this->_Disable_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'jobCollectionName' => $jobCollectionName
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListBySubscription_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByResourceGroup_operation;
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
    private $_Enable_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Disable_operation;
}
