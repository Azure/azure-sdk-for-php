<?php
namespace Microsoft\Azure;

use Microsoft\Azure\Management\Resource\_2017_05_10\ResourceManagementClient;
use Microsoft\Azure\Management\Storage\_2017_06_01\StorageManagementClient;

class StorageTest extends TestInfo
{
    /**
     * @var ResourceManagementClient
     */
    private $resourceClient;

    /**
     * @var StorageManagementClient
     */
    private $client;

    function __construct()
    {
        parent::__construct();
        $this->client = new StorageManagementClient($this->runTime, $this->subscriptionId);
        $this->resourceClient = new ResourceManagementClient($this->runTime, $this->subscriptionId);
    }

    function testOperations() {
        $operations = $this->client->getOperations();
        $result = $operations->list_();
        print_r($result);
    }

    function testStorageAccounts() {
        $storageAccounts = $this->client->getStorageAccounts();
        $result = $storageAccounts->list_();
        print_r($result);
        $this->resourceClient->getResourceGroups()->createOrUpdate('storage-test-group', ['location' => 'east us']);
        try {
            $storageAccounts->create('storage-test-group', 'myaccountName', ['location' => 'east us']);
        } catch (\Exception $e) {
            print_r($e->getMessage());
        }
    }
}