<?php
namespace Microsoft\Azure\Management\Network;
final class NetworkSecurityGroups
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Delete_operation = $_client->createOperation('NetworkSecurityGroups_Delete');
        $this->_Get_operation = $_client->createOperation('NetworkSecurityGroups_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('NetworkSecurityGroups_CreateOrUpdate');
        $this->_ListAll_operation = $_client->createOperation('NetworkSecurityGroups_ListAll');
        $this->_List_operation = $_client->createOperation('NetworkSecurityGroups_List');
    }
    /**
     * Deletes the specified network security group.
     * @param string $resourceGroupName
     * @param string $networkSecurityGroupName
     */
    public function delete(
        $resourceGroupName,
        $networkSecurityGroupName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'networkSecurityGroupName' => $networkSecurityGroupName
        ]);
    }
    /**
     * Gets the specified network security group.
     * @param string $resourceGroupName
     * @param string $networkSecurityGroupName
     * @param string|null $_expand
     * @return array
     */
    public function get(
        $resourceGroupName,
        $networkSecurityGroupName,
        $_expand = null
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'networkSecurityGroupName' => $networkSecurityGroupName,
            '$expand' => $_expand
        ]);
    }
    /**
     * Creates or updates a network security group in the specified resource group.
     * @param string $resourceGroupName
     * @param string $networkSecurityGroupName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $networkSecurityGroupName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'networkSecurityGroupName' => $networkSecurityGroupName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Gets all network security groups in a subscription.
     * @return array
     */
    public function listAll()
    {
        return $this->_ListAll_operation->call([]);
    }
    /**
     * Gets all network security groups in a resource group.
     * @param string $resourceGroupName
     * @return array
     */
    public function list_($resourceGroupName)
    {
        return $this->_List_operation->call(['resourceGroupName' => $resourceGroupName]);
    }
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
    private $_CreateOrUpdate_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListAll_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
}
