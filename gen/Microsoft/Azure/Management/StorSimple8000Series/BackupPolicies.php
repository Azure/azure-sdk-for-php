<?php
namespace Microsoft\Azure\Management\StorSimple8000Series;
final class BackupPolicies
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListByDevice_operation = $_client->createOperation('BackupPolicies_ListByDevice');
        $this->_Get_operation = $_client->createOperation('BackupPolicies_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('BackupPolicies_CreateOrUpdate');
        $this->_Delete_operation = $_client->createOperation('BackupPolicies_Delete');
        $this->_BackupNow_operation = $_client->createOperation('BackupPolicies_BackupNow');
    }
    /**
     * Gets all the backup policies in a device.
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
     * Gets the properties of the specified backup policy name.
     * @param string $deviceName
     * @param string $backupPolicyName
     * @param string $resourceGroupName
     * @param string $managerName
     * @return array
     */
    public function get(
        $deviceName,
        $backupPolicyName,
        $resourceGroupName,
        $managerName
    )
    {
        return $this->_Get_operation->call([
            'deviceName' => $deviceName,
            'backupPolicyName' => $backupPolicyName,
            'resourceGroupName' => $resourceGroupName,
            'managerName' => $managerName
        ]);
    }
    /**
     * Creates or updates the backup policy.
     * @param string $deviceName
     * @param string $backupPolicyName
     * @param array $parameters
     * @param string $resourceGroupName
     * @param string $managerName
     * @return array
     */
    public function createOrUpdate(
        $deviceName,
        $backupPolicyName,
        array $parameters,
        $resourceGroupName,
        $managerName
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'deviceName' => $deviceName,
            'backupPolicyName' => $backupPolicyName,
            'parameters' => $parameters,
            'resourceGroupName' => $resourceGroupName,
            'managerName' => $managerName
        ]);
    }
    /**
     * Deletes the backup policy.
     * @param string $deviceName
     * @param string $backupPolicyName
     * @param string $resourceGroupName
     * @param string $managerName
     */
    public function delete(
        $deviceName,
        $backupPolicyName,
        $resourceGroupName,
        $managerName
    )
    {
        return $this->_Delete_operation->call([
            'deviceName' => $deviceName,
            'backupPolicyName' => $backupPolicyName,
            'resourceGroupName' => $resourceGroupName,
            'managerName' => $managerName
        ]);
    }
    /**
     * Backup the backup policy now.
     * @param string $deviceName
     * @param string $backupPolicyName
     * @param string $backupType
     * @param string $resourceGroupName
     * @param string $managerName
     */
    public function backupNow(
        $deviceName,
        $backupPolicyName,
        $backupType,
        $resourceGroupName,
        $managerName
    )
    {
        return $this->_BackupNow_operation->call([
            'deviceName' => $deviceName,
            'backupPolicyName' => $backupPolicyName,
            'backupType' => $backupType,
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
    private $_BackupNow_operation;
}
