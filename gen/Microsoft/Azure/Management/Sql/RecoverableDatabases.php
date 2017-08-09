<?php
namespace Microsoft\Azure\Management\Sql;
final class RecoverableDatabases
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Get_operation = $_client->createOperation('RecoverableDatabases_Get');
        $this->_ListByServer_operation = $_client->createOperation('RecoverableDatabases_ListByServer');
    }
    /**
     * Gets a recoverable database, which is a resource representing a database's geo backup
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $databaseName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $serverName,
        $databaseName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'databaseName' => $databaseName
        ]);
    }
    /**
     * Gets a list of recoverable databases
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
    private $_ListByServer_operation;
}
