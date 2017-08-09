<?php
namespace Microsoft\Azure\Management\ApiManagement;
final class EmailTemplate
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListByService_operation = $_client->createOperation('EmailTemplate_ListByService');
        $this->_Get_operation = $_client->createOperation('EmailTemplate_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('EmailTemplate_CreateOrUpdate');
        $this->_Update_operation = $_client->createOperation('EmailTemplate_Update');
        $this->_Delete_operation = $_client->createOperation('EmailTemplate_Delete');
    }
    /**
     * Lists a collection of properties defined within a service instance.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param integer $_top
     * @param integer $_skip
     * @return array
     */
    public function listByService(
        $resourceGroupName,
        $serviceName,
        $_top,
        $_skip
    )
    {
        return $this->_ListByService_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            '$top' => $_top,
            '$skip' => $_skip
        ]);
    }
    /**
     * Gets the details of the email template specified by its identifier.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $templateName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $serviceName,
        $templateName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'templateName' => $templateName
        ]);
    }
    /**
     * Updates an Email Template.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $templateName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $serviceName,
        $templateName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'templateName' => $templateName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Updates the specific Email Template.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $templateName
     * @param array $parameters
     */
    public function update(
        $resourceGroupName,
        $serviceName,
        $templateName,
        array $parameters
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'templateName' => $templateName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Reset the Email Template to default template provided by the API Management service instance.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $templateName
     * @param string $if_Match
     */
    public function delete(
        $resourceGroupName,
        $serviceName,
        $templateName,
        $if_Match
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'templateName' => $templateName,
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
