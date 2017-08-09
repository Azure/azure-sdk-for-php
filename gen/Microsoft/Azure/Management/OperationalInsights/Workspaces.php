<?php
namespace Microsoft\Azure\Management\OperationalInsights;
final class Workspaces
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_DisableIntelligencePack_operation = $_client->createOperation('Workspaces_DisableIntelligencePack');
        $this->_EnableIntelligencePack_operation = $_client->createOperation('Workspaces_EnableIntelligencePack');
        $this->_ListIntelligencePacks_operation = $_client->createOperation('Workspaces_ListIntelligencePacks');
        $this->_GetSharedKeys_operation = $_client->createOperation('Workspaces_GetSharedKeys');
        $this->_ListUsages_operation = $_client->createOperation('Workspaces_ListUsages');
        $this->_ListManagementGroups_operation = $_client->createOperation('Workspaces_ListManagementGroups');
        $this->_ListByResourceGroup_operation = $_client->createOperation('Workspaces_ListByResourceGroup');
        $this->_List_operation = $_client->createOperation('Workspaces_List');
        $this->_CreateOrUpdate_operation = $_client->createOperation('Workspaces_CreateOrUpdate');
        $this->_Delete_operation = $_client->createOperation('Workspaces_Delete');
        $this->_Get_operation = $_client->createOperation('Workspaces_Get');
        $this->_ListLinkTargets_operation = $_client->createOperation('Workspaces_ListLinkTargets');
        $this->_GetSchema_operation = $_client->createOperation('Workspaces_GetSchema');
        $this->_GetSearchResults_operation = $_client->createOperation('Workspaces_GetSearchResults');
        $this->_UpdateSearchResults_operation = $_client->createOperation('Workspaces_UpdateSearchResults');
    }
    /**
     * Disables an intelligence pack for a given workspace.
     * @param string $resourceGroupName
     * @param string $workspaceName
     * @param string $intelligencePackName
     */
    public function disableIntelligencePack(
        $resourceGroupName,
        $workspaceName,
        $intelligencePackName
    )
    {
        return $this->_DisableIntelligencePack_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'workspaceName' => $workspaceName,
            'intelligencePackName' => $intelligencePackName
        ]);
    }
    /**
     * Enables an intelligence pack for a given workspace.
     * @param string $resourceGroupName
     * @param string $workspaceName
     * @param string $intelligencePackName
     */
    public function enableIntelligencePack(
        $resourceGroupName,
        $workspaceName,
        $intelligencePackName
    )
    {
        return $this->_EnableIntelligencePack_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'workspaceName' => $workspaceName,
            'intelligencePackName' => $intelligencePackName
        ]);
    }
    /**
     * Lists all the intelligence packs possible and whether they are enabled or disabled for a given workspace.
     * @param string $resourceGroupName
     * @param string $workspaceName
     * @return array[]
     */
    public function listIntelligencePacks(
        $resourceGroupName,
        $workspaceName
    )
    {
        return $this->_ListIntelligencePacks_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'workspaceName' => $workspaceName
        ]);
    }
    /**
     * Gets the shared keys for a workspace.
     * @param string $resourceGroupName
     * @param string $workspaceName
     * @return array
     */
    public function getSharedKeys(
        $resourceGroupName,
        $workspaceName
    )
    {
        return $this->_GetSharedKeys_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'workspaceName' => $workspaceName
        ]);
    }
    /**
     * Gets a list of usage metrics for a workspace.
     * @param string $resourceGroupName
     * @param string $workspaceName
     * @return array
     */
    public function listUsages(
        $resourceGroupName,
        $workspaceName
    )
    {
        return $this->_ListUsages_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'workspaceName' => $workspaceName
        ]);
    }
    /**
     * Gets a list of management groups connected to a workspace.
     * @param string $resourceGroupName
     * @param string $workspaceName
     * @return array
     */
    public function listManagementGroups(
        $resourceGroupName,
        $workspaceName
    )
    {
        return $this->_ListManagementGroups_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'workspaceName' => $workspaceName
        ]);
    }
    /**
     * Gets workspaces in a resource group.
     * @param string $resourceGroupName
     * @return array
     */
    public function listByResourceGroup($resourceGroupName)
    {
        return $this->_ListByResourceGroup_operation->call(['resourceGroupName' => $resourceGroupName]);
    }
    /**
     * Gets the workspaces in a subscription.
     * @return array
     */
    public function list_()
    {
        return $this->_List_operation->call([]);
    }
    /**
     * Create or update a workspace.
     * @param string $resourceGroupName
     * @param string $workspaceName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $workspaceName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'workspaceName' => $workspaceName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Deletes a workspace instance.
     * @param string $resourceGroupName
     * @param string $workspaceName
     */
    public function delete(
        $resourceGroupName,
        $workspaceName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'workspaceName' => $workspaceName
        ]);
    }
    /**
     * Gets a workspace instance.
     * @param string $resourceGroupName
     * @param string $workspaceName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $workspaceName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'workspaceName' => $workspaceName
        ]);
    }
    /**
     * Get a list of workspaces which the current user has administrator privileges and are not associated with an Azure Subscription. The subscriptionId parameter in the Url is ignored.
     * @return array[]
     */
    public function listLinkTargets()
    {
        return $this->_ListLinkTargets_operation->call([]);
    }
    /**
     * Gets the schema for a given workspace.
     * @param string $resourceGroupName
     * @param string $workspaceName
     * @return array
     */
    public function getSchema(
        $resourceGroupName,
        $workspaceName
    )
    {
        return $this->_GetSchema_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'workspaceName' => $workspaceName
        ]);
    }
    /**
     * Submit a search for a given workspace. The response will contain an id to track the search. User can use the id to poll the search status and get the full search result later if the search takes long time to finish.
     * @param string $resourceGroupName
     * @param string $workspaceName
     * @param array $parameters
     * @return array
     */
    public function getSearchResults(
        $resourceGroupName,
        $workspaceName,
        array $parameters
    )
    {
        return $this->_GetSearchResults_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'workspaceName' => $workspaceName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Gets updated search results for a given search query.
     * @param string $resourceGroupName
     * @param string $workspaceName
     * @param string $id
     * @return array
     */
    public function updateSearchResults(
        $resourceGroupName,
        $workspaceName,
        $id
    )
    {
        return $this->_UpdateSearchResults_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'workspaceName' => $workspaceName,
            'id' => $id
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_DisableIntelligencePack_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_EnableIntelligencePack_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListIntelligencePacks_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetSharedKeys_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListUsages_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListManagementGroups_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByResourceGroup_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
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
    private $_ListLinkTargets_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetSchema_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetSearchResults_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_UpdateSearchResults_operation;
}
