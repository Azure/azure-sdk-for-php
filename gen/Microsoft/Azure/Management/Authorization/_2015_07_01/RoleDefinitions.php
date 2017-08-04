<?php
namespace Microsoft\Azure\Management\Authorization\_2015_07_01;
final class RoleDefinitions
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Delete_operation = $_client->createOperation('RoleDefinitions_Delete');
        $this->_Get_operation = $_client->createOperation('RoleDefinitions_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('RoleDefinitions_CreateOrUpdate');
        $this->_GetById_operation = $_client->createOperation('RoleDefinitions_GetById');
        $this->_List_operation = $_client->createOperation('RoleDefinitions_List');
    }
    /**
     * Deletes a role definition.
     * @param string $scope
     * @param string $roleDefinitionId
     * @return array
     */
    public function delete(
        $scope,
        $roleDefinitionId
    )
    {
        return $this->_Delete_operation->call([
            'scope' => $scope,
            'roleDefinitionId' => $roleDefinitionId
        ]);
    }
    /**
     * Get role definition by name (GUID).
     * @param string $scope
     * @param string $roleDefinitionId
     * @return array
     */
    public function get(
        $scope,
        $roleDefinitionId
    )
    {
        return $this->_Get_operation->call([
            'scope' => $scope,
            'roleDefinitionId' => $roleDefinitionId
        ]);
    }
    /**
     * Creates or updates a role definition.
     * @param string $scope
     * @param string $roleDefinitionId
     * @param array $roleDefinition
     * @return array
     */
    public function createOrUpdate(
        $scope,
        $roleDefinitionId,
        array $roleDefinition
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'scope' => $scope,
            'roleDefinitionId' => $roleDefinitionId,
            'roleDefinition' => $roleDefinition
        ]);
    }
    /**
     * Gets a role definition by ID.
     * @param string $roleDefinitionId
     * @return array
     */
    public function getById($roleDefinitionId)
    {
        return $this->_GetById_operation->call(['roleDefinitionId' => $roleDefinitionId]);
    }
    /**
     * Get all role definitions that are applicable at scope and above.
     * @param string $scope
     * @param string $_filter
     * @return array
     */
    public function list_(
        $scope,
        $_filter
    )
    {
        return $this->_List_operation->call([
            'scope' => $scope,
            '$filter' => $_filter
        ]);
    }
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
    private $_CreateOrUpdate_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetById_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
}
