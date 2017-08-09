<?php
namespace Microsoft\Azure\Management\ApiManagement;
final class TenantAccessGit
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Get_operation = $_client->createOperation('TenantAccessGit_Get');
        $this->_RegeneratePrimaryKey_operation = $_client->createOperation('TenantAccessGit_RegeneratePrimaryKey');
        $this->_RegenerateSecondaryKey_operation = $_client->createOperation('TenantAccessGit_RegenerateSecondaryKey');
    }
    /**
     * Gets the Git access configuration for the tenant.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $serviceName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName
        ]);
    }
    /**
     * Regenerate primary access key for GIT.
     * @param string $resourceGroupName
     * @param string $serviceName
     */
    public function regeneratePrimaryKey(
        $resourceGroupName,
        $serviceName
    )
    {
        return $this->_RegeneratePrimaryKey_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName
        ]);
    }
    /**
     * Regenerate secondary access key for GIT.
     * @param string $resourceGroupName
     * @param string $serviceName
     */
    public function regenerateSecondaryKey(
        $resourceGroupName,
        $serviceName
    )
    {
        return $this->_RegenerateSecondaryKey_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_RegeneratePrimaryKey_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_RegenerateSecondaryKey_operation;
}
