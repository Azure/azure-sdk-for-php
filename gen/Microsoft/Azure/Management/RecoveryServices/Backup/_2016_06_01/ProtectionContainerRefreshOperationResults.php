<?php
namespace Microsoft\Azure\Management\RecoveryServices\Backup\_2016_06_01;
final class ProtectionContainerRefreshOperationResults
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Get_operation = $_client->createOperation('ProtectionContainerRefreshOperationResults_Get');
    }
    /**
     * Provides the result of the refresh operation triggered by the BeginRefresh operation.
     * @param string $vaultName
     * @param string $resourceGroupName
     * @param string $fabricName
     * @param string $operationId
     */
    public function get(
        $vaultName,
        $resourceGroupName,
        $fabricName,
        $operationId
    )
    {
        return $this->_Get_operation->call([
            'vaultName' => $vaultName,
            'resourceGroupName' => $resourceGroupName,
            'fabricName' => $fabricName,
            'operationId' => $operationId
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
}
