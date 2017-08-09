<?php
namespace Microsoft\Azure\Management\Billing;
final class BillingPeriods
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_List_operation = $_client->createOperation('BillingPeriods_List');
        $this->_Get_operation = $_client->createOperation('BillingPeriods_Get');
    }
    /**
     * Lists the available billing periods for a subscription in reverse chronological order.
     * @param string $_filter
     * @param string $_skiptoken
     * @param integer $_top
     * @return array
     */
    public function list_(
        $_filter,
        $_skiptoken,
        $_top
    )
    {
        return $this->_List_operation->call([
            '$filter' => $_filter,
            '$skiptoken' => $_skiptoken,
            '$top' => $_top
        ]);
    }
    /**
     * Gets a named billing period.
     * @param string $billingPeriodName
     * @return array
     */
    public function get($billingPeriodName)
    {
        return $this->_Get_operation->call(['billingPeriodName' => $billingPeriodName]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
}
