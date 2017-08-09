<?php
namespace Microsoft\Azure\Management\Monitor;
final class ActivityLogAlerts
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_CreateOrUpdate_operation = $_client->createOperation('ActivityLogAlerts_CreateOrUpdate');
        $this->_Get_operation = $_client->createOperation('ActivityLogAlerts_Get');
        $this->_Delete_operation = $_client->createOperation('ActivityLogAlerts_Delete');
        $this->_Update_operation = $_client->createOperation('ActivityLogAlerts_Update');
        $this->_ListBySubscriptionId_operation = $_client->createOperation('ActivityLogAlerts_ListBySubscriptionId');
        $this->_ListByResourceGroup_operation = $_client->createOperation('ActivityLogAlerts_ListByResourceGroup');
    }
    /**
     * Create a new activity log alert or update an existing one.
     * @param string $resourceGroupName
     * @param string $activityLogAlertName
     * @param array $activityLogAlert
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $activityLogAlertName,
        array $activityLogAlert
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'activityLogAlertName' => $activityLogAlertName,
            'activityLogAlert' => $activityLogAlert
        ]);
    }
    /**
     * Get an activity log alert.
     * @param string $resourceGroupName
     * @param string $activityLogAlertName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $activityLogAlertName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'activityLogAlertName' => $activityLogAlertName
        ]);
    }
    /**
     * Delete an activity log alert.
     * @param string $resourceGroupName
     * @param string $activityLogAlertName
     */
    public function delete(
        $resourceGroupName,
        $activityLogAlertName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'activityLogAlertName' => $activityLogAlertName
        ]);
    }
    /**
     * Updates an existing ActivityLogAlertResource's tags. To update other fields use the CreateOrUpdate method.
     * @param string $resourceGroupName
     * @param string $activityLogAlertName
     * @param array $activityLogAlertPatch
     * @return array
     */
    public function update(
        $resourceGroupName,
        $activityLogAlertName,
        array $activityLogAlertPatch
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'activityLogAlertName' => $activityLogAlertName,
            'activityLogAlertPatch' => $activityLogAlertPatch
        ]);
    }
    /**
     * Get a list of all activity log alerts in a subscription.
     * @return array
     */
    public function listBySubscriptionId()
    {
        return $this->_ListBySubscriptionId_operation->call([]);
    }
    /**
     * Get a list of all activity log alerts in a resource group.
     * @param string $resourceGroupName
     * @return array
     */
    public function listByResourceGroup($resourceGroupName)
    {
        return $this->_ListByResourceGroup_operation->call(['resourceGroupName' => $resourceGroupName]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateOrUpdate_operation;
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
    private $_ListBySubscriptionId_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByResourceGroup_operation;
}
