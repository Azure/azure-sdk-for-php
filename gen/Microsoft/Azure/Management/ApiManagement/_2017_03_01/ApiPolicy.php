<?php
namespace Microsoft\Azure\Management\ApiManagement\_2017_03_01;
final class ApiPolicy
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListByApi_operation = $_client->createOperation('ApiPolicy_ListByApi');
        $this->_Get_operation = $_client->createOperation('ApiPolicy_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('ApiPolicy_CreateOrUpdate');
        $this->_Delete_operation = $_client->createOperation('ApiPolicy_Delete');
    }
    /**
     * Get the policy configuration at the API level.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $apiId
     * @return array
     */
    public function listByApi(
        $resourceGroupName,
        $serviceName,
        $apiId
    )
    {
        return $this->_ListByApi_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'apiId' => $apiId
        ]);
    }
    /**
     * Get the policy configuration at the API level.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $apiId
     * @return array
     */
    public function get(
        $resourceGroupName,
        $serviceName,
        $apiId
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'apiId' => $apiId
        ]);
    }
    /**
     * Creates or updates policy configuration for the API.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $apiId
     * @param array $parameters
     * @param string $if_Match
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $serviceName,
        $apiId,
        array $parameters,
        $if_Match
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'apiId' => $apiId,
            'parameters' => $parameters,
            'If-Match' => $if_Match
        ]);
    }
    /**
     * Deletes the policy configuration at the Api.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $apiId
     * @param string $if_Match
     */
    public function delete(
        $resourceGroupName,
        $serviceName,
        $apiId,
        $if_Match
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'apiId' => $apiId,
            'If-Match' => $if_Match
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByApi_operation;
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
