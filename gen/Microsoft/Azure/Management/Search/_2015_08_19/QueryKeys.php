<?php
namespace Microsoft\Azure\Management\Search\_2015_08_19;
final class QueryKeys
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Create_operation = $_client->createOperation('QueryKeys_Create');
        $this->_ListBySearchService_operation = $_client->createOperation('QueryKeys_ListBySearchService');
        $this->_Delete_operation = $_client->createOperation('QueryKeys_Delete');
    }
    /**
     * Generates a new query key for the specified Search service. You can create up to 50 query keys per service.
     * @param string $resourceGroupName
     * @param string $searchServiceName
     * @param string $name
     * @param string $x_ms_client_request_id
     * @return array
     */
    public function create(
        $resourceGroupName,
        $searchServiceName,
        $name,
        $x_ms_client_request_id
    )
    {
        return $this->_Create_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'searchServiceName' => $searchServiceName,
            'name' => $name,
            'x-ms-client-request-id' => $x_ms_client_request_id
        ]);
    }
    /**
     * Returns the list of query API keys for the given Azure Search service.
     * @param string $resourceGroupName
     * @param string $searchServiceName
     * @param string $x_ms_client_request_id
     * @return array
     */
    public function listBySearchService(
        $resourceGroupName,
        $searchServiceName,
        $x_ms_client_request_id
    )
    {
        return $this->_ListBySearchService_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'searchServiceName' => $searchServiceName,
            'x-ms-client-request-id' => $x_ms_client_request_id
        ]);
    }
    /**
     * Deletes the specified query key. Unlike admin keys, query keys are not regenerated. The process for regenerating a query key is to delete and then recreate it.
     * @param string $resourceGroupName
     * @param string $searchServiceName
     * @param string $key
     * @param string $x_ms_client_request_id
     */
    public function delete(
        $resourceGroupName,
        $searchServiceName,
        $key,
        $x_ms_client_request_id
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'searchServiceName' => $searchServiceName,
            'key' => $key,
            'x-ms-client-request-id' => $x_ms_client_request_id
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Create_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListBySearchService_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Delete_operation;
}
