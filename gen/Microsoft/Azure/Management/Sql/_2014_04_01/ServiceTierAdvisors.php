<?php
namespace Microsoft\Azure\Management\Sql\_2014_04_01;
final class ServiceTierAdvisors
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Get_operation = $_client->createOperation('ServiceTierAdvisors_Get');
        $this->_ListByDatabase_operation = $_client->createOperation('ServiceTierAdvisors_ListByDatabase');
    }
    /**
     * Gets a service tier advisor.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $databaseName
     * @param string $serviceTierAdvisorName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $serverName,
        $databaseName,
        $serviceTierAdvisorName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'databaseName' => $databaseName,
            'serviceTierAdvisorName' => $serviceTierAdvisorName
        ]);
    }
    /**
     * Returns service tier advisors for specified database.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $databaseName
     * @return array
     */
    public function listByDatabase(
        $resourceGroupName,
        $serverName,
        $databaseName
    )
    {
        return $this->_ListByDatabase_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'databaseName' => $databaseName
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByDatabase_operation;
}
