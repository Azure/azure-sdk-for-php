<?php
namespace Microsoft\Azure\Management\StorageImportExport;
final class Jobs
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_List_operation = $_client->createOperation('Jobs_List');
        $this->_ListByResourceGroup_operation = $_client->createOperation('Jobs_ListByResourceGroup');
        $this->_Get_operation = $_client->createOperation('Jobs_Get');
        $this->_Update_operation = $_client->createOperation('Jobs_Update');
        $this->_CreateOrUpdate_operation = $_client->createOperation('Jobs_CreateOrUpdate');
        $this->_Delete_operation = $_client->createOperation('Jobs_Delete');
        $this->_Move_operation = $_client->createOperation('Jobs_Move');
        $this->_ListBitLockerKeys_operation = $_client->createOperation('Jobs_ListBitLockerKeys');
    }
    /**
     * Gets all the active and completed import/export jobs in a subscription.
     * @param integer $_top
     * @param string $_filter
     * @return array
     */
    public function list_(
        $_top,
        $_filter
    )
    {
        return $this->_List_operation->call([
            '$top' => $_top,
            '$filter' => $_filter
        ]);
    }
    /**
     * Returns all active and completed import/export jobs in a resource group.
     * @param string $resourceGroupName
     * @param integer $_top
     * @param string $_filter
     * @return array
     */
    public function listByResourceGroup(
        $resourceGroupName,
        $_top,
        $_filter
    )
    {
        return $this->_ListByResourceGroup_operation->call([
            'resourceGroupName' => $resourceGroupName,
            '$top' => $_top,
            '$filter' => $_filter
        ]);
    }
    /**
     * Gets information about an existing import/export job.
     * @param string $resourceGroupName
     * @param string $jobName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $jobName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'jobName' => $jobName
        ]);
    }
    /**
     * Updates specific properties of the import/export job. You can call this operation to notify the Import/Export service that the hard drives comprising the import or export job have been shipped to the Microsoft data center. It can also be used to cancel an existing job.
     * @param string $resourceGroupName
     * @param string $jobName
     * @param array $jobProperties
     * @return array
     */
    public function update(
        $resourceGroupName,
        $jobName,
        array $jobProperties
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'jobName' => $jobName,
            'jobProperties' => $jobProperties
        ]);
    }
    /**
     * Creates a new import/export job or updates an existing import/export job in the specified subscription.
     * @param string $resourceGroupName
     * @param string $jobName
     * @param array $jobProperties
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $jobName,
        array $jobProperties
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'jobName' => $jobName,
            'jobProperties' => $jobProperties
        ]);
    }
    /**
     * Deletes an existing import/export job. Only import/export jobs in the Creating or Completed states can be deleted.
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
     * Moves the specified import/export jobs from the resource group to a target resource group. The target resource group may be in a different subscription.
     * @param string $resourceGroupName
     * @param array $moveJobsParameters
     */
    public function move(
        $resourceGroupName,
        array $moveJobsParameters
    )
    {
        return $this->_Move_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'MoveJobsParameters' => $moveJobsParameters
        ]);
    }
    /**
     * Lists the BitLocker keys for all drives in the specified import/export job.
     * @param string $resourceGroupName
     * @param string $jobName
     * @return array
     */
    public function listBitLockerKeys(
        $resourceGroupName,
        $jobName
    )
    {
        return $this->_ListBitLockerKeys_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'jobName' => $jobName
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
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
    private $_Update_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateOrUpdate_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Delete_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Move_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListBitLockerKeys_operation;
}
