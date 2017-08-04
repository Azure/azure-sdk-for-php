<?php
namespace Microsoft\Azure\Management\ServiceMap\_2015_11_01_preview;
final class MachineGroups
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListByWorkspace_operation = $_client->createOperation('MachineGroups_ListByWorkspace');
        $this->_Create_operation = $_client->createOperation('MachineGroups_Create');
        $this->_Get_operation = $_client->createOperation('MachineGroups_Get');
        $this->_Update_operation = $_client->createOperation('MachineGroups_Update');
        $this->_Delete_operation = $_client->createOperation('MachineGroups_Delete');
    }
    /**
     * Returns all machine groups.
     * @param string $resourceGroupName
     * @param string $workspaceName
     * @return array
     */
    public function listByWorkspace(
        $resourceGroupName,
        $workspaceName
    )
    {
        return $this->_ListByWorkspace_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'workspaceName' => $workspaceName
        ]);
    }
    /**
     * Creates a new machine group.
     * @param string $resourceGroupName
     * @param string $workspaceName
     * @param array $machineGroup
     * @return array
     */
    public function create(
        $resourceGroupName,
        $workspaceName,
        array $machineGroup
    )
    {
        return $this->_Create_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'workspaceName' => $workspaceName,
            'machineGroup' => $machineGroup
        ]);
    }
    /**
     * Returns the specified machine group.
     * @param string $resourceGroupName
     * @param string $workspaceName
     * @param string $machineGroupName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $workspaceName,
        $machineGroupName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'workspaceName' => $workspaceName,
            'machineGroupName' => $machineGroupName
        ]);
    }
    /**
     * Updates a machine group.
     * @param string $resourceGroupName
     * @param string $workspaceName
     * @param string $machineGroupName
     * @param array $machineGroup
     * @return array
     */
    public function update(
        $resourceGroupName,
        $workspaceName,
        $machineGroupName,
        array $machineGroup
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'workspaceName' => $workspaceName,
            'machineGroupName' => $machineGroupName,
            'machineGroup' => $machineGroup
        ]);
    }
    /**
     * Deletes the specified Machine Group.
     * @param string $resourceGroupName
     * @param string $workspaceName
     * @param string $machineGroupName
     */
    public function delete(
        $resourceGroupName,
        $workspaceName,
        $machineGroupName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'workspaceName' => $workspaceName,
            'machineGroupName' => $machineGroupName
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByWorkspace_operation;
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
    private $_Update_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Delete_operation;
}
