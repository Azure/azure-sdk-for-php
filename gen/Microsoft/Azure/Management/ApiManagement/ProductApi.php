<?php
namespace Microsoft\Azure\Management\ApiManagement;
final class ProductApi
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListByProduct_operation = $_client->createOperation('ProductApi_ListByProduct');
        $this->_CreateOrUpdate_operation = $_client->createOperation('ProductApi_CreateOrUpdate');
        $this->_Delete_operation = $_client->createOperation('ProductApi_Delete');
    }
    /**
     * Lists a collection of the APIs associated with a product.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $productId
     * @param string $_filter
     * @param integer $_top
     * @param integer $_skip
     * @return array
     */
    public function listByProduct(
        $resourceGroupName,
        $serviceName,
        $productId,
        $_filter,
        $_top,
        $_skip
    )
    {
        return $this->_ListByProduct_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'productId' => $productId,
            '$filter' => $_filter,
            '$top' => $_top,
            '$skip' => $_skip
        ]);
    }
    /**
     * Adds an API to the specified product.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $productId
     * @param string $apiId
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $serviceName,
        $productId,
        $apiId
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'productId' => $productId,
            'apiId' => $apiId
        ]);
    }
    /**
     * Deletes the specified API from the specified product.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $productId
     * @param string $apiId
     */
    public function delete(
        $resourceGroupName,
        $serviceName,
        $productId,
        $apiId
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'productId' => $productId,
            'apiId' => $apiId
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByProduct_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateOrUpdate_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Delete_operation;
}
