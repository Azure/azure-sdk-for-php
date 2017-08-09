<?php
namespace Microsoft\Azure\Management\Batch;
final class Location
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_GetQuotas_operation = $_client->createOperation('Location_GetQuotas');
        $this->_CheckNameAvailability_operation = $_client->createOperation('Location_CheckNameAvailability');
    }
    /**
     * Gets the Batch service quotas for the specified subscription at the given location.
     * @param string $locationName
     * @return array
     */
    public function getQuotas($locationName)
    {
        return $this->_GetQuotas_operation->call(['locationName' => $locationName]);
    }
    /**
     * Checks whether the Batch account name is available in the specified region.
     * @param string $locationName
     * @param array $parameters
     * @return array
     */
    public function checkNameAvailability(
        $locationName,
        array $parameters
    )
    {
        return $this->_CheckNameAvailability_operation->call([
            'locationName' => $locationName,
            'parameters' => $parameters
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetQuotas_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CheckNameAvailability_operation;
}
