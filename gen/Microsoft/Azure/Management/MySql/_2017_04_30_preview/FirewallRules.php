<?php
namespace Microsoft\Azure\Management\MySql\_2017_04_30_preview;
final class FirewallRules
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_CreateOrUpdate_operation = $_client->createOperation('FirewallRules_CreateOrUpdate');
        $this->_Delete_operation = $_client->createOperation('FirewallRules_Delete');
        $this->_Get_operation = $_client->createOperation('FirewallRules_Get');
        $this->_ListByServer_operation = $_client->createOperation('FirewallRules_ListByServer');
    }
    /**
     * Creates a new firewall rule or updates an existing firewall rule.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $firewallRuleName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $serverName,
        $firewallRuleName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'firewallRuleName' => $firewallRuleName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Deletes a server firewall rule.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $firewallRuleName
     */
    public function delete(
        $resourceGroupName,
        $serverName,
        $firewallRuleName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'firewallRuleName' => $firewallRuleName
        ]);
    }
    /**
     * Gets information about a server firewall rule.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $firewallRuleName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $serverName,
        $firewallRuleName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'firewallRuleName' => $firewallRuleName
        ]);
    }
    /**
     * List all the firewall rules in a given server.
     * @param string $resourceGroupName
     * @param string $serverName
     * @return array
     */
    public function listByServer(
        $resourceGroupName,
        $serverName
    )
    {
        return $this->_ListByServer_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateOrUpdate_operation;
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
    private $_ListByServer_operation;
}
