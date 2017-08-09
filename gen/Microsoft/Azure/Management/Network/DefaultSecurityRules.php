<?php
namespace Microsoft\Azure\Management\Network;
final class DefaultSecurityRules
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_List_operation = $_client->createOperation('DefaultSecurityRules_List');
        $this->_Get_operation = $_client->createOperation('DefaultSecurityRules_Get');
    }
    /**
     * Gets all default security rules in a network security group.
     * @param string $resourceGroupName
     * @param string $networkSecurityGroupName
     * @return array
     */
    public function list_(
        $resourceGroupName,
        $networkSecurityGroupName
    )
    {
        return $this->_List_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'networkSecurityGroupName' => $networkSecurityGroupName
        ]);
    }
    /**
     * Get the specified default network security rule.
     * @param string $resourceGroupName
     * @param string $networkSecurityGroupName
     * @param string $defaultSecurityRuleName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $networkSecurityGroupName,
        $defaultSecurityRuleName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'networkSecurityGroupName' => $networkSecurityGroupName,
            'defaultSecurityRuleName' => $defaultSecurityRuleName
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
