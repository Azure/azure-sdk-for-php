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
        $result = $resourceGroups->createOrUpdate('test-resource-group', ['location' => 'East US']);
        print_r($result);
        $resourceGroups->update('test-resource-group', []);
        $result = $resourceGroups->delete('test-resource-group');
        print_r($result);
        $result = $resourceGroups->list_('', null);
        print_r($result);
        $result = $resourceGroups->get('test-resource-group');
        print_r($result);
        $result = $resourceGroups->checkExistence('test-resource-group');
        print_r($result);
        $result = $resourceGroups->exportTemplate('test-resource-group', ['resources' => ['*']]);
        print_r($result);
    }
}