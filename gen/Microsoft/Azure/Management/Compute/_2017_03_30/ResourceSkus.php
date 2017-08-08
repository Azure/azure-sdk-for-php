<?php
namespace Microsoft\Azure\Management\Compute\_2017_03_30;
final class ResourceSkus
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_List_operation = $_client->createOperation('ResourceSkus_List');
    }
    /**
     * Gets the list of Microsoft.Compute SKUs available for your Subscription.
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
