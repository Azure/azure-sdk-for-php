<?php
namespace Microsoft\Azure\Management\CognitiveServices\_2017_04_18;
final class CognitiveServicesAccounts
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Create_operation = $_client->createOperation('CognitiveServicesAccounts_Create');
        $this->_Update_operation = $_client->createOperation('CognitiveServicesAccounts_Update');
        $this->_Delete_operation = $_client->createOperation('CognitiveServicesAccounts_Delete');
        $this->_GetProperties_operation = $_client->createOperation('CognitiveServicesAccounts_GetProperties');
        $this->_ListKeys_operation = $_client->createOperation('CognitiveServicesAccounts_ListKeys');
        $this->_RegenerateKey_operation = $_client->createOperation('CognitiveServicesAccounts_RegenerateKey');
        $this->_ListSkus_operation = $_client->createOperation('CognitiveServicesAccounts_ListSkus');
    }
    /**
     * Create Cognitive Services Account. Accounts is a resource group wide resource type. It holds the keys for developer to access intelligent APIs. It's also the resource type for billing.
     * @param string $resourceGroupName
     * @param string $accountName
     * @param array $parameters
     * @return array
     */
    public function create(
        $resourceGroupName,
        $accountName,
        array $parameters
    )
    {
        return $this->_Create_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'accountName' => $accountName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Updates a Cognitive Services account
     * @param string $resourceGroupName
     * @param string $accountName
     * @param array $parameters
     * @return array
     */
    public function update(
        $resourceGroupName,
        $accountName,
        array $parameters
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'accountName' => $accountName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Deletes a Cognitive Services account from the resource group.
     * @param string $resourceGroupName
     * @param string $accountName
     */
    public function delete(
        $resourceGroupName,
        $accountName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'accountName' => $accountName
        ]);
    }
    /**
     * Returns a Cognitive Services account specified by the parameters.
     * @param string $resourceGroupName
     * @param string $accountName
     * @return array
     */
    public function getProperties(
        $resourceGroupName,
        $accountName
    )
    {
        return $this->_GetProperties_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'accountName' => $accountName
        ]);
    }
    /**
     * Lists the account keys for the specified Cognitive Services account.
     * @param string $resourceGroupName
     * @param string $accountName
     * @return array
     */
    public function listKeys(
        $resourceGroupName,
        $accountName
    )
    {
        return $this->_ListKeys_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'accountName' => $accountName
        ]);
    }
    /**
     * Regenerates the specified account key for the specified Cognitive Services account.
     * @param string $resourceGroupName
     * @param string $accountName
     * @param array $parameters
     * @return array
     */
    public function regenerateKey(
        $resourceGroupName,
        $accountName,
        array $parameters
    )
    {
        return $this->_RegenerateKey_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'accountName' => $accountName,
            'parameters' => $parameters
        ]);
    }
    /**
     * List available SKUs for the requested Cognitive Services account
     * @param string $resourceGroupName
     * @param string $accountName
     * @return array
     */
    public function listSkus(
        $resourceGroupName,
        $accountName
    )
    {
        return $this->_ListSkus_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'accountName' => $accountName
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Create_operation;
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
    private $_GetProperties_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListKeys_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_RegenerateKey_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListSkus_operation;
}
