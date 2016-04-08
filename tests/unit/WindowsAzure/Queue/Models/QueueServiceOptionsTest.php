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
 * @package   Tests\Unit\WindowsAzure\Queue\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace Tests\Unit\WindowsAzure\Queue\Models;
use WindowsAzure\Queue\Models\QueueServiceOptions;

/**
 * Unit tests for class QueueServiceOptions
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\Queue\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.4.2_2016-04
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class QueueServiceOptionsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\Queue\Models\QueueServiceOptions::setTimeout
     */
    public function testSetTimeout()
    {
        // Setup
        $options = new QueueServiceOptions();
        $value = 10;
        
        // Test
        $options->setTimeout($value);
        
        // Assert
        $this->assertEquals($value, $options->getTimeout());
    }
    
    /**
     * @covers WindowsAzure\Queue\Models\QueueServiceOptions::getTimeout
     */
    public function testGetTimeout()
    {
        // Setup
        $options = new QueueServiceOptions();
        $value = 10;
        $options->setTimeout($value);
        
        // Test
        $actualValue = $options->getTimeout();
        
        // Assert
        $this->assertEquals($value, $actualValue);
    }
}


