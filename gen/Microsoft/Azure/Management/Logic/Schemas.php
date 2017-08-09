<?php
namespace Microsoft\Azure\Management\Logic;
final class Schemas
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListByIntegrationAccounts_operation = $_client->createOperation('Schemas_ListByIntegrationAccounts');
        $this->_Get_operation = $_client->createOperation('Schemas_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('Schemas_CreateOrUpdate');
        $this->_Delete_operation = $_client->createOperation('Schemas_Delete');
    }
    /**
     * Gets a list of integration account schemas.
     * @param string $resourceGroupName
     * @param string $integrationAccountName
     * @param integer $_top
     * @param string $_filter
     * @return array
     */
    public function listByIntegrationAccounts(
        $resourceGroupName,
        $integrationAccountName,
        $_top,
        $_filter
    )
    {
        return $this->_ListByIntegrationAccounts_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'integrationAccountName' => $integrationAccountName,
            '$top' => $_top,
            '$filter' => $_filter
        ]);
    }
    /**
     * Gets an integration account schema.
     * @param string $resourceGroupName
     * @param string $integrationAccountName
     * @param string $schemaName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $integrationAccountName,
        $schemaName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'integrationAccountName' => $integrationAccountName,
            'schemaName' => $schemaName
        ]);
    }
    /**
     * Creates or updates an integration account schema.
     * @param string $resourceGroupName
     * @param string $integrationAccountName
     * @param string $schemaName
     * @param array $schema
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $integrationAccountName,
        $schemaName,
        array $schema
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'integrationAccountName' => $integrationAccountName,
            'schemaName' => $schemaName,
            'schema' => $schema
        ]);
    }
    /**
     * Deletes an integration account schema.
     * @param string $resourceGroupName
     * @param string $integrationAccountName
     * @param string $schemaName
     */
    public function delete(
        $resourceGroupName,
        $integrationAccountName,
        $schemaName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'integrationAccountName' => $integrationAccountName,
            'schemaName' => $schemaName
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByIntegrationAccounts_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateOrUpdate_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Delete_operation;
}
