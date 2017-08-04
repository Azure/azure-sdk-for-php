<?php
namespace Microsoft\Azure\Management\CustomerInsights\_2017_04_26;
final class ConnectorMappings
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_CreateOrUpdate_operation = $_client->createOperation('ConnectorMappings_CreateOrUpdate');
        $this->_Get_operation = $_client->createOperation('ConnectorMappings_Get');
        $this->_Delete_operation = $_client->createOperation('ConnectorMappings_Delete');
        $this->_ListByConnector_operation = $_client->createOperation('ConnectorMappings_ListByConnector');
    }
    /**
     * Creates a connector mapping or updates an existing connector mapping in the connector.
     * @param string $resourceGroupName
     * @param string $hubName
     * @param string $connectorName
     * @param string $mappingName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $hubName,
        $connectorName,
        $mappingName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'hubName' => $hubName,
            'connectorName' => $connectorName,
            'mappingName' => $mappingName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Gets a connector mapping in the connector.
     * @param string $resourceGroupName
     * @param string $hubName
     * @param string $connectorName
     * @param string $mappingName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $hubName,
        $connectorName,
        $mappingName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'hubName' => $hubName,
            'connectorName' => $connectorName,
            'mappingName' => $mappingName
        ]);
    }
    /**
     * Deletes a connector mapping in the connector.
     * @param string $resourceGroupName
     * @param string $hubName
     * @param string $connectorName
     * @param string $mappingName
     */
    public function delete(
        $resourceGroupName,
        $hubName,
        $connectorName,
        $mappingName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'hubName' => $hubName,
            'connectorName' => $connectorName,
            'mappingName' => $mappingName
        ]);
    }
    /**
     * Gets all the connector mappings in the specified connector.
     * @param string $resourceGroupName
     * @param string $hubName
     * @param string $connectorName
     * @return array
     */
    public function listByConnector(
        $resourceGroupName,
        $hubName,
        $connectorName
    )
    {
        return $this->_ListByConnector_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'hubName' => $hubName,
            'connectorName' => $connectorName
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
    private $_Delete_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByConnector_operation;
}
