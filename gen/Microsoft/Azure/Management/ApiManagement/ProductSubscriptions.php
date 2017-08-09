<?php
namespace Microsoft\Azure\Management\ApiManagement;
final class ProductSubscriptions
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_List_operation = $_client->createOperation('ProductSubscriptions_List');
    }
    /**
     * Lists the collection of subscriptions to the specified product.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $productId
     * @param string|null $_filter
     * @param integer|null $_top
     * @param integer|null $_skip
     * @return array
     */
    public function list_(
        $resourceGroupName,
        $serviceName,
        $productId,
        $_filter = null,
        $_top = null,
        $_skip = null
    )
    {
        return $this->_List_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'productId' => $productId,
            '$filter' => $_filter,
            '$top' => $_top,
            '$skip' => $_skip
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
}
