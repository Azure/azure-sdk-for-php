<?php
namespace Microsoft\Azure\Management\RecoveryServices\SiteRecovery;
final class ReplicationJobs
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Resume_operation = $_client->createOperation('ReplicationJobs_Resume');
        $this->_Restart_operation = $_client->createOperation('ReplicationJobs_Restart');
        $this->_Cancel_operation = $_client->createOperation('ReplicationJobs_Cancel');
        $this->_Get_operation = $_client->createOperation('ReplicationJobs_Get');
        $this->_Export_operation = $_client->createOperation('ReplicationJobs_Export');
        $this->_List_operation = $_client->createOperation('ReplicationJobs_List');
    }
    /**
     * The operation to resume an Azure Site Recovery job
     * @param string $resourceName
     * @param string $resourceGroupName
     * @param string $jobName
     * @param array $resumeJobParams
     * @return array
     */
    public function resume(
        $resourceName,
        $resourceGroupName,
        $jobName,
        array $resumeJobParams
    )
    {
        return $this->_Resume_operation->call([
            'resourceName' => $resourceName,
            'resourceGroupName' => $resourceGroupName,
            'jobName' => $jobName,
            'resumeJobParams' => $resumeJobParams
        ]);
    }
    /**
     * The operation to restart an Azure Site Recovery job.
     * @param string $resourceName
     * @param string $resourceGroupName
     * @param string $jobName
     * @return array
     */
    public function restart(
        $resourceName,
        $resourceGroupName,
        $jobName
    )
    {
        return $this->_Restart_operation->call([
            'resourceName' => $resourceName,
            'resourceGroupName' => $resourceGroupName,
            'jobName' => $jobName
        ]);
    }
    /**
     * The operation to cancel an Azure Site Recovery job.
     * @param string $resourceName
     * @param string $resourceGroupName
     * @param string $jobName
     * @return array
     */
    public function cancel(
        $resourceName,
        $resourceGroupName,
        $jobName
    )
    {
        return $this->_Cancel_operation->call([
            'resourceName' => $resourceName,
            'resourceGroupName' => $resourceGroupName,
            'jobName' => $jobName
        ]);
    }
    /**
     * Get the details of an Azure Site Recovery job.
     * @param string $resourceName
     * @param string $resourceGroupName
     * @param string $jobName
     * @return array
     */
    public function get(
        $resourceName,
        $resourceGroupName,
        $jobName
    )
    {
        return $this->_Get_operation->call([
            'resourceName' => $resourceName,
            'resourceGroupName' => $resourceGroupName,
            'jobName' => $jobName
        ]);
    }
    /**
     * The operation to export the details of the Azure Site Recovery jobs of the vault.
     * @param string $resourceName
     * @param string $resourceGroupName
     * @param array $jobQueryParameter
     * @return array
     */
    public function export(
        $resourceName,
        $resourceGroupName,
        array $jobQueryParameter
    )
    {
        return $this->_Export_operation->call([
            'resourceName' => $resourceName,
            'resourceGroupName' => $resourceGroupName,
            'jobQueryParameter' => $jobQueryParameter
        ]);
    }
    /**
     * Gets the list of Azure Site Recovery Jobs for the vault.
     * @param string $resourceName
     * @param string $resourceGroupName
     * @param string $_filter
     * @return array
     */
    public function list_(
        $resourceName,
        $resourceGroupName,
        $_filter
    )
    {
        return $this->_List_operation->call([
            'resourceName' => $resourceName,
            'resourceGroupName' => $resourceGroupName,
            '$filter' => $_filter
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Resume_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Restart_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Cancel_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Export_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
}
