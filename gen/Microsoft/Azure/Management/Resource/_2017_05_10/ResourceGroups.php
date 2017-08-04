<?php
namespace Microsoft\Azure\Management\Resource\_2017_05_10;
final class ResourceGroups
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_CheckExistence_operation = $_client->createOperation('ResourceGroups_CheckExistence');
        $this->_CreateOrUpdate_operation = $_client->createOperation('ResourceGroups_CreateOrUpdate');
        $this->_Delete_operation = $_client->createOperation('ResourceGroups_Delete');
        $this->_Get_operation = $_client->createOperation('ResourceGroups_Get');
        $this->_Update_operation = $_client->createOperation('ResourceGroups_Update');
        $this->_ExportTemplate_operation = $_client->createOperation('ResourceGroups_ExportTemplate');
        $this->_List_operation = $_client->createOperation('ResourceGroups_List');
    }
    /**
     * Checks whether a resource group exists.
     * @param string $resourceGroupName
     */
    public function checkExistence($resourceGroupName)
    {
        return $this->_CheckExistence_operation->call(['resourceGroupName' => $resourceGroupName]);
    }
    /**
     * Creates or updates a resource group.
     * @param string $resourceGroupName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'parameters' => $parameters
        ]);
    }
    /**
     * When you delete a resource group, all of its resources are also deleted. Deleting a resource group deletes all of its template deployments and currently stored operations.
     * @param string $resourceGroupName
     */
    public function delete($resourceGroupName)
    {
        return $this->_Delete_operation->call(['resourceGroupName' => $resourceGroupName]);
    }
    /**
     * Gets a resource group.
     * @param string $resourceGroupName
     * @return array
     */
    public function get($resourceGroupName)
    {
        return $this->_Get_operation->call(['resourceGroupName' => $resourceGroupName]);
    }
    /**
     * Resource groups can be updated through a simple PATCH operation to a group address. The format of the request is the same as that for creating a resource group. If a field is unspecified, the current value is retained.
     * @param string $resourceGroupName
     * @param array $parameters
     * @return array
     */
    public function update(
        $resourceGroupName,
        array $parameters
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Captures the specified resource group as a template.
     * @param string $resourceGroupName
     * @param array $parameters
     * @return array
     */
    public function exportTemplate(
        $resourceGroupName,
        array $parameters
    )
    {
        return $this->_ExportTemplate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Gets all the resource groups for a subscription.
     * @param string $_filter
     * @param integer $_top
     * @return array
     */
    public function list_(
        $_filter,
        $_top
    )
    {
        return $this->_List_operation->call([
            '$filter' => $_filter,
            '$top' => $_top
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CheckExistence_operation;
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
    private $_ExportTemplate_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
}
