<?php
namespace Microsoft\Azure\Management\Billing\_2017_04_24_preview;
final class Invoices
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_List_operation = $_client->createOperation('Invoices_List');
        $this->_Get_operation = $_client->createOperation('Invoices_Get');
        $this->_GetLatest_operation = $_client->createOperation('Invoices_GetLatest');
    }
    /**
     * Lists the available invoices for a subscription in reverse chronological order beginning with the most recent invoice. In preview, invoices are available via this API only for invoice periods which end December 1, 2016 or later.
     * @param string $_expand
     * @param string $_filter
     * @param string $_skiptoken
     * @param integer $_top
     * @return array
     */
    public function list_(
        $_expand,
        $_filter,
        $_skiptoken,
        $_top
    )
    {
        return $this->_List_operation->call([
            '$expand' => $_expand,
            '$filter' => $_filter,
            '$skiptoken' => $_skiptoken,
            '$top' => $_top
        ]);
    }
    /**
     * Gets a named invoice resource. When getting a single invoice, the downloadUrl property is expanded automatically.
     * @param string $invoiceName
     * @return array
     */
    public function get($invoiceName)
    {
        return $this->_Get_operation->call(['invoiceName' => $invoiceName]);
    }
    /**
     * Gets the most recent invoice. When getting a single invoice, the downloadUrl property is expanded automatically.
     * @return array
     */
    public function getLatest()
    {
        return $this->_GetLatest_operation->call([]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetLatest_operation;
}
