<?php
namespace Microsoft;

use Microsoft\Rest\RunTimeStatic;
use PHPUnit\Framework\TestCase;

class GenTest extends TestCase
{
    function testAdvisor()
    {
        $client = new \Microsoft\Azure\Management\Advisor\_2017_04_19\AdvisorManagementClient(RunTimeStatic::create());
        $this->assertNotNull($client);
    }

    function testAnalysis()
    {
        $client = new \Microsoft\Azure\Management\Analysis\_2016_05_16\AnalysisServicesManagementClient(RunTimeStatic::create());
        $this->assertNotNull($client);
    }

    // ApiManagement

    // AppInsights

    function testAuthorization()
    {
        $client = new \Microsoft\Azure\Management\Authorization\_2015_07_01\AuthorizationManagementClient(RunTimeStatic::create());
        $this->assertNotNull($client);
    }

    function testBatch()
    {
        $client = new \Microsoft\Azure\Management\Batch\_2017_05_01\BatchManagementClient(RunTimeStatic::create());
        $this->assertNotNull($client);
    }

    function testBilling()
    {
        $client = new \Microsoft\Azure\Management\Billing\_2017_04_24_preview\BillingManagementClient(RunTimeStatic::create());
        $this->assertNotNull($client);
    }

    function testCdn()
    {
        $client = new \Microsoft\Azure\Management\Cdn\_2016_10_02\CdnManagementClient(RunTimeStatic::create());
        $this->assertNotNull($client);
    }

    function testCognitiveServices()
    {
        $client = new \Microsoft\Azure\Management\CognitiveServices\_2017_04_18\CognitiveServicesManagementClient(RunTimeStatic::create());
        $this->assertNotNull($client);
    }

    function testCommerce()
    {
        $client = new \Microsoft\Azure\Management\Commerce\_2015_06_01_preview\UsageManagementClient(RunTimeStatic::create());
        $this->assertNotNull($client);
    }

    function testConsumption()
    {
        $client = new \Microsoft\Azure\Management\Consumption\_2017_04_24_preview\ConsumptionManagementClient(RunTimeStatic::create());
        $this->assertNotNull($client);
    }

    function testContainerRegistry()
    {
        $client = new \Microsoft\Azure\Management\ContainerRegistry\_2017_06_01_preview\ContainerRegistryManagementClient(RunTimeStatic::create());
        $this->assertNotNull($client);
    }

    function testCosmosDb()
    {
        $client = new \Microsoft\Azure\Management\CosmosDb\_2015_04_08\CosmosDB(RunTimeStatic::create());
        $this->assertNotNull($client);
    }

    function testCustomerInsights()
    {
        $client = new \Microsoft\Azure\Management\CustomerInsights\_2017_04_26\CustomerInsightsManagementClient(RunTimeStatic::create());
        $this->assertNotNull($client);
    }

    function testDataLakeAnalytics()
    {
        $client = new \Microsoft\Azure\Management\DataLake\Analytics\_2016_11_01\DataLakeAnalyticsAccountManagementClient(RunTimeStatic::create());
        $this->assertNotNull($client);
    }

    function testDataLakeStore()
    {
        $client = new \Microsoft\Azure\Management\DataLake\Store\_2016_11_01\DataLakeStoreAccountManagementClient(RunTimeStatic::create());
        $this->assertNotNull($client);
    }

    function testDevTestLab()
    {
        $client = new \Microsoft\Azure\Management\DevTestLabs\_2016_05_15\DevTestLabsClient(RunTimeStatic::create());
        $this->assertNotNull($client);
    }

    function testDns()
    {
        $client = new \Microsoft\Azure\Management\Dns\_2016_04_01\DnsManagementClient(RunTimeStatic::create());
        $this->assertNotNull($client);
    }

    function testEventHub()
    {
        $client = new \Microsoft\Azure\Management\EventHub\_2017_04_01\EventHubManagementClient(RunTimeStatic::create());
        $this->assertNotNull($client);
    }

    function testIntune()
    {
        $client = new \Microsoft\Azure\Management\Intune\_2015_01_14_preview\IntuneResourceManagementClient(RunTimeStatic::create());
        $this->assertNotNull($client);
    }

    function testIotHub()
    {
        $client = new \Microsoft\Azure\Management\IotHub\_2017_01_19\IotHubClient(RunTimeStatic::create());
        $this->assertNotNull($client);
    }

    function testKeyVault()
    {
        $client = new \Microsoft\Azure\Management\KeyVault\_2016_10_01\KeyVaultManagementClient(RunTimeStatic::create());
        $this->assertNotNull($client);
    }

    function testLogic()
    {
        $client = new \Microsoft\Azure\Management\Logic\_2016_06_01\LogicManagementClient(RunTimeStatic::create());
        $this->assertNotNull($client);
    }

    function testMedia()
    {
        $client = new \Microsoft\Azure\Management\Media\_2015_10_01\MediaServicesManagementClient(RunTimeStatic::create());
        $this->assertNotNull($client);
    }

    function testMobileEngagement()
    {
        $client = new \Microsoft\Azure\Management\MobileEngagement\_2014_12_01\EngagementManagementClient(RunTimeStatic::create());
        $this->assertNotNull($client);
    }

    function testMySql()
    {
        $client = new \Microsoft\Azure\Management\MySql\_2017_04_30_preview\MySQLManagementClient(RunTimeStatic::create());
        $this->assertNotNull($client);
    }

    function testNotificationHubs()
    {
        $client = new \Microsoft\Azure\Management\NotificationHubs\_2017_04_01\NotificationHubsManagementClient(RunTimeStatic::create());
        $this->assertNotNull($client);
    }

    function testPostgreSql()
    {
        $client = new \Microsoft\Azure\Management\PostgreSql\_2017_04_30_preview\PostgreSQLManagementClient(RunTimeStatic::create());
        $this->assertNotNull($client);
    }

    function testPowerBIEmbedded()
    {
        $client = new \Microsoft\Azure\Management\PowerBIEmbedded\_2016_01_29\PowerBIEmbeddedManagementClient(RunTimeStatic::create());
        $this->assertNotNull($client);
    }

    function testRecoveryServicesSiteRecovery()
    {
        $client = new \Microsoft\Azure\Management\RecoveryServices\SiteRecovery\_2016_08_10\SiteRecoveryManagementClient(RunTimeStatic::create());
        $this->assertNotNull($client);
    }

    function testRedis()
    {
        $client = new \Microsoft\Azure\Management\Redis\_2017_02_01\RedisManagementClient(RunTimeStatic::create());
        $this->assertNotNull($client);
    }

    function testRelay()
    {
        $client = new \Microsoft\Azure\Management\Relay\_2017_04_01\RelayManagementClient(RunTimeStatic::create());
        $this->assertNotNull($client);
    }

    function testResourceHealth()
    {
        $client = new \Microsoft\Azure\Management\ResourceHealth\_2017_07_01\MicrosoftResourceHealth(RunTimeStatic::create());
        $this->assertNotNull($client);
    }

    function testScheduler()
    {
        $client = new \Microsoft\Azure\Management\Scheduler\_2016_03_01\SchedulerManagementClient(RunTimeStatic::create());
        $this->assertNotNull($client);
    }

    function testSearch()
    {
        $client = new \Microsoft\Azure\Management\Search\_2015_08_19\SearchManagementClient(RunTimeStatic::create());
        $this->assertNotNull($client);
    }

    function testServerManagement()
    {
        $client = new \Microsoft\Azure\Management\ServerManagement\_2016_07_01_preview\ServerManagement(RunTimeStatic::create());
        $this->assertNotNull($client);
    }

    function testServiceMap()
    {
        $client = new \Microsoft\Azure\Management\ServiceMap\_2015_11_01_preview\ServiceMap(RunTimeStatic::create());
        $this->assertNotNull($client);
    }

    function testServiceBus()
    {
        $client = new \Microsoft\Azure\Management\ServiceBus\_2017_04_01\ServiceBusManagementClient(RunTimeStatic::create());
        $this->assertNotNull($client);
    }

    function testStorage()
    {
        $client = new \Microsoft\Azure\Management\Storage\_2017_06_01\StorageManagementClient(RunTimeStatic::create());
        $this->assertNotNull($client);
    }

    function testStorageImportExport()
    {
        $client = new \Microsoft\Azure\Management\StorageImportExport\_2016_11_01\StorageImportExport(RunTimeStatic::create());
        $this->assertNotNull($client);
    }

    function testStorSimple8000Series()
    {
        $client = new \Microsoft\Azure\Management\StorSimple8000Series\_2017_06_01\StorSimple8000SeriesManagementClient(RunTimeStatic::create());
        $this->assertNotNull($client);
    }

    function testTrafficManager()
    {
        $client = new \Microsoft\Azure\Management\TrafficManager\_2017_05_01\TrafficManagerManagementClient(RunTimeStatic::create());
        $this->assertNotNull($client);
    }

    function testVisualStudio()
    {
        $client = new \Microsoft\Azure\Management\VisualStudio\_2014_04_01_preview\VisualStudioResourceProviderClient(RunTimeStatic::create());
        $this->assertNotNull($client);
    }
}