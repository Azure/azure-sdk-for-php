<?php
namespace Microsoft\Azure\Management\Logic;
final class Certificates
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListByIntegrationAccounts_operation = $_client->createOperation('Certificates_ListByIntegrationAccounts');
        $this->_Get_operation = $_client->createOperation('Certificates_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('Certificates_CreateOrUpdate');
        $this->_Delete_operation = $_client->createOperation('Certificates_Delete');
    }
    /**
     * Gets a list of integration account certificates.
     * @param string $resourceGroupName
     * @param string $integrationAccountName
     * @param integer|null $_top
     * @return array
     */
    public function listByIntegrationAccounts(
        $resourceGroupName,
        $integrationAccountName,
        $_top = null
    )
    {
        return $this->_ListByIntegrationAccounts_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'integrationAccountName' => $integrationAccountName,
            '$top' => $_top
        ]);
    }
    /**
     * Gets an integration account certificate.
     * @param string $resourceGroupName
     * @param string $integrationAccountName
     * @param string $certificateName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $integrationAccountName,
        $certificateName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'integrationAccountName' => $integrationAccountName,
            'certificateName' => $certificateName
        ]);
    }
    /**
     * Creates or updates an integration account certificate.
     * @param string $resourceGroupName
     * @param string $integrationAccountName
     * @param string $certificateName
     * @param array $certificate
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $integrationAccountName,
        $certificateName,
        array $certificate
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'integrationAccountName' => $integrationAccountName,
            'certificateName' => $certificateName,
            'certificate' => $certificate
        ]);
    }
    /**
     * Deletes an integration account certificate.
     * @param string $resourceGroupName
     * @param string $integrationAccountName
     * @param string $certificateName
     */
    public function delete(
        $resourceGroupName,
        $integrationAccountName,
        $certificateName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'integrationAccountName' => $integrationAccountName,
            'certificateName' => $certificateName
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
