<?php

namespace ext\microsoft\windowsazure\services\queue;

use ext\microsoft\windowsazure\services\queue\FiddlerFilter;
use ext\microsoft\windowsazure\services\queue\QueueServiceFunctionalTestData;
use PEAR2\WindowsAzure\Services\Core\Configuration;
use PEAR2\WindowsAzure\Services\Queue\QueueSettings;
use PEAR2\WindowsAzure\Services\Queue\QueueService;
use PEAR2\WindowsAzure\Core\ServiceException;
use ReflectionClass;
use ReflectionMethod;
use DateTime;

class FunctionalTestBase {
    protected static $accountName;

    public static function setup() {
        QueueServiceFunctionalTestData::setupData();
        $service = FunctionalTestBase::createService();
        $config = FunctionalTestBase::createConfiguration();
        FunctionalTestBase::$accountName = $config->getProperty(QueueSettings::ACCOUNT_NAME);
        
//        if (! $accountName->endsWith('/')) {
//            $accountName .= '/';
//        }

        foreach(QueueServiceFunctionalTestData::$TEST_QUEUE_NAMES as $name)  {
            try {
                $service->deleteQueue($name);
            }
            catch (ServiceException $e) {
                // It is OK if cannot delete.
            }
        }

        foreach(QueueServiceFunctionalTestData::$TEST_QUEUE_NAMES as $name)  {
            FunctionalTestBase::println('Creating queue: ' . $name);
            $service->createQueue($name);
        }
    }

    public static function cleanup() {
        $service = FunctionalTestBase::createService();

        if (!FunctionalTestBase::isRunningWithEmulator()) {
            $serviceProperties = QueueServiceFunctionalTestData::getDefaultServiceProperties();
            $service->setServiceProperties($serviceProperties);
        }
        
        foreach(QueueServiceFunctionalTestData::$TEST_QUEUE_NAMES as $name)  {
            FunctionalTestBase::println('Deleting queue: ' . $name);
            $service->deleteQueue($name);
        }
    }

    protected static function createService() {
        $config = FunctionalTestBase::createConfiguration();
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

        FunctionalTestBase::overrideWithEnv($config, QueueSettings::ACCOUNT_KEY);
        FunctionalTestBase::overrideWithEnv($config, QueueSettings::ACCOUNT_NAME);
        FunctionalTestBase::overrideWithEnv($config, QueueSettings::URI);

        return $config;
    }

    private static function overrideWithEnv($config, $key) {
        $value = getenv($key);
        if ($value != null) {
            $config->setProperty($key, $value);
        }
    }

    protected static function isRunningWithEmulator() {
        $config = FunctionalTestBase::createConfiguration();
        $accountName = 'devstoreaccount1';
        $accountKey = 'Eby8vdM02xNOcqFlqUwJPLlmEtlCDXJ1OUzFT50uSRZ6IFsuFq2UVErCz4I6tq/K1SZFPTOtr/KBHBeksoGMGw==';

        return $accountName == $config->getProperty(QueueSettings::ACCOUNT_NAME) && 
               $accountKey  == $config->getProperty(QueueSettings::ACCOUNT_KEY);
    }

    public static function println($msg) {
        echo $msg . "<br/>\n";
    }

    public static function tostring($obj) {
        return FunctionalTestBase::writeObjWorker($obj, array());
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
                $s .= FunctionalTestBase::writeObjWorker($key, $viewed) . ':' . FunctionalTestBase::writeObjWorker($value, $viewed);
            }
            return $s . '}';
        } else if (is_bool($obj)) {
            return ($obj ? 'true' : 'false');
        } else if (is_string($obj)) {
            return "'" .$obj . "'";
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
                        $s .= '=' . FunctionalTestBase::writeObjWorker($val, $viewed);
                    }
                }
            }
        }
        return $s . ']';
    }    
}
