<?php
namespace Microsoft\Azure\Management\AppInsights\_2015_05_01;
final class Components
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_List_operation = $_client->createOperation('Components_List');
        $this->_ListByResourceGroup_operation = $_client->createOperation('Components_ListByResourceGroup');
        $this->_Delete_operation = $_client->createOperation('Components_Delete');
        $this->_Get_operation = $_client->createOperation('Components_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('Components_CreateOrUpdate');
        $this->_UpdateTags_operation = $_client->createOperation('Components_UpdateTags');
    }
    /**
     * Gets a list of all Application Insights components within a subscription.
     * @return array
     */
    public function list_()
    {
        return $this->_List_operation->call([]);
    }
    /**
     * Gets a list of Application Insights components within a resource group.
     * @param string $resourceGroupName
     * @return array
     */
    public function listByResourceGroup($resourceGroupName)
    {
        return $this->_ListByResourceGroup_operation->call(['resourceGroupName' => $resourceGroupName]);
    }
    /**
     * Deletes an Application Insights component.
     * @param string $resourceGroupName
     * @param string $resourceName
     */
    public function delete(
        $resourceGroupName,
        $resourceName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'resourceName' => $resourceName
        ]);
    }
    /**
     * Returns an Application Insights component.
     * @param string $resourceGroupName
     * @param string $resourceName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $resourceName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'resourceName' => $resourceName
        ]);
    }
    /**
     * Creates (or updates) an Application Insights component. Note: You cannot specify a different value for InstrumentationKey nor AppId in the Put operation.
     * @param string $resourceGroupName
     * @param string $resourceName
     * @param array $insightProperties
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $resourceName,
        array $insightProperties
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'resourceName' => $resourceName,
            'InsightProperties' => $insightProperties
        ]);
    }
    /**
     * Updates an existing component's tags. To update other fields use the CreateOrUpdate method.
     * @param string $resourceGroupName
     * @param string $resourceName
     * @param array $componentTags
     * @return array
     */
    public function updateTags(
        $resourceGroupName,
        $resourceName,
        array $componentTags
    )
    {
        return $this->_UpdateTags_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'resourceName' => $resourceName,
            'ComponentTags' => $componentTags
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByResourceGroup_operation;
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
    private $_UpdateTags_operation;
}
