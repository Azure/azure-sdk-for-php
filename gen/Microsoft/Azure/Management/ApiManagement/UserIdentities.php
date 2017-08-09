<?php
namespace Microsoft\Azure\Management\ApiManagement;
final class UserIdentities
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_List_operation = $_client->createOperation('UserIdentities_List');
    }
    /**
     * Lists all user identities.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $uid
     * @return array
     */
    public function list_(
        $resourceGroupName,
        $serviceName,
        $uid
    )
    {
        return $this->_List_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'uid' => $uid
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
}
