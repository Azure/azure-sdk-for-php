<?php
namespace Microsoft\Azure\Management\Sql;
final class RestorableDroppedDatabases
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Get_operation = $_client->createOperation('RestorableDroppedDatabases_Get');
        $this->_ListByServer_operation = $_client->createOperation('RestorableDroppedDatabases_ListByServer');
    }
    /**
     * Gets a deleted database that can be restored
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $restorableDroppededDatabaseId
     * @return array
     */
    public function get(
        $resourceGroupName,
        $serverName,
        $restorableDroppededDatabaseId
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'restorableDroppededDatabaseId' => $restorableDroppededDatabaseId
        ]);
    }
    /**
     * Gets a list of deleted databases that can be restored
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
