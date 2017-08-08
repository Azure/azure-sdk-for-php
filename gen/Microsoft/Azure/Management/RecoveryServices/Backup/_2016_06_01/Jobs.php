<?php
namespace Microsoft\Azure\Management\RecoveryServices\Backup\_2016_06_01;
final class Jobs
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Export_operation = $_client->createOperation('Jobs_Export');
        $this->_List_operation = $_client->createOperation('Jobs_List');
    }
    /**
     * Exports all jobs for a given Shared Access Signatures (SAS) URL. The SAS URL expires within 15 minutes of its creation.
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
     * Provides a pageable list of jobs.
     * @param string $vaultName
     * @param string $resourceGroupName
     * @param string $_filter
     * @param string $_skipToken
     * @return array
     */
    public function list_(
        $vaultName,
        $resourceGroupName,
        $_filter,
        $_skipToken
    )
    {
        return $this->_List_operation->call([
            'vaultName' => $vaultName,
            'resourceGroupName' => $resourceGroupName,
            '$filter' => $_filter,
            '$skipToken' => $_skipToken
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Export_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
}
