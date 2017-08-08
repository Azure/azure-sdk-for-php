<?php
namespace Microsoft\Azure\Management\ApiManagement\_2017_03_01;
final class ApiOperation
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListByApi_operation = $_client->createOperation('ApiOperation_ListByApi');
        $this->_Get_operation = $_client->createOperation('ApiOperation_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('ApiOperation_CreateOrUpdate');
        $this->_Update_operation = $_client->createOperation('ApiOperation_Update');
        $this->_Delete_operation = $_client->createOperation('ApiOperation_Delete');
    }
    /**
     * Lists a collection of the operations for the specified API.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $apiId
     * @param string $_filter
     * @param integer $_top
     * @param integer $_skip
     * @return array
     */
    public function listByApi(
        $resourceGroupName,
        $serviceName,
        $apiId,
        $_filter,
        $_top,
        $_skip
    )
    {
        return $this->_ListByApi_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'apiId' => $apiId,
            '$filter' => $_filter,
            '$top' => $_top,
            '$skip' => $_skip
        ]);
    }
    /**
     * Gets the details of the API Operation specified by its identifier.
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
     * Creates a new operation in the API or updates an existing one.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $apiId
     * @param string $operationId
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $serviceName,
        $apiId,
        $operationId,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'apiId' => $apiId,
            'operationId' => $operationId,
            'parameters' => $parameters
        ]);
    }
    /**
     * Updates the details of the operation in the API specified by its identifier.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $apiId
     * @param string $operationId
     * @param array $parameters
     * @param string $if_Match
     */
    public function update(
        $resourceGroupName,
        $serviceName,
        $apiId,
        $operationId,
        array $parameters,
        $if_Match
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'apiId' => $apiId,
            'operationId' => $operationId,
            'parameters' => $parameters,
            'If-Match' => $if_Match
        ]);
    }
    /**
     * Deletes the specified operation in the API.
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
    private $_Update_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Delete_operation;
}
