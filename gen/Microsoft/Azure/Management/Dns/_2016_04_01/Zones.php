<?php
namespace Microsoft\Azure\Management\Dns\_2016_04_01;
final class Zones
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_CreateOrUpdate_operation = $_client->createOperation('Zones_CreateOrUpdate');
        $this->_Delete_operation = $_client->createOperation('Zones_Delete');
        $this->_Get_operation = $_client->createOperation('Zones_Get');
        $this->_ListByResourceGroup_operation = $_client->createOperation('Zones_ListByResourceGroup');
        $this->_List_operation = $_client->createOperation('Zones_List');
    }
    /**
     * Creates or updates a DNS zone. Does not modify DNS records within the zone.
     * @param string $resourceGroupName
     * @param string $zoneName
     * @param array $parameters
     * @param string $if_Match
     * @param string $if_None_Match
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $zoneName,
        array $parameters,
        $if_Match,
        $if_None_Match
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'zoneName' => $zoneName,
            'parameters' => $parameters,
            'If-Match' => $if_Match,
            'If-None-Match' => $if_None_Match
        ]);
    }
    /**
     * Deletes a DNS zone. WARNING: All DNS records in the zone will also be deleted. This operation cannot be undone.
     * @param string $resourceGroupName
     * @param string $zoneName
     * @param string $if_Match
     * @return array
     */
    public function delete(
        $resourceGroupName,
        $zoneName,
        $if_Match
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'zoneName' => $zoneName,
            'If-Match' => $if_Match
        ]);
    }
    /**
     * Gets a DNS zone. Retrieves the zone properties, but not the record sets within the zone.
     * @param string $resourceGroupName
     * @param string $zoneName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $zoneName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'zoneName' => $zoneName
        ]);
    }
    /**
     * Lists the DNS zones within a resource group.
     * @param string $resourceGroupName
     * @param integer $_top
     * @return array
     */
    public function listByResourceGroup(
        $resourceGroupName,
        $_top
    )
    {
        return $this->_ListByResourceGroup_operation->call([
            'resourceGroupName' => $resourceGroupName,
            '$top' => $_top
        ]);
    }
    /**
     * Lists the DNS zones in all resource groups in a subscription.
     * @param integer $_top
     * @return array
     */
    public function list_($_top)
    {
        return $this->_List_operation->call(['$top' => $_top]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateOrUpdate_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Delete_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByResourceGroup_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
}
