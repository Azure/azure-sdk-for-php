<?php
namespace Microsoft\Azure\Management\MachineLearning;
final class CommitmentPlans
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Get_operation = $_client->createOperation('CommitmentPlans_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('CommitmentPlans_CreateOrUpdate');
        $this->_Remove_operation = $_client->createOperation('CommitmentPlans_Remove');
        $this->_Patch_operation = $_client->createOperation('CommitmentPlans_Patch');
        $this->_List_operation = $_client->createOperation('CommitmentPlans_List');
        $this->_ListInResourceGroup_operation = $_client->createOperation('CommitmentPlans_ListInResourceGroup');
    }
    /**
     * Retrieve an Azure ML commitment plan by its subscription, resource group and name.
     * @param string $resourceGroupName
     * @param string $commitmentPlanName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $commitmentPlanName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'commitmentPlanName' => $commitmentPlanName
        ]);
    }
    /**
     * Create a new Azure ML commitment plan resource or updates an existing one.
     * @param array $createOrUpdatePayload
     * @param string $resourceGroupName
     * @param string $commitmentPlanName
     * @return array
     */
    public function createOrUpdate(
        array $createOrUpdatePayload,
        $resourceGroupName,
        $commitmentPlanName
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'createOrUpdatePayload' => $createOrUpdatePayload,
            'resourceGroupName' => $resourceGroupName,
            'commitmentPlanName' => $commitmentPlanName
        ]);
    }
    /**
     * Remove an existing Azure ML commitment plan.
     * @param string $resourceGroupName
     * @param string $commitmentPlanName
     */
    public function remove(
        $resourceGroupName,
        $commitmentPlanName
    )
    {
        return $this->_Remove_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'commitmentPlanName' => $commitmentPlanName
        ]);
    }
    /**
     * Patch an existing Azure ML commitment plan resource.
     * @param array $patchPayload
     * @param string $resourceGroupName
     * @param string $commitmentPlanName
     * @return array
     */
    public function patch(
        array $patchPayload,
        $resourceGroupName,
        $commitmentPlanName
    )
    {
        return $this->_Patch_operation->call([
            'patchPayload' => $patchPayload,
            'resourceGroupName' => $resourceGroupName,
            'commitmentPlanName' => $commitmentPlanName
        ]);
    }
    /**
     * Retrieve all Azure ML commitment plans in a subscription.
     * @param string $_skipToken
     * @return array
     */
    public function list_($_skipToken)
    {
        return $this->_List_operation->call(['$skipToken' => $_skipToken]);
    }
    /**
     * Retrieve all Azure ML commitment plans in a resource group.
     * @param string $resourceGroupName
     * @param string $_skipToken
     * @return array
     */
    public function listInResourceGroup(
        $resourceGroupName,
        $_skipToken
    )
    {
        return $this->_ListInResourceGroup_operation->call([
            'resourceGroupName' => $resourceGroupName,
            '$skipToken' => $_skipToken
        ]);
    }
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
    private $_Remove_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Patch_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListInResourceGroup_operation;
}
