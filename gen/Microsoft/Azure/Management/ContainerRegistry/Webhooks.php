<?php
namespace Microsoft\Azure\Management\ContainerRegistry;
final class Webhooks
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Get_operation = $_client->createOperation('Webhooks_Get');
        $this->_Create_operation = $_client->createOperation('Webhooks_Create');
        $this->_Delete_operation = $_client->createOperation('Webhooks_Delete');
        $this->_Update_operation = $_client->createOperation('Webhooks_Update');
        $this->_List_operation = $_client->createOperation('Webhooks_List');
        $this->_Ping_operation = $_client->createOperation('Webhooks_Ping');
        $this->_GetCallbackConfig_operation = $_client->createOperation('Webhooks_GetCallbackConfig');
        $this->_ListEvents_operation = $_client->createOperation('Webhooks_ListEvents');
    }
    /**
     * Gets the properties of the specified webhook.
     * @param string $resourceGroupName
     * @param string $registryName
     * @param string $webhookName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $registryName,
        $webhookName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'registryName' => $registryName,
            'webhookName' => $webhookName
        ]);
    }
    /**
     * Creates a webhook for a container registry with the specified parameters.
     * @param string $resourceGroupName
     * @param string $registryName
     * @param string $webhookName
     * @param array $webhookCreateParameters
     * @return array
     */
    public function create(
        $resourceGroupName,
        $registryName,
        $webhookName,
        array $webhookCreateParameters
    )
    {
        return $this->_Create_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'registryName' => $registryName,
            'webhookName' => $webhookName,
            'webhookCreateParameters' => $webhookCreateParameters
        ]);
    }
    /**
     * Deletes a webhook from a container registry.
     * @param string $resourceGroupName
     * @param string $registryName
     * @param string $webhookName
     */
    public function delete(
        $resourceGroupName,
        $registryName,
        $webhookName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'registryName' => $registryName,
            'webhookName' => $webhookName
        ]);
    }
    /**
     * Updates a webhook with the specified parameters.
     * @param string $resourceGroupName
     * @param string $registryName
     * @param string $webhookName
     * @param array $webhookUpdateParameters
     * @return array
     */
    public function update(
        $resourceGroupName,
        $registryName,
        $webhookName,
        array $webhookUpdateParameters
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'registryName' => $registryName,
            'webhookName' => $webhookName,
            'webhookUpdateParameters' => $webhookUpdateParameters
        ]);
    }
    /**
     * Lists all the webhooks for the specified container registry.
     * @param string $resourceGroupName
     * @param string $registryName
     * @return array
     */
    public function list_(
        $resourceGroupName,
        $registryName
    )
    {
        return $this->_List_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'registryName' => $registryName
        ]);
    }
    /**
     * Triggers a ping event to be sent to the webhook.
     * @param string $resourceGroupName
     * @param string $registryName
     * @param string $webhookName
     * @return array
     */
    public function ping(
        $resourceGroupName,
        $registryName,
        $webhookName
    )
    {
        return $this->_Ping_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'registryName' => $registryName,
            'webhookName' => $webhookName
        ]);
    }
    /**
     * Gets the configuration of service URI and custom headers for the webhook.
     * @param string $resourceGroupName
     * @param string $registryName
     * @param string $webhookName
     * @return array
     */
    public function getCallbackConfig(
        $resourceGroupName,
        $registryName,
        $webhookName
    )
    {
        return $this->_GetCallbackConfig_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'registryName' => $registryName,
            'webhookName' => $webhookName
        ]);
    }
    /**
     * Lists recent events for the specified webhook.
     * @param string $resourceGroupName
     * @param string $registryName
     * @param string $webhookName
     * @return array
     */
    public function listEvents(
        $resourceGroupName,
        $registryName,
        $webhookName
    )
    {
        return $this->_ListEvents_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'registryName' => $registryName,
            'webhookName' => $webhookName
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
    private $_Delete_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Update_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Ping_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetCallbackConfig_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListEvents_operation;
}
