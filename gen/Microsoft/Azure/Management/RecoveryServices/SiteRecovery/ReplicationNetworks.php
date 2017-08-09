<?php
namespace Microsoft\Azure\Management\RecoveryServices\SiteRecovery;
final class ReplicationNetworks
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_List_operation = $_client->createOperation('ReplicationNetworks_List');
        $this->_ListByReplicationFabrics_operation = $_client->createOperation('ReplicationNetworks_ListByReplicationFabrics');
        $this->_Get_operation = $_client->createOperation('ReplicationNetworks_Get');
    }
    /**
     * Lists the networks available in a vault
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
     * Lists the networks available for a fabric.
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
     * Gets the details of a network.
     * @param string $resourceName
     * @param string $resourceGroupName
     * @param string $fabricName
     * @param string $networkName
     * @return array
     */
    public function get(
        $resourceName,
        $resourceGroupName,
        $fabricName,
        $networkName
    )
    {
        return $this->_Get_operation->call([
            'resourceName' => $resourceName,
            'resourceGroupName' => $resourceGroupName,
            'fabricName' => $fabricName,
            'networkName' => $networkName
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByReplicationFabrics_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
}
