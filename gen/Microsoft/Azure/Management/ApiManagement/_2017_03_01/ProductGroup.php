<?php
namespace Microsoft\Azure\Management\ApiManagement\_2017_03_01;
final class ProductGroup
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListByProduct_operation = $_client->createOperation('ProductGroup_ListByProduct');
        $this->_CreateOrUpdate_operation = $_client->createOperation('ProductGroup_CreateOrUpdate');
        $this->_Delete_operation = $_client->createOperation('ProductGroup_Delete');
    }
    /**
     * Lists the collection of developer groups associated with the specified product.
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
     * Adds the association between the specified developer group with the specified product.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $productId
     * @param string $groupId
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $serviceName,
        $productId,
        $groupId
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'productId' => $productId,
            'groupId' => $groupId
        ]);
    }
    /**
     * Deletes the association between the specified group and product.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $productId
     * @param string $groupId
     */
    public function delete(
        $resourceGroupName,
        $serviceName,
        $productId,
        $groupId
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'productId' => $productId,
            'groupId' => $groupId
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
