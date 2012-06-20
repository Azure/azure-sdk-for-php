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
 * @package   Tests\Unit\WindowsAzure\ServiceBus\Models\
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/WindowsAzure/azure-sdk-for-php
 */

namespace Tests\Unit\WindowsAzure\ServiceBus\Models\Models;
use WindowsAzure\ServiceBus\Models\CreateQueueResult;
use WindowsAzure\ServiceBus\Models\QueueInfo;

/**
 * Unit tests for class WrapAccessTokenResult
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\ServiceBus\Models\
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      https://github.com/WindowsAzure/azure-sdk-for-php
 */
class CreateQueueResultTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\ServiceBus\Models\CreateQueueResult::__construct
     */
    public function testCreateQueueResult()
    {
        // Setup
        
        // Test
        $createQueueResult = new CreateQueueResult();
        
        // Assert
        $this->assertNotNull($createQueueResult);
    }

    /**
     * @covers WindowsAzure\ServiceBus\Models\CreateQueueResult::getQueueInfo
     * @covers WindowsAzure\ServiceBus\Models\CreateQueueResult::setQueueInfo
     */
    public function testCreateQueueResultGetSetQueueInfo()
    {
        // Setup
        $createQueueResult = new CreateQueueResult();
        $expected = new QueueInfo();
        
        // Test
        $createQueueResult->setQueueInfo($expected);
        $actual = $createQueueResult->getQueueInfo(); 

        // Assert
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers WindowsAzure\ServiceBus\Models\CreateQueueResult::getQueueInfo
     * @covers WindowsAzure\ServiceBus\Models\CreateQueueResult::setQueueInfo
     */
    public function testGetSetQueueInfo() {
        // Setup
        $expected = 'testQueueInfo';
        $className = new CreateQueueResult();

        // Test
        $className->setQueueInfo($expected);
        $actual = $className->getQueueInfo();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );

    }

    
}

?>
