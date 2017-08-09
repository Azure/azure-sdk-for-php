<?php
namespace Microsoft\Azure\Management\Sql;
final class SyncAgents
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Get_operation = $_client->createOperation('SyncAgents_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('SyncAgents_CreateOrUpdate');
        $this->_Delete_operation = $_client->createOperation('SyncAgents_Delete');
        $this->_ListByServer_operation = $_client->createOperation('SyncAgents_ListByServer');
        $this->_GenerateKey_operation = $_client->createOperation('SyncAgents_GenerateKey');
        $this->_ListLinkedDatabases_operation = $_client->createOperation('SyncAgents_ListLinkedDatabases');
    }
    /**
     * Gets a sync agent.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $syncAgentName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $serverName,
        $syncAgentName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'syncAgentName' => $syncAgentName
        ]);
    }
    /**
     * Creates or updates a sync agent.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $syncAgentName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $serverName,
        $syncAgentName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'syncAgentName' => $syncAgentName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Deletes a sync agent.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $syncAgentName
     */
    public function delete(
        $resourceGroupName,
        $serverName,
        $syncAgentName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'syncAgentName' => $syncAgentName
        ]);
    }
    /**
     * Lists sync agents in a server.
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
     * Generates a sync agent key.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $syncAgentName
     * @return array
     */
    public function generateKey(
        $resourceGroupName,
        $serverName,
        $syncAgentName
    )
    {
        return $this->_GenerateKey_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'syncAgentName' => $syncAgentName
        ]);
    }
    /**
     * Lists databases linked to a sync agent.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $syncAgentName
     * @return array
     */
    public function listLinkedDatabases(
        $resourceGroupName,
        $serverName,
        $syncAgentName
    )
    {
        return $this->_ListLinkedDatabases_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'syncAgentName' => $syncAgentName
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
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GenerateKey_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListLinkedDatabases_operation;
}
