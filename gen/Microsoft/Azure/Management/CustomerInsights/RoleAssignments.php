<?php
namespace Microsoft\Azure\Management\CustomerInsights;
final class RoleAssignments
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListByHub_operation = $_client->createOperation('RoleAssignments_ListByHub');
        $this->_CreateOrUpdate_operation = $_client->createOperation('RoleAssignments_CreateOrUpdate');
        $this->_Get_operation = $_client->createOperation('RoleAssignments_Get');
        $this->_Delete_operation = $_client->createOperation('RoleAssignments_Delete');
    }
    /**
     * Gets all the role assignments for the specified hub.
     * @param string $resourceGroupName
     * @param string $hubName
     * @return array
     */
    public function listByHub(
        $resourceGroupName,
        $hubName
    )
    {
        return $this->_ListByHub_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'hubName' => $hubName
        ]);
    }
    /**
     * Creates or updates a role assignment in the hub.
     * @param string $resourceGroupName
     * @param string $hubName
     * @param string $assignmentName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $hubName,
        $assignmentName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'hubName' => $hubName,
            'assignmentName' => $assignmentName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Gets the role assignment in the hub.
     * @param string $resourceGroupName
     * @param string $hubName
     * @param string $assignmentName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $hubName,
        $assignmentName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'hubName' => $hubName,
            'assignmentName' => $assignmentName
        ]);
    }
    /**
     * Deletes the role assignment in the hub.
     * @param string $resourceGroupName
     * @param string $hubName
     * @param string $assignmentName
     */
    public function delete(
        $resourceGroupName,
        $hubName,
        $assignmentName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'hubName' => $hubName,
            'assignmentName' => $assignmentName
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByHub_operation;
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
}
