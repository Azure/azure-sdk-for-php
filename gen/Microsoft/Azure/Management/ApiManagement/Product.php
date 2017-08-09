<?php
namespace Microsoft\Azure\Management\ApiManagement;
final class Product
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListByService_operation = $_client->createOperation('Product_ListByService');
        $this->_Get_operation = $_client->createOperation('Product_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('Product_CreateOrUpdate');
        $this->_Update_operation = $_client->createOperation('Product_Update');
        $this->_Delete_operation = $_client->createOperation('Product_Delete');
    }
    /**
     * Lists a collection of products in the specified service instance.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string|null $_filter
     * @param integer|null $_top
     * @param integer|null $_skip
     * @param boolean|null $expandGroups
     * @return array
     */
    public function listByService(
        $resourceGroupName,
        $serviceName,
        $_filter = null,
        $_top = null,
        $_skip = null,
        $expandGroups = null
    )
    {
        return $this->_ListByService_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            '$filter' => $_filter,
            '$top' => $_top,
            '$skip' => $_skip,
            'expandGroups' => $expandGroups
        ]);
    }
    /**
     * Gets the details of the product specified by its identifier.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $productId
     * @return array
     */
    public function get(
        $resourceGroupName,
        $serviceName,
        $productId
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'productId' => $productId
        ]);
    }
    /**
     * Creates or Updates a product.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $productId
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $serviceName,
        $productId,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'productId' => $productId,
            'parameters' => $parameters
        ]);
    }
    /**
     * Update product.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $productId
     * @param array $parameters
     * @param string $if_Match
     */
    public function update(
        $resourceGroupName,
        $serviceName,
        $productId,
        array $parameters,
        $if_Match
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'productId' => $productId,
            'parameters' => $parameters,
            'If-Match' => $if_Match
        ]);
    }
    /**
     * Delete product.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $productId
     * @param boolean|null $deleteSubscriptions
     * @param string $if_Match
     */
    public function delete(
        $resourceGroupName,
        $serviceName,
        $productId,
        $deleteSubscriptions = null,
        $if_Match
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'productId' => $productId,
            'deleteSubscriptions' => $deleteSubscriptions,
            'If-Match' => $if_Match
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByService_operation;
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
    private $_Update_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Delete_operation;
}
