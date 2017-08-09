<?php
namespace Microsoft\Azure\Management\ServiceBus;
final class Queues
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListByNamespace_operation = $_client->createOperation('Queues_ListByNamespace');
        $this->_CreateOrUpdate_operation = $_client->createOperation('Queues_CreateOrUpdate');
        $this->_Delete_operation = $_client->createOperation('Queues_Delete');
        $this->_Get_operation = $_client->createOperation('Queues_Get');
        $this->_ListAuthorizationRules_operation = $_client->createOperation('Queues_ListAuthorizationRules');
        $this->_CreateOrUpdateAuthorizationRule_operation = $_client->createOperation('Queues_CreateOrUpdateAuthorizationRule');
        $this->_DeleteAuthorizationRule_operation = $_client->createOperation('Queues_DeleteAuthorizationRule');
        $this->_GetAuthorizationRule_operation = $_client->createOperation('Queues_GetAuthorizationRule');
        $this->_ListKeys_operation = $_client->createOperation('Queues_ListKeys');
        $this->_RegenerateKeys_operation = $_client->createOperation('Queues_RegenerateKeys');
    }
    /**
     * Gets the queues within a namespace.
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
     * Creates or updates a Service Bus queue. This operation is idempotent.
     * @param string $resourceGroupName
     * @param string $namespaceName
     * @param string $queueName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $namespaceName,
        $queueName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'namespaceName' => $namespaceName,
            'queueName' => $queueName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Deletes a queue from the specified namespace in a resource group.
     * @param string $resourceGroupName
     * @param string $namespaceName
     * @param string $queueName
     */
    public function delete(
        $resourceGroupName,
        $namespaceName,
        $queueName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'namespaceName' => $namespaceName,
            'queueName' => $queueName
        ]);
    }
    /**
     * Returns a description for the specified queue.
     * @param string $resourceGroupName
     * @param string $namespaceName
     * @param string $queueName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $namespaceName,
        $queueName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'namespaceName' => $namespaceName,
            'queueName' => $queueName
        ]);
    }
    /**
     * Gets all authorization rules for a queue.
     * @param string $resourceGroupName
     * @param string $namespaceName
     * @param string $queueName
     * @return array
     */
    public function listAuthorizationRules(
        $resourceGroupName,
        $namespaceName,
        $queueName
    )
    {
        return $this->_ListAuthorizationRules_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'namespaceName' => $namespaceName,
            'queueName' => $queueName
        ]);
    }
    /**
     * Creates an authorization rule for a queue.
     * @param string $resourceGroupName
     * @param string $namespaceName
     * @param string $queueName
     * @param string $authorizationRuleName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdateAuthorizationRule(
        $resourceGroupName,
        $namespaceName,
        $queueName,
        $authorizationRuleName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdateAuthorizationRule_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'namespaceName' => $namespaceName,
            'queueName' => $queueName,
            'authorizationRuleName' => $authorizationRuleName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Deletes a queue authorization rule.
     * @param string $resourceGroupName
     * @param string $namespaceName
     * @param string $queueName
     * @param string $authorizationRuleName
     */
    public function deleteAuthorizationRule(
        $resourceGroupName,
        $namespaceName,
        $queueName,
        $authorizationRuleName
    )
    {
        return $this->_DeleteAuthorizationRule_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'namespaceName' => $namespaceName,
            'queueName' => $queueName,
            'authorizationRuleName' => $authorizationRuleName
        ]);
    }
    /**
     * Gets an authorization rule for a queue by rule name.
     * @param string $resourceGroupName
     * @param string $namespaceName
     * @param string $queueName
     * @param string $authorizationRuleName
     * @return array
     */
    public function getAuthorizationRule(
        $resourceGroupName,
        $namespaceName,
        $queueName,
        $authorizationRuleName
    )
    {
        return $this->_GetAuthorizationRule_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'namespaceName' => $namespaceName,
            'queueName' => $queueName,
            'authorizationRuleName' => $authorizationRuleName
        ]);
    }
    /**
     * Primary and secondary connection strings to the queue.
     * @param string $resourceGroupName
     * @param string $namespaceName
     * @param string $queueName
     * @param string $authorizationRuleName
     * @return array
     */
    public function listKeys(
        $resourceGroupName,
        $namespaceName,
        $queueName,
        $authorizationRuleName
    )
    {
        return $this->_ListKeys_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'namespaceName' => $namespaceName,
            'queueName' => $queueName,
            'authorizationRuleName' => $authorizationRuleName
        ]);
    }
    /**
     * Regenerates the primary or secondary connection strings to the queue.
     * @param string $resourceGroupName
     * @param string $namespaceName
     * @param string $queueName
     * @param string $authorizationRuleName
     * @param array $parameters
     * @return array
     */
    public function regenerateKeys(
        $resourceGroupName,
        $namespaceName,
        $queueName,
        $authorizationRuleName,
        array $parameters
    )
    {
        return $this->_RegenerateKeys_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'namespaceName' => $namespaceName,
            'queueName' => $queueName,
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
