<?php
namespace Microsoft\Azure\Management\RecoveryServices\SiteRecovery;
final class ReplicationEvents
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Get_operation = $_client->createOperation('ReplicationEvents_Get');
        $this->_List_operation = $_client->createOperation('ReplicationEvents_List');
    }
    /**
     * The operation to get the details of an Azure Site recovery event.
     * @param string $resourceName
     * @param string $resourceGroupName
     * @param string $eventName
     * @return array
     */
    public function get(
        $resourceName,
        $resourceGroupName,
        $eventName
    )
    {
        return $this->_Get_operation->call([
            'resourceName' => $resourceName,
            'resourceGroupName' => $resourceGroupName,
            'eventName' => $eventName
        ]);
    }
    /**
     * Gets the list of Azure Site Recovery events for the vault.
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
    private $_Get_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
}
