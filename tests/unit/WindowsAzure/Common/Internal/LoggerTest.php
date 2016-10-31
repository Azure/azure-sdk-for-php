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

namespace Tests\unit\WindowsAzure\Common\Internal;

use WindowsAzure\Common\Internal\Logger;
use WindowsAzure\Common\Internal\Resources;
use Tests\framework\VirtualFileSystem;

/**
 * Unit tests for class Logger.
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
class LoggerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \WindowsAzure\Common\Internal\Logger::log
     * @covers \WindowsAzure\Common\Internal\Logger::setLogFile
     */
    public function testLogWithArray()
    {
        // Setup
        $virtualPath = VirtualFileSystem::newFile(Resources::EMPTY_STRING);
        $tip = 'This is array';
        $expected = "$tip\nArray\n(\n)\n";
        Logger::setLogFile($virtualPath);

        // Test
        Logger::log([], $tip);

        // Assert
        $actual = file_get_contents($virtualPath);
        $this->assertEquals($expected, $actual);
    }

    /**
     * @covers \WindowsAzure\Common\Internal\Logger::log
     * @covers \WindowsAzure\Common\Internal\Logger::setLogFile
     */
    public function testLogWithString()
    {
        // Setup
        $virtualPath = VirtualFileSystem::newFile(Resources::EMPTY_STRING);
        $tip = 'This is string';
        $expected = "$tip\nI'm a string\n";
        Logger::setLogFile($virtualPath);

        // Test
        Logger::log('I\'m a string', $tip);

        // Assert
        $actual = file_get_contents($virtualPath);
        $this->assertEquals($expected, $actual);
    }
}
