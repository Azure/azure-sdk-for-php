<?php
namespace Microsoft\Azure\Management\DevTestLabs;
final class Schedules
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_List_operation = $_client->createOperation('Schedules_List');
        $this->_Get_operation = $_client->createOperation('Schedules_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('Schedules_CreateOrUpdate');
        $this->_Delete_operation = $_client->createOperation('Schedules_Delete');
        $this->_Update_operation = $_client->createOperation('Schedules_Update');
        $this->_Execute_operation = $_client->createOperation('Schedules_Execute');
        $this->_ListApplicable_operation = $_client->createOperation('Schedules_ListApplicable');
    }
    /**
     * List schedules in a given lab.
     * @param string $resourceGroupName
     * @param string $labName
     * @param string|null $_expand
     * @param string|null $_filter
     * @param integer|null $_top
     * @param string|null $_orderby
     * @return array
     */
    public function list_(
        $resourceGroupName,
        $labName,
        $_expand = null,
        $_filter = null,
        $_top = null,
        $_orderby = null
    )
    {
        return $this->_List_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'labName' => $labName,
            '$expand' => $_expand,
            '$filter' => $_filter,
            '$top' => $_top,
            '$orderby' => $_orderby
        ]);
    }
    /**
     * Get schedule.
     * @param string $resourceGroupName
     * @param string $labName
     * @param string $name
     * @param string|null $_expand
     * @return array
     */
    public function get(
        $resourceGroupName,
        $labName,
        $name,
        $_expand = null
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'labName' => $labName,
            'name' => $name,
            '$expand' => $_expand
        ]);
    }
    /**
     * Create or replace an existing schedule.
     * @param string $resourceGroupName
     * @param string $labName
     * @param string $name
     * @param array $schedule
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $labName,
        $name,
        array $schedule
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'labName' => $labName,
            'name' => $name,
            'schedule' => $schedule
        ]);
    }
    /**
     * Delete schedule.
     * @param string $resourceGroupName
     * @param string $labName
     * @param string $name
     */
    public function delete(
        $resourceGroupName,
        $labName,
        $name
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'labName' => $labName,
            'name' => $name
        ]);
    }
    /**
     * Modify properties of schedules.
     * @param string $resourceGroupName
     * @param string $labName
     * @param string $name
     * @param array $schedule
     * @return array
     */
    public function update(
        $resourceGroupName,
        $labName,
        $name,
        array $schedule
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'labName' => $labName,
            'name' => $name,
            'schedule' => $schedule
        ]);
    }
    /**
     * Execute a schedule. This operation can take a while to complete.
     * @param string $resourceGroupName
     * @param string $labName
     * @param string $name
     */
    public function execute(
        $resourceGroupName,
        $labName,
        $name
    )
    {
        return $this->_Execute_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'labName' => $labName,
            'name' => $name
        ]);
    }
    /**
     * Lists all applicable schedules
     * @param string $resourceGroupName
     * @param string $labName
     * @param string $name
     * @return array
     */
    public function listApplicable(
        $resourceGroupName,
        $labName,
        $name
    )
    {
        return $this->_ListApplicable_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'labName' => $labName,
            'name' => $name
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
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
    private $_ListApplicable_operation;
}
