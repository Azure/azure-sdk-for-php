<?php
namespace Microsoft\Azure\Management\CustomerInsights;
final class Connectors
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_CreateOrUpdate_operation = $_client->createOperation('Connectors_CreateOrUpdate');
        $this->_Get_operation = $_client->createOperation('Connectors_Get');
        $this->_Delete_operation = $_client->createOperation('Connectors_Delete');
        $this->_ListByHub_operation = $_client->createOperation('Connectors_ListByHub');
    }
    /**
     * Creates a connector or updates an existing connector in the hub.
     * @param string $resourceGroupName
     * @param string $hubName
     * @param string $connectorName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $hubName,
        $connectorName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'hubName' => $hubName,
            'connectorName' => $connectorName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Gets a connector in the hub.
     * @param string $resourceGroupName
     * @param string $hubName
     * @param string $connectorName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $hubName,
        $connectorName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'hubName' => $hubName,
            'connectorName' => $connectorName
        ]);
    }
    /**
     * Deletes a connector in the hub.
     * @param string $resourceGroupName
     * @param string $hubName
     * @param string $connectorName
     */
    public function delete(
        $resourceGroupName,
        $hubName,
        $connectorName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'hubName' => $hubName,
            'connectorName' => $connectorName
        ]);
    }
    /**
     * Gets all the connectors in the specified hub.
     * @param string $resourceGroupName
     * @param string $hubName
     * @return array
     */
    public function listByHub(
        $resourceGroupName,
        $hubName
    )
    {
        return $this->_ListByHub_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'hubName' => $hubName
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
    private $_ListByHub_operation;
}
