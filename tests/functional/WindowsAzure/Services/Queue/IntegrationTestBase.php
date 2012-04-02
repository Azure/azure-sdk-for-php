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

use PEAR2\Tests\Framework\FiddlerFilter;
use PEAR2\WindowsAzure\Services\Core\Configuration;
use PEAR2\WindowsAzure\Services\Queue\QueueSettings;
use PEAR2\WindowsAzure\Services\Queue\QueueService;

class IntegrationTestBase extends \PHPUnit_Framework_TestCase {
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
}
