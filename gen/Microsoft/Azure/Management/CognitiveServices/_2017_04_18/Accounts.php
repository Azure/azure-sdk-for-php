<?php
namespace Microsoft\Azure\Management\CognitiveServices\_2017_04_18;
final class Accounts
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListByResourceGroup_operation = $_client->createOperation('Accounts_ListByResourceGroup');
        $this->_List_operation = $_client->createOperation('Accounts_List');
    }
    /**
     * Returns all the resources of a particular type belonging to a resource group
     * @param string $resourceGroupName
     * @return array
     */
    public function listByResourceGroup($resourceGroupName)
    {
        return $this->_ListByResourceGroup_operation->call(['resourceGroupName' => $resourceGroupName]);
    }
    /**
     * Returns all the resources of a particular type belonging to a subscription.
     * @return array
     */
    public function list_()
    {
        return $this->_List_operation->call([]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByResourceGroup_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
}
