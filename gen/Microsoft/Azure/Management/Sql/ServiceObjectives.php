<?php
namespace Microsoft\Azure\Management\Sql;
final class ServiceObjectives
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Get_operation = $_client->createOperation('ServiceObjectives_Get');
        $this->_ListByServer_operation = $_client->createOperation('ServiceObjectives_ListByServer');
    }
    /**
     * Gets a database service objective.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $serviceObjectiveName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $serverName,
        $serviceObjectiveName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'serviceObjectiveName' => $serviceObjectiveName
        ]);
    }
    /**
     * Returns database service objectives.
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
