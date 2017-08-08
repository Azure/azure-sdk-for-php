<?php
namespace Microsoft\Azure\Management\Compute\_2017_01_31;
final class ContainerServices
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_List_operation = $_client->createOperation('ContainerServices_List');
        $this->_CreateOrUpdate_operation = $_client->createOperation('ContainerServices_CreateOrUpdate');
        $this->_Get_operation = $_client->createOperation('ContainerServices_Get');
        $this->_Delete_operation = $_client->createOperation('ContainerServices_Delete');
        $this->_ListByResourceGroup_operation = $_client->createOperation('ContainerServices_ListByResourceGroup');
    }
    /**
     * Gets a list of container services in the specified subscription. The operation returns properties of each container service including state, orchestrator, number of masters and agents, and FQDNs of masters and agents.
     * @return array
     */
    public function list_()
    {
        return $this->_List_operation->call([]);
    }
    /**
     * Creates or updates a container service with the specified configuration of orchestrator, masters, and agents.
     * @param string $resourceGroupName
     * @param string $containerServiceName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $containerServiceName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'containerServiceName' => $containerServiceName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Gets the properties of the specified container service in the specified subscription and resource group. The operation returns the properties including state, orchestrator, number of masters and agents, and FQDNs of masters and agents.
     * @param string $resourceGroupName
     * @param string $containerServiceName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $containerServiceName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'containerServiceName' => $containerServiceName
        ]);
    }
    /**
     * Deletes the specified container service in the specified subscription and resource group. The operation does not delete other resources created as part of creating a container service, including storage accounts, VMs, and availability sets. All the other resources created with the container service are part of the same resource group and can be deleted individually.
     * @param string $resourceGroupName
     * @param string $containerServiceName
     */
    public function delete(
        $resourceGroupName,
        $containerServiceName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'containerServiceName' => $containerServiceName
        ]);
    }
    /**
     * Gets a list of container services in the specified subscription and resource group. The operation returns properties of each container service including state, orchestrator, number of masters and agents, and FQDNs of masters and agents.
     * @param string $resourceGroupName
     * @return array
     */
    public function listByResourceGroup($resourceGroupName)
    {
        return $this->_ListByResourceGroup_operation->call(['resourceGroupName' => $resourceGroupName]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateOrUpdate_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Delete_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByResourceGroup_operation;
}
