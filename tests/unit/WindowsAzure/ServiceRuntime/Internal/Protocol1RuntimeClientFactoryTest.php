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

use WindowsAzure\ServiceRuntime\Internal\Protocol1RuntimeClientFactory;

/**
 * Unit tests for class Protocol1RuntimeClientFactory.
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
class Protocol1RuntimeClientFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \WindowsAzure\ServiceRuntime\Internal\Protocol1RuntimeClientFactory::getVersion
     */
    public function testGetVersion()
    {
        // Setup
        $protocol1RuntimeClientFactory =
            new Protocol1RuntimeClientFactory();

        // Test
        $this->assertEquals('2011-03-08', $protocol1RuntimeClientFactory->getVersion());
    }

    /**
     * @covers \WindowsAzure\ServiceRuntime\Internal\Protocol1RuntimeClientFactory::createRuntimeClient
     */
    public function testCreateRuntimeClient()
    {
        // Setup
        $protocol1RuntimeClientFactory =
            new Protocol1RuntimeClientFactory();

        $protocol1RuntimeClient = $protocol1RuntimeClientFactory
            ->createRuntimeClient('');

        // Test
        $this->assertInstanceOf(
            'WindowsAzure\ServiceRuntime\Internal\Protocol1RuntimeClient',
            $protocol1RuntimeClient
        );
    }
}
