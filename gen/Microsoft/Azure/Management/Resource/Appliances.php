<?php
namespace Microsoft\Azure\Management\Resource;
final class Appliances
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Get_operation = $_client->createOperation('Appliances_Get');
        $this->_Delete_operation = $_client->createOperation('Appliances_Delete');
        $this->_CreateOrUpdate_operation = $_client->createOperation('Appliances_CreateOrUpdate');
        $this->_Update_operation = $_client->createOperation('Appliances_Update');
        $this->_ListByResourceGroup_operation = $_client->createOperation('Appliances_ListByResourceGroup');
        $this->_ListBySubscription_operation = $_client->createOperation('Appliances_ListBySubscription');
        $this->_GetById_operation = $_client->createOperation('Appliances_GetById');
        $this->_DeleteById_operation = $_client->createOperation('Appliances_DeleteById');
        $this->_CreateOrUpdateById_operation = $_client->createOperation('Appliances_CreateOrUpdateById');
        $this->_UpdateById_operation = $_client->createOperation('Appliances_UpdateById');
    }
    /**
     * Gets the appliance.
     * @param string $resourceGroupName
     * @param string $applianceName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $applianceName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'applianceName' => $applianceName
        ]);
    }
    /**
     * Deletes the appliance.
     * @param string $resourceGroupName
     * @param string $applianceName
     */
    public function delete(
        $resourceGroupName,
        $applianceName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'applianceName' => $applianceName
        ]);
    }
    /**
     * Creates a new appliance.
     * @param string $resourceGroupName
     * @param string $applianceName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $applianceName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'applianceName' => $applianceName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Updates an existing appliance. The only value that can be updated via PATCH currently is the tags.
     * @param string $resourceGroupName
     * @param string $applianceName
     * @param array|null $parameters
     * @return array
     */
    public function update(
        $resourceGroupName,
        $applianceName,
        array $parameters = null
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'applianceName' => $applianceName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Gets all the appliances within a resource group.
     * @param string $resourceGroupName
     * @return array
     */
    public function listByResourceGroup($resourceGroupName)
    {
        return $this->_ListByResourceGroup_operation->call(['resourceGroupName' => $resourceGroupName]);
    }
    /**
     * Gets all the appliances within a subscription.
     * @return array
     */
    public function listBySubscription()
    {
        return $this->_ListBySubscription_operation->call([]);
    }
    /**
     * Gets the appliance.
     * @param string $applianceId
     * @return array
     */
    public function getById($applianceId)
    {
        return $this->_GetById_operation->call(['applianceId' => $applianceId]);
    }
    /**
     * Deletes the appliance.
     * @param string $applianceId
     */
    public function deleteById($applianceId)
    {
        return $this->_DeleteById_operation->call(['applianceId' => $applianceId]);
    }
    /**
     * Creates a new appliance.
     * @param string $applianceId
     * @param array $parameters
     * @return array
     */
    public function createOrUpdateById(
        $applianceId,
        array $parameters
    )
    {
        return $this->_CreateOrUpdateById_operation->call([
            'applianceId' => $applianceId,
            'parameters' => $parameters
        ]);
    }
    /**
     * Updates an existing appliance. The only value that can be updated via PATCH currently is the tags.
     * @param string $applianceId
     * @param array|null $parameters
     * @return array
     */
    public function updateById(
        $applianceId,
        array $parameters = null
    )
    {
        return $this->_UpdateById_operation->call([
            'applianceId' => $applianceId,
            'parameters' => $parameters
        ]);
    }
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
    private $_CreateOrUpdate_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Update_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByResourceGroup_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListBySubscription_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetById_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_DeleteById_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateOrUpdateById_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_UpdateById_operation;
}
