<?php
namespace Microsoft\Azure\Management\ApiManagement;
final class Group
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListByService_operation = $_client->createOperation('Group_ListByService');
        $this->_Get_operation = $_client->createOperation('Group_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('Group_CreateOrUpdate');
        $this->_Update_operation = $_client->createOperation('Group_Update');
        $this->_Delete_operation = $_client->createOperation('Group_Delete');
    }
    /**
     * Lists a collection of groups defined within a service instance.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string|null $_filter
     * @param integer|null $_top
     * @param integer|null $_skip
     * @return array
     */
    public function listByService(
        $resourceGroupName,
        $serviceName,
        $_filter = null,
        $_top = null,
        $_skip = null
    )
    {
        return $this->_ListByService_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            '$filter' => $_filter,
            '$top' => $_top,
            '$skip' => $_skip
        ]);
    }
    /**
     * Gets the details of the group specified by its identifier.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $groupId
     * @return array
     */
    public function get(
        $resourceGroupName,
        $serviceName,
        $groupId
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'groupId' => $groupId
        ]);
    }
    /**
     * Creates or Updates a group.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $groupId
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $serviceName,
        $groupId,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'groupId' => $groupId,
            'parameters' => $parameters
        ]);
    }
    /**
     * Updates the details of the group specified by its identifier.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $groupId
     * @param array $parameters
     * @param string $if_Match
     */
    public function update(
        $resourceGroupName,
        $serviceName,
        $groupId,
        array $parameters,
        $if_Match
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'groupId' => $groupId,
            'parameters' => $parameters,
            'If-Match' => $if_Match
        ]);
    }
    /**
     * Deletes specific group of the API Management service instance.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $groupId
     * @param string $if_Match
     */
    public function delete(
        $resourceGroupName,
        $serviceName,
        $groupId,
        $if_Match
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'groupId' => $groupId,
            'If-Match' => $if_Match
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByService_operation;
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
    private $_Update_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Delete_operation;
}
