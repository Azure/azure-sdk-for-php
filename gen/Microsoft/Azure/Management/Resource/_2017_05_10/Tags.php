<?php
namespace Microsoft\Azure\Management\Resource\_2017_05_10;
final class Tags
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_DeleteValue_operation = $_client->createOperation('Tags_DeleteValue');
        $this->_CreateOrUpdateValue_operation = $_client->createOperation('Tags_CreateOrUpdateValue');
        $this->_CreateOrUpdate_operation = $_client->createOperation('Tags_CreateOrUpdate');
        $this->_Delete_operation = $_client->createOperation('Tags_Delete');
        $this->_List_operation = $_client->createOperation('Tags_List');
    }
    /**
     * Deletes a tag value.
     * @param string $tagName
     * @param string $tagValue
     */
    public function deleteValue(
        $tagName,
        $tagValue
    )
    {
        return $this->_DeleteValue_operation->call([
            'tagName' => $tagName,
            'tagValue' => $tagValue
        ]);
    }
    /**
     * Creates a tag value. The name of the tag must already exist.
     * @param string $tagName
     * @param string $tagValue
     * @return array
     */
    public function createOrUpdateValue(
        $tagName,
        $tagValue
    )
    {
        return $this->_CreateOrUpdateValue_operation->call([
            'tagName' => $tagName,
            'tagValue' => $tagValue
        ]);
    }
    /**
     * The tag name can have a maximum of 512 characters and is case insensitive. Tag names created by Azure have prefixes of microsoft, azure, or windows. You cannot create tags with one of these prefixes.
     * @param string $tagName
     * @return array
     */
    public function createOrUpdate($tagName)
    {
        return $this->_CreateOrUpdate_operation->call(['tagName' => $tagName]);
    }
    /**
     * You must remove all values from a resource tag before you can delete it.
     * @param string $tagName
     */
    public function delete($tagName)
    {
        return $this->_Delete_operation->call(['tagName' => $tagName]);
    }
    /**
     * Gets the names and values of all resource tags that are defined in a subscription.
     * @return array
     */
    public function list_()
    {
        return $this->_List_operation->call([]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_DeleteValue_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateOrUpdateValue_operation;
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
    private $_List_operation;
}
