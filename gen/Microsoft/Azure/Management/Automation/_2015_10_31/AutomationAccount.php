<?php
namespace Microsoft\Azure\Management\Automation\_2015_10_31;
final class AutomationAccount
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Update_operation = $_client->createOperation('AutomationAccount_Update');
        $this->_CreateOrUpdate_operation = $_client->createOperation('AutomationAccount_CreateOrUpdate');
        $this->_Delete_operation = $_client->createOperation('AutomationAccount_Delete');
        $this->_Get_operation = $_client->createOperation('AutomationAccount_Get');
        $this->_ListByResourceGroup_operation = $_client->createOperation('AutomationAccount_ListByResourceGroup');
        $this->_List_operation = $_client->createOperation('AutomationAccount_List');
    }
    /**
     * Update an automation account.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param array $parameters
     * @return array
     */
    public function update(
        $resourceGroupName,
        $automationAccountName,
        array $parameters
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Create or update automation account.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $automationAccountName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Delete an automation account.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     */
    public function delete(
        $resourceGroupName,
        $automationAccountName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName
        ]);
    }
    /**
     * Get information about an Automation Account.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $automationAccountName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName
        ]);
    }
    /**
     * Retrieve a list of accounts within a given resource group.
     * @param string $resourceGroupName
     * @return array
     */
    public function listByResourceGroup($resourceGroupName)
    {
        return $this->_ListByResourceGroup_operation->call(['resourceGroupName' => $resourceGroupName]);
    }
    /**
     * Retrieve a list of accounts within a given subscription.
     * @return array
     */
    public function list_()
    {
        return $this->_List_operation->call([]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Update_operation;
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
    private $_ListByResourceGroup_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
}
