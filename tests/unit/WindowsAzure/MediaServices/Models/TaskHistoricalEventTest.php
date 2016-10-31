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
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace Tests\unit\WindowsAzure\MediaServices\Models;

use WindowsAzure\MediaServices\Models\TaskHistoricalEvent;

/**
 * Represents access policy object used in media services.
 *
 * @category  Microsoft
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @version   Release: 0.5.0_2016-11
 *
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class TaskHistoricalEventTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \WindowsAzure\MediaServices\Models\TaskHistoricalEvent::createFromOptions
     * @covers \WindowsAzure\MediaServices\Models\TaskHistoricalEvent::fromArray
     */
    public function testCreateFromOptions()
    {

        // Setup
        $options = [
                'Code' => 123456,
                'Message' => 'some message',
                'TimeStamp' => '2013-11-27',
        ];
        $time = new \Datetime($options['TimeStamp']);

        // Test
        $histEvent = TaskHistoricalEvent::createFromOptions($options);

        // Assert
        $this->assertEquals($options['Code'], $histEvent->getCode());
        $this->assertEquals($options['Message'], $histEvent->getMessage());
        $this->assertEquals($time->getTimestamp(), $histEvent->getTimeStamp()->getTimestamp());
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\TaskHistoricalEvent::getTimeStamp
     * @covers \WindowsAzure\MediaServices\Models\TaskHistoricalEvent::__construct
     */
    public function testGetTimeStamp()
    {

        // Setup
        $options = [
                'TimeStamp' => '2013-11-27',
        ];
        $time = new \Datetime($options['TimeStamp']);
        $histEvent = TaskHistoricalEvent::createFromOptions($options);

        // Test
        $result = $histEvent->getTimeStamp();

        // Assert
        $this->assertEquals($time->getTimestamp(), $result->getTimestamp());
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\TaskHistoricalEvent::getMessage
     */
    public function testGetMessage()
    {

        // Setup
        $options = [
                'Message' => 'some message',
        ];
        $histEvent = TaskHistoricalEvent::createFromOptions($options);

        // Test
        $result = $histEvent->getMessage();

        // Assert
        $this->assertEquals($options['Message'], $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\TaskHistoricalEvent::getCode
     */
    public function testGetCode()
    {

        // Setup
        $options = [
                'Code' => 654,
        ];
        $histEvent = TaskHistoricalEvent::createFromOptions($options);

        // Test
        $result = $histEvent->getCode();

        // Assert
        $this->assertEquals($options['Code'], $result);
    }
}
