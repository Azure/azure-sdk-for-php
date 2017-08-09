<?php
namespace Microsoft\Azure\Management\Network;
final class NetworkInterfaceIPConfigurations
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_List_operation = $_client->createOperation('NetworkInterfaceIPConfigurations_List');
        $this->_Get_operation = $_client->createOperation('NetworkInterfaceIPConfigurations_Get');
    }
    /**
     * Get all ip configurations in a network interface
     * @param string $resourceGroupName
     * @param string $networkInterfaceName
     * @return array
     */
    public function list_(
        $resourceGroupName,
        $networkInterfaceName
    )
    {
        return $this->_List_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'networkInterfaceName' => $networkInterfaceName
        ]);
    }
    /**
     * Gets the specified network interface ip configuration.
     * @param string $resourceGroupName
     * @param string $networkInterfaceName
     * @param string $ipConfigurationName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $networkInterfaceName,
        $ipConfigurationName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'networkInterfaceName' => $networkInterfaceName,
            'ipConfigurationName' => $ipConfigurationName
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
