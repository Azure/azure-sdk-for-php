<?php
namespace Microsoft\Azure\Management\OperationalInsights\_2015_03_20;
final class Workspaces
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListLinkTargets_operation = $_client->createOperation('Workspaces_ListLinkTargets');
        $this->_GetSchema_operation = $_client->createOperation('Workspaces_GetSchema');
        $this->_GetSearchResults_operation = $_client->createOperation('Workspaces_GetSearchResults');
        $this->_UpdateSearchResults_operation = $_client->createOperation('Workspaces_UpdateSearchResults');
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
