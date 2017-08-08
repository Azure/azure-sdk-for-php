<?php
namespace Microsoft\Azure\Management\Automation\_2015_10_31;
final class Credential
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Delete_operation = $_client->createOperation('Credential_Delete');
        $this->_Get_operation = $_client->createOperation('Credential_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('Credential_CreateOrUpdate');
        $this->_Update_operation = $_client->createOperation('Credential_Update');
        $this->_ListByAutomationAccount_operation = $_client->createOperation('Credential_ListByAutomationAccount');
    }
    /**
     * Delete the credential.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param string $credentialName
     */
    public function delete(
        $resourceGroupName,
        $automationAccountName,
        $credentialName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            'credentialName' => $credentialName
        ]);
    }
    /**
     * Retrieve the credential identified by credential name.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param string $credentialName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $automationAccountName,
        $credentialName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            'credentialName' => $credentialName
        ]);
    }
    /**
     * Create a credential.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param string $credentialName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $automationAccountName,
        $credentialName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            'credentialName' => $credentialName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Update a credential.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param string $credentialName
     * @param array $parameters
     * @return array
     */
    public function update(
        $resourceGroupName,
        $automationAccountName,
        $credentialName,
        array $parameters
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            'credentialName' => $credentialName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Retrieve a list of credentials.
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
