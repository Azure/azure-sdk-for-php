<?php
namespace Microsoft\Azure\Management\RecoveryServices\SiteRecovery;
final class ReplicationProtectionContainerMappings
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Delete_operation = $_client->createOperation('ReplicationProtectionContainerMappings_Delete');
        $this->_Get_operation = $_client->createOperation('ReplicationProtectionContainerMappings_Get');
        $this->_Create_operation = $_client->createOperation('ReplicationProtectionContainerMappings_Create');
        $this->_Purge_operation = $_client->createOperation('ReplicationProtectionContainerMappings_Purge');
        $this->_ListByReplicationProtectionContainers_operation = $_client->createOperation('ReplicationProtectionContainerMappings_ListByReplicationProtectionContainers');
        $this->_List_operation = $_client->createOperation('ReplicationProtectionContainerMappings_List');
    }
    /**
     * The operation to delete or remove a protection container mapping.
     * @param string $resourceName
     * @param string $resourceGroupName
     * @param string $fabricName
     * @param string $protectionContainerName
     * @param string $mappingName
     * @param array $removalInput
     */
    public function delete(
        $resourceName,
        $resourceGroupName,
        $fabricName,
        $protectionContainerName,
        $mappingName,
        array $removalInput
    )
    {
        return $this->_Delete_operation->call([
            'resourceName' => $resourceName,
            'resourceGroupName' => $resourceGroupName,
            'fabricName' => $fabricName,
            'protectionContainerName' => $protectionContainerName,
            'mappingName' => $mappingName,
            'removalInput' => $removalInput
        ]);
    }
    /**
     * Gets the details of a protection container mapping.
     * @param string $resourceName
     * @param string $resourceGroupName
     * @param string $fabricName
     * @param string $protectionContainerName
     * @param string $mappingName
     * @return array
     */
    public function get(
        $resourceName,
        $resourceGroupName,
        $fabricName,
        $protectionContainerName,
        $mappingName
    )
    {
        return $this->_Get_operation->call([
            'resourceName' => $resourceName,
            'resourceGroupName' => $resourceGroupName,
            'fabricName' => $fabricName,
            'protectionContainerName' => $protectionContainerName,
            'mappingName' => $mappingName
        ]);
    }
    /**
     * The operation to create a protection container mapping.
     * @param string $resourceName
     * @param string $resourceGroupName
     * @param string $fabricName
     * @param string $protectionContainerName
     * @param string $mappingName
     * @param array $creationInput
     * @return array
     */
    public function create(
        $resourceName,
        $resourceGroupName,
        $fabricName,
        $protectionContainerName,
        $mappingName,
        array $creationInput
    )
    {
        return $this->_Create_operation->call([
            'resourceName' => $resourceName,
            'resourceGroupName' => $resourceGroupName,
            'fabricName' => $fabricName,
            'protectionContainerName' => $protectionContainerName,
            'mappingName' => $mappingName,
            'creationInput' => $creationInput
        ]);
    }
    /**
     * The operation to purge(force delete) a protection container mapping
     * @param string $resourceName
     * @param string $resourceGroupName
     * @param string $fabricName
     * @param string $protectionContainerName
     * @param string $mappingName
     */
    public function purge(
        $resourceName,
        $resourceGroupName,
        $fabricName,
        $protectionContainerName,
        $mappingName
    )
    {
        return $this->_Purge_operation->call([
            'resourceName' => $resourceName,
            'resourceGroupName' => $resourceGroupName,
            'fabricName' => $fabricName,
            'protectionContainerName' => $protectionContainerName,
            'mappingName' => $mappingName
        ]);
    }
    /**
     * Lists the protection container mappings for a protection container.
     * @param string $resourceName
     * @param string $resourceGroupName
     * @param string $fabricName
     * @param string $protectionContainerName
     * @return array
     */
    public function listByReplicationProtectionContainers(
        $resourceName,
        $resourceGroupName,
        $fabricName,
        $protectionContainerName
    )
    {
        return $this->_ListByReplicationProtectionContainers_operation->call([
            'resourceName' => $resourceName,
            'resourceGroupName' => $resourceGroupName,
            'fabricName' => $fabricName,
            'protectionContainerName' => $protectionContainerName
        ]);
    }
    /**
     * Lists the protection container mappings in the vault.
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
    private $_ListByReplicationProtectionContainers_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
}
