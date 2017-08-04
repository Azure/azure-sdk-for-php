<?php
namespace Microsoft\Azure\Management\CustomerInsights\_2017_04_26;
final class Relationships
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_CreateOrUpdate_operation = $_client->createOperation('Relationships_CreateOrUpdate');
        $this->_Get_operation = $_client->createOperation('Relationships_Get');
        $this->_Delete_operation = $_client->createOperation('Relationships_Delete');
        $this->_ListByHub_operation = $_client->createOperation('Relationships_ListByHub');
    }
    /**
     * Creates a relationship or updates an existing relationship within a hub.
     * @param string $resourceGroupName
     * @param string $hubName
     * @param string $relationshipName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $hubName,
        $relationshipName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'hubName' => $hubName,
            'relationshipName' => $relationshipName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Gets information about the specified relationship.
     * @param string $resourceGroupName
     * @param string $hubName
     * @param string $relationshipName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $hubName,
        $relationshipName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'hubName' => $hubName,
            'relationshipName' => $relationshipName
        ]);
    }
    /**
     * Deletes a relationship within a hub.
     * @param string $resourceGroupName
     * @param string $hubName
     * @param string $relationshipName
     */
    public function delete(
        $resourceGroupName,
        $hubName,
        $relationshipName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'hubName' => $hubName,
            'relationshipName' => $relationshipName
        ]);
    }
    /**
     * Gets all relationships in the hub.
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
