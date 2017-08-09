<?php
namespace Microsoft\Azure\Management\Network;
final class LoadBalancerNetworkInterfaces
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_List_operation = $_client->createOperation('LoadBalancerNetworkInterfaces_List');
    }
    /**
     * Gets associated load balancer network interfaces.
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
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
}
