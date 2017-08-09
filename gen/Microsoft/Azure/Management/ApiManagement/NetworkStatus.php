<?php
namespace Microsoft\Azure\Management\ApiManagement;
final class NetworkStatus
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListByService_operation = $_client->createOperation('NetworkStatus_ListByService');
        $this->_ListByLocation_operation = $_client->createOperation('NetworkStatus_ListByLocation');
    }
    /**
     * Gets the Connectivity Status to the external resources on which the Api Management service depends from inside the Cloud Service. This also returns the DNS Servers as visible to the CloudService.
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
     * Gets the Connectivity Status to the external resources on which the Api Management service depends from inside the Cloud Service. This also returns the DNS Servers as visible to the CloudService.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $locationName
     * @return array
     */
    public function listByLocation(
        $resourceGroupName,
        $serviceName,
        $locationName
    )
    {
        return $this->_ListByLocation_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'locationName' => $locationName
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByService_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByLocation_operation;
}
