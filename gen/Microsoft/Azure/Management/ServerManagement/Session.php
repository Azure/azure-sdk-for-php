<?php
namespace Microsoft\Azure\Management\ServerManagement;
final class Session
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Create_operation = $_client->createOperation('Session_Create');
        $this->_Delete_operation = $_client->createOperation('Session_Delete');
        $this->_Get_operation = $_client->createOperation('Session_Get');
    }
    /**
     * Creates a session for a node.
     * @param string $resourceGroupName
     * @param string $nodeName
     * @param string $session
     * @param array $sessionParameters
     * @return array
     */
    public function create(
        $resourceGroupName,
        $nodeName,
        $session,
        array $sessionParameters
    )
    {
        return $this->_Create_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'nodeName' => $nodeName,
            'session' => $session,
            'SessionParameters' => $sessionParameters
        ]);
    }
    /**
     * Deletes a session for a node.
     * @param string $resourceGroupName
     * @param string $nodeName
     * @param string $session
     */
    public function delete(
        $resourceGroupName,
        $nodeName,
        $session
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'nodeName' => $nodeName,
            'session' => $session
        ]);
    }
    /**
     * Gets a session for a node.
     * @param string $resourceGroupName
     * @param string $nodeName
     * @param string $session
     * @return array
     */
    public function get(
        $resourceGroupName,
        $nodeName,
        $session
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'nodeName' => $nodeName,
            'session' => $session
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Create_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Delete_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
}
