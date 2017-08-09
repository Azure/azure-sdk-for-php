<?php
namespace Microsoft\Azure\Management\Authorization;
final class RoleAssignments
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListForResource_operation = $_client->createOperation('RoleAssignments_ListForResource');
        $this->_ListForResourceGroup_operation = $_client->createOperation('RoleAssignments_ListForResourceGroup');
        $this->_Delete_operation = $_client->createOperation('RoleAssignments_Delete');
        $this->_Create_operation = $_client->createOperation('RoleAssignments_Create');
        $this->_Get_operation = $_client->createOperation('RoleAssignments_Get');
        $this->_DeleteById_operation = $_client->createOperation('RoleAssignments_DeleteById');
        $this->_CreateById_operation = $_client->createOperation('RoleAssignments_CreateById');
        $this->_GetById_operation = $_client->createOperation('RoleAssignments_GetById');
        $this->_List_operation = $_client->createOperation('RoleAssignments_List');
        $this->_ListForScope_operation = $_client->createOperation('RoleAssignments_ListForScope');
    }
    /**
     * Gets role assignments for a resource.
     * @param string $resourceGroupName
     * @param string $resourceProviderNamespace
     * @param string $parentResourcePath
     * @param string $resourceType
     * @param string $resourceName
     * @param string|null $_filter
     * @return array
     */
    public function listForResource(
        $resourceGroupName,
        $resourceProviderNamespace,
        $parentResourcePath,
        $resourceType,
        $resourceName,
        $_filter = null
    )
    {
        return $this->_ListForResource_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'resourceProviderNamespace' => $resourceProviderNamespace,
            'parentResourcePath' => $parentResourcePath,
            'resourceType' => $resourceType,
            'resourceName' => $resourceName,
            '$filter' => $_filter
        ]);
    }
    /**
     * Gets role assignments for a resource group.
     * @param string $resourceGroupName
     * @param string|null $_filter
     * @return array
     */
    public function listForResourceGroup(
        $resourceGroupName,
        $_filter = null
    )
    {
        return $this->_ListForResourceGroup_operation->call([
            'resourceGroupName' => $resourceGroupName,
            '$filter' => $_filter
        ]);
    }
    /**
     * Deletes a role assignment.
     * @param string $scope
     * @param string $roleAssignmentName
     * @return array
     */
    public function delete(
        $scope,
        $roleAssignmentName
    )
    {
        return $this->_Delete_operation->call([
            'scope' => $scope,
            'roleAssignmentName' => $roleAssignmentName
        ]);
    }
    /**
     * Creates a role assignment.
     * @param string $scope
     * @param string $roleAssignmentName
     * @param array $parameters
     * @return array
     */
    public function create(
        $scope,
        $roleAssignmentName,
        array $parameters
    )
    {
        return $this->_Create_operation->call([
            'scope' => $scope,
            'roleAssignmentName' => $roleAssignmentName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Get the specified role assignment.
     * @param string $scope
     * @param string $roleAssignmentName
     * @return array
     */
    public function get(
        $scope,
        $roleAssignmentName
    )
    {
        return $this->_Get_operation->call([
            'scope' => $scope,
            'roleAssignmentName' => $roleAssignmentName
        ]);
    }
    /**
     * Deletes a role assignment.
     * @param string $roleAssignmentId
     * @return array
     */
    public function deleteById($roleAssignmentId)
    {
        return $this->_DeleteById_operation->call(['roleAssignmentId' => $roleAssignmentId]);
    }
    /**
     * Creates a role assignment by ID.
     * @param string $roleAssignmentId
     * @param array $parameters
     * @return array
     */
    public function createById(
        $roleAssignmentId,
        array $parameters
    )
    {
        return $this->_CreateById_operation->call([
            'roleAssignmentId' => $roleAssignmentId,
            'parameters' => $parameters
        ]);
    }
    /**
     * Gets a role assignment by ID.
     * @param string $roleAssignmentId
     * @return array
     */
    public function getById($roleAssignmentId)
    {
        return $this->_GetById_operation->call(['roleAssignmentId' => $roleAssignmentId]);
    }
    /**
     * Gets all role assignments for the subscription.
     * @param string|null $_filter
     * @return array
     */
    public function list_($_filter = null)
    {
        return $this->_List_operation->call(['$filter' => $_filter]);
    }
    /**
     * Gets role assignments for a scope.
     * @param string $scope
     * @param string|null $_filter
     * @return array
     */
    public function listForScope(
        $scope,
        $_filter = null
    )
    {
        return $this->_ListForScope_operation->call([
            'scope' => $scope,
            '$filter' => $_filter
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListForResource_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListForResourceGroup_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Delete_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Create_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_DeleteById_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateById_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetById_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListForScope_operation;
}
