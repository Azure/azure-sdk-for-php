<?php
namespace Microsoft\Azure\Management\Sql\_2015_05_01_preview;
final class VirtualNetworkRules
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Get_operation = $_client->createOperation('VirtualNetworkRules_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('VirtualNetworkRules_CreateOrUpdate');
        $this->_Delete_operation = $_client->createOperation('VirtualNetworkRules_Delete');
        $this->_ListByServer_operation = $_client->createOperation('VirtualNetworkRules_ListByServer');
    }
    /**
     * Gets a virtual network rule.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $virtualNetworkRuleName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $serverName,
        $virtualNetworkRuleName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'virtualNetworkRuleName' => $virtualNetworkRuleName
        ]);
    }
    /**
     * Creates or updates an existing virtual network rule.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $virtualNetworkRuleName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $serverName,
        $virtualNetworkRuleName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'virtualNetworkRuleName' => $virtualNetworkRuleName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Deletes the virtual network rule with the given name.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $virtualNetworkRuleName
     */
    public function delete(
        $resourceGroupName,
        $serverName,
        $virtualNetworkRuleName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'virtualNetworkRuleName' => $virtualNetworkRuleName
        ]);
    }
    /**
     * Gets a list of virtual network rules in a server.
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
    private $_Get_operation;
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
    private $_ListByServer_operation;
}
