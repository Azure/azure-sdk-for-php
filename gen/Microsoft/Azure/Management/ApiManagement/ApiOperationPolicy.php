<?php
namespace Microsoft\Azure\Management\ApiManagement;
final class ApiOperationPolicy
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Get_operation = $_client->createOperation('ApiOperationPolicy_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('ApiOperationPolicy_CreateOrUpdate');
        $this->_Delete_operation = $_client->createOperation('ApiOperationPolicy_Delete');
    }
    /**
     * Get the policy configuration at the API Operation level.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $apiId
     * @param string $operationId
     * @return array
     */
    public function get(
        $resourceGroupName,
        $serviceName,
        $apiId,
        $operationId
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'apiId' => $apiId,
            'operationId' => $operationId
        ]);
    }
    /**
     * Creates or updates policy configuration for the API Operation level.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $apiId
     * @param string $operationId
     * @param array $parameters
     * @param string $if_Match
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $serviceName,
        $apiId,
        $operationId,
        array $parameters,
        $if_Match
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'apiId' => $apiId,
            'operationId' => $operationId,
            'parameters' => $parameters,
            'If-Match' => $if_Match
        ]);
    }
    /**
     * Deletes the policy configuration at the Api Operation.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $apiId
     * @param string $operationId
     * @param string $if_Match
     */
    public function delete(
        $resourceGroupName,
        $serviceName,
        $apiId,
        $operationId,
        $if_Match
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'apiId' => $apiId,
            'operationId' => $operationId,
            'If-Match' => $if_Match
        ]);
    }
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
