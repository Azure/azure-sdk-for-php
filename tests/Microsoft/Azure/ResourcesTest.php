<?php
namespace Microsoft\Azure;

use Microsoft\Azure\Management\Resource\_2017_05_10\ResourceManagementClient;

class ResourcesTest extends TestInfo
{
    /**
     * @var ResourceManagementClient
     */
    private $client;

    function __construct()
    {
        parent::__construct();
        $this->client = new ResourceManagementClient($this->runTime, $this->subscriptionId);
    }

    function testResourceGroups()
    {
        $resourceGroups = $this->client->getResourceGroups();
        $resourceGroups->createOrUpdate('test-resource-group', []);
    }
}