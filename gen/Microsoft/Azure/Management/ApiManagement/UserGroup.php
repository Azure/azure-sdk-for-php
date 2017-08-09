<?php
namespace Microsoft\Azure\Management\ApiManagement;
final class UserGroup
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_List_operation = $_client->createOperation('UserGroup_List');
    }
    /**
     * Lists all user groups.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $uid
     * @param string|null $_filter
     * @param integer|null $_top
     * @param integer|null $_skip
     * @return array
     */
    public function list_(
        $resourceGroupName,
        $serviceName,
        $uid,
        $_filter = null,
        $_top = null,
        $_skip = null
    )
    {
        return $this->_List_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'uid' => $uid,
            '$filter' => $_filter,
            '$top' => $_top,
            '$skip' => $_skip
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
}
