<?php
namespace Microsoft\Azure\Management\ApiManagement;
final class TenantAccess
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Get_operation = $_client->createOperation('TenantAccess_Get');
        $this->_Update_operation = $_client->createOperation('TenantAccess_Update');
        $this->_RegeneratePrimaryKey_operation = $_client->createOperation('TenantAccess_RegeneratePrimaryKey');
        $this->_RegenerateSecondaryKey_operation = $_client->createOperation('TenantAccess_RegenerateSecondaryKey');
    }
    /**
     * Get tenant access information details.
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
     * Update tenant access information details.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param array $parameters
     * @param string $if_Match
     */
    public function update(
        $resourceGroupName,
        $serviceName,
        array $parameters,
        $if_Match
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'parameters' => $parameters,
            'If-Match' => $if_Match
        ]);
    }
    /**
     * Regenerate primary access key.
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
     * Regenerate secondary access key.
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
    private $_Update_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_RegeneratePrimaryKey_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_RegenerateSecondaryKey_operation;
}
