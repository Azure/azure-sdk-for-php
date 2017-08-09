<?php
namespace Microsoft\Azure\Management\ApiManagement;
final class IdentityProvider
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListByService_operation = $_client->createOperation('IdentityProvider_ListByService');
        $this->_Get_operation = $_client->createOperation('IdentityProvider_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('IdentityProvider_CreateOrUpdate');
        $this->_Update_operation = $_client->createOperation('IdentityProvider_Update');
        $this->_Delete_operation = $_client->createOperation('IdentityProvider_Delete');
    }
    /**
     * Lists a collection of Identity Provider configured in the specified service instance.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @return array
     */
    public function listByService(
        $resourceGroupName,
        $serviceName
    )
    {
        return $this->_ListByService_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName
        ]);
    }
    /**
     * Gets the configuration details of the identity Provider configured in specified service instance.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $identityProviderName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $serviceName,
        $identityProviderName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'identityProviderName' => $identityProviderName
        ]);
    }
    /**
     * Creates or Updates the IdentityProvider configuration.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $identityProviderName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $serviceName,
        $identityProviderName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'identityProviderName' => $identityProviderName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Updates an existing IdentityProvider configuration.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $identityProviderName
     * @param array $parameters
     * @param string $if_Match
     */
    public function update(
        $resourceGroupName,
        $serviceName,
        $identityProviderName,
        array $parameters,
        $if_Match
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'identityProviderName' => $identityProviderName,
            'parameters' => $parameters,
            'If-Match' => $if_Match
        ]);
    }
    /**
     * Deletes the specified identity provider configuration.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $identityProviderName
     * @param string $if_Match
     */
    public function delete(
        $resourceGroupName,
        $serviceName,
        $identityProviderName,
        $if_Match
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'identityProviderName' => $identityProviderName,
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
