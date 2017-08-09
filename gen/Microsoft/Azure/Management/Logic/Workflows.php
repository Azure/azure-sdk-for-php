<?php
namespace Microsoft\Azure\Management\Logic;
final class Workflows
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListBySubscription_operation = $_client->createOperation('Workflows_ListBySubscription');
        $this->_ListByResourceGroup_operation = $_client->createOperation('Workflows_ListByResourceGroup');
        $this->_Get_operation = $_client->createOperation('Workflows_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('Workflows_CreateOrUpdate');
        $this->_Update_operation = $_client->createOperation('Workflows_Update');
        $this->_Delete_operation = $_client->createOperation('Workflows_Delete');
        $this->_Disable_operation = $_client->createOperation('Workflows_Disable');
        $this->_Enable_operation = $_client->createOperation('Workflows_Enable');
        $this->_GenerateUpgradedDefinition_operation = $_client->createOperation('Workflows_GenerateUpgradedDefinition');
        $this->_ListSwagger_operation = $_client->createOperation('Workflows_ListSwagger');
        $this->_RegenerateAccessKey_operation = $_client->createOperation('Workflows_RegenerateAccessKey');
        $this->_Validate_operation = $_client->createOperation('Workflows_Validate');
    }
    /**
     * Gets a list of workflows by subscription.
     * @param integer $_top
     * @param string $_filter
     * @return array
     */
    public function listBySubscription(
        $_top,
        $_filter
    )
    {
        return $this->_ListBySubscription_operation->call([
            '$top' => $_top,
            '$filter' => $_filter
        ]);
    }
    /**
     * Gets a list of workflows by resource group.
     * @param string $resourceGroupName
     * @param integer $_top
     * @param string $_filter
     * @return array
     */
    public function listByResourceGroup(
        $resourceGroupName,
        $_top,
        $_filter
    )
    {
        return $this->_ListByResourceGroup_operation->call([
            'resourceGroupName' => $resourceGroupName,
            '$top' => $_top,
            '$filter' => $_filter
        ]);
    }
    /**
     * Gets a workflow.
     * @param string $resourceGroupName
     * @param string $workflowName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $workflowName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'workflowName' => $workflowName
        ]);
    }
    /**
     * Creates or updates a workflow.
     * @param string $resourceGroupName
     * @param string $workflowName
     * @param array $workflow
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $workflowName,
        array $workflow
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'workflowName' => $workflowName,
            'workflow' => $workflow
        ]);
    }
    /**
     * Updates a workflow.
     * @param string $resourceGroupName
     * @param string $workflowName
     * @param array $workflow
     * @return array
     */
    public function update(
        $resourceGroupName,
        $workflowName,
        array $workflow
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'workflowName' => $workflowName,
            'workflow' => $workflow
        ]);
    }
    /**
     * Deletes a workflow.
     * @param string $resourceGroupName
     * @param string $workflowName
     */
    public function delete(
        $resourceGroupName,
        $workflowName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'workflowName' => $workflowName
        ]);
    }
    /**
     * Disables a workflow.
     * @param string $resourceGroupName
     * @param string $workflowName
     */
    public function disable(
        $resourceGroupName,
        $workflowName
    )
    {
        return $this->_Disable_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'workflowName' => $workflowName
        ]);
    }
    /**
     * Enables a workflow.
     * @param string $resourceGroupName
     * @param string $workflowName
     */
    public function enable(
        $resourceGroupName,
        $workflowName
    )
    {
        return $this->_Enable_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'workflowName' => $workflowName
        ]);
    }
    /**
     * Generates the upgraded definition for a workflow.
     * @param string $resourceGroupName
     * @param string $workflowName
     * @param array $parameters
     * @return array
     */
    public function generateUpgradedDefinition(
        $resourceGroupName,
        $workflowName,
        array $parameters
    )
    {
        return $this->_GenerateUpgradedDefinition_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'workflowName' => $workflowName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Gets an OpenAPI definition for the workflow.
     * @param string $resourceGroupName
     * @param string $workflowName
     * @return array
     */
    public function listSwagger(
        $resourceGroupName,
        $workflowName
    )
    {
        return $this->_ListSwagger_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'workflowName' => $workflowName
        ]);
    }
    /**
     * Regenerates the callback URL access key for request triggers.
     * @param string $resourceGroupName
     * @param string $workflowName
     * @param array $keyType
     */
    public function regenerateAccessKey(
        $resourceGroupName,
        $workflowName,
        array $keyType
    )
    {
        return $this->_RegenerateAccessKey_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'workflowName' => $workflowName,
            'keyType' => $keyType
        ]);
    }
    /**
     * Validates the workflow definition.
     * @param string $resourceGroupName
     * @param string $location
     * @param string $workflowName
     * @param array $workflow
     */
    public function validate(
        $resourceGroupName,
        $location,
        $workflowName,
        array $workflow
    )
    {
        return $this->_Validate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'location' => $location,
            'workflowName' => $workflowName,
            'workflow' => $workflow
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
    private $_Disable_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Enable_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GenerateUpgradedDefinition_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListSwagger_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_RegenerateAccessKey_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Validate_operation;
}
