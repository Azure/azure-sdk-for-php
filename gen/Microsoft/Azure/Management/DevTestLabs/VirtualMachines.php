<?php
namespace Microsoft\Azure\Management\DevTestLabs;
final class VirtualMachines
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_List_operation = $_client->createOperation('VirtualMachines_List');
        $this->_Get_operation = $_client->createOperation('VirtualMachines_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('VirtualMachines_CreateOrUpdate');
        $this->_Delete_operation = $_client->createOperation('VirtualMachines_Delete');
        $this->_Update_operation = $_client->createOperation('VirtualMachines_Update');
        $this->_AddDataDisk_operation = $_client->createOperation('VirtualMachines_AddDataDisk');
        $this->_ApplyArtifacts_operation = $_client->createOperation('VirtualMachines_ApplyArtifacts');
        $this->_Claim_operation = $_client->createOperation('VirtualMachines_Claim');
        $this->_DetachDataDisk_operation = $_client->createOperation('VirtualMachines_DetachDataDisk');
        $this->_ListApplicableSchedules_operation = $_client->createOperation('VirtualMachines_ListApplicableSchedules');
        $this->_Start_operation = $_client->createOperation('VirtualMachines_Start');
        $this->_Stop_operation = $_client->createOperation('VirtualMachines_Stop');
    }
    /**
     * List virtual machines in a given lab.
     * @param string $resourceGroupName
     * @param string $labName
     * @param string $_expand
     * @param string $_filter
     * @param integer $_top
     * @param string $_orderby
     * @return array
     */
    public function list_(
        $resourceGroupName,
        $labName,
        $_expand,
        $_filter,
        $_top,
        $_orderby
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
     * Get virtual machine.
     * @param string $resourceGroupName
     * @param string $labName
     * @param string $name
     * @param string $_expand
     * @return array
     */
    public function get(
        $resourceGroupName,
        $labName,
        $name,
        $_expand
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
     * Create or replace an existing Virtual machine. This operation can take a while to complete.
     * @param string $resourceGroupName
     * @param string $labName
     * @param string $name
     * @param array $labVirtualMachine
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $labName,
        $name,
        array $labVirtualMachine
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'labName' => $labName,
            'name' => $name,
            'labVirtualMachine' => $labVirtualMachine
        ]);
    }
    /**
     * Delete virtual machine. This operation can take a while to complete.
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
     * Modify properties of virtual machines.
     * @param string $resourceGroupName
     * @param string $labName
     * @param string $name
     * @param array $labVirtualMachine
     * @return array
     */
    public function update(
        $resourceGroupName,
        $labName,
        $name,
        array $labVirtualMachine
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'labName' => $labName,
            'name' => $name,
            'labVirtualMachine' => $labVirtualMachine
        ]);
    }
    /**
     * Attach a new or existing data disk to virtual machine. This operation can take a while to complete.
     * @param string $resourceGroupName
     * @param string $labName
     * @param string $name
     * @param array $dataDiskProperties
     */
    public function addDataDisk(
        $resourceGroupName,
        $labName,
        $name,
        array $dataDiskProperties
    )
    {
        return $this->_AddDataDisk_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'labName' => $labName,
            'name' => $name,
            'dataDiskProperties' => $dataDiskProperties
        ]);
    }
    /**
     * Apply artifacts to virtual machine. This operation can take a while to complete.
     * @param string $resourceGroupName
     * @param string $labName
     * @param string $name
     * @param array $applyArtifactsRequest
     */
    public function applyArtifacts(
        $resourceGroupName,
        $labName,
        $name,
        array $applyArtifactsRequest
    )
    {
        return $this->_ApplyArtifacts_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'labName' => $labName,
            'name' => $name,
            'applyArtifactsRequest' => $applyArtifactsRequest
        ]);
    }
    /**
     * Take ownership of an existing virtual machine This operation can take a while to complete.
     * @param string $resourceGroupName
     * @param string $labName
     * @param string $name
     */
    public function claim(
        $resourceGroupName,
        $labName,
        $name
    )
    {
        return $this->_Claim_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'labName' => $labName,
            'name' => $name
        ]);
    }
    /**
     * Detach the specified disk from the virtual machine. This operation can take a while to complete.
     * @param string $resourceGroupName
     * @param string $labName
     * @param string $name
     * @param array $detachDataDiskProperties
     */
    public function detachDataDisk(
        $resourceGroupName,
        $labName,
        $name,
        array $detachDataDiskProperties
    )
    {
        return $this->_DetachDataDisk_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'labName' => $labName,
            'name' => $name,
            'detachDataDiskProperties' => $detachDataDiskProperties
        ]);
    }
    /**
     * Lists all applicable schedules
     * @param string $resourceGroupName
     * @param string $labName
     * @param string $name
     * @return array
     */
    public function listApplicableSchedules(
        $resourceGroupName,
        $labName,
        $name
    )
    {
        return $this->_ListApplicableSchedules_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'labName' => $labName,
            'name' => $name
        ]);
    }
    /**
     * Start a virtual machine. This operation can take a while to complete.
     * @param string $resourceGroupName
     * @param string $labName
     * @param string $name
     */
    public function start(
        $resourceGroupName,
        $labName,
        $name
    )
    {
        return $this->_Start_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'labName' => $labName,
            'name' => $name
        ]);
    }
    /**
     * Stop a virtual machine This operation can take a while to complete.
     * @param string $resourceGroupName
     * @param string $labName
     * @param string $name
     */
    public function stop(
        $resourceGroupName,
        $labName,
        $name
    )
    {
        return $this->_Stop_operation->call([
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
    private $_AddDataDisk_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ApplyArtifacts_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Claim_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_DetachDataDisk_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListApplicableSchedules_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Start_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Stop_operation;
}
