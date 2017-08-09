<?php
namespace Microsoft\Azure\Management\ServiceMap;
final class Machines
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListByWorkspace_operation = $_client->createOperation('Machines_ListByWorkspace');
        $this->_Get_operation = $_client->createOperation('Machines_Get');
        $this->_GetLiveness_operation = $_client->createOperation('Machines_GetLiveness');
        $this->_ListConnections_operation = $_client->createOperation('Machines_ListConnections');
        $this->_ListProcesses_operation = $_client->createOperation('Machines_ListProcesses');
        $this->_ListPorts_operation = $_client->createOperation('Machines_ListPorts');
        $this->_ListMachineGroupMembership_operation = $_client->createOperation('Machines_ListMachineGroupMembership');
    }
    /**
     * Returns a collection of machines matching the specified conditions.  The returned collection represents either machines that are active/live during the specified interval  of time (`live=true` and `startTime`/`endTime` are specified) or that are known to have existed at or  some time prior to the specified point in time (`live=false` and `timestamp` is specified).
     * @param string $resourceGroupName
     * @param string $workspaceName
     * @param boolean $live
     * @param string $startTime
     * @param string $endTime
     * @param string $timestamp
     * @param integer $_top
     * @return array
     */
    public function listByWorkspace(
        $resourceGroupName,
        $workspaceName,
        $live,
        $startTime,
        $endTime,
        $timestamp,
        $_top
    )
    {
        return $this->_ListByWorkspace_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'workspaceName' => $workspaceName,
            'live' => $live,
            'startTime' => $startTime,
            'endTime' => $endTime,
            'timestamp' => $timestamp,
            '$top' => $_top
        ]);
    }
    /**
     * Returns the specified machine.
     * @param string $resourceGroupName
     * @param string $workspaceName
     * @param string $machineName
     * @param string $timestamp
     * @return array
     */
    public function get(
        $resourceGroupName,
        $workspaceName,
        $machineName,
        $timestamp
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'workspaceName' => $workspaceName,
            'machineName' => $machineName,
            'timestamp' => $timestamp
        ]);
    }
    /**
     * Obtains the liveness status of the machine during the specified time interval.
     * @param string $resourceGroupName
     * @param string $workspaceName
     * @param string $machineName
     * @param string $startTime
     * @param string $endTime
     * @return array
     */
    public function getLiveness(
        $resourceGroupName,
        $workspaceName,
        $machineName,
        $startTime,
        $endTime
    )
    {
        return $this->_GetLiveness_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'workspaceName' => $workspaceName,
            'machineName' => $machineName,
            'startTime' => $startTime,
            'endTime' => $endTime
        ]);
    }
    /**
     * Returns a collection of connections terminating or originating at the specified machine
     * @param string $resourceGroupName
     * @param string $workspaceName
     * @param string $machineName
     * @param string $startTime
     * @param string $endTime
     * @return array
     */
    public function listConnections(
        $resourceGroupName,
        $workspaceName,
        $machineName,
        $startTime,
        $endTime
    )
    {
        return $this->_ListConnections_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'workspaceName' => $workspaceName,
            'machineName' => $machineName,
            'startTime' => $startTime,
            'endTime' => $endTime
        ]);
    }
    /**
     * Returns a collection of processes on the specified machine matching the specified conditions. The returned collection represents either processes that are active/live during the specified interval  of time (`live=true` and `startTime`/`endTime` are specified) or that are known to have existed at or  some time prior to the specified point in time (`live=false` and `timestamp` is specified).
     * @param string $resourceGroupName
     * @param string $workspaceName
     * @param string $machineName
     * @param boolean $live
     * @param string $startTime
     * @param string $endTime
     * @param string $timestamp
     * @return array
     */
    public function listProcesses(
        $resourceGroupName,
        $workspaceName,
        $machineName,
        $live,
        $startTime,
        $endTime,
        $timestamp
    )
    {
        return $this->_ListProcesses_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'workspaceName' => $workspaceName,
            'machineName' => $machineName,
            'live' => $live,
            'startTime' => $startTime,
            'endTime' => $endTime,
            'timestamp' => $timestamp
        ]);
    }
    /**
     * Returns a collection of live ports on the specified machine during the specified time interval.
     * @param string $resourceGroupName
     * @param string $workspaceName
     * @param string $machineName
     * @param string $startTime
     * @param string $endTime
     * @return array
     */
    public function listPorts(
        $resourceGroupName,
        $workspaceName,
        $machineName,
        $startTime,
        $endTime
    )
    {
        return $this->_ListPorts_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'workspaceName' => $workspaceName,
            'machineName' => $machineName,
            'startTime' => $startTime,
            'endTime' => $endTime
        ]);
    }
    /**
     * Returns a collection of machine groups this machine belongs to.
     * @param string $resourceGroupName
     * @param string $workspaceName
     * @param string $machineName
     * @return array
     */
    public function listMachineGroupMembership(
        $resourceGroupName,
        $workspaceName,
        $machineName
    )
    {
        return $this->_ListMachineGroupMembership_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'workspaceName' => $workspaceName,
            'machineName' => $machineName
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByWorkspace_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetLiveness_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListConnections_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListProcesses_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListPorts_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListMachineGroupMembership_operation;
}
