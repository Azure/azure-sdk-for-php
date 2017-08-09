<?php
namespace Microsoft\Azure\Management\Resource;
final class Subscriptions
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListLocations_operation = $_client->createOperation('Subscriptions_ListLocations');
        $this->_Get_operation = $_client->createOperation('Subscriptions_Get');
        $this->_List_operation = $_client->createOperation('Subscriptions_List');
    }
    /**
     * This operation provides all the locations that are available for resource providers; however, each resource provider may support a subset of this list.
     * @return array
     */
    public function listLocations()
    {
        return $this->_ListLocations_operation->call([]);
    }
    /**
     * Gets details about a specified subscription.
     * @return array
     */
    public function get()
    {
        return $this->_Get_operation->call([]);
    }
    /**
     * Gets all subscriptions for a tenant.
     * @return array
     */
    public function list_()
    {
        return $this->_List_operation->call([]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListLocations_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
}
