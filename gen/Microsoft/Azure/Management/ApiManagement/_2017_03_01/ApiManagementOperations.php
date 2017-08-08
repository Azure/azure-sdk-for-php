<?php
namespace Microsoft\Azure\Management\ApiManagement\_2017_03_01;
final class ApiManagementOperations
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_List_operation = $_client->createOperation('ApiManagementOperations_List');
    }
    /**
     * Lists all of the available REST API operations of the Microsoft.ApiManagement provider.
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
