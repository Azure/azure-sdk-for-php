<?php
namespace Microsoft\Azure\Management\ServiceMap;
final class ClientGroups
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Get_operation = $_client->createOperation('ClientGroups_Get');
        $this->_GetMembersCount_operation = $_client->createOperation('ClientGroups_GetMembersCount');
        $this->_ListMembers_operation = $_client->createOperation('ClientGroups_ListMembers');
    }
    /**
     * Retrieves the specified client group
     * @param string $resourceGroupName
     * @param string $workspaceName
     * @param string $clientGroupName
     * @param string $startTime
     * @param string $endTime
     * @return array
     */
    public function get(
        $resourceGroupName,
        $workspaceName,
        $clientGroupName,
        $startTime,
        $endTime
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'workspaceName' => $workspaceName,
            'clientGroupName' => $clientGroupName,
            'startTime' => $startTime,
            'endTime' => $endTime
        ]);
    }
    /**
     * Returns the approximate number of members in the client group.
     * @param string $resourceGroupName
     * @param string $workspaceName
     * @param string $clientGroupName
     * @param string $startTime
     * @param string $endTime
     * @return array
     */
    public function getMembersCount(
        $resourceGroupName,
        $workspaceName,
        $clientGroupName,
        $startTime,
        $endTime
    )
    {
        return $this->_GetMembersCount_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'workspaceName' => $workspaceName,
            'clientGroupName' => $clientGroupName,
            'startTime' => $startTime,
            'endTime' => $endTime
        ]);
    }
    /**
     * Returns the members of the client group during the specified time interval.
     * @param string $resourceGroupName
     * @param string $workspaceName
     * @param string $clientGroupName
     * @param string $startTime
     * @param string $endTime
     * @param integer $_top
     * @return array
     */
    public function listMembers(
        $resourceGroupName,
        $workspaceName,
        $clientGroupName,
        $startTime,
        $endTime,
        $_top
    )
    {
        return $this->_ListMembers_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'workspaceName' => $workspaceName,
            'clientGroupName' => $clientGroupName,
            'startTime' => $startTime,
            'endTime' => $endTime,
            '$top' => $_top
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetMembersCount_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListMembers_operation;
}
