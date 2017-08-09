<?php
namespace Microsoft\Azure\Management\Compute;
final class VirtualMachineExtensions
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_CreateOrUpdate_operation = $_client->createOperation('VirtualMachineExtensions_CreateOrUpdate');
        $this->_Delete_operation = $_client->createOperation('VirtualMachineExtensions_Delete');
        $this->_Get_operation = $_client->createOperation('VirtualMachineExtensions_Get');
    }
    /**
     * The operation to create or update the extension.
     * @param string $resourceGroupName
     * @param string $vmName
     * @param string $vmExtensionName
     * @param array $extensionParameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $vmName,
        $vmExtensionName,
        array $extensionParameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'vmName' => $vmName,
            'vmExtensionName' => $vmExtensionName,
            'extensionParameters' => $extensionParameters
        ]);
    }
    /**
     * The operation to delete the extension.
     * @param string $resourceGroupName
     * @param string $vmName
     * @param string $vmExtensionName
     * @return array
     */
    public function delete(
        $resourceGroupName,
        $vmName,
        $vmExtensionName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'vmName' => $vmName,
            'vmExtensionName' => $vmExtensionName
        ]);
    }
    /**
     * The operation to get the extension.
     * @param string $resourceGroupName
     * @param string $vmName
     * @param string $vmExtensionName
     * @param string|null $_expand
     * @return array
     */
    public function get(
        $resourceGroupName,
        $vmName,
        $vmExtensionName,
        $_expand = null
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'vmName' => $vmName,
            'vmExtensionName' => $vmExtensionName,
            '$expand' => $_expand
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
}
