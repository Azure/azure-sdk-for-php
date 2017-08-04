<?php
namespace Microsoft\Azure\Management\Consumption\_2017_04_24_preview;
final class UsageDetails
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_List_operation = $_client->createOperation('UsageDetails_List');
    }
    /**
     * Lists the usage details for a scope in reverse chronological order by billing period. Usage details are available via this API only for January 1, 2017 or later.
     * @param string $scope
     * @param string $_expand
     * @param string $_filter
     * @param string $_skiptoken
     * @param integer $_top
     * @return array
     */
    public function list_(
        $scope,
        $_expand,
        $_filter,
        $_skiptoken,
        $_top
    )
    {
        return $this->_List_operation->call([
            'scope' => $scope,
            '$expand' => $_expand,
            '$filter' => $_filter,
            '$skiptoken' => $_skiptoken,
            '$top' => $_top
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
}
