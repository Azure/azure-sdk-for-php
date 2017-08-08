<?php
namespace Microsoft\Azure\Management\Network\_2016_12_01;
final class LoadBalancers
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Delete_operation = $_client->createOperation('LoadBalancers_Delete');
        $this->_Get_operation = $_client->createOperation('LoadBalancers_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('LoadBalancers_CreateOrUpdate');
        $this->_ListAll_operation = $_client->createOperation('LoadBalancers_ListAll');
        $this->_List_operation = $_client->createOperation('LoadBalancers_List');
    }
    /**
     * Deletes the specified load balancer.
     * @param string $resourceGroupName
     * @param string $loadBalancerName
     */
    public function delete(
        $resourceGroupName,
        $loadBalancerName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'loadBalancerName' => $loadBalancerName
        ]);
    }
    /**
     * Gets the specified load balancer.
     * @param string $resourceGroupName
     * @param string $loadBalancerName
     * @param string $_expand
     * @return array
     */
    public function get(
        $resourceGroupName,
        $loadBalancerName,
        $_expand
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'loadBalancerName' => $loadBalancerName,
            '$expand' => $_expand
        ]);
    }
    /**
     * Creates or updates a load balancer.
     * @param string $resourceGroupName
     * @param string $loadBalancerName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $loadBalancerName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'loadBalancerName' => $loadBalancerName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Gets all the load balancers in a subscription.
     * @return array
     */
    public function listAll()
    {
        return $this->_ListAll_operation->call([]);
    }
    /**
     * Gets all the load balancers in a resource group.
     * @param string $resourceGroupName
     * @return array
     */
    public function list_($resourceGroupName)
    {
        return $this->_List_operation->call(['resourceGroupName' => $resourceGroupName]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Delete_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateOrUpdate_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListAll_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
}
