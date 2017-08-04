<?php
namespace Microsoft\Azure\Management\Search\_2015_08_19;
final class AdminKeys
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Get_operation = $_client->createOperation('AdminKeys_Get');
        $this->_Regenerate_operation = $_client->createOperation('AdminKeys_Regenerate');
    }
    /**
     * Gets the primary and secondary admin API keys for the specified Azure Search service.
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
     * Regenerates either the primary or secondary admin API key. You can only regenerate one key at a time.
     * @param string $resourceGroupName
     * @param string $searchServiceName
     * @param string $keyKind
     * @param string $x_ms_client_request_id
     * @return array
     */
    public function regenerate(
        $resourceGroupName,
        $searchServiceName,
        $keyKind,
        $x_ms_client_request_id
    )
    {
        return $this->_Regenerate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'searchServiceName' => $searchServiceName,
            'keyKind' => $keyKind,
            'x-ms-client-request-id' => $x_ms_client_request_id
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Regenerate_operation;
}
