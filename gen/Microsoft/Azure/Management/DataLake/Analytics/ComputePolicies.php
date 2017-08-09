<?php
namespace Microsoft\Azure\Management\DataLake\Analytics;
final class ComputePolicies
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_CreateOrUpdate_operation = $_client->createOperation('ComputePolicies_CreateOrUpdate');
        $this->_Update_operation = $_client->createOperation('ComputePolicies_Update');
        $this->_Delete_operation = $_client->createOperation('ComputePolicies_Delete');
        $this->_Get_operation = $_client->createOperation('ComputePolicies_Get');
        $this->_ListByAccount_operation = $_client->createOperation('ComputePolicies_ListByAccount');
    }
    /**
     * Creates or updates the specified compute policy. During update, the compute policy with the specified name will be replaced with this new compute policy. An account supports, at most, 50 policies
     * @param string $resourceGroupName
     * @param string $accountName
     * @param string $computePolicyName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $accountName,
        $computePolicyName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'accountName' => $accountName,
            'computePolicyName' => $computePolicyName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Updates the specified compute policy.
     * @param string $resourceGroupName
     * @param string $accountName
     * @param string $computePolicyName
     * @param array|null $parameters
     * @return array
     */
    public function update(
        $resourceGroupName,
        $accountName,
        $computePolicyName,
        array $parameters = null
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'accountName' => $accountName,
            'computePolicyName' => $computePolicyName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Deletes the specified compute policy from the specified Data Lake Analytics account
     * @param string $resourceGroupName
     * @param string $accountName
     * @param string $computePolicyName
     */
    public function delete(
        $resourceGroupName,
        $accountName,
        $computePolicyName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'accountName' => $accountName,
            'computePolicyName' => $computePolicyName
        ]);
    }
    /**
     * Gets the specified Data Lake Analytics compute policy.
     * @param string $resourceGroupName
     * @param string $accountName
     * @param string $computePolicyName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $accountName,
        $computePolicyName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'accountName' => $accountName,
            'computePolicyName' => $computePolicyName
        ]);
    }
    /**
     * Lists the Data Lake Analytics compute policies within the specified Data Lake Analytics account. An account supports, at most, 50 policies
     * @param string $resourceGroupName
     * @param string $accountName
     * @return array
     */
    public function listByAccount(
        $resourceGroupName,
        $accountName
    )
    {
        return $this->_ListByAccount_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'accountName' => $accountName
        ]);
    }
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
    private $_Get_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByAccount_operation;
}
