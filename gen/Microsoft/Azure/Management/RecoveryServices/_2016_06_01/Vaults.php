<?php
namespace Microsoft\Azure\Management\RecoveryServices\_2016_06_01;
final class Vaults
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListBySubscriptionId_operation = $_client->createOperation('Vaults_ListBySubscriptionId');
        $this->_ListByResourceGroup_operation = $_client->createOperation('Vaults_ListByResourceGroup');
        $this->_Get_operation = $_client->createOperation('Vaults_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('Vaults_CreateOrUpdate');
        $this->_Delete_operation = $_client->createOperation('Vaults_Delete');
        $this->_Update_operation = $_client->createOperation('Vaults_Update');
    }
    /**
     * Fetches all the resources of the specified type in the subscription.
     * @return array
     */
    public function listBySubscriptionId()
    {
        return $this->_ListBySubscriptionId_operation->call([]);
    }
    /**
     * Retrieve a list of Vaults.
     * @param string $resourceGroupName
     * @return array
     */
    public function listByResourceGroup($resourceGroupName)
    {
        return $this->_ListByResourceGroup_operation->call(['resourceGroupName' => $resourceGroupName]);
    }
    /**
     * Get the Vault details.
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
     * Creates or updates a Recovery Services vault.
     * @param string $resourceGroupName
     * @param string $vaultName
     * @param array $vault
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $vaultName,
        array $vault
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'vaultName' => $vaultName,
            'vault' => $vault
        ]);
    }
    /**
     * Deletes a vault.
     * @param string $resourceGroupName
     * @param string $vaultName
     */
    public function delete(
        $resourceGroupName,
        $vaultName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'vaultName' => $vaultName
        ]);
    }
    /**
     * Updates the vault.
     * @param string $resourceGroupName
     * @param string $vaultName
     * @param array $vault
     * @return array
     */
    public function update(
        $resourceGroupName,
        $vaultName,
        array $vault
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'vaultName' => $vaultName,
            'vault' => $vault
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListBySubscriptionId_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByResourceGroup_operation;
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
}
