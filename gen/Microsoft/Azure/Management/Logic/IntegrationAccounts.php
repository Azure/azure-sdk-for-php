<?php
namespace Microsoft\Azure\Management\Logic;
final class IntegrationAccounts
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListBySubscription_operation = $_client->createOperation('IntegrationAccounts_ListBySubscription');
        $this->_ListByResourceGroup_operation = $_client->createOperation('IntegrationAccounts_ListByResourceGroup');
        $this->_Get_operation = $_client->createOperation('IntegrationAccounts_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('IntegrationAccounts_CreateOrUpdate');
        $this->_Update_operation = $_client->createOperation('IntegrationAccounts_Update');
        $this->_Delete_operation = $_client->createOperation('IntegrationAccounts_Delete');
        $this->_GetCallbackUrl_operation = $_client->createOperation('IntegrationAccounts_GetCallbackUrl');
    }
    /**
     * Gets a list of integration accounts by subscription.
     * @param integer $_top
     * @return array
     */
    public function listBySubscription($_top)
    {
        return $this->_ListBySubscription_operation->call(['$top' => $_top]);
    }
    /**
     * Gets a list of integration accounts by resource group.
     * @param string $resourceGroupName
     * @param integer $_top
     * @return array
     */
    public function listByResourceGroup(
        $resourceGroupName,
        $_top
    )
    {
        return $this->_ListByResourceGroup_operation->call([
            'resourceGroupName' => $resourceGroupName,
            '$top' => $_top
        ]);
    }
    /**
     * Gets an integration account.
     * @param string $resourceGroupName
     * @param string $integrationAccountName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $integrationAccountName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'integrationAccountName' => $integrationAccountName
        ]);
    }
    /**
     * Creates or updates an integration account.
     * @param string $resourceGroupName
     * @param string $integrationAccountName
     * @param array $integrationAccount
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $integrationAccountName,
        array $integrationAccount
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'integrationAccountName' => $integrationAccountName,
            'integrationAccount' => $integrationAccount
        ]);
    }
    /**
     * Updates an integration account.
     * @param string $resourceGroupName
     * @param string $integrationAccountName
     * @param array $integrationAccount
     * @return array
     */
    public function update(
        $resourceGroupName,
        $integrationAccountName,
        array $integrationAccount
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'integrationAccountName' => $integrationAccountName,
            'integrationAccount' => $integrationAccount
        ]);
    }
    /**
     * Deletes an integration account.
     * @param string $resourceGroupName
     * @param string $integrationAccountName
     */
    public function delete(
        $resourceGroupName,
        $integrationAccountName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'integrationAccountName' => $integrationAccountName
        ]);
    }
    /**
     * Gets the integration account callback URL.
     * @param string $resourceGroupName
     * @param string $integrationAccountName
     * @param array $parameters
     * @return array
     */
    public function getCallbackUrl(
        $resourceGroupName,
        $integrationAccountName,
        array $parameters
    )
    {
        return $this->_GetCallbackUrl_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'integrationAccountName' => $integrationAccountName,
            'parameters' => $parameters
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListBySubscription_operation;
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
    private $_Update_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Delete_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetCallbackUrl_operation;
}
