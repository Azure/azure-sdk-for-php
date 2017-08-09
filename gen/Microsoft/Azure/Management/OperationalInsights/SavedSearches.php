<?php
namespace Microsoft\Azure\Management\OperationalInsights;
final class SavedSearches
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Delete_operation = $_client->createOperation('SavedSearches_Delete');
        $this->_CreateOrUpdate_operation = $_client->createOperation('SavedSearches_CreateOrUpdate');
        $this->_Get_operation = $_client->createOperation('SavedSearches_Get');
        $this->_ListByWorkspace_operation = $_client->createOperation('SavedSearches_ListByWorkspace');
        $this->_GetResults_operation = $_client->createOperation('SavedSearches_GetResults');
    }
    /**
     * Deletes the specified saved search in a given workspace.
     * @param string $resourceGroupName
     * @param string $workspaceName
     * @param string $savedSearchName
     */
    public function delete(
        $resourceGroupName,
        $workspaceName,
        $savedSearchName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'workspaceName' => $workspaceName,
            'savedSearchName' => $savedSearchName
        ]);
    }
    /**
     * Creates or updates a saved search for a given workspace.
     * @param string $resourceGroupName
     * @param string $workspaceName
     * @param string $savedSearchName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $workspaceName,
        $savedSearchName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'workspaceName' => $workspaceName,
            'savedSearchName' => $savedSearchName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Gets the specified saved search for a given workspace.
     * @param string $resourceGroupName
     * @param string $workspaceName
     * @param string $savedSearchName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $workspaceName,
        $savedSearchName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'workspaceName' => $workspaceName,
            'savedSearchName' => $savedSearchName
        ]);
    }
    /**
     * Gets the saved searches for a given Log Analytics Workspace
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
     * Gets the results from a saved search for a given workspace.
     * @param string $resourceGroupName
     * @param string $workspaceName
     * @param string $savedSearchName
     * @return array
     */
    public function getResults(
        $resourceGroupName,
        $workspaceName,
        $savedSearchName
    )
    {
        return $this->_GetResults_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'workspaceName' => $workspaceName,
            'savedSearchName' => $savedSearchName
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Delete_operation;
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
    private $_ListByWorkspace_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetResults_operation;
}
