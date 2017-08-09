<?php
namespace Microsoft\Azure;

use GuzzleHttp\Exception\ClientException;
use Microsoft\Rest\AzureStatic;
use PHPUnit\Framework\TestCase;

class GenTest extends TestInfo
{
    function testAnalysis()
    {
        $client = new \Microsoft\Azure\Management\Analysis\AnalysisServicesManagementClient(
            $this->runTime, $this->subscriptionId);
        $this->assertNotNull($client);
    }

    // ApiManagement

    // AppInsights

    function testAuthorization()
    {
        $client = new \Microsoft\Azure\Management\Authorization\AuthorizationManagementClient(
            $this->runTime, $this->subscriptionId);
        $this->assertNotNull($client);
    }

    function testBatch()
    {
        $client = new \Microsoft\Azure\Management\Batch\BatchManagementClient(
            $this->runTime, $this->subscriptionId);
        $this->assertNotNull($client);
    }

    function testBilling()
    {
        $client = new \Microsoft\Azure\Management\Billing\BillingManagementClient(
            $this->runTime, $this->subscriptionId);
        $this->assertNotNull($client);
    }

    function testCdn()
    {
        $client = new \Microsoft\Azure\Management\Cdn\CdnManagementClient(
            $this->runTime, $this->subscriptionId);
        $this->assertNotNull($client);
    }

    function testCognitiveServices()
    {
        $client = new \Microsoft\Azure\Management\CognitiveServices\CognitiveServicesManagementClient(
            $this->runTime, $this->subscriptionId);
        $this->assertNotNull($client);
    }

    function testCommerce()
    {
        $client = new \Microsoft\Azure\Management\Commerce\UsageManagementClient(
            $this->runTime, $this->subscriptionId);
        $this->assertNotNull($client);
    }

    function testConsumption()
    {
        $client = new \Microsoft\Azure\Management\Consumption\ConsumptionManagementClient(
            $this->runTime, $this->subscriptionId);
        $this->assertNotNull($client);
    }

    function testContainerRegistry()
    {
        $client = new \Microsoft\Azure\Management\ContainerRegistry\ContainerRegistryManagementClient(
            $this->runTime, $this->subscriptionId);
        $this->assertNotNull($client);
    }

    function testCosmosDb()
    {
        $client = new \Microsoft\Azure\Management\CosmosDb\CosmosDB(
            $this->runTime, $this->subscriptionId);
        $this->assertNotNull($client);
    }

    function testCustomerInsights()
    {
        $client = new \Microsoft\Azure\Management\CustomerInsights\CustomerInsightsManagementClient(
            $this->runTime, $this->subscriptionId);
        $this->assertNotNull($client);
    }

    function testDataLakeAnalytics()
    {
        $client = new \Microsoft\Azure\Management\DataLake\Analytics\DataLakeAnalyticsAccountManagementClient(
            $this->runTime, $this->subscriptionId);
        $this->assertNotNull($client);
    }

    function testDataLakeStore()
    {
        $client = new \Microsoft\Azure\Management\DataLake\Store\DataLakeStoreAccountManagementClient(
            $this->runTime, $this->subscriptionId);
        $this->assertNotNull($client);
    }

    function testDevTestLab()
    {
        $client = new \Microsoft\Azure\Management\DevTestLabs\DevTestLabsClient(
            $this->runTime, $this->subscriptionId);
        $this->assertNotNull($client);
    }

    function testDns()
    {
        $client = new \Microsoft\Azure\Management\Dns\DnsManagementClient(
            $this->runTime, $this->subscriptionId);
        $this->assertNotNull($client);
    }

    function testEventHub()
    {
        $client = new \Microsoft\Azure\Management\EventHub\EventHubManagementClient(
            $this->runTime, $this->subscriptionId);
        $this->assertNotNull($client);
    }

    function testIntune()
    {
        $client = new \Microsoft\Azure\Management\Intune\IntuneResourceManagementClient(
            $this->runTime, $this->subscriptionId);
        $this->assertNotNull($client);
    }

    function testIotHub()
    {
        $client = new \Microsoft\Azure\Management\IotHub\IotHubClient(
            $this->runTime, $this->subscriptionId);
        $this->assertNotNull($client);
    }

    function testKeyVault()
    {
        $client = new \Microsoft\Azure\Management\KeyVault\KeyVaultManagementClient(
            $this->runTime, $this->subscriptionId);
        $this->assertNotNull($client);
    }

    function testLogic()
    {
        $client = new \Microsoft\Azure\Management\Logic\LogicManagementClient(
            $this->runTime, $this->subscriptionId);
        $this->assertNotNull($client);
    }

    function testMedia()
    {
        $client = new \Microsoft\Azure\Management\Media\MediaServicesManagementClient(
            $this->runTime, $this->subscriptionId);
        $this->assertNotNull($client);
    }

    function testMobileEngagement()
    {
        $client = new \Microsoft\Azure\Management\MobileEngagement\EngagementManagementClient(
            $this->runTime, $this->subscriptionId);
        $this->assertNotNull($client);
    }

    function testMySql()
    {
        $client = new \Microsoft\Azure\Management\MySql\MySQLManagementClient(
            $this->runTime, $this->subscriptionId);
        $this->assertNotNull($client);
    }

    function testNotificationHubs()
    {
        $client = new \Microsoft\Azure\Management\NotificationHubs\NotificationHubsManagementClient(
            $this->runTime, $this->subscriptionId);
        $this->assertNotNull($client);
    }

    function testPostgreSql()
    {
        $client = new \Microsoft\Azure\Management\PostgreSql\PostgreSQLManagementClient(
            $this->runTime, $this->subscriptionId);
        $this->assertNotNull($client);
    }

    function testPowerBIEmbedded()
    {
        $client = new \Microsoft\Azure\Management\PowerBIEmbedded\PowerBIEmbeddedManagementClient(
            $this->runTime, $this->subscriptionId);
        $this->assertNotNull($client);
    }

    function testRecoveryServicesSiteRecovery()
    {
        $client = new \Microsoft\Azure\Management\RecoveryServices\SiteRecovery\SiteRecoveryManagementClient(
            $this->runTime, $this->subscriptionId);
        $this->assertNotNull($client);
    }

    function testRedis()
    {
        $client = new \Microsoft\Azure\Management\Redis\RedisManagementClient(
            $this->runTime, $this->subscriptionId);
        $this->assertNotNull($client);
    }

    function testRelay()
    {
        $client = new \Microsoft\Azure\Management\Relay\RelayManagementClient(
            $this->runTime, $this->subscriptionId);
        $this->assertNotNull($client);
    }

    function testResourceHealth()
    {
        $client = new \Microsoft\Azure\Management\ResourceHealth\MicrosoftResourceHealth(
            $this->runTime, $this->subscriptionId);
        $this->assertNotNull($client);
    }

    function testScheduler()
    {
        $client = new \Microsoft\Azure\Management\Scheduler\SchedulerManagementClient(
            $this->runTime, $this->subscriptionId);
        $this->assertNotNull($client);
    }

    function testSearch()
    {
        $client = new \Microsoft\Azure\Management\Search\SearchManagementClient(
            $this->runTime, $this->subscriptionId);
        $this->assertNotNull($client);
    }

    function testServerManagement()
    {
        $client = new \Microsoft\Azure\Management\ServerManagement\ServerManagement(
            $this->runTime, $this->subscriptionId);
        $this->assertNotNull($client);
    }

    function testServiceMap()
    {
        $client = new \Microsoft\Azure\Management\ServiceMap\ServiceMap(
            $this->runTime, $this->subscriptionId);
        $this->assertNotNull($client);
    }

    function testServiceBus()
    {
        $client = new \Microsoft\Azure\Management\ServiceBus\ServiceBusManagementClient(
            $this->runTime, $this->subscriptionId);
        $this->assertNotNull($client);
    }

    function testStorageImportExport()
    {
        $client = new \Microsoft\Azure\Management\StorageImportExport\StorageImportExport(
            $this->runTime, $this->subscriptionId);
        $this->assertNotNull($client);
    }

    function testStorSimple8000Series()
    {
        $client = new \Microsoft\Azure\Management\StorSimple8000Series\StorSimple8000SeriesManagementClient(
            $this->runTime, $this->subscriptionId);
        $this->assertNotNull($client);
    }

    function testTrafficManager()
    {
        $client = new \Microsoft\Azure\Management\TrafficManager\TrafficManagerManagementClient(
            $this->runTime, $this->subscriptionId);
        $this->assertNotNull($client);
    }

    function testVisualStudio()
    {
        $client = new \Microsoft\Azure\Management\VisualStudio\VisualStudioResourceProviderClient(
            $this->runTime, $this->subscriptionId);
        $this->assertNotNull($client);
    }
}