<?php
namespace Microsoft\Azure\Management\ServiceMap\_2015_11_01_preview;
final class Processes
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Get_operation = $_client->createOperation('Processes_Get');
        $this->_GetLiveness_operation = $_client->createOperation('Processes_GetLiveness');
        $this->_ListAcceptingPorts_operation = $_client->createOperation('Processes_ListAcceptingPorts');
        $this->_ListConnections_operation = $_client->createOperation('Processes_ListConnections');
    }
    /**
     * Returns the specified process.
     * @param string $resourceGroupName
     * @param string $workspaceName
     * @param string $machineName
     * @param string $processName
     * @param string $timestamp
     * @return array
     */
    public function get(
        $resourceGroupName,
        $workspaceName,
        $machineName,
        $processName,
        $timestamp
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'workspaceName' => $workspaceName,
            'machineName' => $machineName,
            'processName' => $processName,
            'timestamp' => $timestamp
        ]);
    }
    /**
     * Obtains the liveness status of the process during the specified time interval.
     * @param string $resourceGroupName
     * @param string $workspaceName
     * @param string $machineName
     * @param string $processName
     * @param string $startTime
     * @param string $endTime
     * @return array
     */
    public function getLiveness(
        $resourceGroupName,
        $workspaceName,
        $machineName,
        $processName,
        $startTime,
        $endTime
    )
    {
        return $this->_GetLiveness_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'workspaceName' => $workspaceName,
            'machineName' => $machineName,
            'processName' => $processName,
            'startTime' => $startTime,
            'endTime' => $endTime
        ]);
    }
    /**
     * Returns a collection of ports on which this process is accepting
     * @param string $resourceGroupName
     * @param string $workspaceName
     * @param string $machineName
     * @param string $processName
     * @param string $startTime
     * @param string $endTime
     * @return array
     */
    public function listAcceptingPorts(
        $resourceGroupName,
        $workspaceName,
        $machineName,
        $processName,
        $startTime,
        $endTime
    )
    {
        return $this->_ListAcceptingPorts_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'workspaceName' => $workspaceName,
            'machineName' => $machineName,
            'processName' => $processName,
            'startTime' => $startTime,
            'endTime' => $endTime
        ]);
    }
    /**
     * Returns a collection of connections terminating or originating at the specified process
     * @param string $resourceGroupName
     * @param string $workspaceName
     * @param string $machineName
     * @param string $processName
     * @param string $startTime
     * @param string $endTime
     * @return array
     */
    public function listConnections(
        $resourceGroupName,
        $workspaceName,
        $machineName,
        $processName,
        $startTime,
        $endTime
    )
    {
        return $this->_ListConnections_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'workspaceName' => $workspaceName,
            'machineName' => $machineName,
            'processName' => $processName,
            'startTime' => $startTime,
            'endTime' => $endTime
        ]);
    }
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
    private $_ListAcceptingPorts_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListConnections_operation;
}
