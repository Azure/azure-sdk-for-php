<?php
namespace Microsoft\Azure\Management\ApiManagement;
final class User
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListByService_operation = $_client->createOperation('User_ListByService');
        $this->_Get_operation = $_client->createOperation('User_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('User_CreateOrUpdate');
        $this->_Update_operation = $_client->createOperation('User_Update');
        $this->_Delete_operation = $_client->createOperation('User_Delete');
        $this->_GenerateSsoUrl_operation = $_client->createOperation('User_GenerateSsoUrl');
        $this->_GetSharedAccessToken_operation = $_client->createOperation('User_GetSharedAccessToken');
    }
    /**
     * Lists a collection of registered users in the specified service instance.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $_filter
     * @param integer $_top
     * @param integer $_skip
     * @return array
     */
    public function listByService(
        $resourceGroupName,
        $serviceName,
        $_filter,
        $_top,
        $_skip
    )
    {
        return $this->_ListByService_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            '$filter' => $_filter,
            '$top' => $_top,
            '$skip' => $_skip
        ]);
    }
    /**
     * Gets the details of the user specified by its identifier.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $uid
     * @return array
     */
    public function get(
        $resourceGroupName,
        $serviceName,
        $uid
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'uid' => $uid
        ]);
    }
    /**
     * Creates or Updates a user.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $uid
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $serviceName,
        $uid,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'uid' => $uid,
            'parameters' => $parameters
        ]);
    }
    /**
     * Updates the details of the user specified by its identifier.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $uid
     * @param array $parameters
     * @param string $if_Match
     * @return array
     */
    public function update(
        $resourceGroupName,
        $serviceName,
        $uid,
        array $parameters,
        $if_Match
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'uid' => $uid,
            'parameters' => $parameters,
            'If-Match' => $if_Match
        ]);
    }
    /**
     * Deletes specific user.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $uid
     * @param boolean $deleteSubscriptions
     * @param string $if_Match
     */
    public function delete(
        $resourceGroupName,
        $serviceName,
        $uid,
        $deleteSubscriptions,
        $if_Match
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'uid' => $uid,
            'deleteSubscriptions' => $deleteSubscriptions,
            'If-Match' => $if_Match
        ]);
    }
    /**
     * Retrieves a redirection URL containing an authentication token for signing a given user into the developer portal.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $uid
     * @return array
     */
    public function generateSsoUrl(
        $resourceGroupName,
        $serviceName,
        $uid
    )
    {
        return $this->_GenerateSsoUrl_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'uid' => $uid
        ]);
    }
    /**
     * Gets the Shared Access Authorization Token for the User.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $uid
     * @param array $parameters
     * @return array
     */
    public function getSharedAccessToken(
        $resourceGroupName,
        $serviceName,
        $uid,
        array $parameters
    )
    {
        return $this->_GetSharedAccessToken_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'uid' => $uid,
            'parameters' => $parameters
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByService_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
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
    private $_GenerateSsoUrl_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetSharedAccessToken_operation;
}
