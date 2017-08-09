<?php
namespace Microsoft\Azure\Management\WebSites;
final class Domains
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_CheckAvailability_operation = $_client->createOperation('Domains_CheckAvailability');
        $this->_List_operation = $_client->createOperation('Domains_List');
        $this->_GetControlCenterSsoRequest_operation = $_client->createOperation('Domains_GetControlCenterSsoRequest');
        $this->_ListRecommendations_operation = $_client->createOperation('Domains_ListRecommendations');
        $this->_ListByResourceGroup_operation = $_client->createOperation('Domains_ListByResourceGroup');
        $this->_Get_operation = $_client->createOperation('Domains_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('Domains_CreateOrUpdate');
        $this->_Delete_operation = $_client->createOperation('Domains_Delete');
        $this->_ListOwnershipIdentifiers_operation = $_client->createOperation('Domains_ListOwnershipIdentifiers');
        $this->_GetOwnershipIdentifier_operation = $_client->createOperation('Domains_GetOwnershipIdentifier');
        $this->_CreateOrUpdateOwnershipIdentifier_operation = $_client->createOperation('Domains_CreateOrUpdateOwnershipIdentifier');
        $this->_DeleteOwnershipIdentifier_operation = $_client->createOperation('Domains_DeleteOwnershipIdentifier');
        $this->_UpdateOwnershipIdentifier_operation = $_client->createOperation('Domains_UpdateOwnershipIdentifier');
    }
    /**
     * Check if a domain is available for registration.
     * @param array $identifier
     * @return array
     */
    public function checkAvailability(array $identifier)
    {
        return $this->_CheckAvailability_operation->call(['identifier' => $identifier]);
    }
    /**
     * Get all domains in a subscription.
     * @return array
     */
    public function list_()
    {
        return $this->_List_operation->call([]);
    }
    /**
     * Generate a single sign-on request for the domain management portal.
     * @return array
     */
    public function getControlCenterSsoRequest()
    {
        return $this->_GetControlCenterSsoRequest_operation->call([]);
    }
    /**
     * Get domain name recommendations based on keywords.
     * @param array $parameters
     * @return array
     */
    public function listRecommendations(array $parameters)
    {
        return $this->_ListRecommendations_operation->call(['parameters' => $parameters]);
    }
    /**
     * Get all domains in a resource group.
     * @param string $resourceGroupName
     * @return array
     */
    public function listByResourceGroup($resourceGroupName)
    {
        return $this->_ListByResourceGroup_operation->call(['resourceGroupName' => $resourceGroupName]);
    }
    /**
     * Get a domain.
     * @param string $resourceGroupName
     * @param string $domainName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $domainName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'domainName' => $domainName
        ]);
    }
    /**
     * Creates or updates a domain.
     * @param string $resourceGroupName
     * @param string $domainName
     * @param array $domain
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $domainName,
        array $domain
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'domainName' => $domainName,
            'domain' => $domain
        ]);
    }
    /**
     * Delete a domain.
     * @param string $resourceGroupName
     * @param string $domainName
     * @param boolean|null $forceHardDeleteDomain
     */
    public function delete(
        $resourceGroupName,
        $domainName,
        $forceHardDeleteDomain = null
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'domainName' => $domainName,
            'forceHardDeleteDomain' => $forceHardDeleteDomain
        ]);
    }
    /**
     * Lists domain ownership identifiers.
     * @param string $resourceGroupName
     * @param string $domainName
     * @return array
     */
    public function listOwnershipIdentifiers(
        $resourceGroupName,
        $domainName
    )
    {
        return $this->_ListOwnershipIdentifiers_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'domainName' => $domainName
        ]);
    }
    /**
     * Get ownership identifier for domain
     * @param string $resourceGroupName
     * @param string $domainName
     * @param string $name
     * @return array
     */
    public function getOwnershipIdentifier(
        $resourceGroupName,
        $domainName,
        $name
    )
    {
        return $this->_GetOwnershipIdentifier_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'domainName' => $domainName,
            'name' => $name
        ]);
    }
    /**
     * Creates an ownership identifier for a domain or updates identifier details for an existing identifer
     * @param string $resourceGroupName
     * @param string $domainName
     * @param string $name
     * @param array $domainOwnershipIdentifier
     * @return array
     */
    public function createOrUpdateOwnershipIdentifier(
        $resourceGroupName,
        $domainName,
        $name,
        array $domainOwnershipIdentifier
    )
    {
        return $this->_CreateOrUpdateOwnershipIdentifier_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'domainName' => $domainName,
            'name' => $name,
            'domainOwnershipIdentifier' => $domainOwnershipIdentifier
        ]);
    }
    /**
     * Delete ownership identifier for domain
     * @param string $resourceGroupName
     * @param string $domainName
     * @param string $name
     */
    public function deleteOwnershipIdentifier(
        $resourceGroupName,
        $domainName,
        $name
    )
    {
        return $this->_DeleteOwnershipIdentifier_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'domainName' => $domainName,
            'name' => $name
        ]);
    }
    /**
     * Creates an ownership identifier for a domain or updates identifier details for an existing identifer
     * @param string $resourceGroupName
     * @param string $domainName
     * @param string $name
     * @param array $domainOwnershipIdentifier
     * @return array
     */
    public function updateOwnershipIdentifier(
        $resourceGroupName,
        $domainName,
        $name,
        array $domainOwnershipIdentifier
    )
    {
        return $this->_UpdateOwnershipIdentifier_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'domainName' => $domainName,
            'name' => $name,
            'domainOwnershipIdentifier' => $domainOwnershipIdentifier
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CheckAvailability_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetControlCenterSsoRequest_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListRecommendations_operation;
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
    private $_CreateOrUpdate_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Delete_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListOwnershipIdentifiers_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetOwnershipIdentifier_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateOrUpdateOwnershipIdentifier_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_DeleteOwnershipIdentifier_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_UpdateOwnershipIdentifier_operation;
}
