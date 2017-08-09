<?php
namespace Microsoft\Azure\Management\Monitor;
final class AlertRules
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_CreateOrUpdate_operation = $_client->createOperation('AlertRules_CreateOrUpdate');
        $this->_Delete_operation = $_client->createOperation('AlertRules_Delete');
        $this->_Get_operation = $_client->createOperation('AlertRules_Get');
        $this->_Update_operation = $_client->createOperation('AlertRules_Update');
        $this->_ListByResourceGroup_operation = $_client->createOperation('AlertRules_ListByResourceGroup');
    }
    /**
     * Creates or updates an alert rule.
     * @param string $resourceGroupName
     * @param string $ruleName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $ruleName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'ruleName' => $ruleName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Deletes an alert rule
     * @param string $resourceGroupName
     * @param string $ruleName
     */
    public function delete(
        $resourceGroupName,
        $ruleName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'ruleName' => $ruleName
        ]);
    }
    /**
     * Gets an alert rule
     * @param string $resourceGroupName
     * @param string $ruleName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $ruleName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'ruleName' => $ruleName
        ]);
    }
    /**
     * Updates an existing AlertRuleResource. To update other fields use the CreateOrUpdate method.
     * @param string $resourceGroupName
     * @param string $ruleName
     * @param array $alertRulesResource
     * @return array
     */
    public function update(
        $resourceGroupName,
        $ruleName,
        array $alertRulesResource
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'ruleName' => $ruleName,
            'alertRulesResource' => $alertRulesResource
        ]);
    }
    /**
     * List the alert rules within a resource group.
     * @param string $resourceGroupName
     * @return array
     */
    public function listByResourceGroup($resourceGroupName)
    {
        return $this->_ListByResourceGroup_operation->call(['resourceGroupName' => $resourceGroupName]);
    }
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
    private $_Update_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByResourceGroup_operation;
}
