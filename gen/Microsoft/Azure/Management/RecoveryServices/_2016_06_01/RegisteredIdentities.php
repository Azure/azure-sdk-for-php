<?php
namespace Microsoft\Azure\Management\RecoveryServices\_2016_06_01;
final class RegisteredIdentities
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Delete_operation = $_client->createOperation('RegisteredIdentities_Delete');
    }
    /**
     * Unregisters the given container from your Recovery Services vault.
     * @param string $resourceGroupName
     * @param string $vaultName
     * @param string $identityName
     */
    public function delete(
        $resourceGroupName,
        $vaultName,
        $identityName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'vaultName' => $vaultName,
            'identityName' => $identityName
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Delete_operation;
}
