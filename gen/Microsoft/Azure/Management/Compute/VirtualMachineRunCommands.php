<?php
namespace Microsoft\Azure\Management\Compute;
final class VirtualMachineRunCommands
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_List_operation = $_client->createOperation('VirtualMachineRunCommands_List');
        $this->_Get_operation = $_client->createOperation('VirtualMachineRunCommands_Get');
    }
    /**
     * Lists all available run commands for a subscription in a location.
     * @param string $location
     * @return array
     */
    public function list_($location)
    {
        return $this->_List_operation->call(['location' => $location]);
    }
    /**
     * Gets specific run command for a subscription in a location.
     * @param string $location
     * @param string $commandId
     * @return array
     */
    public function get(
        $location,
        $commandId
    )
    {
        return $this->_Get_operation->call([
            'location' => $location,
            'commandId' => $commandId
        ]);
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
