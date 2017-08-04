<?php
namespace Microsoft\Azure\Management\DataLake\Store\_2016_11_01;
final class TrustedIdProviders
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_CreateOrUpdate_operation = $_client->createOperation('TrustedIdProviders_CreateOrUpdate');
        $this->_Update_operation = $_client->createOperation('TrustedIdProviders_Update');
        $this->_Delete_operation = $_client->createOperation('TrustedIdProviders_Delete');
        $this->_Get_operation = $_client->createOperation('TrustedIdProviders_Get');
        $this->_ListByAccount_operation = $_client->createOperation('TrustedIdProviders_ListByAccount');
    }
    /**
     * Creates or updates the specified trusted identity provider. During update, the trusted identity provider with the specified name will be replaced with this new provider
     * @param string $resourceGroupName
     * @param string $accountName
     * @param string $trustedIdProviderName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $accountName,
        $trustedIdProviderName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'accountName' => $accountName,
            'trustedIdProviderName' => $trustedIdProviderName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Updates the specified trusted identity provider.
     * @param string $resourceGroupName
     * @param string $accountName
     * @param string $trustedIdProviderName
     * @param array $parameters
     * @return array
     */
    public function update(
        $resourceGroupName,
        $accountName,
        $trustedIdProviderName,
        array $parameters
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'accountName' => $accountName,
            'trustedIdProviderName' => $trustedIdProviderName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Deletes the specified trusted identity provider from the specified Data Lake Store account
     * @param string $resourceGroupName
     * @param string $accountName
     * @param string $trustedIdProviderName
     */
    public function delete(
        $resourceGroupName,
        $accountName,
        $trustedIdProviderName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'accountName' => $accountName,
            'trustedIdProviderName' => $trustedIdProviderName
        ]);
    }
    /**
     * Gets the specified Data Lake Store trusted identity provider.
     * @param string $resourceGroupName
     * @param string $accountName
     * @param string $trustedIdProviderName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $accountName,
        $trustedIdProviderName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'accountName' => $accountName,
            'trustedIdProviderName' => $trustedIdProviderName
        ]);
    }
    /**
     * Lists the Data Lake Store trusted identity providers within the specified Data Lake Store account.
     * @param string $resourceGroupName
     * @param string $accountName
     * @return array
     */
    public function listByAccount(
        $resourceGroupName,
        $accountName
    )
    {
        return $this->_ListByAccount_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'accountName' => $accountName
        ]);
    }
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
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByAccount_operation;
}
