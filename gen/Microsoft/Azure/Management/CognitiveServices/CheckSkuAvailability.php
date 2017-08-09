<?php
namespace Microsoft\Azure\Management\CognitiveServices;
final class CheckSkuAvailability
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_List_operation = $_client->createOperation('CheckSkuAvailability_List');
    }
    /**
     * Check available SKUs.
     * @param string $location
     * @param array $parameters
     * @return array
     */
    public function list_(
        $location,
        array $parameters
    )
    {
        return $this->_List_operation->call([
            'location' => $location,
            'parameters' => $parameters
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
}
