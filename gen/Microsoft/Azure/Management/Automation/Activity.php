<?php
namespace Microsoft\Azure\Management\Automation;
final class Activity
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Get_operation = $_client->createOperation('Activity_Get');
        $this->_ListByModule_operation = $_client->createOperation('Activity_ListByModule');
    }
    /**
     * Retrieve the activity in the module identified by module name and activity name.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param string $moduleName
     * @param string $activityName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $automationAccountName,
        $moduleName,
        $activityName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            'moduleName' => $moduleName,
            'activityName' => $activityName
        ]);
    }
    /**
     * Retrieve a list of activities in the module identified by module name.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param string $moduleName
     * @return array
     */
    public function listByModule(
        $resourceGroupName,
        $automationAccountName,
        $moduleName
    )
    {
        return $this->_ListByModule_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            'moduleName' => $moduleName
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByModule_operation;
}
