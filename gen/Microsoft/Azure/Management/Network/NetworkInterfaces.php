<?php
namespace Microsoft\Azure\Management\Network;
final class NetworkInterfaces
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Delete_operation = $_client->createOperation('NetworkInterfaces_Delete');
        $this->_Get_operation = $_client->createOperation('NetworkInterfaces_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('NetworkInterfaces_CreateOrUpdate');
        $this->_ListAll_operation = $_client->createOperation('NetworkInterfaces_ListAll');
        $this->_List_operation = $_client->createOperation('NetworkInterfaces_List');
        $this->_GetEffectiveRouteTable_operation = $_client->createOperation('NetworkInterfaces_GetEffectiveRouteTable');
        $this->_ListEffectiveNetworkSecurityGroups_operation = $_client->createOperation('NetworkInterfaces_ListEffectiveNetworkSecurityGroups');
        $this->_ListVirtualMachineScaleSetVMNetworkInterfaces_operation = $_client->createOperation('NetworkInterfaces_ListVirtualMachineScaleSetVMNetworkInterfaces');
        $this->_ListVirtualMachineScaleSetNetworkInterfaces_operation = $_client->createOperation('NetworkInterfaces_ListVirtualMachineScaleSetNetworkInterfaces');
        $this->_GetVirtualMachineScaleSetNetworkInterface_operation = $_client->createOperation('NetworkInterfaces_GetVirtualMachineScaleSetNetworkInterface');
    }
    /**
     * Deletes the specified network interface.
     * @param string $resourceGroupName
     * @param string $networkInterfaceName
     */
    public function delete(
        $resourceGroupName,
        $networkInterfaceName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'networkInterfaceName' => $networkInterfaceName
        ]);
    }
    /**
     * Gets information about the specified network interface.
     * @param string $resourceGroupName
     * @param string $networkInterfaceName
     * @param string $_expand
     * @return array
     */
    public function get(
        $resourceGroupName,
        $networkInterfaceName,
        $_expand
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'networkInterfaceName' => $networkInterfaceName,
            '$expand' => $_expand
        ]);
    }
    /**
     * Creates or updates a network interface.
     * @param string $resourceGroupName
     * @param string $networkInterfaceName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $networkInterfaceName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'networkInterfaceName' => $networkInterfaceName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Gets all network interfaces in a subscription.
     * @return array
     */
    public function listAll()
    {
        return $this->_ListAll_operation->call([]);
    }
    /**
     * Gets all network interfaces in a resource group.
     * @param string $resourceGroupName
     * @return array
     */
    public function list_($resourceGroupName)
    {
        return $this->_List_operation->call(['resourceGroupName' => $resourceGroupName]);
    }
    /**
     * Gets all route tables applied to a network interface.
     * @param string $resourceGroupName
     * @param string $networkInterfaceName
     * @return array
     */
    public function getEffectiveRouteTable(
        $resourceGroupName,
        $networkInterfaceName
    )
    {
        return $this->_GetEffectiveRouteTable_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'networkInterfaceName' => $networkInterfaceName
        ]);
    }
    /**
     * Gets all network security groups applied to a network interface.
     * @param string $resourceGroupName
     * @param string $networkInterfaceName
     * @return array
     */
    public function listEffectiveNetworkSecurityGroups(
        $resourceGroupName,
        $networkInterfaceName
    )
    {
        return $this->_ListEffectiveNetworkSecurityGroups_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'networkInterfaceName' => $networkInterfaceName
        ]);
    }
    /**
     * Gets information about all network interfaces in a virtual machine in a virtual machine scale set.
     * @param string $resourceGroupName
     * @param string $virtualMachineScaleSetName
     * @param string $virtualmachineIndex
     * @return array
     */
    public function listVirtualMachineScaleSetVMNetworkInterfaces(
        $resourceGroupName,
        $virtualMachineScaleSetName,
        $virtualmachineIndex
    )
    {
        return $this->_ListVirtualMachineScaleSetVMNetworkInterfaces_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'virtualMachineScaleSetName' => $virtualMachineScaleSetName,
            'virtualmachineIndex' => $virtualmachineIndex
        ]);
    }
    /**
     * Gets all network interfaces in a virtual machine scale set.
     * @param string $resourceGroupName
     * @param string $virtualMachineScaleSetName
     * @return array
     */
    public function listVirtualMachineScaleSetNetworkInterfaces(
        $resourceGroupName,
        $virtualMachineScaleSetName
    )
    {
        return $this->_ListVirtualMachineScaleSetNetworkInterfaces_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'virtualMachineScaleSetName' => $virtualMachineScaleSetName
        ]);
    }
    /**
     * Get the specified network interface in a virtual machine scale set.
     * @param string $resourceGroupName
     * @param string $virtualMachineScaleSetName
     * @param string $virtualmachineIndex
     * @param string $networkInterfaceName
     * @param string $_expand
     * @return array
     */
    public function getVirtualMachineScaleSetNetworkInterface(
        $resourceGroupName,
        $virtualMachineScaleSetName,
        $virtualmachineIndex,
        $networkInterfaceName,
        $_expand
    )
    {
        return $this->_GetVirtualMachineScaleSetNetworkInterface_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'virtualMachineScaleSetName' => $virtualMachineScaleSetName,
            'virtualmachineIndex' => $virtualmachineIndex,
            'networkInterfaceName' => $networkInterfaceName,
            '$expand' => $_expand
        ]);
    }
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
    private $_CreateOrUpdate_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListAll_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetEffectiveRouteTable_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListEffectiveNetworkSecurityGroups_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListVirtualMachineScaleSetVMNetworkInterfaces_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListVirtualMachineScaleSetNetworkInterfaces_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetVirtualMachineScaleSetNetworkInterface_operation;
}
