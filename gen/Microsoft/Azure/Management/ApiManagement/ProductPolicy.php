<?php
namespace Microsoft\Azure\Management\ApiManagement;
final class ProductPolicy
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListByProduct_operation = $_client->createOperation('ProductPolicy_ListByProduct');
        $this->_Get_operation = $_client->createOperation('ProductPolicy_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('ProductPolicy_CreateOrUpdate');
        $this->_Delete_operation = $_client->createOperation('ProductPolicy_Delete');
    }
    /**
     * Get the policy configuration at the Product level.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $productId
     * @return array
     */
    public function listByProduct(
        $resourceGroupName,
        $serviceName,
        $productId
    )
    {
        return $this->_ListByProduct_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'productId' => $productId
        ]);
    }
    /**
     * Get the policy configuration at the Product level.
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
     * Creates or updates policy configuration for the Product.
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
     * Deletes the policy configuration at the Product.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $productId
     * @param string $if_Match
     */
    public function delete(
        $resourceGroupName,
        $serviceName,
        $productId,
        $if_Match
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'productId' => $productId,
            'If-Match' => $if_Match
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByProduct_operation;
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
    private $_Delete_operation;
}
