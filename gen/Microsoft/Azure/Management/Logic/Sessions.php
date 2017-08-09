<?php
namespace Microsoft\Azure\Management\Logic;
final class Sessions
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListByIntegrationAccounts_operation = $_client->createOperation('Sessions_ListByIntegrationAccounts');
        $this->_Get_operation = $_client->createOperation('Sessions_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('Sessions_CreateOrUpdate');
        $this->_Delete_operation = $_client->createOperation('Sessions_Delete');
    }
    /**
     * Gets a list of integration account sessions.
     * @param string $resourceGroupName
     * @param string $integrationAccountName
     * @param integer|null $_top
     * @param string|null $_filter
     * @return array
     */
    public function listByIntegrationAccounts(
        $resourceGroupName,
        $integrationAccountName,
        $_top = null,
        $_filter = null
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
     * Gets an integration account session.
     * @param string $resourceGroupName
     * @param string $integrationAccountName
     * @param string $sessionName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $integrationAccountName,
        $sessionName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'integrationAccountName' => $integrationAccountName,
            'sessionName' => $sessionName
        ]);
    }
    /**
     * Creates or updates an integration account session.
     * @param string $resourceGroupName
     * @param string $integrationAccountName
     * @param string $sessionName
     * @param array $session
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $integrationAccountName,
        $sessionName,
        array $session
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'integrationAccountName' => $integrationAccountName,
            'sessionName' => $sessionName,
            'session' => $session
        ]);
    }
    /**
     * Deletes an integration account session.
     * @param string $resourceGroupName
     * @param string $integrationAccountName
     * @param string $sessionName
     */
    public function delete(
        $resourceGroupName,
        $integrationAccountName,
        $sessionName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'integrationAccountName' => $integrationAccountName,
            'sessionName' => $sessionName
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
