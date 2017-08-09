<?php
namespace Microsoft\Azure\Management\CustomerInsights;
final class Links
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_CreateOrUpdate_operation = $_client->createOperation('Links_CreateOrUpdate');
        $this->_Get_operation = $_client->createOperation('Links_Get');
        $this->_Delete_operation = $_client->createOperation('Links_Delete');
        $this->_ListByHub_operation = $_client->createOperation('Links_ListByHub');
    }
    /**
     * Creates a link or updates an existing link in the hub.
     * @param string $resourceGroupName
     * @param string $hubName
     * @param string $linkName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $hubName,
        $linkName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'hubName' => $hubName,
            'linkName' => $linkName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Gets a link in the hub.
     * @param string $resourceGroupName
     * @param string $hubName
     * @param string $linkName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $hubName,
        $linkName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'hubName' => $hubName,
            'linkName' => $linkName
        ]);
    }
    /**
     * Deletes a link in the hub.
     * @param string $resourceGroupName
     * @param string $hubName
     * @param string $linkName
     */
    public function delete(
        $resourceGroupName,
        $hubName,
        $linkName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'hubName' => $hubName,
            'linkName' => $linkName
        ]);
    }
    /**
     * Gets all the links in the specified hub.
     * @param string $resourceGroupName
     * @param string $hubName
     * @return array
     */
    public function listByHub(
        $resourceGroupName,
        $hubName
    )
    {
        return $this->_ListByHub_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'hubName' => $hubName
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
    private $_ListByHub_operation;
}
