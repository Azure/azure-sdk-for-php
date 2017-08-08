<?php
namespace Microsoft\Azure\Management\Compute\_2017_03_30;
final class VirtualMachineSizes
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_List_operation = $_client->createOperation('VirtualMachineSizes_List');
    }
    /**
     * Lists all available virtual machine sizes for a subscription in a location.
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
