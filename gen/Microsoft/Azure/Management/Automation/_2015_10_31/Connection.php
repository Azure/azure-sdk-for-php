<?php
namespace Microsoft\Azure\Management\Automation\_2015_10_31;
final class Connection
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Delete_operation = $_client->createOperation('Connection_Delete');
        $this->_Get_operation = $_client->createOperation('Connection_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('Connection_CreateOrUpdate');
        $this->_Update_operation = $_client->createOperation('Connection_Update');
        $this->_ListByAutomationAccount_operation = $_client->createOperation('Connection_ListByAutomationAccount');
    }
    /**
     * Delete the connection.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param string $connectionName
     * @return array
     */
    public function delete(
        $resourceGroupName,
        $automationAccountName,
        $connectionName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            'connectionName' => $connectionName
        ]);
    }
    /**
     * Retrieve the connection identified by connection name.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param string $connectionName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $automationAccountName,
        $connectionName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            'connectionName' => $connectionName
        ]);
    }
    /**
     * Create or update a connection.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param string $connectionName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $automationAccountName,
        $connectionName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            'connectionName' => $connectionName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Update a connection.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param string $connectionName
     * @param array $parameters
     * @return array
     */
    public function update(
        $resourceGroupName,
        $automationAccountName,
        $connectionName,
        array $parameters
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            'connectionName' => $connectionName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Retrieve a list of connections.
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
