<?php
namespace Microsoft\Azure\Management\VisualStudio;
final class Projects
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListByResourceGroup_operation = $_client->createOperation('Projects_ListByResourceGroup');
        $this->_Create_operation = $_client->createOperation('Projects_Create');
        $this->_Get_operation = $_client->createOperation('Projects_Get');
        $this->_Update_operation = $_client->createOperation('Projects_Update');
        $this->_GetJobStatus_operation = $_client->createOperation('Projects_GetJobStatus');
    }
    /**
     * Gets all Visual Studio Team Services project resources created in the specified Team Services account.
     * @param string $resourceGroupName
     * @param string $rootResourceName
     * @return array
     */
    public function listByResourceGroup(
        $resourceGroupName,
        $rootResourceName
    )
    {
        return $this->_ListByResourceGroup_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'rootResourceName' => $rootResourceName
        ]);
    }
    /**
     * Creates a Team Services project in the collection with the specified name. 'VersionControlOption' and 'ProcessTemplateId' must be specified in the resource properties. Valid values for VersionControlOption: Git, Tfvc. Valid values for ProcessTemplateId: 6B724908-EF14-45CF-84F8-768B5384DA45, ADCC42AB-9882-485E-A3ED-7678F01F66BC, 27450541-8E31-4150-9947-DC59F998FC01 (these IDs correspond to Scrum, Agile, and CMMI process templates).
     * @param array $body
     * @param string $resourceGroupName
     * @param string $rootResourceName
     * @param string $resourceName
     * @param string|null $validating
     * @return array
     */
    public function create(
        array $body,
        $resourceGroupName,
        $rootResourceName,
        $resourceName,
        $validating = null
    )
    {
        return $this->_Create_operation->call([
            'body' => $body,
            'resourceGroupName' => $resourceGroupName,
            'rootResourceName' => $rootResourceName,
            'resourceName' => $resourceName,
            'validating' => $validating
        ]);
    }
    /**
     * Gets the details of a Team Services project resource.
     * @param string $resourceGroupName
     * @param string $rootResourceName
     * @param string $resourceName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $rootResourceName,
        $resourceName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'rootResourceName' => $rootResourceName,
            'resourceName' => $resourceName
        ]);
    }
    /**
     * Updates the tags of the specified Team Services project.
     * @param string $resourceGroupName
     * @param array $body
     * @param string $rootResourceName
     * @param string $resourceName
     * @return array
     */
    public function update(
        $resourceGroupName,
        array $body,
        $rootResourceName,
        $resourceName
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'body' => $body,
            'rootResourceName' => $rootResourceName,
            'resourceName' => $resourceName
        ]);
    }
    /**
     * Gets the status of the project resource creation job.
     * @param string $resourceGroupName
     * @param string $rootResourceName
     * @param string $resourceName
     * @param string $subContainerName
     * @param string $operation
     * @param string|null $jobId
     * @return array
     */
    public function getJobStatus(
        $resourceGroupName,
        $rootResourceName,
        $resourceName,
        $subContainerName,
        $operation,
        $jobId = null
    )
    {
        return $this->_GetJobStatus_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'rootResourceName' => $rootResourceName,
            'resourceName' => $resourceName,
            'subContainerName' => $subContainerName,
            'operation' => $operation,
            'jobId' => $jobId
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByResourceGroup_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Create_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Update_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetJobStatus_operation;
}
