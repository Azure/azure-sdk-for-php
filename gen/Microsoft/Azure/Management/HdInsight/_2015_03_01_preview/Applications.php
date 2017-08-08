<?php
namespace Microsoft\Azure\Management\HdInsight\_2015_03_01_preview;
final class Applications
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_List_operation = $_client->createOperation('Applications_List');
        $this->_Get_operation = $_client->createOperation('Applications_Get');
        $this->_Create_operation = $_client->createOperation('Applications_Create');
        $this->_Delete_operation = $_client->createOperation('Applications_Delete');
    }
    /**
     * Lists all of the applications HDInsight cluster.
     * @param string $resourceGroupName
     * @param string $clusterName
     * @return array
     */
    public function list_(
        $resourceGroupName,
        $clusterName
    )
    {
        return $this->_List_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'clusterName' => $clusterName
        ]);
    }
    /**
     * Lists properties of the application.
     * @param string $resourceGroupName
     * @param string $clusterName
     * @param string $applicationName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $clusterName,
        $applicationName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'clusterName' => $clusterName,
            'applicationName' => $applicationName
        ]);
    }
    /**
     * The operation creates applications for the HDInsight cluster.
     * @param string $resourceGroupName
     * @param string $clusterName
     * @param array $parameters
     * @return array
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
     * Lists all of the applications HDInsight cluster.
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
    private $_List_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Create_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Delete_operation;
}
