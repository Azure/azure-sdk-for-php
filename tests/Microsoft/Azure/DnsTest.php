<?php
namespace Microsoft\Azure;

use Microsoft\Azure\Management\Dns\_2016_04_01\DnsManagementClient;

class DnsTest extends TestInfo
{
    function __construct()
    {
        parent::__construct();
        $this->client = new DnsManagementClient($this->runTime, $this->subscriptionId);
    }

    function testRecordSets()
    {
        $recordSets = $this->client->getRecordSets();
        try {
            $recordSets->createOrUpdate(
                'test-group',
                '',
                '',
                '',
                [],
                'expression',
                'expression');
        } catch (\Exception $e) {
            print_r($e->getMessage());
            print_r($this->httpMock);
        }
    }

    /**
     * @var DnsManagementClient
     */
    private $client;
}