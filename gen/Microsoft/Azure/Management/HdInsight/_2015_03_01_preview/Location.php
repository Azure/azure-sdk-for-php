<?php
namespace Microsoft\Azure\Management\HdInsight\_2015_03_01_preview;
final class Location
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_GetCapabilities_operation = $_client->createOperation('Location_GetCapabilities');
    }
    /**
     * Gets the capabilities for the specified location.
     * @param string $location
     * @return array
     */
    public function getCapabilities($location)
    {
        return $this->_GetCapabilities_operation->call(['location' => $location]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetCapabilities_operation;
}
