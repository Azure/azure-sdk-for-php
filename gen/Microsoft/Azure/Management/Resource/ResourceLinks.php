<?php
namespace Microsoft\Azure\Management\Resource;
final class ResourceLinks
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Delete_operation = $_client->createOperation('ResourceLinks_Delete');
        $this->_CreateOrUpdate_operation = $_client->createOperation('ResourceLinks_CreateOrUpdate');
        $this->_Get_operation = $_client->createOperation('ResourceLinks_Get');
        $this->_ListAtSubscription_operation = $_client->createOperation('ResourceLinks_ListAtSubscription');
        $this->_ListAtSourceScope_operation = $_client->createOperation('ResourceLinks_ListAtSourceScope');
    }
    /**
     * Deletes a resource link with the specified ID.
     * @param string $linkId
     */
    public function delete($linkId)
    {
        return $this->_Delete_operation->call(['linkId' => $linkId]);
    }
    /**
     * Creates or updates a resource link between the specified resources.
     * @param string $linkId
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $linkId,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'linkId' => $linkId,
            'parameters' => $parameters
        ]);
    }
    /**
     * Gets a resource link with the specified ID.
     * @param string $linkId
     * @return array
     */
    public function get($linkId)
    {
        return $this->_Get_operation->call(['linkId' => $linkId]);
    }
    /**
     * Gets all the linked resources for the subscription.
     * @param string|null $_filter
     * @return array
     */
    public function listAtSubscription($_filter = null)
    {
        return $this->_ListAtSubscription_operation->call(['$filter' => $_filter]);
    }
    /**
     * Gets a list of resource links at and below the specified source scope.
     * @param string $scope
     * @param string|null $_filter
     * @return array
     */
    public function listAtSourceScope(
        $scope,
        $_filter = null
    )
    {
        return $this->_ListAtSourceScope_operation->call([
            'scope' => $scope,
            '$filter' => $_filter
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Delete_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateOrUpdate_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListAtSubscription_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListAtSourceScope_operation;
}
