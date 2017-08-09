<?php
namespace Microsoft\Azure\Management\RecoveryServices\SiteRecovery;
final class ReplicationProtectableItems
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Get_operation = $_client->createOperation('ReplicationProtectableItems_Get');
        $this->_ListByReplicationProtectionContainers_operation = $_client->createOperation('ReplicationProtectableItems_ListByReplicationProtectionContainers');
    }
    /**
     * The operation to get the details of a protectable item.
     * @param string $resourceName
     * @param string $resourceGroupName
     * @param string $fabricName
     * @param string $protectionContainerName
     * @param string $protectableItemName
     * @return array
     */
    public function get(
        $resourceName,
        $resourceGroupName,
        $fabricName,
        $protectionContainerName,
        $protectableItemName
    )
    {
        return $this->_Get_operation->call([
            'resourceName' => $resourceName,
            'resourceGroupName' => $resourceGroupName,
            'fabricName' => $fabricName,
            'protectionContainerName' => $protectionContainerName,
            'protectableItemName' => $protectableItemName
        ]);
    }
    /**
     * Lists the protectable items in a protection container.
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
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByReplicationProtectionContainers_operation;
}
