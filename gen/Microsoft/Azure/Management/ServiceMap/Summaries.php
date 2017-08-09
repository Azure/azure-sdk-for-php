<?php
namespace Microsoft\Azure\Management\ServiceMap;
final class Summaries
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_GetMachines_operation = $_client->createOperation('Summaries_GetMachines');
    }
    /**
     * Returns summary information about the machines in the workspace.
     * @param string $resourceGroupName
     * @param string $workspaceName
     * @param string $startTime
     * @param string $endTime
     * @return array
     */
    public function getMachines(
        $resourceGroupName,
        $workspaceName,
        $startTime,
        $endTime
    )
    {
        return $this->_GetMachines_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'workspaceName' => $workspaceName,
            'startTime' => $startTime,
            'endTime' => $endTime
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetMachines_operation;
}
