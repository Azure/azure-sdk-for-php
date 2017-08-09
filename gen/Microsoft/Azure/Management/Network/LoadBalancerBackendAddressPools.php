<?php
namespace Microsoft\Azure\Management\Network;
final class LoadBalancerBackendAddressPools
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_List_operation = $_client->createOperation('LoadBalancerBackendAddressPools_List');
        $this->_Get_operation = $_client->createOperation('LoadBalancerBackendAddressPools_Get');
    }
    /**
     * Gets all the load balancer backed address pools.
     * @param string $resourceGroupName
     * @param string $loadBalancerName
     * @return array
     */
    public function list_(
        $resourceGroupName,
        $loadBalancerName
    )
    {
        return $this->_List_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'loadBalancerName' => $loadBalancerName
        ]);
    }
    /**
     * Gets load balancer backend address pool.
     * @param string $resourceGroupName
     * @param string $loadBalancerName
     * @param string $backendAddressPoolName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $loadBalancerName,
        $backendAddressPoolName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'loadBalancerName' => $loadBalancerName,
            'backendAddressPoolName' => $backendAddressPoolName
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
}
