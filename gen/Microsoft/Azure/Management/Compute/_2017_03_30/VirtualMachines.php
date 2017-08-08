<?php
namespace Microsoft\Azure\Management\Compute\_2017_03_30;
final class VirtualMachines
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Capture_operation = $_client->createOperation('VirtualMachines_Capture');
        $this->_CreateOrUpdate_operation = $_client->createOperation('VirtualMachines_CreateOrUpdate');
        $this->_Delete_operation = $_client->createOperation('VirtualMachines_Delete');
        $this->_Get_operation = $_client->createOperation('VirtualMachines_Get');
        $this->_ConvertToManagedDisks_operation = $_client->createOperation('VirtualMachines_ConvertToManagedDisks');
        $this->_Deallocate_operation = $_client->createOperation('VirtualMachines_Deallocate');
        $this->_Generalize_operation = $_client->createOperation('VirtualMachines_Generalize');
        $this->_List_operation = $_client->createOperation('VirtualMachines_List');
        $this->_ListAll_operation = $_client->createOperation('VirtualMachines_ListAll');
        $this->_ListAvailableSizes_operation = $_client->createOperation('VirtualMachines_ListAvailableSizes');
        $this->_PowerOff_operation = $_client->createOperation('VirtualMachines_PowerOff');
        $this->_Restart_operation = $_client->createOperation('VirtualMachines_Restart');
        $this->_Start_operation = $_client->createOperation('VirtualMachines_Start');
        $this->_Redeploy_operation = $_client->createOperation('VirtualMachines_Redeploy');
        $this->_PerformMaintenance_operation = $_client->createOperation('VirtualMachines_PerformMaintenance');
        $this->_RunCommand_operation = $_client->createOperation('VirtualMachines_RunCommand');
    }
    /**
     * Captures the VM by copying virtual hard disks of the VM and outputs a template that can be used to create similar VMs.
     * @param string $resourceGroupName
     * @param string $vmName
     * @param array $parameters
     * @return array
     */
    public function capture(
        $resourceGroupName,
        $vmName,
        array $parameters
    )
    {
        return $this->_Capture_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'vmName' => $vmName,
            'parameters' => $parameters
        ]);
    }
    /**
     * The operation to create or update a virtual machine.
     * @param string $resourceGroupName
     * @param string $vmName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $vmName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'vmName' => $vmName,
            'parameters' => $parameters
        ]);
    }
    /**
     * The operation to delete a virtual machine.
     * @param string $resourceGroupName
     * @param string $vmName
     * @return array
     */
    public function delete(
        $resourceGroupName,
        $vmName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'vmName' => $vmName
        ]);
    }
    /**
     * Retrieves information about the model view or the instance view of a virtual machine.
     * @param string $resourceGroupName
     * @param string $vmName
     * @param string $_expand
     * @return array
     */
    public function get(
        $resourceGroupName,
        $vmName,
        $_expand
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'vmName' => $vmName,
            '$expand' => $_expand
        ]);
    }
    /**
     * Converts virtual machine disks from blob-based to managed disks. Virtual machine must be stop-deallocated before invoking this operation.
     * @param string $resourceGroupName
     * @param string $vmName
     * @return array
     */
    public function convertToManagedDisks(
        $resourceGroupName,
        $vmName
    )
    {
        return $this->_ConvertToManagedDisks_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'vmName' => $vmName
        ]);
    }
    /**
     * Shuts down the virtual machine and releases the compute resources. You are not billed for the compute resources that this virtual machine uses.
     * @param string $resourceGroupName
     * @param string $vmName
     * @return array
     */
    public function deallocate(
        $resourceGroupName,
        $vmName
    )
    {
        return $this->_Deallocate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'vmName' => $vmName
        ]);
    }
    /**
     * Sets the state of the virtual machine to generalized.
     * @param string $resourceGroupName
     * @param string $vmName
     * @return array
     */
    public function generalize(
        $resourceGroupName,
        $vmName
    )
    {
        return $this->_Generalize_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'vmName' => $vmName
        ]);
    }
    /**
     * Lists all of the virtual machines in the specified resource group. Use the nextLink property in the response to get the next page of virtual machines.
     * @param string $resourceGroupName
     * @return array
     */
    public function list_($resourceGroupName)
    {
        return $this->_List_operation->call(['resourceGroupName' => $resourceGroupName]);
    }
    /**
     * Lists all of the virtual machines in the specified subscription. Use the nextLink property in the response to get the next page of virtual machines.
     * @return array
     */
    public function listAll()
    {
        return $this->_ListAll_operation->call([]);
    }
    /**
     * Lists all available virtual machine sizes to which the specified virtual machine can be resized.
     * @param string $resourceGroupName
     * @param string $vmName
     * @return array
     */
    public function listAvailableSizes(
        $resourceGroupName,
        $vmName
    )
    {
        return $this->_ListAvailableSizes_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'vmName' => $vmName
        ]);
    }
    /**
     * The operation to power off (stop) a virtual machine. The virtual machine can be restarted with the same provisioned resources. You are still charged for this virtual machine.
     * @param string $resourceGroupName
     * @param string $vmName
     * @return array
     */
    public function powerOff(
        $resourceGroupName,
        $vmName
    )
    {
        return $this->_PowerOff_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'vmName' => $vmName
        ]);
    }
    /**
     * The operation to restart a virtual machine.
     * @param string $resourceGroupName
     * @param string $vmName
     * @return array
     */
    public function restart(
        $resourceGroupName,
        $vmName
    )
    {
        return $this->_Restart_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'vmName' => $vmName
        ]);
    }
    /**
     * The operation to start a virtual machine.
     * @param string $resourceGroupName
     * @param string $vmName
     * @return array
     */
    public function start(
        $resourceGroupName,
        $vmName
    )
    {
        return $this->_Start_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'vmName' => $vmName
        ]);
    }
    /**
     * The operation to redeploy a virtual machine.
     * @param string $resourceGroupName
     * @param string $vmName
     * @return array
     */
    public function redeploy(
        $resourceGroupName,
        $vmName
    )
    {
        return $this->_Redeploy_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'vmName' => $vmName
        ]);
    }
    /**
     * The operation to perform maintenance on a virtual machine.
     * @param string $resourceGroupName
     * @param string $vmName
     * @return array
     */
    public function performMaintenance(
        $resourceGroupName,
        $vmName
    )
    {
        return $this->_PerformMaintenance_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'vmName' => $vmName
        ]);
    }
    /**
     * Run command on the VM.
     * @param string $resourceGroupName
     * @param string $vmName
     * @param array $parameters
     * @return array
     */
    public function runCommand(
        $resourceGroupName,
        $vmName,
        array $parameters
    )
    {
        return $this->_RunCommand_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'vmName' => $vmName,
            'parameters' => $parameters
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Capture_operation;
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
    private $_Get_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ConvertToManagedDisks_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Deallocate_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Generalize_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListAll_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListAvailableSizes_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_PowerOff_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Restart_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Start_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Redeploy_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_PerformMaintenance_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_RunCommand_operation;
}
