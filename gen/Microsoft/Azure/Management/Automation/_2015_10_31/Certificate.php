<?php
namespace Microsoft\Azure\Management\Automation\_2015_10_31;
final class Certificate
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Delete_operation = $_client->createOperation('Certificate_Delete');
        $this->_Get_operation = $_client->createOperation('Certificate_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('Certificate_CreateOrUpdate');
        $this->_Update_operation = $_client->createOperation('Certificate_Update');
        $this->_ListByAutomationAccount_operation = $_client->createOperation('Certificate_ListByAutomationAccount');
    }
    /**
     * Delete the certificate.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param string $certificateName
     */
    public function delete(
        $resourceGroupName,
        $automationAccountName,
        $certificateName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            'certificateName' => $certificateName
        ]);
    }
    /**
     * Retrieve the certificate identified by certificate name.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param string $certificateName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $automationAccountName,
        $certificateName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            'certificateName' => $certificateName
        ]);
    }
    /**
     * Create a certificate.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param string $certificateName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $automationAccountName,
        $certificateName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            'certificateName' => $certificateName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Update a certificate.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param string $certificateName
     * @param array $parameters
     * @return array
     */
    public function update(
        $resourceGroupName,
        $automationAccountName,
        $certificateName,
        array $parameters
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            'certificateName' => $certificateName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Retrieve a list of certificates.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @return array
     */
    public function listByAutomationAccount(
        $resourceGroupName,
        $automationAccountName
    )
    {
        return $this->_ListByAutomationAccount_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Delete_operation;
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
    private $_ListByAutomationAccount_operation;
}
