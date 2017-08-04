<?php
namespace Microsoft\Azure\Management\StorSimple8000Series\_2017_06_01;
final class AccessControlRecords
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListByManager_operation = $_client->createOperation('AccessControlRecords_ListByManager');
        $this->_Get_operation = $_client->createOperation('AccessControlRecords_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('AccessControlRecords_CreateOrUpdate');
        $this->_Delete_operation = $_client->createOperation('AccessControlRecords_Delete');
    }
    /**
     * Retrieves all the access control records in a manager.
     * @param string $resourceGroupName
     * @param string $managerName
     * @return array
     */
    public function listByManager(
        $resourceGroupName,
        $managerName
    )
    {
        return $this->_ListByManager_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'managerName' => $managerName
        ]);
    }
    /**
     * Returns the properties of the specified access control record name.
     * @param string $accessControlRecordName
     * @param string $resourceGroupName
     * @param string $managerName
     * @return array
     */
    public function get(
        $accessControlRecordName,
        $resourceGroupName,
        $managerName
    )
    {
        return $this->_Get_operation->call([
            'accessControlRecordName' => $accessControlRecordName,
            'resourceGroupName' => $resourceGroupName,
            'managerName' => $managerName
        ]);
    }
    /**
     * Creates or Updates an access control record.
     * @param string $accessControlRecordName
     * @param array $parameters
     * @param string $resourceGroupName
     * @param string $managerName
     * @return array
     */
    public function createOrUpdate(
        $accessControlRecordName,
        array $parameters,
        $resourceGroupName,
        $managerName
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'accessControlRecordName' => $accessControlRecordName,
            'parameters' => $parameters,
            'resourceGroupName' => $resourceGroupName,
            'managerName' => $managerName
        ]);
    }
    /**
     * Deletes the access control record.
     * @param string $accessControlRecordName
     * @param string $resourceGroupName
     * @param string $managerName
     */
    public function delete(
        $accessControlRecordName,
        $resourceGroupName,
        $managerName
    )
    {
        return $this->_Delete_operation->call([
            'accessControlRecordName' => $accessControlRecordName,
            'resourceGroupName' => $resourceGroupName,
            'managerName' => $managerName
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByManager_operation;
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
