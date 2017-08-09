<?php
namespace Microsoft\Azure\Management\EventHub;
final class EventHubs
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListByNamespace_operation = $_client->createOperation('EventHubs_ListByNamespace');
        $this->_CreateOrUpdate_operation = $_client->createOperation('EventHubs_CreateOrUpdate');
        $this->_Delete_operation = $_client->createOperation('EventHubs_Delete');
        $this->_Get_operation = $_client->createOperation('EventHubs_Get');
        $this->_ListAuthorizationRules_operation = $_client->createOperation('EventHubs_ListAuthorizationRules');
        $this->_CreateOrUpdateAuthorizationRule_operation = $_client->createOperation('EventHubs_CreateOrUpdateAuthorizationRule');
        $this->_GetAuthorizationRule_operation = $_client->createOperation('EventHubs_GetAuthorizationRule');
        $this->_DeleteAuthorizationRule_operation = $_client->createOperation('EventHubs_DeleteAuthorizationRule');
        $this->_ListKeys_operation = $_client->createOperation('EventHubs_ListKeys');
        $this->_RegenerateKeys_operation = $_client->createOperation('EventHubs_RegenerateKeys');
    }
    /**
     * Gets all the Event Hubs in a Namespace.
     * @param string $resourceGroupName
     * @param string $namespaceName
     * @return array
     */
    public function listByNamespace(
        $resourceGroupName,
        $namespaceName
    )
    {
        return $this->_ListByNamespace_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'namespaceName' => $namespaceName
        ]);
    }
    /**
     * Creates or updates a new Event Hub as a nested resource within a Namespace.
     * @param string $resourceGroupName
     * @param string $namespaceName
     * @param string $eventHubName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $namespaceName,
        $eventHubName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'namespaceName' => $namespaceName,
            'eventHubName' => $eventHubName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Deletes an Event Hub from the specified Namespace and resource group.
     * @param string $resourceGroupName
     * @param string $namespaceName
     * @param string $eventHubName
     */
    public function delete(
        $resourceGroupName,
        $namespaceName,
        $eventHubName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'namespaceName' => $namespaceName,
            'eventHubName' => $eventHubName
        ]);
    }
    /**
     * Gets an Event Hubs description for the specified Event Hub.
     * @param string $resourceGroupName
     * @param string $namespaceName
     * @param string $eventHubName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $namespaceName,
        $eventHubName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'namespaceName' => $namespaceName,
            'eventHubName' => $eventHubName
        ]);
    }
    /**
     * Gets the authorization rules for an Event Hub.
     * @param string $resourceGroupName
     * @param string $namespaceName
     * @param string $eventHubName
     * @return array
     */
    public function listAuthorizationRules(
        $resourceGroupName,
        $namespaceName,
        $eventHubName
    )
    {
        return $this->_ListAuthorizationRules_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'namespaceName' => $namespaceName,
            'eventHubName' => $eventHubName
        ]);
    }
    /**
     * Creates or updates an AuthorizationRule for the specified Event Hub.
     * @param string $resourceGroupName
     * @param string $namespaceName
     * @param string $eventHubName
     * @param string $authorizationRuleName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdateAuthorizationRule(
        $resourceGroupName,
        $namespaceName,
        $eventHubName,
        $authorizationRuleName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdateAuthorizationRule_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'namespaceName' => $namespaceName,
            'eventHubName' => $eventHubName,
            'authorizationRuleName' => $authorizationRuleName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Gets an AuthorizationRule for an Event Hub by rule name.
     * @param string $resourceGroupName
     * @param string $namespaceName
     * @param string $eventHubName
     * @param string $authorizationRuleName
     * @return array
     */
    public function getAuthorizationRule(
        $resourceGroupName,
        $namespaceName,
        $eventHubName,
        $authorizationRuleName
    )
    {
        return $this->_GetAuthorizationRule_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'namespaceName' => $namespaceName,
            'eventHubName' => $eventHubName,
            'authorizationRuleName' => $authorizationRuleName
        ]);
    }
    /**
     * Deletes an Event Hub AuthorizationRule.
     * @param string $resourceGroupName
     * @param string $namespaceName
     * @param string $eventHubName
     * @param string $authorizationRuleName
     */
    public function deleteAuthorizationRule(
        $resourceGroupName,
        $namespaceName,
        $eventHubName,
        $authorizationRuleName
    )
    {
        return $this->_DeleteAuthorizationRule_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'namespaceName' => $namespaceName,
            'eventHubName' => $eventHubName,
            'authorizationRuleName' => $authorizationRuleName
        ]);
    }
    /**
     * Gets the ACS and SAS connection strings for the Event Hub.
     * @param string $resourceGroupName
     * @param string $namespaceName
     * @param string $eventHubName
     * @param string $authorizationRuleName
     * @return array
     */
    public function listKeys(
        $resourceGroupName,
        $namespaceName,
        $eventHubName,
        $authorizationRuleName
    )
    {
        return $this->_ListKeys_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'namespaceName' => $namespaceName,
            'eventHubName' => $eventHubName,
            'authorizationRuleName' => $authorizationRuleName
        ]);
    }
    /**
     * Regenerates the ACS and SAS connection strings for the Event Hub.
     * @param string $resourceGroupName
     * @param string $namespaceName
     * @param string $eventHubName
     * @param string $authorizationRuleName
     * @param array $parameters
     * @return array
     */
    public function regenerateKeys(
        $resourceGroupName,
        $namespaceName,
        $eventHubName,
        $authorizationRuleName,
        array $parameters
    )
    {
        return $this->_RegenerateKeys_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'namespaceName' => $namespaceName,
            'eventHubName' => $eventHubName,
            'authorizationRuleName' => $authorizationRuleName,
            'parameters' => $parameters
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByNamespace_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateOrUpdate_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Delete_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListAuthorizationRules_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateOrUpdateAuthorizationRule_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetAuthorizationRule_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_DeleteAuthorizationRule_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListKeys_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_RegenerateKeys_operation;
}
