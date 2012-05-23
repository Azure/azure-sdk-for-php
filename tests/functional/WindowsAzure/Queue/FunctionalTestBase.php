<?php

/**
 * Functional tests for the SDK
 *
 * PHP version 5
 *
 * LICENSE: Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 * @category   Microsoft
 * @package    Tests\Functional\WindowsAzure\Queue
 * @author     Jason Cooke <jcooke@microsoft.com>
 * @copyright  2012 Microsoft Corporation
 * @license    http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link       http://pear.php.net/package/azure-sdk-for-php
 */

namespace Tests\Functional\WindowsAzure\Queue;

use DateTime;
use ReflectionClass;
use ReflectionMethod;
use Tests\Framework\FiddlerFilter;
use Tests\Framework\QueueServiceRestProxyTestBase;
use Tests\Framework\TestResources;
use Tests\Functional\WindowsAzure\Queue\QueueServiceFunctionalTestData;
use WindowsAzure\Common\ServiceException;
use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\Common\Configuration;
use WindowsAzure\Queue\QueueService;
use WindowsAzure\Queue\QueueSettings;

class FunctionalTestBase extends QueueServiceRestProxyTestBase {
    protected $accountName;

    public function __construct()
    {
        parent::__construct();
        $fiddlerFilter = new FiddlerFilter();
        $this->restProxy = $this->restProxy->withFilter($fiddlerFilter);
    }
    
    public function setUp() {
        parent::setUp();
        $this->accountName = $this->config->getProperty(QueueSettings::ACCOUNT_NAME);
    }

    public static function setUpBeforeClass() {
        parent::setUpBeforeClass();
        $service = self::createService();
        QueueServiceFunctionalTestData::setupData();
        
        foreach(QueueServiceFunctionalTestData::$TEST_QUEUE_NAMES as $name)  {
            self::staticSafeDeleteQueue($service, $name);
        }

        foreach(QueueServiceFunctionalTestData::$TEST_QUEUE_NAMES as $name)  {
            self::println('Creating queue: ' . $name);
            $service->createQueue($name);
        }
    }

    public static function tearDownAfterClass()
    {
        parent::tearDownAfterClass();
        $service = self::createService();
        if (!Configuration::isEmulated()) {
            $serviceProperties = QueueServiceFunctionalTestData::getDefaultServiceProperties();
            $service->setServiceProperties($serviceProperties);
        }
        
        foreach(QueueServiceFunctionalTestData::$TEST_QUEUE_NAMES as $name)  {
            self::staticSafeDeleteQueue($service, $name);
        }
    }

    private static function createService() {
        $tmp = new FunctionalTestBase();
        return $tmp->restProxy;
    }
    
    private static function staticSafeDeleteQueue($service, $queueName)
    {
        try
        {
            $service->deleteQueue($queueName);
        }
        catch (\Exception $e)
        {
            // Ignore exception and continue, will assume that this queue doesn't exist in the sotrage account
            error_log($e->getMessage());
        }
    }
    
    public static function println($msg) {
        error_log($msg);
    }
    
    public static function tmptostring($obj) {
        return 'todo';
    }
}

?>
