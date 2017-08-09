<?php
namespace Microsoft\Azure\Management\CustomerInsights;
final class Profiles
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_CreateOrUpdate_operation = $_client->createOperation('Profiles_CreateOrUpdate');
        $this->_Get_operation = $_client->createOperation('Profiles_Get');
        $this->_Delete_operation = $_client->createOperation('Profiles_Delete');
        $this->_ListByHub_operation = $_client->createOperation('Profiles_ListByHub');
        $this->_GetEnrichingKpis_operation = $_client->createOperation('Profiles_GetEnrichingKpis');
    }
    /**
     * Creates a profile within a Hub, or updates an existing profile.
     * @param string $resourceGroupName
     * @param string $hubName
     * @param string $profileName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $hubName,
        $profileName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'hubName' => $hubName,
            'profileName' => $profileName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Gets information about the specified profile.
     * @param string $resourceGroupName
     * @param string $hubName
     * @param string $profileName
     * @param string|null $locale_code
     * @return array
     */
    public function get(
        $resourceGroupName,
        $hubName,
        $profileName,
        $locale_code = null
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'hubName' => $hubName,
            'profileName' => $profileName,
            'locale-code' => $locale_code
        ]);
    }
    /**
     * Deletes a profile within a hub
     * @param string $resourceGroupName
     * @param string $hubName
     * @param string $profileName
     * @param string|null $locale_code
     */
    public function delete(
        $resourceGroupName,
        $hubName,
        $profileName,
        $locale_code = null
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'hubName' => $hubName,
            'profileName' => $profileName,
            'locale-code' => $locale_code
        ]);
    }
    /**
     * Gets all profile in the hub.
     * @param string $resourceGroupName
     * @param string $hubName
     * @param string|null $locale_code
     * @return array
     */
    public function listByHub(
        $resourceGroupName,
        $hubName,
        $locale_code = null
    )
    {
        return $this->_ListByHub_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'hubName' => $hubName,
            'locale-code' => $locale_code
        ]);
    }
    /**
     * Gets the KPIs that enrich the profile Type identified by the supplied name. Enrichment happens through participants of the Interaction on an Interaction KPI and through Relationships for Profile KPIs.
     * @param string $resourceGroupName
     * @param string $hubName
     * @param string $profileName
     * @return array[]
     */
    public function getEnrichingKpis(
        $resourceGroupName,
        $hubName,
        $profileName
    )
    {
        return $this->_GetEnrichingKpis_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'hubName' => $hubName,
            'profileName' => $profileName
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
    private $_ListByHub_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetEnrichingKpis_operation;
}
