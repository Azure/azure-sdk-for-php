<?php
namespace Microsoft\Azure\Management\StorSimple8000Series;
final class VolumeContainers
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListByDevice_operation = $_client->createOperation('VolumeContainers_ListByDevice');
        $this->_Get_operation = $_client->createOperation('VolumeContainers_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('VolumeContainers_CreateOrUpdate');
        $this->_Delete_operation = $_client->createOperation('VolumeContainers_Delete');
        $this->_ListMetrics_operation = $_client->createOperation('VolumeContainers_ListMetrics');
        $this->_ListMetricDefinition_operation = $_client->createOperation('VolumeContainers_ListMetricDefinition');
    }
    /**
     * Gets all the volume containers in a device.
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
     * Gets the properties of the specified volume container name.
     * @param string $deviceName
     * @param string $volumeContainerName
     * @param string $resourceGroupName
     * @param string $managerName
     * @return array
     */
    public function get(
        $deviceName,
        $volumeContainerName,
        $resourceGroupName,
        $managerName
    )
    {
        return $this->_Get_operation->call([
            'deviceName' => $deviceName,
            'volumeContainerName' => $volumeContainerName,
            'resourceGroupName' => $resourceGroupName,
            'managerName' => $managerName
        ]);
    }
    /**
     * Creates or updates the volume container.
     * @param string $deviceName
     * @param string $volumeContainerName
     * @param array $parameters
     * @param string $resourceGroupName
     * @param string $managerName
     * @return array
     */
    public function createOrUpdate(
        $deviceName,
        $volumeContainerName,
        array $parameters,
        $resourceGroupName,
        $managerName
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'deviceName' => $deviceName,
            'volumeContainerName' => $volumeContainerName,
            'parameters' => $parameters,
            'resourceGroupName' => $resourceGroupName,
            'managerName' => $managerName
        ]);
    }
    /**
     * Deletes the volume container.
     * @param string $deviceName
     * @param string $volumeContainerName
     * @param string $resourceGroupName
     * @param string $managerName
     */
    public function delete(
        $deviceName,
        $volumeContainerName,
        $resourceGroupName,
        $managerName
    )
    {
        return $this->_Delete_operation->call([
            'deviceName' => $deviceName,
            'volumeContainerName' => $volumeContainerName,
            'resourceGroupName' => $resourceGroupName,
            'managerName' => $managerName
        ]);
    }
    /**
     * Gets the metrics for the specified volume container.
     * @param string $deviceName
     * @param string $volumeContainerName
     * @param string $resourceGroupName
     * @param string $managerName
     * @param string $_filter
     * @return array
     */
    public function listMetrics(
        $deviceName,
        $volumeContainerName,
        $resourceGroupName,
        $managerName,
        $_filter
    )
    {
        return $this->_ListMetrics_operation->call([
            'deviceName' => $deviceName,
            'volumeContainerName' => $volumeContainerName,
            'resourceGroupName' => $resourceGroupName,
            'managerName' => $managerName,
            '$filter' => $_filter
        ]);
    }
    /**
     * Gets the metric definitions for the specified volume container.
     * @param string $deviceName
     * @param string $volumeContainerName
     * @param string $resourceGroupName
     * @param string $managerName
     * @return array
     */
    public function listMetricDefinition(
        $deviceName,
        $volumeContainerName,
        $resourceGroupName,
        $managerName
    )
    {
        return $this->_ListMetricDefinition_operation->call([
            'deviceName' => $deviceName,
            'volumeContainerName' => $volumeContainerName,
            'resourceGroupName' => $resourceGroupName,
            'managerName' => $managerName
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByDevice_operation;
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
}
