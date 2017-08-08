<?php
namespace Microsoft\Azure\Management\Sql\_2015_05_01_preview;
final class DatabaseAdvisors
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListByDatabase_operation = $_client->createOperation('DatabaseAdvisors_ListByDatabase');
        $this->_Get_operation = $_client->createOperation('DatabaseAdvisors_Get');
        $this->_Update_operation = $_client->createOperation('DatabaseAdvisors_Update');
    }
    /**
     * Gets a list of database advisors.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $databaseName
     * @return array[]
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
     * Gets a database advisor.
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
     * Updates a database advisor.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $databaseName
     * @param string $advisorName
     * @param array $parameters
     * @return array
     */
    public function update(
        $resourceGroupName,
        $serverName,
        $databaseName,
        $advisorName,
        array $parameters
    )
    {
        return $this->_Update_operation->call([
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
    private $_Update_operation;
}
