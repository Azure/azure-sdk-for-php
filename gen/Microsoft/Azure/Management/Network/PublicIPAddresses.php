<?php
namespace Microsoft\Azure\Management\Network;
final class PublicIPAddresses
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Delete_operation = $_client->createOperation('PublicIPAddresses_Delete');
        $this->_Get_operation = $_client->createOperation('PublicIPAddresses_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('PublicIPAddresses_CreateOrUpdate');
        $this->_ListAll_operation = $_client->createOperation('PublicIPAddresses_ListAll');
        $this->_List_operation = $_client->createOperation('PublicIPAddresses_List');
        $this->_ListVirtualMachineScaleSetPublicIPAddresses_operation = $_client->createOperation('PublicIPAddresses_ListVirtualMachineScaleSetPublicIPAddresses');
        $this->_ListVirtualMachineScaleSetVMPublicIPAddresses_operation = $_client->createOperation('PublicIPAddresses_ListVirtualMachineScaleSetVMPublicIPAddresses');
        $this->_GetVirtualMachineScaleSetPublicIPAddress_operation = $_client->createOperation('PublicIPAddresses_GetVirtualMachineScaleSetPublicIPAddress');
    }
    /**
     * Deletes the specified public IP address.
     * @param string $resourceGroupName
     * @param string $publicIpAddressName
     */
    public function delete(
        $resourceGroupName,
        $publicIpAddressName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'publicIpAddressName' => $publicIpAddressName
        ]);
    }
    /**
     * Gets the specified public IP address in a specified resource group.
     * @param string $resourceGroupName
     * @param string $publicIpAddressName
     * @param string $_expand
     * @return array
     */
    public function get(
        $resourceGroupName,
        $publicIpAddressName,
        $_expand
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'publicIpAddressName' => $publicIpAddressName,
            '$expand' => $_expand
        ]);
    }
    /**
     * Creates or updates a static or dynamic public IP address.
     * @param string $resourceGroupName
     * @param string $publicIpAddressName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $publicIpAddressName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'publicIpAddressName' => $publicIpAddressName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Gets all the public IP addresses in a subscription.
     * @return array
     */
    public function listAll()
    {
        return $this->_ListAll_operation->call([]);
    }
    /**
     * Gets all public IP addresses in a resource group.
     * @param string $resourceGroupName
     * @return array
     */
    public function list_($resourceGroupName)
    {
        return $this->_List_operation->call(['resourceGroupName' => $resourceGroupName]);
    }
    /**
     * Gets information about all public IP addresses on a virtual machine scale set level.
     * @param string $resourceGroupName
     * @param string $virtualMachineScaleSetName
     * @return array
     */
    public function listVirtualMachineScaleSetPublicIPAddresses(
        $resourceGroupName,
        $virtualMachineScaleSetName
    )
    {
        return $this->_ListVirtualMachineScaleSetPublicIPAddresses_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'virtualMachineScaleSetName' => $virtualMachineScaleSetName
        ]);
    }
    /**
     * Gets information about all public IP addresses in a virtual machine IP configuration in a virtual machine scale set.
     * @param string $resourceGroupName
     * @param string $virtualMachineScaleSetName
     * @param string $virtualmachineIndex
     * @param string $networkInterfaceName
     * @param string $ipConfigurationName
     * @return array
     */
    public function listVirtualMachineScaleSetVMPublicIPAddresses(
        $resourceGroupName,
        $virtualMachineScaleSetName,
        $virtualmachineIndex,
        $networkInterfaceName,
        $ipConfigurationName
    )
    {
        return $this->_ListVirtualMachineScaleSetVMPublicIPAddresses_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'virtualMachineScaleSetName' => $virtualMachineScaleSetName,
            'virtualmachineIndex' => $virtualmachineIndex,
            'networkInterfaceName' => $networkInterfaceName,
            'ipConfigurationName' => $ipConfigurationName
        ]);
    }
    /**
     * Get the specified public IP address in a virtual machine scale set.
     * @param string $resourceGroupName
     * @param string $virtualMachineScaleSetName
     * @param string $virtualmachineIndex
     * @param string $networkInterfaceName
     * @param string $ipConfigurationName
     * @param string $publicIpAddressName
     * @param string $_expand
     * @return array
     */
    public function getVirtualMachineScaleSetPublicIPAddress(
        $resourceGroupName,
        $virtualMachineScaleSetName,
        $virtualmachineIndex,
        $networkInterfaceName,
        $ipConfigurationName,
        $publicIpAddressName,
        $_expand
    )
    {
        return $this->_GetVirtualMachineScaleSetPublicIPAddress_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'virtualMachineScaleSetName' => $virtualMachineScaleSetName,
            'virtualmachineIndex' => $virtualmachineIndex,
            'networkInterfaceName' => $networkInterfaceName,
            'ipConfigurationName' => $ipConfigurationName,
            'publicIpAddressName' => $publicIpAddressName,
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
    private $_ListVirtualMachineScaleSetPublicIPAddresses_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListVirtualMachineScaleSetVMPublicIPAddresses_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetVirtualMachineScaleSetPublicIPAddress_operation;
}
