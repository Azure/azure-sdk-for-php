<?php
namespace Microsoft\Azure\Management\Sql;
final class ServerCommunicationLinks
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Delete_operation = $_client->createOperation('ServerCommunicationLinks_Delete');
        $this->_Get_operation = $_client->createOperation('ServerCommunicationLinks_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('ServerCommunicationLinks_CreateOrUpdate');
        $this->_ListByServer_operation = $_client->createOperation('ServerCommunicationLinks_ListByServer');
    }
    /**
     * Deletes a server communication link.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $communicationLinkName
     */
    public function delete(
        $resourceGroupName,
        $serverName,
        $communicationLinkName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'communicationLinkName' => $communicationLinkName
        ]);
    }
    /**
     * Returns a server communication link.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $communicationLinkName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $serverName,
        $communicationLinkName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'communicationLinkName' => $communicationLinkName
        ]);
    }
    /**
     * Creates a server communication link.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $communicationLinkName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $serverName,
        $communicationLinkName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'communicationLinkName' => $communicationLinkName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Gets a list of server communication links.
     * @param string $resourceGroupName
     * @param string $serverName
     * @return array
     */
    public function listByServer(
        $resourceGroupName,
        $serverName
    )
    {
        return $this->_ListByServer_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName
        ]);
    }
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
    private $_CreateOrUpdate_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByServer_operation;
}
