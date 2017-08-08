<?php
namespace Microsoft\Azure\Management\HdInsight\_2015_03_01_preview;
final class Extension
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Create_operation = $_client->createOperation('Extension_Create');
        $this->_Get_operation = $_client->createOperation('Extension_Get');
        $this->_Delete_operation = $_client->createOperation('Extension_Delete');
    }
    /**
     * Create HDInsight cluster extension.
     * @param string $resourceGroupName
     * @param string $clusterName
     * @param array $parameters
     */
    public function create(
        $resourceGroupName,
        $clusterName,
        array $parameters
    )
    {
        return $this->_Create_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'clusterName' => $clusterName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Get extension properties for HDInsight cluster extension.
     * @param string $resourceGroupName
     * @param string $clusterName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $clusterName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'clusterName' => $clusterName
        ]);
    }
    /**
     * Delete extension for HDInsight cluster.
     * @param string $resourceGroupName
     * @param string $clusterName
     */
    public function delete(
        $resourceGroupName,
        $clusterName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'clusterName' => $clusterName
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Create_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Delete_operation;
}
