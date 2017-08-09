<?php
namespace Microsoft\Azure\Management\StorSimple8000Series;
final class HardwareComponentGroups
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListByDevice_operation = $_client->createOperation('HardwareComponentGroups_ListByDevice');
        $this->_ChangeControllerPowerState_operation = $_client->createOperation('HardwareComponentGroups_ChangeControllerPowerState');
    }
    /**
     * Lists the hardware component groups at device-level.
     * @param string $deviceName
     * @param string $resourceGroupName
     * @param string $managerName
     * @return array
     */
    public function listByDevice(
        $deviceName,
        $resourceGroupName,
        $managerName
    )
    {
        return $this->_ListByDevice_operation->call([
            'deviceName' => $deviceName,
            'resourceGroupName' => $resourceGroupName,
            'managerName' => $managerName
        ]);
    }
    /**
     * Changes the power state of the controller.
     * @param string $deviceName
     * @param string $hardwareComponentGroupName
     * @param array $parameters
     * @param string $resourceGroupName
     * @param string $managerName
     */
    public function changeControllerPowerState(
        $deviceName,
        $hardwareComponentGroupName,
        array $parameters,
        $resourceGroupName,
        $managerName
    )
    {
        return $this->_ChangeControllerPowerState_operation->call([
            'deviceName' => $deviceName,
            'hardwareComponentGroupName' => $hardwareComponentGroupName,
            'parameters' => $parameters,
            'resourceGroupName' => $resourceGroupName,
            'managerName' => $managerName
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByDevice_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ChangeControllerPowerState_operation;
}
