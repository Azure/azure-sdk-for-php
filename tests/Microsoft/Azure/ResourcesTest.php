<?php
namespace Microsoft\Azure;

use Microsoft\Azure\Management\Resource\_2017_05_10\ResourceManagementClient;
use Microsoft\Rest\HttpMock;
use Microsoft\Rest\Internal\RunTime;

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
        $resourceGroups->createOrUpdate('test-resource-group', ['location' => 'East US']);
    }
}