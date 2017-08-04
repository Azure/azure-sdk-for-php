<?php
namespace Microsoft\Azure\Management\Cdn\_2016_10_02;
final class Profiles
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_List_operation = $_client->createOperation('Profiles_List');
        $this->_ListByResourceGroup_operation = $_client->createOperation('Profiles_ListByResourceGroup');
        $this->_Get_operation = $_client->createOperation('Profiles_Get');
        $this->_Create_operation = $_client->createOperation('Profiles_Create');
        $this->_Update_operation = $_client->createOperation('Profiles_Update');
        $this->_Delete_operation = $_client->createOperation('Profiles_Delete');
        $this->_GenerateSsoUri_operation = $_client->createOperation('Profiles_GenerateSsoUri');
        $this->_ListResourceUsage_operation = $_client->createOperation('Profiles_ListResourceUsage');
    }
    /**
     * Lists all of the CDN profiles within an Azure subscription.
     * @return array
     */
    public function list_()
    {
        return $this->_List_operation->call([]);
    }
    /**
     * Lists all of the CDN profiles within a resource group.
     * @param string $resourceGroupName
     * @return array
     */
    public function listByResourceGroup($resourceGroupName)
    {
        return $this->_ListByResourceGroup_operation->call(['resourceGroupName' => $resourceGroupName]);
    }
    /**
     * Gets a CDN profile with the specified profile name under the specified subscription and resource group.
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
     * Creates a new CDN profile with a profile name under the specified subscription and resource group.
     * @param string $resourceGroupName
     * @param string $profileName
     * @param array $profile
     * @return array
     */
    public function create(
        $resourceGroupName,
        $profileName,
        array $profile
    )
    {
        return $this->_Create_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'profileName' => $profileName,
            'profile' => $profile
        ]);
    }
    /**
     * Updates an existing CDN profile with the specified profile name under the specified subscription and resource group.
     * @param string $resourceGroupName
     * @param string $profileName
     * @param array $profileUpdateParameters
     * @return array
     */
    public function update(
        $resourceGroupName,
        $profileName,
        array $profileUpdateParameters
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'profileName' => $profileName,
            'profileUpdateParameters' => $profileUpdateParameters
        ]);
    }
    /**
     * Deletes an existing CDN profile with the specified parameters. Deleting a profile will result in the deletion of all of the sub-resources including endpoints, origins and custom domains.
     * @param string $resourceGroupName
     * @param string $profileName
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
     * Generates a dynamic SSO URI used to sign in to the CDN supplemental portal. Supplemnetal portal is used to configure advanced feature capabilities that are not yet available in the Azure portal, such as core reports in a standard profile; rules engine, advanced HTTP reports, and real-time stats and alerts in a premium profile. The SSO URI changes approximately every 10 minutes.
     * @param string $resourceGroupName
     * @param string $profileName
     * @return array
     */
    public function generateSsoUri(
        $resourceGroupName,
        $profileName
    )
    {
        return $this->_GenerateSsoUri_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'profileName' => $profileName
        ]);
    }
    /**
     * Checks the quota and actual usage of endpoints under the given CDN profile.
     * @param string $resourceGroupName
     * @param string $profileName
     * @return array
     */
    public function listResourceUsage(
        $resourceGroupName,
        $profileName
    )
    {
        return $this->_ListResourceUsage_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'profileName' => $profileName
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByResourceGroup_operation;
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
    private $_Update_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Delete_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GenerateSsoUri_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListResourceUsage_operation;
}
