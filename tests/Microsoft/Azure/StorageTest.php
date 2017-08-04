<?php
namespace Microsoft\Azure;

use Microsoft\Azure\Management\Storage\_2017_06_01\StorageManagementClient;

class StorageTest extends TestInfo
{
    /**
     * @var StorageManagementClient
     */
    private $client;

    function __construct()
    {
        parent::__construct();
        $this->client = new StorageManagementClient($this->runTime, $this->subscriptionId);
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
        // $storageAccounts->create('resourceGroup', 'accountName', []);
    }
}