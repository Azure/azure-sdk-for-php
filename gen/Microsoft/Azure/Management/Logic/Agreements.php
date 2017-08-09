<?php
namespace Microsoft\Azure\Management\Logic;
final class Agreements
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListByIntegrationAccounts_operation = $_client->createOperation('Agreements_ListByIntegrationAccounts');
        $this->_Get_operation = $_client->createOperation('Agreements_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('Agreements_CreateOrUpdate');
        $this->_Delete_operation = $_client->createOperation('Agreements_Delete');
    }
    /**
     * Gets a list of integration account agreements.
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
     * Gets an integration account agreement.
     * @param string $resourceGroupName
     * @param string $integrationAccountName
     * @param string $agreementName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $integrationAccountName,
        $agreementName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'integrationAccountName' => $integrationAccountName,
            'agreementName' => $agreementName
        ]);
    }
    /**
     * Creates or updates an integration account agreement.
     * @param string $resourceGroupName
     * @param string $integrationAccountName
     * @param string $agreementName
     * @param array $agreement
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $integrationAccountName,
        $agreementName,
        array $agreement
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'integrationAccountName' => $integrationAccountName,
            'agreementName' => $agreementName,
            'agreement' => $agreement
        ]);
    }
    /**
     * Deletes an integration account agreement.
     * @param string $resourceGroupName
     * @param string $integrationAccountName
     * @param string $agreementName
     */
    public function delete(
        $resourceGroupName,
        $integrationAccountName,
        $agreementName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'integrationAccountName' => $integrationAccountName,
            'agreementName' => $agreementName
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
