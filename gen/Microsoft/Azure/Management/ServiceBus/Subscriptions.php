<?php
namespace Microsoft\Azure\Management\ServiceBus;
final class Subscriptions
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListByTopic_operation = $_client->createOperation('Subscriptions_ListByTopic');
        $this->_CreateOrUpdate_operation = $_client->createOperation('Subscriptions_CreateOrUpdate');
        $this->_Delete_operation = $_client->createOperation('Subscriptions_Delete');
        $this->_Get_operation = $_client->createOperation('Subscriptions_Get');
    }
    /**
     * List all the subscriptions under a specified topic.
     * @param string $resourceGroupName
     * @param string $namespaceName
     * @param string $topicName
     * @return array
     */
    public function listByTopic(
        $resourceGroupName,
        $namespaceName,
        $topicName
    )
    {
        return $this->_ListByTopic_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'namespaceName' => $namespaceName,
            'topicName' => $topicName
        ]);
    }
    /**
     * Creates a topic subscription.
     * @param string $resourceGroupName
     * @param string $namespaceName
     * @param string $topicName
     * @param string $subscriptionName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $namespaceName,
        $topicName,
        $subscriptionName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'namespaceName' => $namespaceName,
            'topicName' => $topicName,
            'subscriptionName' => $subscriptionName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Deletes a subscription from the specified topic.
     * @param string $resourceGroupName
     * @param string $namespaceName
     * @param string $topicName
     * @param string $subscriptionName
     */
    public function delete(
        $resourceGroupName,
        $namespaceName,
        $topicName,
        $subscriptionName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'namespaceName' => $namespaceName,
            'topicName' => $topicName,
            'subscriptionName' => $subscriptionName
        ]);
    }
    /**
     * Returns a subscription description for the specified topic.
     * @param string $resourceGroupName
     * @param string $namespaceName
     * @param string $topicName
     * @param string $subscriptionName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $namespaceName,
        $topicName,
        $subscriptionName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'namespaceName' => $namespaceName,
            'topicName' => $topicName,
            'subscriptionName' => $subscriptionName
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByTopic_operation;
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
