<?php
namespace Microsoft\Azure\Management\ApiManagement;
final class Subscription
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_List_operation = $_client->createOperation('Subscription_List');
        $this->_Get_operation = $_client->createOperation('Subscription_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('Subscription_CreateOrUpdate');
        $this->_Update_operation = $_client->createOperation('Subscription_Update');
        $this->_Delete_operation = $_client->createOperation('Subscription_Delete');
        $this->_RegeneratePrimaryKey_operation = $_client->createOperation('Subscription_RegeneratePrimaryKey');
        $this->_RegenerateSecondaryKey_operation = $_client->createOperation('Subscription_RegenerateSecondaryKey');
    }
    /**
     * Lists all subscriptions of the API Management service instance.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $_filter
     * @param integer $_top
     * @param integer $_skip
     * @return array
     */
    public function list_(
        $resourceGroupName,
        $serviceName,
        $_filter,
        $_top,
        $_skip
    )
    {
        return $this->_List_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            '$filter' => $_filter,
            '$top' => $_top,
            '$skip' => $_skip
        ]);
    }
    /**
     * Gets the specified Subscription entity.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $sid
     * @return array
     */
    public function get(
        $resourceGroupName,
        $serviceName,
        $sid
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'sid' => $sid
        ]);
    }
    /**
     * Creates or updates the subscription of specified user to the specified product.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $sid
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $serviceName,
        $sid,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'sid' => $sid,
            'parameters' => $parameters
        ]);
    }
    /**
     * Updates the details of a subscription specificied by its identifier.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $sid
     * @param array $parameters
     * @param string $if_Match
     */
    public function update(
        $resourceGroupName,
        $serviceName,
        $sid,
        array $parameters,
        $if_Match
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'sid' => $sid,
            'parameters' => $parameters,
            'If-Match' => $if_Match
        ]);
    }
    /**
     * Deletes the specified subscription.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $sid
     * @param string $if_Match
     */
    public function delete(
        $resourceGroupName,
        $serviceName,
        $sid,
        $if_Match
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'sid' => $sid,
            'If-Match' => $if_Match
        ]);
    }
    /**
     * Regenerates primary key of existing subscription of the API Management service instance.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $sid
     */
    public function regeneratePrimaryKey(
        $resourceGroupName,
        $serviceName,
        $sid
    )
    {
        return $this->_RegeneratePrimaryKey_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'sid' => $sid
        ]);
    }
    /**
     * Regenerates secondary key of existing subscription of the API Management service instance.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $sid
     */
    public function regenerateSecondaryKey(
        $resourceGroupName,
        $serviceName,
        $sid
    )
    {
        return $this->_RegenerateSecondaryKey_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'sid' => $sid
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
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
    private $_RegeneratePrimaryKey_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_RegenerateSecondaryKey_operation;
}
