<?php

namespace ext\microsoft\windowsazure\services\queue;
use ext\microsoft\windowsazure\services\queue\FiddlerFilter;
 
use PEAR2\WindowsAzure\Services\Core\Configuration;
use PEAR2\WindowsAzure\Services\Queue\QueueSettings;
use PEAR2\WindowsAzure\Services\Queue\QueueService;

class IntegrationTestBase {
    protected static function createService() {
        $config = IntegrationTestBase::createConfiguration();
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

        IntegrationTestBase::overrideWithEnv($config, QueueSettings::ACCOUNT_KEY);
        IntegrationTestBase::overrideWithEnv($config, QueueSettings::ACCOUNT_NAME);
        IntegrationTestBase::overrideWithEnv($config, QueueSettings::URI);

        return $config;
    }

    private static function overrideWithEnv($config, $key) {
        $value = getenv($key);
        if ($value != null) {
            $config->setProperty($key, $value);
        }
    }

    protected static function isRunningWithEmulator() {
        $config = IntegrationTestBase::createConfiguration();
        $accountName = 'devstoreaccount1';
        $accountKey = 'Eby8vdM02xNOcqFlqUwJPLlmEtlCDXJ1OUzFT50uSRZ6IFsuFq2UVErCz4I6tq/K1SZFPTOtr/KBHBeksoGMGw==';
        return $accountName == $config->getProperty(QueueSettings::ACCOUNT_NAME) && 
               $accountKey  == $config->getProperty(QueueSettings::ACCOUNT_KEY);
    }
}
