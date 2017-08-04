<?php
namespace Microsoft\Azure\Management\DevTestLabs\_2016_05_15;
final class Costs
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Get_operation = $_client->createOperation('Costs_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('Costs_CreateOrUpdate');
    }
    /**
     * Get cost.
     * @param string $resourceGroupName
     * @param string $labName
     * @param string $name
     * @param string $_expand
     * @return array
     */
    public function get(
        $resourceGroupName,
        $labName,
        $name,
        $_expand
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'labName' => $labName,
            'name' => $name,
            '$expand' => $_expand
        ]);
    }
    /**
     * Create or replace an existing cost.
     * @param string $resourceGroupName
     * @param string $labName
     * @param string $name
     * @param array $labCost
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $labName,
        $name,
        array $labCost
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'labName' => $labName,
            'name' => $name,
            'labCost' => $labCost
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
}
