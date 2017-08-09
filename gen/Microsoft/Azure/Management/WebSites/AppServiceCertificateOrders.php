<?php
namespace Microsoft\Azure\Management\WebSites;
final class AppServiceCertificateOrders
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_List_operation = $_client->createOperation('AppServiceCertificateOrders_List');
        $this->_ValidatePurchaseInformation_operation = $_client->createOperation('AppServiceCertificateOrders_ValidatePurchaseInformation');
        $this->_ListByResourceGroup_operation = $_client->createOperation('AppServiceCertificateOrders_ListByResourceGroup');
        $this->_Get_operation = $_client->createOperation('AppServiceCertificateOrders_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('AppServiceCertificateOrders_CreateOrUpdate');
        $this->_Delete_operation = $_client->createOperation('AppServiceCertificateOrders_Delete');
        $this->_ListCertificates_operation = $_client->createOperation('AppServiceCertificateOrders_ListCertificates');
        $this->_GetCertificate_operation = $_client->createOperation('AppServiceCertificateOrders_GetCertificate');
        $this->_CreateOrUpdateCertificate_operation = $_client->createOperation('AppServiceCertificateOrders_CreateOrUpdateCertificate');
        $this->_DeleteCertificate_operation = $_client->createOperation('AppServiceCertificateOrders_DeleteCertificate');
        $this->_Reissue_operation = $_client->createOperation('AppServiceCertificateOrders_Reissue');
        $this->_Renew_operation = $_client->createOperation('AppServiceCertificateOrders_Renew');
        $this->_ResendEmail_operation = $_client->createOperation('AppServiceCertificateOrders_ResendEmail');
        $this->_ResendRequestEmails_operation = $_client->createOperation('AppServiceCertificateOrders_ResendRequestEmails');
        $this->_RetrieveSiteSeal_operation = $_client->createOperation('AppServiceCertificateOrders_RetrieveSiteSeal');
        $this->_VerifyDomainOwnership_operation = $_client->createOperation('AppServiceCertificateOrders_VerifyDomainOwnership');
        $this->_RetrieveCertificateActions_operation = $_client->createOperation('AppServiceCertificateOrders_RetrieveCertificateActions');
        $this->_RetrieveCertificateEmailHistory_operation = $_client->createOperation('AppServiceCertificateOrders_RetrieveCertificateEmailHistory');
    }
    /**
     * List all certificate orders in a subscription.
     * @return array
     */
    public function list_()
    {
        return $this->_List_operation->call([]);
    }
    /**
     * Validate information for a certificate order.
     * @param array $appServiceCertificateOrder
     */
    public function validatePurchaseInformation(array $appServiceCertificateOrder)
    {
        return $this->_ValidatePurchaseInformation_operation->call(['appServiceCertificateOrder' => $appServiceCertificateOrder]);
    }
    /**
     * Get certificate orders in a resource group.
     * @param string $resourceGroupName
     * @return array
     */
    public function listByResourceGroup($resourceGroupName)
    {
        return $this->_ListByResourceGroup_operation->call(['resourceGroupName' => $resourceGroupName]);
    }
    /**
     * Get a certificate order.
     * @param string $resourceGroupName
     * @param string $certificateOrderName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $certificateOrderName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'certificateOrderName' => $certificateOrderName
        ]);
    }
    /**
     * Create or update a certificate purchase order.
     * @param string $resourceGroupName
     * @param string $certificateOrderName
     * @param array $certificateDistinguishedName
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $certificateOrderName,
        array $certificateDistinguishedName
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'certificateOrderName' => $certificateOrderName,
            'certificateDistinguishedName' => $certificateDistinguishedName
        ]);
    }
    /**
     * Delete an existing certificate order.
     * @param string $resourceGroupName
     * @param string $certificateOrderName
     */
    public function delete(
        $resourceGroupName,
        $certificateOrderName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'certificateOrderName' => $certificateOrderName
        ]);
    }
    /**
     * List all certificates associated with a certificate order.
     * @param string $resourceGroupName
     * @param string $certificateOrderName
     * @return array
     */
    public function listCertificates(
        $resourceGroupName,
        $certificateOrderName
    )
    {
        return $this->_ListCertificates_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'certificateOrderName' => $certificateOrderName
        ]);
    }
    /**
     * Get the certificate associated with a certificate order.
     * @param string $resourceGroupName
     * @param string $certificateOrderName
     * @param string $name
     * @return array
     */
    public function getCertificate(
        $resourceGroupName,
        $certificateOrderName,
        $name
    )
    {
        return $this->_GetCertificate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'certificateOrderName' => $certificateOrderName,
            'name' => $name
        ]);
    }
    /**
     * Creates or updates a certificate and associates with key vault secret.
     * @param string $resourceGroupName
     * @param string $certificateOrderName
     * @param string $name
     * @param array $keyVaultCertificate
     * @return array
     */
    public function createOrUpdateCertificate(
        $resourceGroupName,
        $certificateOrderName,
        $name,
        array $keyVaultCertificate
    )
    {
        return $this->_CreateOrUpdateCertificate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'certificateOrderName' => $certificateOrderName,
            'name' => $name,
            'keyVaultCertificate' => $keyVaultCertificate
        ]);
    }
    /**
     * Delete the certificate associated with a certificate order.
     * @param string $resourceGroupName
     * @param string $certificateOrderName
     * @param string $name
     */
    public function deleteCertificate(
        $resourceGroupName,
        $certificateOrderName,
        $name
    )
    {
        return $this->_DeleteCertificate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'certificateOrderName' => $certificateOrderName,
            'name' => $name
        ]);
    }
    /**
     * Reissue an existing certificate order.
     * @param string $resourceGroupName
     * @param string $certificateOrderName
     * @param array $reissueCertificateOrderRequest
     */
    public function reissue(
        $resourceGroupName,
        $certificateOrderName,
        array $reissueCertificateOrderRequest
    )
    {
        return $this->_Reissue_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'certificateOrderName' => $certificateOrderName,
            'reissueCertificateOrderRequest' => $reissueCertificateOrderRequest
        ]);
    }
    /**
     * Renew an existing certificate order.
     * @param string $resourceGroupName
     * @param string $certificateOrderName
     * @param array $renewCertificateOrderRequest
     */
    public function renew(
        $resourceGroupName,
        $certificateOrderName,
        array $renewCertificateOrderRequest
    )
    {
        return $this->_Renew_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'certificateOrderName' => $certificateOrderName,
            'renewCertificateOrderRequest' => $renewCertificateOrderRequest
        ]);
    }
    /**
     * Resend certificate email.
     * @param string $resourceGroupName
     * @param string $certificateOrderName
     */
    public function resendEmail(
        $resourceGroupName,
        $certificateOrderName
    )
    {
        return $this->_ResendEmail_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'certificateOrderName' => $certificateOrderName
        ]);
    }
    /**
     * Verify domain ownership for this certificate order.
     * @param string $resourceGroupName
     * @param string $certificateOrderName
     * @param array $nameIdentifier
     */
    public function resendRequestEmails(
        $resourceGroupName,
        $certificateOrderName,
        array $nameIdentifier
    )
    {
        return $this->_ResendRequestEmails_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'certificateOrderName' => $certificateOrderName,
            'nameIdentifier' => $nameIdentifier
        ]);
    }
    /**
     * Verify domain ownership for this certificate order.
     * @param string $resourceGroupName
     * @param string $certificateOrderName
     * @param array $siteSealRequest
     * @return array
     */
    public function retrieveSiteSeal(
        $resourceGroupName,
        $certificateOrderName,
        array $siteSealRequest
    )
    {
        return $this->_RetrieveSiteSeal_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'certificateOrderName' => $certificateOrderName,
            'siteSealRequest' => $siteSealRequest
        ]);
    }
    /**
     * Verify domain ownership for this certificate order.
     * @param string $resourceGroupName
     * @param string $certificateOrderName
     */
    public function verifyDomainOwnership(
        $resourceGroupName,
        $certificateOrderName
    )
    {
        return $this->_VerifyDomainOwnership_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'certificateOrderName' => $certificateOrderName
        ]);
    }
    /**
     * Retrieve the list of certificate actions.
     * @param string $resourceGroupName
     * @param string $name
     * @return array[]
     */
    public function retrieveCertificateActions(
        $resourceGroupName,
        $name
    )
    {
        return $this->_RetrieveCertificateActions_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name
        ]);
    }
    /**
     * Retrieve email history.
     * @param string $resourceGroupName
     * @param string $name
     * @return array[]
     */
    public function retrieveCertificateEmailHistory(
        $resourceGroupName,
        $name
    )
    {
        return $this->_RetrieveCertificateEmailHistory_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ValidatePurchaseInformation_operation;
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
    private $_ListCertificates_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetCertificate_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateOrUpdateCertificate_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_DeleteCertificate_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Reissue_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Renew_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ResendEmail_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ResendRequestEmails_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_RetrieveSiteSeal_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_VerifyDomainOwnership_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_RetrieveCertificateActions_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_RetrieveCertificateEmailHistory_operation;
}
