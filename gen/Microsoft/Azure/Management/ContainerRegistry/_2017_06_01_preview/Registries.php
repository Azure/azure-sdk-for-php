<?php
namespace Microsoft\Azure\Management\ContainerRegistry\_2017_06_01_preview;
final class Registries
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_CheckNameAvailability_operation = $_client->createOperation('Registries_CheckNameAvailability');
        $this->_Get_operation = $_client->createOperation('Registries_Get');
        $this->_Create_operation = $_client->createOperation('Registries_Create');
        $this->_Delete_operation = $_client->createOperation('Registries_Delete');
        $this->_Update_operation = $_client->createOperation('Registries_Update');
        $this->_ListByResourceGroup_operation = $_client->createOperation('Registries_ListByResourceGroup');
        $this->_List_operation = $_client->createOperation('Registries_List');
        $this->_ListCredentials_operation = $_client->createOperation('Registries_ListCredentials');
        $this->_RegenerateCredential_operation = $_client->createOperation('Registries_RegenerateCredential');
        $this->_ListUsages_operation = $_client->createOperation('Registries_ListUsages');
    }
    /**
     * Checks whether the container registry name is available for use. The name must contain only alphanumeric characters, be globally unique, and between 5 and 50 characters in length.
     * @param array $registryNameCheckRequest
     * @return array
     */
    public function checkNameAvailability(array $registryNameCheckRequest)
    {
        return $this->_CheckNameAvailability_operation->call(['registryNameCheckRequest' => $registryNameCheckRequest]);
    }
    /**
     * Gets the properties of the specified container registry.
     * @param string $resourceGroupName
     * @param string $registryName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $registryName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'registryName' => $registryName
        ]);
    }
    /**
     * Creates a container registry with the specified parameters.
     * @param string $resourceGroupName
     * @param string $registryName
     * @param array $registry
     * @return array
     */
    public function create(
        $resourceGroupName,
        $registryName,
        array $registry
    )
    {
        return $this->_Create_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'registryName' => $registryName,
            'registry' => $registry
        ]);
    }
    /**
     * Deletes a container registry.
     * @param string $resourceGroupName
     * @param string $registryName
     */
    public function delete(
        $resourceGroupName,
        $registryName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'registryName' => $registryName
        ]);
    }
    /**
     * Updates a container registry with the specified parameters.
     * @param string $resourceGroupName
     * @param string $registryName
     * @param array $registryUpdateParameters
     * @return array
     */
    public function update(
        $resourceGroupName,
        $registryName,
        array $registryUpdateParameters
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'registryName' => $registryName,
            'registryUpdateParameters' => $registryUpdateParameters
        ]);
    }
    /**
     * Lists all the container registries under the specified resource group.
     * @param string $resourceGroupName
     * @return array
     */
    public function listByResourceGroup($resourceGroupName)
    {
        return $this->_ListByResourceGroup_operation->call(['resourceGroupName' => $resourceGroupName]);
    }
    /**
     * Lists all the container registries under the specified subscription.
     * @return array
     */
    public function list_()
    {
        return $this->_List_operation->call([]);
    }
    /**
     * Lists the login credentials for the specified container registry.
     * @param string $resourceGroupName
     * @param string $registryName
     * @return array
     */
    public function listCredentials(
        $resourceGroupName,
        $registryName
    )
    {
        return $this->_ListCredentials_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'registryName' => $registryName
        ]);
    }
    /**
     * Regenerates one of the login credentials for the specified container registry.
     * @param string $resourceGroupName
     * @param string $registryName
     * @param array $regenerateCredentialParameters
     * @return array
     */
    public function regenerateCredential(
        $resourceGroupName,
        $registryName,
        array $regenerateCredentialParameters
    )
    {
        return $this->_RegenerateCredential_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'registryName' => $registryName,
            'regenerateCredentialParameters' => $regenerateCredentialParameters
        ]);
    }
    /**
     * Gets the quota usages for the specified container registry.
     * @param string $resourceGroupName
     * @param string $registryName
     * @return array
     */
    public function listUsages(
        $resourceGroupName,
        $registryName
    )
    {
        return $this->_ListUsages_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'registryName' => $registryName
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CheckNameAvailability_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Create_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Delete_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Update_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByResourceGroup_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListCredentials_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_RegenerateCredential_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListUsages_operation;
}
