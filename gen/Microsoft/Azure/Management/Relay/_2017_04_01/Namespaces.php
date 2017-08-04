<?php
namespace Microsoft\Azure\Management\Relay\_2017_04_01;
final class Namespaces
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_CheckNameAvailabilityMethod_operation = $_client->createOperation('Namespaces_CheckNameAvailability');
        $this->_List_operation = $_client->createOperation('Namespaces_List');
        $this->_ListByResourceGroup_operation = $_client->createOperation('Namespaces_ListByResourceGroup');
        $this->_CreateOrUpdate_operation = $_client->createOperation('Namespaces_CreateOrUpdate');
        $this->_Delete_operation = $_client->createOperation('Namespaces_Delete');
        $this->_Get_operation = $_client->createOperation('Namespaces_Get');
        $this->_Update_operation = $_client->createOperation('Namespaces_Update');
        $this->_ListAuthorizationRules_operation = $_client->createOperation('Namespaces_ListAuthorizationRules');
        $this->_CreateOrUpdateAuthorizationRule_operation = $_client->createOperation('Namespaces_CreateOrUpdateAuthorizationRule');
        $this->_DeleteAuthorizationRule_operation = $_client->createOperation('Namespaces_DeleteAuthorizationRule');
        $this->_GetAuthorizationRule_operation = $_client->createOperation('Namespaces_GetAuthorizationRule');
        $this->_ListKeys_operation = $_client->createOperation('Namespaces_ListKeys');
        $this->_RegenerateKeys_operation = $_client->createOperation('Namespaces_RegenerateKeys');
    }
    /**
     * Check the give namespace name availability.
     * @param array $parameters
     * @return array
     */
    public function checkNameAvailabilityMethod(array $parameters)
    {
        return $this->_CheckNameAvailabilityMethod_operation->call(['parameters' => $parameters]);
    }
    /**
     * Lists all the available namespaces within the subscription irrespective of the resourceGroups.
     * @return array
     */
    public function list_()
    {
        return $this->_List_operation->call([]);
    }
    /**
     * Lists all the available namespaces within the ResourceGroup.
     * @param string $resourceGroupName
     * @return array
     */
    public function listByResourceGroup($resourceGroupName)
    {
        return $this->_ListByResourceGroup_operation->call(['resourceGroupName' => $resourceGroupName]);
    }
    /**
     * Create Azure Relay namespace.
     * @param string $resourceGroupName
     * @param string $namespaceName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $namespaceName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'namespaceName' => $namespaceName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Deletes an existing namespace. This operation also removes all associated resources under the namespace.
     * @param string $resourceGroupName
     * @param string $namespaceName
     */
    public function delete(
        $resourceGroupName,
        $namespaceName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'namespaceName' => $namespaceName
        ]);
    }
    /**
     * Returns the description for the specified namespace.
     * @param string $resourceGroupName
     * @param string $namespaceName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $namespaceName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'namespaceName' => $namespaceName
        ]);
    }
    /**
     * Creates or updates a namespace. Once created, this namespace's resource manifest is immutable. This operation is idempotent.
     * @param string $resourceGroupName
     * @param string $namespaceName
     * @param array $parameters
     * @return array
     */
    public function update(
        $resourceGroupName,
        $namespaceName,
        array $parameters
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'namespaceName' => $namespaceName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Authorization rules for a namespace.
     * @param string $resourceGroupName
     * @param string $namespaceName
     * @return array
     */
    public function listAuthorizationRules(
        $resourceGroupName,
        $namespaceName
    )
    {
        return $this->_ListAuthorizationRules_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'namespaceName' => $namespaceName
        ]);
    }
    /**
     * Creates or Updates an authorization rule for a namespace
     * @param string $resourceGroupName
     * @param string $namespaceName
     * @param string $authorizationRuleName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdateAuthorizationRule(
        $resourceGroupName,
        $namespaceName,
        $authorizationRuleName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdateAuthorizationRule_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'namespaceName' => $namespaceName,
            'authorizationRuleName' => $authorizationRuleName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Deletes a namespace authorization rule
     * @param string $resourceGroupName
     * @param string $namespaceName
     * @param string $authorizationRuleName
     */
    public function deleteAuthorizationRule(
        $resourceGroupName,
        $namespaceName,
        $authorizationRuleName
    )
    {
        return $this->_DeleteAuthorizationRule_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'namespaceName' => $namespaceName,
            'authorizationRuleName' => $authorizationRuleName
        ]);
    }
    /**
     * Authorization rule for a namespace by name.
     * @param string $resourceGroupName
     * @param string $namespaceName
     * @param string $authorizationRuleName
     * @return array
     */
    public function getAuthorizationRule(
        $resourceGroupName,
        $namespaceName,
        $authorizationRuleName
    )
    {
        return $this->_GetAuthorizationRule_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'namespaceName' => $namespaceName,
            'authorizationRuleName' => $authorizationRuleName
        ]);
    }
    /**
     * Primary and Secondary ConnectionStrings to the namespace
     * @param string $resourceGroupName
     * @param string $namespaceName
     * @param string $authorizationRuleName
     * @return array
     */
    public function listKeys(
        $resourceGroupName,
        $namespaceName,
        $authorizationRuleName
    )
    {
        return $this->_ListKeys_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'namespaceName' => $namespaceName,
            'authorizationRuleName' => $authorizationRuleName
        ]);
    }
    /**
     * Regenerates the Primary or Secondary ConnectionStrings to the namespace
     * @param string $resourceGroupName
     * @param string $namespaceName
     * @param string $authorizationRuleName
     * @param array $parameters
     * @return array
     */
    public function regenerateKeys(
        $resourceGroupName,
        $namespaceName,
        $authorizationRuleName,
        array $parameters
    )
    {
        return $this->_RegenerateKeys_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'namespaceName' => $namespaceName,
            'authorizationRuleName' => $authorizationRuleName,
            'parameters' => $parameters
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CheckNameAvailabilityMethod_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByResourceGroup_operation;
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
    private $_Update_operation;
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
