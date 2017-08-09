<?php
namespace Microsoft\Azure\Management\MySql;
final class Configurations
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_CreateOrUpdate_operation = $_client->createOperation('Configurations_CreateOrUpdate');
        $this->_Get_operation = $_client->createOperation('Configurations_Get');
        $this->_ListByServer_operation = $_client->createOperation('Configurations_ListByServer');
    }
    /**
     * Updates a configuration of a server.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $configurationName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $serverName,
        $configurationName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'configurationName' => $configurationName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Gets information about a configuration of server.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $configurationName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $serverName,
        $configurationName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'configurationName' => $configurationName
        ]);
    }
    /**
     * List all the configurations in a given server.
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
    private $_Get_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByServer_operation;
}
