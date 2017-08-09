<?php
namespace Microsoft\Azure\Management\WebSites;
final class AppServiceEnvironments
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_List_operation = $_client->createOperation('AppServiceEnvironments_List');
        $this->_ListByResourceGroup_operation = $_client->createOperation('AppServiceEnvironments_ListByResourceGroup');
        $this->_Get_operation = $_client->createOperation('AppServiceEnvironments_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('AppServiceEnvironments_CreateOrUpdate');
        $this->_Delete_operation = $_client->createOperation('AppServiceEnvironments_Delete');
        $this->_ListCapacities_operation = $_client->createOperation('AppServiceEnvironments_ListCapacities');
        $this->_ListVips_operation = $_client->createOperation('AppServiceEnvironments_ListVips');
        $this->_ListDiagnostics_operation = $_client->createOperation('AppServiceEnvironments_ListDiagnostics');
        $this->_GetDiagnosticsItem_operation = $_client->createOperation('AppServiceEnvironments_GetDiagnosticsItem');
        $this->_ListMetricDefinitions_operation = $_client->createOperation('AppServiceEnvironments_ListMetricDefinitions');
        $this->_ListMetrics_operation = $_client->createOperation('AppServiceEnvironments_ListMetrics');
        $this->_ListMultiRolePools_operation = $_client->createOperation('AppServiceEnvironments_ListMultiRolePools');
        $this->_GetMultiRolePool_operation = $_client->createOperation('AppServiceEnvironments_GetMultiRolePool');
        $this->_CreateOrUpdateMultiRolePool_operation = $_client->createOperation('AppServiceEnvironments_CreateOrUpdateMultiRolePool');
        $this->_ListMultiRolePoolInstanceMetricDefinitions_operation = $_client->createOperation('AppServiceEnvironments_ListMultiRolePoolInstanceMetricDefinitions');
        $this->_ListMultiRolePoolInstanceMetrics_operation = $_client->createOperation('AppServiceEnvironments_ListMultiRolePoolInstanceMetrics');
        $this->_ListMultiRoleMetricDefinitions_operation = $_client->createOperation('AppServiceEnvironments_ListMultiRoleMetricDefinitions');
        $this->_ListMultiRoleMetrics_operation = $_client->createOperation('AppServiceEnvironments_ListMultiRoleMetrics');
        $this->_ListMultiRolePoolSkus_operation = $_client->createOperation('AppServiceEnvironments_ListMultiRolePoolSkus');
        $this->_ListMultiRoleUsages_operation = $_client->createOperation('AppServiceEnvironments_ListMultiRoleUsages');
        $this->_ListOperations_operation = $_client->createOperation('AppServiceEnvironments_ListOperations');
        $this->_Reboot_operation = $_client->createOperation('AppServiceEnvironments_Reboot');
        $this->_Resume_operation = $_client->createOperation('AppServiceEnvironments_Resume');
        $this->_ListAppServicePlans_operation = $_client->createOperation('AppServiceEnvironments_ListAppServicePlans');
        $this->_ListWebApps_operation = $_client->createOperation('AppServiceEnvironments_ListWebApps');
        $this->_Suspend_operation = $_client->createOperation('AppServiceEnvironments_Suspend');
        $this->_ListUsages_operation = $_client->createOperation('AppServiceEnvironments_ListUsages');
        $this->_ListWorkerPools_operation = $_client->createOperation('AppServiceEnvironments_ListWorkerPools');
        $this->_GetWorkerPool_operation = $_client->createOperation('AppServiceEnvironments_GetWorkerPool');
        $this->_CreateOrUpdateWorkerPool_operation = $_client->createOperation('AppServiceEnvironments_CreateOrUpdateWorkerPool');
        $this->_ListWorkerPoolInstanceMetricDefinitions_operation = $_client->createOperation('AppServiceEnvironments_ListWorkerPoolInstanceMetricDefinitions');
        $this->_ListWorkerPoolInstanceMetrics_operation = $_client->createOperation('AppServiceEnvironments_ListWorkerPoolInstanceMetrics');
        $this->_ListWebWorkerMetricDefinitions_operation = $_client->createOperation('AppServiceEnvironments_ListWebWorkerMetricDefinitions');
        $this->_ListWebWorkerMetrics_operation = $_client->createOperation('AppServiceEnvironments_ListWebWorkerMetrics');
        $this->_ListWorkerPoolSkus_operation = $_client->createOperation('AppServiceEnvironments_ListWorkerPoolSkus');
        $this->_ListWebWorkerUsages_operation = $_client->createOperation('AppServiceEnvironments_ListWebWorkerUsages');
    }
    /**
     * Get all App Service Environments for a subscription.
     * @return array
     */
    public function list_()
    {
        return $this->_List_operation->call([]);
    }
    /**
     * Get all App Service Environments in a resource group.
     * @param string $resourceGroupName
     * @return array
     */
    public function listByResourceGroup($resourceGroupName)
    {
        return $this->_ListByResourceGroup_operation->call(['resourceGroupName' => $resourceGroupName]);
    }
    /**
     * Get the properties of an App Service Environment.
     * @param string $resourceGroupName
     * @param string $name
     * @return array
     */
    public function get(
        $resourceGroupName,
        $name
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name
        ]);
    }
    /**
     * Create or update an App Service Environment.
     * @param string $resourceGroupName
     * @param string $name
     * @param array $hostingEnvironmentEnvelope
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $name,
        array $hostingEnvironmentEnvelope
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'hostingEnvironmentEnvelope' => $hostingEnvironmentEnvelope
        ]);
    }
    /**
     * Delete an App Service Environment.
     * @param string $resourceGroupName
     * @param string $name
     * @param boolean|null $forceDelete
     */
    public function delete(
        $resourceGroupName,
        $name,
        $forceDelete = null
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'forceDelete' => $forceDelete
        ]);
    }
    /**
     * Get the used, available, and total worker capacity an App Service Environment.
     * @param string $resourceGroupName
     * @param string $name
     * @return array
     */
    public function listCapacities(
        $resourceGroupName,
        $name
    )
    {
        return $this->_ListCapacities_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name
        ]);
    }
    /**
     * Get IP addresses assigned to an App Service Environment.
     * @param string $resourceGroupName
     * @param string $name
     * @return array
     */
    public function listVips(
        $resourceGroupName,
        $name
    )
    {
        return $this->_ListVips_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name
        ]);
    }
    /**
     * Get diagnostic information for an App Service Environment.
     * @param string $resourceGroupName
     * @param string $name
     * @return array[]
     */
    public function listDiagnostics(
        $resourceGroupName,
        $name
    )
    {
        return $this->_ListDiagnostics_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name
        ]);
    }
    /**
     * Get a diagnostics item for an App Service Environment.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $diagnosticsName
     * @return array
     */
    public function getDiagnosticsItem(
        $resourceGroupName,
        $name,
        $diagnosticsName
    )
    {
        return $this->_GetDiagnosticsItem_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'diagnosticsName' => $diagnosticsName
        ]);
    }
    /**
     * Get global metric definitions of an App Service Environment.
     * @param string $resourceGroupName
     * @param string $name
     * @return array
     */
    public function listMetricDefinitions(
        $resourceGroupName,
        $name
    )
    {
        return $this->_ListMetricDefinitions_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name
        ]);
    }
    /**
     * Get global metrics of an App Service Environment.
     * @param string $resourceGroupName
     * @param string $name
     * @param boolean|null $details
     * @param string|null $_filter
     * @return array
     */
    public function listMetrics(
        $resourceGroupName,
        $name,
        $details = null,
        $_filter = null
    )
    {
        return $this->_ListMetrics_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'details' => $details,
            '$filter' => $_filter
        ]);
    }
    /**
     * Get all multi-role pools.
     * @param string $resourceGroupName
     * @param string $name
     * @return array
     */
    public function listMultiRolePools(
        $resourceGroupName,
        $name
    )
    {
        return $this->_ListMultiRolePools_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name
        ]);
    }
    /**
     * Get properties of a multi-role pool.
     * @param string $resourceGroupName
     * @param string $name
     * @return array
     */
    public function getMultiRolePool(
        $resourceGroupName,
        $name
    )
    {
        return $this->_GetMultiRolePool_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name
        ]);
    }
    /**
     * Create or update a multi-role pool.
     * @param string $resourceGroupName
     * @param string $name
     * @param array $multiRolePoolEnvelope
     * @return array
     */
    public function createOrUpdateMultiRolePool(
        $resourceGroupName,
        $name,
        array $multiRolePoolEnvelope
    )
    {
        return $this->_CreateOrUpdateMultiRolePool_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'multiRolePoolEnvelope' => $multiRolePoolEnvelope
        ]);
    }
    /**
     * Get metric definitions for a specific instance of a multi-role pool of an App Service Environment.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $instance
     * @return array
     */
    public function listMultiRolePoolInstanceMetricDefinitions(
        $resourceGroupName,
        $name,
        $instance
    )
    {
        return $this->_ListMultiRolePoolInstanceMetricDefinitions_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'instance' => $instance
        ]);
    }
    /**
     * Get metrics for a specific instance of a multi-role pool of an App Service Environment.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $instance
     * @param boolean|null $details
     * @return array
     */
    public function listMultiRolePoolInstanceMetrics(
        $resourceGroupName,
        $name,
        $instance,
        $details = null
    )
    {
        return $this->_ListMultiRolePoolInstanceMetrics_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'instance' => $instance,
            'details' => $details
        ]);
    }
    /**
     * Get metric definitions for a multi-role pool of an App Service Environment.
     * @param string $resourceGroupName
     * @param string $name
     * @return array
     */
    public function listMultiRoleMetricDefinitions(
        $resourceGroupName,
        $name
    )
    {
        return $this->_ListMultiRoleMetricDefinitions_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name
        ]);
    }
    /**
     * Get metrics for a multi-role pool of an App Service Environment.
     * @param string $resourceGroupName
     * @param string $name
     * @param string|null $startTime
     * @param string|null $endTime
     * @param string|null $timeGrain
     * @param boolean|null $details
     * @param string|null $_filter
     * @return array
     */
    public function listMultiRoleMetrics(
        $resourceGroupName,
        $name,
        $startTime = null,
        $endTime = null,
        $timeGrain = null,
        $details = null,
        $_filter = null
    )
    {
        return $this->_ListMultiRoleMetrics_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'startTime' => $startTime,
            'endTime' => $endTime,
            'timeGrain' => $timeGrain,
            'details' => $details,
            '$filter' => $_filter
        ]);
    }
    /**
     * Get available SKUs for scaling a multi-role pool.
     * @param string $resourceGroupName
     * @param string $name
     * @return array
     */
    public function listMultiRolePoolSkus(
        $resourceGroupName,
        $name
    )
    {
        return $this->_ListMultiRolePoolSkus_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name
        ]);
    }
    /**
     * Get usage metrics for a multi-role pool of an App Service Environment.
     * @param string $resourceGroupName
     * @param string $name
     * @return array
     */
    public function listMultiRoleUsages(
        $resourceGroupName,
        $name
    )
    {
        return $this->_ListMultiRoleUsages_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name
        ]);
    }
    /**
     * List all currently running operations on the App Service Environment.
     * @param string $resourceGroupName
     * @param string $name
     * @return array[]
     */
    public function listOperations(
        $resourceGroupName,
        $name
    )
    {
        return $this->_ListOperations_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name
        ]);
    }
    /**
     * Reboot all machines in an App Service Environment.
     * @param string $resourceGroupName
     * @param string $name
     */
    public function reboot(
        $resourceGroupName,
        $name
    )
    {
        return $this->_Reboot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name
        ]);
    }
    /**
     * Resume an App Service Environment.
     * @param string $resourceGroupName
     * @param string $name
     * @return array
     */
    public function resume(
        $resourceGroupName,
        $name
    )
    {
        return $this->_Resume_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name
        ]);
    }
    /**
     * Get all App Service plans in an App Service Environment.
     * @param string $resourceGroupName
     * @param string $name
     * @return array
     */
    public function listAppServicePlans(
        $resourceGroupName,
        $name
    )
    {
        return $this->_ListAppServicePlans_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name
        ]);
    }
    /**
     * Get all apps in an App Service Environment.
     * @param string $resourceGroupName
     * @param string $name
     * @param string|null $propertiesToInclude
     * @return array
     */
    public function listWebApps(
        $resourceGroupName,
        $name,
        $propertiesToInclude = null
    )
    {
        return $this->_ListWebApps_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'propertiesToInclude' => $propertiesToInclude
        ]);
    }
    /**
     * Suspend an App Service Environment.
     * @param string $resourceGroupName
     * @param string $name
     * @return array
     */
    public function suspend(
        $resourceGroupName,
        $name
    )
    {
        return $this->_Suspend_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name
        ]);
    }
    /**
     * Get global usage metrics of an App Service Environment.
     * @param string $resourceGroupName
     * @param string $name
     * @param string|null $_filter
     * @return array
     */
    public function listUsages(
        $resourceGroupName,
        $name,
        $_filter = null
    )
    {
        return $this->_ListUsages_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            '$filter' => $_filter
        ]);
    }
    /**
     * Get all worker pools of an App Service Environment.
     * @param string $resourceGroupName
     * @param string $name
     * @return array
     */
    public function listWorkerPools(
        $resourceGroupName,
        $name
    )
    {
        return $this->_ListWorkerPools_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name
        ]);
    }
    /**
     * Get properties of a worker pool.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $workerPoolName
     * @return array
     */
    public function getWorkerPool(
        $resourceGroupName,
        $name,
        $workerPoolName
    )
    {
        return $this->_GetWorkerPool_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'workerPoolName' => $workerPoolName
        ]);
    }
    /**
     * Create or update a worker pool.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $workerPoolName
     * @param array $workerPoolEnvelope
     * @return array
     */
    public function createOrUpdateWorkerPool(
        $resourceGroupName,
        $name,
        $workerPoolName,
        array $workerPoolEnvelope
    )
    {
        return $this->_CreateOrUpdateWorkerPool_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'workerPoolName' => $workerPoolName,
            'workerPoolEnvelope' => $workerPoolEnvelope
        ]);
    }
    /**
     * Get metric definitions for a specific instance of a worker pool of an App Service Environment.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $workerPoolName
     * @param string $instance
     * @return array
     */
    public function listWorkerPoolInstanceMetricDefinitions(
        $resourceGroupName,
        $name,
        $workerPoolName,
        $instance
    )
    {
        return $this->_ListWorkerPoolInstanceMetricDefinitions_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'workerPoolName' => $workerPoolName,
            'instance' => $instance
        ]);
    }
    /**
     * Get metrics for a specific instance of a worker pool of an App Service Environment.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $workerPoolName
     * @param string $instance
     * @param boolean|null $details
     * @param string|null $_filter
     * @return array
     */
    public function listWorkerPoolInstanceMetrics(
        $resourceGroupName,
        $name,
        $workerPoolName,
        $instance,
        $details = null,
        $_filter = null
    )
    {
        return $this->_ListWorkerPoolInstanceMetrics_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'workerPoolName' => $workerPoolName,
            'instance' => $instance,
            'details' => $details,
            '$filter' => $_filter
        ]);
    }
    /**
     * Get metric definitions for a worker pool of an App Service Environment.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $workerPoolName
     * @return array
     */
    public function listWebWorkerMetricDefinitions(
        $resourceGroupName,
        $name,
        $workerPoolName
    )
    {
        return $this->_ListWebWorkerMetricDefinitions_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'workerPoolName' => $workerPoolName
        ]);
    }
    /**
     * Get metrics for a worker pool of a AppServiceEnvironment (App Service Environment).
     * @param string $resourceGroupName
     * @param string $name
     * @param string $workerPoolName
     * @param boolean|null $details
     * @param string|null $_filter
     * @return array
     */
    public function listWebWorkerMetrics(
        $resourceGroupName,
        $name,
        $workerPoolName,
        $details = null,
        $_filter = null
    )
    {
        return $this->_ListWebWorkerMetrics_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'workerPoolName' => $workerPoolName,
            'details' => $details,
            '$filter' => $_filter
        ]);
    }
    /**
     * Get available SKUs for scaling a worker pool.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $workerPoolName
     * @return array
     */
    public function listWorkerPoolSkus(
        $resourceGroupName,
        $name,
        $workerPoolName
    )
    {
        return $this->_ListWorkerPoolSkus_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'workerPoolName' => $workerPoolName
        ]);
    }
    /**
     * Get usage metrics for a worker pool of an App Service Environment.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $workerPoolName
     * @return array
     */
    public function listWebWorkerUsages(
        $resourceGroupName,
        $name,
        $workerPoolName
    )
    {
        return $this->_ListWebWorkerUsages_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'workerPoolName' => $workerPoolName
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByResourceGroup_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateOrUpdate_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Delete_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListCapacities_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListVips_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListDiagnostics_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetDiagnosticsItem_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListMetricDefinitions_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListMetrics_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListMultiRolePools_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetMultiRolePool_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateOrUpdateMultiRolePool_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListMultiRolePoolInstanceMetricDefinitions_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListMultiRolePoolInstanceMetrics_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListMultiRoleMetricDefinitions_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListMultiRoleMetrics_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListMultiRolePoolSkus_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListMultiRoleUsages_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListOperations_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Reboot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Resume_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListAppServicePlans_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListWebApps_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Suspend_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListUsages_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListWorkerPools_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetWorkerPool_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateOrUpdateWorkerPool_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListWorkerPoolInstanceMetricDefinitions_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListWorkerPoolInstanceMetrics_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListWebWorkerMetricDefinitions_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListWebWorkerMetrics_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListWorkerPoolSkus_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListWebWorkerUsages_operation;
}
