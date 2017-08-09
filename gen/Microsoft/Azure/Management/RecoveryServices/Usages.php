<?php
namespace Microsoft\Azure\Management\RecoveryServices;
final class Usages
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListByVaults_operation = $_client->createOperation('Usages_ListByVaults');
    }
    /**
     * Fetches the usages of the vault.
     * @param string $resourceGroupName
     * @param string $vaultName
     * @return array
     */
    public function listByVaults(
        $resourceGroupName,
        $vaultName
    )
    {
        return $this->_ListByVaults_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'vaultName' => $vaultName
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByVaults_operation;
}
