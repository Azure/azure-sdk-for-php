<?php
namespace Microsoft\Azure\Management\NotificationHubs;
final class Name
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_CheckAvailability_operation = $_client->createOperation('Name_CheckAvailability');
    }
    /**
     * Checks the availability of the given service namespace across all Azure subscriptions. This is useful because the domain name is created based on the service namespace name.
     * @param array $parameters
     * @return array
     */
    public function checkAvailability(array $parameters)
    {
        return $this->_CheckAvailability_operation->call(['parameters' => $parameters]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CheckAvailability_operation;
}
