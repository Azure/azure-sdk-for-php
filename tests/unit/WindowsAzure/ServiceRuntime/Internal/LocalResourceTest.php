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

use WindowsAzure\ServiceRuntime\Internal\LocalResource;

/**
 * Unit tests for class LocalResource.
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
class LocalResourceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \WindowsAzure\ServiceRuntime\Internal\LocalResource::__construct
     * @covers \WindowsAzure\ServiceRuntime\Internal\LocalResource::getMaximumSizeInMegabytes
     */
    public function testGetMaximumSizeInMegabytes()
    {
        // Setup
        $localResource = new LocalResource(1, 'local', 'path');

        // Test
        $this->assertEquals(1, $localResource->getMaximumSizeInMegabytes());
    }

    /**
     * @covers \WindowsAzure\ServiceRuntime\Internal\LocalResource::getName
     */
    public function testGetName()
    {
        // Setup
        $localResource = new LocalResource(1, 'local', 'path');

        // Test
        $this->assertEquals('local', $localResource->getName());
    }

    /**
     * @covers \WindowsAzure\ServiceRuntime\Internal\LocalResource::getRootPath
     */
    public function testGetRootPath()
    {
        // Setup
        $localResource = new LocalResource(1, 'local', 'path');

        // Test
        $this->assertEquals('path', $localResource->getRootPath());
    }
}
