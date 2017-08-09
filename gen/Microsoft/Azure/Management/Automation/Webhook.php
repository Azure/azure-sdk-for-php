<?php
namespace Microsoft\Azure\Management\Automation;
final class Webhook
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_GenerateUri_operation = $_client->createOperation('Webhook_GenerateUri');
        $this->_Delete_operation = $_client->createOperation('Webhook_Delete');
        $this->_Get_operation = $_client->createOperation('Webhook_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('Webhook_CreateOrUpdate');
        $this->_Update_operation = $_client->createOperation('Webhook_Update');
        $this->_ListByAutomationAccount_operation = $_client->createOperation('Webhook_ListByAutomationAccount');
    }
    /**
     * Generates a Uri for use in creating a webhook.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @return string
     */
    public function generateUri(
        $resourceGroupName,
        $automationAccountName
    )
    {
        return $this->_GenerateUri_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName
        ]);
    }
    /**
     * Delete the webhook by name.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param string $webhookName
     */
    public function delete(
        $resourceGroupName,
        $automationAccountName,
        $webhookName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            'webhookName' => $webhookName
        ]);
    }
    /**
     * Retrieve the webhook identified by webhook name.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param string $webhookName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $automationAccountName,
        $webhookName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            'webhookName' => $webhookName
        ]);
    }
    /**
     * Create the webhook identified by webhook name.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param string $webhookName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $automationAccountName,
        $webhookName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            'webhookName' => $webhookName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Update the webhook identified by webhook name.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param string $webhookName
     * @param array $parameters
     * @return array
     */
    public function update(
        $resourceGroupName,
        $automationAccountName,
        $webhookName,
        array $parameters
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            'webhookName' => $webhookName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Retrieve a list of webhooks.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param string|null $_filter
     * @return array
     */
    public function listByAutomationAccount(
        $resourceGroupName,
        $automationAccountName,
        $_filter = null
    )
    {
        return $this->_ListByAutomationAccount_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            '$filter' => $_filter
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GenerateUri_operation;
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
    private $_CreateOrUpdate_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Update_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByAutomationAccount_operation;
}
