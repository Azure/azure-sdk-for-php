<?php
namespace Microsoft\Azure\Management\PowerBIEmbedded;
final class Workspaces
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_List_operation = $_client->createOperation('Workspaces_List');
    }
    /**
     * Retrieves all existing Power BI workspaces in the specified workspace collection.
     * @param string $resourceGroupName
     * @param string $workspaceCollectionName
     * @return array
     */
    public function list_(
        $resourceGroupName,
        $workspaceCollectionName
    )
    {
        return $this->_List_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'workspaceCollectionName' => $workspaceCollectionName
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
}
