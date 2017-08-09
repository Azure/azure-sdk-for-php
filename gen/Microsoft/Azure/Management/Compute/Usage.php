<?php
namespace Microsoft\Azure\Management\Compute;
final class Usage
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_List_operation = $_client->createOperation('Usage_List');
    }
    /**
     * Gets, for the specified location, the current compute resource usage information as well as the limits for compute resources under the subscription.
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
