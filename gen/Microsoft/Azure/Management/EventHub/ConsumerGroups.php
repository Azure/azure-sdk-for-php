<?php
namespace Microsoft\Azure\Management\EventHub;
final class ConsumerGroups
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_CreateOrUpdate_operation = $_client->createOperation('ConsumerGroups_CreateOrUpdate');
        $this->_Delete_operation = $_client->createOperation('ConsumerGroups_Delete');
        $this->_Get_operation = $_client->createOperation('ConsumerGroups_Get');
        $this->_ListByEventHub_operation = $_client->createOperation('ConsumerGroups_ListByEventHub');
    }
    /**
     * Creates or updates an Event Hubs consumer group as a nested resource within a Namespace.
     * @param string $resourceGroupName
     * @param string $namespaceName
     * @param string $eventHubName
     * @param string $consumerGroupName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $namespaceName,
        $eventHubName,
        $consumerGroupName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'namespaceName' => $namespaceName,
            'eventHubName' => $eventHubName,
            'consumerGroupName' => $consumerGroupName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Deletes a consumer group from the specified Event Hub and resource group.
     * @param string $resourceGroupName
     * @param string $namespaceName
     * @param string $eventHubName
     * @param string $consumerGroupName
     */
    public function delete(
        $resourceGroupName,
        $namespaceName,
        $eventHubName,
        $consumerGroupName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'namespaceName' => $namespaceName,
            'eventHubName' => $eventHubName,
            'consumerGroupName' => $consumerGroupName
        ]);
    }
    /**
     * Gets a description for the specified consumer group.
     * @param string $resourceGroupName
     * @param string $namespaceName
     * @param string $eventHubName
     * @param string $consumerGroupName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $namespaceName,
        $eventHubName,
        $consumerGroupName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'namespaceName' => $namespaceName,
            'eventHubName' => $eventHubName,
            'consumerGroupName' => $consumerGroupName
        ]);
    }
    /**
     * Gets all the consumer groups in a Namespace. An empty feed is returned if no consumer group exists in the Namespace.
     * @param string $resourceGroupName
     * @param string $namespaceName
     * @param string $eventHubName
     * @return array
     */
    public function listByEventHub(
        $resourceGroupName,
        $namespaceName,
        $eventHubName
    )
    {
        return $this->_ListByEventHub_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'namespaceName' => $namespaceName,
            'eventHubName' => $eventHubName
        ]);
    }
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
    private $_ListByEventHub_operation;
}
