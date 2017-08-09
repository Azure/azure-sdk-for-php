<?php
namespace Microsoft\Azure\Management\Cdn;
final class CustomDomains
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListByEndpoint_operation = $_client->createOperation('CustomDomains_ListByEndpoint');
        $this->_Get_operation = $_client->createOperation('CustomDomains_Get');
        $this->_Create_operation = $_client->createOperation('CustomDomains_Create');
        $this->_Delete_operation = $_client->createOperation('CustomDomains_Delete');
        $this->_DisableCustomHttps_operation = $_client->createOperation('CustomDomains_DisableCustomHttps');
        $this->_EnableCustomHttps_operation = $_client->createOperation('CustomDomains_EnableCustomHttps');
    }
    /**
     * Lists all of the existing custom domains within an endpoint.
     * @param string $resourceGroupName
     * @param string $profileName
     * @param string $endpointName
     * @return array
     */
    public function listByEndpoint(
        $resourceGroupName,
        $profileName,
        $endpointName
    )
    {
        return $this->_ListByEndpoint_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'profileName' => $profileName,
            'endpointName' => $endpointName
        ]);
    }
    /**
     * Gets an exisitng custom domain within an endpoint.
     * @param string $resourceGroupName
     * @param string $profileName
     * @param string $endpointName
     * @param string $customDomainName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $profileName,
        $endpointName,
        $customDomainName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'profileName' => $profileName,
            'endpointName' => $endpointName,
            'customDomainName' => $customDomainName
        ]);
    }
    /**
     * Creates a new custom domain within an endpoint.
     * @param string $resourceGroupName
     * @param string $profileName
     * @param string $endpointName
     * @param string $customDomainName
     * @param array $customDomainProperties
     * @return array
     */
    public function create(
        $resourceGroupName,
        $profileName,
        $endpointName,
        $customDomainName,
        array $customDomainProperties
    )
    {
        return $this->_Create_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'profileName' => $profileName,
            'endpointName' => $endpointName,
            'customDomainName' => $customDomainName,
            'customDomainProperties' => $customDomainProperties
        ]);
    }
    /**
     * Deletes an existing custom domain within an endpoint.
     * @param string $resourceGroupName
     * @param string $profileName
     * @param string $endpointName
     * @param string $customDomainName
     * @return array
     */
    public function delete(
        $resourceGroupName,
        $profileName,
        $endpointName,
        $customDomainName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'profileName' => $profileName,
            'endpointName' => $endpointName,
            'customDomainName' => $customDomainName
        ]);
    }
    /**
     * Disable https delivery of the custom domain.
     * @param string $resourceGroupName
     * @param string $profileName
     * @param string $endpointName
     * @param string $customDomainName
     * @return array
     */
    public function disableCustomHttps(
        $resourceGroupName,
        $profileName,
        $endpointName,
        $customDomainName
    )
    {
        return $this->_DisableCustomHttps_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'profileName' => $profileName,
            'endpointName' => $endpointName,
            'customDomainName' => $customDomainName
        ]);
    }
    /**
     * Enable https delivery of the custom domain.
     * @param string $resourceGroupName
     * @param string $profileName
     * @param string $endpointName
     * @param string $customDomainName
     * @return array
     */
    public function enableCustomHttps(
        $resourceGroupName,
        $profileName,
        $endpointName,
        $customDomainName
    )
    {
        return $this->_EnableCustomHttps_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'profileName' => $profileName,
            'endpointName' => $endpointName,
            'customDomainName' => $customDomainName
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByEndpoint_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Create_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Delete_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_DisableCustomHttps_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_EnableCustomHttps_operation;
}
