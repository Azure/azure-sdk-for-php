<?php

/**
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
 * PHP version 5
 *
 * @category  Microsoft
 * @package   Tests\Functional\WindowsAzure\Queue
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace Tests\Functional\WindowsAzure\Queue;

use WindowsAzure\Common\Internal\StorageServiceSettings;

class FunctionalTestBase extends IntegrationTestBase
{
    private static $isOneTimeSetup = false;

    protected $accountName;

    public function setUp()
    {
        parent::setUp();
        $settings = StorageServiceSettings::createFromConnectionString($this->connectionString);
        $this->accountName = $settings->getName();
        if (!self::$isOneTimeSetup) {
            $this->doOneTimeSetup();
            self::$isOneTimeSetup = true;
        }
    }

    private function doOneTimeSetup()
    {
        QueueServiceFunctionalTestData::setupData();

        foreach(QueueServiceFunctionalTestData::$testQueueNames as $name)  {
            $this->safeDeleteQueue($name);
        }

        foreach(QueueServiceFunctionalTestData::$testQueueNames as $name)  {
            self::println('Creating queue: ' . $name);
            $this->restProxy->createQueue($name);
        }
    }

    public static function tearDownAfterClass()
    {
        if (self::$isOneTimeSetup) {
            $testBase = new FunctionalTestBase();
            $testBase->setUp();
            foreach(QueueServiceFunctionalTestData::$testQueueNames as $name)  {
                $testBase->safeDeleteQueue($name);
            }
            self::$isOneTimeSetup = false;
        }
        parent::tearDownAfterClass();
    }

    public static function println($msg)
    {
        error_log($msg);
    }

    public static function tmptostring($obj)
    {
        return 'todo';
    }
}


