<?php
namespace Microsoft\Azure\Management\IotHub;
final class IotHubResource
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Get_operation = $_client->createOperation('IotHubResource_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('IotHubResource_CreateOrUpdate');
        $this->_Delete_operation = $_client->createOperation('IotHubResource_Delete');
        $this->_ListBySubscription_operation = $_client->createOperation('IotHubResource_ListBySubscription');
        $this->_ListByResourceGroup_operation = $_client->createOperation('IotHubResource_ListByResourceGroup');
        $this->_GetStats_operation = $_client->createOperation('IotHubResource_GetStats');
        $this->_GetValidSkus_operation = $_client->createOperation('IotHubResource_GetValidSkus');
        $this->_ListEventHubConsumerGroups_operation = $_client->createOperation('IotHubResource_ListEventHubConsumerGroups');
        $this->_GetEventHubConsumerGroup_operation = $_client->createOperation('IotHubResource_GetEventHubConsumerGroup');
        $this->_CreateEventHubConsumerGroup_operation = $_client->createOperation('IotHubResource_CreateEventHubConsumerGroup');
        $this->_DeleteEventHubConsumerGroup_operation = $_client->createOperation('IotHubResource_DeleteEventHubConsumerGroup');
        $this->_ListJobs_operation = $_client->createOperation('IotHubResource_ListJobs');
        $this->_GetJob_operation = $_client->createOperation('IotHubResource_GetJob');
        $this->_GetQuotaMetrics_operation = $_client->createOperation('IotHubResource_GetQuotaMetrics');
        $this->_CheckNameAvailability_operation = $_client->createOperation('IotHubResource_CheckNameAvailability');
        $this->_ListKeys_operation = $_client->createOperation('IotHubResource_ListKeys');
        $this->_GetKeysForKeyName_operation = $_client->createOperation('IotHubResource_GetKeysForKeyName');
        $this->_ExportDevices_operation = $_client->createOperation('IotHubResource_ExportDevices');
        $this->_ImportDevices_operation = $_client->createOperation('IotHubResource_ImportDevices');
    }
    /**
     * Get the non-security related metadata of an IoT hub.
     * @param string $resourceGroupName
     * @param string $resourceName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $resourceName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'resourceName' => $resourceName
        ]);
    }
    /**
     * Create or update the metadata of an Iot hub. The usual pattern to modify a property is to retrieve the IoT hub metadata and security metadata, and then combine them with the modified values in a new body to update the IoT hub.
     * @param string $resourceGroupName
     * @param string $resourceName
     * @param array $iotHubDescription
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $resourceName,
        array $iotHubDescription
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'resourceName' => $resourceName,
            'iotHubDescription' => $iotHubDescription
        ]);
    }
    /**
     * Delete an IoT hub.
     * @param string $resourceGroupName
     * @param string $resourceName
     * @return array
     */
    public function delete(
        $resourceGroupName,
        $resourceName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'resourceName' => $resourceName
        ]);
    }
    /**
     * Get all the IoT hubs in a subscription.
     * @return array
     */
    public function listBySubscription()
    {
        return $this->_ListBySubscription_operation->call([]);
    }
    /**
     * Get all the IoT hubs in a resource group.
     * @param string $resourceGroupName
     * @return array
     */
    public function listByResourceGroup($resourceGroupName)
    {
        return $this->_ListByResourceGroup_operation->call(['resourceGroupName' => $resourceGroupName]);
    }
    /**
     * Get the statistics from an IoT hub.
     * @param string $resourceGroupName
     * @param string $resourceName
     * @return array
     */
    public function getStats(
        $resourceGroupName,
        $resourceName
    )
    {
        return $this->_GetStats_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'resourceName' => $resourceName
        ]);
    }
    /**
     * Get the list of valid SKUs for an IoT hub.
     * @param string $resourceGroupName
     * @param string $resourceName
     * @return array
     */
    public function getValidSkus(
        $resourceGroupName,
        $resourceName
    )
    {
        return $this->_GetValidSkus_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'resourceName' => $resourceName
        ]);
    }
    /**
     * Get a list of the consumer groups in the Event Hub-compatible device-to-cloud endpoint in an IoT hub.
     * @param string $resourceGroupName
     * @param string $resourceName
     * @param string $eventHubEndpointName
     * @return array
     */
    public function listEventHubConsumerGroups(
        $resourceGroupName,
        $resourceName,
        $eventHubEndpointName
    )
    {
        return $this->_ListEventHubConsumerGroups_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'resourceName' => $resourceName,
            'eventHubEndpointName' => $eventHubEndpointName
        ]);
    }
    /**
     * Get a consumer group from the Event Hub-compatible device-to-cloud endpoint for an IoT hub.
     * @param string $resourceGroupName
     * @param string $resourceName
     * @param string $eventHubEndpointName
     * @param string $name
     * @return array
     */
    public function getEventHubConsumerGroup(
        $resourceGroupName,
        $resourceName,
        $eventHubEndpointName,
        $name
    )
    {
        return $this->_GetEventHubConsumerGroup_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'resourceName' => $resourceName,
            'eventHubEndpointName' => $eventHubEndpointName,
            'name' => $name
        ]);
    }
    /**
     * Add a consumer group to an Event Hub-compatible endpoint in an IoT hub.
     * @param string $resourceGroupName
     * @param string $resourceName
     * @param string $eventHubEndpointName
     * @param string $name
     * @return array
     */
    public function createEventHubConsumerGroup(
        $resourceGroupName,
        $resourceName,
        $eventHubEndpointName,
        $name
    )
    {
        return $this->_CreateEventHubConsumerGroup_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'resourceName' => $resourceName,
            'eventHubEndpointName' => $eventHubEndpointName,
            'name' => $name
        ]);
    }
    /**
     * Delete a consumer group from an Event Hub-compatible endpoint in an IoT hub.
     * @param string $resourceGroupName
     * @param string $resourceName
     * @param string $eventHubEndpointName
     * @param string $name
     */
    public function deleteEventHubConsumerGroup(
        $resourceGroupName,
        $resourceName,
        $eventHubEndpointName,
        $name
    )
    {
        return $this->_DeleteEventHubConsumerGroup_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'resourceName' => $resourceName,
            'eventHubEndpointName' => $eventHubEndpointName,
            'name' => $name
        ]);
    }
    /**
     * Get a list of all the jobs in an IoT hub. For more information, see: https://docs.microsoft.com/azure/iot-hub/iot-hub-devguide-identity-registry.
     * @param string $resourceGroupName
     * @param string $resourceName
     * @return array
     */
    public function listJobs(
        $resourceGroupName,
        $resourceName
    )
    {
        return $this->_ListJobs_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'resourceName' => $resourceName
        ]);
    }
    /**
     * Get the details of a job from an IoT hub. For more information, see: https://docs.microsoft.com/azure/iot-hub/iot-hub-devguide-identity-registry.
     * @param string $resourceGroupName
     * @param string $resourceName
     * @param string $jobId
     * @return array
     */
    public function getJob(
        $resourceGroupName,
        $resourceName,
        $jobId
    )
    {
        return $this->_GetJob_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'resourceName' => $resourceName,
            'jobId' => $jobId
        ]);
    }
    /**
     * Get the quota metrics for an IoT hub.
     * @param string $resourceGroupName
     * @param string $resourceName
     * @return array
     */
    public function getQuotaMetrics(
        $resourceGroupName,
        $resourceName
    )
    {
        return $this->_GetQuotaMetrics_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'resourceName' => $resourceName
        ]);
    }
    /**
     * Check if an IoT hub name is available.
     * @param array $operationInputs
     * @return array
     */
    public function checkNameAvailability(array $operationInputs)
    {
        return $this->_CheckNameAvailability_operation->call(['operationInputs' => $operationInputs]);
    }
    /**
     * Get the security metadata for an IoT hub. For more information, see: https://docs.microsoft.com/azure/iot-hub/iot-hub-devguide-security.
     * @param string $resourceGroupName
     * @param string $resourceName
     * @return array
     */
    public function listKeys(
        $resourceGroupName,
        $resourceName
    )
    {
        return $this->_ListKeys_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'resourceName' => $resourceName
        ]);
    }
    /**
     * Get a shared access policy by name from an IoT hub. For more information, see: https://docs.microsoft.com/azure/iot-hub/iot-hub-devguide-security.
     * @param string $resourceGroupName
     * @param string $resourceName
     * @param string $keyName
     * @return array
     */
    public function getKeysForKeyName(
        $resourceGroupName,
        $resourceName,
        $keyName
    )
    {
        return $this->_GetKeysForKeyName_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'resourceName' => $resourceName,
            'keyName' => $keyName
        ]);
    }
    /**
     * Exports all the device identities in the IoT hub identity registry to an Azure Storage blob container. For more information, see: https://docs.microsoft.com/azure/iot-hub/iot-hub-devguide-identity-registry#import-and-export-device-identities.
     * @param string $resourceGroupName
     * @param string $resourceName
     * @param array $exportDevicesParameters
     * @return array
     */
    public function exportDevices(
        $resourceGroupName,
        $resourceName,
        array $exportDevicesParameters
    )
    {
        return $this->_ExportDevices_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'resourceName' => $resourceName,
            'exportDevicesParameters' => $exportDevicesParameters
        ]);
    }
    /**
     * Import, update, or delete device identities in the IoT hub identity registry from a blob. For more information, see: https://docs.microsoft.com/azure/iot-hub/iot-hub-devguide-identity-registry#import-and-export-device-identities.
     * @param string $resourceGroupName
     * @param string $resourceName
     * @param array $importDevicesParameters
     * @return array
     */
    public function importDevices(
        $resourceGroupName,
        $resourceName,
        array $importDevicesParameters
    )
    {
        return $this->_ImportDevices_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'resourceName' => $resourceName,
            'importDevicesParameters' => $importDevicesParameters
        ]);
    }
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
    private $_ListBySubscription_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByResourceGroup_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetStats_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetValidSkus_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListEventHubConsumerGroups_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetEventHubConsumerGroup_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateEventHubConsumerGroup_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_DeleteEventHubConsumerGroup_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListJobs_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetJob_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetQuotaMetrics_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CheckNameAvailability_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListKeys_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetKeysForKeyName_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ExportDevices_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ImportDevices_operation;
}
