<?php
namespace Microsoft\Azure\Management\StorSimple8000Series;
final class DeviceSettings
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_GetAlertSettings_operation = $_client->createOperation('DeviceSettings_GetAlertSettings');
        $this->_CreateOrUpdateAlertSettings_operation = $_client->createOperation('DeviceSettings_CreateOrUpdateAlertSettings');
        $this->_GetNetworkSettings_operation = $_client->createOperation('DeviceSettings_GetNetworkSettings');
        $this->_UpdateNetworkSettings_operation = $_client->createOperation('DeviceSettings_UpdateNetworkSettings');
        $this->_GetSecuritySettings_operation = $_client->createOperation('DeviceSettings_GetSecuritySettings');
        $this->_UpdateSecuritySettings_operation = $_client->createOperation('DeviceSettings_UpdateSecuritySettings');
        $this->_SyncRemotemanagementCertificate_operation = $_client->createOperation('DeviceSettings_SyncRemotemanagementCertificate');
        $this->_GetTimeSettings_operation = $_client->createOperation('DeviceSettings_GetTimeSettings');
        $this->_CreateOrUpdateTimeSettings_operation = $_client->createOperation('DeviceSettings_CreateOrUpdateTimeSettings');
    }
    /**
     * Gets the alert settings of the specified device.
     * @param string $deviceName
     * @param string $resourceGroupName
     * @param string $managerName
     * @return array
     */
    public function getAlertSettings(
        $deviceName,
        $resourceGroupName,
        $managerName
    )
    {
        return $this->_GetAlertSettings_operation->call([
            'deviceName' => $deviceName,
            'resourceGroupName' => $resourceGroupName,
            'managerName' => $managerName
        ]);
    }
    /**
     * Creates or updates the alert settings of the specified device.
     * @param string $deviceName
     * @param array $parameters
     * @param string $resourceGroupName
     * @param string $managerName
     * @return array
     */
    public function createOrUpdateAlertSettings(
        $deviceName,
        array $parameters,
        $resourceGroupName,
        $managerName
    )
    {
        return $this->_CreateOrUpdateAlertSettings_operation->call([
            'deviceName' => $deviceName,
            'parameters' => $parameters,
            'resourceGroupName' => $resourceGroupName,
            'managerName' => $managerName
        ]);
    }
    /**
     * Gets the network settings of the specified device.
     * @param string $deviceName
     * @param string $resourceGroupName
     * @param string $managerName
     * @return array
     */
    public function getNetworkSettings(
        $deviceName,
        $resourceGroupName,
        $managerName
    )
    {
        return $this->_GetNetworkSettings_operation->call([
            'deviceName' => $deviceName,
            'resourceGroupName' => $resourceGroupName,
            'managerName' => $managerName
        ]);
    }
    /**
     * Updates the network settings on the specified device.
     * @param string $deviceName
     * @param array $parameters
     * @param string $resourceGroupName
     * @param string $managerName
     * @return array
     */
    public function updateNetworkSettings(
        $deviceName,
        array $parameters,
        $resourceGroupName,
        $managerName
    )
    {
        return $this->_UpdateNetworkSettings_operation->call([
            'deviceName' => $deviceName,
            'parameters' => $parameters,
            'resourceGroupName' => $resourceGroupName,
            'managerName' => $managerName
        ]);
    }
    /**
     * Returns the Security properties of the specified device name.
     * @param string $deviceName
     * @param string $resourceGroupName
     * @param string $managerName
     * @return array
     */
    public function getSecuritySettings(
        $deviceName,
        $resourceGroupName,
        $managerName
    )
    {
        return $this->_GetSecuritySettings_operation->call([
            'deviceName' => $deviceName,
            'resourceGroupName' => $resourceGroupName,
            'managerName' => $managerName
        ]);
    }
    /**
     * Patch Security properties of the specified device name.
     * @param string $deviceName
     * @param array $parameters
     * @param string $resourceGroupName
     * @param string $managerName
     * @return array
     */
    public function updateSecuritySettings(
        $deviceName,
        array $parameters,
        $resourceGroupName,
        $managerName
    )
    {
        return $this->_UpdateSecuritySettings_operation->call([
            'deviceName' => $deviceName,
            'parameters' => $parameters,
            'resourceGroupName' => $resourceGroupName,
            'managerName' => $managerName
        ]);
    }
    /**
     * sync Remote management Certificate between appliance and Service
     * @param string $deviceName
     * @param string $resourceGroupName
     * @param string $managerName
     */
    public function syncRemotemanagementCertificate(
        $deviceName,
        $resourceGroupName,
        $managerName
    )
    {
        return $this->_SyncRemotemanagementCertificate_operation->call([
            'deviceName' => $deviceName,
            'resourceGroupName' => $resourceGroupName,
            'managerName' => $managerName
        ]);
    }
    /**
     * Gets the time settings of the specified device.
     * @param string $deviceName
     * @param string $resourceGroupName
     * @param string $managerName
     * @return array
     */
    public function getTimeSettings(
        $deviceName,
        $resourceGroupName,
        $managerName
    )
    {
        return $this->_GetTimeSettings_operation->call([
            'deviceName' => $deviceName,
            'resourceGroupName' => $resourceGroupName,
            'managerName' => $managerName
        ]);
    }
    /**
     * Creates or updates the time settings of the specified device.
     * @param string $deviceName
     * @param array $parameters
     * @param string $resourceGroupName
     * @param string $managerName
     * @return array
     */
    public function createOrUpdateTimeSettings(
        $deviceName,
        array $parameters,
        $resourceGroupName,
        $managerName
    )
    {
        return $this->_CreateOrUpdateTimeSettings_operation->call([
            'deviceName' => $deviceName,
            'parameters' => $parameters,
            'resourceGroupName' => $resourceGroupName,
            'managerName' => $managerName
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetAlertSettings_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateOrUpdateAlertSettings_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetNetworkSettings_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_UpdateNetworkSettings_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetSecuritySettings_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_UpdateSecuritySettings_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_SyncRemotemanagementCertificate_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetTimeSettings_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateOrUpdateTimeSettings_operation;
}
