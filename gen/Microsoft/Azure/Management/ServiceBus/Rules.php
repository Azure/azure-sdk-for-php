<?php
namespace Microsoft\Azure\Management\ServiceBus;
final class Rules
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListBySubscriptions_operation = $_client->createOperation('Rules_ListBySubscriptions');
        $this->_CreateOrUpdate_operation = $_client->createOperation('Rules_CreateOrUpdate');
        $this->_Delete_operation = $_client->createOperation('Rules_Delete');
        $this->_Get_operation = $_client->createOperation('Rules_Get');
    }
    /**
     * List all the rules within given topic-subscription
     * @param string $resourceGroupName
     * @param string $namespaceName
     * @param string $topicName
     * @param string $subscriptionName
     * @return array
     */
    public function listBySubscriptions(
        $resourceGroupName,
        $namespaceName,
        $topicName,
        $subscriptionName
    )
    {
        return $this->_ListBySubscriptions_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'namespaceName' => $namespaceName,
            'topicName' => $topicName,
            'subscriptionName' => $subscriptionName
        ]);
    }
    /**
     * Creates a new rule and updates an existing rule
     * @param string $resourceGroupName
     * @param string $namespaceName
     * @param string $topicName
     * @param string $subscriptionName
     * @param string $ruleName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $namespaceName,
        $topicName,
        $subscriptionName,
        $ruleName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'namespaceName' => $namespaceName,
            'topicName' => $topicName,
            'subscriptionName' => $subscriptionName,
            'ruleName' => $ruleName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Deletes an existing rule.
     * @param string $resourceGroupName
     * @param string $namespaceName
     * @param string $topicName
     * @param string $subscriptionName
     * @param string $ruleName
     */
    public function delete(
        $resourceGroupName,
        $namespaceName,
        $topicName,
        $subscriptionName,
        $ruleName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'namespaceName' => $namespaceName,
            'topicName' => $topicName,
            'subscriptionName' => $subscriptionName,
            'ruleName' => $ruleName
        ]);
    }
    /**
     * Retrieves the description for the specified rule.
     * @param string $resourceGroupName
     * @param string $namespaceName
     * @param string $topicName
     * @param string $subscriptionName
     * @param string $ruleName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $namespaceName,
        $topicName,
        $subscriptionName,
        $ruleName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'namespaceName' => $namespaceName,
            'topicName' => $topicName,
            'subscriptionName' => $subscriptionName,
            'ruleName' => $ruleName
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListBySubscriptions_operation;
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
}
