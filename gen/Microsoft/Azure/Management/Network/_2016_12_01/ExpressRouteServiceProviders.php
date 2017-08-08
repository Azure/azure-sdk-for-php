<?php
namespace Microsoft\Azure\Management\Network\_2016_12_01;
final class ExpressRouteServiceProviders
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_List_operation = $_client->createOperation('ExpressRouteServiceProviders_List');
    }
    /**
     * Gets all the available express route service providers.
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
