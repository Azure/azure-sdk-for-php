<?php
namespace Microsoft\Azure\Management\ServerManagement\_2016_07_01_preview;
final class Gateway
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Create_operation = $_client->createOperation('Gateway_Create');
        $this->_Update_operation = $_client->createOperation('Gateway_Update');
        $this->_Delete_operation = $_client->createOperation('Gateway_Delete');
        $this->_Get_operation = $_client->createOperation('Gateway_Get');
        $this->_List_operation = $_client->createOperation('Gateway_List');
        $this->_ListForResourceGroup_operation = $_client->createOperation('Gateway_ListForResourceGroup');
        $this->_Upgrade_operation = $_client->createOperation('Gateway_Upgrade');
        $this->_RegenerateProfile_operation = $_client->createOperation('Gateway_RegenerateProfile');
        $this->_GetProfile_operation = $_client->createOperation('Gateway_GetProfile');
    }
    /**
     * Creates or updates a ManagementService gateway.
     * @param string $resourceGroupName
     * @param string $gatewayName
     * @param array $gatewayParameters
     * @return array
     */
    public function create(
        $resourceGroupName,
        $gatewayName,
        array $gatewayParameters
    )
    {
        return $this->_Create_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'gatewayName' => $gatewayName,
            'GatewayParameters' => $gatewayParameters
        ]);
    }
    /**
     * Updates a gateway belonging to a resource group.
     * @param string $resourceGroupName
     * @param string $gatewayName
     * @param array $gatewayParameters
     * @return array
     */
    public function update(
        $resourceGroupName,
        $gatewayName,
        array $gatewayParameters
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'gatewayName' => $gatewayName,
            'GatewayParameters' => $gatewayParameters
        ]);
    }
    /**
     * Deletes a gateway from a resource group.
     * @param string $resourceGroupName
     * @param string $gatewayName
     */
    public function delete(
        $resourceGroupName,
        $gatewayName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'gatewayName' => $gatewayName
        ]);
    }
    /**
     * Gets a gateway.
     * @param string $resourceGroupName
     * @param string $gatewayName
     * @param string $_expand
     * @return array
     */
    public function get(
        $resourceGroupName,
        $gatewayName,
        $_expand
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'gatewayName' => $gatewayName,
            '$expand' => $_expand
        ]);
    }
    /**
     * Returns gateways in a subscription.
     * @return array
     */
    public function list_()
    {
        return $this->_List_operation->call([]);
    }
    /**
     * Returns gateways in a resource group.
     * @param string $resourceGroupName
     * @return array
     */
    public function listForResourceGroup($resourceGroupName)
    {
        return $this->_ListForResourceGroup_operation->call(['resourceGroupName' => $resourceGroupName]);
    }
    /**
     * Upgrades a gateway.
     * @param string $resourceGroupName
     * @param string $gatewayName
     */
    public function upgrade(
        $resourceGroupName,
        $gatewayName
    )
    {
        return $this->_Upgrade_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'gatewayName' => $gatewayName
        ]);
    }
    /**
     * Regenerate a gateway's profile
     * @param string $resourceGroupName
     * @param string $gatewayName
     */
    public function regenerateProfile(
        $resourceGroupName,
        $gatewayName
    )
    {
        return $this->_RegenerateProfile_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'gatewayName' => $gatewayName
        ]);
    }
    /**
     * Gets a gateway profile.
     * @param string $resourceGroupName
     * @param string $gatewayName
     * @return array
     */
    public function getProfile(
        $resourceGroupName,
        $gatewayName
    )
    {
        return $this->_GetProfile_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'gatewayName' => $gatewayName
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Create_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Update_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Delete_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListForResourceGroup_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Upgrade_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_RegenerateProfile_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetProfile_operation;
}
