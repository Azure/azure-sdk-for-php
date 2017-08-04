<?php
namespace Microsoft\Azure\Management\CustomerInsights\_2017_04_26;
final class Roles
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListByHub_operation = $_client->createOperation('Roles_ListByHub');
    }
    /**
     * Gets all the roles for the hub.
     * @param string $resourceGroupName
     * @param string $hubName
     * @return array
     */
    public function listByHub(
        $resourceGroupName,
        $hubName
    )
    {
        return $this->_ListByHub_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'hubName' => $hubName
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByHub_operation;
}
