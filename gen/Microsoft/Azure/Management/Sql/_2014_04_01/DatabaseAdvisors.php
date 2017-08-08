<?php
namespace Microsoft\Azure\Management\Sql\_2014_04_01;
final class DatabaseAdvisors
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListByDatabase_operation = $_client->createOperation('DatabaseAdvisors_ListByDatabase');
        $this->_Get_operation = $_client->createOperation('DatabaseAdvisors_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('DatabaseAdvisors_CreateOrUpdate');
    }
    /**
     * Returns a list of database advisors.
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
     * Returns details of a Database Advisor.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $databaseName
     * @param string $advisorName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $serverName,
        $databaseName,
        $advisorName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'databaseName' => $databaseName,
            'advisorName' => $advisorName
        ]);
    }
    /**
     * Creates or updates a database advisor.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $databaseName
     * @param string $advisorName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $serverName,
        $databaseName,
        $advisorName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'databaseName' => $databaseName,
            'advisorName' => $advisorName,
            'parameters' => $parameters
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByDatabase_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateOrUpdate_operation;
}
