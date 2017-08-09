<?php
namespace Microsoft\Azure\Management\RecoveryServices\Backup;
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
     * Gets the operation result of operation triggered by Export Jobs API. If the operation is successful, then it also contains URL of a Blob and a SAS key to access the same. The blob contains exported jobs in JSON serialized format.
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
