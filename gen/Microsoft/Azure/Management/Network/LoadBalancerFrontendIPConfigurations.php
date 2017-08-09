<?php
namespace Microsoft\Azure\Management\Network;
final class LoadBalancerFrontendIPConfigurations
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_List_operation = $_client->createOperation('LoadBalancerFrontendIPConfigurations_List');
        $this->_Get_operation = $_client->createOperation('LoadBalancerFrontendIPConfigurations_Get');
    }
    /**
     * Gets all the load balancer frontend IP configurations.
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
     * Gets load balancer frontend IP configuration.
     * @param string $resourceGroupName
     * @param string $loadBalancerName
     * @param string $frontendIPConfigurationName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $loadBalancerName,
        $frontendIPConfigurationName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'loadBalancerName' => $loadBalancerName,
            'frontendIPConfigurationName' => $frontendIPConfigurationName
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
