<?php
namespace Microsoft\Azure\Management\Compute\_2017_03_30;
final class VirtualMachineScaleSets
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_CreateOrUpdate_operation = $_client->createOperation('VirtualMachineScaleSets_CreateOrUpdate');
        $this->_Delete_operation = $_client->createOperation('VirtualMachineScaleSets_Delete');
        $this->_Get_operation = $_client->createOperation('VirtualMachineScaleSets_Get');
        $this->_Deallocate_operation = $_client->createOperation('VirtualMachineScaleSets_Deallocate');
        $this->_DeleteInstances_operation = $_client->createOperation('VirtualMachineScaleSets_DeleteInstances');
        $this->_GetInstanceView_operation = $_client->createOperation('VirtualMachineScaleSets_GetInstanceView');
        $this->_List_operation = $_client->createOperation('VirtualMachineScaleSets_List');
        $this->_ListAll_operation = $_client->createOperation('VirtualMachineScaleSets_ListAll');
        $this->_ListSkus_operation = $_client->createOperation('VirtualMachineScaleSets_ListSkus');
        $this->_PowerOff_operation = $_client->createOperation('VirtualMachineScaleSets_PowerOff');
        $this->_Restart_operation = $_client->createOperation('VirtualMachineScaleSets_Restart');
        $this->_Start_operation = $_client->createOperation('VirtualMachineScaleSets_Start');
        $this->_UpdateInstances_operation = $_client->createOperation('VirtualMachineScaleSets_UpdateInstances');
        $this->_Reimage_operation = $_client->createOperation('VirtualMachineScaleSets_Reimage');
        $this->_ReimageAll_operation = $_client->createOperation('VirtualMachineScaleSets_ReimageAll');
    }
    /**
     * Create or update a VM scale set.
     * @param string $resourceGroupName
     * @param string $vmScaleSetName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $vmScaleSetName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'vmScaleSetName' => $vmScaleSetName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Deletes a VM scale set.
     * @param string $resourceGroupName
     * @param string $vmScaleSetName
     * @return array
     */
    public function delete(
        $resourceGroupName,
        $vmScaleSetName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'vmScaleSetName' => $vmScaleSetName
        ]);
    }
    /**
     * Display information about a virtual machine scale set.
     * @param string $resourceGroupName
     * @param string $vmScaleSetName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $vmScaleSetName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'vmScaleSetName' => $vmScaleSetName
        ]);
    }
    /**
     * Deallocates specific virtual machines in a VM scale set. Shuts down the virtual machines and releases the compute resources. You are not billed for the compute resources that this virtual machine scale set deallocates.
     * @param string $resourceGroupName
     * @param string $vmScaleSetName
     * @param array $vmInstanceIDs
     * @return array
     */
    public function deallocate(
        $resourceGroupName,
        $vmScaleSetName,
        array $vmInstanceIDs
    )
    {
        return $this->_Deallocate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'vmScaleSetName' => $vmScaleSetName,
            'vmInstanceIDs' => $vmInstanceIDs
        ]);
    }
    /**
     * Deletes virtual machines in a VM scale set.
     * @param string $resourceGroupName
     * @param string $vmScaleSetName
     * @param array $vmInstanceIDs
     * @return array
     */
    public function deleteInstances(
        $resourceGroupName,
        $vmScaleSetName,
        array $vmInstanceIDs
    )
    {
        return $this->_DeleteInstances_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'vmScaleSetName' => $vmScaleSetName,
            'vmInstanceIDs' => $vmInstanceIDs
        ]);
    }
    /**
     * Gets the status of a VM scale set instance.
     * @param string $resourceGroupName
     * @param string $vmScaleSetName
     * @return array
     */
    public function getInstanceView(
        $resourceGroupName,
        $vmScaleSetName
    )
    {
        return $this->_GetInstanceView_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'vmScaleSetName' => $vmScaleSetName
        ]);
    }
    /**
     * Gets a list of all VM scale sets under a resource group.
     * @param string $resourceGroupName
     * @return array
     */
    public function list_($resourceGroupName)
    {
        return $this->_List_operation->call(['resourceGroupName' => $resourceGroupName]);
    }
    /**
     * Gets a list of all VM Scale Sets in the subscription, regardless of the associated resource group. Use nextLink property in the response to get the next page of VM Scale Sets. Do this till nextLink is not null to fetch all the VM Scale Sets.
     * @return array
     */
    public function listAll()
    {
        return $this->_ListAll_operation->call([]);
    }
    /**
     * Gets a list of SKUs available for your VM scale set, including the minimum and maximum VM instances allowed for each SKU.
     * @param string $resourceGroupName
     * @param string $vmScaleSetName
     * @return array
     */
    public function listSkus(
        $resourceGroupName,
        $vmScaleSetName
    )
    {
        return $this->_ListSkus_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'vmScaleSetName' => $vmScaleSetName
        ]);
    }
    /**
     * Power off (stop) one or more virtual machines in a VM scale set. Note that resources are still attached and you are getting charged for the resources. Instead, use deallocate to release resources and avoid charges.
     * @param string $resourceGroupName
     * @param string $vmScaleSetName
     * @param array $vmInstanceIDs
     * @return array
     */
    public function powerOff(
        $resourceGroupName,
        $vmScaleSetName,
        array $vmInstanceIDs
    )
    {
        return $this->_PowerOff_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'vmScaleSetName' => $vmScaleSetName,
            'vmInstanceIDs' => $vmInstanceIDs
        ]);
    }
    /**
     * Restarts one or more virtual machines in a VM scale set.
     * @param string $resourceGroupName
     * @param string $vmScaleSetName
     * @param array $vmInstanceIDs
     * @return array
     */
    public function restart(
        $resourceGroupName,
        $vmScaleSetName,
        array $vmInstanceIDs
    )
    {
        return $this->_Restart_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'vmScaleSetName' => $vmScaleSetName,
            'vmInstanceIDs' => $vmInstanceIDs
        ]);
    }
    /**
     * Starts one or more virtual machines in a VM scale set.
     * @param string $resourceGroupName
     * @param string $vmScaleSetName
     * @param array $vmInstanceIDs
     * @return array
     */
    public function start(
        $resourceGroupName,
        $vmScaleSetName,
        array $vmInstanceIDs
    )
    {
        return $this->_Start_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'vmScaleSetName' => $vmScaleSetName,
            'vmInstanceIDs' => $vmInstanceIDs
        ]);
    }
    /**
     * Upgrades one or more virtual machines to the latest SKU set in the VM scale set model.
     * @param string $resourceGroupName
     * @param string $vmScaleSetName
     * @param array $vmInstanceIDs
     * @return array
     */
    public function updateInstances(
        $resourceGroupName,
        $vmScaleSetName,
        array $vmInstanceIDs
    )
    {
        return $this->_UpdateInstances_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'vmScaleSetName' => $vmScaleSetName,
            'vmInstanceIDs' => $vmInstanceIDs
        ]);
    }
    /**
     * Reimages (upgrade the operating system) one or more virtual machines in a VM scale set.
     * @param string $resourceGroupName
     * @param string $vmScaleSetName
     * @param array $vmInstanceIDs
     * @return array
     */
    public function reimage(
        $resourceGroupName,
        $vmScaleSetName,
        array $vmInstanceIDs
    )
    {
        return $this->_Reimage_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'vmScaleSetName' => $vmScaleSetName,
            'vmInstanceIDs' => $vmInstanceIDs
        ]);
    }
    /**
     * Reimages all the disks ( including data disks ) in the virtual machines in a VM scale set. This operation is only supported for managed disks.
     * @param string $resourceGroupName
     * @param string $vmScaleSetName
     * @param array $vmInstanceIDs
     * @return array
     */
    public function reimageAll(
        $resourceGroupName,
        $vmScaleSetName,
        array $vmInstanceIDs
    )
    {
        return $this->_ReimageAll_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'vmScaleSetName' => $vmScaleSetName,
            'vmInstanceIDs' => $vmInstanceIDs
        ]);
    }
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
    private $_Deallocate_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_DeleteInstances_operation;
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
    private $_ListAll_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListSkus_operation;
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
    private $_UpdateInstances_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Reimage_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ReimageAll_operation;
}
