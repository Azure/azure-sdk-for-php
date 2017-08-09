<?php
namespace Microsoft\Azure\Management\Commerce;
final class RateCard
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Get_operation = $_client->createOperation('RateCard_Get');
    }
    /**
     * Enables you to query for the resource/meter metadata and related prices used in a given subscription by Offer ID, Currency, Locale and Region. The metadata associated with the billing meters, including but not limited to service names, types, resources, units of measure, and regions, is subject to change at any time and without notice. If you intend to use this billing data in an automated fashion, please use the billing meter GUID to uniquely identify each billable item. If the billing meter GUID is scheduled to change due to a new billing model, you will be notified in advance of the change.
     * @param string $_filter
     * @return array
     */
    public function get($_filter)
    {
        return $this->_Get_operation->call(['$filter' => $_filter]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
}
