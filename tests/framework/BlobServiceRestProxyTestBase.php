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
 * @package   Tests\Framework
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace Tests\Framework;
use Tests\Framework\ServiceRestProxyTestBase;
use Tests\Framework\TestResources;
use WindowsAzure\Blob\Models\CreateContainerOptions;
use WindowsAzure\Blob\Models\ListContainersOptions;

/**
 * TestBase class for each unit test class.
 *
 * @category  Microsoft
 * @package   Tests\Framework
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class BlobServiceRestProxyTestBase extends ServiceRestProxyTestBase
{
    protected $_createdContainers;
    
    public function setUp()
    {
        $blobRestProxy = $this->builder->createBlobService(TestResources::getStorageServicesConnectionString());
        parent::setUp($blobRestProxy);
        $this->_createdContainers = array();
    }
    
    public function createContainer($containerName, $options = null)
    {
        if (is_null($options)) {
            $options = new CreateContainerOptions();
            $options->setPublicAccess('container');
        }
        
        $this->restProxy->createContainer($containerName, $options);
        $this->_createdContainers[] = $containerName;
    }

    public function createContainers($containerList, $containerPrefix = null) {
        $containers = $this->listContainers($containerPrefix);
        foreach($containerList as $container) {
            if (array_search($container, $containers) === FALSE) {
                $this->createContainer($container);
            } else {
                $listResults = $this->restProxy->listBlobs($container);
                $blobs = $listResults->getBlobs();
                foreach($blobs as $blob)  {
                    try
                    {
                        $this->restProxy->deleteBlob($container, $blob->getName());
                    }
                    catch (\Exception $e)
                    {
                        // Ignore exception and continue.
                        error_log($e->getMessage());
                    }
                }
            }
        }
    }

    public function deleteContainer($containerName)
    {
        $this->restProxy->deleteContainer($containerName);
    }

    public function deleteContainers($containerList, $containerPrefix = null) {
        $containers = $this->listContainers($containerPrefix);
        foreach($containerList as $container)  {
            if (!(array_search($container, $containers) === FALSE)) {
                $this->deleteContainer($container);
            }
        }
    }

    public function listContainers($containerPrefix = null) {
        $result = array();
        $opts = new ListContainersOptions();
        if (!is_null($containerPrefix)) {
            $opts->setPrefix($containerPrefix);
        }

        $list = $this->restProxy->listContainers($opts);
        foreach($list->getContainers() as $item)  {
            array_push($result, $item->getName());
        }

        return $result;
    }

    protected function tearDown()
    {
        parent::tearDown();
        
        foreach ($this->_createdContainers as $value) {
            try
            {
                $this->deleteContainer($value);
            }
            catch (\Exception $e)
            {
                // Ignore exception and continue, will assume that this container doesn't exist in the sotrage account
                error_log($e->getMessage());
            }
        }
    }
}

?>
