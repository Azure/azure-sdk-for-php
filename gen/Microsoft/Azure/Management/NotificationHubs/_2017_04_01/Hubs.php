<?php
namespace Microsoft\Azure\Management\NotificationHubs\_2017_04_01;
final class Hubs
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_CheckAvailability_operation = $_client->createOperation('Hubs_CheckAvailability');
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
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CheckAvailability_operation;
}
