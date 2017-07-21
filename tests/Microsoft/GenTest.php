<?php
namespace Microsoft;

use PHPUnit\Framework\TestCase;

class GenTest extends TestCase
{
    function testAdvisor()
    {
        $client = new \Microsoft\Azure\Management\Advisor\_2017_04_19\AdvisorManagementClient();
        $this->assertNotNull($client);
    }

    function testAnalysis()
    {
        $client = new \Microsoft\Azure\Management\Analysis\_2016_05_16\AnalysisServicesManagementClient();
        $this->assertNotNull($client);
    }

    // ApiManagement

    // AppInsights

    function testAuthorization()
    {
        $client = new \Microsoft\Azure\Management\Authorization\_2015_07_01\AuthorizationManagementClient();
        $this->assertNotNull($client);
    }

    function testBatch()
    {
        $client = new \Microsoft\Azure\Management\Batch\_2017_05_01\BatchManagementClient();
        $this->assertNotNull($client);
    }

    function testBilling()
    {
        $client = new \Microsoft\Azure\Management\Billing\_2017_04_24_preview\BillingManagementClient();
        $this->assertNotNull($client);
    }

    function testCdn()
    {
        $client = new \Microsoft\Azure\Management\Cdn\_2016_10_02\CdnManagementClient();
        $this->assertNotNull($client);
    }

    function testCognitiveServices()
    {
        $client = new \Microsoft\Azure\Management\CognitiveServices\_2017_04_18\CognitiveServicesManagementClient();
        $this->assertNotNull($client);
    }

    function testCommerce()
    {
        $client = new \Microsoft\Azure\Management\Commerce\_2015_06_01_preview\UsageManagementClient();
        $this->assertNotNull($client);
    }

    function testConsumption()
    {
        $client = new \Microsoft\Azure\Management\Consumption\_2017_04_24_preview\ConsumptionManagementClient();
        $this->assertNotNull($client);
    }

    function testContainerRegistry()
    {
        $client = new \Microsoft\Azure\Management\ContainerRegistry\_2017_06_01_preview\ContainerRegistryManagementClient();
        $this->assertNotNull($client);
    }

    function testCosmosDb()
    {
        $client = new \Microsoft\Azure\Management\CosmosDb\_2015_04_08\CosmosDB();
        $this->assertNotNull($client);
    }

    function testCustomerInsights()
    {
        $client = new \Microsoft\Azure\Management\CustomerInsights\_2017_04_26\CustomerInsightsManagementClient();
        $this->assertNotNull($client);
    }

    function testDataLakeAnalytics()
    {
        $client = new \Microsoft\Azure\Management\DataLake\Analytics\_2016_11_01\DataLakeAnalyticsAccountManagementClient();
        $this->assertNotNull($client);
    }

    function testDataLakeStore()
    {
        $client = new \Microsoft\Azure\Management\DataLake\Store\_2016_11_01\DataLakeStoreAccountManagementClient();
        $this->assertNotNull($client);
    }

    function testDevTestLab()
    {
        $client = new \Microsoft\Azure\Management\DevTestLabs\_2016_05_15\DevTestLabsClient();
        $this->assertNotNull($client);
    }

    function testDns()
    {
        $client = new \Microsoft\Azure\Management\Dns\_2016_04_01\DnsManagementClient();
        $this->assertNotNull($client);
    }

    function testEventHub()
    {
        $client = new \Microsoft\Azure\Management\EventHub\_2017_04_01\EventHubManagementClient();
        $this->assertNotNull($client);
    }

    function testIntune()
    {
        $client = new \Microsoft\Azure\Management\Intune\_2015_01_14_preview\IntuneResourceManagementClient();
        $this->assertNotNull($client);
    }

    function testIotHub()
    {
        $client = new \Microsoft\Azure\Management\IotHub\_2017_01_19\IotHubClient();
        $this->assertNotNull($client);
    }

    function testRedis()
    {
        $client = new \Microsoft\Azure\Management\Redis\_2017_02_01\RedisManagementClient();
        $this->assertNotNull($client);
    }
}