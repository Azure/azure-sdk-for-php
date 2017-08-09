<?php
namespace Microsoft\Azure\Management\RecoveryServices;
final class VaultExtendedInfo
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Get_operation = $_client->createOperation('VaultExtendedInfo_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('VaultExtendedInfo_CreateOrUpdate');
        $this->_Update_operation = $_client->createOperation('VaultExtendedInfo_Update');
    }
    /**
     * Get the vault extended info.
     * @param string $resourceGroupName
     * @param string $vaultName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $vaultName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'vaultName' => $vaultName
        ]);
    }
    /**
     * Create vault extended info.
     * @param string $resourceGroupName
     * @param string $vaultName
     * @param array $resourceResourceExtendedInfoDetails
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $vaultName,
        array $resourceResourceExtendedInfoDetails
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'vaultName' => $vaultName,
            'resourceResourceExtendedInfoDetails' => $resourceResourceExtendedInfoDetails
        ]);
    }
    /**
     * Update vault extended info.
     * @param string $resourceGroupName
     * @param string $vaultName
     * @param array $resourceResourceExtendedInfoDetails
     * @return array
     */
    public function update(
        $resourceGroupName,
        $vaultName,
        array $resourceResourceExtendedInfoDetails
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'vaultName' => $vaultName,
            'resourceResourceExtendedInfoDetails' => $resourceResourceExtendedInfoDetails
        ]);
    }
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
    private $_Update_operation;
}
