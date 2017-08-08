<?php
namespace Microsoft\Azure\Management\RecoveryServices\Backup\_2016_06_01;
final class ProtectionContainers
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Get_operation = $_client->createOperation('ProtectionContainers_Get');
        $this->_List_operation = $_client->createOperation('ProtectionContainers_List');
        $this->_Refresh_operation = $_client->createOperation('ProtectionContainers_Refresh');
        $this->_Unregister_operation = $_client->createOperation('ProtectionContainers_Unregister');
    }
    /**
     * Gets details of the specific container registered to your Recovery Services vault.
     * @param string $vaultName
     * @param string $resourceGroupName
     * @param string $fabricName
     * @param string $containerName
     * @return array
     */
    public function get(
        $vaultName,
        $resourceGroupName,
        $fabricName,
        $containerName
    )
    {
        return $this->_Get_operation->call([
            'vaultName' => $vaultName,
            'resourceGroupName' => $resourceGroupName,
            'fabricName' => $fabricName,
            'containerName' => $containerName
        ]);
    }
    /**
     * Lists the containers registered to the Recovery Services vault.
     * @param string $vaultName
     * @param string $resourceGroupName
     * @param string $_filter
     * @return array
     */
    public function list_(
        $vaultName,
        $resourceGroupName,
        $_filter
    )
    {
        return $this->_List_operation->call([
            'vaultName' => $vaultName,
            'resourceGroupName' => $resourceGroupName,
            '$filter' => $_filter
        ]);
    }
    /**
     * Discovers the containers in the subscription that can be protected in a Recovery Services vault. This is an asynchronous operation. To learn the status of the operation, use the GetRefreshOperationResult API.
     * @param string $vaultName
     * @param string $resourceGroupName
     * @param string $fabricName
     */
    public function refresh(
        $vaultName,
        $resourceGroupName,
        $fabricName
    )
    {
        return $this->_Refresh_operation->call([
            'vaultName' => $vaultName,
            'resourceGroupName' => $resourceGroupName,
            'fabricName' => $fabricName
        ]);
    }
    /**
     * Unregisters the given container from your Recovery Services vault.
     * @param string $resourceGroupName
     * @param string $vaultName
     * @param string $identityName
     */
    public function unregister(
        $resourceGroupName,
        $vaultName,
        $identityName
    )
    {
        return $this->_Unregister_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'vaultName' => $vaultName,
            'identityName' => $identityName
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Refresh_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Unregister_operation;
}
