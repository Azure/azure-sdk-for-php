<?php
namespace Microsoft\Azure\Management\Sql;
final class Capabilities
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListByLocation_operation = $_client->createOperation('Capabilities_ListByLocation');
    }
    /**
     * Gets the capabilities available for the specified location.
     * @param string $locationId
     * @return array
     */
    public function listByLocation($locationId)
    {
        return $this->_ListByLocation_operation->call(['locationId' => $locationId]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByLocation_operation;
}
