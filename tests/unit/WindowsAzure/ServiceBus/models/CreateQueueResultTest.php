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
 * @package   Tests\Unit\WindowsAzure\Services\Queue\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */

namespace Tests\Unit\WindowsAzure\ServiceBus\Models;
use WindowsAzure\ServiceBus\Models\CreateQueueResult;
use WindowsAzure\ServiceBus\Models\QueueDescription;

/**
 * Unit tests for class WrapAccessTokenResult
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\Services\Queue\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
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
     * @covers WindowsAzure\ServiceBus\Models\CreateQueueResult::getQueueDescription
     * @covers WindowsAzure\ServiceBus\Models\CreateQueueResult::setQueueDescription
     */
    public function testCreateQueueResultGetSetQueueDescription()
    {
        // Setup
        $createQueueResult = new CreateQueueResult();
        $expected = new QueueDescription();
        
        // Test
        $createQueueResult->setQueueDescription($expected);
        $actual = $createQueueResult->getQueueDescription(); 

        // Assert
        $this->assertEquals(
            $expected,
            $actual
        );
    }
    
}

?>
