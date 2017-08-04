<?php
namespace Microsoft\Azure\Management\StorSimple8000Series\_2017_06_01;
final class Volumes
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListByVolumeContainer_operation = $_client->createOperation('Volumes_ListByVolumeContainer');
        $this->_Get_operation = $_client->createOperation('Volumes_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('Volumes_CreateOrUpdate');
        $this->_Delete_operation = $_client->createOperation('Volumes_Delete');
        $this->_ListMetrics_operation = $_client->createOperation('Volumes_ListMetrics');
        $this->_ListMetricDefinition_operation = $_client->createOperation('Volumes_ListMetricDefinition');
        $this->_ListByDevice_operation = $_client->createOperation('Volumes_ListByDevice');
    }
    /**
     * Retrieves all the volumes in a volume container.
     * @param string $deviceName
     * @param string $volumeContainerName
     * @param string $resourceGroupName
     * @param string $managerName
     * @return array
     */
    public function listByVolumeContainer(
        $deviceName,
        $volumeContainerName,
        $resourceGroupName,
        $managerName
    )
    {
        return $this->_ListByVolumeContainer_operation->call([
            'deviceName' => $deviceName,
            'volumeContainerName' => $volumeContainerName,
            'resourceGroupName' => $resourceGroupName,
            'managerName' => $managerName
        ]);
    }
    /**
     * Returns the properties of the specified volume name.
     * @param string $deviceName
     * @param string $volumeContainerName
     * @param string $volumeName
     * @param string $resourceGroupName
     * @param string $managerName
     * @return array
     */
    public function get(
        $deviceName,
        $volumeContainerName,
        $volumeName,
        $resourceGroupName,
        $managerName
    )
    {
        return $this->_Get_operation->call([
            'deviceName' => $deviceName,
            'volumeContainerName' => $volumeContainerName,
            'volumeName' => $volumeName,
            'resourceGroupName' => $resourceGroupName,
            'managerName' => $managerName
        ]);
    }
    /**
     * Creates or updates the volume.
     * @param string $deviceName
     * @param string $volumeContainerName
     * @param string $volumeName
     * @param array $parameters
     * @param string $resourceGroupName
     * @param string $managerName
     * @return array
     */
    public function createOrUpdate(
        $deviceName,
        $volumeContainerName,
        $volumeName,
        array $parameters,
        $resourceGroupName,
        $managerName
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'deviceName' => $deviceName,
            'volumeContainerName' => $volumeContainerName,
            'volumeName' => $volumeName,
            'parameters' => $parameters,
            'resourceGroupName' => $resourceGroupName,
            'managerName' => $managerName
        ]);
    }
    /**
     * Deletes the volume.
     * @param string $deviceName
     * @param string $volumeContainerName
     * @param string $volumeName
     * @param string $resourceGroupName
     * @param string $managerName
     */
    public function delete(
        $deviceName,
        $volumeContainerName,
        $volumeName,
        $resourceGroupName,
        $managerName
    )
    {
        return $this->_Delete_operation->call([
            'deviceName' => $deviceName,
            'volumeContainerName' => $volumeContainerName,
            'volumeName' => $volumeName,
            'resourceGroupName' => $resourceGroupName,
            'managerName' => $managerName
        ]);
    }
    /**
     * Gets the metrics for the specified volume.
     * @param string $deviceName
     * @param string $volumeContainerName
     * @param string $volumeName
     * @param string $resourceGroupName
     * @param string $managerName
     * @param string $_filter
     * @return array
     */
    public function listMetrics(
        $deviceName,
        $volumeContainerName,
        $volumeName,
        $resourceGroupName,
        $managerName,
        $_filter
    )
    {
        return $this->_ListMetrics_operation->call([
            'deviceName' => $deviceName,
            'volumeContainerName' => $volumeContainerName,
            'volumeName' => $volumeName,
            'resourceGroupName' => $resourceGroupName,
            'managerName' => $managerName,
            '$filter' => $_filter
        ]);
    }
    /**
     * Gets the metric definitions for the specified volume.
     * @param string $deviceName
     * @param string $volumeContainerName
     * @param string $volumeName
     * @param string $resourceGroupName
     * @param string $managerName
     * @return array
     */
    public function listMetricDefinition(
        $deviceName,
        $volumeContainerName,
        $volumeName,
        $resourceGroupName,
        $managerName
    )
    {
        return $this->_ListMetricDefinition_operation->call([
            'deviceName' => $deviceName,
            'volumeContainerName' => $volumeContainerName,
            'volumeName' => $volumeName,
            'resourceGroupName' => $resourceGroupName,
            'managerName' => $managerName
        ]);
    }
    /**
     * Retrieves all the volumes in a device.
     * @param string $deviceName
     * @param string $resourceGroupName
     * @param string $managerName
     * @return array
     */
    public function listByDevice(
        $deviceName,
        $resourceGroupName,
        $managerName
    )
    {
        return $this->_ListByDevice_operation->call([
            'deviceName' => $deviceName,
            'resourceGroupName' => $resourceGroupName,
            'managerName' => $managerName
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByVolumeContainer_operation;
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
    private $_Delete_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListMetrics_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListMetricDefinition_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByDevice_operation;
}
