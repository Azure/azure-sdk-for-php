<?php
namespace Microsoft\Azure\Management\Network;
final class NetworkInterfaceLoadBalancers
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_List_operation = $_client->createOperation('NetworkInterfaceLoadBalancers_List');
    }
    /**
     * Get all load balancers in a network interface
     * @param string $resourceGroupName
     * @param string $networkInterfaceName
     * @return array
     */
    public function list_(
        $resourceGroupName,
        $networkInterfaceName
    )
    {
        return $this->_List_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'networkInterfaceName' => $networkInterfaceName
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
}
