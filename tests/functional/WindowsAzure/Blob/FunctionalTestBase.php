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
 * @package   Tests\Functional\WindowsAzure\Blob
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace Tests\Functional\WindowsAzure\Blob;

use WindowsAzure\Common\ServiceException;
use WindowsAzure\Common\Internal\StorageServiceSettings;

class FunctionalTestBase extends IntegrationTestBase
{
    private static $isOneTimeSetup = false;

    /**
     * @covers WindowsAzure\Blob\BlobRestProxy::createContainer
     * @covers WindowsAzure\Blob\BlobRestProxy::deleteContainer
     * @covers WindowsAzure\Blob\BlobRestProxy::listContainers
     */
    public function setUp()
    {
        parent::setUp();
        $settings = StorageServiceSettings::createFromConnectionString($this->connectionString);
        $accountName = $settings->getBlobEndpointUri();
        $firstSlash = strpos($accountName, '/');
        $accountName = substr($accountName, $firstSlash + 2);
        $firstDot = strpos($accountName, '.');
        $accountName = substr($accountName, 0, $firstDot);

        BlobServiceFunctionalTestData::setupData($accountName);

        $hasRoot = false;
        foreach($this->restProxy->listContainers()->getContainers() as $container) {
            if ($container->getName() == '$root') {
                $hasRoot = true;
                $this->safeDeleteContainerContents('$root');
            } else {
                $this->safeDeleteContainer($container->getName());
            }
        }

        foreach(BlobServiceFunctionalTestData::$testContainerNames as $name)  {
            $this->safeCreateContainer($name);
        }

        if (!$hasRoot) {
            $this->safeCreateContainer('$root');
        }

        if (!self::$isOneTimeSetup) {
            self::$isOneTimeSetup = true;
        }
    }

    public function tearDown()
    {
        foreach(BlobServiceFunctionalTestData::$testContainerNames as $name)  {
            $this->safeDeleteContainer($name);
        }
        parent::tearDown();
    }

    public static function tearDownAfterClass()
    {
        if (self::$isOneTimeSetup) {
            $tmp = new FunctionalTestBase();
            $tmp->setUp();
            $tmp->safeDeleteContainer('$root');
            self::$isOneTimeSetup = false;
        }
        parent::tearDownAfterClass();
    }

    /**
     * @covers WindowsAzure\Blob\BlobRestProxy::deleteBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::listBlobs
     */
    private function safeDeleteContainerContents($name)
    {
        $blobListResult = $this->restProxy->listBlobs($name);
        foreach($blobListResult->getBlobs() as $blob)  {
            try {
                $this->restProxy->deleteBlob($name, $blob->getName());
            } catch (ServiceException $e) {
                error_log($e->getMessage());
            }
        }
    }

    /**
     * @covers WindowsAzure\Blob\BlobRestProxy::deleteContainer
     */
    private function safeDeleteContainer($name)
    {
        try {
            $this->restProxy->deleteContainer($name);
        } catch (ServiceException $e) {
            error_log($e->getMessage());
        }
    }

    /**
     * @covers WindowsAzure\Blob\BlobRestProxy::createContainer
     */
    private function safeCreateContainer($name)
    {
        try {
            $this->restProxy->createContainer($name);
        } catch (ServiceException $e) {
            error_log($e->getMessage());
        }
    }
}


