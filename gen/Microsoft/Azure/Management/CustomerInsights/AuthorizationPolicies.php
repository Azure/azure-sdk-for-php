<?php
namespace Microsoft\Azure\Management\CustomerInsights;
final class AuthorizationPolicies
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_CreateOrUpdate_operation = $_client->createOperation('AuthorizationPolicies_CreateOrUpdate');
        $this->_Get_operation = $_client->createOperation('AuthorizationPolicies_Get');
        $this->_ListByHub_operation = $_client->createOperation('AuthorizationPolicies_ListByHub');
        $this->_RegeneratePrimaryKey_operation = $_client->createOperation('AuthorizationPolicies_RegeneratePrimaryKey');
        $this->_RegenerateSecondaryKey_operation = $_client->createOperation('AuthorizationPolicies_RegenerateSecondaryKey');
    }
    /**
     * Creates an authorization policy or updates an existing authorization policy.
     * @param string $resourceGroupName
     * @param string $hubName
     * @param string $authorizationPolicyName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $hubName,
        $authorizationPolicyName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'hubName' => $hubName,
            'authorizationPolicyName' => $authorizationPolicyName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Gets an authorization policy in the hub.
     * @param string $resourceGroupName
     * @param string $hubName
     * @param string $authorizationPolicyName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $hubName,
        $authorizationPolicyName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'hubName' => $hubName,
            'authorizationPolicyName' => $authorizationPolicyName
        ]);
    }
    /**
     * Gets all the authorization policies in a specified hub.
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
     * Regenerates the primary policy key of the specified authorization policy.
     * @param string $resourceGroupName
     * @param string $hubName
     * @param string $authorizationPolicyName
     * @return array
     */
    public function regeneratePrimaryKey(
        $resourceGroupName,
        $hubName,
        $authorizationPolicyName
    )
    {
        return $this->_RegeneratePrimaryKey_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'hubName' => $hubName,
            'authorizationPolicyName' => $authorizationPolicyName
        ]);
    }
    /**
     * Regenerates the secondary policy key of the specified authorization policy.
     * @param string $resourceGroupName
     * @param string $hubName
     * @param string $authorizationPolicyName
     * @return array
     */
    public function regenerateSecondaryKey(
        $resourceGroupName,
        $hubName,
        $authorizationPolicyName
    )
    {
        return $this->_RegenerateSecondaryKey_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'hubName' => $hubName,
            'authorizationPolicyName' => $authorizationPolicyName
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
    private $_ListByHub_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_RegeneratePrimaryKey_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_RegenerateSecondaryKey_operation;
}
