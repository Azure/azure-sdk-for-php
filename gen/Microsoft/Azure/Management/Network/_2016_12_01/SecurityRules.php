<?php
namespace Microsoft\Azure\Management\Network\_2016_12_01;
final class SecurityRules
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Delete_operation = $_client->createOperation('SecurityRules_Delete');
        $this->_Get_operation = $_client->createOperation('SecurityRules_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('SecurityRules_CreateOrUpdate');
        $this->_List_operation = $_client->createOperation('SecurityRules_List');
    }
    /**
     * Deletes the specified network security rule.
     * @param string $resourceGroupName
     * @param string $networkSecurityGroupName
     * @param string $securityRuleName
     */
    public function delete(
        $resourceGroupName,
        $networkSecurityGroupName,
        $securityRuleName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'networkSecurityGroupName' => $networkSecurityGroupName,
            'securityRuleName' => $securityRuleName
        ]);
    }
    /**
     * Get the specified network security rule.
     * @param string $resourceGroupName
     * @param string $networkSecurityGroupName
     * @param string $securityRuleName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $networkSecurityGroupName,
        $securityRuleName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'networkSecurityGroupName' => $networkSecurityGroupName,
            'securityRuleName' => $securityRuleName
        ]);
    }
    /**
     * Creates or updates a security rule in the specified network security group.
     * @param string $resourceGroupName
     * @param string $networkSecurityGroupName
     * @param string $securityRuleName
     * @param array $securityRuleParameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $networkSecurityGroupName,
        $securityRuleName,
        array $securityRuleParameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'networkSecurityGroupName' => $networkSecurityGroupName,
            'securityRuleName' => $securityRuleName,
            'securityRuleParameters' => $securityRuleParameters
        ]);
    }
    /**
     * Gets all security rules in a network security group.
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
    private $_List_operation;
}
