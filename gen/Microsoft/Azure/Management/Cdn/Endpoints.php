<?php
namespace Microsoft\Azure\Management\Cdn;
final class Endpoints
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListByProfile_operation = $_client->createOperation('Endpoints_ListByProfile');
        $this->_Get_operation = $_client->createOperation('Endpoints_Get');
        $this->_Create_operation = $_client->createOperation('Endpoints_Create');
        $this->_Update_operation = $_client->createOperation('Endpoints_Update');
        $this->_Delete_operation = $_client->createOperation('Endpoints_Delete');
        $this->_Start_operation = $_client->createOperation('Endpoints_Start');
        $this->_Stop_operation = $_client->createOperation('Endpoints_Stop');
        $this->_PurgeContent_operation = $_client->createOperation('Endpoints_PurgeContent');
        $this->_LoadContent_operation = $_client->createOperation('Endpoints_LoadContent');
        $this->_ValidateCustomDomain_operation = $_client->createOperation('Endpoints_ValidateCustomDomain');
        $this->_ListResourceUsage_operation = $_client->createOperation('Endpoints_ListResourceUsage');
    }
    /**
     * Lists existing CDN endpoints.
     * @param string $resourceGroupName
     * @param string $profileName
     * @return array
     */
    public function listByProfile(
        $resourceGroupName,
        $profileName
    )
    {
        return $this->_ListByProfile_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'profileName' => $profileName
        ]);
    }
    /**
     * Gets an existing CDN endpoint with the specified endpoint name under the specified subscription, resource group and profile.
     * @param string $resourceGroupName
     * @param string $profileName
     * @param string $endpointName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $profileName,
        $endpointName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'profileName' => $profileName,
            'endpointName' => $endpointName
        ]);
    }
    /**
     * Creates a new CDN endpoint with the specified endpoint name under the specified subscription, resource group and profile.
     * @param string $resourceGroupName
     * @param string $profileName
     * @param string $endpointName
     * @param array $endpoint
     * @return array
     */
    public function create(
        $resourceGroupName,
        $profileName,
        $endpointName,
        array $endpoint
    )
    {
        return $this->_Create_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'profileName' => $profileName,
            'endpointName' => $endpointName,
            'endpoint' => $endpoint
        ]);
    }
    /**
     * Updates an existing CDN endpoint with the specified endpoint name under the specified subscription, resource group and profile. Only tags and Origin HostHeader can be updated after creating an endpoint. To update origins, use the Update Origin operation. To update custom domains, use the Update Custom Domain operation.
     * @param string $resourceGroupName
     * @param string $profileName
     * @param string $endpointName
     * @param array $endpointUpdateProperties
     * @return array
     */
    public function update(
        $resourceGroupName,
        $profileName,
        $endpointName,
        array $endpointUpdateProperties
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'profileName' => $profileName,
            'endpointName' => $endpointName,
            'endpointUpdateProperties' => $endpointUpdateProperties
        ]);
    }
    /**
     * Deletes an existing CDN endpoint with the specified endpoint name under the specified subscription, resource group and profile.
     * @param string $resourceGroupName
     * @param string $profileName
     * @param string $endpointName
     */
    public function delete(
        $resourceGroupName,
        $profileName,
        $endpointName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'profileName' => $profileName,
            'endpointName' => $endpointName
        ]);
    }
    /**
     * Starts an existing CDN endpoint that is on a stopped state.
     * @param string $resourceGroupName
     * @param string $profileName
     * @param string $endpointName
     * @return array
     */
    public function start(
        $resourceGroupName,
        $profileName,
        $endpointName
    )
    {
        return $this->_Start_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'profileName' => $profileName,
            'endpointName' => $endpointName
        ]);
    }
    /**
     * Stops an existing running CDN endpoint.
     * @param string $resourceGroupName
     * @param string $profileName
     * @param string $endpointName
     * @return array
     */
    public function stop(
        $resourceGroupName,
        $profileName,
        $endpointName
    )
    {
        return $this->_Stop_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'profileName' => $profileName,
            'endpointName' => $endpointName
        ]);
    }
    /**
     * Removes a content from CDN.
     * @param string $resourceGroupName
     * @param string $profileName
     * @param string $endpointName
     * @param array $contentFilePaths
     */
    public function purgeContent(
        $resourceGroupName,
        $profileName,
        $endpointName,
        array $contentFilePaths
    )
    {
        return $this->_PurgeContent_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'profileName' => $profileName,
            'endpointName' => $endpointName,
            'contentFilePaths' => $contentFilePaths
        ]);
    }
    /**
     * Pre-loads a content to CDN. Available for Verizon Profiles.
     * @param string $resourceGroupName
     * @param string $profileName
     * @param string $endpointName
     * @param array $contentFilePaths
     */
    public function loadContent(
        $resourceGroupName,
        $profileName,
        $endpointName,
        array $contentFilePaths
    )
    {
        return $this->_LoadContent_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'profileName' => $profileName,
            'endpointName' => $endpointName,
            'contentFilePaths' => $contentFilePaths
        ]);
    }
    /**
     * Validates the custom domain mapping to ensure it maps to the correct CDN endpoint in DNS.
     * @param string $resourceGroupName
     * @param string $profileName
     * @param string $endpointName
     * @param array $customDomainProperties
     * @return array
     */
    public function validateCustomDomain(
        $resourceGroupName,
        $profileName,
        $endpointName,
        array $customDomainProperties
    )
    {
        return $this->_ValidateCustomDomain_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'profileName' => $profileName,
            'endpointName' => $endpointName,
            'customDomainProperties' => $customDomainProperties
        ]);
    }
    /**
     * Checks the quota and usage of geo filters and custom domains under the given endpoint.
     * @param string $resourceGroupName
     * @param string $profileName
     * @param string $endpointName
     * @return array
     */
    public function listResourceUsage(
        $resourceGroupName,
        $profileName,
        $endpointName
    )
    {
        return $this->_ListResourceUsage_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'profileName' => $profileName,
            'endpointName' => $endpointName
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByProfile_operation;
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
    private $_Update_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Delete_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Start_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Stop_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_PurgeContent_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_LoadContent_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ValidateCustomDomain_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListResourceUsage_operation;
}
