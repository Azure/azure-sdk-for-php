<?php
namespace Microsoft\Azure\Management\ApiManagement;
final class Api
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListByService_operation = $_client->createOperation('Api_ListByService');
        $this->_Get_operation = $_client->createOperation('Api_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('Api_CreateOrUpdate');
        $this->_Update_operation = $_client->createOperation('Api_Update');
        $this->_Delete_operation = $_client->createOperation('Api_Delete');
    }
    /**
     * Lists all APIs of the API Management service instance.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $_filter
     * @param integer $_top
     * @param integer $_skip
     * @return array
     */
    public function listByService(
        $resourceGroupName,
        $serviceName,
        $_filter,
        $_top,
        $_skip
    )
    {
        return $this->_ListByService_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            '$filter' => $_filter,
            '$top' => $_top,
            '$skip' => $_skip
        ]);
    }
    /**
     * Gets the details of the API specified by its identifier.
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
     * Creates new or updates existing specified API of the API Management service instance.
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
     * Updates the specified API of the API Management service instance.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $apiId
     * @param array $parameters
     * @param string $if_Match
     */
    public function update(
        $resourceGroupName,
        $serviceName,
        $apiId,
        array $parameters,
        $if_Match
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'apiId' => $apiId,
            'parameters' => $parameters,
            'If-Match' => $if_Match
        ]);
    }
    /**
     * Deletes the specified API of the API Management service instance.
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
    private $_ListByService_operation;
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
