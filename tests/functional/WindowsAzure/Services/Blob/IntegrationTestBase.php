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
 * @package    Tests\Functional\WindowsAzure\Services\Blob
 * @author     Jason Cooke <jcooke@microsoft.com>
 * @copyright  2012 Microsoft Corporation
 * @license    http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link       http://pear.php.net/package/azure-sdk-for-php
 */

namespace Tests\Functional\WindowsAzure\Services\Blob;

use Tests\Framework\FiddlerFilter;
use Tests\Framework\BlobServiceRestProxyTestBase;
use WindowsAzure\Services\Blob\BlobService;

class IntegrationTestBase extends BlobServiceRestProxyTestBase {
    public function __construct()
    {
        parent::__construct();
        $fiddlerFilter = new FiddlerFilter();
        $this->wrapper = $this->wrapper->withFilter($fiddlerFilter);
    }

//    protected static function createService() {
//        $config = self::createConfiguration();
//        $svc = BlobService::create($config);
//        $fiddlerFilter = new FiddlerFilter();
//        $svc = $svc->withFilter($fiddlerFilter);
//        return $svc;
//    }
//
//    protected static function createConfiguration() {
//        $config = new Configuration();
//        
//        // By default, use the local dev storage. Override by setting the environment variables.
//        $config->setProperty(BlobSettings::ACCOUNT_KEY, 'Eby8vdM02xNOcqFlqUwJPLlmEtlCDXJ1OUzFT50uSRZ6IFsuFq2UVErCz4I6tq/K1SZFPTOtr/KBHBeksoGMGw==');
//        $config->setProperty(BlobSettings::ACCOUNT_NAME, 'devstoreaccount1');
//        // Revert when the issue is resolved.
//        // https://github.com/WindowsAzure/azure-sdk-for-php/issues/49
//        //$config->setProperty(BlobSettings::URI, 'http://127.0.0.1:10000/devstoreaccount1');
//        $config->setProperty(BlobSettings::URI, 'http://127.0.0.1:10000/devstoreaccount1/');
//
//        self::overrideWithEnv($config, BlobSettings::ACCOUNT_KEY);
//        self::overrideWithEnv($config, BlobSettings::ACCOUNT_NAME);
//        self::overrideWithEnv($config, BlobSettings::URI);
//
//        return $config;
//    }
//
//    private static function overrideWithEnv($config, $key) {
//        $value = getenv($key);
//        if ($value != null) {
//            $config->setProperty($key, $value);
//        }
//    }
//
//    protected static function isRunningWithEmulator() {
//        $config = self::createConfiguration();
//        $accountName = 'devstoreaccount1';
//        $accountKey = 'Eby8vdM02xNOcqFlqUwJPLlmEtlCDXJ1OUzFT50uSRZ6IFsuFq2UVErCz4I6tq/K1SZFPTOtr/KBHBeksoGMGw==';
//
//        return $accountName == $config->getProperty(BlobSettings::ACCOUNT_NAME) && 
//               $accountKey  == $config->getProperty(BlobSettings::ACCOUNT_KEY);
//    }       
}
