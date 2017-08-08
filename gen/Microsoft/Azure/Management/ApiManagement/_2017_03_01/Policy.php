<?php
namespace Microsoft\Azure\Management\ApiManagement\_2017_03_01;
final class Policy
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListByService_operation = $_client->createOperation('Policy_ListByService');
        $this->_Get_operation = $_client->createOperation('Policy_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('Policy_CreateOrUpdate');
        $this->_Delete_operation = $_client->createOperation('Policy_Delete');
    }
    /**
     * Lists all the Global Policy definitions of the Api Management service.
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
     * Get the Global policy definition of the Api Management service.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $serviceName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName
        ]);
    }
    /**
     * Creates or updates the global policy configuration of the Api Management service.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $serviceName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Deletes the global policy configuration of the Api Management Service.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $if_Match
     */
    public function delete(
        $resourceGroupName,
        $serviceName,
        $if_Match
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
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
    private $_Delete_operation;
}
