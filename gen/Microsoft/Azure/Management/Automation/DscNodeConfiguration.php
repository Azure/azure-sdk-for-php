<?php
namespace Microsoft\Azure\Management\Automation;
final class DscNodeConfiguration
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Delete_operation = $_client->createOperation('DscNodeConfiguration_Delete');
        $this->_Get_operation = $_client->createOperation('DscNodeConfiguration_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('DscNodeConfiguration_CreateOrUpdate');
        $this->_ListByAutomationAccount_operation = $_client->createOperation('DscNodeConfiguration_ListByAutomationAccount');
    }
    /**
     * Delete the Dsc node configurations by node configuration.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param string $nodeConfigurationName
     */
    public function delete(
        $resourceGroupName,
        $automationAccountName,
        $nodeConfigurationName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            'nodeConfigurationName' => $nodeConfigurationName
        ]);
    }
    /**
     * Retrieve the Dsc node configurations by node configuration.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param string $nodeConfigurationName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $automationAccountName,
        $nodeConfigurationName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            'nodeConfigurationName' => $nodeConfigurationName
        ]);
    }
    /**
     * Create the node configuration identified by node configuration name.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param string $nodeConfigurationName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $automationAccountName,
        $nodeConfigurationName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            'nodeConfigurationName' => $nodeConfigurationName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Retrieve a list of dsc node configurations.
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
