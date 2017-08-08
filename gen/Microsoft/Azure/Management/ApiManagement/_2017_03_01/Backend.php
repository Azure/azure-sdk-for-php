<?php
namespace Microsoft\Azure\Management\ApiManagement\_2017_03_01;
final class Backend
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListByService_operation = $_client->createOperation('Backend_ListByService');
        $this->_Get_operation = $_client->createOperation('Backend_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('Backend_CreateOrUpdate');
        $this->_Update_operation = $_client->createOperation('Backend_Update');
        $this->_Delete_operation = $_client->createOperation('Backend_Delete');
    }
    /**
     * Lists a collection of backends in the specified service instance.
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
     * Gets the details of the backend specified by its identifier.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $backendid
     * @return array
     */
    public function get(
        $resourceGroupName,
        $serviceName,
        $backendid
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'backendid' => $backendid
        ]);
    }
    /**
     * Creates or Updates a backend.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $backendid
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $serviceName,
        $backendid,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'backendid' => $backendid,
            'parameters' => $parameters
        ]);
    }
    /**
     * Updates an existing backend.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $backendid
     * @param array $parameters
     * @param string $if_Match
     */
    public function update(
        $resourceGroupName,
        $serviceName,
        $backendid,
        array $parameters,
        $if_Match
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'backendid' => $backendid,
            'parameters' => $parameters,
            'If-Match' => $if_Match
        ]);
    }
    /**
     * Deletes the specified backend.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $backendid
     * @param string $if_Match
     */
    public function delete(
        $resourceGroupName,
        $serviceName,
        $backendid,
        $if_Match
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'backendid' => $backendid,
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
