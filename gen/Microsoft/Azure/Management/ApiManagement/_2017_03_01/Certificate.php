<?php
namespace Microsoft\Azure\Management\ApiManagement\_2017_03_01;
final class Certificate
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListByService_operation = $_client->createOperation('Certificate_ListByService');
        $this->_Get_operation = $_client->createOperation('Certificate_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('Certificate_CreateOrUpdate');
        $this->_Delete_operation = $_client->createOperation('Certificate_Delete');
    }
    /**
     * Lists a collection of all certificates in the specified service instance.
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
     * Gets the details of the certificate specified by its identifier.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $certificateId
     * @return array
     */
    public function get(
        $resourceGroupName,
        $serviceName,
        $certificateId
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'certificateId' => $certificateId
        ]);
    }
    /**
     * Creates or updates the certificate being used for authentication with the backend.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $certificateId
     * @param array $parameters
     * @param string $if_Match
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $serviceName,
        $certificateId,
        array $parameters,
        $if_Match
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'certificateId' => $certificateId,
            'parameters' => $parameters,
            'If-Match' => $if_Match
        ]);
    }
    /**
     * Deletes specific certificate.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $certificateId
     * @param string $if_Match
     */
    public function delete(
        $resourceGroupName,
        $serviceName,
        $certificateId,
        $if_Match
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'certificateId' => $certificateId,
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
