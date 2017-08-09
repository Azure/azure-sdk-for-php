<?php
namespace Microsoft\Azure\Management\Network;
final class NetworkWatchers
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_CreateOrUpdate_operation = $_client->createOperation('NetworkWatchers_CreateOrUpdate');
        $this->_Get_operation = $_client->createOperation('NetworkWatchers_Get');
        $this->_Delete_operation = $_client->createOperation('NetworkWatchers_Delete');
        $this->_List_operation = $_client->createOperation('NetworkWatchers_List');
        $this->_ListAll_operation = $_client->createOperation('NetworkWatchers_ListAll');
        $this->_GetTopology_operation = $_client->createOperation('NetworkWatchers_GetTopology');
        $this->_VerifyIPFlow_operation = $_client->createOperation('NetworkWatchers_VerifyIPFlow');
        $this->_GetNextHop_operation = $_client->createOperation('NetworkWatchers_GetNextHop');
        $this->_GetVMSecurityRules_operation = $_client->createOperation('NetworkWatchers_GetVMSecurityRules');
        $this->_GetTroubleshooting_operation = $_client->createOperation('NetworkWatchers_GetTroubleshooting');
        $this->_GetTroubleshootingResult_operation = $_client->createOperation('NetworkWatchers_GetTroubleshootingResult');
        $this->_SetFlowLogConfiguration_operation = $_client->createOperation('NetworkWatchers_SetFlowLogConfiguration');
        $this->_GetFlowLogStatus_operation = $_client->createOperation('NetworkWatchers_GetFlowLogStatus');
        $this->_CheckConnectivity_operation = $_client->createOperation('NetworkWatchers_CheckConnectivity');
    }
    /**
     * Creates or updates a network watcher in the specified resource group.
     * @param string $resourceGroupName
     * @param string $networkWatcherName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $networkWatcherName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'networkWatcherName' => $networkWatcherName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Gets the specified network watcher by resource group.
     * @param string $resourceGroupName
     * @param string $networkWatcherName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $networkWatcherName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'networkWatcherName' => $networkWatcherName
        ]);
    }
    /**
     * Deletes the specified network watcher resource.
     * @param string $resourceGroupName
     * @param string $networkWatcherName
     */
    public function delete(
        $resourceGroupName,
        $networkWatcherName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'networkWatcherName' => $networkWatcherName
        ]);
    }
    /**
     * Gets all network watchers by resource group.
     * @param string $resourceGroupName
     * @return array
     */
    public function list_($resourceGroupName)
    {
        return $this->_List_operation->call(['resourceGroupName' => $resourceGroupName]);
    }
    /**
     * Gets all network watchers by subscription.
     * @return array
     */
    public function listAll()
    {
        return $this->_ListAll_operation->call([]);
    }
    /**
     * Gets the current network topology by resource group.
     * @param string $resourceGroupName
     * @param string $networkWatcherName
     * @param array $parameters
     * @return array
     */
    public function getTopology(
        $resourceGroupName,
        $networkWatcherName,
        array $parameters
    )
    {
        return $this->_GetTopology_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'networkWatcherName' => $networkWatcherName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Verify IP flow from the specified VM to a location given the currently configured NSG rules.
     * @param string $resourceGroupName
     * @param string $networkWatcherName
     * @param array $parameters
     * @return array
     */
    public function verifyIPFlow(
        $resourceGroupName,
        $networkWatcherName,
        array $parameters
    )
    {
        return $this->_VerifyIPFlow_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'networkWatcherName' => $networkWatcherName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Gets the next hop from the specified VM.
     * @param string $resourceGroupName
     * @param string $networkWatcherName
     * @param array $parameters
     * @return array
     */
    public function getNextHop(
        $resourceGroupName,
        $networkWatcherName,
        array $parameters
    )
    {
        return $this->_GetNextHop_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'networkWatcherName' => $networkWatcherName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Gets the configured and effective security group rules on the specified VM.
     * @param string $resourceGroupName
     * @param string $networkWatcherName
     * @param array $parameters
     * @return array
     */
    public function getVMSecurityRules(
        $resourceGroupName,
        $networkWatcherName,
        array $parameters
    )
    {
        return $this->_GetVMSecurityRules_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'networkWatcherName' => $networkWatcherName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Initiate troubleshooting on a specified resource
     * @param string $resourceGroupName
     * @param string $networkWatcherName
     * @param array $parameters
     * @return array
     */
    public function getTroubleshooting(
        $resourceGroupName,
        $networkWatcherName,
        array $parameters
    )
    {
        return $this->_GetTroubleshooting_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'networkWatcherName' => $networkWatcherName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Get the last completed troubleshooting result on a specified resource
     * @param string $resourceGroupName
     * @param string $networkWatcherName
     * @param array $parameters
     * @return array
     */
    public function getTroubleshootingResult(
        $resourceGroupName,
        $networkWatcherName,
        array $parameters
    )
    {
        return $this->_GetTroubleshootingResult_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'networkWatcherName' => $networkWatcherName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Configures flow log on a specified resource.
     * @param string $resourceGroupName
     * @param string $networkWatcherName
     * @param array $parameters
     * @return array
     */
    public function setFlowLogConfiguration(
        $resourceGroupName,
        $networkWatcherName,
        array $parameters
    )
    {
        return $this->_SetFlowLogConfiguration_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'networkWatcherName' => $networkWatcherName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Queries status of flow log on a specified resource.
     * @param string $resourceGroupName
     * @param string $networkWatcherName
     * @param array $parameters
     * @return array
     */
    public function getFlowLogStatus(
        $resourceGroupName,
        $networkWatcherName,
        array $parameters
    )
    {
        return $this->_GetFlowLogStatus_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'networkWatcherName' => $networkWatcherName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Verifies the possibility of establishing a direct TCP connection from a virtual machine to a given endpoint including another VM or an arbitrary remote server.
     * @param string $resourceGroupName
     * @param string $networkWatcherName
     * @param array $parameters
     * @return array
     */
    public function checkConnectivity(
        $resourceGroupName,
        $networkWatcherName,
        array $parameters
    )
    {
        return $this->_CheckConnectivity_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'networkWatcherName' => $networkWatcherName,
            'parameters' => $parameters
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateOrUpdate_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Delete_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListAll_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetTopology_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_VerifyIPFlow_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetNextHop_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetVMSecurityRules_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetTroubleshooting_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetTroubleshootingResult_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_SetFlowLogConfiguration_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetFlowLogStatus_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CheckConnectivity_operation;
}
