<?php
namespace Microsoft\Azure\Management\OperationalInsights\_2015_03_20;
final class StorageInsights
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_CreateOrUpdate_operation = $_client->createOperation('StorageInsights_CreateOrUpdate');
        $this->_Get_operation = $_client->createOperation('StorageInsights_Get');
        $this->_Delete_operation = $_client->createOperation('StorageInsights_Delete');
        $this->_ListByWorkspace_operation = $_client->createOperation('StorageInsights_ListByWorkspace');
    }
    /**
     * Create or update a storage insight.
     * @param string $resourceGroupName
     * @param string $workspaceName
     * @param string $storageInsightName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $workspaceName,
        $storageInsightName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'workspaceName' => $workspaceName,
            'storageInsightName' => $storageInsightName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Gets a storage insight instance.
     * @param string $resourceGroupName
     * @param string $workspaceName
     * @param string $storageInsightName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $workspaceName,
        $storageInsightName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'workspaceName' => $workspaceName,
            'storageInsightName' => $storageInsightName
        ]);
    }
    /**
     * Deletes a storageInsightsConfigs resource
     * @param string $resourceGroupName
     * @param string $workspaceName
     * @param string $storageInsightName
     */
    public function delete(
        $resourceGroupName,
        $workspaceName,
        $storageInsightName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'workspaceName' => $workspaceName,
            'storageInsightName' => $storageInsightName
        ]);
    }
    /**
     * Lists the storage insight instances within a workspace
     * @param string $resourceGroupName
     * @param string $workspaceName
     * @return array
     */
    public function listByWorkspace(
        $resourceGroupName,
        $workspaceName
    )
    {
        return $this->_ListByWorkspace_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'workspaceName' => $workspaceName
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateOrUpdate_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Delete_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByWorkspace_operation;
}
