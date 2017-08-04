<?php
namespace Microsoft\Azure\Management\ServiceBus\_2017_04_01;
final class PremiumMessagingRegions
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_List_operation = $_client->createOperation('PremiumMessagingRegions_List');
    }
    /**
     * Gets the available premium messaging regions for servicebus
     * @return array
     */
    public function list_()
    {
        return $this->_List_operation->call([]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
}
