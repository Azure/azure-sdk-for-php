<?php
namespace Microsoft\Azure\Management\ApiManagement;
final class QuotaByCounterKeys
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListByService_operation = $_client->createOperation('QuotaByCounterKeys_ListByService');
        $this->_Update_operation = $_client->createOperation('QuotaByCounterKeys_Update');
    }
    /**
     * Lists a collection of current quota counter periods associated with the counter-key configured in the policy on the specified service instance. The api does not support paging yet.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $quotaCounterKey
     * @return array
     */
    public function listByService(
        $resourceGroupName,
        $serviceName,
        $quotaCounterKey
    )
    {
        return $this->_ListByService_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'quotaCounterKey' => $quotaCounterKey
        ]);
    }
    /**
     * Updates all the quota counter values specified with the existing quota counter key to a value in the specified service instance. This should be used for reset of the quota counter values.
     * @param string $resourceGroupName
     * @param string $serviceName
     * @param string $quotaCounterKey
     * @param array $parameters
     */
    public function update(
        $resourceGroupName,
        $serviceName,
        $quotaCounterKey,
        array $parameters
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serviceName' => $serviceName,
            'quotaCounterKey' => $quotaCounterKey,
            'parameters' => $parameters
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByService_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Update_operation;
}
