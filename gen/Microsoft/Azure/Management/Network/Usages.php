<?php
namespace Microsoft\Azure\Management\Network;
final class Usages
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_List_operation = $_client->createOperation('Usages_List');
    }
    /**
     * Lists compute usages for a subscription.
     * @param string $location
     * @return array
     */
    public function list_($location)
    {
        return $this->_List_operation->call(['location' => $location]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
}
