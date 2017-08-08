<?php
namespace Microsoft\Azure\Management\HdInsight\_2015_03_01_preview;
final class Configurations
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_UpdateHTTPSettings_operation = $_client->createOperation('Configurations_UpdateHTTPSettings');
        $this->_Get_operation = $_client->createOperation('Configurations_Get');
    }
    /**
     * Begins configuring the HTTP settings on the specified cluster.
     * @param string $resourceGroupName
     * @param string $clusterName
     * @param array $parameters
     */
    public function updateHTTPSettings(
        $resourceGroupName,
        $clusterName,
        array $parameters
    )
    {
        return $this->_UpdateHTTPSettings_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'clusterName' => $clusterName,
            'parameters' => $parameters
        ]);
    }
    /**
     * The configuration object for the specified cluster.
     * @param string $resourceGroupName
     * @param string $clusterName
     * @param string $configurationName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $clusterName,
        $configurationName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'clusterName' => $clusterName,
            'configurationName' => $configurationName
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_UpdateHTTPSettings_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
}
