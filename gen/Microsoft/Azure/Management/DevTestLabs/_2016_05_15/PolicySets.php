<?php
namespace Microsoft\Azure\Management\DevTestLabs\_2016_05_15;
final class PolicySets
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_EvaluatePolicies_operation = $_client->createOperation('PolicySets_EvaluatePolicies');
    }
    /**
     * Evaluates lab policy.
     * @param string $resourceGroupName
     * @param string $labName
     * @param string $name
     * @param array $evaluatePoliciesRequest
     * @return array
     */
    public function evaluatePolicies(
        $resourceGroupName,
        $labName,
        $name,
        array $evaluatePoliciesRequest
    )
    {
        return $this->_EvaluatePolicies_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'labName' => $labName,
            'name' => $name,
            'evaluatePoliciesRequest' => $evaluatePoliciesRequest
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_EvaluatePolicies_operation;
}
