<?php
namespace Microsoft\Azure\Management\Automation\_2015_10_31;
final class AgentRegistrationInformation
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Get_operation = $_client->createOperation('AgentRegistrationInformation_Get');
        $this->_RegenerateKey_operation = $_client->createOperation('AgentRegistrationInformation_RegenerateKey');
    }
    /**
     * Retrieve the automation agent registration information.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $automationAccountName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName
        ]);
    }
    /**
     * Regenerate a primary or secondary agent registration key
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param array $parameters
     * @return array
     */
    public function regenerateKey(
        $resourceGroupName,
        $automationAccountName,
        array $parameters
    )
    {
        return $this->_RegenerateKey_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
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
    private $_RegenerateKey_operation;
}
