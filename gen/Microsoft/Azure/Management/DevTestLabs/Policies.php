<?php
namespace Microsoft\Azure\Management\DevTestLabs;
final class Policies
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_List_operation = $_client->createOperation('Policies_List');
        $this->_Get_operation = $_client->createOperation('Policies_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('Policies_CreateOrUpdate');
        $this->_Delete_operation = $_client->createOperation('Policies_Delete');
        $this->_Update_operation = $_client->createOperation('Policies_Update');
    }
    /**
     * List policies in a given policy set.
     * @param string $resourceGroupName
     * @param string $labName
     * @param string $policySetName
     * @param string $_expand
     * @param string $_filter
     * @param integer $_top
     * @param string $_orderby
     * @return array
     */
    public function list_(
        $resourceGroupName,
        $labName,
        $policySetName,
        $_expand,
        $_filter,
        $_top,
        $_orderby
    )
    {
        return $this->_List_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'labName' => $labName,
            'policySetName' => $policySetName,
            '$expand' => $_expand,
            '$filter' => $_filter,
            '$top' => $_top,
            '$orderby' => $_orderby
        ]);
    }
    /**
     * Get policy.
     * @param string $resourceGroupName
     * @param string $labName
     * @param string $policySetName
     * @param string $name
     * @param string $_expand
     * @return array
     */
    public function get(
        $resourceGroupName,
        $labName,
        $policySetName,
        $name,
        $_expand
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'labName' => $labName,
            'policySetName' => $policySetName,
            'name' => $name,
            '$expand' => $_expand
        ]);
    }
    /**
     * Create or replace an existing policy.
     * @param string $resourceGroupName
     * @param string $labName
     * @param string $policySetName
     * @param string $name
     * @param array $policy
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $labName,
        $policySetName,
        $name,
        array $policy
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'labName' => $labName,
            'policySetName' => $policySetName,
            'name' => $name,
            'policy' => $policy
        ]);
    }
    /**
     * Delete policy.
     * @param string $resourceGroupName
     * @param string $labName
     * @param string $policySetName
     * @param string $name
     */
    public function delete(
        $resourceGroupName,
        $labName,
        $policySetName,
        $name
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'labName' => $labName,
            'policySetName' => $policySetName,
            'name' => $name
        ]);
    }
    /**
     * Modify properties of policies.
     * @param string $resourceGroupName
     * @param string $labName
     * @param string $policySetName
     * @param string $name
     * @param array $policy
     * @return array
     */
    public function update(
        $resourceGroupName,
        $labName,
        $policySetName,
        $name,
        array $policy
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'labName' => $labName,
            'policySetName' => $policySetName,
            'name' => $name,
            'policy' => $policy
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
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
    private $_Delete_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Update_operation;
}
