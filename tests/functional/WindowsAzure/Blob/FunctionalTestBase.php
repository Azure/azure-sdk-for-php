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
 * @package    Tests\Functional\WindowsAzure\Blob
 * @author     Jason Cooke <jcooke@microsoft.com>
 * @copyright  2012 Microsoft Corporation
 * @license    http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link       http://pear.php.net/package/azure-sdk-for-php
 */

namespace Tests\Functional\WindowsAzure\Blob;

use Tests\Framework\FiddlerFilter;
use Tests\Framework\BlobServiceRestProxyTestBase;
use Tests\Framework\TestResources;
use Tests\Functional\WindowsAzure\Blob\BlobServiceFunctionalTestData;
use WindowsAzure\Common\ServiceException;


use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\Common\Configuration;
use WindowsAzure\Blob\BlobService;
use WindowsAzure\Blob\BlobSettings;

class FunctionalTestBase extends BlobServiceRestProxyTestBase
{

    /**
     * @covers WindowsAzure\Blob\BlobRestProxy::withFilter
     */
    public function __construct()
    {
        parent::__construct();
        $fiddlerFilter = new FiddlerFilter();
        $this->restProxy = $this->restProxy->withFilter($fiddlerFilter);
    }

    /**
     * @covers WindowsAzure\Blob\BlobRestProxy::createContainer
     * @covers WindowsAzure\Blob\BlobRestProxy::deleteContainer
     * @covers WindowsAzure\Blob\BlobRestProxy::listContainers
     */
    public function setUp()
    {
        parent::setUp();
        $accountName = $this->config->getProperty(BlobSettings::URI);
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

        foreach(BlobServiceFunctionalTestData::$TEST_CONTAINER_NAMES as $name)  {
            $this->safeCreateContainer($name);
        }

        if (!$hasRoot) {
            $this->safeCreateContainer('$root');
        }
    }

    /**
     * @covers WindowsAzure\Blob\BlobRestProxy::deleteContainer
     */
    public function tearDown()
    {
        foreach(BlobServiceFunctionalTestData::$TEST_CONTAINER_NAMES as $name)  {
            $this->restProxy->deleteContainer($name);
        }
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
            }
            catch (ServiceException $e) {
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
        }
        catch (ServiceException $e) {
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
        }
        catch (ServiceException $e) {
            error_log($e->getMessage());
        }
    }
}

?>
