<?php
namespace Microsoft\Azure\Management\ApiManagement;
final class Logger
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListByService_operation = $_client->createOperation('Logger_ListByService');
        $this->_Get_operation = $_client->createOperation('Logger_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('Logger_CreateOrUpdate');
        $this->_Update_operation = $_client->createOperation('Logger_Update');
        $this->_Delete_operation = $_client->createOperation('Logger_Delete');
    }
    /**
     * Lists a collection of loggers in the specified service instance.
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
     * Gets the details of the logger specified by its identifier.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $loggerid
     * @return array
     */
    public function get(
        $resourceGroupName,
        $serviceName,
        $loggerid
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'loggerid' => $loggerid
        ]);
    }
    /**
     * Creates or Updates a logger.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $loggerid
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $serviceName,
        $loggerid,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'loggerid' => $loggerid,
            'parameters' => $parameters
        ]);
    }
    /**
     * Updates an existing logger.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $loggerid
     * @param array $parameters
     * @param string $if_Match
     */
    public function update(
        $resourceGroupName,
        $serviceName,
        $loggerid,
        array $parameters,
        $if_Match
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'loggerid' => $loggerid,
            'parameters' => $parameters,
            'If-Match' => $if_Match
        ]);
    }
    /**
     * Deletes the specified logger.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $loggerid
     * @param string $if_Match
     */
    public function delete(
        $resourceGroupName,
        $serviceName,
        $loggerid,
        $if_Match
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'loggerid' => $loggerid,
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
