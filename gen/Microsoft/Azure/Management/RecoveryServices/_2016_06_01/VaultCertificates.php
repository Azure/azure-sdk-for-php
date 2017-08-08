<?php
namespace Microsoft\Azure\Management\RecoveryServices\_2016_06_01;
final class VaultCertificates
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Create_operation = $_client->createOperation('VaultCertificates_Create');
    }
    /**
     * Upload a certificate for a resource.
     * @param string $resourceGroupName
     * @param string $vaultName
     * @param string $certificateName
     * @param array $certificateRequest
     * @return array
     */
    public function create(
        $resourceGroupName,
        $vaultName,
        $certificateName,
        array $certificateRequest
    )
    {
        return $this->_Create_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'vaultName' => $vaultName,
            'certificateName' => $certificateName,
            'certificateRequest' => $certificateRequest
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Create_operation;
}
