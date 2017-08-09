<?php
namespace Microsoft\Azure\Management\Compute;
final class Images
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_CreateOrUpdate_operation = $_client->createOperation('Images_CreateOrUpdate');
        $this->_Delete_operation = $_client->createOperation('Images_Delete');
        $this->_Get_operation = $_client->createOperation('Images_Get');
        $this->_ListByResourceGroup_operation = $_client->createOperation('Images_ListByResourceGroup');
        $this->_List_operation = $_client->createOperation('Images_List');
    }
    /**
     * Create or update an image.
     * @param string $resourceGroupName
     * @param string $imageName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $imageName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'imageName' => $imageName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Deletes an Image.
     * @param string $resourceGroupName
     * @param string $imageName
     * @return array
     */
    public function delete(
        $resourceGroupName,
        $imageName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'imageName' => $imageName
        ]);
    }
    /**
     * Gets an image.
     * @param string $resourceGroupName
     * @param string $imageName
     * @param string $_expand
     * @return array
     */
    public function get(
        $resourceGroupName,
        $imageName,
        $_expand
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'imageName' => $imageName,
            '$expand' => $_expand
        ]);
    }
    /**
     * Gets the list of images under a resource group.
     * @param string $resourceGroupName
     * @return array
     */
    public function listByResourceGroup($resourceGroupName)
    {
        return $this->_ListByResourceGroup_operation->call(['resourceGroupName' => $resourceGroupName]);
    }
    /**
     * Gets the list of Images in the subscription. Use nextLink property in the response to get the next page of Images. Do this till nextLink is not null to fetch all the Images.
     * @return array
     */
    public function list_()
    {
        return $this->_List_operation->call([]);
    }
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
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByResourceGroup_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
}
