<?php
namespace Microsoft\Azure\Management\WebSites;
final class AppServicePlans
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_List_operation = $_client->createOperation('AppServicePlans_List');
        $this->_ListByResourceGroup_operation = $_client->createOperation('AppServicePlans_ListByResourceGroup');
        $this->_Get_operation = $_client->createOperation('AppServicePlans_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('AppServicePlans_CreateOrUpdate');
        $this->_Delete_operation = $_client->createOperation('AppServicePlans_Delete');
        $this->_ListCapabilities_operation = $_client->createOperation('AppServicePlans_ListCapabilities');
        $this->_GetHybridConnection_operation = $_client->createOperation('AppServicePlans_GetHybridConnection');
        $this->_DeleteHybridConnection_operation = $_client->createOperation('AppServicePlans_DeleteHybridConnection');
        $this->_ListHybridConnectionKeys_operation = $_client->createOperation('AppServicePlans_ListHybridConnectionKeys');
        $this->_ListWebAppsByHybridConnection_operation = $_client->createOperation('AppServicePlans_ListWebAppsByHybridConnection');
        $this->_GetHybridConnectionPlanLimit_operation = $_client->createOperation('AppServicePlans_GetHybridConnectionPlanLimit');
        $this->_ListHybridConnections_operation = $_client->createOperation('AppServicePlans_ListHybridConnections');
        $this->_ListMetricDefintions_operation = $_client->createOperation('AppServicePlans_ListMetricDefintions');
        $this->_ListMetrics_operation = $_client->createOperation('AppServicePlans_ListMetrics');
        $this->_RestartWebApps_operation = $_client->createOperation('AppServicePlans_RestartWebApps');
        $this->_ListWebApps_operation = $_client->createOperation('AppServicePlans_ListWebApps');
        $this->_ListVnets_operation = $_client->createOperation('AppServicePlans_ListVnets');
        $this->_GetVnetFromServerFarm_operation = $_client->createOperation('AppServicePlans_GetVnetFromServerFarm');
        $this->_GetVnetGateway_operation = $_client->createOperation('AppServicePlans_GetVnetGateway');
        $this->_UpdateVnetGateway_operation = $_client->createOperation('AppServicePlans_UpdateVnetGateway');
        $this->_ListRoutesForVnet_operation = $_client->createOperation('AppServicePlans_ListRoutesForVnet');
        $this->_GetRouteForVnet_operation = $_client->createOperation('AppServicePlans_GetRouteForVnet');
        $this->_CreateOrUpdateVnetRoute_operation = $_client->createOperation('AppServicePlans_CreateOrUpdateVnetRoute');
        $this->_DeleteVnetRoute_operation = $_client->createOperation('AppServicePlans_DeleteVnetRoute');
        $this->_UpdateVnetRoute_operation = $_client->createOperation('AppServicePlans_UpdateVnetRoute');
        $this->_RebootWorker_operation = $_client->createOperation('AppServicePlans_RebootWorker');
    }
    /**
     * Get all App Service plans for a subcription.
     * @param boolean $detailed
     * @return array
     */
    public function list_($detailed)
    {
        return $this->_List_operation->call(['detailed' => $detailed]);
    }
    /**
     * Get all App Service plans in a resource group.
     * @param string $resourceGroupName
     * @return array
     */
    public function listByResourceGroup($resourceGroupName)
    {
        return $this->_ListByResourceGroup_operation->call(['resourceGroupName' => $resourceGroupName]);
    }
    /**
     * Get an App Service plan.
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
     * Creates or updates an App Service Plan.
     * @param string $resourceGroupName
     * @param string $name
     * @param array $appServicePlan
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $name,
        array $appServicePlan
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'appServicePlan' => $appServicePlan
        ]);
    }
    /**
     * Delete an App Service plan.
     * @param string $resourceGroupName
     * @param string $name
     */
    public function delete(
        $resourceGroupName,
        $name
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name
        ]);
    }
    /**
     * List all capabilities of an App Service plan.
     * @param string $resourceGroupName
     * @param string $name
     * @return array[]
     */
    public function listCapabilities(
        $resourceGroupName,
        $name
    )
    {
        return $this->_ListCapabilities_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name
        ]);
    }
    /**
     * Retrieve a Hybrid Connection in use in an App Service plan.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $namespaceName
     * @param string $relayName
     * @return array
     */
    public function getHybridConnection(
        $resourceGroupName,
        $name,
        $namespaceName,
        $relayName
    )
    {
        return $this->_GetHybridConnection_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'namespaceName' => $namespaceName,
            'relayName' => $relayName
        ]);
    }
    /**
     * Delete a Hybrid Connection in use in an App Service plan.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $namespaceName
     * @param string $relayName
     */
    public function deleteHybridConnection(
        $resourceGroupName,
        $name,
        $namespaceName,
        $relayName
    )
    {
        return $this->_DeleteHybridConnection_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'namespaceName' => $namespaceName,
            'relayName' => $relayName
        ]);
    }
    /**
     * Get the send key name and value of a Hybrid Connection.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $namespaceName
     * @param string $relayName
     * @return array
     */
    public function listHybridConnectionKeys(
        $resourceGroupName,
        $name,
        $namespaceName,
        $relayName
    )
    {
        return $this->_ListHybridConnectionKeys_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'namespaceName' => $namespaceName,
            'relayName' => $relayName
        ]);
    }
    /**
     * Get all apps that use a Hybrid Connection in an App Service Plan.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $namespaceName
     * @param string $relayName
     * @return array
     */
    public function listWebAppsByHybridConnection(
        $resourceGroupName,
        $name,
        $namespaceName,
        $relayName
    )
    {
        return $this->_ListWebAppsByHybridConnection_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'namespaceName' => $namespaceName,
            'relayName' => $relayName
        ]);
    }
    /**
     * Get the maximum number of Hybrid Connections allowed in an App Service plan.
     * @param string $resourceGroupName
     * @param string $name
     * @return array
     */
    public function getHybridConnectionPlanLimit(
        $resourceGroupName,
        $name
    )
    {
        return $this->_GetHybridConnectionPlanLimit_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name
        ]);
    }
    /**
     * Retrieve all Hybrid Connections in use in an App Service plan.
     * @param string $resourceGroupName
     * @param string $name
     * @return array
     */
    public function listHybridConnections(
        $resourceGroupName,
        $name
    )
    {
        return $this->_ListHybridConnections_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name
        ]);
    }
    /**
     * Get metrics that can be queried for an App Service plan, and their definitions.
     * @param string $resourceGroupName
     * @param string $name
     * @return array
     */
    public function listMetricDefintions(
        $resourceGroupName,
        $name
    )
    {
        return $this->_ListMetricDefintions_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name
        ]);
    }
    /**
     * Get metrics for an App Serice plan.
     * @param string $resourceGroupName
     * @param string $name
     * @param boolean $details
     * @param string $_filter
     * @return array
     */
    public function listMetrics(
        $resourceGroupName,
        $name,
        $details,
        $_filter
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
     * Restart all apps in an App Service plan.
     * @param string $resourceGroupName
     * @param string $name
     * @param boolean $softRestart
     */
    public function restartWebApps(
        $resourceGroupName,
        $name,
        $softRestart
    )
    {
        return $this->_RestartWebApps_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'softRestart' => $softRestart
        ]);
    }
    /**
     * Get all apps associated with an App Service plan.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $_skipToken
     * @param string $_filter
     * @param string $_top
     * @return array
     */
    public function listWebApps(
        $resourceGroupName,
        $name,
        $_skipToken,
        $_filter,
        $_top
    )
    {
        return $this->_ListWebApps_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            '$skipToken' => $_skipToken,
            '$filter' => $_filter,
            '$top' => $_top
        ]);
    }
    /**
     * Get all Virtual Networks associated with an App Service plan.
     * @param string $resourceGroupName
     * @param string $name
     * @return array[]
     */
    public function listVnets(
        $resourceGroupName,
        $name
    )
    {
        return $this->_ListVnets_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name
        ]);
    }
    /**
     * Get a Virtual Network associated with an App Service plan.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $vnetName
     * @return array
     */
    public function getVnetFromServerFarm(
        $resourceGroupName,
        $name,
        $vnetName
    )
    {
        return $this->_GetVnetFromServerFarm_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'vnetName' => $vnetName
        ]);
    }
    /**
     * Get a Virtual Network gateway.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $vnetName
     * @param string $gatewayName
     * @return array
     */
    public function getVnetGateway(
        $resourceGroupName,
        $name,
        $vnetName,
        $gatewayName
    )
    {
        return $this->_GetVnetGateway_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'vnetName' => $vnetName,
            'gatewayName' => $gatewayName
        ]);
    }
    /**
     * Update a Virtual Network gateway.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $vnetName
     * @param string $gatewayName
     * @param array $connectionEnvelope
     * @return array
     */
    public function updateVnetGateway(
        $resourceGroupName,
        $name,
        $vnetName,
        $gatewayName,
        array $connectionEnvelope
    )
    {
        return $this->_UpdateVnetGateway_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'vnetName' => $vnetName,
            'gatewayName' => $gatewayName,
            'connectionEnvelope' => $connectionEnvelope
        ]);
    }
    /**
     * Get all routes that are associated with a Virtual Network in an App Service plan.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $vnetName
     * @return array[]
     */
    public function listRoutesForVnet(
        $resourceGroupName,
        $name,
        $vnetName
    )
    {
        return $this->_ListRoutesForVnet_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'vnetName' => $vnetName
        ]);
    }
    /**
     * Get a Virtual Network route in an App Service plan.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $vnetName
     * @param string $routeName
     * @return array[]
     */
    public function getRouteForVnet(
        $resourceGroupName,
        $name,
        $vnetName,
        $routeName
    )
    {
        return $this->_GetRouteForVnet_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'vnetName' => $vnetName,
            'routeName' => $routeName
        ]);
    }
    /**
     * Create or update a Virtual Network route in an App Service plan.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $vnetName
     * @param string $routeName
     * @param array $route
     * @return array
     */
    public function createOrUpdateVnetRoute(
        $resourceGroupName,
        $name,
        $vnetName,
        $routeName,
        array $route
    )
    {
        return $this->_CreateOrUpdateVnetRoute_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'vnetName' => $vnetName,
            'routeName' => $routeName,
            'route' => $route
        ]);
    }
    /**
     * Delete a Virtual Network route in an App Service plan.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $vnetName
     * @param string $routeName
     */
    public function deleteVnetRoute(
        $resourceGroupName,
        $name,
        $vnetName,
        $routeName
    )
    {
        return $this->_DeleteVnetRoute_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'vnetName' => $vnetName,
            'routeName' => $routeName
        ]);
    }
    /**
     * Create or update a Virtual Network route in an App Service plan.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $vnetName
     * @param string $routeName
     * @param array $route
     * @return array
     */
    public function updateVnetRoute(
        $resourceGroupName,
        $name,
        $vnetName,
        $routeName,
        array $route
    )
    {
        return $this->_UpdateVnetRoute_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'vnetName' => $vnetName,
            'routeName' => $routeName,
            'route' => $route
        ]);
    }
    /**
     * Reboot a worker machine in an App Service plan.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $workerName
     */
    public function rebootWorker(
        $resourceGroupName,
        $name,
        $workerName
    )
    {
        return $this->_RebootWorker_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'workerName' => $workerName
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
    private $_ListCapabilities_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetHybridConnection_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_DeleteHybridConnection_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListHybridConnectionKeys_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListWebAppsByHybridConnection_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetHybridConnectionPlanLimit_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListHybridConnections_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListMetricDefintions_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListMetrics_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_RestartWebApps_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListWebApps_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListVnets_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetVnetFromServerFarm_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetVnetGateway_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_UpdateVnetGateway_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListRoutesForVnet_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetRouteForVnet_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateOrUpdateVnetRoute_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_DeleteVnetRoute_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_UpdateVnetRoute_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_RebootWorker_operation;
}
