<?php
namespace Microsoft\Azure\Management\RecoveryServices\Backup;
final class Jobs
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Export_operation = $_client->createOperation('Jobs_Export');
    }
    /**
     * Triggers export of jobs specified by filters and returns an OperationID to track.
     * @param string $vaultName
     * @param string $resourceGroupName
     * @param string $_filter
     */
    public function export(
        $vaultName,
        $resourceGroupName,
        $_filter
    )
    {
        return $this->_Export_operation->call([
            'vaultName' => $vaultName,
            'resourceGroupName' => $resourceGroupName,
            '$filter' => $_filter
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Export_operation;
}
