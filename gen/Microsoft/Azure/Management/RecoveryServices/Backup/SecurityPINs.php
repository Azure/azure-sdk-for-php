<?php
namespace Microsoft\Azure\Management\RecoveryServices\Backup;
final class SecurityPINs
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Get_operation = $_client->createOperation('SecurityPINs_Get');
    }
    /**
     * Get the security PIN.
     * @param string $vaultName
     * @param string $resourceGroupName
     * @return array
     */
    public function get(
        $vaultName,
        $resourceGroupName
    )
    {
        return $this->_Get_operation->call([
            'vaultName' => $vaultName,
            'resourceGroupName' => $resourceGroupName
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
}
