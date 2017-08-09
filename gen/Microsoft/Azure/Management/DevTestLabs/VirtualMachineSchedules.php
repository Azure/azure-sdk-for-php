<?php
namespace Microsoft\Azure\Management\DevTestLabs;
final class VirtualMachineSchedules
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_List_operation = $_client->createOperation('VirtualMachineSchedules_List');
        $this->_Get_operation = $_client->createOperation('VirtualMachineSchedules_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('VirtualMachineSchedules_CreateOrUpdate');
        $this->_Delete_operation = $_client->createOperation('VirtualMachineSchedules_Delete');
        $this->_Update_operation = $_client->createOperation('VirtualMachineSchedules_Update');
        $this->_Execute_operation = $_client->createOperation('VirtualMachineSchedules_Execute');
    }
    /**
     * List schedules in a given virtual machine.
     * @param string $resourceGroupName
     * @param string $labName
     * @param string $virtualMachineName
     * @param string $_expand
     * @param string $_filter
     * @param integer $_top
     * @param string $_orderby
     * @return array
     */
    public function list_(
        $resourceGroupName,
        $labName,
        $virtualMachineName,
        $_expand,
        $_filter,
        $_top,
        $_orderby
    )
    {
        return $this->_List_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'labName' => $labName,
            'virtualMachineName' => $virtualMachineName,
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
     * @param string $virtualMachineName
     * @param string $name
     * @param string $_expand
     * @return array
     */
    public function get(
        $resourceGroupName,
        $labName,
        $virtualMachineName,
        $name,
        $_expand
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'labName' => $labName,
            'virtualMachineName' => $virtualMachineName,
            'name' => $name,
            '$expand' => $_expand
        ]);
    }
    /**
     * Create or replace an existing schedule.
     * @param string $resourceGroupName
     * @param string $labName
     * @param string $virtualMachineName
     * @param string $name
     * @param array $schedule
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $labName,
        $virtualMachineName,
        $name,
        array $schedule
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'labName' => $labName,
            'virtualMachineName' => $virtualMachineName,
            'name' => $name,
            'schedule' => $schedule
        ]);
    }
    /**
     * Delete schedule.
     * @param string $resourceGroupName
     * @param string $labName
     * @param string $virtualMachineName
     * @param string $name
     */
    public function delete(
        $resourceGroupName,
        $labName,
        $virtualMachineName,
        $name
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'labName' => $labName,
            'virtualMachineName' => $virtualMachineName,
            'name' => $name
        ]);
    }
    /**
     * Modify properties of schedules.
     * @param string $resourceGroupName
     * @param string $labName
     * @param string $virtualMachineName
     * @param string $name
     * @param array $schedule
     * @return array
     */
    public function update(
        $resourceGroupName,
        $labName,
        $virtualMachineName,
        $name,
        array $schedule
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'labName' => $labName,
            'virtualMachineName' => $virtualMachineName,
            'name' => $name,
            'schedule' => $schedule
        ]);
    }
    /**
     * Execute a schedule. This operation can take a while to complete.
     * @param string $resourceGroupName
     * @param string $labName
     * @param string $virtualMachineName
     * @param string $name
     */
    public function execute(
        $resourceGroupName,
        $labName,
        $virtualMachineName,
        $name
    )
    {
        return $this->_Execute_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'labName' => $labName,
            'virtualMachineName' => $virtualMachineName,
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
}
