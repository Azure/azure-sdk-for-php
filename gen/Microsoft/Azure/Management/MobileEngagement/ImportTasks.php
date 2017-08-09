<?php
namespace Microsoft\Azure\Management\MobileEngagement;
final class ImportTasks
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_List_operation = $_client->createOperation('ImportTasks_List');
        $this->_Create_operation = $_client->createOperation('ImportTasks_Create');
        $this->_Get_operation = $_client->createOperation('ImportTasks_Get');
    }
    /**
     * Get the list of import jobs.
     * @param string $resourceGroupName
     * @param string $appCollection
     * @param string $appName
     * @param integer|null $_skip
     * @param integer|null $_top
     * @param string|null $_orderby
     * @return array
     */
    public function list_(
        $resourceGroupName,
        $appCollection,
        $appName,
        $_skip = null,
        $_top = null,
        $_orderby = null
    )
    {
        return $this->_List_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'appCollection' => $appCollection,
            'appName' => $appName,
            '$skip' => $_skip,
            '$top' => $_top,
            '$orderby' => $_orderby
        ]);
    }
    /**
     * Creates a job to import the specified data to a storageUrl.
     * @param string $resourceGroupName
     * @param string $appCollection
     * @param string $appName
     * @param array $parameters
     * @return array
     */
    public function create(
        $resourceGroupName,
        $appCollection,
        $appName,
        array $parameters
    )
    {
        return $this->_Create_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'appCollection' => $appCollection,
            'appName' => $appName,
            'parameters' => $parameters
        ]);
    }
    /**
     * The Get import job operation retrieves information about a previously created import job.
     * @param string $id
     * @param string $resourceGroupName
     * @param string $appCollection
     * @param string $appName
     * @return array
     */
    public function get(
        $id,
        $resourceGroupName,
        $appCollection,
        $appName
    )
    {
        return $this->_Get_operation->call([
            'id' => $id,
            'resourceGroupName' => $resourceGroupName,
            'appCollection' => $appCollection,
            'appName' => $appName
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Create_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
}
