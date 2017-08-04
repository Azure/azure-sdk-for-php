<?php
namespace Microsoft\Azure\Management\StorSimple8000Series\_2017_06_01;
final class Alerts
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListByManager_operation = $_client->createOperation('Alerts_ListByManager');
        $this->_Clear_operation = $_client->createOperation('Alerts_Clear');
        $this->_SendTestEmail_operation = $_client->createOperation('Alerts_SendTestEmail');
    }
    /**
     * Retrieves all the alerts in a manager.
     * @param string $resourceGroupName
     * @param string $managerName
     * @param string $_filter
     * @return array
     */
    public function listByManager(
        $resourceGroupName,
        $managerName,
        $_filter
    )
    {
        return $this->_ListByManager_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'managerName' => $managerName,
            '$filter' => $_filter
        ]);
    }
    /**
     * Clear the alerts.
     * @param array $parameters
     * @param string $resourceGroupName
     * @param string $managerName
     */
    public function clear(
        array $parameters,
        $resourceGroupName,
        $managerName
    )
    {
        return $this->_Clear_operation->call([
            'parameters' => $parameters,
            'resourceGroupName' => $resourceGroupName,
            'managerName' => $managerName
        ]);
    }
    /**
     * Sends a test alert email.
     * @param string $deviceName
     * @param array $parameters
     * @param string $resourceGroupName
     * @param string $managerName
     */
    public function sendTestEmail(
        $deviceName,
        array $parameters,
        $resourceGroupName,
        $managerName
    )
    {
        return $this->_SendTestEmail_operation->call([
            'deviceName' => $deviceName,
            'parameters' => $parameters,
            'resourceGroupName' => $resourceGroupName,
            'managerName' => $managerName
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByManager_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Clear_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_SendTestEmail_operation;
}
