<?php
namespace Microsoft\Azure\Management\MobileEngagement;
final class ExportTasks
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_List_operation = $_client->createOperation('ExportTasks_List');
        $this->_Get_operation = $_client->createOperation('ExportTasks_Get');
        $this->_CreateActivitiesTask_operation = $_client->createOperation('ExportTasks_CreateActivitiesTask');
        $this->_CreateCrashesTask_operation = $_client->createOperation('ExportTasks_CreateCrashesTask');
        $this->_CreateErrorsTask_operation = $_client->createOperation('ExportTasks_CreateErrorsTask');
        $this->_CreateEventsTask_operation = $_client->createOperation('ExportTasks_CreateEventsTask');
        $this->_CreateJobsTask_operation = $_client->createOperation('ExportTasks_CreateJobsTask');
        $this->_CreateSessionsTask_operation = $_client->createOperation('ExportTasks_CreateSessionsTask');
        $this->_CreateTagsTask_operation = $_client->createOperation('ExportTasks_CreateTagsTask');
        $this->_CreateTokensTask_operation = $_client->createOperation('ExportTasks_CreateTokensTask');
        $this->_CreateFeedbackTaskByDateRange_operation = $_client->createOperation('ExportTasks_CreateFeedbackTaskByDateRange');
        $this->_CreateFeedbackTaskByCampaign_operation = $_client->createOperation('ExportTasks_CreateFeedbackTaskByCampaign');
    }
    /**
     * Get the list of export tasks.
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
     * Retrieves information about a previously created export task.
     * @param string $resourceGroupName
     * @param string $appCollection
     * @param string $appName
     * @param string $id
     * @return array
     */
    public function get(
        $resourceGroupName,
        $appCollection,
        $appName,
        $id
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'appCollection' => $appCollection,
            'appName' => $appName,
            'id' => $id
        ]);
    }
    /**
     * Creates a task to export activities.
     * @param string $resourceGroupName
     * @param string $appCollection
     * @param string $appName
     * @param array $parameters
     * @return array
     */
    public function createActivitiesTask(
        $resourceGroupName,
        $appCollection,
        $appName,
        array $parameters
    )
    {
        return $this->_CreateActivitiesTask_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'appCollection' => $appCollection,
            'appName' => $appName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Creates a task to export crashes.
     * @param string $resourceGroupName
     * @param string $appCollection
     * @param string $appName
     * @param array $parameters
     * @return array
     */
    public function createCrashesTask(
        $resourceGroupName,
        $appCollection,
        $appName,
        array $parameters
    )
    {
        return $this->_CreateCrashesTask_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'appCollection' => $appCollection,
            'appName' => $appName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Creates a task to export errors.
     * @param string $resourceGroupName
     * @param string $appCollection
     * @param string $appName
     * @param array $parameters
     * @return array
     */
    public function createErrorsTask(
        $resourceGroupName,
        $appCollection,
        $appName,
        array $parameters
    )
    {
        return $this->_CreateErrorsTask_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'appCollection' => $appCollection,
            'appName' => $appName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Creates a task to export events.
     * @param string $resourceGroupName
     * @param string $appCollection
     * @param string $appName
     * @param array $parameters
     * @return array
     */
    public function createEventsTask(
        $resourceGroupName,
        $appCollection,
        $appName,
        array $parameters
    )
    {
        return $this->_CreateEventsTask_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'appCollection' => $appCollection,
            'appName' => $appName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Creates a task to export jobs.
     * @param string $resourceGroupName
     * @param string $appCollection
     * @param string $appName
     * @param array $parameters
     * @return array
     */
    public function createJobsTask(
        $resourceGroupName,
        $appCollection,
        $appName,
        array $parameters
    )
    {
        return $this->_CreateJobsTask_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'appCollection' => $appCollection,
            'appName' => $appName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Creates a task to export sessions.
     * @param string $resourceGroupName
     * @param string $appCollection
     * @param string $appName
     * @param array $parameters
     * @return array
     */
    public function createSessionsTask(
        $resourceGroupName,
        $appCollection,
        $appName,
        array $parameters
    )
    {
        return $this->_CreateSessionsTask_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'appCollection' => $appCollection,
            'appName' => $appName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Creates a task to export tags.
     * @param string $resourceGroupName
     * @param string $appCollection
     * @param string $appName
     * @param array $parameters
     * @return array
     */
    public function createTagsTask(
        $resourceGroupName,
        $appCollection,
        $appName,
        array $parameters
    )
    {
        return $this->_CreateTagsTask_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'appCollection' => $appCollection,
            'appName' => $appName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Creates a task to export tags.
     * @param string $resourceGroupName
     * @param string $appCollection
     * @param string $appName
     * @param array $parameters
     * @return array
     */
    public function createTokensTask(
        $resourceGroupName,
        $appCollection,
        $appName,
        array $parameters
    )
    {
        return $this->_CreateTokensTask_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'appCollection' => $appCollection,
            'appName' => $appName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Creates a task to export push campaign data for a date range.
     * @param string $resourceGroupName
     * @param string $appCollection
     * @param string $appName
     * @param array $parameters
     * @return array
     */
    public function createFeedbackTaskByDateRange(
        $resourceGroupName,
        $appCollection,
        $appName,
        array $parameters
    )
    {
        return $this->_CreateFeedbackTaskByDateRange_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'appCollection' => $appCollection,
            'appName' => $appName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Creates a task to export push campaign data for a set of campaigns.
     * @param string $resourceGroupName
     * @param string $appCollection
     * @param string $appName
     * @param array $parameters
     * @return array
     */
    public function createFeedbackTaskByCampaign(
        $resourceGroupName,
        $appCollection,
        $appName,
        array $parameters
    )
    {
        return $this->_CreateFeedbackTaskByCampaign_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'appCollection' => $appCollection,
            'appName' => $appName,
            'parameters' => $parameters
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateActivitiesTask_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateCrashesTask_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateErrorsTask_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateEventsTask_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateJobsTask_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateSessionsTask_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateTagsTask_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateTokensTask_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateFeedbackTaskByDateRange_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateFeedbackTaskByCampaign_operation;
}
