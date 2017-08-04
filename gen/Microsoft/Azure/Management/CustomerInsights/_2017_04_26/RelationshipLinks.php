<?php
namespace Microsoft\Azure\Management\CustomerInsights\_2017_04_26;
final class RelationshipLinks
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_CreateOrUpdate_operation = $_client->createOperation('RelationshipLinks_CreateOrUpdate');
        $this->_Get_operation = $_client->createOperation('RelationshipLinks_Get');
        $this->_Delete_operation = $_client->createOperation('RelationshipLinks_Delete');
        $this->_ListByHub_operation = $_client->createOperation('RelationshipLinks_ListByHub');
    }
    /**
     * Creates a relationship link or updates an existing relationship link within a hub.
     * @param string $resourceGroupName
     * @param string $hubName
     * @param string $relationshipLinkName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $hubName,
        $relationshipLinkName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'hubName' => $hubName,
            'relationshipLinkName' => $relationshipLinkName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Gets information about the specified relationship Link.
     * @param string $resourceGroupName
     * @param string $hubName
     * @param string $relationshipLinkName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $hubName,
        $relationshipLinkName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'hubName' => $hubName,
            'relationshipLinkName' => $relationshipLinkName
        ]);
    }
    /**
     * Deletes a relationship link within a hub.
     * @param string $resourceGroupName
     * @param string $hubName
     * @param string $relationshipLinkName
     */
    public function delete(
        $resourceGroupName,
        $hubName,
        $relationshipLinkName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'hubName' => $hubName,
            'relationshipLinkName' => $relationshipLinkName
        ]);
    }
    /**
     * Gets all relationship links in the hub.
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
