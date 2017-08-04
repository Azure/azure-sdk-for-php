<?php
namespace Microsoft\Azure\Management\PostgreSql\_2017_04_30_preview;
final class LogFiles
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListByServer_operation = $_client->createOperation('LogFiles_ListByServer');
    }
    /**
     * List all the log files in a given server.
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
    private $_ListByServer_operation;
}
