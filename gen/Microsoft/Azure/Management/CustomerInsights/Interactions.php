<?php
namespace Microsoft\Azure\Management\CustomerInsights;
final class Interactions
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_CreateOrUpdate_operation = $_client->createOperation('Interactions_CreateOrUpdate');
        $this->_Get_operation = $_client->createOperation('Interactions_Get');
        $this->_ListByHub_operation = $_client->createOperation('Interactions_ListByHub');
        $this->_SuggestRelationshipLinks_operation = $_client->createOperation('Interactions_SuggestRelationshipLinks');
    }
    /**
     * Creates an interaction or updates an existing interaction within a hub.
     * @param string $resourceGroupName
     * @param string $hubName
     * @param string $interactionName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $hubName,
        $interactionName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'hubName' => $hubName,
            'interactionName' => $interactionName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Gets information about the specified interaction.
     * @param string $resourceGroupName
     * @param string $hubName
     * @param string $interactionName
     * @param string|null $locale_code
     * @return array
     */
    public function get(
        $resourceGroupName,
        $hubName,
        $interactionName,
        $locale_code = null
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'hubName' => $hubName,
            'interactionName' => $interactionName,
            'locale-code' => $locale_code
        ]);
    }
    /**
     * Gets all interactions in the hub.
     * @param string $resourceGroupName
     * @param string $hubName
     * @param string|null $locale_code
     * @return array
     */
    public function listByHub(
        $resourceGroupName,
        $hubName,
        $locale_code = null
    )
    {
        return $this->_ListByHub_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'hubName' => $hubName,
            'locale-code' => $locale_code
        ]);
    }
    /**
     * Suggests relationships to create relationship links.
     * @param string $resourceGroupName
     * @param string $hubName
     * @param string $interactionName
     * @return array
     */
    public function suggestRelationshipLinks(
        $resourceGroupName,
        $hubName,
        $interactionName
    )
    {
        return $this->_SuggestRelationshipLinks_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'hubName' => $hubName,
            'interactionName' => $interactionName
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
    private $_ListByHub_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_SuggestRelationshipLinks_operation;
}
