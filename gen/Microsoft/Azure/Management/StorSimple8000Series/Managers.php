<?php
namespace Microsoft\Azure\Management\StorSimple8000Series;
final class Managers
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_List_operation = $_client->createOperation('Managers_List');
        $this->_ListByResourceGroup_operation = $_client->createOperation('Managers_ListByResourceGroup');
        $this->_Get_operation = $_client->createOperation('Managers_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('Managers_CreateOrUpdate');
        $this->_Delete_operation = $_client->createOperation('Managers_Delete');
        $this->_Update_operation = $_client->createOperation('Managers_Update');
        $this->_GetDevicePublicEncryptionKey_operation = $_client->createOperation('Managers_GetDevicePublicEncryptionKey');
        $this->_GetEncryptionSettings_operation = $_client->createOperation('Managers_GetEncryptionSettings');
        $this->_GetExtendedInfo_operation = $_client->createOperation('Managers_GetExtendedInfo');
        $this->_CreateExtendedInfo_operation = $_client->createOperation('Managers_CreateExtendedInfo');
        $this->_DeleteExtendedInfo_operation = $_client->createOperation('Managers_DeleteExtendedInfo');
        $this->_UpdateExtendedInfo_operation = $_client->createOperation('Managers_UpdateExtendedInfo');
        $this->_ListFeatureSupportStatus_operation = $_client->createOperation('Managers_ListFeatureSupportStatus');
        $this->_GetActivationKey_operation = $_client->createOperation('Managers_GetActivationKey');
        $this->_GetPublicEncryptionKey_operation = $_client->createOperation('Managers_GetPublicEncryptionKey');
        $this->_ListMetrics_operation = $_client->createOperation('Managers_ListMetrics');
        $this->_ListMetricDefinition_operation = $_client->createOperation('Managers_ListMetricDefinition');
        $this->_RegenerateActivationKey_operation = $_client->createOperation('Managers_RegenerateActivationKey');
    }
    /**
     * Retrieves all the managers in a subscription.
     * @return array
     */
    public function list_()
    {
        return $this->_List_operation->call([]);
    }
    /**
     * Retrieves all the managers in a resource group.
     * @param string $resourceGroupName
     * @return array
     */
    public function listByResourceGroup($resourceGroupName)
    {
        return $this->_ListByResourceGroup_operation->call(['resourceGroupName' => $resourceGroupName]);
    }
    /**
     * Returns the properties of the specified manager name.
     * @param string $resourceGroupName
     * @param string $managerName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $managerName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'managerName' => $managerName
        ]);
    }
    /**
     * Creates or updates the manager.
     * @param array $parameters
     * @param string $resourceGroupName
     * @param string $managerName
     * @return array
     */
    public function createOrUpdate(
        array $parameters,
        $resourceGroupName,
        $managerName
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'parameters' => $parameters,
            'resourceGroupName' => $resourceGroupName,
            'managerName' => $managerName
        ]);
    }
    /**
     * Deletes the manager.
     * @param string $resourceGroupName
     * @param string $managerName
     */
    public function delete(
        $resourceGroupName,
        $managerName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'managerName' => $managerName
        ]);
    }
    /**
     * Updates the StorSimple Manager.
     * @param array $parameters
     * @param string $resourceGroupName
     * @param string $managerName
     * @return array
     */
    public function update(
        array $parameters,
        $resourceGroupName,
        $managerName
    )
    {
        return $this->_Update_operation->call([
            'parameters' => $parameters,
            'resourceGroupName' => $resourceGroupName,
            'managerName' => $managerName
        ]);
    }
    /**
     * Returns the public encryption key of the device.
     * @param string $deviceName
     * @param string $resourceGroupName
     * @param string $managerName
     * @return array
     */
    public function getDevicePublicEncryptionKey(
        $deviceName,
        $resourceGroupName,
        $managerName
    )
    {
        return $this->_GetDevicePublicEncryptionKey_operation->call([
            'deviceName' => $deviceName,
            'resourceGroupName' => $resourceGroupName,
            'managerName' => $managerName
        ]);
    }
    /**
     * Returns the encryption settings of the manager.
     * @param string $resourceGroupName
     * @param string $managerName
     * @return array
     */
    public function getEncryptionSettings(
        $resourceGroupName,
        $managerName
    )
    {
        return $this->_GetEncryptionSettings_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'managerName' => $managerName
        ]);
    }
    /**
     * Returns the extended information of the specified manager name.
     * @param string $resourceGroupName
     * @param string $managerName
     * @return array
     */
    public function getExtendedInfo(
        $resourceGroupName,
        $managerName
    )
    {
        return $this->_GetExtendedInfo_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'managerName' => $managerName
        ]);
    }
    /**
     * Creates the extended info of the manager.
     * @param array $parameters
     * @param string $resourceGroupName
     * @param string $managerName
     * @return array
     */
    public function createExtendedInfo(
        array $parameters,
        $resourceGroupName,
        $managerName
    )
    {
        return $this->_CreateExtendedInfo_operation->call([
            'parameters' => $parameters,
            'resourceGroupName' => $resourceGroupName,
            'managerName' => $managerName
        ]);
    }
    /**
     * Deletes the extended info of the manager.
     * @param string $resourceGroupName
     * @param string $managerName
     */
    public function deleteExtendedInfo(
        $resourceGroupName,
        $managerName
    )
    {
        return $this->_DeleteExtendedInfo_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'managerName' => $managerName
        ]);
    }
    /**
     * Updates the extended info of the manager.
     * @param array $parameters
     * @param string $resourceGroupName
     * @param string $managerName
     * @param string $if_Match
     * @return array
     */
    public function updateExtendedInfo(
        array $parameters,
        $resourceGroupName,
        $managerName,
        $if_Match
    )
    {
        return $this->_UpdateExtendedInfo_operation->call([
            'parameters' => $parameters,
            'resourceGroupName' => $resourceGroupName,
            'managerName' => $managerName,
            'If-Match' => $if_Match
        ]);
    }
    /**
     * Lists the features and their support status
     * @param string $resourceGroupName
     * @param string $managerName
     * @param string $_filter
     * @return array
     */
    public function listFeatureSupportStatus(
        $resourceGroupName,
        $managerName,
        $_filter
    )
    {
        return $this->_ListFeatureSupportStatus_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'managerName' => $managerName,
            '$filter' => $_filter
        ]);
    }
    /**
     * Returns the activation key of the manager.
     * @param string $resourceGroupName
     * @param string $managerName
     * @return array
     */
    public function getActivationKey(
        $resourceGroupName,
        $managerName
    )
    {
        return $this->_GetActivationKey_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'managerName' => $managerName
        ]);
    }
    /**
     * Returns the symmetric encrypted public encryption key of the manager.
     * @param string $resourceGroupName
     * @param string $managerName
     * @return array
     */
    public function getPublicEncryptionKey(
        $resourceGroupName,
        $managerName
    )
    {
        return $this->_GetPublicEncryptionKey_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'managerName' => $managerName
        ]);
    }
    /**
     * Gets the metrics for the specified manager.
     * @param string $resourceGroupName
     * @param string $managerName
     * @param string $_filter
     * @return array
     */
    public function listMetrics(
        $resourceGroupName,
        $managerName,
        $_filter
    )
    {
        return $this->_ListMetrics_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'managerName' => $managerName,
            '$filter' => $_filter
        ]);
    }
    /**
     * Gets the metric definitions for the specified manager.
     * @param string $resourceGroupName
     * @param string $managerName
     * @return array
     */
    public function listMetricDefinition(
        $resourceGroupName,
        $managerName
    )
    {
        return $this->_ListMetricDefinition_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'managerName' => $managerName
        ]);
    }
    /**
     * Re-generates and returns the activation key of the manager.
     * @param string $resourceGroupName
     * @param string $managerName
     * @return array
     */
    public function regenerateActivationKey(
        $resourceGroupName,
        $managerName
    )
    {
        return $this->_RegenerateActivationKey_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'managerName' => $managerName
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByResourceGroup_operation;
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
    private $_Update_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetDevicePublicEncryptionKey_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetEncryptionSettings_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetExtendedInfo_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateExtendedInfo_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_DeleteExtendedInfo_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_UpdateExtendedInfo_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListFeatureSupportStatus_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetActivationKey_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetPublicEncryptionKey_operation;
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
    private $_RegenerateActivationKey_operation;
}
