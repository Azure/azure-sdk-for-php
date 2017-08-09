<?php
namespace Microsoft\Azure\Management\StorSimple8000Series;
final class BackupSchedules
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListByBackupPolicy_operation = $_client->createOperation('BackupSchedules_ListByBackupPolicy');
        $this->_Get_operation = $_client->createOperation('BackupSchedules_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('BackupSchedules_CreateOrUpdate');
        $this->_Delete_operation = $_client->createOperation('BackupSchedules_Delete');
    }
    /**
     * Gets all the backup schedules in a backup policy.
     * @param string $deviceName
     * @param string $backupPolicyName
     * @param string $resourceGroupName
     * @param string $managerName
     * @return array
     */
    public function listByBackupPolicy(
        $deviceName,
        $backupPolicyName,
        $resourceGroupName,
        $managerName
    )
    {
        return $this->_ListByBackupPolicy_operation->call([
            'deviceName' => $deviceName,
            'backupPolicyName' => $backupPolicyName,
            'resourceGroupName' => $resourceGroupName,
            'managerName' => $managerName
        ]);
    }
    /**
     * Gets the properties of the specified backup schedule name.
     * @param string $deviceName
     * @param string $backupPolicyName
     * @param string $backupScheduleName
     * @param string $resourceGroupName
     * @param string $managerName
     * @return array
     */
    public function get(
        $deviceName,
        $backupPolicyName,
        $backupScheduleName,
        $resourceGroupName,
        $managerName
    )
    {
        return $this->_Get_operation->call([
            'deviceName' => $deviceName,
            'backupPolicyName' => $backupPolicyName,
            'backupScheduleName' => $backupScheduleName,
            'resourceGroupName' => $resourceGroupName,
            'managerName' => $managerName
        ]);
    }
    /**
     * Creates or updates the backup schedule.
     * @param string $deviceName
     * @param string $backupPolicyName
     * @param string $backupScheduleName
     * @param array $parameters
     * @param string $resourceGroupName
     * @param string $managerName
     * @return array
     */
    public function createOrUpdate(
        $deviceName,
        $backupPolicyName,
        $backupScheduleName,
        array $parameters,
        $resourceGroupName,
        $managerName
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'deviceName' => $deviceName,
            'backupPolicyName' => $backupPolicyName,
            'backupScheduleName' => $backupScheduleName,
            'parameters' => $parameters,
            'resourceGroupName' => $resourceGroupName,
            'managerName' => $managerName
        ]);
    }
    /**
     * Deletes the backup schedule.
     * @param string $deviceName
     * @param string $backupPolicyName
     * @param string $backupScheduleName
     * @param string $resourceGroupName
     * @param string $managerName
     */
    public function delete(
        $deviceName,
        $backupPolicyName,
        $backupScheduleName,
        $resourceGroupName,
        $managerName
    )
    {
        return $this->_Delete_operation->call([
            'deviceName' => $deviceName,
            'backupPolicyName' => $backupPolicyName,
            'backupScheduleName' => $backupScheduleName,
            'resourceGroupName' => $resourceGroupName,
            'managerName' => $managerName
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByBackupPolicy_operation;
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
