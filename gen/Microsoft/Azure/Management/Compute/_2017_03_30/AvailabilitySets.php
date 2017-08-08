<?php
namespace Microsoft\Azure\Management\Compute\_2017_03_30;
final class AvailabilitySets
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_CreateOrUpdate_operation = $_client->createOperation('AvailabilitySets_CreateOrUpdate');
        $this->_Delete_operation = $_client->createOperation('AvailabilitySets_Delete');
        $this->_Get_operation = $_client->createOperation('AvailabilitySets_Get');
        $this->_List_operation = $_client->createOperation('AvailabilitySets_List');
        $this->_ListAvailableSizes_operation = $_client->createOperation('AvailabilitySets_ListAvailableSizes');
    }
    /**
     * Create or update an availability set.
     * @param string $resourceGroupName
     * @param string $availabilitySetName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $availabilitySetName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'availabilitySetName' => $availabilitySetName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Delete an availability set.
     * @param string $resourceGroupName
     * @param string $availabilitySetName
     * @return array
     */
    public function delete(
        $resourceGroupName,
        $availabilitySetName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'availabilitySetName' => $availabilitySetName
        ]);
    }
    /**
     * Retrieves information about an availability set.
     * @param string $resourceGroupName
     * @param string $availabilitySetName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $availabilitySetName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'availabilitySetName' => $availabilitySetName
        ]);
    }
    /**
     * Lists all availability sets in a resource group.
     * @param string $resourceGroupName
     * @return array
     */
    public function list_($resourceGroupName)
    {
        return $this->_List_operation->call(['resourceGroupName' => $resourceGroupName]);
    }
    /**
     * Lists all available virtual machine sizes that can be used to create a new virtual machine in an existing availability set.
     * @param string $resourceGroupName
     * @param string $availabilitySetName
     * @return array
     */
    public function listAvailableSizes(
        $resourceGroupName,
        $availabilitySetName
    )
    {
        return $this->_ListAvailableSizes_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'availabilitySetName' => $availabilitySetName
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateOrUpdate_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Delete_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListAvailableSizes_operation;
}
