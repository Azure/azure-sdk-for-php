<?php
namespace Microsoft\Azure\Management\MobileEngagement;
final class Apps
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_List_operation = $_client->createOperation('Apps_List');
    }
    /**
     * Lists apps in an appCollection.
     * @param string $resourceGroupName
     * @param string $appCollection
     * @return array
     */
    public function list_(
        $resourceGroupName,
        $appCollection
    )
    {
        return $this->_List_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'appCollection' => $appCollection
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
}
