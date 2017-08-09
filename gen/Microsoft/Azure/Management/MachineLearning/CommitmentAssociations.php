<?php
namespace Microsoft\Azure\Management\MachineLearning;
final class CommitmentAssociations
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Get_operation = $_client->createOperation('CommitmentAssociations_Get');
        $this->_List_operation = $_client->createOperation('CommitmentAssociations_List');
        $this->_Move_operation = $_client->createOperation('CommitmentAssociations_Move');
    }
    /**
     * Get a commitment association.
     * @param string $resourceGroupName
     * @param string $commitmentPlanName
     * @param string $commitmentAssociationName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $commitmentPlanName,
        $commitmentAssociationName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'commitmentPlanName' => $commitmentPlanName,
            'commitmentAssociationName' => $commitmentAssociationName
        ]);
    }
    /**
     * Get all commitment associations for a parent commitment plan.
     * @param string $resourceGroupName
     * @param string $commitmentPlanName
     * @param string|null $_skipToken
     * @return array
     */
    public function list_(
        $resourceGroupName,
        $commitmentPlanName,
        $_skipToken = null
    )
    {
        return $this->_List_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'commitmentPlanName' => $commitmentPlanName,
            '$skipToken' => $_skipToken
        ]);
    }
    /**
     * Re-parent a commitment association from one commitment plan to another.
     * @param string $resourceGroupName
     * @param string $commitmentPlanName
     * @param string $commitmentAssociationName
     * @param array $movePayload
     * @return array
     */
    public function move(
        $resourceGroupName,
        $commitmentPlanName,
        $commitmentAssociationName,
        array $movePayload
    )
    {
        return $this->_Move_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'commitmentPlanName' => $commitmentPlanName,
            'commitmentAssociationName' => $commitmentAssociationName,
            'movePayload' => $movePayload
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Move_operation;
}
