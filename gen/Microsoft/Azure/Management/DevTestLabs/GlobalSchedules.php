<?php
namespace Microsoft\Azure\Management\DevTestLabs;
final class GlobalSchedules
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListBySubscription_operation = $_client->createOperation('GlobalSchedules_ListBySubscription');
        $this->_ListByResourceGroup_operation = $_client->createOperation('GlobalSchedules_ListByResourceGroup');
        $this->_Get_operation = $_client->createOperation('GlobalSchedules_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('GlobalSchedules_CreateOrUpdate');
        $this->_Delete_operation = $_client->createOperation('GlobalSchedules_Delete');
        $this->_Update_operation = $_client->createOperation('GlobalSchedules_Update');
        $this->_Execute_operation = $_client->createOperation('GlobalSchedules_Execute');
        $this->_Retarget_operation = $_client->createOperation('GlobalSchedules_Retarget');
    }
    /**
     * List schedules in a subscription.
     * @param string|null $_expand
     * @param string|null $_filter
     * @param integer|null $_top
     * @param string|null $_orderby
     * @return array
     */
    public function listBySubscription(
        $_expand = null,
        $_filter = null,
        $_top = null,
        $_orderby = null
    )
    {
        return $this->_ListBySubscription_operation->call([
            '$expand' => $_expand,
            '$filter' => $_filter,
            '$top' => $_top,
            '$orderby' => $_orderby
        ]);
    }
    /**
     * List schedules in a resource group.
     * @param string $resourceGroupName
     * @param string|null $_expand
     * @param string|null $_filter
     * @param integer|null $_top
     * @param string|null $_orderby
     * @return array
     */
    public function listByResourceGroup(
        $resourceGroupName,
        $_expand = null,
        $_filter = null,
        $_top = null,
        $_orderby = null
    )
    {
        return $this->_ListByResourceGroup_operation->call([
            'resourceGroupName' => $resourceGroupName,
            '$expand' => $_expand,
            '$filter' => $_filter,
            '$top' => $_top,
            '$orderby' => $_orderby
        ]);
    }
    /**
     * Get schedule.
     * @param string $resourceGroupName
     * @param string $name
     * @param string|null $_expand
     * @return array
     */
    public function get(
        $resourceGroupName,
        $name,
        $_expand = null
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            '$expand' => $_expand
        ]);
    }
    /**
     * Create or replace an existing schedule.
     * @param string $resourceGroupName
     * @param string $name
     * @param array $schedule
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $name,
        array $schedule
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'schedule' => $schedule
        ]);
    }
    /**
     * Delete schedule.
     * @param string $resourceGroupName
     * @param string $name
     */
    public function delete(
        $resourceGroupName,
        $name
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name
        ]);
    }
    /**
     * Modify properties of schedules.
     * @param string $resourceGroupName
     * @param string $name
     * @param array $schedule
     * @return array
     */
    public function update(
        $resourceGroupName,
        $name,
        array $schedule
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'schedule' => $schedule
        ]);
    }
    /**
     * Execute a schedule. This operation can take a while to complete.
     * @param string $resourceGroupName
     * @param string $name
     */
    public function execute(
        $resourceGroupName,
        $name
    )
    {
        return $this->_Execute_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name
        ]);
    }
    /**
     * Updates a schedule's target resource Id. This operation can take a while to complete.
     * @param string $resourceGroupName
     * @param string $name
     * @param array $retargetScheduleProperties
     */
    public function retarget(
        $resourceGroupName,
        $name,
        array $retargetScheduleProperties
    )
    {
        return $this->_Retarget_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'retargetScheduleProperties' => $retargetScheduleProperties
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
    private $_Delete_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Update_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Execute_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Retarget_operation;
}
