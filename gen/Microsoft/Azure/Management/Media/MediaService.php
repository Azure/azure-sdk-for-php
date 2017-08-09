<?php
namespace Microsoft\Azure\Management\Media;
final class MediaService
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_CheckNameAvailability_operation = $_client->createOperation('MediaService_CheckNameAvailability');
        $this->_ListByResourceGroup_operation = $_client->createOperation('MediaService_ListByResourceGroup');
        $this->_Get_operation = $_client->createOperation('MediaService_Get');
        $this->_Create_operation = $_client->createOperation('MediaService_Create');
        $this->_Delete_operation = $_client->createOperation('MediaService_Delete');
        $this->_Update_operation = $_client->createOperation('MediaService_Update');
        $this->_RegenerateKey_operation = $_client->createOperation('MediaService_RegenerateKey');
        $this->_ListKeys_operation = $_client->createOperation('MediaService_ListKeys');
        $this->_SyncStorageKeys_operation = $_client->createOperation('MediaService_SyncStorageKeys');
    }
    /**
     * Checks whether the Media Service resource name is available. The name must be globally unique.
     * @param array $checkNameAvailabilityInput
     * @return array
     */
    public function checkNameAvailability(array $checkNameAvailabilityInput)
    {
        return $this->_CheckNameAvailability_operation->call(['CheckNameAvailabilityInput' => $checkNameAvailabilityInput]);
    }
    /**
     * Lists all of the Media Services in a resource group.
     * @param string $resourceGroupName
     * @return array
     */
    public function listByResourceGroup($resourceGroupName)
    {
        return $this->_ListByResourceGroup_operation->call(['resourceGroupName' => $resourceGroupName]);
    }
    /**
     * Gets a Media Service.
     * @param string $resourceGroupName
     * @param string $mediaServiceName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $mediaServiceName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'mediaServiceName' => $mediaServiceName
        ]);
    }
    /**
     * Creates a Media Service.
     * @param string $resourceGroupName
     * @param string $mediaServiceName
     * @param array $mediaService
     * @return array
     */
    public function create(
        $resourceGroupName,
        $mediaServiceName,
        array $mediaService
    )
    {
        return $this->_Create_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'mediaServiceName' => $mediaServiceName,
            'MediaService' => $mediaService
        ]);
    }
    /**
     * Deletes a Media Service.
     * @param string $resourceGroupName
     * @param string $mediaServiceName
     */
    public function delete(
        $resourceGroupName,
        $mediaServiceName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'mediaServiceName' => $mediaServiceName
        ]);
    }
    /**
     * Updates a Media Service.
     * @param string $resourceGroupName
     * @param string $mediaServiceName
     * @param array $mediaService
     * @return array
     */
    public function update(
        $resourceGroupName,
        $mediaServiceName,
        array $mediaService
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'mediaServiceName' => $mediaServiceName,
            'MediaService' => $mediaService
        ]);
    }
    /**
     * Regenerates a primary or secondary key for a Media Service.
     * @param string $resourceGroupName
     * @param string $mediaServiceName
     * @param array $regenerateKeyInput
     * @return array
     */
    public function regenerateKey(
        $resourceGroupName,
        $mediaServiceName,
        array $regenerateKeyInput
    )
    {
        return $this->_RegenerateKey_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'mediaServiceName' => $mediaServiceName,
            'RegenerateKeyInput' => $regenerateKeyInput
        ]);
    }
    /**
     * Lists the keys for a Media Service.
     * @param string $resourceGroupName
     * @param string $mediaServiceName
     * @return array
     */
    public function listKeys(
        $resourceGroupName,
        $mediaServiceName
    )
    {
        return $this->_ListKeys_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'mediaServiceName' => $mediaServiceName
        ]);
    }
    /**
     * Synchronizes storage account keys for a storage account associated with the Media Service account.
     * @param string $resourceGroupName
     * @param string $mediaServiceName
     * @param array $syncStorageKeysInput
     */
    public function syncStorageKeys(
        $resourceGroupName,
        $mediaServiceName,
        array $syncStorageKeysInput
    )
    {
        return $this->_SyncStorageKeys_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'mediaServiceName' => $mediaServiceName,
            'SyncStorageKeysInput' => $syncStorageKeysInput
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
    private $_Get_operation;
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
    private $_Update_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_RegenerateKey_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListKeys_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_SyncStorageKeys_operation;
}
