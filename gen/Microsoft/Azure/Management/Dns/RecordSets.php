<?php
namespace Microsoft\Azure\Management\Dns;
final class RecordSets
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Update_operation = $_client->createOperation('RecordSets_Update');
        $this->_CreateOrUpdate_operation = $_client->createOperation('RecordSets_CreateOrUpdate');
        $this->_Delete_operation = $_client->createOperation('RecordSets_Delete');
        $this->_Get_operation = $_client->createOperation('RecordSets_Get');
        $this->_ListByType_operation = $_client->createOperation('RecordSets_ListByType');
        $this->_ListByDnsZone_operation = $_client->createOperation('RecordSets_ListByDnsZone');
    }
    /**
     * Updates a record set within a DNS zone.
     * @param string $resourceGroupName
     * @param string $zoneName
     * @param string $relativeRecordSetName
     * @param string $recordType
     * @param array $parameters
     * @param string|null $if_Match
     * @return array
     */
    public function update(
        $resourceGroupName,
        $zoneName,
        $relativeRecordSetName,
        $recordType,
        array $parameters,
        $if_Match = null
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'zoneName' => $zoneName,
            'relativeRecordSetName' => $relativeRecordSetName,
            'recordType' => $recordType,
            'parameters' => $parameters,
            'If-Match' => $if_Match
        ]);
    }
    /**
     * Creates or updates a record set within a DNS zone.
     * @param string $resourceGroupName
     * @param string $zoneName
     * @param string $relativeRecordSetName
     * @param string $recordType
     * @param array $parameters
     * @param string|null $if_Match
     * @param string|null $if_None_Match
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $zoneName,
        $relativeRecordSetName,
        $recordType,
        array $parameters,
        $if_Match = null,
        $if_None_Match = null
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'zoneName' => $zoneName,
            'relativeRecordSetName' => $relativeRecordSetName,
            'recordType' => $recordType,
            'parameters' => $parameters,
            'If-Match' => $if_Match,
            'If-None-Match' => $if_None_Match
        ]);
    }
    /**
     * Deletes a record set from a DNS zone. This operation cannot be undone.
     * @param string $resourceGroupName
     * @param string $zoneName
     * @param string $relativeRecordSetName
     * @param string $recordType
     * @param string|null $if_Match
     */
    public function delete(
        $resourceGroupName,
        $zoneName,
        $relativeRecordSetName,
        $recordType,
        $if_Match = null
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'zoneName' => $zoneName,
            'relativeRecordSetName' => $relativeRecordSetName,
            'recordType' => $recordType,
            'If-Match' => $if_Match
        ]);
    }
    /**
     * Gets a record set.
     * @param string $resourceGroupName
     * @param string $zoneName
     * @param string $relativeRecordSetName
     * @param string $recordType
     * @return array
     */
    public function get(
        $resourceGroupName,
        $zoneName,
        $relativeRecordSetName,
        $recordType
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'zoneName' => $zoneName,
            'relativeRecordSetName' => $relativeRecordSetName,
            'recordType' => $recordType
        ]);
    }
    /**
     * Lists the record sets of a specified type in a DNS zone.
     * @param string $resourceGroupName
     * @param string $zoneName
     * @param string $recordType
     * @param integer|null $_top
     * @param string|null $_recordsetnamesuffix
     * @return array
     */
    public function listByType(
        $resourceGroupName,
        $zoneName,
        $recordType,
        $_top = null,
        $_recordsetnamesuffix = null
    )
    {
        return $this->_ListByType_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'zoneName' => $zoneName,
            'recordType' => $recordType,
            '$top' => $_top,
            '$recordsetnamesuffix' => $_recordsetnamesuffix
        ]);
    }
    /**
     * Lists all record sets in a DNS zone.
     * @param string $resourceGroupName
     * @param string $zoneName
     * @param integer|null $_top
     * @param string|null $_recordsetnamesuffix
     * @return array
     */
    public function listByDnsZone(
        $resourceGroupName,
        $zoneName,
        $_top = null,
        $_recordsetnamesuffix = null
    )
    {
        return $this->_ListByDnsZone_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'zoneName' => $zoneName,
            '$top' => $_top,
            '$recordsetnamesuffix' => $_recordsetnamesuffix
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Update_operation;
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
    private $_ListByType_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByDnsZone_operation;
}
