<?php
namespace Microsoft\Azure\Management\Automation\_2015_10_31;
final class DscConfiguration
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Delete_operation = $_client->createOperation('DscConfiguration_Delete');
        $this->_Get_operation = $_client->createOperation('DscConfiguration_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('DscConfiguration_CreateOrUpdate');
        $this->_GetContent_operation = $_client->createOperation('DscConfiguration_GetContent');
        $this->_ListByAutomationAccount_operation = $_client->createOperation('DscConfiguration_ListByAutomationAccount');
    }
    /**
     * Delete the dsc configuration identified by configuration name.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param string $configurationName
     */
    public function delete(
        $resourceGroupName,
        $automationAccountName,
        $configurationName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            'configurationName' => $configurationName
        ]);
    }
    /**
     * Retrieve the configuration identified by configuration name.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param string $configurationName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $automationAccountName,
        $configurationName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            'configurationName' => $configurationName
        ]);
    }
    /**
     * Create the configuration identified by configuration name.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param string $configurationName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $automationAccountName,
        $configurationName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            'configurationName' => $configurationName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Retrieve the configuration script identified by configuration name.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param string $configurationName
     * @return string
     */
    public function getContent(
        $resourceGroupName,
        $automationAccountName,
        $configurationName
    )
    {
        return $this->_GetContent_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            'configurationName' => $configurationName
        ]);
    }
    /**
     * Retrieve a list of configurations.
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
    private $_GetContent_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByAutomationAccount_operation;
}
