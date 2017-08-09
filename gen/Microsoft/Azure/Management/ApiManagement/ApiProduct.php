<?php
namespace Microsoft\Azure\Management\ApiManagement;
final class ApiProduct
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListByApis_operation = $_client->createOperation('ApiProduct_ListByApis');
    }
    /**
     * Lists all Products, which the API is part of.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $apiId
     * @param string $_filter
     * @param integer $_top
     * @param integer $_skip
     * @return array
     */
    public function listByApis(
        $resourceGroupName,
        $serviceName,
        $apiId,
        $_filter,
        $_top,
        $_skip
    )
    {
        return $this->_ListByApis_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'apiId' => $apiId,
            '$filter' => $_filter,
            '$top' => $_top,
            '$skip' => $_skip
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByApis_operation;
}
