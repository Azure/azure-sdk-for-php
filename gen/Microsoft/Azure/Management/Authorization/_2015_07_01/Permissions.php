<?php
namespace Microsoft\Azure\Management\Authorization\_2015_07_01;
final class Permissions
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListForResourceGroup_operation = $_client->createOperation('Permissions_ListForResourceGroup');
        $this->_ListForResource_operation = $_client->createOperation('Permissions_ListForResource');
    }
    /**
     * Gets all permissions the caller has for a resource group.
     * @param string $resourceGroupName
     * @return array
     */
    public function listForResourceGroup($resourceGroupName)
    {
        return $this->_ListForResourceGroup_operation->call(['resourceGroupName' => $resourceGroupName]);
    }
    /**
     * Gets all permissions the caller has for a resource.
     * @param string $resourceGroupName
     * @param string $resourceProviderNamespace
     * @param string $parentResourcePath
     * @param string $resourceType
     * @param string $resourceName
     * @return array
     */
    public function listForResource(
        $resourceGroupName,
        $resourceProviderNamespace,
        $parentResourcePath,
        $resourceType,
        $resourceName
    )
    {
        return $this->_ListForResource_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'resourceProviderNamespace' => $resourceProviderNamespace,
            'parentResourcePath' => $parentResourcePath,
            'resourceType' => $resourceType,
            'resourceName' => $resourceName
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListForResourceGroup_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListForResource_operation;
}
