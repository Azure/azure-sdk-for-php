<?php
namespace Microsoft\Azure\Management\Sql;
final class TransparentDataEncryptionActivities
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListByConfiguration_operation = $_client->createOperation('TransparentDataEncryptionActivities_ListByConfiguration');
    }
    /**
     * Returns a database's transparent data encryption operation result.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $databaseName
     * @return array
     */
    public function listByConfiguration(
        $resourceGroupName,
        $serverName,
        $databaseName
    )
    {
        return $this->_ListByConfiguration_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'databaseName' => $databaseName
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByConfiguration_operation;
}
