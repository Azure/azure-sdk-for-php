<?php
namespace Microsoft\Azure\Management\Sql\_2015_05_01_preview;
final class DatabaseRecommendedActions
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListByDatabaseAdvisor_operation = $_client->createOperation('DatabaseRecommendedActions_ListByDatabaseAdvisor');
        $this->_Get_operation = $_client->createOperation('DatabaseRecommendedActions_Get');
        $this->_Update_operation = $_client->createOperation('DatabaseRecommendedActions_Update');
    }
    /**
     * Gets list of Database Recommended Actions.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $databaseName
     * @param string $advisorName
     * @return array[]
     */
    public function listByDatabaseAdvisor(
        $resourceGroupName,
        $serverName,
        $databaseName,
        $advisorName
    )
    {
        return $this->_ListByDatabaseAdvisor_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'databaseName' => $databaseName,
            'advisorName' => $advisorName
        ]);
    }
    /**
     * Gets a database recommended action.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $databaseName
     * @param string $advisorName
     * @param string $recommendedActionName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $serverName,
        $databaseName,
        $advisorName,
        $recommendedActionName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'databaseName' => $databaseName,
            'advisorName' => $advisorName,
            'recommendedActionName' => $recommendedActionName
        ]);
    }
    /**
     * Updates a database recommended action.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $databaseName
     * @param string $advisorName
     * @param string $recommendedActionName
     * @param array $parameters
     * @return array
     */
    public function update(
        $resourceGroupName,
        $serverName,
        $databaseName,
        $advisorName,
        $recommendedActionName,
        array $parameters
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'databaseName' => $databaseName,
            'advisorName' => $advisorName,
            'recommendedActionName' => $recommendedActionName,
            'parameters' => $parameters
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByDatabaseAdvisor_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Update_operation;
}
