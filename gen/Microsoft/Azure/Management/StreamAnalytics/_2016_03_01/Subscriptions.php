<?php
namespace Microsoft\Azure\Management\StreamAnalytics\_2016_03_01;
final class Subscriptions
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListQuotas_operation = $_client->createOperation('Subscriptions_ListQuotas');
    }
    /**
     * Retrieves the subscription's current quota information in a particular region.
     * @param string $location
     * @return array
     */
    public function listQuotas($location)
    {
        return $this->_ListQuotas_operation->call(['location' => $location]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListQuotas_operation;
}
