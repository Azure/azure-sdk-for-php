<?php
namespace Microsoft\Azure\Management\ApiManagement;
final class AuthorizationServer
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListByService_operation = $_client->createOperation('AuthorizationServer_ListByService');
        $this->_Get_operation = $_client->createOperation('AuthorizationServer_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('AuthorizationServer_CreateOrUpdate');
        $this->_Update_operation = $_client->createOperation('AuthorizationServer_Update');
        $this->_Delete_operation = $_client->createOperation('AuthorizationServer_Delete');
    }
    /**
     * Lists a collection of authorization servers defined within a service instance.
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
     * Gets the details of the authorization server specified by its identifier.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $authsid
     * @return array
     */
    public function get(
        $resourceGroupName,
        $serviceName,
        $authsid
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'authsid' => $authsid
        ]);
    }
    /**
     * Creates new authorization server or updates an existing authorization server.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $authsid
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $serviceName,
        $authsid,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'authsid' => $authsid,
            'parameters' => $parameters
        ]);
    }
    /**
     * Updates the details of the authorization server specified by its identifier.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $authsid
     * @param array $parameters
     * @param string $if_Match
     */
    public function update(
        $resourceGroupName,
        $serviceName,
        $authsid,
        array $parameters,
        $if_Match
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'authsid' => $authsid,
            'parameters' => $parameters,
            'If-Match' => $if_Match
        ]);
    }
    /**
     * Deletes specific authorization server instance.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $authsid
     * @param string $if_Match
     */
    public function delete(
        $resourceGroupName,
        $serviceName,
        $authsid,
        $if_Match
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'authsid' => $authsid,
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
