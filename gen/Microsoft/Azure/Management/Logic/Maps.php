<?php
namespace Microsoft\Azure\Management\Logic;
final class Maps
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListByIntegrationAccounts_operation = $_client->createOperation('Maps_ListByIntegrationAccounts');
        $this->_Get_operation = $_client->createOperation('Maps_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('Maps_CreateOrUpdate');
        $this->_Delete_operation = $_client->createOperation('Maps_Delete');
    }
    /**
     * Gets a list of integration account maps.
     * @param string $resourceGroupName
     * @param string $integrationAccountName
     * @param integer $_top
     * @param string $_filter
     * @return array
     */
    public function listByIntegrationAccounts(
        $resourceGroupName,
        $integrationAccountName,
        $_top,
        $_filter
    )
    {
        return $this->_ListByIntegrationAccounts_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'integrationAccountName' => $integrationAccountName,
            '$top' => $_top,
            '$filter' => $_filter
        ]);
    }
    /**
     * Gets an integration account map.
     * @param string $resourceGroupName
     * @param string $integrationAccountName
     * @param string $mapName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $integrationAccountName,
        $mapName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'integrationAccountName' => $integrationAccountName,
            'mapName' => $mapName
        ]);
    }
    /**
     * Creates or updates an integration account map.
     * @param string $resourceGroupName
     * @param string $integrationAccountName
     * @param string $mapName
     * @param array $map
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $integrationAccountName,
        $mapName,
        array $map
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'integrationAccountName' => $integrationAccountName,
            'mapName' => $mapName,
            'map' => $map
        ]);
    }
    /**
     * Deletes an integration account map.
     * @param string $resourceGroupName
     * @param string $integrationAccountName
     * @param string $mapName
     */
    public function delete(
        $resourceGroupName,
        $integrationAccountName,
        $mapName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'integrationAccountName' => $integrationAccountName,
            'mapName' => $mapName
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByIntegrationAccounts_operation;
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
}
