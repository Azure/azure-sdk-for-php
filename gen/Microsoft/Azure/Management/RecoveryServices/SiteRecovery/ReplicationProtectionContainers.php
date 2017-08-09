<?php
namespace Microsoft\Azure\Management\RecoveryServices\SiteRecovery;
final class ReplicationProtectionContainers
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_SwitchProtection_operation = $_client->createOperation('ReplicationProtectionContainers_SwitchProtection');
        $this->_Delete_operation = $_client->createOperation('ReplicationProtectionContainers_Delete');
        $this->_DiscoverProtectableItem_operation = $_client->createOperation('ReplicationProtectionContainers_DiscoverProtectableItem');
        $this->_Get_operation = $_client->createOperation('ReplicationProtectionContainers_Get');
        $this->_Create_operation = $_client->createOperation('ReplicationProtectionContainers_Create');
        $this->_ListByReplicationFabrics_operation = $_client->createOperation('ReplicationProtectionContainers_ListByReplicationFabrics');
        $this->_List_operation = $_client->createOperation('ReplicationProtectionContainers_List');
    }
    /**
     * Operation to switch protection from one container to another or one replication provider to another.
     * @param string $resourceName
     * @param string $resourceGroupName
     * @param string $fabricName
     * @param string $protectionContainerName
     * @param array $switchInput
     * @return array
     */
    public function switchProtection(
        $resourceName,
        $resourceGroupName,
        $fabricName,
        $protectionContainerName,
        array $switchInput
    )
    {
        return $this->_SwitchProtection_operation->call([
            'resourceName' => $resourceName,
            'resourceGroupName' => $resourceGroupName,
            'fabricName' => $fabricName,
            'protectionContainerName' => $protectionContainerName,
            'switchInput' => $switchInput
        ]);
    }
    /**
     * Operation to remove a protection container.
     * @param string $resourceName
     * @param string $resourceGroupName
     * @param string $fabricName
     * @param string $protectionContainerName
     */
    public function delete(
        $resourceName,
        $resourceGroupName,
        $fabricName,
        $protectionContainerName
    )
    {
        return $this->_Delete_operation->call([
            'resourceName' => $resourceName,
            'resourceGroupName' => $resourceGroupName,
            'fabricName' => $fabricName,
            'protectionContainerName' => $protectionContainerName
        ]);
    }
    /**
     * The operation to a add a protectable item to a protection container(Add physical server.)
     * @param string $resourceName
     * @param string $resourceGroupName
     * @param string $fabricName
     * @param string $protectionContainerName
     * @param array $discoverProtectableItemRequest
     * @return array
     */
    public function discoverProtectableItem(
        $resourceName,
        $resourceGroupName,
        $fabricName,
        $protectionContainerName,
        array $discoverProtectableItemRequest
    )
    {
        return $this->_DiscoverProtectableItem_operation->call([
            'resourceName' => $resourceName,
            'resourceGroupName' => $resourceGroupName,
            'fabricName' => $fabricName,
            'protectionContainerName' => $protectionContainerName,
            'discoverProtectableItemRequest' => $discoverProtectableItemRequest
        ]);
    }
    /**
     * Gets the details of a protection container.
     * @param string $resourceName
     * @param string $resourceGroupName
     * @param string $fabricName
     * @param string $protectionContainerName
     * @return array
     */
    public function get(
        $resourceName,
        $resourceGroupName,
        $fabricName,
        $protectionContainerName
    )
    {
        return $this->_Get_operation->call([
            'resourceName' => $resourceName,
            'resourceGroupName' => $resourceGroupName,
            'fabricName' => $fabricName,
            'protectionContainerName' => $protectionContainerName
        ]);
    }
    /**
     * Operation to create a protection container.
     * @param string $resourceName
     * @param string $resourceGroupName
     * @param string $fabricName
     * @param string $protectionContainerName
     * @param array $creationInput
     * @return array
     */
    public function create(
        $resourceName,
        $resourceGroupName,
        $fabricName,
        $protectionContainerName,
        array $creationInput
    )
    {
        return $this->_Create_operation->call([
            'resourceName' => $resourceName,
            'resourceGroupName' => $resourceGroupName,
            'fabricName' => $fabricName,
            'protectionContainerName' => $protectionContainerName,
            'creationInput' => $creationInput
        ]);
    }
    /**
     * Lists the protection containers in the specified fabric.
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
     * Lists the protection containers in a vault.
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
    private $_SwitchProtection_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Delete_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_DiscoverProtectableItem_operation;
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
    private $_ListByReplicationFabrics_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
}
