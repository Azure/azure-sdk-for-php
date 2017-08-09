<?php
namespace Microsoft\Azure\Management\OperationalInsights;
final class DataSources
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_CreateOrUpdate_operation = $_client->createOperation('DataSources_CreateOrUpdate');
        $this->_Delete_operation = $_client->createOperation('DataSources_Delete');
        $this->_Get_operation = $_client->createOperation('DataSources_Get');
        $this->_ListByWorkspace_operation = $_client->createOperation('DataSources_ListByWorkspace');
    }
    /**
     * Create or update a data source.
     * @param string $resourceGroupName
     * @param string $workspaceName
     * @param string $dataSourceName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $workspaceName,
        $dataSourceName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'workspaceName' => $workspaceName,
            'dataSourceName' => $dataSourceName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Deletes a data source instance.
     * @param string $resourceGroupName
     * @param string $workspaceName
     * @param string $dataSourceName
     */
    public function delete(
        $resourceGroupName,
        $workspaceName,
        $dataSourceName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'workspaceName' => $workspaceName,
            'dataSourceName' => $dataSourceName
        ]);
    }
    /**
     * Gets a datasource instance.
     * @param string $resourceGroupName
     * @param string $workspaceName
     * @param string $dataSourceName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $workspaceName,
        $dataSourceName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'workspaceName' => $workspaceName,
            'dataSourceName' => $dataSourceName
        ]);
    }
    /**
     * Gets the first page of data source instances in a workspace with the link to the next page.
     * @param string $resourceGroupName
     * @param string $workspaceName
     * @param string $_filter
     * @param string $_skiptoken
     * @return array
     */
    public function listByWorkspace(
        $resourceGroupName,
        $workspaceName,
        $_filter,
        $_skiptoken
    )
    {
        return $this->_ListByWorkspace_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'workspaceName' => $workspaceName,
            '$filter' => $_filter,
            '$skiptoken' => $_skiptoken
        ]);
    }
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
    private $_ListByWorkspace_operation;
}
