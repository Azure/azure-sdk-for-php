<?php
namespace Microsoft\Azure\Management\RecoveryServices\SiteRecovery;
final class ReplicationLogicalNetworks
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListByReplicationFabrics_operation = $_client->createOperation('ReplicationLogicalNetworks_ListByReplicationFabrics');
        $this->_Get_operation = $_client->createOperation('ReplicationLogicalNetworks_Get');
    }
    /**
     * Lists all the logical networks of the Azure Site Recovery fabric
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
     * Gets the details of a logical network.
     * @param string $resourceName
     * @param string $resourceGroupName
     * @param string $fabricName
     * @param string $logicalNetworkName
     * @return array
     */
    public function get(
        $resourceName,
        $resourceGroupName,
        $fabricName,
        $logicalNetworkName
    )
    {
        return $this->_Get_operation->call([
            'resourceName' => $resourceName,
            'resourceGroupName' => $resourceGroupName,
            'fabricName' => $fabricName,
            'logicalNetworkName' => $logicalNetworkName
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByReplicationFabrics_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
}
