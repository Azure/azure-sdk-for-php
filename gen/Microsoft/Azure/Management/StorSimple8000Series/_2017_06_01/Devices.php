<?php
namespace Microsoft\Azure\Management\StorSimple8000Series\_2017_06_01;
final class Devices
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Configure_operation = $_client->createOperation('Devices_Configure');
        $this->_ListByManager_operation = $_client->createOperation('Devices_ListByManager');
        $this->_Get_operation = $_client->createOperation('Devices_Get');
        $this->_Delete_operation = $_client->createOperation('Devices_Delete');
        $this->_Update_operation = $_client->createOperation('Devices_Update');
        $this->_AuthorizeForServiceEncryptionKeyRollover_operation = $_client->createOperation('Devices_AuthorizeForServiceEncryptionKeyRollover');
        $this->_Deactivate_operation = $_client->createOperation('Devices_Deactivate');
        $this->_InstallUpdates_operation = $_client->createOperation('Devices_InstallUpdates');
        $this->_ListFailoverSets_operation = $_client->createOperation('Devices_ListFailoverSets');
        $this->_ListMetrics_operation = $_client->createOperation('Devices_ListMetrics');
        $this->_ListMetricDefinition_operation = $_client->createOperation('Devices_ListMetricDefinition');
        $this->_ScanForUpdates_operation = $_client->createOperation('Devices_ScanForUpdates');
        $this->_GetUpdateSummary_operation = $_client->createOperation('Devices_GetUpdateSummary');
        $this->_Failover_operation = $_client->createOperation('Devices_Failover');
        $this->_ListFailoverTargets_operation = $_client->createOperation('Devices_ListFailoverTargets');
    }
    /**
     * Complete minimal setup before using the device.
     * @param array $parameters
     * @param string $resourceGroupName
     * @param string $managerName
     */
    public function configure(
        array $parameters,
        $resourceGroupName,
        $managerName
    )
    {
        return $this->_Configure_operation->call([
            'parameters' => $parameters,
            'resourceGroupName' => $resourceGroupName,
            'managerName' => $managerName
        ]);
    }
    /**
     * Returns the list of devices for the specified manager.
     * @param string $resourceGroupName
     * @param string $managerName
     * @param string $_expand
     * @return array
     */
    public function listByManager(
        $resourceGroupName,
        $managerName,
        $_expand
    )
    {
        return $this->_ListByManager_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'managerName' => $managerName,
            '$expand' => $_expand
        ]);
    }
    /**
     * Returns the properties of the specified device.
     * @param string $deviceName
     * @param string $resourceGroupName
     * @param string $managerName
     * @param string $_expand
     * @return array
     */
    public function get(
        $deviceName,
        $resourceGroupName,
        $managerName,
        $_expand
    )
    {
        return $this->_Get_operation->call([
            'deviceName' => $deviceName,
            'resourceGroupName' => $resourceGroupName,
            'managerName' => $managerName,
            '$expand' => $_expand
        ]);
    }
    /**
     * Deletes the device.
     * @param string $deviceName
     * @param string $resourceGroupName
     * @param string $managerName
     */
    public function delete(
        $deviceName,
        $resourceGroupName,
        $managerName
    )
    {
        return $this->_Delete_operation->call([
            'deviceName' => $deviceName,
            'resourceGroupName' => $resourceGroupName,
            'managerName' => $managerName
        ]);
    }
    /**
     * Patches the device.
     * @param string $deviceName
     * @param array $parameters
     * @param string $resourceGroupName
     * @param string $managerName
     * @return array
     */
    public function update(
        $deviceName,
        array $parameters,
        $resourceGroupName,
        $managerName
    )
    {
        return $this->_Update_operation->call([
            'deviceName' => $deviceName,
            'parameters' => $parameters,
            'resourceGroupName' => $resourceGroupName,
            'managerName' => $managerName
        ]);
    }
    /**
     * Authorizes the specified device for service data encryption key rollover.
     * @param string $deviceName
     * @param string $resourceGroupName
     * @param string $managerName
     */
    public function authorizeForServiceEncryptionKeyRollover(
        $deviceName,
        $resourceGroupName,
        $managerName
    )
    {
        return $this->_AuthorizeForServiceEncryptionKeyRollover_operation->call([
            'deviceName' => $deviceName,
            'resourceGroupName' => $resourceGroupName,
            'managerName' => $managerName
        ]);
    }
    /**
     * Deactivates the device.
     * @param string $deviceName
     * @param string $resourceGroupName
     * @param string $managerName
     */
    public function deactivate(
        $deviceName,
        $resourceGroupName,
        $managerName
    )
    {
        return $this->_Deactivate_operation->call([
            'deviceName' => $deviceName,
            'resourceGroupName' => $resourceGroupName,
            'managerName' => $managerName
        ]);
    }
    /**
     * Downloads and installs the updates on the device.
     * @param string $deviceName
     * @param string $resourceGroupName
     * @param string $managerName
     */
    public function installUpdates(
        $deviceName,
        $resourceGroupName,
        $managerName
    )
    {
        return $this->_InstallUpdates_operation->call([
            'deviceName' => $deviceName,
            'resourceGroupName' => $resourceGroupName,
            'managerName' => $managerName
        ]);
    }
    /**
     * Returns all failover sets for a given device and their eligibility for participating in a failover. A failover set refers to a set of volume containers that need to be failed-over as a single unit to maintain data integrity.
     * @param string $deviceName
     * @param string $resourceGroupName
     * @param string $managerName
     * @return array
     */
    public function listFailoverSets(
        $deviceName,
        $resourceGroupName,
        $managerName
    )
    {
        return $this->_ListFailoverSets_operation->call([
            'deviceName' => $deviceName,
            'resourceGroupName' => $resourceGroupName,
            'managerName' => $managerName
        ]);
    }
    /**
     * Gets the metrics for the specified device.
     * @param string $deviceName
     * @param string $resourceGroupName
     * @param string $managerName
     * @param string $_filter
     * @return array
     */
    public function listMetrics(
        $deviceName,
        $resourceGroupName,
        $managerName,
        $_filter
    )
    {
        return $this->_ListMetrics_operation->call([
            'deviceName' => $deviceName,
            'resourceGroupName' => $resourceGroupName,
            'managerName' => $managerName,
            '$filter' => $_filter
        ]);
    }
    /**
     * Gets the metric definitions for the specified device.
     * @param string $deviceName
     * @param string $resourceGroupName
     * @param string $managerName
     * @return array
     */
    public function listMetricDefinition(
        $deviceName,
        $resourceGroupName,
        $managerName
    )
    {
        return $this->_ListMetricDefinition_operation->call([
            'deviceName' => $deviceName,
            'resourceGroupName' => $resourceGroupName,
            'managerName' => $managerName
        ]);
    }
    /**
     * Scans for updates on the device.
     * @param string $deviceName
     * @param string $resourceGroupName
     * @param string $managerName
     */
    public function scanForUpdates(
        $deviceName,
        $resourceGroupName,
        $managerName
    )
    {
        return $this->_ScanForUpdates_operation->call([
            'deviceName' => $deviceName,
            'resourceGroupName' => $resourceGroupName,
            'managerName' => $managerName
        ]);
    }
    /**
     * Returns the update summary of the specified device name.
     * @param string $deviceName
     * @param string $resourceGroupName
     * @param string $managerName
     * @return array
     */
    public function getUpdateSummary(
        $deviceName,
        $resourceGroupName,
        $managerName
    )
    {
        return $this->_GetUpdateSummary_operation->call([
            'deviceName' => $deviceName,
            'resourceGroupName' => $resourceGroupName,
            'managerName' => $managerName
        ]);
    }
    /**
     * Failovers a set of volume containers from a specified source device to a target device.
     * @param string $sourceDeviceName
     * @param array $parameters
     * @param string $resourceGroupName
     * @param string $managerName
     */
    public function failover(
        $sourceDeviceName,
        array $parameters,
        $resourceGroupName,
        $managerName
    )
    {
        return $this->_Failover_operation->call([
            'sourceDeviceName' => $sourceDeviceName,
            'parameters' => $parameters,
            'resourceGroupName' => $resourceGroupName,
            'managerName' => $managerName
        ]);
    }
    /**
     * Given a list of volume containers to be failed over from a source device, this method returns the eligibility result, as a failover target, for all devices under that resource.
     * @param string $sourceDeviceName
     * @param array $parameters
     * @param string $resourceGroupName
     * @param string $managerName
     * @return array
     */
    public function listFailoverTargets(
        $sourceDeviceName,
        array $parameters,
        $resourceGroupName,
        $managerName
    )
    {
        return $this->_ListFailoverTargets_operation->call([
            'sourceDeviceName' => $sourceDeviceName,
            'parameters' => $parameters,
            'resourceGroupName' => $resourceGroupName,
            'managerName' => $managerName
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Configure_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByManager_operation;
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
    private $_Update_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_AuthorizeForServiceEncryptionKeyRollover_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Deactivate_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_InstallUpdates_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListFailoverSets_operation;
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
    private $_ScanForUpdates_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetUpdateSummary_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Failover_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListFailoverTargets_operation;
}
