<?php
namespace Microsoft\Azure\Management\Sql;
final class BackupLongTermRetentionVaults
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Get_operation = $_client->createOperation('BackupLongTermRetentionVaults_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('BackupLongTermRetentionVaults_CreateOrUpdate');
    }
    /**
     * Gets a server backup long term retention vault
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
     * Updates a server backup long term retention vault
     * @param string $resourceGroupName
     * @param string $serverName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $serverName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'parameters' => $parameters
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
}
