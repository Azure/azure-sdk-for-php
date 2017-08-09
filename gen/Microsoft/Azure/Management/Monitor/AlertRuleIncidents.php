<?php
namespace Microsoft\Azure\Management\Monitor;
final class AlertRuleIncidents
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Get_operation = $_client->createOperation('AlertRuleIncidents_Get');
        $this->_ListByAlertRule_operation = $_client->createOperation('AlertRuleIncidents_ListByAlertRule');
    }
    /**
     * Gets an incident associated to an alert rule
     * @param string $resourceGroupName
     * @param string $ruleName
     * @param string $incidentName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $ruleName,
        $incidentName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'ruleName' => $ruleName,
            'incidentName' => $incidentName
        ]);
    }
    /**
     * Gets a list of incidents associated to an alert rule
     * @param string $resourceGroupName
     * @param string $ruleName
     * @return array
     */
    public function listByAlertRule(
        $resourceGroupName,
        $ruleName
    )
    {
        return $this->_ListByAlertRule_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'ruleName' => $ruleName
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByAlertRule_operation;
}
