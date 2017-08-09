<?php
namespace Microsoft\Azure\Management\Search;
final class Services
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_CreateOrUpdate_operation = $_client->createOperation('Services_CreateOrUpdate');
        $this->_Get_operation = $_client->createOperation('Services_Get');
        $this->_Delete_operation = $_client->createOperation('Services_Delete');
        $this->_ListByResourceGroup_operation = $_client->createOperation('Services_ListByResourceGroup');
        $this->_CheckNameAvailability_operation = $_client->createOperation('Services_CheckNameAvailability');
    }
    /**
     * Creates or updates a Search service in the given resource group. If the Search service already exists, all properties will be updated with the given values.
     * @param string $resourceGroupName
     * @param string $searchServiceName
     * @param array $service
     * @param string $x_ms_client_request_id
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $searchServiceName,
        array $service,
        $x_ms_client_request_id
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'searchServiceName' => $searchServiceName,
            'service' => $service,
            'x-ms-client-request-id' => $x_ms_client_request_id
        ]);
    }
    /**
     * Gets the Search service with the given name in the given resource group.
     * @param string $resourceGroupName
     * @param string $searchServiceName
     * @param string $x_ms_client_request_id
     * @return array
     */
    public function get(
        $resourceGroupName,
        $searchServiceName,
        $x_ms_client_request_id
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'searchServiceName' => $searchServiceName,
            'x-ms-client-request-id' => $x_ms_client_request_id
        ]);
    }
    /**
     * Deletes a Search service in the given resource group, along with its associated resources.
     * @param string $resourceGroupName
     * @param string $searchServiceName
     * @param string $x_ms_client_request_id
     */
    public function delete(
        $resourceGroupName,
        $searchServiceName,
        $x_ms_client_request_id
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'searchServiceName' => $searchServiceName,
            'x-ms-client-request-id' => $x_ms_client_request_id
        ]);
    }
    /**
     * Gets a list of all Search services in the given resource group.
     * @param string $resourceGroupName
     * @param string $x_ms_client_request_id
     * @return array
     */
    public function listByResourceGroup(
        $resourceGroupName,
        $x_ms_client_request_id
    )
    {
        return $this->_ListByResourceGroup_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'x-ms-client-request-id' => $x_ms_client_request_id
        ]);
    }
    /**
     * Checks whether or not the given Search service name is available for use. Search service names must be globally unique since they are part of the service URI (https://<name>.search.windows.net).
     * @param array $checkNameAvailabilityInput
     * @param string $x_ms_client_request_id
     * @return array
     */
    public function checkNameAvailability(
        array $checkNameAvailabilityInput,
        $x_ms_client_request_id
    )
    {
        return $this->_CheckNameAvailability_operation->call([
            'checkNameAvailabilityInput' => $checkNameAvailabilityInput,
            'x-ms-client-request-id' => $x_ms_client_request_id
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateOrUpdate_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Delete_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByResourceGroup_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CheckNameAvailability_operation;
}
