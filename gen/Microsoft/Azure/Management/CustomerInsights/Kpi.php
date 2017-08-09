<?php
namespace Microsoft\Azure\Management\CustomerInsights;
final class Kpi
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_CreateOrUpdate_operation = $_client->createOperation('Kpi_CreateOrUpdate');
        $this->_Get_operation = $_client->createOperation('Kpi_Get');
        $this->_Delete_operation = $_client->createOperation('Kpi_Delete');
        $this->_Reprocess_operation = $_client->createOperation('Kpi_Reprocess');
        $this->_ListByHub_operation = $_client->createOperation('Kpi_ListByHub');
    }
    /**
     * Creates a KPI or updates an existing KPI in the hub.
     * @param string $resourceGroupName
     * @param string $hubName
     * @param string $kpiName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $hubName,
        $kpiName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'hubName' => $hubName,
            'kpiName' => $kpiName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Gets a KPI in the hub.
     * @param string $resourceGroupName
     * @param string $hubName
     * @param string $kpiName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $hubName,
        $kpiName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'hubName' => $hubName,
            'kpiName' => $kpiName
        ]);
    }
    /**
     * Deletes a KPI in the hub.
     * @param string $resourceGroupName
     * @param string $hubName
     * @param string $kpiName
     */
    public function delete(
        $resourceGroupName,
        $hubName,
        $kpiName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'hubName' => $hubName,
            'kpiName' => $kpiName
        ]);
    }
    /**
     * Reprocesses the Kpi values of the specified KPI.
     * @param string $resourceGroupName
     * @param string $hubName
     * @param string $kpiName
     */
    public function reprocess(
        $resourceGroupName,
        $hubName,
        $kpiName
    )
    {
        return $this->_Reprocess_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'hubName' => $hubName,
            'kpiName' => $kpiName
        ]);
    }
    /**
     * Gets all the KPIs in the specified hub.
     * @param string $resourceGroupName
     * @param string $hubName
     * @return array
     */
    public function listByHub(
        $resourceGroupName,
        $hubName
    )
    {
        return $this->_ListByHub_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'hubName' => $hubName
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateOrUpdate_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Delete_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Reprocess_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByHub_operation;
}
