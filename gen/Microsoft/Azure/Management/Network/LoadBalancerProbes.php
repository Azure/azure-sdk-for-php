<?php
namespace Microsoft\Azure\Management\Network;
final class LoadBalancerProbes
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_List_operation = $_client->createOperation('LoadBalancerProbes_List');
        $this->_Get_operation = $_client->createOperation('LoadBalancerProbes_Get');
    }
    /**
     * Gets all the load balancer probes.
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
     * Gets load balancer probe.
     * @param string $resourceGroupName
     * @param string $loadBalancerName
     * @param string $probeName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $loadBalancerName,
        $probeName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'loadBalancerName' => $loadBalancerName,
            'probeName' => $probeName
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
