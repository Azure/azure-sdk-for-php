<?php
namespace Microsoft\Azure\Management\Network;
final class PacketCaptures
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Create_operation = $_client->createOperation('PacketCaptures_Create');
        $this->_Get_operation = $_client->createOperation('PacketCaptures_Get');
        $this->_Delete_operation = $_client->createOperation('PacketCaptures_Delete');
        $this->_Stop_operation = $_client->createOperation('PacketCaptures_Stop');
        $this->_GetStatus_operation = $_client->createOperation('PacketCaptures_GetStatus');
        $this->_List_operation = $_client->createOperation('PacketCaptures_List');
    }
    /**
     * Create and start a packet capture on the specified VM.
     * @param string $resourceGroupName
     * @param string $networkWatcherName
     * @param string $packetCaptureName
     * @param array $parameters
     * @return array
     */
    public function create(
        $resourceGroupName,
        $networkWatcherName,
        $packetCaptureName,
        array $parameters
    )
    {
        return $this->_Create_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'networkWatcherName' => $networkWatcherName,
            'packetCaptureName' => $packetCaptureName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Gets a packet capture session by name.
     * @param string $resourceGroupName
     * @param string $networkWatcherName
     * @param string $packetCaptureName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $networkWatcherName,
        $packetCaptureName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'networkWatcherName' => $networkWatcherName,
            'packetCaptureName' => $packetCaptureName
        ]);
    }
    /**
     * Deletes the specified packet capture session.
     * @param string $resourceGroupName
     * @param string $networkWatcherName
     * @param string $packetCaptureName
     */
    public function delete(
        $resourceGroupName,
        $networkWatcherName,
        $packetCaptureName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'networkWatcherName' => $networkWatcherName,
            'packetCaptureName' => $packetCaptureName
        ]);
    }
    /**
     * Stops a specified packet capture session.
     * @param string $resourceGroupName
     * @param string $networkWatcherName
     * @param string $packetCaptureName
     */
    public function stop(
        $resourceGroupName,
        $networkWatcherName,
        $packetCaptureName
    )
    {
        return $this->_Stop_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'networkWatcherName' => $networkWatcherName,
            'packetCaptureName' => $packetCaptureName
        ]);
    }
    /**
     * Query the status of a running packet capture session.
     * @param string $resourceGroupName
     * @param string $networkWatcherName
     * @param string $packetCaptureName
     * @return array
     */
    public function getStatus(
        $resourceGroupName,
        $networkWatcherName,
        $packetCaptureName
    )
    {
        return $this->_GetStatus_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'networkWatcherName' => $networkWatcherName,
            'packetCaptureName' => $packetCaptureName
        ]);
    }
    /**
     * Lists all packet capture sessions within the specified resource group.
     * @param string $resourceGroupName
     * @param string $networkWatcherName
     * @return array
     */
    public function list_(
        $resourceGroupName,
        $networkWatcherName
    )
    {
        return $this->_List_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'networkWatcherName' => $networkWatcherName
        ]);
    }
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
    private $_Delete_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Stop_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetStatus_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
}
