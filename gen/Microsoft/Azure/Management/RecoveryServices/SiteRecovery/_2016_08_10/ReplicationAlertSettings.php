<?php
namespace Microsoft\Azure\Management\RecoveryServices\SiteRecovery\_2016_08_10;
final class ReplicationAlertSettings
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Get_operation = $_client->createOperation('ReplicationAlertSettings_Get');
        $this->_Create_operation = $_client->createOperation('ReplicationAlertSettings_Create');
        $this->_List_operation = $_client->createOperation('ReplicationAlertSettings_List');
    }
    /**
     * Gets the details of the specified email notification(alert) configuration.
     * @param string $resourceName
     * @param string $resourceGroupName
     * @param string $alertSettingName
     * @return array
     */
    public function get(
        $resourceName,
        $resourceGroupName,
        $alertSettingName
    )
    {
        return $this->_Get_operation->call([
            'resourceName' => $resourceName,
            'resourceGroupName' => $resourceGroupName,
            'alertSettingName' => $alertSettingName
        ]);
    }
    /**
     * Create or update an email notification(alert) configuration.
     * @param string $resourceName
     * @param string $resourceGroupName
     * @param string $alertSettingName
     * @param array $request
     * @return array
     */
    public function create(
        $resourceName,
        $resourceGroupName,
        $alertSettingName,
        array $request
    )
    {
        return $this->_Create_operation->call([
            'resourceName' => $resourceName,
            'resourceGroupName' => $resourceGroupName,
            'alertSettingName' => $alertSettingName,
            'request' => $request
        ]);
    }
    /**
     * Gets the list of email notification(alert) configurations for the vault. .
     * @param string $resourceName
     * @param string $resourceGroupName
     * @return array
     */
    public function list_(
        $resourceName,
        $resourceGroupName
    )
    {
        return $this->_List_operation->call([
            'resourceName' => $resourceName,
            'resourceGroupName' => $resourceGroupName
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Create_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
}
