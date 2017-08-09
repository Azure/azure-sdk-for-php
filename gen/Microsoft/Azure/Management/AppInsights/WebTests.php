<?php
namespace Microsoft\Azure\Management\AppInsights;
final class WebTests
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListByResourceGroup_operation = $_client->createOperation('WebTests_ListByResourceGroup');
        $this->_Get_operation = $_client->createOperation('WebTests_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('WebTests_CreateOrUpdate');
        $this->_UpdateTags_operation = $_client->createOperation('WebTests_UpdateTags');
        $this->_Delete_operation = $_client->createOperation('WebTests_Delete');
        $this->_List_operation = $_client->createOperation('WebTests_List');
    }
    /**
     * Get all Application Insights web tests defined within a specified resource group.
     * @param string $resourceGroupName
     * @return array
     */
    public function listByResourceGroup($resourceGroupName)
    {
        return $this->_ListByResourceGroup_operation->call(['resourceGroupName' => $resourceGroupName]);
    }
    /**
     * Get a specific Application Insights web test definition.
     * @param string $resourceGroupName
     * @param string $webTestName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $webTestName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'webTestName' => $webTestName
        ]);
    }
    /**
     * Creates or updates an Application Insights web test definition.
     * @param string $resourceGroupName
     * @param string $webTestName
     * @param array $webTestDefinition
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $webTestName,
        array $webTestDefinition
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'webTestName' => $webTestName,
            'WebTestDefinition' => $webTestDefinition
        ]);
    }
    /**
     * Creates or updates an Application Insights web test definition.
     * @param string $resourceGroupName
     * @param string $webTestName
     * @param array $webTestTags
     * @return array
     */
    public function updateTags(
        $resourceGroupName,
        $webTestName,
        array $webTestTags
    )
    {
        return $this->_UpdateTags_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'webTestName' => $webTestName,
            'WebTestTags' => $webTestTags
        ]);
    }
    /**
     * Deletes an Application Insights web test.
     * @param string $resourceGroupName
     * @param string $webTestName
     */
    public function delete(
        $resourceGroupName,
        $webTestName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'webTestName' => $webTestName
        ]);
    }
    /**
     * Get all Application Insights web test alerts definitioned within a subscription.
     * @return array
     */
    public function list_()
    {
        return $this->_List_operation->call([]);
    }
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
    private $_UpdateTags_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Delete_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
}
