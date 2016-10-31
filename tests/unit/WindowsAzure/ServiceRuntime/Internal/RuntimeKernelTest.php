<?php

/**
 * LICENSE: Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * http://www.apache.org/licenses/LICENSE-2.0.
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
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace Tests\unit\WindowsAzure\ServiceRuntime\Internal;

use WindowsAzure\ServiceRuntime\Internal\RuntimeKernel;

/**
 * Unit tests for class RuntimeKernel.
 *
 * @category  Microsoft
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @version   Release: 0.5.0_2016-11
 *
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class RuntimeKernelTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \WindowsAzure\ServiceRuntime\Internal\RuntimeKernel::__construct
     * @covers \WindowsAzure\ServiceRuntime\Internal\RuntimeKernel::getKernel
     */
    public function testGetKernel()
    {
        // Setup
        $runtimeKernel = RuntimeKernel::getKernel(true);

        // Test
        $this->assertInstanceOf(
            'WindowsAzure\ServiceRuntime\Internal\RuntimeKernel', $runtimeKernel);
    }

    /**
     * @covers \WindowsAzure\ServiceRuntime\Internal\RuntimeKernel::getCurrentStateSerializer
     */
    public function testGetCurrentStateSerializer()
    {
        // Setup
        $runtimeKernel = RuntimeKernel::getKernel();

        // Test
        $this->assertInstanceOf(
            'WindowsAzure\ServiceRuntime\Internal\XmlCurrentStateSerializer',
            $runtimeKernel->getCurrentStateSerializer());
    }

    /**
     * @covers \WindowsAzure\ServiceRuntime\Internal\RuntimeKernel::getGoalStateDeserializer
     */
    public function testGetGoalStateDeserializer()
    {
        // Setup
        $runtimeKernel = RuntimeKernel::getKernel();

        // Test
        $this->assertInstanceOf(
            'WindowsAzure\ServiceRuntime\Internal\ChunkedGoalStateDeserializer',
            $runtimeKernel->getGoalStateDeserializer());
    }

    /**
     * @covers \WindowsAzure\ServiceRuntime\Internal\RuntimeKernel::getInputChannel
     */
    public function testGetInputChannel()
    {
        // Setup
        $runtimeKernel = RuntimeKernel::getKernel();

        // Test
        $this->assertInstanceOf(
            'WindowsAzure\ServiceRuntime\Internal\FileInputChannel',
            $runtimeKernel->getInputChannel());
    }

    /**
     * @covers \WindowsAzure\ServiceRuntime\Internal\RuntimeKernel::getOutputChannel
     */
    public function testGetOutputChannel()
    {
        // Setup
        $runtimeKernel = RuntimeKernel::getKernel();

        // Test
        $this->assertInstanceOf(
            'WindowsAzure\ServiceRuntime\Internal\FileOutputChannel',
            $runtimeKernel->getOutputChannel());
    }

    /**
     * @covers \WindowsAzure\ServiceRuntime\Internal\RuntimeKernel::getProtocol1RuntimeCurrentStateClient
     */
    public function testGetProtocol1RuntimeCurrentStateClient()
    {
        // Setup
        $runtimeKernel = RuntimeKernel::getKernel();

        // Test
        $this->assertInstanceOf(
            'WindowsAzure\ServiceRuntime\Internal\Protocol1RuntimeCurrentStateClient',
            $runtimeKernel->getProtocol1RuntimeCurrentStateClient());
    }

    /**
     * @covers \WindowsAzure\ServiceRuntime\Internal\RuntimeKernel::getRoleEnvironmentDataDeserializer
     */
    public function testGetRoleEnvironmentDataDeserializer()
    {
        // Setup
        $runtimeKernel = RuntimeKernel::getKernel();

        // Test
        $this->assertInstanceOf(
            'WindowsAzure\ServiceRuntime\Internal\XmlRoleEnvironmentDataDeserializer',
            $runtimeKernel->getRoleEnvironmentDataDeserializer());
    }

    /**
     * @covers \WindowsAzure\ServiceRuntime\Internal\RuntimeKernel::getProtocol1RuntimeGoalStateClient
     */
    public function testGetProtocol1RuntimeGoalStateClient()
    {
        // Setup
        $runtimeKernel = RuntimeKernel::getKernel();

        // Test
        $this->assertInstanceOf(
            'WindowsAzure\ServiceRuntime\Internal\Protocol1RuntimeGoalStateClient',
            $runtimeKernel->getProtocol1RuntimeGoalStateClient());
    }

    /**
     * @covers \WindowsAzure\ServiceRuntime\Internal\RuntimeKernel::getRuntimeVersionProtocolClient
     */
    public function testGetRuntimeVersionProtocolClient()
    {
        // Setup
        $runtimeKernel = RuntimeKernel::getKernel();

        // Test
        $this->assertInstanceOf(
            'WindowsAzure\ServiceRuntime\Internal\RuntimeVersionProtocolClient',
            $runtimeKernel->getRuntimeVersionProtocolClient());
    }

    /**
     * @covers \WindowsAzure\ServiceRuntime\Internal\RuntimeKernel::getRuntimeVersionManager
     */
    public function testGetRuntimeVersionManager()
    {
        // Setup
        $runtimeKernel = RuntimeKernel::getKernel();

        // Test
        $this->assertInstanceOf(
            'WindowsAzure\ServiceRuntime\Internal\RuntimeVersionManager',
            $runtimeKernel->getRuntimeVersionManager());
    }
}
