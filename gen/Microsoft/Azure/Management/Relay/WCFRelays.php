<?php
namespace Microsoft\Azure\Management\Relay;
final class WCFRelays
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListByNamespace_operation = $_client->createOperation('WCFRelays_ListByNamespace');
        $this->_CreateOrUpdate_operation = $_client->createOperation('WCFRelays_CreateOrUpdate');
        $this->_Delete_operation = $_client->createOperation('WCFRelays_Delete');
        $this->_Get_operation = $_client->createOperation('WCFRelays_Get');
        $this->_ListAuthorizationRules_operation = $_client->createOperation('WCFRelays_ListAuthorizationRules');
        $this->_CreateOrUpdateAuthorizationRule_operation = $_client->createOperation('WCFRelays_CreateOrUpdateAuthorizationRule');
        $this->_DeleteAuthorizationRule_operation = $_client->createOperation('WCFRelays_DeleteAuthorizationRule');
        $this->_GetAuthorizationRule_operation = $_client->createOperation('WCFRelays_GetAuthorizationRule');
        $this->_ListKeys_operation = $_client->createOperation('WCFRelays_ListKeys');
        $this->_RegenerateKeys_operation = $_client->createOperation('WCFRelays_RegenerateKeys');
    }
    /**
     * Lists the WCFRelays within the namespace.
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
     * Creates or Updates a WCFRelay. This operation is idempotent.
     * @param string $resourceGroupName
     * @param string $namespaceName
     * @param string $relayName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $namespaceName,
        $relayName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'namespaceName' => $namespaceName,
            'relayName' => $relayName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Deletes a WCFRelays .
     * @param string $resourceGroupName
     * @param string $namespaceName
     * @param string $relayName
     */
    public function delete(
        $resourceGroupName,
        $namespaceName,
        $relayName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'namespaceName' => $namespaceName,
            'relayName' => $relayName
        ]);
    }
    /**
     * Returns the description for the specified WCFRelays.
     * @param string $resourceGroupName
     * @param string $namespaceName
     * @param string $relayName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $namespaceName,
        $relayName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'namespaceName' => $namespaceName,
            'relayName' => $relayName
        ]);
    }
    /**
     * Authorization rules for a WCFRelays.
     * @param string $resourceGroupName
     * @param string $namespaceName
     * @param string $relayName
     * @return array
     */
    public function listAuthorizationRules(
        $resourceGroupName,
        $namespaceName,
        $relayName
    )
    {
        return $this->_ListAuthorizationRules_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'namespaceName' => $namespaceName,
            'relayName' => $relayName
        ]);
    }
    /**
     * Creates or Updates an authorization rule for a WCFRelays
     * @param string $resourceGroupName
     * @param string $namespaceName
     * @param string $relayName
     * @param string $authorizationRuleName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdateAuthorizationRule(
        $resourceGroupName,
        $namespaceName,
        $relayName,
        $authorizationRuleName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdateAuthorizationRule_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'namespaceName' => $namespaceName,
            'relayName' => $relayName,
            'authorizationRuleName' => $authorizationRuleName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Deletes a WCFRelays authorization rule
     * @param string $resourceGroupName
     * @param string $namespaceName
     * @param string $relayName
     * @param string $authorizationRuleName
     */
    public function deleteAuthorizationRule(
        $resourceGroupName,
        $namespaceName,
        $relayName,
        $authorizationRuleName
    )
    {
        return $this->_DeleteAuthorizationRule_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'namespaceName' => $namespaceName,
            'relayName' => $relayName,
            'authorizationRuleName' => $authorizationRuleName
        ]);
    }
    /**
     * Get authorizationRule for a WCFRelays by name.
     * @param string $resourceGroupName
     * @param string $namespaceName
     * @param string $relayName
     * @param string $authorizationRuleName
     * @return array
     */
    public function getAuthorizationRule(
        $resourceGroupName,
        $namespaceName,
        $relayName,
        $authorizationRuleName
    )
    {
        return $this->_GetAuthorizationRule_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'namespaceName' => $namespaceName,
            'relayName' => $relayName,
            'authorizationRuleName' => $authorizationRuleName
        ]);
    }
    /**
     * Primary and Secondary ConnectionStrings to the WCFRelays.
     * @param string $resourceGroupName
     * @param string $namespaceName
     * @param string $relayName
     * @param string $authorizationRuleName
     * @return array
     */
    public function listKeys(
        $resourceGroupName,
        $namespaceName,
        $relayName,
        $authorizationRuleName
    )
    {
        return $this->_ListKeys_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'namespaceName' => $namespaceName,
            'relayName' => $relayName,
            'authorizationRuleName' => $authorizationRuleName
        ]);
    }
    /**
     * Regenerates the Primary or Secondary ConnectionStrings to the WCFRelays
     * @param string $resourceGroupName
     * @param string $namespaceName
     * @param string $relayName
     * @param string $authorizationRuleName
     * @param array $parameters
     * @return array
     */
    public function regenerateKeys(
        $resourceGroupName,
        $namespaceName,
        $relayName,
        $authorizationRuleName,
        array $parameters
    )
    {
        return $this->_RegenerateKeys_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'namespaceName' => $namespaceName,
            'relayName' => $relayName,
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
    private $_DeleteAuthorizationRule_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetAuthorizationRule_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListKeys_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_RegenerateKeys_operation;
}
