<?php
namespace Microsoft\Azure\Management\Sql;
final class ServerAzureADAdministrators
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_CreateOrUpdate_operation = $_client->createOperation('ServerAzureADAdministrators_CreateOrUpdate');
        $this->_Delete_operation = $_client->createOperation('ServerAzureADAdministrators_Delete');
        $this->_Get_operation = $_client->createOperation('ServerAzureADAdministrators_Get');
        $this->_ListByServer_operation = $_client->createOperation('ServerAzureADAdministrators_ListByServer');
    }
    /**
     * Creates a new Server Active Directory Administrator or updates an existing server Active Directory Administrator.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param array $properties
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $serverName,
        array $properties
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'properties' => $properties
        ]);
    }
    /**
     * Deletes an existing server Active Directory Administrator.
     * @param string $resourceGroupName
     * @param string $serverName
     * @return array
     */
    public function delete(
        $resourceGroupName,
        $serverName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName
        ]);
    }
    /**
     * Returns an server Administrator.
     * @param string $resourceGroupName
     * @param string $serverName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $serverName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName
        ]);
    }
    /**
     * Returns a list of server Administrators.
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
