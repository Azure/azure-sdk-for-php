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
 * @package    PEAR2\Tests\Functional\WindowsAzure\Services\Queue
 * @author     Jason Cooke <jcooke@microsoft.com>
 * @copyright  2012 Microsoft Corporation
 * @license    http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link       http://pear.php.net/package/azure-sdk-for-php
 */

namespace PEAR2\Tests\Functional\WindowsAzure\Services\Queue;

use DateTime;
use ReflectionClass;
use ReflectionMethod;
use PEAR2\Tests\Framework\FiddlerFilter;
use PEAR2\Tests\Functional\WindowsAzure\Services\Queue\QueueServiceFunctionalTestData;
use PEAR2\WindowsAzure\Core\ServiceException;
use PEAR2\WindowsAzure\Services\Core\Configuration;
use PEAR2\WindowsAzure\Services\Queue\QueueService;
use PEAR2\WindowsAzure\Services\Queue\QueueSettings;


class FunctionalTestBase  extends \PHPUnit_Framework_TestCase {
    protected static $accountName;

    public function setUp() {
        QueueServiceFunctionalTestData::setupData();
        $service = self::createService();
        $config = self::createConfiguration();
        self::$accountName = $config->getProperty(QueueSettings::ACCOUNT_NAME);
        
//        if (! $accountName->endsWith('/')) {
//            $accountName .= '/';
//        }

        // Clean up all old queues.
        $result = $service->listQueues();
        foreach ($result->getQueues() as $q) {
            $service->deleteQueue($q->getName());
        }
        
        foreach(QueueServiceFunctionalTestData::$TEST_QUEUE_NAMES as $name)  {
            try {
                $service->deleteQueue($name);
            }
            catch (ServiceException $e) {
                // It is OK if cannot delete.
            }
        }

        foreach(QueueServiceFunctionalTestData::$TEST_QUEUE_NAMES as $name)  {
            self::println('Creating queue: ' . $name);
            $service->createQueue($name);
        }
    }

    public function tearDown() {
        $service = self::createService();

        if (!self::isRunningWithEmulator()) {
            $serviceProperties = QueueServiceFunctionalTestData::getDefaultServiceProperties();
            $service->setServiceProperties($serviceProperties);
        }
        
        foreach(QueueServiceFunctionalTestData::$TEST_QUEUE_NAMES as $name)  {
            self::println('Deleting queue: ' . $name);
            $service->deleteQueue($name);
        }
    }

    protected static function createService() {
        $config = self::createConfiguration();
        $svc = QueueService::create($config);
        $fiddlerFilter = new FiddlerFilter();
        $svc = $svc->withFilter($fiddlerFilter);
        return $svc;
    }

    protected static function createConfiguration() {
        $config = new Configuration();
        
        // By default, use the local dev storage. Override by setting the environment variables.
        $config->setProperty(QueueSettings::ACCOUNT_KEY, 'Eby8vdM02xNOcqFlqUwJPLlmEtlCDXJ1OUzFT50uSRZ6IFsuFq2UVErCz4I6tq/K1SZFPTOtr/KBHBeksoGMGw==');
        $config->setProperty(QueueSettings::ACCOUNT_NAME, 'devstoreaccount1');
        // Revert when the issue is resolved.
        // https://github.com/WindowsAzure/azure-sdk-for-php/issues/49
        // $config->setProperty(QueueSettings::URI, 'http://127.0.0.1:10001/devstoreaccount1');
        $config->setProperty(QueueSettings::URI, 'http://127.0.0.1:10001/devstoreaccount1/');

        self::overrideWithEnv($config, QueueSettings::ACCOUNT_KEY);
        self::overrideWithEnv($config, QueueSettings::ACCOUNT_NAME);
        self::overrideWithEnv($config, QueueSettings::URI);

        return $config;
    }

    private static function overrideWithEnv($config, $key) {
        $value = getenv($key);
        if ($value != null) {
            $config->setProperty($key, $value);
        }
    }

    protected static function isRunningWithEmulator() {
        $config = self::createConfiguration();
        $accountName = 'devstoreaccount1';
        $accountKey = 'Eby8vdM02xNOcqFlqUwJPLlmEtlCDXJ1OUzFT50uSRZ6IFsuFq2UVErCz4I6tq/K1SZFPTOtr/KBHBeksoGMGw==';

        return $accountName == $config->getProperty(QueueSettings::ACCOUNT_NAME) && 
               $accountKey  == $config->getProperty(QueueSettings::ACCOUNT_KEY);
    }

    public static function assertNotNull($msg, $obj) {
        self::println('assertNotNull(\'' . $msg . '\', ' . self::tmptostring($obj));
        parent::assertNotNull($obj, $msg);
    }
    public static function assertNull($msg, $obj) {
        self::println('assertNull(\'' . $msg . '\', ' . self::tmptostring($obj));
        parent::assertNull($obj, $msg);
    }
    public static function assertTrue($msg, $obj) {
        self::println('assertTrue(\'' . $msg . '\', ' . self::tmptostring($obj));
        parent::assertTrue($obj, $msg);
    }
    public static function assertFalse($msg, $obj) {
        self::println('assertFalse(\'' . $msg . '\', ' . self::tmptostring($obj));
        parent::assertFalse($obj, $msg);
    }
    public static function assertEquals($msg, $obj1, $obj2) {
        self::println('assertEquals(\'' . $msg . '\', ' . self::tmptostring($obj1) . ', ' . self::tmptostring($obj2));
        parent::assertEquals($obj1, $obj2, $msg);
    }      
    
    public static function println($msg) {
        // echo $msg . "<br/>\n";
    }

    private static $errorCount = 0;
    public static function printerr($msg, $error) {
        self::println($msg . ':' . $error->getCode() . ':' . $error->getErrorText());
        self::$errorCount++;
        if (self::$errorCount > 10) {
            throw new Exception('Too many errors, aborting!');
        }
    }

    public static function tmptostring($obj) {
        return self::writeObjWorker($obj, array());
    }

    private static function writeObjWorker($obj, $viewed) {
        if (is_double($obj) || is_int($obj) || is_long($obj) || is_real($obj)) {
            return strval($obj);
        } else if (is_array($obj)) {
            $s = '{';
            $first = true;
            foreach ($obj as $key => $value) {
                if (!$first) $s .= ', ';
                $first = false;
                $s .= self::writeObjWorker($key, $viewed) . ':' . self::writeObjWorker($value, $viewed);
            }
            return $s . '}';
        } else if (is_bool($obj)) {
            return ($obj ? 'true' : 'false');
        } else if (is_string($obj)) {
            return '\'' .$obj . '\'';
        } else if (is_null($obj)) {
            return 'null';            
        }

        $s = '[';
        $first = true;
        if ($obj == null) {
            $s .= '<null>';
        }
        else if (in_array($obj, $viewed, true)) {
            return '<dupe>';
        }
        else {
            array_push($viewed, $obj);
            $reflector = new ReflectionClass($obj);
            if ($reflector->getName() == 'DateTime') {
                $s .= $obj->format(DateTime::RFC1123);
            } else {           
                $methods = $reflector->getMethods(ReflectionMethod::IS_PUBLIC);
                foreach($methods as $method) {
                    $fnname = $method->name;                
                    if (substr($fnname, 0, 3) == 'get') {
                        if (!$first) $s .= ', ';
                        $first = false;
                        $s .= substr($fnname, 3);
                        $val = $method->invoke($obj);
                        $s .= '=' . self::writeObjWorker($val, $viewed);
                    }
                }
            }
        }
        return $s . ']';
    }
}
