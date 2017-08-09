<?php
namespace Microsoft\Azure\Management\RecoveryServices\SiteRecovery;
final class ReplicationNetworkMappings
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_List_operation = $_client->createOperation('ReplicationNetworkMappings_List');
        $this->_ListByReplicationNetworks_operation = $_client->createOperation('ReplicationNetworkMappings_ListByReplicationNetworks');
        $this->_Get_operation = $_client->createOperation('ReplicationNetworkMappings_Get');
        $this->_Create_operation = $_client->createOperation('ReplicationNetworkMappings_Create');
        $this->_Delete_operation = $_client->createOperation('ReplicationNetworkMappings_Delete');
        $this->_Update_operation = $_client->createOperation('ReplicationNetworkMappings_Update');
    }
    /**
     * Lists all ASR network mappings in the vault.
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
     * Lists all ASR network mappings for the specified network.
     * @param string $resourceName
     * @param string $resourceGroupName
     * @param string $fabricName
     * @param string $networkName
     * @return array
     */
    public function listByReplicationNetworks(
        $resourceName,
        $resourceGroupName,
        $fabricName,
        $networkName
    )
    {
        return $this->_ListByReplicationNetworks_operation->call([
            'resourceName' => $resourceName,
            'resourceGroupName' => $resourceGroupName,
            'fabricName' => $fabricName,
            'networkName' => $networkName
        ]);
    }
    /**
     * Gets the details of an ASR network mapping
     * @param string $resourceName
     * @param string $resourceGroupName
     * @param string $fabricName
     * @param string $networkName
     * @param string $networkMappingName
     * @return array
     */
    public function get(
        $resourceName,
        $resourceGroupName,
        $fabricName,
        $networkName,
        $networkMappingName
    )
    {
        return $this->_Get_operation->call([
            'resourceName' => $resourceName,
            'resourceGroupName' => $resourceGroupName,
            'fabricName' => $fabricName,
            'networkName' => $networkName,
            'networkMappingName' => $networkMappingName
        ]);
    }
    /**
     * The operation to create an ASR network mapping.
     * @param string $resourceName
     * @param string $resourceGroupName
     * @param string $fabricName
     * @param string $networkName
     * @param string $networkMappingName
     * @param array $input
     * @return array
     */
    public function create(
        $resourceName,
        $resourceGroupName,
        $fabricName,
        $networkName,
        $networkMappingName,
        array $input
    )
    {
        return $this->_Create_operation->call([
            'resourceName' => $resourceName,
            'resourceGroupName' => $resourceGroupName,
            'fabricName' => $fabricName,
            'networkName' => $networkName,
            'networkMappingName' => $networkMappingName,
            'input' => $input
        ]);
    }
    /**
     * The operation to delete a network mapping.
     * @param string $resourceName
     * @param string $resourceGroupName
     * @param string $fabricName
     * @param string $networkName
     * @param string $networkMappingName
     */
    public function delete(
        $resourceName,
        $resourceGroupName,
        $fabricName,
        $networkName,
        $networkMappingName
    )
    {
        return $this->_Delete_operation->call([
            'resourceName' => $resourceName,
            'resourceGroupName' => $resourceGroupName,
            'fabricName' => $fabricName,
            'networkName' => $networkName,
            'networkMappingName' => $networkMappingName
        ]);
    }
    /**
     * The operation to update an ASR network mapping.
     * @param string $resourceName
     * @param string $resourceGroupName
     * @param string $fabricName
     * @param string $networkName
     * @param string $networkMappingName
     * @param array $input
     * @return array
     */
    public function update(
        $resourceName,
        $resourceGroupName,
        $fabricName,
        $networkName,
        $networkMappingName,
        array $input
    )
    {
        return $this->_Update_operation->call([
            'resourceName' => $resourceName,
            'resourceGroupName' => $resourceGroupName,
            'fabricName' => $fabricName,
            'networkName' => $networkName,
            'networkMappingName' => $networkMappingName,
            'input' => $input
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByReplicationNetworks_operation;
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
    private $_Delete_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Update_operation;
}
