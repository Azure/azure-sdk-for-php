<?php
namespace Microsoft\Azure;

use Microsoft\Azure\Management\Analysis\AnalysisServicesManagementClient;

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
        $this->client = new AnalysisServicesManagementClient($this->runTime, $this->subscriptionId);
    }

    function testServices()
    {
        $services = $this->client->getServers();
        $result = $services->list_();
        print_r($result);
        try {
            $result = $services->create('resource', 'server', []);
        } catch (\Exception $e) {
            print_r($e->getMessage());
        }
        try {
            $result = $services->delete('res', 'server');
        } catch (\Exception $e) {
            print_r($e->getMessage());
        }
        try {
            $result = $services->getDetails('res', 'server');
        } catch (\Exception $e) {
            print_r($e->getMessage());
        }
        try {
            $result = $services->listByResourceGroup('res');
        } catch (\Exception $e) {
            print_r($e->getMessage());
        }
        try {
            $services->listSkusForExisting('res', 'server');
        } catch (\Exception $e) {
            print_r($e->getMessage());
        }
        $result = $services->listSkusForNew();
        print_r($result);
        try {
            $result = $services->listSkusForExisting('res', 'server');
        } catch (\Exception $e) {
            print_r($e->getMessage());
        }
        try {
            $services->resume('res', 'server');
        } catch (\Exception $e) {
            print_r($e->getMessage());
        }
        try {
            $services->suspend('res', 'server');
        } catch (\Exception $e) {
            print_r($e->getMessage());
        }
        try {
            $services->update('res', 'server', []);
        } catch (\Exception $e) {
            print_r($e->getMessage());
        }
    }
}