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
use PEAR2\WindowsAzure\ServiceRuntime\RuntimeKernel;

/**
 * Unit tests for class RuntimeKernel
 *
 * @category  Microsoft
 * @package   PEAR2\Tests\Unit\WindowsAzure\ServiceRuntime
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class RuntimeKernelTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers PEAR2\WindowsAzure\ServiceRuntime\RuntimeKernel::__construct
     * @covers PEAR2\WindowsAzure\ServiceRuntime\RuntimeKernel::getKernel
     */
    public function testGetKernel()
    {
        // Setup
        $runtimeKernel = RuntimeKernel::getKernel(true);
        
        // Test
        $this->assertInstanceOf(
            'PEAR2\\WindowsAzure\\ServiceRuntime\\RuntimeKernel', $runtimeKernel);
    }
    
    /**
     * @covers PEAR2\WindowsAzure\ServiceRuntime\RuntimeKernel::getCurrentStateSerializer
     */
    public function testGetCurrentStateSerializer()
    {
        // Setup
        $runtimeKernel = RuntimeKernel::getKernel();
        
        // Test
        $this->assertInstanceOf(
            'PEAR2\\WindowsAzure\\ServiceRuntime\\XmlCurrentStateSerializer',
            $runtimeKernel->getCurrentStateSerializer());
    }
    
    /**
     * @covers PEAR2\WindowsAzure\ServiceRuntime\RuntimeKernel::getGoalStateDeserializer
     */
    public function testGetGoalStateDeserializer()
    {
        // Setup
        $runtimeKernel = RuntimeKernel::getKernel();
        
        // Test
        $this->assertInstanceOf(
            'PEAR2\\WindowsAzure\\ServiceRuntime\\ChunkedGoalStateDeserializer',
            $runtimeKernel->getGoalStateDeserializer());
    }
    
    /**
     * @covers PEAR2\WindowsAzure\ServiceRuntime\RuntimeKernel::getInputChannel
     */
    public function testGetInputChannel()
    {
        // Setup
        $runtimeKernel = RuntimeKernel::getKernel();
        
        // Test
        $this->assertInstanceOf(
            'PEAR2\\WindowsAzure\\ServiceRuntime\\FileInputChannel',
            $runtimeKernel->getInputChannel());
    }
    
    /**
     * @covers PEAR2\WindowsAzure\ServiceRuntime\RuntimeKernel::getOutputChannel
     */
    public function testGetOutputChannel()
    {
        // Setup
        $runtimeKernel = RuntimeKernel::getKernel();
        
        // Test
        $this->assertInstanceOf(
            'PEAR2\\WindowsAzure\\ServiceRuntime\\FileOutputChannel',
            $runtimeKernel->getOutputChannel());
    }
    
    /**
     * @covers PEAR2\WindowsAzure\ServiceRuntime\RuntimeKernel::getProtocol1RuntimeCurrentStateClient
     */
    public function testGetProtocol1RuntimeCurrentStateClient()
    {
        // Setup
        $runtimeKernel = RuntimeKernel::getKernel();
        
        // Test
        $this->assertInstanceOf(
            'PEAR2\\WindowsAzure\\ServiceRuntime\\Protocol1RuntimeCurrentStateClient',
            $runtimeKernel->getProtocol1RuntimeCurrentStateClient());
    }
    
    /**
     * @covers PEAR2\WindowsAzure\ServiceRuntime\RuntimeKernel::getRoleEnvironmentDataDeserializer
     */
    public function testGetRoleEnvironmentDataDeserializer()
    {
        // Setup
        $runtimeKernel = RuntimeKernel::getKernel();
        
        // Test
        $this->assertInstanceOf(
            'PEAR2\\WindowsAzure\\ServiceRuntime\\XmlRoleEnvironmentDataDeserializer',
            $runtimeKernel->getRoleEnvironmentDataDeserializer());
    }
    
    /**
     * @covers PEAR2\WindowsAzure\ServiceRuntime\RuntimeKernel::getProtocol1RuntimeGoalStateClient
     */
    public function testGetProtocol1RuntimeGoalStateClient()
    {
        // Setup
        $runtimeKernel = RuntimeKernel::getKernel();
        
        // Test
        $this->assertInstanceOf(
            'PEAR2\\WindowsAzure\\ServiceRuntime\\Protocol1RuntimeGoalStateClient',
            $runtimeKernel->getProtocol1RuntimeGoalStateClient());
    }
    
    /**
     * @covers PEAR2\WindowsAzure\ServiceRuntime\RuntimeKernel::getRuntimeVersionProtocolClient
     */
    public function testGetRuntimeVersionProtocolClient()
    {
        // Setup
        $runtimeKernel = RuntimeKernel::getKernel();
        
        // Test
        $this->assertInstanceOf(
            'PEAR2\\WindowsAzure\\ServiceRuntime\\RuntimeVersionProtocolClient',
            $runtimeKernel->getRuntimeVersionProtocolClient());
    }

    /**
     * @covers PEAR2\WindowsAzure\ServiceRuntime\RuntimeKernel::getRuntimeVersionManager
     */
    public function testGetRuntimeVersionManager()
    {
        // Setup
        $runtimeKernel = RuntimeKernel::getKernel();
        
        // Test
        $this->assertInstanceOf(
            'PEAR2\\WindowsAzure\\ServiceRuntime\\RuntimeVersionManager',
            $runtimeKernel->getRuntimeVersionManager());
    }
}

?>