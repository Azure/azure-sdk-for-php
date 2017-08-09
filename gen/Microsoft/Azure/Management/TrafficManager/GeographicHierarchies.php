<?php
namespace Microsoft\Azure\Management\TrafficManager;
final class GeographicHierarchies
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_GetDefault_operation = $_client->createOperation('GeographicHierarchies_GetDefault');
    }
    /**
     * Gets the default Geographic Hierarchy used by the Geographic traffic routing method.
     * @return array
     */
    public function getDefault()
    {
        return $this->_GetDefault_operation->call([]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetDefault_operation;
}
