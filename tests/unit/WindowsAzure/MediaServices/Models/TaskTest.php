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

use WindowsAzure\MediaServices\Models\Task;

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
class TaskTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \WindowsAzure\MediaServices\Models\Task::__construct
     */
    public function test__construct()
    {

        // Setup
        $mediaProcessorId = 'ksfjdgkd56';
        $taskBody = 'task body';
        $options = 42;

        // Test
        $task = new Task($taskBody, $mediaProcessorId, $options);

        // Assert
        $this->assertEquals($mediaProcessorId, $task->getMediaProcessorId());
        $this->assertEquals($taskBody, $task->getTaskBody());
        $this->assertEquals($options, $task->getOptions());
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\Task::createFromOptions
     * @covers \WindowsAzure\MediaServices\Models\Task::fromArray
     */
    public function testCreateFromOptions()
    {

        // Setup
        $errorDetail = [
             'Code' => 404,
             'Message' => 'Required task not found',
        ];
        $historicalEvent = [
             'Code' => 404,
             'Message' => 'Required task not found',
             'TimeStamp' => '2013-11-27',
        ];
        $options = [
                'Id' => 'jdfghrf78',
                'Configuration' => 'some configuration',
                'EndTime' => '2013-12-27',
                'MediaProcessorId' => 'uy47ytu',
                'Name' => 'Task name',
                'PerfMessage' => 'performance message',
                'Priority' => 1,
                'Progress' => 99.62,
                'RunningDuration' => 32.12,
                'StartTime' => '2013-11-27',
                'State' => Task::STATE_ACTIVE,
                'TaskBody' => 'body of the task',
                'Options' => 42,
                'EncryptionKeyId' => '90key80',
                'EncryptionScheme' => 'encryption scheme',
                'EncryptionVersion' => 'version 2.1.1',
                'InitializationVector' => 'Initialization Vector',
                'ErrorDetails' => [$errorDetail],
                'HistoricalEvents' => [$historicalEvent],
        ];
        $endTime = new \Datetime($options['EndTime']);
        $startTime = new \Datetime($options['StartTime']);
        $timeStamp = new \DateTime($historicalEvent['TimeStamp']);

        // Test
        $task = Task::createFromOptions($options);

        // Assert
        $taskErrorDetail = $task->getErrorDetails();
        $taskHistoricalEvent = $task->getHistoricalEvents();

        $this->assertEquals($options['Id'], $task->getId());
        $this->assertEquals($options['Configuration'], $task->getConfiguration());
        $this->assertEquals($endTime->getTimestamp(), $task->getEndTime()->getTimestamp());
        $this->assertEquals($options['MediaProcessorId'], $task->getMediaProcessorId());
        $this->assertEquals($options['Name'], $task->getName());
        $this->assertEquals($options['PerfMessage'], $task->getPerfMessage());
        $this->assertEquals($options['Priority'], $task->getPriority());
        $this->assertEquals($options['Progress'], $task->getProgress());
        $this->assertEquals($options['RunningDuration'], $task->getRunningDuration());
        $this->assertEquals($startTime->getTimestamp(), $task->getStartTime()->getTimestamp());
        $this->assertEquals($options['State'], $task->getState());
        $this->assertEquals($options['TaskBody'], $task->getTaskBody());
        $this->assertEquals($options['Options'], $task->getOptions());
        $this->assertEquals($options['EncryptionKeyId'], $task->getEncryptionKeyId());
        $this->assertEquals($options['EncryptionScheme'], $task->getEncryptionScheme());
        $this->assertEquals($options['EncryptionVersion'], $task->getEncryptionVersion());
        $this->assertEquals($options['InitializationVector'], $task->getInitializationVector());
        $this->assertEquals($errorDetail['Code'], $taskErrorDetail[0]->getCode());
        $this->assertEquals($errorDetail['Message'], $taskErrorDetail[0]->getMessage());
        $this->assertEquals($historicalEvent['Code'], $taskHistoricalEvent[0]->getCode());
        $this->assertEquals($historicalEvent['Message'], $taskHistoricalEvent[0]->getMessage());
        $this->assertEquals($timeStamp->getTimestamp(), $taskHistoricalEvent[0]->getTimeStamp()->getTimestamp());
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\Task::getId
     */
    public function testGetId()
    {

        // Setup
        $options = [
                'Id' => 'jdfghrf78',
                'MediaProcessorId' => 'uy47ytu',
                'TaskBody' => 'body of the task',
                'Options' => 42,
        ];
        $task = Task::createFromOptions($options);

        // Test
        $result = $task->getId();

        // Assert
        $this->assertEquals($options['Id'], $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\Task::getConfiguration
     * @covers \WindowsAzure\MediaServices\Models\Task::setConfiguration
     */
    public function testGetSetConfiguration()
    {

        // Setup
        $options = [
                'MediaProcessorId' => 'uy47ytu',
                'TaskBody' => 'body of the task',
                'Options' => 42,
        ];
        $task = Task::createFromOptions($options);
        $config = 'configuration of task';

        // Test
        $task->setConfiguration($config);
        $result = $task->getConfiguration();

        // Assert
        $this->assertEquals($config, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\Task::getEndTime
     */
    public function testGetEndTime()
    {

        // Setup
        $options = [
                'EndTime' => '2013-12-27',
                'MediaProcessorId' => 'uy47ytu',
                'TaskBody' => 'body of the task',
                'Options' => 42,
        ];
        $task = Task::createFromOptions($options);
        $endTime = new \Datetime($options['EndTime']);

        // Test
        $result = $task->getEndTime();

        // Assert
        $this->assertEquals($endTime->getTimestamp(), $result->getTimestamp());
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\Task::getMediaProcessorId
     * @covers \WindowsAzure\MediaServices\Models\Task::setMediaProcessorId
     */
    public function testGetSetMediaProcessorId()
    {

        // Setup
        $options = [
                'MediaProcessorId' => 'uy47ytu',
                'TaskBody' => 'body of the task',
                'Options' => 42,
        ];
        $task = Task::createFromOptions($options);
        $mediaProcId = 'kdfjg57';

        // Test
        $task->setMediaProcessorId($mediaProcId);
        $result = $task->getMediaProcessorId();

        // Assert
        $this->assertEquals($mediaProcId, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\Task::getName
     * @covers \WindowsAzure\MediaServices\Models\Task::setName
     */
    public function testGetSetName()
    {

        // Setup
        $options = [
                'MediaProcessorId' => 'uy47ytu',
                'TaskBody' => 'body of the task',
                'Options' => 42,
        ];
        $task = Task::createFromOptions($options);
        $name = 'task name';

        // Test
        $task->setName($name);
        $result = $task->getName();

        // Assert
        $this->assertEquals($name, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\Task::getPerfMessage
     */
    public function testGetPerfMessage()
    {

        // Setup
        $options = [
                'MediaProcessorId' => 'uy47ytu',
                'TaskBody' => 'body of the task',
                'Options' => 42,
                'PerfMessage' => 'performance message',
        ];
        $task = Task::createFromOptions($options);

        // Test
        $result = $task->getPerfMessage();

        // Assert
        $this->assertEquals($options['PerfMessage'], $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\Task::getPriority
     * @covers \WindowsAzure\MediaServices\Models\Task::setPriority
     */
    public function testGetSetPriority()
    {

        // Setup
        $options = [
                'MediaProcessorId' => 'uy47ytu',
                'TaskBody' => 'body of the task',
                'Options' => 42,
        ];
        $task = Task::createFromOptions($options);
        $priority = 1;

        // Test
        $task->setPriority($priority);
        $result = $task->getPriority();

        // Assert
        $this->assertEquals($priority, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\Task::getProgress
     */
    public function testGetProgress()
    {

        // Setup
        $options = [
                'MediaProcessorId' => 'uy47ytu',
                'TaskBody' => 'body of the task',
                'Options' => 42,
                'Progress' => 65.29,
        ];
        $task = Task::createFromOptions($options);

        // Test
        $result = $task->getProgress();

        // Assert
        $this->assertEquals($options['Progress'], $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\Task::getRunningDuration
     */
    public function testGetRunningDuration()
    {

        // Setup
        $options = [
                'MediaProcessorId' => 'uy47ytu',
                'TaskBody' => 'body of the task',
                'Options' => 42,
                'RunningDuration' => 5.3,
        ];
        $task = Task::createFromOptions($options);

        // Test
        $result = $task->getRunningDuration();

        // Assert
        $this->assertEquals($options['RunningDuration'], $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\Task::getStartTime
     */
    public function testGetStartTime()
    {

        // Setup
        $options = [
                'StartTime' => '2013-11-27',
                'MediaProcessorId' => 'uy47ytu',
                'TaskBody' => 'body of the task',
                'Options' => 42,
        ];
        $task = Task::createFromOptions($options);
        $startTime = new \Datetime($options['StartTime']);

        // Test
        $result = $task->getStartTime();

        // Assert
        $this->assertEquals($startTime->getTimestamp(), $result->getTimestamp());
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\Task::getState
     */
    public function testGetState()
    {

        // Setup
        $options = [
                'MediaProcessorId' => 'uy47ytu',
                'TaskBody' => 'body of the task',
                'Options' => 42,
                'State' => Task::STATE_RUNNING,
        ];
        $task = Task::createFromOptions($options);

        // Test
        $result = $task->getState();

        // Assert
        $this->assertEquals($options['State'], $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\Task::getTaskBody
     * @covers \WindowsAzure\MediaServices\Models\Task::setTaskBody
     */
    public function testGetSetTaskBody()
    {

        // Setup
        $options = [
                'MediaProcessorId' => 'uy47ytu',
                'TaskBody' => 'body of the task',
                'Options' => 42,
        ];
        $task = Task::createFromOptions($options);
        $taskBody = 'new body of task';

        // Test
        $task->setTaskBody($taskBody);
        $result = $task->getTaskBody();

        // Assert
        $this->assertEquals($taskBody, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\Task::getOptions
     */
    public function testGetOptions()
    {

        // Setup
        $options = [
                'MediaProcessorId' => 'uy47ytu',
                'TaskBody' => 'body of the task',
                'Options' => 42,
                'State' => Task::STATE_RUNNING,
        ];
        $task = Task::createFromOptions($options);

        // Test
        $result = $task->getOptions();

        // Assert
        $this->assertEquals($options['Options'], $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\Task::getEncryptionKeyId
     * @covers \WindowsAzure\MediaServices\Models\Task::setEncryptionKeyId
     */
    public function testGetSetEncryptionKeyId()
    {

        // Setup
        $options = [
                'MediaProcessorId' => 'uy47ytu',
                'TaskBody' => 'body of the task',
                'Options' => 42,
        ];
        $task = Task::createFromOptions($options);
        $encrKeyId = '45key89';

        // Test
        $task->setEncryptionKeyId($encrKeyId);
        $result = $task->getEncryptionKeyId();

        // Assert
        $this->assertEquals($encrKeyId, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\Task::getEncryptionScheme
     * @covers \WindowsAzure\MediaServices\Models\Task::setEncryptionScheme
     */
    public function testGetSetEncryptionScheme()
    {

        // Setup
        $options = [
                'MediaProcessorId' => 'uy47ytu',
                'TaskBody' => 'body of the task',
                'Options' => 42,
        ];
        $task = Task::createFromOptions($options);
        $encrScheme = 'encryption scheme';

        // Test
        $task->setEncryptionScheme($encrScheme);
        $result = $task->getEncryptionScheme();

        // Assert
        $this->assertEquals($encrScheme, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\Task::getEncryptionVersion
     * @covers \WindowsAzure\MediaServices\Models\Task::setEncryptionVersion
     */
    public function testGetSetEncryptionVersion()
    {

        // Setup
        $options = [
                'MediaProcessorId' => 'uy47ytu',
                'TaskBody' => 'body of the task',
                'Options' => 42,
        ];
        $task = Task::createFromOptions($options);
        $encrVersion = '3.6.1';

        // Test
        $task->setEncryptionVersion($encrVersion);
        $result = $task->getEncryptionVersion();

        // Assert
        $this->assertEquals($encrVersion, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\Task::getInitializationVector
     * @covers \WindowsAzure\MediaServices\Models\Task::setInitializationVector
     */
    public function testGetSetInitializationVector()
    {

        // Setup
        $options = [
                'MediaProcessorId' => 'uy47ytu',
                'TaskBody' => 'body of the task',
                'Options' => 42,
        ];
        $task = Task::createFromOptions($options);
        $initVector = 'initialization vector';

        // Test
        $task->setInitializationVector($initVector);
        $result = $task->getInitializationVector();

        // Assert
        $this->assertEquals($initVector, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\Task::getErrorDetails
     */
    public function testGetErrorDetail()
    {

        // Setup
        $errorDetail = [
                'Code' => 404,
                'Message' => 'Required task not found',
        ];
        $options = [
                'MediaProcessorId' => 'uy47ytu',
                'TaskBody' => 'body of the task',
                'Options' => 42,
                'ErrorDetails' => [$errorDetail],
        ];
        $task = Task::createFromOptions($options);

        // Test
        $result = $task->getErrorDetails();

        // Assert
        $this->assertEquals($errorDetail['Code'], $result[0]->getCode());
        $this->assertEquals($errorDetail['Message'], $result[0]->getMessage());
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\Task::getHistoricalEvents
     */
    public function testGetHistoricalEvents()
    {

        // Setup
         $historicalEvent = [
             'Code' => 404,
             'Message' => 'Required task not found',
             'TimeStamp' => '2013-12-10',
         ];
        $options = [
                'MediaProcessorId' => 'uy47ytu',
                'TaskBody' => 'body of the task',
                'Options' => 42,
                'HistoricalEvents' => [$historicalEvent],
        ];
        $task = Task::createFromOptions($options);
        $date = new \Datetime($historicalEvent['TimeStamp']);

        // Test
        $result = $task->getHistoricalEvents();

        // Assert
        $this->assertEquals($historicalEvent['Code'], $result[0]->getCode());
        $this->assertEquals($historicalEvent['Message'], $result[0]->getMessage());
        $this->assertEquals($date->getTimestamp(), $result[0]->getTimeStamp()->getTimestamp());
    }
}
