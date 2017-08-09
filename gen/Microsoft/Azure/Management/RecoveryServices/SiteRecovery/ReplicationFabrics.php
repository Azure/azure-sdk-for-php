<?php
namespace Microsoft\Azure\Management\RecoveryServices\SiteRecovery;
final class ReplicationFabrics
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_MigrateToAad_operation = $_client->createOperation('ReplicationFabrics_MigrateToAad');
        $this->_RenewCertificate_operation = $_client->createOperation('ReplicationFabrics_RenewCertificate');
        $this->_ReassociateGateway_operation = $_client->createOperation('ReplicationFabrics_ReassociateGateway');
        $this->_CheckConsistency_operation = $_client->createOperation('ReplicationFabrics_CheckConsistency');
        $this->_Delete_operation = $_client->createOperation('ReplicationFabrics_Delete');
        $this->_Get_operation = $_client->createOperation('ReplicationFabrics_Get');
        $this->_Create_operation = $_client->createOperation('ReplicationFabrics_Create');
        $this->_Purge_operation = $_client->createOperation('ReplicationFabrics_Purge');
        $this->_List_operation = $_client->createOperation('ReplicationFabrics_List');
    }
    /**
     * The operation to migrate an Azure Site Recovery fabric to AAD.
     * @param string $resourceName
     * @param string $resourceGroupName
     * @param string $fabricName
     */
    public function migrateToAad(
        $resourceName,
        $resourceGroupName,
        $fabricName
    )
    {
        return $this->_MigrateToAad_operation->call([
            'resourceName' => $resourceName,
            'resourceGroupName' => $resourceGroupName,
            'fabricName' => $fabricName
        ]);
    }
    /**
     * Renews the connection certificate for the ASR replication fabric.
     * @param string $resourceName
     * @param string $resourceGroupName
     * @param string $fabricName
     * @param array $renewCertificate
     * @return array
     */
    public function renewCertificate(
        $resourceName,
        $resourceGroupName,
        $fabricName,
        array $renewCertificate
    )
    {
        return $this->_RenewCertificate_operation->call([
            'resourceName' => $resourceName,
            'resourceGroupName' => $resourceGroupName,
            'fabricName' => $fabricName,
            'renewCertificate' => $renewCertificate
        ]);
    }
    /**
     * The operation to move replications from a process server to another process server.
     * @param string $resourceName
     * @param string $resourceGroupName
     * @param string $fabricName
     * @param array $failoverProcessServerRequest
     * @return array
     */
    public function reassociateGateway(
        $resourceName,
        $resourceGroupName,
        $fabricName,
        array $failoverProcessServerRequest
    )
    {
        return $this->_ReassociateGateway_operation->call([
            'resourceName' => $resourceName,
            'resourceGroupName' => $resourceGroupName,
            'fabricName' => $fabricName,
            'failoverProcessServerRequest' => $failoverProcessServerRequest
        ]);
    }
    /**
     * The operation to perform a consistency check on the fabric.
     * @param string $resourceName
     * @param string $resourceGroupName
     * @param string $fabricName
     * @return array
     */
    public function checkConsistency(
        $resourceName,
        $resourceGroupName,
        $fabricName
    )
    {
        return $this->_CheckConsistency_operation->call([
            'resourceName' => $resourceName,
            'resourceGroupName' => $resourceGroupName,
            'fabricName' => $fabricName
        ]);
    }
    /**
     * The operation to delete or remove an Azure Site Recovery fabric.
     * @param string $resourceName
     * @param string $resourceGroupName
     * @param string $fabricName
     */
    public function delete(
        $resourceName,
        $resourceGroupName,
        $fabricName
    )
    {
        return $this->_Delete_operation->call([
            'resourceName' => $resourceName,
            'resourceGroupName' => $resourceGroupName,
            'fabricName' => $fabricName
        ]);
    }
    /**
     * Gets the details of an Azure Site Recovery fabric.
     * @param string $resourceName
     * @param string $resourceGroupName
     * @param string $fabricName
     * @return array
     */
    public function get(
        $resourceName,
        $resourceGroupName,
        $fabricName
    )
    {
        return $this->_Get_operation->call([
            'resourceName' => $resourceName,
            'resourceGroupName' => $resourceGroupName,
            'fabricName' => $fabricName
        ]);
    }
    /**
     * The operation to create an Azure Site Recovery fabric (for e.g. Hyper-V site)
     * @param string $resourceName
     * @param string $resourceGroupName
     * @param string $fabricName
     * @param array $input
     * @return array
     */
    public function create(
        $resourceName,
        $resourceGroupName,
        $fabricName,
        array $input
    )
    {
        return $this->_Create_operation->call([
            'resourceName' => $resourceName,
            'resourceGroupName' => $resourceGroupName,
            'fabricName' => $fabricName,
            'input' => $input
        ]);
    }
    /**
     * The operation to purge(force delete) an Azure Site Recovery fabric.
     * @param string $resourceName
     * @param string $resourceGroupName
     * @param string $fabricName
     */
    public function purge(
        $resourceName,
        $resourceGroupName,
        $fabricName
    )
    {
        return $this->_Purge_operation->call([
            'resourceName' => $resourceName,
            'resourceGroupName' => $resourceGroupName,
            'fabricName' => $fabricName
        ]);
    }
    /**
     * Gets a list of the Azure Site Recovery fabrics in the vault.
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
    private $_MigrateToAad_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_RenewCertificate_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ReassociateGateway_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CheckConsistency_operation;
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
    private $_Create_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Purge_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
}
