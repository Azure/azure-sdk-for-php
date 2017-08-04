<?php
namespace Microsoft\Azure\Management\ServiceBus\_2017_04_01;
final class Topics
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListByNamespace_operation = $_client->createOperation('Topics_ListByNamespace');
        $this->_CreateOrUpdate_operation = $_client->createOperation('Topics_CreateOrUpdate');
        $this->_Delete_operation = $_client->createOperation('Topics_Delete');
        $this->_Get_operation = $_client->createOperation('Topics_Get');
        $this->_ListAuthorizationRules_operation = $_client->createOperation('Topics_ListAuthorizationRules');
        $this->_CreateOrUpdateAuthorizationRule_operation = $_client->createOperation('Topics_CreateOrUpdateAuthorizationRule');
        $this->_GetAuthorizationRule_operation = $_client->createOperation('Topics_GetAuthorizationRule');
        $this->_DeleteAuthorizationRule_operation = $_client->createOperation('Topics_DeleteAuthorizationRule');
        $this->_ListKeys_operation = $_client->createOperation('Topics_ListKeys');
        $this->_RegenerateKeys_operation = $_client->createOperation('Topics_RegenerateKeys');
    }
    /**
     * Gets all the topics in a namespace.
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
     * Creates a topic in the specified namespace.
     * @param string $resourceGroupName
     * @param string $namespaceName
     * @param string $topicName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $namespaceName,
        $topicName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'namespaceName' => $namespaceName,
            'topicName' => $topicName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Deletes a topic from the specified namespace and resource group.
     * @param string $resourceGroupName
     * @param string $namespaceName
     * @param string $topicName
     */
    public function delete(
        $resourceGroupName,
        $namespaceName,
        $topicName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'namespaceName' => $namespaceName,
            'topicName' => $topicName
        ]);
    }
    /**
     * Returns a description for the specified topic.
     * @param string $resourceGroupName
     * @param string $namespaceName
     * @param string $topicName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $namespaceName,
        $topicName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'namespaceName' => $namespaceName,
            'topicName' => $topicName
        ]);
    }
    /**
     * Gets authorization rules for a topic.
     * @param string $resourceGroupName
     * @param string $namespaceName
     * @param string $topicName
     * @return array
     */
    public function listAuthorizationRules(
        $resourceGroupName,
        $namespaceName,
        $topicName
    )
    {
        return $this->_ListAuthorizationRules_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'namespaceName' => $namespaceName,
            'topicName' => $topicName
        ]);
    }
    /**
     * Creates an authorizatio rule for the specified topic.
     * @param string $resourceGroupName
     * @param string $namespaceName
     * @param string $topicName
     * @param string $authorizationRuleName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdateAuthorizationRule(
        $resourceGroupName,
        $namespaceName,
        $topicName,
        $authorizationRuleName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdateAuthorizationRule_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'namespaceName' => $namespaceName,
            'topicName' => $topicName,
            'authorizationRuleName' => $authorizationRuleName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Returns the specified authorization rule.
     * @param string $resourceGroupName
     * @param string $namespaceName
     * @param string $topicName
     * @param string $authorizationRuleName
     * @return array
     */
    public function getAuthorizationRule(
        $resourceGroupName,
        $namespaceName,
        $topicName,
        $authorizationRuleName
    )
    {
        return $this->_GetAuthorizationRule_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'namespaceName' => $namespaceName,
            'topicName' => $topicName,
            'authorizationRuleName' => $authorizationRuleName
        ]);
    }
    /**
     * Deletes a topic authorization rule.
     * @param string $resourceGroupName
     * @param string $namespaceName
     * @param string $topicName
     * @param string $authorizationRuleName
     */
    public function deleteAuthorizationRule(
        $resourceGroupName,
        $namespaceName,
        $topicName,
        $authorizationRuleName
    )
    {
        return $this->_DeleteAuthorizationRule_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'namespaceName' => $namespaceName,
            'topicName' => $topicName,
            'authorizationRuleName' => $authorizationRuleName
        ]);
    }
    /**
     * Gets the primary and secondary connection strings for the topic.
     * @param string $resourceGroupName
     * @param string $namespaceName
     * @param string $topicName
     * @param string $authorizationRuleName
     * @return array
     */
    public function listKeys(
        $resourceGroupName,
        $namespaceName,
        $topicName,
        $authorizationRuleName
    )
    {
        return $this->_ListKeys_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'namespaceName' => $namespaceName,
            'topicName' => $topicName,
            'authorizationRuleName' => $authorizationRuleName
        ]);
    }
    /**
     * Regenerates primary or secondary connection strings for the topic.
     * @param string $resourceGroupName
     * @param string $namespaceName
     * @param string $topicName
     * @param string $authorizationRuleName
     * @param array $parameters
     * @return array
     */
    public function regenerateKeys(
        $resourceGroupName,
        $namespaceName,
        $topicName,
        $authorizationRuleName,
        array $parameters
    )
    {
        return $this->_RegenerateKeys_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'namespaceName' => $namespaceName,
            'topicName' => $topicName,
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
