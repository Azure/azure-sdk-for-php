<?php
namespace Microsoft\Azure\Management\Logic;
final class Partners
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListByIntegrationAccounts_operation = $_client->createOperation('Partners_ListByIntegrationAccounts');
        $this->_Get_operation = $_client->createOperation('Partners_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('Partners_CreateOrUpdate');
        $this->_Delete_operation = $_client->createOperation('Partners_Delete');
    }
    /**
     * Gets a list of integration account partners.
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
     * Gets an integration account partner.
     * @param string $resourceGroupName
     * @param string $integrationAccountName
     * @param string $partnerName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $integrationAccountName,
        $partnerName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'integrationAccountName' => $integrationAccountName,
            'partnerName' => $partnerName
        ]);
    }
    /**
     * Creates or updates an integration account partner.
     * @param string $resourceGroupName
     * @param string $integrationAccountName
     * @param string $partnerName
     * @param array $partner
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $integrationAccountName,
        $partnerName,
        array $partner
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'integrationAccountName' => $integrationAccountName,
            'partnerName' => $partnerName,
            'partner' => $partner
        ]);
    }
    /**
     * Deletes an integration account partner.
     * @param string $resourceGroupName
     * @param string $integrationAccountName
     * @param string $partnerName
     */
    public function delete(
        $resourceGroupName,
        $integrationAccountName,
        $partnerName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'integrationAccountName' => $integrationAccountName,
            'partnerName' => $partnerName
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
