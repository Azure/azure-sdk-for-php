<?php
namespace Microsoft\Azure\Management\StorSimple8000Series;
final class Jobs
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListByDevice_operation = $_client->createOperation('Jobs_ListByDevice');
        $this->_Get_operation = $_client->createOperation('Jobs_Get');
        $this->_Cancel_operation = $_client->createOperation('Jobs_Cancel');
        $this->_ListByManager_operation = $_client->createOperation('Jobs_ListByManager');
    }
    /**
     * Gets all the jobs for specified device. With optional OData query parameters, a filtered set of jobs is returned.
     * @param string $deviceName
     * @param string $resourceGroupName
     * @param string $managerName
     * @param string $_filter
     * @return array
     */
    public function listByDevice(
        $deviceName,
        $resourceGroupName,
        $managerName,
        $_filter
    )
    {
        return $this->_ListByDevice_operation->call([
            'deviceName' => $deviceName,
            'resourceGroupName' => $resourceGroupName,
            'managerName' => $managerName,
            '$filter' => $_filter
        ]);
    }
    /**
     * Gets the details of the specified job name.
     * @param string $deviceName
     * @param string $jobName
     * @param string $resourceGroupName
     * @param string $managerName
     * @return array
     */
    public function get(
        $deviceName,
        $jobName,
        $resourceGroupName,
        $managerName
    )
    {
        return $this->_Get_operation->call([
            'deviceName' => $deviceName,
            'jobName' => $jobName,
            'resourceGroupName' => $resourceGroupName,
            'managerName' => $managerName
        ]);
    }
    /**
     * Cancels a job on the device.
     * @param string $deviceName
     * @param string $jobName
     * @param string $resourceGroupName
     * @param string $managerName
     */
    public function cancel(
        $deviceName,
        $jobName,
        $resourceGroupName,
        $managerName
    )
    {
        return $this->_Cancel_operation->call([
            'deviceName' => $deviceName,
            'jobName' => $jobName,
            'resourceGroupName' => $resourceGroupName,
            'managerName' => $managerName
        ]);
    }
    /**
     * Gets all the jobs for the specified manager. With optional OData query parameters, a filtered set of jobs is returned.
     * @param string $resourceGroupName
     * @param string $managerName
     * @param string $_filter
     * @return array
     */
    public function listByManager(
        $resourceGroupName,
        $managerName,
        $_filter
    )
    {
        return $this->_ListByManager_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'managerName' => $managerName,
            '$filter' => $_filter
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByDevice_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Cancel_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByManager_operation;
}
