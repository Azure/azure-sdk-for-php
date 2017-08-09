<?php
namespace Microsoft\Azure\Management\OperationalInsights;
final class LinkedServices
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_CreateOrUpdate_operation = $_client->createOperation('LinkedServices_CreateOrUpdate');
        $this->_Delete_operation = $_client->createOperation('LinkedServices_Delete');
        $this->_Get_operation = $_client->createOperation('LinkedServices_Get');
        $this->_ListByWorkspace_operation = $_client->createOperation('LinkedServices_ListByWorkspace');
    }
    /**
     * Create or update a linked service.
     * @param string $resourceGroupName
     * @param string $workspaceName
     * @param string $linkedServiceName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $workspaceName,
        $linkedServiceName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'workspaceName' => $workspaceName,
            'linkedServiceName' => $linkedServiceName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Deletes a linked service instance.
     * @param string $resourceGroupName
     * @param string $workspaceName
     * @param string $linkedServiceName
     */
    public function delete(
        $resourceGroupName,
        $workspaceName,
        $linkedServiceName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'workspaceName' => $workspaceName,
            'linkedServiceName' => $linkedServiceName
        ]);
    }
    /**
     * Gets a linked service instance.
     * @param string $resourceGroupName
     * @param string $workspaceName
     * @param string $linkedServiceName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $workspaceName,
        $linkedServiceName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'workspaceName' => $workspaceName,
            'linkedServiceName' => $linkedServiceName
        ]);
    }
    /**
     * Gets the linked services instances in a workspace.
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
