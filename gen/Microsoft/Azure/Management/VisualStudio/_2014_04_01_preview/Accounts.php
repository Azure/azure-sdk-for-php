<?php
namespace Microsoft\Azure\Management\VisualStudio\_2014_04_01_preview;
final class Accounts
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_CheckNameAvailability_operation = $_client->createOperation('Accounts_CheckNameAvailability');
        $this->_ListByResourceGroup_operation = $_client->createOperation('Accounts_ListByResourceGroup');
        $this->_CreateOrUpdate_operation = $_client->createOperation('Accounts_CreateOrUpdate');
        $this->_Delete_operation = $_client->createOperation('Accounts_Delete');
        $this->_Get_operation = $_client->createOperation('Accounts_Get');
    }
    /**
     * Checks if the specified Visual Studio Team Services account name is available. Resource name can be either an account name or an account name and PUID.
     * @param array $body
     * @return array
     */
    public function checkNameAvailability(array $body)
    {
        return $this->_CheckNameAvailability_operation->call(['body' => $body]);
    }
    /**
     * Gets all Visual Studio Team Services account resources under the resource group linked to the specified Azure subscription.
     * @param string $resourceGroupName
     * @return array
     */
    public function listByResourceGroup($resourceGroupName)
    {
        return $this->_ListByResourceGroup_operation->call(['resourceGroupName' => $resourceGroupName]);
    }
    /**
     * Creates or updates a Visual Studio Team Services account resource.
     * @param string $resourceGroupName
     * @param array $body
     * @param string $resourceName
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        array $body,
        $resourceName
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'body' => $body,
            'resourceName' => $resourceName
        ]);
    }
    /**
     * Deletes a Visual Studio Team Services account resource.
     * @param string $resourceGroupName
     * @param string $resourceName
     */
    public function delete(
        $resourceGroupName,
        $resourceName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'resourceName' => $resourceName
        ]);
    }
    /**
     * Gets the Visual Studio Team Services account resource details.
     * @param string $resourceGroupName
     * @param string $resourceName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $resourceName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'resourceName' => $resourceName
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CheckNameAvailability_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByResourceGroup_operation;
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
    private $_Get_operation;
}
