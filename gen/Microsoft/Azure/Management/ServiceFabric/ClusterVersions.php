<?php
namespace Microsoft\Azure\Management\ServiceFabric;
final class ClusterVersions
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_List_operation = $_client->createOperation('ClusterVersions_List');
        $this->_ListByEnvironment_operation = $_client->createOperation('ClusterVersions_ListByEnvironment');
        $this->_Get_operation = $_client->createOperation('ClusterVersions_Get');
        $this->_ListByVersion_operation = $_client->createOperation('ClusterVersions_ListByVersion');
    }
    /**
     * List cluster code versions by location
     * @param string $location
     * @return array
     */
    public function list_($location)
    {
        return $this->_List_operation->call(['location' => $location]);
    }
    /**
     * List cluster code versions by environment
     * @param string $location
     * @param string $environment
     * @return array
     */
    public function listByEnvironment(
        $location,
        $environment
    )
    {
        return $this->_ListByEnvironment_operation->call([
            'location' => $location,
            'environment' => $environment
        ]);
    }
    /**
     * Get cluster code versions by environment and version
     * @param string $location
     * @param string $environment
     * @param string $clusterVersion
     * @return array
     */
    public function get(
        $location,
        $environment,
        $clusterVersion
    )
    {
        return $this->_Get_operation->call([
            'location' => $location,
            'environment' => $environment,
            'clusterVersion' => $clusterVersion
        ]);
    }
    /**
     * List cluster code versions by version
     * @param string $location
     * @param string $clusterVersion
     * @return array
     */
    public function listByVersion(
        $location,
        $clusterVersion
    )
    {
        return $this->_ListByVersion_operation->call([
            'location' => $location,
            'clusterVersion' => $clusterVersion
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByEnvironment_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByVersion_operation;
}
