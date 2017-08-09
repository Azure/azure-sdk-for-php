<?php
namespace Microsoft\Azure\Management\MobileEngagement;
final class Devices
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_List_operation = $_client->createOperation('Devices_List');
        $this->_GetByDeviceId_operation = $_client->createOperation('Devices_GetByDeviceId');
        $this->_GetByUserId_operation = $_client->createOperation('Devices_GetByUserId');
        $this->_TagByDeviceId_operation = $_client->createOperation('Devices_TagByDeviceId');
        $this->_TagByUserId_operation = $_client->createOperation('Devices_TagByUserId');
    }
    /**
     * Query the information associated to the devices running an application.
     * @param string $resourceGroupName
     * @param string $appCollection
     * @param string $appName
     * @param integer $_top
     * @param string $_select
     * @param string $_filter
     * @return array
     */
    public function list_(
        $resourceGroupName,
        $appCollection,
        $appName,
        $_top,
        $_select,
        $_filter
    )
    {
        return $this->_List_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'appCollection' => $appCollection,
            'appName' => $appName,
            '$top' => $_top,
            '$select' => $_select,
            '$filter' => $_filter
        ]);
    }
    /**
     * Get the information associated to a device running an application.
     * @param string $resourceGroupName
     * @param string $appCollection
     * @param string $appName
     * @param string $deviceId
     * @return array
     */
    public function getByDeviceId(
        $resourceGroupName,
        $appCollection,
        $appName,
        $deviceId
    )
    {
        return $this->_GetByDeviceId_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'appCollection' => $appCollection,
            'appName' => $appName,
            'deviceId' => $deviceId
        ]);
    }
    /**
     * Get the information associated to a device running an application using the user identifier.
     * @param string $resourceGroupName
     * @param string $appCollection
     * @param string $appName
     * @param string $userId
     * @return array
     */
    public function getByUserId(
        $resourceGroupName,
        $appCollection,
        $appName,
        $userId
    )
    {
        return $this->_GetByUserId_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'appCollection' => $appCollection,
            'appName' => $appName,
            'userId' => $userId
        ]);
    }
    /**
     * Update the tags registered for a set of devices running an application. Updates are performed asynchronously, meaning that a few seconds are needed before the modifications appear in the results of the Get device command.

     * @param string $resourceGroupName
     * @param string $appCollection
     * @param string $appName
     * @param array $parameters
     * @return array
     */
    public function tagByDeviceId(
        $resourceGroupName,
        $appCollection,
        $appName,
        array $parameters
    )
    {
        return $this->_TagByDeviceId_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'appCollection' => $appCollection,
            'appName' => $appName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Update the tags registered for a set of users running an application. Updates are performed asynchronously, meaning that a few seconds are needed before the modifications appear in the results of the Get device command.

     * @param string $resourceGroupName
     * @param string $appCollection
     * @param string $appName
     * @param array $parameters
     * @return array
     */
    public function tagByUserId(
        $resourceGroupName,
        $appCollection,
        $appName,
        array $parameters
    )
    {
        return $this->_TagByUserId_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'appCollection' => $appCollection,
            'appName' => $appName,
            'parameters' => $parameters
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetByDeviceId_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetByUserId_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_TagByDeviceId_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_TagByUserId_operation;
}
