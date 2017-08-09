<?php
namespace Microsoft\Azure\Management\DataLake\Analytics;
final class FirewallRules
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_CreateOrUpdate_operation = $_client->createOperation('FirewallRules_CreateOrUpdate');
        $this->_Update_operation = $_client->createOperation('FirewallRules_Update');
        $this->_Delete_operation = $_client->createOperation('FirewallRules_Delete');
        $this->_Get_operation = $_client->createOperation('FirewallRules_Get');
        $this->_ListByAccount_operation = $_client->createOperation('FirewallRules_ListByAccount');
    }
    /**
     * Creates or updates the specified firewall rule. During update, the firewall rule with the specified name will be replaced with this new firewall rule.
     * @param string $resourceGroupName
     * @param string $accountName
     * @param string $firewallRuleName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $accountName,
        $firewallRuleName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'accountName' => $accountName,
            'firewallRuleName' => $firewallRuleName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Updates the specified firewall rule.
     * @param string $resourceGroupName
     * @param string $accountName
     * @param string $firewallRuleName
     * @param array $parameters
     * @return array
     */
    public function update(
        $resourceGroupName,
        $accountName,
        $firewallRuleName,
        array $parameters
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'accountName' => $accountName,
            'firewallRuleName' => $firewallRuleName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Deletes the specified firewall rule from the specified Data Lake Analytics account
     * @param string $resourceGroupName
     * @param string $accountName
     * @param string $firewallRuleName
     */
    public function delete(
        $resourceGroupName,
        $accountName,
        $firewallRuleName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'accountName' => $accountName,
            'firewallRuleName' => $firewallRuleName
        ]);
    }
    /**
     * Gets the specified Data Lake Analytics firewall rule.
     * @param string $resourceGroupName
     * @param string $accountName
     * @param string $firewallRuleName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $accountName,
        $firewallRuleName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'accountName' => $accountName,
            'firewallRuleName' => $firewallRuleName
        ]);
    }
    /**
     * Lists the Data Lake Analytics firewall rules within the specified Data Lake Analytics account.
     * @param string $resourceGroupName
     * @param string $accountName
     * @return array
     */
    public function listByAccount(
        $resourceGroupName,
        $accountName
    )
    {
        return $this->_ListByAccount_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'accountName' => $accountName
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateOrUpdate_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Update_operation;
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
    private $_ListByAccount_operation;
}
