<?php
namespace Microsoft\Azure\Management\Compute\_2017_03_30;
final class VirtualMachineScaleSetExtensions
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_CreateOrUpdate_operation = $_client->createOperation('VirtualMachineScaleSetExtensions_CreateOrUpdate');
        $this->_Delete_operation = $_client->createOperation('VirtualMachineScaleSetExtensions_Delete');
        $this->_Get_operation = $_client->createOperation('VirtualMachineScaleSetExtensions_Get');
        $this->_List_operation = $_client->createOperation('VirtualMachineScaleSetExtensions_List');
    }
    /**
     * The operation to create or update an extension.
     * @param string $resourceGroupName
     * @param string $vmScaleSetName
     * @param string $vmssExtensionName
     * @param array $extensionParameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $vmScaleSetName,
        $vmssExtensionName,
        array $extensionParameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'vmScaleSetName' => $vmScaleSetName,
            'vmssExtensionName' => $vmssExtensionName,
            'extensionParameters' => $extensionParameters
        ]);
    }
    /**
     * The operation to delete the extension.
     * @param string $resourceGroupName
     * @param string $vmScaleSetName
     * @param string $vmssExtensionName
     * @return array
     */
    public function delete(
        $resourceGroupName,
        $vmScaleSetName,
        $vmssExtensionName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'vmScaleSetName' => $vmScaleSetName,
            'vmssExtensionName' => $vmssExtensionName
        ]);
    }
    /**
     * The operation to get the extension.
     * @param string $resourceGroupName
     * @param string $vmScaleSetName
     * @param string $vmssExtensionName
     * @param string $_expand
     * @return array
     */
    public function get(
        $resourceGroupName,
        $vmScaleSetName,
        $vmssExtensionName,
        $_expand
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'vmScaleSetName' => $vmScaleSetName,
            'vmssExtensionName' => $vmssExtensionName,
            '$expand' => $_expand
        ]);
    }
    /**
     * Gets a list of all extensions in a VM scale set.
     * @param string $resourceGroupName
     * @param string $vmScaleSetName
     * @return array
     */
    public function list_(
        $resourceGroupName,
        $vmScaleSetName
    )
    {
        return $this->_List_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'vmScaleSetName' => $vmScaleSetName
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
    private $_List_operation;
}
