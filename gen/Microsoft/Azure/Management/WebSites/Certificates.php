<?php
namespace Microsoft\Azure\Management\WebSites;
final class Certificates
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_List_operation = $_client->createOperation('Certificates_List');
        $this->_ListByResourceGroup_operation = $_client->createOperation('Certificates_ListByResourceGroup');
        $this->_Get_operation = $_client->createOperation('Certificates_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('Certificates_CreateOrUpdate');
        $this->_Delete_operation = $_client->createOperation('Certificates_Delete');
        $this->_Update_operation = $_client->createOperation('Certificates_Update');
    }
    /**
     * Get all certificates for a subscription.
     * @return array
     */
    public function list_()
    {
        return $this->_List_operation->call([]);
    }
    /**
     * Get all certificates in a resource group.
     * @param string $resourceGroupName
     * @return array
     */
    public function listByResourceGroup($resourceGroupName)
    {
        return $this->_ListByResourceGroup_operation->call(['resourceGroupName' => $resourceGroupName]);
    }
    /**
     * Get a certificate.
     * @param string $resourceGroupName
     * @param string $name
     * @return array
     */
    public function get(
        $resourceGroupName,
        $name
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name
        ]);
    }
    /**
     * Create or update a certificate.
     * @param string $resourceGroupName
     * @param string $name
     * @param array $certificateEnvelope
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $name,
        array $certificateEnvelope
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'certificateEnvelope' => $certificateEnvelope
        ]);
    }
    /**
     * Delete a certificate.
     * @param string $resourceGroupName
     * @param string $name
     */
    public function delete(
        $resourceGroupName,
        $name
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name
        ]);
    }
    /**
     * Create or update a certificate.
     * @param string $resourceGroupName
     * @param string $name
     * @param array $certificateEnvelope
     * @return array
     */
    public function update(
        $resourceGroupName,
        $name,
        array $certificateEnvelope
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'certificateEnvelope' => $certificateEnvelope
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByResourceGroup_operation;
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
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Update_operation;
}
