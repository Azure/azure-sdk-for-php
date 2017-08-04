<?php
namespace Microsoft\Azure\Management\NotificationHubs\_2017_04_01;
final class NotificationHubs
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_CheckAvailability_operation = $_client->createOperation('NotificationHubs_CheckAvailability');
        $this->_CreateOrUpdate_operation = $_client->createOperation('NotificationHubs_CreateOrUpdate');
        $this->_Delete_operation = $_client->createOperation('NotificationHubs_Delete');
        $this->_Get_operation = $_client->createOperation('NotificationHubs_Get');
        $this->_CreateOrUpdateAuthorizationRule_operation = $_client->createOperation('NotificationHubs_CreateOrUpdateAuthorizationRule');
        $this->_DeleteAuthorizationRule_operation = $_client->createOperation('NotificationHubs_DeleteAuthorizationRule');
        $this->_GetAuthorizationRule_operation = $_client->createOperation('NotificationHubs_GetAuthorizationRule');
        $this->_List_operation = $_client->createOperation('NotificationHubs_List');
        $this->_ListAuthorizationRules_operation = $_client->createOperation('NotificationHubs_ListAuthorizationRules');
        $this->_ListKeys_operation = $_client->createOperation('NotificationHubs_ListKeys');
        $this->_RegenerateKeys_operation = $_client->createOperation('NotificationHubs_RegenerateKeys');
        $this->_GetPnsCredentials_operation = $_client->createOperation('NotificationHubs_GetPnsCredentials');
    }
    /**
     * Checks the availability of the given notificationHub in a namespace.
     * @param string $resourceGroupName
     * @param string $namespaceName
     * @param array $parameters
     * @return array
     */
    public function checkAvailability(
        $resourceGroupName,
        $namespaceName,
        array $parameters
    )
    {
        return $this->_CheckAvailability_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'namespaceName' => $namespaceName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Creates/Update a NotificationHub in a namespace.
     * @param string $resourceGroupName
     * @param string $namespaceName
     * @param string $notificationHubName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $namespaceName,
        $notificationHubName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'namespaceName' => $namespaceName,
            'notificationHubName' => $notificationHubName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Deletes a notification hub associated with a namespace.
     * @param string $resourceGroupName
     * @param string $namespaceName
     * @param string $notificationHubName
     */
    public function delete(
        $resourceGroupName,
        $namespaceName,
        $notificationHubName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'namespaceName' => $namespaceName,
            'notificationHubName' => $notificationHubName
        ]);
    }
    /**
     * Lists the notification hubs associated with a namespace.
     * @param string $resourceGroupName
     * @param string $namespaceName
     * @param string $notificationHubName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $namespaceName,
        $notificationHubName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'namespaceName' => $namespaceName,
            'notificationHubName' => $notificationHubName
        ]);
    }
    /**
     * Creates/Updates an authorization rule for a NotificationHub
     * @param string $resourceGroupName
     * @param string $namespaceName
     * @param string $notificationHubName
     * @param string $authorizationRuleName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdateAuthorizationRule(
        $resourceGroupName,
        $namespaceName,
        $notificationHubName,
        $authorizationRuleName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdateAuthorizationRule_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'namespaceName' => $namespaceName,
            'notificationHubName' => $notificationHubName,
            'authorizationRuleName' => $authorizationRuleName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Deletes a notificationHub authorization rule
     * @param string $resourceGroupName
     * @param string $namespaceName
     * @param string $notificationHubName
     * @param string $authorizationRuleName
     */
    public function deleteAuthorizationRule(
        $resourceGroupName,
        $namespaceName,
        $notificationHubName,
        $authorizationRuleName
    )
    {
        return $this->_DeleteAuthorizationRule_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'namespaceName' => $namespaceName,
            'notificationHubName' => $notificationHubName,
            'authorizationRuleName' => $authorizationRuleName
        ]);
    }
    /**
     * Gets an authorization rule for a NotificationHub by name.
     * @param string $resourceGroupName
     * @param string $namespaceName
     * @param string $notificationHubName
     * @param string $authorizationRuleName
     * @return array
     */
    public function getAuthorizationRule(
        $resourceGroupName,
        $namespaceName,
        $notificationHubName,
        $authorizationRuleName
    )
    {
        return $this->_GetAuthorizationRule_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'namespaceName' => $namespaceName,
            'notificationHubName' => $notificationHubName,
            'authorizationRuleName' => $authorizationRuleName
        ]);
    }
    /**
     * Lists the notification hubs associated with a namespace.
     * @param string $resourceGroupName
     * @param string $namespaceName
     * @return array
     */
    public function list_(
        $resourceGroupName,
        $namespaceName
    )
    {
        return $this->_List_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'namespaceName' => $namespaceName
        ]);
    }
    /**
     * Gets the authorization rules for a NotificationHub.
     * @param string $resourceGroupName
     * @param string $namespaceName
     * @param string $notificationHubName
     * @return array
     */
    public function listAuthorizationRules(
        $resourceGroupName,
        $namespaceName,
        $notificationHubName
    )
    {
        return $this->_ListAuthorizationRules_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'namespaceName' => $namespaceName,
            'notificationHubName' => $notificationHubName
        ]);
    }
    /**
     * Gets the Primary and Secondary ConnectionStrings to the NotificationHub
     * @param string $resourceGroupName
     * @param string $namespaceName
     * @param string $notificationHubName
     * @param string $authorizationRuleName
     * @return array
     */
    public function listKeys(
        $resourceGroupName,
        $namespaceName,
        $notificationHubName,
        $authorizationRuleName
    )
    {
        return $this->_ListKeys_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'namespaceName' => $namespaceName,
            'notificationHubName' => $notificationHubName,
            'authorizationRuleName' => $authorizationRuleName
        ]);
    }
    /**
     * Regenerates the Primary/Secondary Keys to the NotificationHub Authorization Rule
     * @param string $resourceGroupName
     * @param string $namespaceName
     * @param string $notificationHubName
     * @param string $authorizationRuleName
     * @param array $parameters
     * @return array
     */
    public function regenerateKeys(
        $resourceGroupName,
        $namespaceName,
        $notificationHubName,
        $authorizationRuleName,
        array $parameters
    )
    {
        return $this->_RegenerateKeys_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'namespaceName' => $namespaceName,
            'notificationHubName' => $notificationHubName,
            'authorizationRuleName' => $authorizationRuleName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Lists the PNS Credentials associated with a notification hub .
     * @param string $resourceGroupName
     * @param string $namespaceName
     * @param string $notificationHubName
     * @return array
     */
    public function getPnsCredentials(
        $resourceGroupName,
        $namespaceName,
        $notificationHubName
    )
    {
        return $this->_GetPnsCredentials_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'namespaceName' => $namespaceName,
            'notificationHubName' => $notificationHubName
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CheckAvailability_operation;
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
    private $_CreateOrUpdateAuthorizationRule_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_DeleteAuthorizationRule_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetAuthorizationRule_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListAuthorizationRules_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListKeys_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_RegenerateKeys_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetPnsCredentials_operation;
}
