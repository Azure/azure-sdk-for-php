<?php
namespace Microsoft\Azure\Management\ResourceHealth;
final class AvailabilityStatuses
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListBySubscriptionId_operation = $_client->createOperation('AvailabilityStatuses_ListBySubscriptionId');
        $this->_ListByResourceGroup_operation = $_client->createOperation('AvailabilityStatuses_ListByResourceGroup');
        $this->_GetByResource_operation = $_client->createOperation('AvailabilityStatuses_GetByResource');
        $this->_List_operation = $_client->createOperation('AvailabilityStatuses_List');
    }
    /**
     * Lists the current availability status for all the resources in the subscription. Use the nextLink property in the response to get the next page of availability statuses.
     * @param string|null $_filter
     * @param string|null $_expand
     * @return array
     */
    public function listBySubscriptionId(
        $_filter = null,
        $_expand = null
    )
    {
        return $this->_ListBySubscriptionId_operation->call([
            '$filter' => $_filter,
            '$expand' => $_expand
        ]);
    }
    /**
     * Lists the current availability status for all the resources in the resource group. Use the nextLink property in the response to get the next page of availability statuses.
     * @param string $resourceGroupName
     * @param string|null $_filter
     * @param string|null $_expand
     * @return array
     */
    public function listByResourceGroup(
        $resourceGroupName,
        $_filter = null,
        $_expand = null
    )
    {
        return $this->_ListByResourceGroup_operation->call([
            'resourceGroupName' => $resourceGroupName,
            '$filter' => $_filter,
            '$expand' => $_expand
        ]);
    }
    /**
     * Gets current availability status for a single resource
     * @param string $resourceUri
     * @param string|null $_filter
     * @param string|null $_expand
     * @return array
     */
    public function getByResource(
        $resourceUri,
        $_filter = null,
        $_expand = null
    )
    {
        return $this->_GetByResource_operation->call([
            'resourceUri' => $resourceUri,
            '$filter' => $_filter,
            '$expand' => $_expand
        ]);
    }
    /**
     * Lists all historical availability transitions and impacting events for a single resource. Use the nextLink property in the response to get the next page of availability status
     * @param string $resourceUri
     * @param string|null $_filter
     * @param string|null $_expand
     * @return array
     */
    public function list_(
        $resourceUri,
        $_filter = null,
        $_expand = null
    )
    {
        return $this->_List_operation->call([
            'resourceUri' => $resourceUri,
            '$filter' => $_filter,
            '$expand' => $_expand
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListBySubscriptionId_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByResourceGroup_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetByResource_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
}
