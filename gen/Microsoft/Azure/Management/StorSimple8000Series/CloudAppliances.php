<?php
namespace Microsoft\Azure\Management\StorSimple8000Series;
final class CloudAppliances
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListSupportedConfigurations_operation = $_client->createOperation('CloudAppliances_ListSupportedConfigurations');
        $this->_Provision_operation = $_client->createOperation('CloudAppliances_Provision');
    }
    /**
     * Lists supported cloud appliance models and supported configurations.
     * @param string $resourceGroupName
     * @param string $managerName
     * @return array
     */
    public function listSupportedConfigurations(
        $resourceGroupName,
        $managerName
    )
    {
        return $this->_ListSupportedConfigurations_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'managerName' => $managerName
        ]);
    }
    /**
     * Provisions cloud appliance.
     * @param array $parameters
     * @param string $resourceGroupName
     * @param string $managerName
     */
    public function provision(
        array $parameters,
        $resourceGroupName,
        $managerName
    )
    {
        return $this->_Provision_operation->call([
            'parameters' => $parameters,
            'resourceGroupName' => $resourceGroupName,
            'managerName' => $managerName
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListSupportedConfigurations_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Provision_operation;
}
