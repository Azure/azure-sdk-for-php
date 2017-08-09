<?php
namespace Microsoft\Azure\Management\Network;
final class InboundNatRules
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_List_operation = $_client->createOperation('InboundNatRules_List');
        $this->_Delete_operation = $_client->createOperation('InboundNatRules_Delete');
        $this->_Get_operation = $_client->createOperation('InboundNatRules_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('InboundNatRules_CreateOrUpdate');
    }
    /**
     * Gets all the inbound nat rules in a load balancer.
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
     * Deletes the specified load balancer inbound nat rule.
     * @param string $resourceGroupName
     * @param string $loadBalancerName
     * @param string $inboundNatRuleName
     */
    public function delete(
        $resourceGroupName,
        $loadBalancerName,
        $inboundNatRuleName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'loadBalancerName' => $loadBalancerName,
            'inboundNatRuleName' => $inboundNatRuleName
        ]);
    }
    /**
     * Gets the specified load balancer inbound nat rule.
     * @param string $resourceGroupName
     * @param string $loadBalancerName
     * @param string $inboundNatRuleName
     * @param string|null $_expand
     * @return array
     */
    public function get(
        $resourceGroupName,
        $loadBalancerName,
        $inboundNatRuleName,
        $_expand = null
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'loadBalancerName' => $loadBalancerName,
            'inboundNatRuleName' => $inboundNatRuleName,
            '$expand' => $_expand
        ]);
    }
    /**
     * Creates or updates a load balancer inbound nat rule.
     * @param string $resourceGroupName
     * @param string $loadBalancerName
     * @param string $inboundNatRuleName
     * @param array $inboundNatRuleParameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $loadBalancerName,
        $inboundNatRuleName,
        array $inboundNatRuleParameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'loadBalancerName' => $loadBalancerName,
            'inboundNatRuleName' => $inboundNatRuleName,
            'inboundNatRuleParameters' => $inboundNatRuleParameters
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
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
}
