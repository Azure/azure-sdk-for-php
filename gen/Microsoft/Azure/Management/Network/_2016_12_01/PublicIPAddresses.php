<?php
namespace Microsoft\Azure\Management\Network\_2016_12_01;
final class PublicIPAddresses
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Delete_operation = $_client->createOperation('PublicIPAddresses_Delete');
        $this->_Get_operation = $_client->createOperation('PublicIPAddresses_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('PublicIPAddresses_CreateOrUpdate');
        $this->_ListAll_operation = $_client->createOperation('PublicIPAddresses_ListAll');
        $this->_List_operation = $_client->createOperation('PublicIPAddresses_List');
    }
    /**
     * Deletes the specified public IP address.
     * @param string $resourceGroupName
     * @param string $publicIpAddressName
     */
    public function delete(
        $resourceGroupName,
        $publicIpAddressName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'publicIpAddressName' => $publicIpAddressName
        ]);
    }
    /**
     * Gets the specified public IP address in a specified resource group.
     * @param string $resourceGroupName
     * @param string $publicIpAddressName
     * @param string $_expand
     * @return array
     */
    public function get(
        $resourceGroupName,
        $publicIpAddressName,
        $_expand
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'publicIpAddressName' => $publicIpAddressName,
            '$expand' => $_expand
        ]);
    }
    /**
     * Creates or updates a static or dynamic public IP address.
     * @param string $resourceGroupName
     * @param string $publicIpAddressName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $publicIpAddressName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'publicIpAddressName' => $publicIpAddressName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Gets all the public IP addresses in a subscription.
     * @return array
     */
    public function listAll()
    {
        return $this->_ListAll_operation->call([]);
    }
    /**
     * Gets all public IP addresses in a resource group.
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
