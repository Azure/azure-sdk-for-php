<?php
namespace Microsoft\Azure;

use Microsoft\Azure\Management\Analysis\_2016_05_16\AnalysisServicesManagementClient;

class AnalysisTest extends TestInfo
{
    /**
     * @var AnalysisServicesManagementClient
     */
    private $client;

    /**
     * AdvisorTest constructor.
     */
    function __construct()
    {
        parent::__construct();
        $this->client = new AnalysisServicesManagementClient($this->runTime);
    }

    function testServices()
    {
        $services = $this->client->getServers();
        $services->list_($this->subscriptionId);
    }
}