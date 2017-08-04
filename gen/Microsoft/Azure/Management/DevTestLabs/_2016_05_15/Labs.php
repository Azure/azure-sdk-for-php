<?php
namespace Microsoft\Azure\Management\DevTestLabs\_2016_05_15;
final class Labs
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListBySubscription_operation = $_client->createOperation('Labs_ListBySubscription');
        $this->_ListByResourceGroup_operation = $_client->createOperation('Labs_ListByResourceGroup');
        $this->_Get_operation = $_client->createOperation('Labs_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('Labs_CreateOrUpdate');
        $this->_Delete_operation = $_client->createOperation('Labs_Delete');
        $this->_Update_operation = $_client->createOperation('Labs_Update');
        $this->_ClaimAnyVm_operation = $_client->createOperation('Labs_ClaimAnyVm');
        $this->_CreateEnvironment_operation = $_client->createOperation('Labs_CreateEnvironment');
        $this->_ExportResourceUsage_operation = $_client->createOperation('Labs_ExportResourceUsage');
        $this->_GenerateUploadUri_operation = $_client->createOperation('Labs_GenerateUploadUri');
        $this->_ListVhds_operation = $_client->createOperation('Labs_ListVhds');
    }
    /**
     * List labs in a subscription.
     * @param string $_expand
     * @param string $_filter
     * @param integer $_top
     * @param string $_orderby
     * @return array
     */
    public function listBySubscription(
        $_expand,
        $_filter,
        $_top,
        $_orderby
    )
    {
        return $this->_ListBySubscription_operation->call([
            '$expand' => $_expand,
            '$filter' => $_filter,
            '$top' => $_top,
            '$orderby' => $_orderby
        ]);
    }
    /**
     * List labs in a resource group.
     * @param string $resourceGroupName
     * @param string $_expand
     * @param string $_filter
     * @param integer $_top
     * @param string $_orderby
     * @return array
     */
    public function listByResourceGroup(
        $resourceGroupName,
        $_expand,
        $_filter,
        $_top,
        $_orderby
    )
    {
        return $this->_ListByResourceGroup_operation->call([
            'resourceGroupName' => $resourceGroupName,
            '$expand' => $_expand,
            '$filter' => $_filter,
            '$top' => $_top,
            '$orderby' => $_orderby
        ]);
    }
    /**
     * Get lab.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $_expand
     * @return array
     */
    public function get(
        $resourceGroupName,
        $name,
        $_expand
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            '$expand' => $_expand
        ]);
    }
    /**
     * Create or replace an existing lab. This operation can take a while to complete.
     * @param string $resourceGroupName
     * @param string $name
     * @param array $lab
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $name,
        array $lab
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'lab' => $lab
        ]);
    }
    /**
     * Delete lab. This operation can take a while to complete.
     * @param string $resourceGroupName
     * @param string $name
     */
    public function delete(
        $resourceGroupName,
        $name
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name
        ]);
    }
    /**
     * Modify properties of labs.
     * @param string $resourceGroupName
     * @param string $name
     * @param array $lab
     * @return array
     */
    public function update(
        $resourceGroupName,
        $name,
        array $lab
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'lab' => $lab
        ]);
    }
    /**
     * Claim a random claimable virtual machine in the lab. This operation can take a while to complete.
     * @param string $resourceGroupName
     * @param string $name
     */
    public function claimAnyVm(
        $resourceGroupName,
        $name
    )
    {
        return $this->_ClaimAnyVm_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name
        ]);
    }
    /**
     * Create virtual machines in a lab. This operation can take a while to complete.
     * @param string $resourceGroupName
     * @param string $name
     * @param array $labVirtualMachineCreationParameter
     */
    public function createEnvironment(
        $resourceGroupName,
        $name,
        array $labVirtualMachineCreationParameter
    )
    {
        return $this->_CreateEnvironment_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'labVirtualMachineCreationParameter' => $labVirtualMachineCreationParameter
        ]);
    }
    /**
     * Exports the lab resource usage into a storage account This operation can take a while to complete.
     * @param string $resourceGroupName
     * @param string $name
     * @param array $exportResourceUsageParameters
     */
    public function exportResourceUsage(
        $resourceGroupName,
        $name,
        array $exportResourceUsageParameters
    )
    {
        return $this->_ExportResourceUsage_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'exportResourceUsageParameters' => $exportResourceUsageParameters
        ]);
    }
    /**
     * Generate a URI for uploading custom disk images to a Lab.
     * @param string $resourceGroupName
     * @param string $name
     * @param array $generateUploadUriParameter
     * @return array
     */
    public function generateUploadUri(
        $resourceGroupName,
        $name,
        array $generateUploadUriParameter
    )
    {
        return $this->_GenerateUploadUri_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'generateUploadUriParameter' => $generateUploadUriParameter
        ]);
    }
    /**
     * List disk images available for custom image creation.
     * @param string $resourceGroupName
     * @param string $name
     * @return array
     */
    public function listVhds(
        $resourceGroupName,
        $name
    )
    {
        return $this->_ListVhds_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListBySubscription_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByResourceGroup_operation;
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
    private $_Update_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ClaimAnyVm_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateEnvironment_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ExportResourceUsage_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GenerateUploadUri_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListVhds_operation;
}
