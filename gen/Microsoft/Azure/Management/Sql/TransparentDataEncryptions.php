<?php
namespace Microsoft\Azure\Management\Sql;
final class TransparentDataEncryptions
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_CreateOrUpdate_operation = $_client->createOperation('TransparentDataEncryptions_CreateOrUpdate');
        $this->_Get_operation = $_client->createOperation('TransparentDataEncryptions_Get');
    }
    /**
     * Creates or updates a database's transparent data encryption configuration.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $databaseName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $serverName,
        $databaseName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'databaseName' => $databaseName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Gets a database's transparent data encryption configuration.
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
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateOrUpdate_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
}
