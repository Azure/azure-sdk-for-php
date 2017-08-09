<?php
namespace Microsoft\Azure\Management\ServiceBus;
final class Regions
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListBySku_operation = $_client->createOperation('Regions_ListBySku');
    }
    /**
     * Gets the available Regions for a given sku
     * @param string $sku
     * @return array
     */
    public function listBySku($sku)
    {
        return $this->_ListBySku_operation->call(['sku' => $sku]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListBySku_operation;
}
