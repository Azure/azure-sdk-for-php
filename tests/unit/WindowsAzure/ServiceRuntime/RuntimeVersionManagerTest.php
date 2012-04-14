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
 * @package   PEAR2\Tests\Unit\WindowsAzure\ServiceRuntime
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
namespace PEAR2\Tests\Unit\WindowsAzure\ServiceRuntime;
use PEAR2\Tests\Framework\TestResources;
use PEAR2\WindowsAzure\Core\WindowsAzureUtilities;
use PEAR2\WindowsAzure\ServiceRuntime\FileInputChannel;
use PEAR2\WindowsAzure\ServiceRuntime\RuntimeVersionProtocolClient;
use PEAR2\WindowsAzure\ServiceRuntime\RuntimeVersionManager;
use PEAR2\WindowsAzure\Resources;

/**
 * Unit tests for class RuntimeVersionManager.
 *
 * @category  Microsoft
 * @package   PEAR2\Tests\Unit\WindowsAzure\ServiceRuntime
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class RuntimeVersionManagerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers PEAR2\WindowsAzure\ServiceRuntime\RuntimeVersionManager::__construct
     */
    public function testConstruct()
    {
        // Setup
        $runtimeVersionManager = new RuntimeVersionManager(null);
        
        // Test
        $this->assertInstanceOf(
            'PEAR2\\WindowsAzure\\ServiceRuntime\\RuntimeVersionManager',
            $runtimeVersionManager);
    }
    
    /**
     * @covers PEAR2\WindowsAzure\ServiceRuntime\RuntimeVersionManager::getRuntimeClient
     */
    public function testGetRuntimeClient()
    {
        // Setup
        // Setup
        $rootDirectory = 'root';

        \vfsStreamWrapper::register(); 
        \vfsStreamWrapper::setRoot(new \vfsStreamDirectory($rootDirectory));
                
        $fileName = 'versionendpoint';
        $fileContent = '<?xml version="1.0" encoding="utf-8"?>' .
            '<RuntimeServerDiscovery xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" ' .
            'xmlns:xsd="http://www.w3.org/2001/XMLSchema">' .
            '<RuntimeServerEndpoints>' .
            '<RuntimeServerEndpoint version="2011-03-08" path="myPath1" />' .
            '</RuntimeServerEndpoints>' .
            '</RuntimeServerDiscovery>';
        
        $file = \vfsStream::newFile($fileName);
        $file->setContent($fileContent); 

        \vfsStreamWrapper::getRoot()->addChild($file);
        
        // Setup
        $runtimeVersionProtocolClient =
            new RuntimeVersionProtocolClient(new FileInputChannel());
        
        $runtimeVersionManager = new RuntimeVersionManager(
            $runtimeVersionProtocolClient
        );
        
        $runtimeClient = $runtimeVersionManager->getRuntimeClient(
            \vfsStream::url($rootDirectory . '/' . $fileName)
        );
        
        // Test
        $this->assertNotEquals(null, $runtimeClient);
    }
}

?>