<?php
namespace Microsoft\Azure\Management\ServiceBus\_2017_04_01;
final class EventHubs
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListByNamespace_operation = $_client->createOperation('EventHubs_ListByNamespace');
    }
    /**
     * Gets all the Event Hubs in a service bus Namespace.
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
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByNamespace_operation;
}
