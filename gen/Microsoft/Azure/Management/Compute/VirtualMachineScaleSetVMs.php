<?php
namespace Microsoft\Azure\Management\Compute;
final class VirtualMachineScaleSetVMs
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Reimage_operation = $_client->createOperation('VirtualMachineScaleSetVMs_Reimage');
        $this->_ReimageAll_operation = $_client->createOperation('VirtualMachineScaleSetVMs_ReimageAll');
        $this->_Deallocate_operation = $_client->createOperation('VirtualMachineScaleSetVMs_Deallocate');
        $this->_Delete_operation = $_client->createOperation('VirtualMachineScaleSetVMs_Delete');
        $this->_Get_operation = $_client->createOperation('VirtualMachineScaleSetVMs_Get');
        $this->_GetInstanceView_operation = $_client->createOperation('VirtualMachineScaleSetVMs_GetInstanceView');
        $this->_List_operation = $_client->createOperation('VirtualMachineScaleSetVMs_List');
        $this->_PowerOff_operation = $_client->createOperation('VirtualMachineScaleSetVMs_PowerOff');
        $this->_Restart_operation = $_client->createOperation('VirtualMachineScaleSetVMs_Restart');
        $this->_Start_operation = $_client->createOperation('VirtualMachineScaleSetVMs_Start');
    }
    /**
     * Reimages (upgrade the operating system) a specific virtual machine in a VM scale set.
     * @param string $resourceGroupName
     * @param string $vmScaleSetName
     * @param string $instanceId
     * @return array
     */
    public function reimage(
        $resourceGroupName,
        $vmScaleSetName,
        $instanceId
    )
    {
        return $this->_Reimage_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'vmScaleSetName' => $vmScaleSetName,
            'instanceId' => $instanceId
        ]);
    }
    /**
     * Allows you to re-image all the disks ( including data disks ) in the a VM scale set instance. This operation is only supported for managed disks.
     * @param string $resourceGroupName
     * @param string $vmScaleSetName
     * @param string $instanceId
     * @return array
     */
    public function reimageAll(
        $resourceGroupName,
        $vmScaleSetName,
        $instanceId
    )
    {
        return $this->_ReimageAll_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'vmScaleSetName' => $vmScaleSetName,
            'instanceId' => $instanceId
        ]);
    }
    /**
     * Deallocates a specific virtual machine in a VM scale set. Shuts down the virtual machine and releases the compute resources it uses. You are not billed for the compute resources of this virtual machine once it is deallocated.
     * @param string $resourceGroupName
     * @param string $vmScaleSetName
     * @param string $instanceId
     * @return array
     */
    public function deallocate(
        $resourceGroupName,
        $vmScaleSetName,
        $instanceId
    )
    {
        return $this->_Deallocate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'vmScaleSetName' => $vmScaleSetName,
            'instanceId' => $instanceId
        ]);
    }
    /**
     * Deletes a virtual machine from a VM scale set.
     * @param string $resourceGroupName
     * @param string $vmScaleSetName
     * @param string $instanceId
     * @return array
     */
    public function delete(
        $resourceGroupName,
        $vmScaleSetName,
        $instanceId
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'vmScaleSetName' => $vmScaleSetName,
            'instanceId' => $instanceId
        ]);
    }
    /**
     * Gets a virtual machine from a VM scale set.
     * @param string $resourceGroupName
     * @param string $vmScaleSetName
     * @param string $instanceId
     * @return array
     */
    public function get(
        $resourceGroupName,
        $vmScaleSetName,
        $instanceId
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'vmScaleSetName' => $vmScaleSetName,
            'instanceId' => $instanceId
        ]);
    }
    /**
     * Gets the status of a virtual machine from a VM scale set.
     * @param string $resourceGroupName
     * @param string $vmScaleSetName
     * @param string $instanceId
     * @return array
     */
    public function getInstanceView(
        $resourceGroupName,
        $vmScaleSetName,
        $instanceId
    )
    {
        return $this->_GetInstanceView_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'vmScaleSetName' => $vmScaleSetName,
            'instanceId' => $instanceId
        ]);
    }
    /**
     * Gets a list of all virtual machines in a VM scale sets.
     * @param string $resourceGroupName
     * @param string $virtualMachineScaleSetName
     * @param string $_filter
     * @param string $_select
     * @param string $_expand
     * @return array
     */
    public function list_(
        $resourceGroupName,
        $virtualMachineScaleSetName,
        $_filter,
        $_select,
        $_expand
    )
    {
        return $this->_List_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'virtualMachineScaleSetName' => $virtualMachineScaleSetName,
            '$filter' => $_filter,
            '$select' => $_select,
            '$expand' => $_expand
        ]);
    }
    /**
     * Power off (stop) a virtual machine in a VM scale set. Note that resources are still attached and you are getting charged for the resources. Instead, use deallocate to release resources and avoid charges.
     * @param string $resourceGroupName
     * @param string $vmScaleSetName
     * @param string $instanceId
     * @return array
     */
    public function powerOff(
        $resourceGroupName,
        $vmScaleSetName,
        $instanceId
    )
    {
        return $this->_PowerOff_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'vmScaleSetName' => $vmScaleSetName,
            'instanceId' => $instanceId
        ]);
    }
    /**
     * Restarts a virtual machine in a VM scale set.
     * @param string $resourceGroupName
     * @param string $vmScaleSetName
     * @param string $instanceId
     * @return array
     */
    public function restart(
        $resourceGroupName,
        $vmScaleSetName,
        $instanceId
    )
    {
        return $this->_Restart_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'vmScaleSetName' => $vmScaleSetName,
            'instanceId' => $instanceId
        ]);
    }
    /**
     * Starts a virtual machine in a VM scale set.
     * @param string $resourceGroupName
     * @param string $vmScaleSetName
     * @param string $instanceId
     * @return array
     */
    public function start(
        $resourceGroupName,
        $vmScaleSetName,
        $instanceId
    )
    {
        return $this->_Start_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'vmScaleSetName' => $vmScaleSetName,
            'instanceId' => $instanceId
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Reimage_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ReimageAll_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Deallocate_operation;
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
    private $_GetInstanceView_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
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
}
