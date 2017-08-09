<?php
namespace Microsoft\Azure\Management\Resource;
final class ApplianceDefinitions
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Get_operation = $_client->createOperation('ApplianceDefinitions_Get');
        $this->_Delete_operation = $_client->createOperation('ApplianceDefinitions_Delete');
        $this->_CreateOrUpdate_operation = $_client->createOperation('ApplianceDefinitions_CreateOrUpdate');
        $this->_ListByResourceGroup_operation = $_client->createOperation('ApplianceDefinitions_ListByResourceGroup');
        $this->_GetById_operation = $_client->createOperation('ApplianceDefinitions_GetById');
        $this->_DeleteById_operation = $_client->createOperation('ApplianceDefinitions_DeleteById');
        $this->_CreateOrUpdateById_operation = $_client->createOperation('ApplianceDefinitions_CreateOrUpdateById');
    }
    /**
     * Gets the appliance definition.
     * @param string $resourceGroupName
     * @param string $applianceDefinitionName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $applianceDefinitionName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'applianceDefinitionName' => $applianceDefinitionName
        ]);
    }
    /**
     * Deletes the appliance definition.
     * @param string $resourceGroupName
     * @param string $applianceDefinitionName
     */
    public function delete(
        $resourceGroupName,
        $applianceDefinitionName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'applianceDefinitionName' => $applianceDefinitionName
        ]);
    }
    /**
     * Creates a new appliance definition.
     * @param string $resourceGroupName
     * @param string $applianceDefinitionName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $applianceDefinitionName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'applianceDefinitionName' => $applianceDefinitionName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Lists the appliance definitions in a resource group.
     * @param string $resourceGroupName
     * @return array
     */
    public function listByResourceGroup($resourceGroupName)
    {
        return $this->_ListByResourceGroup_operation->call(['resourceGroupName' => $resourceGroupName]);
    }
    /**
     * Gets the appliance definition.
     * @param string $applianceDefinitionId
     * @return array
     */
    public function getById($applianceDefinitionId)
    {
        return $this->_GetById_operation->call(['applianceDefinitionId' => $applianceDefinitionId]);
    }
    /**
     * Deletes the appliance definition.
     * @param string $applianceDefinitionId
     */
    public function deleteById($applianceDefinitionId)
    {
        return $this->_DeleteById_operation->call(['applianceDefinitionId' => $applianceDefinitionId]);
    }
    /**
     * Creates a new appliance definition.
     * @param string $applianceDefinitionId
     * @param array $parameters
     * @return array
     */
    public function createOrUpdateById(
        $applianceDefinitionId,
        array $parameters
    )
    {
        return $this->_CreateOrUpdateById_operation->call([
            'applianceDefinitionId' => $applianceDefinitionId,
            'parameters' => $parameters
        ]);
    }
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
    private $_CreateOrUpdate_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByResourceGroup_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetById_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_DeleteById_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateOrUpdateById_operation;
}
