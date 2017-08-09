<?php
namespace Microsoft\Azure\Management\RecoveryServices\Backup;
final class JobDetails
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Get_operation = $_client->createOperation('JobDetails_Get');
    }
    /**
     * Gets exteded information associated with the job.
     * @param string $vaultName
     * @param string $resourceGroupName
     * @param string $jobName
     * @return array
     */
    public function get(
        $vaultName,
        $resourceGroupName,
        $jobName
    )
    {
        return $this->_Get_operation->call([
            'vaultName' => $vaultName,
            'resourceGroupName' => $resourceGroupName,
            'jobName' => $jobName
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
}
