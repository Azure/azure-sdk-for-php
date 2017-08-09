<?php
namespace Microsoft\Azure\Management\TrafficManager;
final class Profiles
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_CheckTrafficManagerRelativeDnsNameAvailability_operation = $_client->createOperation('Profiles_CheckTrafficManagerRelativeDnsNameAvailability');
        $this->_ListByResourceGroup_operation = $_client->createOperation('Profiles_ListByResourceGroup');
        $this->_ListBySubscription_operation = $_client->createOperation('Profiles_ListBySubscription');
        $this->_Get_operation = $_client->createOperation('Profiles_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('Profiles_CreateOrUpdate');
        $this->_Delete_operation = $_client->createOperation('Profiles_Delete');
        $this->_Update_operation = $_client->createOperation('Profiles_Update');
    }
    /**
     * Checks the availability of a Traffic Manager Relative DNS name.
     * @param array $parameters
     * @return array
     */
    public function checkTrafficManagerRelativeDnsNameAvailability(array $parameters)
    {
        return $this->_CheckTrafficManagerRelativeDnsNameAvailability_operation->call(['parameters' => $parameters]);
    }
    /**
     * Lists all Traffic Manager profiles within a resource group.
     * @param string $resourceGroupName
     * @return array
     */
    public function listByResourceGroup($resourceGroupName)
    {
        return $this->_ListByResourceGroup_operation->call(['resourceGroupName' => $resourceGroupName]);
    }
    /**
     * Lists all Traffic Manager profiles within a subscription.
     * @return array
     */
    public function listBySubscription()
    {
        return $this->_ListBySubscription_operation->call([]);
    }
    /**
     * Gets a Traffic Manager profile.
     * @param string $resourceGroupName
     * @param string $profileName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $profileName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'profileName' => $profileName
        ]);
    }
    /**
     * Create or update a Traffic Manager profile.
     * @param string $resourceGroupName
     * @param string $profileName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $profileName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'profileName' => $profileName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Deletes a Traffic Manager profile.
     * @param string $resourceGroupName
     * @param string $profileName
     * @return array
     */
    public function delete(
        $resourceGroupName,
        $profileName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'profileName' => $profileName
        ]);
    }
    /**
     * Update a Traffic Manager profile.
     * @param string $resourceGroupName
     * @param string $profileName
     * @param array $parameters
     * @return array
     */
    public function update(
        $resourceGroupName,
        $profileName,
        array $parameters
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'profileName' => $profileName,
            'parameters' => $parameters
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CheckTrafficManagerRelativeDnsNameAvailability_operation;
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
    private $_Get_operation;
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
    private $_Update_operation;
}
