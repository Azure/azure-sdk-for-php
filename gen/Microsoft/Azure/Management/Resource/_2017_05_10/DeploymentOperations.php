<?php
namespace Microsoft\Azure\Management\Resource\_2017_05_10;
final class DeploymentOperations
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Get_operation = $_client->createOperation('DeploymentOperations_Get');
        $this->_List_operation = $_client->createOperation('DeploymentOperations_List');
    }
    /**
     * Gets a deployments operation.
     * @param string $resourceGroupName
     * @param string $deploymentName
     * @param string $operationId
     * @return array
     */
    public function get(
        $resourceGroupName,
        $deploymentName,
        $operationId
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'deploymentName' => $deploymentName,
            'operationId' => $operationId
        ]);
    }
    /**
     * Gets all deployments operations for a deployment.
     * @param string $resourceGroupName
     * @param string $deploymentName
     * @param integer $_top
     * @return array
     */
    public function list_(
        $resourceGroupName,
        $deploymentName,
        $_top
    )
    {
        return $this->_List_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'deploymentName' => $deploymentName,
            '$top' => $_top
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
}
