<?php
namespace Microsoft\Azure\Management\StorSimple8000Series;
final class Backups
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListByDevice_operation = $_client->createOperation('Backups_ListByDevice');
        $this->_Delete_operation = $_client->createOperation('Backups_Delete');
        $this->_Clone_operation = $_client->createOperation('Backups_Clone');
        $this->_Restore_operation = $_client->createOperation('Backups_Restore');
    }
    /**
     * Retrieves all the backups in a device.
     * @param string $deviceName
     * @param string $resourceGroupName
     * @param string $managerName
     * @param string|null $_filter
     * @return array
     */
    public function listByDevice(
        $deviceName,
        $resourceGroupName,
        $managerName,
        $_filter = null
    )
    {
        return $this->_ListByDevice_operation->call([
            'deviceName' => $deviceName,
            'resourceGroupName' => $resourceGroupName,
            'managerName' => $managerName,
            '$filter' => $_filter
        ]);
    }
    /**
     * Deletes the backup.
     * @param string $deviceName
     * @param string $backupName
     * @param string $resourceGroupName
     * @param string $managerName
     */
    public function delete(
        $deviceName,
        $backupName,
        $resourceGroupName,
        $managerName
    )
    {
        return $this->_Delete_operation->call([
            'deviceName' => $deviceName,
            'backupName' => $backupName,
            'resourceGroupName' => $resourceGroupName,
            'managerName' => $managerName
        ]);
    }
    /**
     * Clones the backup element as a new volume.
     * @param string $deviceName
     * @param string $backupName
     * @param string $backupElementName
     * @param array $parameters
     * @param string $resourceGroupName
     * @param string $managerName
     */
    public function clone_(
        $deviceName,
        $backupName,
        $backupElementName,
        array $parameters,
        $resourceGroupName,
        $managerName
    )
    {
        return $this->_Clone_operation->call([
            'deviceName' => $deviceName,
            'backupName' => $backupName,
            'backupElementName' => $backupElementName,
            'parameters' => $parameters,
            'resourceGroupName' => $resourceGroupName,
            'managerName' => $managerName
        ]);
    }
    /**
     * Restores the backup on the device.
     * @param string $deviceName
     * @param string $backupName
     * @param string $resourceGroupName
     * @param string $managerName
     */
    public function restore(
        $deviceName,
        $backupName,
        $resourceGroupName,
        $managerName
    )
    {
        return $this->_Restore_operation->call([
            'deviceName' => $deviceName,
            'backupName' => $backupName,
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
    private $_Delete_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Clone_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Restore_operation;
}
