<?php
namespace Microsoft\Azure\Management\TrafficManager\_2017_05_01;
final class Endpoints
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Update_operation = $_client->createOperation('Endpoints_Update');
        $this->_Get_operation = $_client->createOperation('Endpoints_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('Endpoints_CreateOrUpdate');
        $this->_Delete_operation = $_client->createOperation('Endpoints_Delete');
    }
    /**
     * Update a Traffic Manager endpoint.
     * @param string $resourceGroupName
     * @param string $profileName
     * @param string $endpointType
     * @param string $endpointName
     * @param array $parameters
     * @return array
     */
    public function update(
        $resourceGroupName,
        $profileName,
        $endpointType,
        $endpointName,
        array $parameters
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'profileName' => $profileName,
            'endpointType' => $endpointType,
            'endpointName' => $endpointName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Gets a Traffic Manager endpoint.
     * @param string $resourceGroupName
     * @param string $profileName
     * @param string $endpointType
     * @param string $endpointName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $profileName,
        $endpointType,
        $endpointName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'profileName' => $profileName,
            'endpointType' => $endpointType,
            'endpointName' => $endpointName
        ]);
    }
    /**
     * Create or update a Traffic Manager endpoint.
     * @param string $resourceGroupName
     * @param string $profileName
     * @param string $endpointType
     * @param string $endpointName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $profileName,
        $endpointType,
        $endpointName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'profileName' => $profileName,
            'endpointType' => $endpointType,
            'endpointName' => $endpointName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Deletes a Traffic Manager endpoint.
     * @param string $resourceGroupName
     * @param string $profileName
     * @param string $endpointType
     * @param string $endpointName
     * @return array
     */
    public function delete(
        $resourceGroupName,
        $profileName,
        $endpointType,
        $endpointName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'profileName' => $profileName,
            'endpointType' => $endpointType,
            'endpointName' => $endpointName
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Update_operation;
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
