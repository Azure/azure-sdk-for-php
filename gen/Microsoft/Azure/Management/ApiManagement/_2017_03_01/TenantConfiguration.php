<?php
namespace Microsoft\Azure\Management\ApiManagement\_2017_03_01;
final class TenantConfiguration
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Deploy_operation = $_client->createOperation('TenantConfiguration_Deploy');
        $this->_Save_operation = $_client->createOperation('TenantConfiguration_Save');
        $this->_Validate_operation = $_client->createOperation('TenantConfiguration_Validate');
        $this->_GetSyncState_operation = $_client->createOperation('TenantConfiguration_GetSyncState');
    }
    /**
     * This operation applies changes from the specified Git branch to the configuration database. This is a long running operation and could take several minutes to complete.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param array $parameters
     * @return array
     */
    public function deploy(
        $resourceGroupName,
        $serviceName,
        array $parameters
    )
    {
        return $this->_Deploy_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'parameters' => $parameters
        ]);
    }
    /**
     * This operation creates a commit with the current configuration snapshot to the specified branch in the repository. This is a long running operation and could take several minutes to complete.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param array $parameters
     * @return array
     */
    public function save(
        $resourceGroupName,
        $serviceName,
        array $parameters
    )
    {
        return $this->_Save_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'parameters' => $parameters
        ]);
    }
    /**
     * This operation validates the changes in the specified Git branch. This is a long running operation and could take several minutes to complete.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param array $parameters
     * @return array
     */
    public function validate(
        $resourceGroupName,
        $serviceName,
        array $parameters
    )
    {
        return $this->_Validate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Gets the status of the most recent synchronization between the configuration database and the Git repository.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @return array
     */
    public function getSyncState(
        $resourceGroupName,
        $serviceName
    )
    {
        return $this->_GetSyncState_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Deploy_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Save_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Validate_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetSyncState_operation;
}
