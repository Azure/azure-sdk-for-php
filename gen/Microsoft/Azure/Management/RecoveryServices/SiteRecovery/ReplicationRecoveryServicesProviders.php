<?php
namespace Microsoft\Azure\Management\RecoveryServices\SiteRecovery;
final class ReplicationRecoveryServicesProviders
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_RefreshProvider_operation = $_client->createOperation('ReplicationRecoveryServicesProviders_RefreshProvider');
        $this->_Delete_operation = $_client->createOperation('ReplicationRecoveryServicesProviders_Delete');
        $this->_Get_operation = $_client->createOperation('ReplicationRecoveryServicesProviders_Get');
        $this->_Purge_operation = $_client->createOperation('ReplicationRecoveryServicesProviders_Purge');
        $this->_ListByReplicationFabrics_operation = $_client->createOperation('ReplicationRecoveryServicesProviders_ListByReplicationFabrics');
        $this->_List_operation = $_client->createOperation('ReplicationRecoveryServicesProviders_List');
    }
    /**
     * The operation to refresh the information from the recovery services provider.
     * @param string $resourceName
     * @param string $resourceGroupName
     * @param string $fabricName
     * @param string $providerName
     * @return array
     */
    public function refreshProvider(
        $resourceName,
        $resourceGroupName,
        $fabricName,
        $providerName
    )
    {
        return $this->_RefreshProvider_operation->call([
            'resourceName' => $resourceName,
            'resourceGroupName' => $resourceGroupName,
            'fabricName' => $fabricName,
            'providerName' => $providerName
        ]);
    }
    /**
     * The operation to removes/delete(unregister) a recovery services provider from the vault
     * @param string $resourceName
     * @param string $resourceGroupName
     * @param string $fabricName
     * @param string $providerName
     */
    public function delete(
        $resourceName,
        $resourceGroupName,
        $fabricName,
        $providerName
    )
    {
        return $this->_Delete_operation->call([
            'resourceName' => $resourceName,
            'resourceGroupName' => $resourceGroupName,
            'fabricName' => $fabricName,
            'providerName' => $providerName
        ]);
    }
    /**
     * Gets the details of registered recovery services provider.
     * @param string $resourceName
     * @param string $resourceGroupName
     * @param string $fabricName
     * @param string $providerName
     * @return array
     */
    public function get(
        $resourceName,
        $resourceGroupName,
        $fabricName,
        $providerName
    )
    {
        return $this->_Get_operation->call([
            'resourceName' => $resourceName,
            'resourceGroupName' => $resourceGroupName,
            'fabricName' => $fabricName,
            'providerName' => $providerName
        ]);
    }
    /**
     * The operation to purge(force delete) a recovery services provider from the vault.
     * @param string $resourceName
     * @param string $resourceGroupName
     * @param string $fabricName
     * @param string $providerName
     */
    public function purge(
        $resourceName,
        $resourceGroupName,
        $fabricName,
        $providerName
    )
    {
        return $this->_Purge_operation->call([
            'resourceName' => $resourceName,
            'resourceGroupName' => $resourceGroupName,
            'fabricName' => $fabricName,
            'providerName' => $providerName
        ]);
    }
    /**
     * Lists the registered recovery services providers for the specified fabric.
     * @param string $resourceName
     * @param string $resourceGroupName
     * @param string $fabricName
     * @return array
     */
    public function listByReplicationFabrics(
        $resourceName,
        $resourceGroupName,
        $fabricName
    )
    {
        return $this->_ListByReplicationFabrics_operation->call([
            'resourceName' => $resourceName,
            'resourceGroupName' => $resourceGroupName,
            'fabricName' => $fabricName
        ]);
    }
    /**
     * Lists the registered recovery services providers in the vault
     * @param string $resourceName
     * @param string $resourceGroupName
     * @return array
     */
    public function list_(
        $resourceName,
        $resourceGroupName
    )
    {
        return $this->_List_operation->call([
            'resourceName' => $resourceName,
            'resourceGroupName' => $resourceGroupName
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_RefreshProvider_operation;
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
    private $_Purge_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByReplicationFabrics_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
}
