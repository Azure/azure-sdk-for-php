<?php
namespace Microsoft\Azure\Management\RecoveryServices\Backup\_2016_06_01;
final class BackupEngines
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Get_operation = $_client->createOperation('BackupEngines_Get');
    }
    /**
     * The backup management servers registered to a Recovery Services vault. This returns a pageable list of servers.
     * @param string $vaultName
     * @param string $resourceGroupName
     * @param string $_filter
     * @param string $_skipToken
     * @return array
     */
    public function get(
        $vaultName,
        $resourceGroupName,
        $_filter,
        $_skipToken
    )
    {
        return $this->_Get_operation->call([
            'vaultName' => $vaultName,
            'resourceGroupName' => $resourceGroupName,
            '$filter' => $_filter,
            '$skipToken' => $_skipToken
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
}
