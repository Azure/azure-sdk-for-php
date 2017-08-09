<?php
namespace Microsoft\Azure\Management\Relay;
final class HybridConnections
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListByNamespace_operation = $_client->createOperation('HybridConnections_ListByNamespace');
        $this->_CreateOrUpdate_operation = $_client->createOperation('HybridConnections_CreateOrUpdate');
        $this->_Delete_operation = $_client->createOperation('HybridConnections_Delete');
        $this->_Get_operation = $_client->createOperation('HybridConnections_Get');
        $this->_ListAuthorizationRules_operation = $_client->createOperation('HybridConnections_ListAuthorizationRules');
        $this->_CreateOrUpdateAuthorizationRule_operation = $_client->createOperation('HybridConnections_CreateOrUpdateAuthorizationRule');
        $this->_DeleteAuthorizationRule_operation = $_client->createOperation('HybridConnections_DeleteAuthorizationRule');
        $this->_GetAuthorizationRule_operation = $_client->createOperation('HybridConnections_GetAuthorizationRule');
        $this->_ListKeys_operation = $_client->createOperation('HybridConnections_ListKeys');
        $this->_RegenerateKeys_operation = $_client->createOperation('HybridConnections_RegenerateKeys');
    }
    /**
     * Lists the HybridConnection within the namespace.
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
     * Creates or Updates a service HybridConnection. This operation is idempotent.
     * @param string $resourceGroupName
     * @param string $namespaceName
     * @param string $hybridConnectionName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $namespaceName,
        $hybridConnectionName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'namespaceName' => $namespaceName,
            'hybridConnectionName' => $hybridConnectionName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Deletes a HybridConnection .
     * @param string $resourceGroupName
     * @param string $namespaceName
     * @param string $hybridConnectionName
     */
    public function delete(
        $resourceGroupName,
        $namespaceName,
        $hybridConnectionName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'namespaceName' => $namespaceName,
            'hybridConnectionName' => $hybridConnectionName
        ]);
    }
    /**
     * Returns the description for the specified HybridConnection.
     * @param string $resourceGroupName
     * @param string $namespaceName
     * @param string $hybridConnectionName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $namespaceName,
        $hybridConnectionName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'namespaceName' => $namespaceName,
            'hybridConnectionName' => $hybridConnectionName
        ]);
    }
    /**
     * Authorization rules for a HybridConnection.
     * @param string $resourceGroupName
     * @param string $namespaceName
     * @param string $hybridConnectionName
     * @return array
     */
    public function listAuthorizationRules(
        $resourceGroupName,
        $namespaceName,
        $hybridConnectionName
    )
    {
        return $this->_ListAuthorizationRules_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'namespaceName' => $namespaceName,
            'hybridConnectionName' => $hybridConnectionName
        ]);
    }
    /**
     * Creates or Updates an authorization rule for a HybridConnection
     * @param string $resourceGroupName
     * @param string $namespaceName
     * @param string $hybridConnectionName
     * @param string $authorizationRuleName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdateAuthorizationRule(
        $resourceGroupName,
        $namespaceName,
        $hybridConnectionName,
        $authorizationRuleName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdateAuthorizationRule_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'namespaceName' => $namespaceName,
            'hybridConnectionName' => $hybridConnectionName,
            'authorizationRuleName' => $authorizationRuleName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Deletes a HybridConnection authorization rule
     * @param string $resourceGroupName
     * @param string $namespaceName
     * @param string $hybridConnectionName
     * @param string $authorizationRuleName
     */
    public function deleteAuthorizationRule(
        $resourceGroupName,
        $namespaceName,
        $hybridConnectionName,
        $authorizationRuleName
    )
    {
        return $this->_DeleteAuthorizationRule_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'namespaceName' => $namespaceName,
            'hybridConnectionName' => $hybridConnectionName,
            'authorizationRuleName' => $authorizationRuleName
        ]);
    }
    /**
     * HybridConnection authorizationRule for a HybridConnection by name.
     * @param string $resourceGroupName
     * @param string $namespaceName
     * @param string $hybridConnectionName
     * @param string $authorizationRuleName
     * @return array
     */
    public function getAuthorizationRule(
        $resourceGroupName,
        $namespaceName,
        $hybridConnectionName,
        $authorizationRuleName
    )
    {
        return $this->_GetAuthorizationRule_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'namespaceName' => $namespaceName,
            'hybridConnectionName' => $hybridConnectionName,
            'authorizationRuleName' => $authorizationRuleName
        ]);
    }
    /**
     * Primary and Secondary ConnectionStrings to the HybridConnection.
     * @param string $resourceGroupName
     * @param string $namespaceName
     * @param string $hybridConnectionName
     * @param string $authorizationRuleName
     * @return array
     */
    public function listKeys(
        $resourceGroupName,
        $namespaceName,
        $hybridConnectionName,
        $authorizationRuleName
    )
    {
        return $this->_ListKeys_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'namespaceName' => $namespaceName,
            'hybridConnectionName' => $hybridConnectionName,
            'authorizationRuleName' => $authorizationRuleName
        ]);
    }
    /**
     * Regenerates the Primary or Secondary ConnectionStrings to the HybridConnection
     * @param string $resourceGroupName
     * @param string $namespaceName
     * @param string $hybridConnectionName
     * @param string $authorizationRuleName
     * @param array $parameters
     * @return array
     */
    public function regenerateKeys(
        $resourceGroupName,
        $namespaceName,
        $hybridConnectionName,
        $authorizationRuleName,
        array $parameters
    )
    {
        return $this->_RegenerateKeys_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'namespaceName' => $namespaceName,
            'hybridConnectionName' => $hybridConnectionName,
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
