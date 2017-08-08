<?php
namespace Microsoft\Azure\Management\Sql\_2015_05_01_preview;
final class ServerAdvisors
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListByServer_operation = $_client->createOperation('ServerAdvisors_ListByServer');
        $this->_Get_operation = $_client->createOperation('ServerAdvisors_Get');
        $this->_Update_operation = $_client->createOperation('ServerAdvisors_Update');
    }
    /**
     * Gets a list of server advisors.
     * @param string $resourceGroupName
     * @param string $serverName
     * @return array[]
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
     * Gets a server advisor.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $advisorName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $serverName,
        $advisorName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'advisorName' => $advisorName
        ]);
    }
    /**
     * Updates a server advisor.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $advisorName
     * @param array $parameters
     * @return array
     */
    public function update(
        $resourceGroupName,
        $serverName,
        $advisorName,
        array $parameters
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'advisorName' => $advisorName,
            'parameters' => $parameters
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByServer_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Update_operation;
}
