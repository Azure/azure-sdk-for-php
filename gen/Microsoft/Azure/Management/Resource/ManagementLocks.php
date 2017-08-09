<?php
namespace Microsoft\Azure\Management\Resource;
final class ManagementLocks
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_CreateOrUpdateAtResourceGroupLevel_operation = $_client->createOperation('ManagementLocks_CreateOrUpdateAtResourceGroupLevel');
        $this->_DeleteAtResourceGroupLevel_operation = $_client->createOperation('ManagementLocks_DeleteAtResourceGroupLevel');
        $this->_GetAtResourceGroupLevel_operation = $_client->createOperation('ManagementLocks_GetAtResourceGroupLevel');
        $this->_CreateOrUpdateByScope_operation = $_client->createOperation('ManagementLocks_CreateOrUpdateByScope');
        $this->_DeleteByScope_operation = $_client->createOperation('ManagementLocks_DeleteByScope');
        $this->_GetByScope_operation = $_client->createOperation('ManagementLocks_GetByScope');
        $this->_CreateOrUpdateAtResourceLevel_operation = $_client->createOperation('ManagementLocks_CreateOrUpdateAtResourceLevel');
        $this->_DeleteAtResourceLevel_operation = $_client->createOperation('ManagementLocks_DeleteAtResourceLevel');
        $this->_GetAtResourceLevel_operation = $_client->createOperation('ManagementLocks_GetAtResourceLevel');
        $this->_CreateOrUpdateAtSubscriptionLevel_operation = $_client->createOperation('ManagementLocks_CreateOrUpdateAtSubscriptionLevel');
        $this->_DeleteAtSubscriptionLevel_operation = $_client->createOperation('ManagementLocks_DeleteAtSubscriptionLevel');
        $this->_GetAtSubscriptionLevel_operation = $_client->createOperation('ManagementLocks_GetAtSubscriptionLevel');
        $this->_ListAtResourceGroupLevel_operation = $_client->createOperation('ManagementLocks_ListAtResourceGroupLevel');
        $this->_ListAtResourceLevel_operation = $_client->createOperation('ManagementLocks_ListAtResourceLevel');
        $this->_ListAtSubscriptionLevel_operation = $_client->createOperation('ManagementLocks_ListAtSubscriptionLevel');
    }
    /**
     * When you apply a lock at a parent scope, all child resources inherit the same lock. To create management locks, you must have access to Microsoft.Authorization/* or Microsoft.Authorization/locks/* actions. Of the built-in roles, only Owner and User Access Administrator are granted those actions.
     * @param string $resourceGroupName
     * @param string $lockName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdateAtResourceGroupLevel(
        $resourceGroupName,
        $lockName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdateAtResourceGroupLevel_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'lockName' => $lockName,
            'parameters' => $parameters
        ]);
    }
    /**
     * To delete management locks, you must have access to Microsoft.Authorization/* or Microsoft.Authorization/locks/* actions. Of the built-in roles, only Owner and User Access Administrator are granted those actions.
     * @param string $resourceGroupName
     * @param string $lockName
     */
    public function deleteAtResourceGroupLevel(
        $resourceGroupName,
        $lockName
    )
    {
        return $this->_DeleteAtResourceGroupLevel_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'lockName' => $lockName
        ]);
    }
    /**
     * Gets a management lock at the resource group level.
     * @param string $resourceGroupName
     * @param string $lockName
     * @return array
     */
    public function getAtResourceGroupLevel(
        $resourceGroupName,
        $lockName
    )
    {
        return $this->_GetAtResourceGroupLevel_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'lockName' => $lockName
        ]);
    }
    /**
     * Create or update a management lock by scope.
     * @param string $scope
     * @param string $lockName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdateByScope(
        $scope,
        $lockName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdateByScope_operation->call([
            'scope' => $scope,
            'lockName' => $lockName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Delete a management lock by scope.
     * @param string $scope
     * @param string $lockName
     */
    public function deleteByScope(
        $scope,
        $lockName
    )
    {
        return $this->_DeleteByScope_operation->call([
            'scope' => $scope,
            'lockName' => $lockName
        ]);
    }
    /**
     * Get a management lock by scope.
     * @param string $scope
     * @param string $lockName
     * @return array
     */
    public function getByScope(
        $scope,
        $lockName
    )
    {
        return $this->_GetByScope_operation->call([
            'scope' => $scope,
            'lockName' => $lockName
        ]);
    }
    /**
     * When you apply a lock at a parent scope, all child resources inherit the same lock. To create management locks, you must have access to Microsoft.Authorization/* or Microsoft.Authorization/locks/* actions. Of the built-in roles, only Owner and User Access Administrator are granted those actions.
     * @param string $resourceGroupName
     * @param string $resourceProviderNamespace
     * @param string $parentResourcePath
     * @param string $resourceType
     * @param string $resourceName
     * @param string $lockName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdateAtResourceLevel(
        $resourceGroupName,
        $resourceProviderNamespace,
        $parentResourcePath,
        $resourceType,
        $resourceName,
        $lockName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdateAtResourceLevel_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'resourceProviderNamespace' => $resourceProviderNamespace,
            'parentResourcePath' => $parentResourcePath,
            'resourceType' => $resourceType,
            'resourceName' => $resourceName,
            'lockName' => $lockName,
            'parameters' => $parameters
        ]);
    }
    /**
     * To delete management locks, you must have access to Microsoft.Authorization/* or Microsoft.Authorization/locks/* actions. Of the built-in roles, only Owner and User Access Administrator are granted those actions.
     * @param string $resourceGroupName
     * @param string $resourceProviderNamespace
     * @param string $parentResourcePath
     * @param string $resourceType
     * @param string $resourceName
     * @param string $lockName
     */
    public function deleteAtResourceLevel(
        $resourceGroupName,
        $resourceProviderNamespace,
        $parentResourcePath,
        $resourceType,
        $resourceName,
        $lockName
    )
    {
        return $this->_DeleteAtResourceLevel_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'resourceProviderNamespace' => $resourceProviderNamespace,
            'parentResourcePath' => $parentResourcePath,
            'resourceType' => $resourceType,
            'resourceName' => $resourceName,
            'lockName' => $lockName
        ]);
    }
    /**
     * Get the management lock of a resource or any level below resource.
     * @param string $resourceGroupName
     * @param string $resourceProviderNamespace
     * @param string $parentResourcePath
     * @param string $resourceType
     * @param string $resourceName
     * @param string $lockName
     * @return array
     */
    public function getAtResourceLevel(
        $resourceGroupName,
        $resourceProviderNamespace,
        $parentResourcePath,
        $resourceType,
        $resourceName,
        $lockName
    )
    {
        return $this->_GetAtResourceLevel_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'resourceProviderNamespace' => $resourceProviderNamespace,
            'parentResourcePath' => $parentResourcePath,
            'resourceType' => $resourceType,
            'resourceName' => $resourceName,
            'lockName' => $lockName
        ]);
    }
    /**
     * When you apply a lock at a parent scope, all child resources inherit the same lock. To create management locks, you must have access to Microsoft.Authorization/* or Microsoft.Authorization/locks/* actions. Of the built-in roles, only Owner and User Access Administrator are granted those actions.
     * @param string $lockName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdateAtSubscriptionLevel(
        $lockName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdateAtSubscriptionLevel_operation->call([
            'lockName' => $lockName,
            'parameters' => $parameters
        ]);
    }
    /**
     * To delete management locks, you must have access to Microsoft.Authorization/* or Microsoft.Authorization/locks/* actions. Of the built-in roles, only Owner and User Access Administrator are granted those actions.
     * @param string $lockName
     */
    public function deleteAtSubscriptionLevel($lockName)
    {
        return $this->_DeleteAtSubscriptionLevel_operation->call(['lockName' => $lockName]);
    }
    /**
     * Gets a management lock at the subscription level.
     * @param string $lockName
     * @return array
     */
    public function getAtSubscriptionLevel($lockName)
    {
        return $this->_GetAtSubscriptionLevel_operation->call(['lockName' => $lockName]);
    }
    /**
     * Gets all the management locks for a resource group.
     * @param string $resourceGroupName
     * @param string|null $_filter
     * @return array
     */
    public function listAtResourceGroupLevel(
        $resourceGroupName,
        $_filter = null
    )
    {
        return $this->_ListAtResourceGroupLevel_operation->call([
            'resourceGroupName' => $resourceGroupName,
            '$filter' => $_filter
        ]);
    }
    /**
     * Gets all the management locks for a resource or any level below resource.
     * @param string $resourceGroupName
     * @param string $resourceProviderNamespace
     * @param string $parentResourcePath
     * @param string $resourceType
     * @param string $resourceName
     * @param string|null $_filter
     * @return array
     */
    public function listAtResourceLevel(
        $resourceGroupName,
        $resourceProviderNamespace,
        $parentResourcePath,
        $resourceType,
        $resourceName,
        $_filter = null
    )
    {
        return $this->_ListAtResourceLevel_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'resourceProviderNamespace' => $resourceProviderNamespace,
            'parentResourcePath' => $parentResourcePath,
            'resourceType' => $resourceType,
            'resourceName' => $resourceName,
            '$filter' => $_filter
        ]);
    }
    /**
     * Gets all the management locks for a subscription.
     * @param string|null $_filter
     * @return array
     */
    public function listAtSubscriptionLevel($_filter = null)
    {
        return $this->_ListAtSubscriptionLevel_operation->call(['$filter' => $_filter]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateOrUpdateAtResourceGroupLevel_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_DeleteAtResourceGroupLevel_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetAtResourceGroupLevel_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateOrUpdateByScope_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_DeleteByScope_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetByScope_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateOrUpdateAtResourceLevel_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_DeleteAtResourceLevel_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetAtResourceLevel_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateOrUpdateAtSubscriptionLevel_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_DeleteAtSubscriptionLevel_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetAtSubscriptionLevel_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListAtResourceGroupLevel_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListAtResourceLevel_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListAtSubscriptionLevel_operation;
}
