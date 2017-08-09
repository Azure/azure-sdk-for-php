<?php
namespace Microsoft\Azure\Management\Network;
final class LoadBalancerLoadBalancingRules
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_List_operation = $_client->createOperation('LoadBalancerLoadBalancingRules_List');
        $this->_Get_operation = $_client->createOperation('LoadBalancerLoadBalancingRules_Get');
    }
    /**
     * Gets all the load balancing rules in a load balancer.
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
     * Gets the specified load balancer load balancing rule.
     * @param string $resourceGroupName
     * @param string $loadBalancerName
     * @param string $loadBalancingRuleName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $loadBalancerName,
        $loadBalancingRuleName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'loadBalancerName' => $loadBalancerName,
            'loadBalancingRuleName' => $loadBalancingRuleName
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
