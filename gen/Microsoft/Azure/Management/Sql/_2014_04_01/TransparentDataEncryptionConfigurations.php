<?php
namespace Microsoft\Azure\Management\Sql\_2014_04_01;
final class TransparentDataEncryptionConfigurations
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListByDatabase_operation = $_client->createOperation('TransparentDataEncryptionConfigurations_ListByDatabase');
    }
    /**
     * Gets a list of a database's transparent data encryption configurations. There is only ever one element, named 'current', so GetTransparentDataEncryptionConfiguration should be used instead.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $databaseName
     * @return array
     */
    public function listByDatabase(
        $resourceGroupName,
        $serverName,
        $databaseName
    )
    {
        return $this->_ListByDatabase_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'databaseName' => $databaseName
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByDatabase_operation;
}
