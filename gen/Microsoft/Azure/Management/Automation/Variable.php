<?php
namespace Microsoft\Azure\Management\Automation;
final class Variable
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_CreateOrUpdate_operation = $_client->createOperation('Variable_CreateOrUpdate');
        $this->_Update_operation = $_client->createOperation('Variable_Update');
        $this->_Delete_operation = $_client->createOperation('Variable_Delete');
        $this->_Get_operation = $_client->createOperation('Variable_Get');
        $this->_ListByAutomationAccount_operation = $_client->createOperation('Variable_ListByAutomationAccount');
    }
    /**
     * Create a variable.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param string $variableName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $automationAccountName,
        $variableName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            'variableName' => $variableName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Update a variable.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param string $variableName
     * @param array $parameters
     * @return array
     */
    public function update(
        $resourceGroupName,
        $automationAccountName,
        $variableName,
        array $parameters
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            'variableName' => $variableName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Delete the variable.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param string $variableName
     */
    public function delete(
        $resourceGroupName,
        $automationAccountName,
        $variableName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            'variableName' => $variableName
        ]);
    }
    /**
     * Retrieve the variable identified by variable name.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param string $variableName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $automationAccountName,
        $variableName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            'variableName' => $variableName
        ]);
    }
    /**
     * Retrieve a list of variables.
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
    private $_Get_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByAutomationAccount_operation;
}
