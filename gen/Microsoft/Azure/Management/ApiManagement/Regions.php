<?php
namespace Microsoft\Azure\Management\ApiManagement;
final class Regions
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListByService_operation = $_client->createOperation('Regions_ListByService');
    }
    /**
     * Lists all azure regions in which the service exists.
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
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByService_operation;
}
