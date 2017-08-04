<?php
namespace Microsoft\Azure\Management\PowerBIEmbedded\_2016_01_29;
final class WorkspaceCollections
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_GetByName_operation = $_client->createOperation('WorkspaceCollections_getByName');
        $this->_Create_operation = $_client->createOperation('WorkspaceCollections_create');
        $this->_Update_operation = $_client->createOperation('WorkspaceCollections_update');
        $this->_Delete_operation = $_client->createOperation('WorkspaceCollections_delete');
        $this->_CheckNameAvailability_operation = $_client->createOperation('WorkspaceCollections_checkNameAvailability');
        $this->_ListByResourceGroup_operation = $_client->createOperation('WorkspaceCollections_listByResourceGroup');
        $this->_ListBySubscription_operation = $_client->createOperation('WorkspaceCollections_listBySubscription');
        $this->_GetAccessKeys_operation = $_client->createOperation('WorkspaceCollections_getAccessKeys');
        $this->_RegenerateKey_operation = $_client->createOperation('WorkspaceCollections_regenerateKey');
        $this->_Migrate_operation = $_client->createOperation('WorkspaceCollections_migrate');
    }
    /**
     * Retrieves an existing Power BI Workspace Collection.
     * @param string $resourceGroupName
     * @param string $workspaceCollectionName
     * @return array
     */
    public function getByName(
        $resourceGroupName,
        $workspaceCollectionName
    )
    {
        return $this->_GetByName_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'workspaceCollectionName' => $workspaceCollectionName
        ]);
    }
    /**
     * Creates a new Power BI Workspace Collection with the specified properties. A Power BI Workspace Collection contains one or more workspaces, and can be used to provision keys that provide API access to those workspaces.
     * @param string $resourceGroupName
     * @param string $workspaceCollectionName
     * @param array $body
     * @return array
     */
    public function create(
        $resourceGroupName,
        $workspaceCollectionName,
        array $body
    )
    {
        return $this->_Create_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'workspaceCollectionName' => $workspaceCollectionName,
            'body' => $body
        ]);
    }
    /**
     * Update an existing Power BI Workspace Collection with the specified properties.
     * @param string $resourceGroupName
     * @param string $workspaceCollectionName
     * @param array $body
     * @return array
     */
    public function update(
        $resourceGroupName,
        $workspaceCollectionName,
        array $body
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'workspaceCollectionName' => $workspaceCollectionName,
            'body' => $body
        ]);
    }
    /**
     * Delete a Power BI Workspace Collection.
     * @param string $resourceGroupName
     * @param string $workspaceCollectionName
     */
    public function delete(
        $resourceGroupName,
        $workspaceCollectionName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'workspaceCollectionName' => $workspaceCollectionName
        ]);
    }
    /**
     * Verify the specified Power BI Workspace Collection name is valid and not already in use.
     * @param string $location
     * @param array $body
     * @return array
     */
    public function checkNameAvailability(
        $location,
        array $body
    )
    {
        return $this->_CheckNameAvailability_operation->call([
            'location' => $location,
            'body' => $body
        ]);
    }
    /**
     * Retrieves all existing Power BI workspace collections in the specified resource group.
     * @param string $resourceGroupName
     * @return array
     */
    public function listByResourceGroup($resourceGroupName)
    {
        return $this->_ListByResourceGroup_operation->call(['resourceGroupName' => $resourceGroupName]);
    }
    /**
     * Retrieves all existing Power BI workspace collections in the specified subscription.
     * @return array
     */
    public function listBySubscription()
    {
        return $this->_ListBySubscription_operation->call([]);
    }
    /**
     * Retrieves the primary and secondary access keys for the specified Power BI Workspace Collection.
     * @param string $resourceGroupName
     * @param string $workspaceCollectionName
     * @return array
     */
    public function getAccessKeys(
        $resourceGroupName,
        $workspaceCollectionName
    )
    {
        return $this->_GetAccessKeys_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'workspaceCollectionName' => $workspaceCollectionName
        ]);
    }
    /**
     * Regenerates the primary or secondary access key for the specified Power BI Workspace Collection.
     * @param string $resourceGroupName
     * @param string $workspaceCollectionName
     * @param array $body
     * @return array
     */
    public function regenerateKey(
        $resourceGroupName,
        $workspaceCollectionName,
        array $body
    )
    {
        return $this->_RegenerateKey_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'workspaceCollectionName' => $workspaceCollectionName,
            'body' => $body
        ]);
    }
    /**
     * Migrates an existing Power BI Workspace Collection to a different resource group and/or subscription.
     * @param string $resourceGroupName
     * @param array $body
     */
    public function migrate(
        $resourceGroupName,
        array $body
    )
    {
        return $this->_Migrate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'body' => $body
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetByName_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Create_operation;
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
    private $_CheckNameAvailability_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByResourceGroup_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListBySubscription_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetAccessKeys_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_RegenerateKey_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Migrate_operation;
}
