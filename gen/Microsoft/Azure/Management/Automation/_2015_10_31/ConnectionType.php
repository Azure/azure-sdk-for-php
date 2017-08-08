<?php
namespace Microsoft\Azure\Management\Automation\_2015_10_31;
final class ConnectionType
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Delete_operation = $_client->createOperation('ConnectionType_Delete');
        $this->_Get_operation = $_client->createOperation('ConnectionType_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('ConnectionType_CreateOrUpdate');
        $this->_ListByAutomationAccount_operation = $_client->createOperation('ConnectionType_ListByAutomationAccount');
    }
    /**
     * Delete the connectiontype.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param string $connectionTypeName
     */
    public function delete(
        $resourceGroupName,
        $automationAccountName,
        $connectionTypeName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            'connectionTypeName' => $connectionTypeName
        ]);
    }
    /**
     * Retrieve the connectiontype identified by connectiontype name.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param string $connectionTypeName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $automationAccountName,
        $connectionTypeName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            'connectionTypeName' => $connectionTypeName
        ]);
    }
    /**
     * Create a connectiontype.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param string $connectionTypeName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $automationAccountName,
        $connectionTypeName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            'connectionTypeName' => $connectionTypeName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Retrieve a list of connectiontypes.
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
    private $_ListByAutomationAccount_operation;
}
