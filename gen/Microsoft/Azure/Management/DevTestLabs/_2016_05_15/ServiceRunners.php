<?php
namespace Microsoft\Azure\Management\DevTestLabs\_2016_05_15;
final class ServiceRunners
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_List_operation = $_client->createOperation('ServiceRunners_List');
        $this->_Get_operation = $_client->createOperation('ServiceRunners_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('ServiceRunners_CreateOrUpdate');
        $this->_Delete_operation = $_client->createOperation('ServiceRunners_Delete');
    }
    /**
     * List service runners in a given lab.
     * @param string $resourceGroupName
     * @param string $labName
     * @param string $_filter
     * @param integer $_top
     * @param string $_orderby
     * @return array
     */
    public function list_(
        $resourceGroupName,
        $labName,
        $_filter,
        $_top,
        $_orderby
    )
    {
        return $this->_List_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'labName' => $labName,
            '$filter' => $_filter,
            '$top' => $_top,
            '$orderby' => $_orderby
        ]);
    }
    /**
     * Get service runner.
     * @param string $resourceGroupName
     * @param string $labName
     * @param string $name
     * @return array
     */
    public function get(
        $resourceGroupName,
        $labName,
        $name
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'labName' => $labName,
            'name' => $name
        ]);
    }
    /**
     * Create or replace an existing Service runner.
     * @param string $resourceGroupName
     * @param string $labName
     * @param string $name
     * @param array $serviceRunner
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $labName,
        $name,
        array $serviceRunner
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'labName' => $labName,
            'name' => $name,
            'serviceRunner' => $serviceRunner
        ]);
    }
    /**
     * Delete service runner.
     * @param string $resourceGroupName
     * @param string $labName
     * @param string $name
     */
    public function delete(
        $resourceGroupName,
        $labName,
        $name
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'labName' => $labName,
            'name' => $name
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
    private $_CreateOrUpdate_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Delete_operation;
}
