<?php
namespace Microsoft\Azure\Management\ApiManagement\_2017_03_01;
final class Property
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListByService_operation = $_client->createOperation('Property_ListByService');
        $this->_Get_operation = $_client->createOperation('Property_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('Property_CreateOrUpdate');
        $this->_Update_operation = $_client->createOperation('Property_Update');
        $this->_Delete_operation = $_client->createOperation('Property_Delete');
    }
    /**
     * Lists a collection of properties defined within a service instance.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $_filter
     * @param integer $_top
     * @param integer $_skip
     * @return array
     */
    public function listByService(
        $resourceGroupName,
        $serviceName,
        $_filter,
        $_top,
        $_skip
    )
    {
        return $this->_ListByService_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            '$filter' => $_filter,
            '$top' => $_top,
            '$skip' => $_skip
        ]);
    }
    /**
     * Gets the details of the property specified by its identifier.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $propId
     * @return array
     */
    public function get(
        $resourceGroupName,
        $serviceName,
        $propId
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'propId' => $propId
        ]);
    }
    /**
     * Creates or updates a property.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $propId
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $serviceName,
        $propId,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'propId' => $propId,
            'parameters' => $parameters
        ]);
    }
    /**
     * Updates the specific property.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $propId
     * @param array $parameters
     * @param string $if_Match
     */
    public function update(
        $resourceGroupName,
        $serviceName,
        $propId,
        array $parameters,
        $if_Match
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'propId' => $propId,
            'parameters' => $parameters,
            'If-Match' => $if_Match
        ]);
    }
    /**
     * Deletes specific property from the the API Management service instance.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $propId
     * @param string $if_Match
     */
    public function delete(
        $resourceGroupName,
        $serviceName,
        $propId,
        $if_Match
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'propId' => $propId,
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
    private $_Update_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Delete_operation;
}
