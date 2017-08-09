<?php
namespace Microsoft\Azure\Management\ApiManagement;
final class QuotaByPeriodKeys
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Get_operation = $_client->createOperation('QuotaByPeriodKeys_Get');
        $this->_Update_operation = $_client->createOperation('QuotaByPeriodKeys_Update');
    }
    /**
     * Gets the value of the quota counter associated with the counter-key in the policy for the specific period in service instance.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $quotaCounterKey
     * @param string $quotaPeriodKey
     * @return array
     */
    public function get(
        $resourceGroupName,
        $serviceName,
        $quotaCounterKey,
        $quotaPeriodKey
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'quotaCounterKey' => $quotaCounterKey,
            'quotaPeriodKey' => $quotaPeriodKey
        ]);
    }
    /**
     * Updates an existing quota counter value in the specified service instance.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $quotaCounterKey
     * @param string $quotaPeriodKey
     * @param array $parameters
     */
    public function update(
        $resourceGroupName,
        $serviceName,
        $quotaCounterKey,
        $quotaPeriodKey,
        array $parameters
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'quotaCounterKey' => $quotaCounterKey,
            'quotaPeriodKey' => $quotaPeriodKey,
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
    private $_Update_operation;
}
