<?php
namespace Microsoft\Azure\Management\RecoveryServices\Backup\_2016_06_01;
final class ExportJobsOperationResults
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Get_operation = $_client->createOperation('ExportJobsOperationResults_Get');
    }
    /**
     * Gets the result of the operation triggered by the ExportJob API.
     * @param string $vaultName
     * @param string $resourceGroupName
     * @param string $operationId
     * @return array
     */
    public function get(
        $vaultName,
        $resourceGroupName,
        $operationId
    )
    {
        return $this->_Get_operation->call([
            'vaultName' => $vaultName,
            'resourceGroupName' => $resourceGroupName,
            'operationId' => $operationId
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
}
