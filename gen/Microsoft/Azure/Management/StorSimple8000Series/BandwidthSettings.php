<?php
namespace Microsoft\Azure\Management\StorSimple8000Series;
final class BandwidthSettings
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListByManager_operation = $_client->createOperation('BandwidthSettings_ListByManager');
        $this->_Get_operation = $_client->createOperation('BandwidthSettings_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('BandwidthSettings_CreateOrUpdate');
        $this->_Delete_operation = $_client->createOperation('BandwidthSettings_Delete');
    }
    /**
     * Retrieves all the bandwidth setting in a manager.
     * @param string $resourceGroupName
     * @param string $managerName
     * @return array
     */
    public function listByManager(
        $resourceGroupName,
        $managerName
    )
    {
        return $this->_ListByManager_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'managerName' => $managerName
        ]);
    }
    /**
     * Returns the properties of the specified bandwidth setting name.
     * @param string $bandwidthSettingName
     * @param string $resourceGroupName
     * @param string $managerName
     * @return array
     */
    public function get(
        $bandwidthSettingName,
        $resourceGroupName,
        $managerName
    )
    {
        return $this->_Get_operation->call([
            'bandwidthSettingName' => $bandwidthSettingName,
            'resourceGroupName' => $resourceGroupName,
            'managerName' => $managerName
        ]);
    }
    /**
     * Creates or updates the bandwidth setting
     * @param string $bandwidthSettingName
     * @param array $parameters
     * @param string $resourceGroupName
     * @param string $managerName
     * @return array
     */
    public function createOrUpdate(
        $bandwidthSettingName,
        array $parameters,
        $resourceGroupName,
        $managerName
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'bandwidthSettingName' => $bandwidthSettingName,
            'parameters' => $parameters,
            'resourceGroupName' => $resourceGroupName,
            'managerName' => $managerName
        ]);
    }
    /**
     * Deletes the bandwidth setting
     * @param string $bandwidthSettingName
     * @param string $resourceGroupName
     * @param string $managerName
     */
    public function delete(
        $bandwidthSettingName,
        $resourceGroupName,
        $managerName
    )
    {
        return $this->_Delete_operation->call([
            'bandwidthSettingName' => $bandwidthSettingName,
            'resourceGroupName' => $resourceGroupName,
            'managerName' => $managerName
        ]);
    }
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
    private $_CreateOrUpdate_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Delete_operation;
}
