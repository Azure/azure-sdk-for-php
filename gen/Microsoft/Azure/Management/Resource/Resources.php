<?php
namespace Microsoft\Azure\Management\Resource;
final class Resources
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListByResourceGroup_operation = $_client->createOperation('Resources_ListByResourceGroup');
        $this->_MoveResources_operation = $_client->createOperation('Resources_MoveResources');
        $this->_ValidateMoveResources_operation = $_client->createOperation('Resources_ValidateMoveResources');
        $this->_List_operation = $_client->createOperation('Resources_List');
        $this->_CheckExistence_operation = $_client->createOperation('Resources_CheckExistence');
        $this->_Delete_operation = $_client->createOperation('Resources_Delete');
        $this->_CreateOrUpdate_operation = $_client->createOperation('Resources_CreateOrUpdate');
        $this->_Get_operation = $_client->createOperation('Resources_Get');
        $this->_CheckExistenceById_operation = $_client->createOperation('Resources_CheckExistenceById');
        $this->_DeleteById_operation = $_client->createOperation('Resources_DeleteById');
        $this->_CreateOrUpdateById_operation = $_client->createOperation('Resources_CreateOrUpdateById');
        $this->_GetById_operation = $_client->createOperation('Resources_GetById');
    }
    /**
     * Get all the resources for a resource group.
     * @param string $resourceGroupName
     * @param string|null $_filter
     * @param string|null $_expand
     * @param integer|null $_top
     * @return array
     */
    public function listByResourceGroup(
        $resourceGroupName,
        $_filter = null,
        $_expand = null,
        $_top = null
    )
    {
        return $this->_ListByResourceGroup_operation->call([
            'resourceGroupName' => $resourceGroupName,
            '$filter' => $_filter,
            '$expand' => $_expand,
            '$top' => $_top
        ]);
    }
    /**
     * The resources to move must be in the same source resource group. The target resource group may be in a different subscription. When moving resources, both the source group and the target group are locked for the duration of the operation. Write and delete operations are blocked on the groups until the move completes.
     * @param string $sourceResourceGroupName
     * @param array $parameters
     */
    public function moveResources(
        $sourceResourceGroupName,
        array $parameters
    )
    {
        return $this->_MoveResources_operation->call([
            'sourceResourceGroupName' => $sourceResourceGroupName,
            'parameters' => $parameters
        ]);
    }
    /**
     * This operation checks whether the specified resources can be moved to the target. The resources to move must be in the same source resource group. The target resource group may be in a different subscription. If validation succeeds, it returns HTTP response code 204 (no content). If validation fails, it returns HTTP response code 409 (Conflict) with an error message. Retrieve the URL in the Location header value to check the result of the long-running operation.
     * @param string $sourceResourceGroupName
     * @param array $parameters
     */
    public function validateMoveResources(
        $sourceResourceGroupName,
        array $parameters
    )
    {
        return $this->_ValidateMoveResources_operation->call([
            'sourceResourceGroupName' => $sourceResourceGroupName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Get all the resources in a subscription.
     * @param string|null $_filter
     * @param string|null $_expand
     * @param integer|null $_top
     * @return array
     */
    public function list_(
        $_filter = null,
        $_expand = null,
        $_top = null
    )
    {
        return $this->_List_operation->call([
            '$filter' => $_filter,
            '$expand' => $_expand,
            '$top' => $_top
        ]);
    }
    /**
     * Checks whether a resource exists.
     * @param string $resourceGroupName
     * @param string $resourceProviderNamespace
     * @param string $parentResourcePath
     * @param string $resourceType
     * @param string $resourceName
     */
    public function checkExistence(
        $resourceGroupName,
        $resourceProviderNamespace,
        $parentResourcePath,
        $resourceType,
        $resourceName
    )
    {
        return $this->_CheckExistence_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'resourceProviderNamespace' => $resourceProviderNamespace,
            'parentResourcePath' => $parentResourcePath,
            'resourceType' => $resourceType,
            'resourceName' => $resourceName
        ]);
    }
    /**
     * Deletes a resource.
     * @param string $resourceGroupName
     * @param string $resourceProviderNamespace
     * @param string $parentResourcePath
     * @param string $resourceType
     * @param string $resourceName
     */
    public function delete(
        $resourceGroupName,
        $resourceProviderNamespace,
        $parentResourcePath,
        $resourceType,
        $resourceName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'resourceProviderNamespace' => $resourceProviderNamespace,
            'parentResourcePath' => $parentResourcePath,
            'resourceType' => $resourceType,
            'resourceName' => $resourceName
        ]);
    }
    /**
     * Creates a resource.
     * @param string $resourceGroupName
     * @param string $resourceProviderNamespace
     * @param string $parentResourcePath
     * @param string $resourceType
     * @param string $resourceName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $resourceProviderNamespace,
        $parentResourcePath,
        $resourceType,
        $resourceName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'resourceProviderNamespace' => $resourceProviderNamespace,
            'parentResourcePath' => $parentResourcePath,
            'resourceType' => $resourceType,
            'resourceName' => $resourceName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Gets a resource.
     * @param string $resourceGroupName
     * @param string $resourceProviderNamespace
     * @param string $parentResourcePath
     * @param string $resourceType
     * @param string $resourceName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $resourceProviderNamespace,
        $parentResourcePath,
        $resourceType,
        $resourceName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'resourceProviderNamespace' => $resourceProviderNamespace,
            'parentResourcePath' => $parentResourcePath,
            'resourceType' => $resourceType,
            'resourceName' => $resourceName
        ]);
    }
    /**
     * Checks by ID whether a resource exists.
     * @param string $resourceId
     */
    public function checkExistenceById($resourceId)
    {
        return $this->_CheckExistenceById_operation->call(['resourceId' => $resourceId]);
    }
    /**
     * Deletes a resource by ID.
     * @param string $resourceId
     */
    public function deleteById($resourceId)
    {
        return $this->_DeleteById_operation->call(['resourceId' => $resourceId]);
    }
    /**
     * Create a resource by ID.
     * @param string $resourceId
     * @param array $parameters
     * @return array
     */
    public function createOrUpdateById(
        $resourceId,
        array $parameters
    )
    {
        return $this->_CreateOrUpdateById_operation->call([
            'resourceId' => $resourceId,
            'parameters' => $parameters
        ]);
    }
    /**
     * Gets a resource by ID.
     * @param string $resourceId
     * @return array
     */
    public function getById($resourceId)
    {
        return $this->_GetById_operation->call(['resourceId' => $resourceId]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByResourceGroup_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_MoveResources_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ValidateMoveResources_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CheckExistence_operation;
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
    private $_Get_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CheckExistenceById_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_DeleteById_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateOrUpdateById_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetById_operation;
}
