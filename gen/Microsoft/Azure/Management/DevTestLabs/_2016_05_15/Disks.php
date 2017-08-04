<?php
namespace Microsoft\Azure\Management\DevTestLabs\_2016_05_15;
final class Disks
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_List_operation = $_client->createOperation('Disks_List');
        $this->_Get_operation = $_client->createOperation('Disks_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('Disks_CreateOrUpdate');
        $this->_Delete_operation = $_client->createOperation('Disks_Delete');
        $this->_Attach_operation = $_client->createOperation('Disks_Attach');
        $this->_Detach_operation = $_client->createOperation('Disks_Detach');
    }
    /**
     * List disks in a given user profile.
     * @param string $resourceGroupName
     * @param string $labName
     * @param string $userName
     * @param string $_expand
     * @param string $_filter
     * @param integer $_top
     * @param string $_orderby
     * @return array
     */
    public function list_(
        $resourceGroupName,
        $labName,
        $userName,
        $_expand,
        $_filter,
        $_top,
        $_orderby
    )
    {
        return $this->_List_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'labName' => $labName,
            'userName' => $userName,
            '$expand' => $_expand,
            '$filter' => $_filter,
            '$top' => $_top,
            '$orderby' => $_orderby
        ]);
    }
    /**
     * Get disk.
     * @param string $resourceGroupName
     * @param string $labName
     * @param string $userName
     * @param string $name
     * @param string $_expand
     * @return array
     */
    public function get(
        $resourceGroupName,
        $labName,
        $userName,
        $name,
        $_expand
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'labName' => $labName,
            'userName' => $userName,
            'name' => $name,
            '$expand' => $_expand
        ]);
    }
    /**
     * Create or replace an existing disk. This operation can take a while to complete.
     * @param string $resourceGroupName
     * @param string $labName
     * @param string $userName
     * @param string $name
     * @param array $disk
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $labName,
        $userName,
        $name,
        array $disk
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'labName' => $labName,
            'userName' => $userName,
            'name' => $name,
            'disk' => $disk
        ]);
    }
    /**
     * Delete disk. This operation can take a while to complete.
     * @param string $resourceGroupName
     * @param string $labName
     * @param string $userName
     * @param string $name
     */
    public function delete(
        $resourceGroupName,
        $labName,
        $userName,
        $name
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'labName' => $labName,
            'userName' => $userName,
            'name' => $name
        ]);
    }
    /**
     * Attach and create the lease of the disk to the virtual machine. This operation can take a while to complete.
     * @param string $resourceGroupName
     * @param string $labName
     * @param string $userName
     * @param string $name
     * @param array $attachDiskProperties
     */
    public function attach(
        $resourceGroupName,
        $labName,
        $userName,
        $name,
        array $attachDiskProperties
    )
    {
        return $this->_Attach_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'labName' => $labName,
            'userName' => $userName,
            'name' => $name,
            'attachDiskProperties' => $attachDiskProperties
        ]);
    }
    /**
     * Detach and break the lease of the disk attached to the virtual machine. This operation can take a while to complete.
     * @param string $resourceGroupName
     * @param string $labName
     * @param string $userName
     * @param string $name
     * @param array $detachDiskProperties
     */
    public function detach(
        $resourceGroupName,
        $labName,
        $userName,
        $name,
        array $detachDiskProperties
    )
    {
        return $this->_Detach_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'labName' => $labName,
            'userName' => $userName,
            'name' => $name,
            'detachDiskProperties' => $detachDiskProperties
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateOrUpdate_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Delete_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Attach_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Detach_operation;
}
