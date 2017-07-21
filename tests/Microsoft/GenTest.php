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

    function testKeyVault()
    {
        $client = new \Microsoft\Azure\Management\KeyVault\_2016_10_01\KeyVaultManagementClient();
        $this->assertNotNull($client);
    }

    function testLogic()
    {
        $client = new \Microsoft\Azure\Management\Logic\_2016_06_01\LogicManagementClient();
        $this->assertNotNull($client);
    }

    function testMedia()
    {
        $client = new \Microsoft\Azure\Management\Media\_2015_10_01\MediaServicesManagementClient();
        $this->assertNotNull($client);
    }

    function testMobileEngagement()
    {
        $client = new \Microsoft\Azure\Management\MobileEngagement\_2014_12_01\EngagementManagementClient();
        $this->assertNotNull($client);
    }

    function testMySql()
    {
        $client = new \Microsoft\Azure\Management\MySql\_2017_04_30_preview\MySQLManagementClient();
        $this->assertNotNull($client);
    }

    function testNotificationHubs()
    {
        $client = new \Microsoft\Azure\Management\NotificationHubs\_2017_04_01\NotificationHubsManagementClient();
        $this->assertNotNull($client);
    }

    function testPostgreSql()
    {
        $client = new \Microsoft\Azure\Management\PostgreSql\_2017_04_30_preview\PostgreSQLManagementClient();
        $this->assertNotNull($client);
    }

    function testPowerBIEmbedded()
    {
        $client = new \Microsoft\Azure\Management\PowerBIEmbedded\_2016_01_29\PowerBIEmbeddedManagementClient();
        $this->assertNotNull($client);
    }

    function testRecoveryServicesSiteRecovery()
    {
        $client = new \Microsoft\Azure\Management\RecoveryServices\SiteRecovery\_2016_08_10\SiteRecoveryManagementClient();
        $this->assertNotNull($client);
    }

    function testRedis()
    {
        $client = new \Microsoft\Azure\Management\Redis\_2017_02_01\RedisManagementClient();
        $this->assertNotNull($client);
    }

    function testRelay()
    {
        $client = new \Microsoft\Azure\Management\Relay\_2017_04_01\RelayManagementClient();
        $this->assertNotNull($client);
    }

    function testResourceHealth()
    {
        $client = new \Microsoft\Azure\Management\ResourceHealth\_2017_07_01\MicrosoftResourceHealth();
        $this->assertNotNull($client);
    }

    function testScheduler()
    {
        $client = new \Microsoft\Azure\Management\Scheduler\_2016_03_01\SchedulerManagementClient();
        $this->assertNotNull($client);
    }

    function testSearch()
    {
        $client = new \Microsoft\Azure\Management\Search\_2015_08_19\SearchManagementClient();
        $this->assertNotNull($client);
    }

    function testServerManagement()
    {
        $client = new \Microsoft\Azure\Management\ServerManagement\_2016_07_01_preview\ServerManagement();
        $this->assertNotNull($client);
    }

    function testServiceMap()
    {
        $client = new \Microsoft\Azure\Management\ServiceMap\_2015_11_01_preview\ServiceMap();
        $this->assertNotNull($client);
    }

    function testServiceBus()
    {
        $client = new \Microsoft\Azure\Management\ServiceBus\_2017_04_01\ServiceBusManagementClient();
        $this->assertNotNull($client);
    }

    function testStorage()
    {
        $client = new \Microsoft\Azure\Management\Storage\_2017_06_01\StorageManagementClient();
        $this->assertNotNull($client);
    }

    function testStorageImportExport()
    {
        $client = new \Microsoft\Azure\Management\StorageImportExport\_2016_11_01\StorageImportExport();
        $this->assertNotNull($client);
    }

    function testStorSimple8000Series()
    {
        $client = new \Microsoft\Azure\Management\StorSimple8000Series\_2017_06_01\StorSimple8000SeriesManagementClient();
        $this->assertNotNull($client);
    }

    function testTrafficManager()
    {
        $client = new \Microsoft\Azure\Management\TrafficManager\_2017_05_01\TrafficManagerManagementClient();
        $this->assertNotNull($client);
    }

    function testVisualStudio()
    {
        $client = new \Microsoft\Azure\Management\VisualStudio\_2014_04_01_preview\VisualStudioResourceProviderClient();
        $this->assertNotNull($client);
    }
}