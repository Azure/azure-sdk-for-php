<?php
namespace Microsoft\Azure\Management\MachineLearning;
final class UsageHistory
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_List_operation = $_client->createOperation('UsageHistory_List');
    }
    /**
     * Retrieve the usage history for an Azure ML commitment plan.
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
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
}
