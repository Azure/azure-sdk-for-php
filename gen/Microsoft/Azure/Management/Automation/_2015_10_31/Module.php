<?php
namespace Microsoft\Azure\Management\Automation\_2015_10_31;
final class Module
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Delete_operation = $_client->createOperation('Module_Delete');
        $this->_Get_operation = $_client->createOperation('Module_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('Module_CreateOrUpdate');
        $this->_Update_operation = $_client->createOperation('Module_Update');
        $this->_ListByAutomationAccount_operation = $_client->createOperation('Module_ListByAutomationAccount');
    }
    /**
     * Delete the module by name.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param string $moduleName
     */
    public function delete(
        $resourceGroupName,
        $automationAccountName,
        $moduleName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            'moduleName' => $moduleName
        ]);
    }
    /**
     * Retrieve the module identified by module name.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param string $moduleName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $automationAccountName,
        $moduleName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            'moduleName' => $moduleName
        ]);
    }
    /**
     * Create or Update the module identified by module name.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param string $moduleName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $automationAccountName,
        $moduleName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            'moduleName' => $moduleName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Update the module identified by module name.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param string $moduleName
     * @param array $parameters
     * @return array
     */
    public function update(
        $resourceGroupName,
        $automationAccountName,
        $moduleName,
        array $parameters
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            'moduleName' => $moduleName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Retrieve a list of modules.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @return array
     */
    public function listByAutomationAccount(
        $resourceGroupName,
        $automationAccountName
    )
    {
        return $this->_ListByAutomationAccount_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName
        ]);
    }
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
