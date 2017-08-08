<?php
namespace Microsoft\Azure\Management\ApiManagement\_2017_03_01;
final class GroupUser
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_List_operation = $_client->createOperation('GroupUser_List');
        $this->_Create_operation = $_client->createOperation('GroupUser_Create');
        $this->_Delete_operation = $_client->createOperation('GroupUser_Delete');
    }
    /**
     * Lists a collection of the members of the group, specified by its identifier.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $groupId
     * @param string $_filter
     * @param integer $_top
     * @param integer $_skip
     * @return array
     */
    public function list_(
        $resourceGroupName,
        $serviceName,
        $groupId,
        $_filter,
        $_top,
        $_skip
    )
    {
        return $this->_List_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'groupId' => $groupId,
            '$filter' => $_filter,
            '$top' => $_top,
            '$skip' => $_skip
        ]);
    }
    /**
     * Adds a user to the specified group.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $groupId
     * @param string $uid
     * @return array
     */
    public function create(
        $resourceGroupName,
        $serviceName,
        $groupId,
        $uid
    )
    {
        return $this->_Create_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'groupId' => $groupId,
            'uid' => $uid
        ]);
    }
    /**
     * Remove existing user from existing group.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $groupId
     * @param string $uid
     */
    public function delete(
        $resourceGroupName,
        $serviceName,
        $groupId,
        $uid
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'groupId' => $groupId,
            'uid' => $uid
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Create_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Delete_operation;
}
