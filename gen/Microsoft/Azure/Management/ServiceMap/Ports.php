<?php
namespace Microsoft\Azure\Management\ServiceMap;
final class Ports
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Get_operation = $_client->createOperation('Ports_Get');
        $this->_GetLiveness_operation = $_client->createOperation('Ports_GetLiveness');
        $this->_ListAcceptingProcesses_operation = $_client->createOperation('Ports_ListAcceptingProcesses');
        $this->_ListConnections_operation = $_client->createOperation('Ports_ListConnections');
    }
    /**
     * Returns the specified port. The port must be live during the specified time interval. If the port is not live during the interval, status 404 (Not Found) is returned.
     * @param string $resourceGroupName
     * @param string $workspaceName
     * @param string $machineName
     * @param string $portName
     * @param string|null $startTime
     * @param string|null $endTime
     * @return array
     */
    public function get(
        $resourceGroupName,
        $workspaceName,
        $machineName,
        $portName,
        $startTime = null,
        $endTime = null
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'workspaceName' => $workspaceName,
            'machineName' => $machineName,
            'portName' => $portName,
            'startTime' => $startTime,
            'endTime' => $endTime
        ]);
    }
    /**
     * Obtains the liveness status of the port during the specified time interval.
     * @param string $resourceGroupName
     * @param string $workspaceName
     * @param string $machineName
     * @param string $portName
     * @param string|null $startTime
     * @param string|null $endTime
     * @return array
     */
    public function getLiveness(
        $resourceGroupName,
        $workspaceName,
        $machineName,
        $portName,
        $startTime = null,
        $endTime = null
    )
    {
        return $this->_GetLiveness_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'workspaceName' => $workspaceName,
            'machineName' => $machineName,
            'portName' => $portName,
            'startTime' => $startTime,
            'endTime' => $endTime
        ]);
    }
    /**
     * Returns a collection of processes accepting on the specified port
     * @param string $resourceGroupName
     * @param string $workspaceName
     * @param string $machineName
     * @param string $portName
     * @param string|null $startTime
     * @param string|null $endTime
     * @return array
     */
    public function listAcceptingProcesses(
        $resourceGroupName,
        $workspaceName,
        $machineName,
        $portName,
        $startTime = null,
        $endTime = null
    )
    {
        return $this->_ListAcceptingProcesses_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'workspaceName' => $workspaceName,
            'machineName' => $machineName,
            'portName' => $portName,
            'startTime' => $startTime,
            'endTime' => $endTime
        ]);
    }
    /**
     * Returns a collection of connections established via the specified port.
     * @param string $resourceGroupName
     * @param string $workspaceName
     * @param string $machineName
     * @param string $portName
     * @param string|null $startTime
     * @param string|null $endTime
     * @return array
     */
    public function listConnections(
        $resourceGroupName,
        $workspaceName,
        $machineName,
        $portName,
        $startTime = null,
        $endTime = null
    )
    {
        return $this->_ListConnections_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'workspaceName' => $workspaceName,
            'machineName' => $machineName,
            'portName' => $portName,
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
    private $_ListAcceptingProcesses_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListConnections_operation;
}
