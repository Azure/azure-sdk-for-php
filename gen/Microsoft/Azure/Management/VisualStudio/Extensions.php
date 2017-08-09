<?php
namespace Microsoft\Azure\Management\VisualStudio;
final class Extensions
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListByAccount_operation = $_client->createOperation('Extensions_ListByAccount');
        $this->_Create_operation = $_client->createOperation('Extensions_Create');
        $this->_Delete_operation = $_client->createOperation('Extensions_Delete');
        $this->_Get_operation = $_client->createOperation('Extensions_Get');
        $this->_Update_operation = $_client->createOperation('Extensions_Update');
    }
    /**
     * Gets the details of the extension resources created within the resource group.
     * @param string $resourceGroupName
     * @param string $accountResourceName
     * @return array
     */
    public function listByAccount(
        $resourceGroupName,
        $accountResourceName
    )
    {
        return $this->_ListByAccount_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'accountResourceName' => $accountResourceName
        ]);
    }
    /**
     * Registers the extension with a Visual Studio Team Services account.
     * @param string $resourceGroupName
     * @param array $body
     * @param string $accountResourceName
     * @param string $extensionResourceName
     * @return array
     */
    public function create(
        $resourceGroupName,
        array $body,
        $accountResourceName,
        $extensionResourceName
    )
    {
        return $this->_Create_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'body' => $body,
            'accountResourceName' => $accountResourceName,
            'extensionResourceName' => $extensionResourceName
        ]);
    }
    /**
     * Removes an extension resource registration for a Visual Studio Team Services account.
     * @param string $resourceGroupName
     * @param string $accountResourceName
     * @param string $extensionResourceName
     */
    public function delete(
        $resourceGroupName,
        $accountResourceName,
        $extensionResourceName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'accountResourceName' => $accountResourceName,
            'extensionResourceName' => $extensionResourceName
        ]);
    }
    /**
     * Gets the details of an extension associated with a Visual Studio Team Services account resource.
     * @param string $resourceGroupName
     * @param string $accountResourceName
     * @param string $extensionResourceName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $accountResourceName,
        $extensionResourceName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'accountResourceName' => $accountResourceName,
            'extensionResourceName' => $extensionResourceName
        ]);
    }
    /**
     * Updates an existing extension registration for the Visual Studio Team Services account.
     * @param string $resourceGroupName
     * @param array $body
     * @param string $accountResourceName
     * @param string $extensionResourceName
     * @return array
     */
    public function update(
        $resourceGroupName,
        array $body,
        $accountResourceName,
        $extensionResourceName
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'body' => $body,
            'accountResourceName' => $accountResourceName,
            'extensionResourceName' => $extensionResourceName
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByAccount_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Create_operation;
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
    private $_Update_operation;
}
