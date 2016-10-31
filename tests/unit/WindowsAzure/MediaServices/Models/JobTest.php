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

use WindowsAzure\MediaServices\Models\Job;

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
class JobTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \WindowsAzure\MediaServices\Models\Job::createFromOptions
     * @covers \WindowsAzure\MediaServices\Models\Job::fromArray
     */
    public function testCreateFromOptions()
    {

        // Setup
        $options = [
            'Id' => 'sfgsfg34',
            'Name' => 'SomeName',
            'Created' => '2013-11-25',
            'LastModified' => '2013-11-25',
            'EndTime' => '2013-12-25',
            'Priority' => 1,
            'RunningDuration' => 26.30,
            'StartTime' => '2013-11-26',
            'State' => Job::STATE_QUEUED,
            'TemplateId' => 'yudgf78',
        ];
        $created = new \Datetime($options['Created']);
        $modified = new \Datetime($options['LastModified']);
        $endTime = new \Datetime($options['EndTime']);
        $startTime = new \Datetime($options['StartTime']);

        // Test
        $job = Job::createFromOptions($options);

        // Assert
        $this->assertEquals($options['Id'], $job->getId());
        $this->assertEquals($options['Name'], $job->getName());
        $this->assertEquals($created->getTimestamp(), $job->getCreated()->getTimestamp());
        $this->assertEquals($modified->getTimestamp(), $job->getLastModified()->getTimestamp());
        $this->assertEquals($endTime->getTimestamp(), $job->getEndTime()->getTimestamp());
        $this->assertEquals($options['Priority'], $job->getPriority());
        $this->assertEquals($options['RunningDuration'], $job->getRunningDuration());
        $this->assertEquals($startTime->getTimestamp(), $job->getStartTime()->getTimestamp());
        $this->assertEquals($options['State'], $job->getState());
        $this->assertEquals($options['TemplateId'], $job->getTemplateId());
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\Job::getName
     * @covers \WindowsAzure\MediaServices\Models\Job::setName
     */
    public function testGetSetName()
    {

        // Setup
        $job = new Job();
        $name = 'New Name';

        // Test
        $job->setName($name);
        $result = $job->getName();

        // Assert
        $this->assertEquals($name, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\Job::getPriority
     * @covers \WindowsAzure\MediaServices\Models\Job::setPriority
     */
    public function testGetSetPriority()
    {

        // Setup
        $job = new Job();
        $priority = 2;

        // Test
        $job->setPriority($priority);
        $result = $job->getPriority();

        // Assert
        $this->assertEquals($priority, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\Job::getTemplateId
     * @covers \WindowsAzure\MediaServices\Models\Job::setTemplateId
     */
    public function testGetSetTemplateId()
    {

        // Setup
        $job = new Job();
        $templateId = 'sfgfg567';

        // Test
        $job->setTemplateId($templateId);
        $result = $job->getTemplateId();

        // Assert
        $this->assertEquals($templateId, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\Job::getId
     */
    public function testGetId()
    {

        // Setup
        $options = [
                'Id' => 'sfgsfg34',
        ];
        $job = Job::createFromOptions($options);

        // Test
        $result = $job->getId();

        // Assert
        $this->assertEquals($options['Id'], $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\Job::getCreated
     */
    public function testGetCreated()
    {

        // Setup
        $options = [
                'Created' => '2013-11-25',
        ];
        $created = new \Datetime($options['Created']);
        $job = Job::createFromOptions($options);

        // Test
        $result = $job->getCreated();

        // Assert
        $this->assertEquals($created->getTimestamp(), $result->getTimestamp());
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\Job::getLastModified
     */
    public function testGetLastModified()
    {

        // Setup
        $options = [
                'LastModified' => '2013-11-25',
        ];
        $modified = new \Datetime($options['LastModified']);
        $job = Job::createFromOptions($options);

        // Test
        $result = $job->getLastModified();

        // Assert
        $this->assertEquals($modified->getTimestamp(), $result->getTimestamp());
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\Job::getEndTime
     */
    public function testGetEndTime()
    {

        // Setup
        $options = [
                'EndTime' => '2013-12-25',
        ];
        $endTime = new \Datetime($options['EndTime']);
        $job = Job::createFromOptions($options);

        // Test
        $result = $job->getEndTime();

        // Assert
        $this->assertEquals($endTime->getTimestamp(), $result->getTimestamp());
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\Job::getStartTime
     */
    public function testGetStartTime()
    {

        // Setup
        $options = [
                'StartTime' => '2013-11-25',
        ];
        $startTime = new \Datetime($options['StartTime']);
        $job = Job::createFromOptions($options);

        // Test
        $result = $job->getStartTime();

        // Assert
        $this->assertEquals($startTime->getTimestamp(), $result->getTimestamp());
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\Job::getRunningDuration
     */
    public function testGetRunningDuration()
    {

        // Setup
        $job = new Job();
        $options = [
                'RunningDuration' => 25.30,
        ];
        $job = Job::createFromOptions($options);

        // Test
        $result = $job->getRunningDuration();

        // Assert
        $this->assertEquals($options['RunningDuration'], $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\Job::getState
     */
    public function testGetState()
    {

        // Setup
        $job = new Job();
        $options = [
                'State' => Job::STATE_QUEUED,
        ];
        $job = Job::createFromOptions($options);

        // Test
        $result = $job->getState();

        // Assert
        $this->assertEquals($options['State'], $result);
    }
}
