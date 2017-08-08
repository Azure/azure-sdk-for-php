<?php
namespace Microsoft\Azure\Management\Sql\_2015_05_01_preview;
final class ServerKeys
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListByServer_operation = $_client->createOperation('ServerKeys_ListByServer');
        $this->_Get_operation = $_client->createOperation('ServerKeys_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('ServerKeys_CreateOrUpdate');
        $this->_Delete_operation = $_client->createOperation('ServerKeys_Delete');
    }
    /**
     * Gets a list of server keys.
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
     * Gets a server key.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $keyName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $serverName,
        $keyName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'keyName' => $keyName
        ]);
    }
    /**
     * Creates or updates a server key.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $keyName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $serverName,
        $keyName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'keyName' => $keyName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Deletes the server key with the given name.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $keyName
     */
    public function delete(
        $resourceGroupName,
        $serverName,
        $keyName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'keyName' => $keyName
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByServer_operation;
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
}
