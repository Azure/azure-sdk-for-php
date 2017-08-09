<?php
namespace Microsoft\Azure\Management\Monitor;
final class ActionGroups
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_CreateOrUpdate_operation = $_client->createOperation('ActionGroups_CreateOrUpdate');
        $this->_Get_operation = $_client->createOperation('ActionGroups_Get');
        $this->_Delete_operation = $_client->createOperation('ActionGroups_Delete');
        $this->_ListBySubscriptionId_operation = $_client->createOperation('ActionGroups_ListBySubscriptionId');
        $this->_ListByResourceGroup_operation = $_client->createOperation('ActionGroups_ListByResourceGroup');
        $this->_EnableReceiver_operation = $_client->createOperation('ActionGroups_EnableReceiver');
    }
    /**
     * Create a new action group or update an existing one.
     * @param string $resourceGroupName
     * @param string $actionGroupName
     * @param array $actionGroup
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $actionGroupName,
        array $actionGroup
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'actionGroupName' => $actionGroupName,
            'actionGroup' => $actionGroup
        ]);
    }
    /**
     * Get an action group.
     * @param string $resourceGroupName
     * @param string $actionGroupName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $actionGroupName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'actionGroupName' => $actionGroupName
        ]);
    }
    /**
     * Delete an action group.
     * @param string $resourceGroupName
     * @param string $actionGroupName
     */
    public function delete(
        $resourceGroupName,
        $actionGroupName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'actionGroupName' => $actionGroupName
        ]);
    }
    /**
     * Get a list of all action groups in a subscription.
     * @return array
     */
    public function listBySubscriptionId()
    {
        return $this->_ListBySubscriptionId_operation->call([]);
    }
    /**
     * Get a list of all action groups in a resource group.
     * @param string $resourceGroupName
     * @return array
     */
    public function listByResourceGroup($resourceGroupName)
    {
        return $this->_ListByResourceGroup_operation->call(['resourceGroupName' => $resourceGroupName]);
    }
    /**
     * Enable a receiver in an action group. This changes the receiver's status from Disabled to Enabled.
     * @param string $resourceGroupName
     * @param string $actionGroupName
     * @param array $enableRequest
     */
    public function enableReceiver(
        $resourceGroupName,
        $actionGroupName,
        array $enableRequest
    )
    {
        return $this->_EnableReceiver_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'actionGroupName' => $actionGroupName,
            'enableRequest' => $enableRequest
        ]);
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
    private $_ListBySubscriptionId_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByResourceGroup_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_EnableReceiver_operation;
}
