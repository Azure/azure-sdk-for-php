<?php
namespace Microsoft\Azure\Management\ApiManagement\_2017_03_01;
final class PolicySnippets
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListByService_operation = $_client->createOperation('PolicySnippets_ListByService');
    }
    /**
     * Lists all policy snippets.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $scope
     * @return array
     */
    public function listByService(
        $resourceGroupName,
        $serviceName,
        $scope
    )
    {
        return $this->_ListByService_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'scope' => $scope
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByService_operation;
}
