<?php
namespace Microsoft\Azure\Management\Monitor;
final class AutoscaleSettings
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListByResourceGroup_operation = $_client->createOperation('AutoscaleSettings_ListByResourceGroup');
        $this->_CreateOrUpdate_operation = $_client->createOperation('AutoscaleSettings_CreateOrUpdate');
        $this->_Delete_operation = $_client->createOperation('AutoscaleSettings_Delete');
        $this->_Get_operation = $_client->createOperation('AutoscaleSettings_Get');
        $this->_Update_operation = $_client->createOperation('AutoscaleSettings_Update');
    }
    /**
     * Lists the autoscale settings for a resource group
     * @param string $resourceGroupName
     * @return array
     */
    public function listByResourceGroup($resourceGroupName)
    {
        return $this->_ListByResourceGroup_operation->call(['resourceGroupName' => $resourceGroupName]);
    }
    /**
     * Creates or updates an autoscale setting.
     * @param string $resourceGroupName
     * @param string $autoscaleSettingName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $autoscaleSettingName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'autoscaleSettingName' => $autoscaleSettingName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Deletes and autoscale setting
     * @param string $resourceGroupName
     * @param string $autoscaleSettingName
     */
    public function delete(
        $resourceGroupName,
        $autoscaleSettingName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'autoscaleSettingName' => $autoscaleSettingName
        ]);
    }
    /**
     * Gets an autoscale setting
     * @param string $resourceGroupName
     * @param string $autoscaleSettingName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $autoscaleSettingName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'autoscaleSettingName' => $autoscaleSettingName
        ]);
    }
    /**
     * Updates an existing AutoscaleSettingsResource. To update other fields use the CreateOrUpdate method.
     * @param string $resourceGroupName
     * @param string $autoscaleSettingName
     * @param array $autoscaleSettingResource
     * @return array
     */
    public function update(
        $resourceGroupName,
        $autoscaleSettingName,
        array $autoscaleSettingResource
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'autoscaleSettingName' => $autoscaleSettingName,
            'autoscaleSettingResource' => $autoscaleSettingResource
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByResourceGroup_operation;
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
    private $_Get_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Update_operation;
}
