<?php
namespace Microsoft\Azure\Management\Sql;
final class DataMaskingRules
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_CreateOrUpdate_operation = $_client->createOperation('DataMaskingRules_CreateOrUpdate');
        $this->_ListByDatabase_operation = $_client->createOperation('DataMaskingRules_ListByDatabase');
    }
    /**
     * Creates or updates a database data masking rule.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $databaseName
     * @param string $dataMaskingRuleName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $serverName,
        $databaseName,
        $dataMaskingRuleName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'databaseName' => $databaseName,
            'dataMaskingRuleName' => $dataMaskingRuleName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Gets a list of database data masking rules.
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
    private $_CreateOrUpdate_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByDatabase_operation;
}
