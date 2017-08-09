<?php
namespace Microsoft\Azure\Management\ApiManagement;
final class OpenIdConnectProvider
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListByService_operation = $_client->createOperation('OpenIdConnectProvider_ListByService');
        $this->_Get_operation = $_client->createOperation('OpenIdConnectProvider_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('OpenIdConnectProvider_CreateOrUpdate');
        $this->_Update_operation = $_client->createOperation('OpenIdConnectProvider_Update');
        $this->_Delete_operation = $_client->createOperation('OpenIdConnectProvider_Delete');
    }
    /**
     * Lists all OpenID Connect Providers.
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
     * Gets specific OpenID Connect Provider.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $opid
     * @return array
     */
    public function get(
        $resourceGroupName,
        $serviceName,
        $opid
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'opid' => $opid
        ]);
    }
    /**
     * Creates or updates the OpenID Connect Provider.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $opid
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $serviceName,
        $opid,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'opid' => $opid,
            'parameters' => $parameters
        ]);
    }
    /**
     * Updates the specific OpenID Connect Provider.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $opid
     * @param array $parameters
     * @param string $if_Match
     */
    public function update(
        $resourceGroupName,
        $serviceName,
        $opid,
        array $parameters,
        $if_Match
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'opid' => $opid,
            'parameters' => $parameters,
            'If-Match' => $if_Match
        ]);
    }
    /**
     * Deletes specific OpenID Connect Provider of the API Management service instance.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $opid
     * @param string $if_Match
     */
    public function delete(
        $resourceGroupName,
        $serviceName,
        $opid,
        $if_Match
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'opid' => $opid,
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
