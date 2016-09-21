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

use WindowsAzure\MediaServices\Models\JobTemplate;

/**
 * Represents access policy object used in media services.
 *
 * @category  Microsoft
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @version   Release: 0.4.5_2016-09
 *
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class JobTemplateTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\MediaServices\Models\JobTemplate::__construct
     */
    public function test__construct()
    {

        // Setup
        $jobTemplateBody = 'JobTemplateBody';

        // Test
        $jobTempl = new JobTemplate($jobTemplateBody);

        //Assert
        $this->assertEquals($jobTemplateBody, $jobTempl->getJobTemplateBody());
        $this->assertEquals(JobTemplate::TYPE_ACCOUNT_LEVEL, $jobTempl->getTemplateType());
    }

    /**
     * @covers WindowsAzure\MediaServices\Models\JobTemplate::createFromOptions
     * @covers WindowsAzure\MediaServices\Models\JobTemplate::fromArray
     */
    public function testCreateFromOptions()
    {

        // Setup
        $jobTemplateBody = 'JobTemplateBody';
        $templateType = JobTemplate::TYPE_ACCOUNT_LEVEL;
        $options = array(
                'Id' => 'sfgsfg34',
                'Name' => 'Some Name',
                'Created' => '2013-11-25',
                'LastModified' => '2013-11-25',
                'JobTemplateBody' => 'Some Body Of Job Template',
                'NumberofInputAssets' => 6,
                'TemplateType' => JobTemplate::TYPE_SYSTEM_LEVEL,
        );
        $created = new \Datetime($options['Created']);
        $modified = new \Datetime($options['LastModified']);

        // Test
        $jobTempl = JobTemplate::createFromOptions($options);

        // Assert
        $this->assertEquals($options['Id'], $jobTempl->getId());
        $this->assertEquals($options['Name'], $jobTempl->getName());
        $this->assertEquals($created->getTimestamp(), $jobTempl->getCreated()->getTimestamp());
        $this->assertEquals($modified->getTimestamp(), $jobTempl->getLastModified()->getTimestamp());
        $this->assertEquals($options['JobTemplateBody'], $jobTempl->getJobTemplateBody());
        $this->assertEquals($options['NumberofInputAssets'], $jobTempl->getNumberOfInputAssets());
        $this->assertEquals($options['TemplateType'], $jobTempl->getTemplateType());
    }

    /**
     * @covers WindowsAzure\MediaServices\Models\JobTemplate::getName
     * @covers WindowsAzure\MediaServices\Models\JobTemplate::setName
     */
    public function testGetSetName()
    {

        // Setup
        $jobTemplateBody = 'JobTemplateBody';
        $jobTempl = new JobTemplate($jobTemplateBody);
        $name = 'New Name';

        // Test
        $jobTempl->setName($name);
        $result = $jobTempl->getName();

        // Assert
        $this->assertEquals($name, $result);
    }

    /**
     * @covers WindowsAzure\MediaServices\Models\JobTemplate::getLastModified
     */
    public function testGetLastModified()
    {

        // Setup
        $jobTemplateBody = 'JobTemplateBody';
        $templateType = JobTemplate::TYPE_ACCOUNT_LEVEL;
        $options = array(
                'LastModified' => '2013-11-25',
                'JobTemplateBody' => $jobTemplateBody,
                'TemplateType' => $templateType,
        );
        $modified = new \Datetime($options['LastModified']);
        $jobTempl = JobTemplate::createFromOptions($options);

        // Test
        $result = $jobTempl->getLastModified();

        // Assert
        $this->assertEquals($modified, $result);
    }

    /**
     * @covers WindowsAzure\MediaServices\Models\JobTemplate::getCreated
     */
    public function testGetCreated()
    {

        // Setup
        $jobTemplateBody = 'JobTemplateBody';
        $templateType = JobTemplate::TYPE_ACCOUNT_LEVEL;
        $options = array(
                'Created' => '2013-11-25',
                'JobTemplateBody' => $jobTemplateBody,
                'TemplateType' => $templateType,
        );
        $created = new \Datetime($options['Created']);
        $jobTempl = JobTemplate::createFromOptions($options);

        // Test
        $result = $jobTempl->getCreated();

        // Assert
        $this->assertEquals($created, $result);
    }

    /**
     * @covers WindowsAzure\MediaServices\Models\JobTemplate::getId
     */
    public function testGetId()
    {

        // Setup
        $jobTemplateBody = 'JobTemplateBody';
        $templateType = JobTemplate::TYPE_ACCOUNT_LEVEL;
        $options = array(
                'Id' => 'sfdk567',
                'JobTemplateBody' => $jobTemplateBody,
                'TemplateType' => $templateType,
        );
        $jobTempl = JobTemplate::createFromOptions($options);

        // Test
        $result = $jobTempl->getId();

        // Assert
        $this->assertEquals($options['Id'], $result);
    }

    /**
     * @covers WindowsAzure\MediaServices\Models\JobTemplate::getTemplateType
     * @covers WindowsAzure\MediaServices\Models\JobTemplate::setTemplateType
     */
    public function testGetSetTemplateType()
    {

        // Setup
        $jobTemplateBody = 'JobTemplateBody';
        $jobTempl = new JobTemplate($jobTemplateBody);
        $templateType = JobTemplate::TYPE_SYSTEM_LEVEL;

        // Test
        $jobTempl->setTemplateType($templateType);
        $result = $jobTempl->getTemplateType();

        // Assert
        $this->assertEquals($templateType, $result);
    }

    /**
     * @covers WindowsAzure\MediaServices\Models\JobTemplate::getNumberofInputAssets
     * @covers WindowsAzure\MediaServices\Models\JobTemplate::setNumberofInputAssets
     */
    public function testGetSetNumberofInputAssets()
    {

        // Setup
        $jobTemplateBody = 'JobTemplateBody';
        $jobTempl = new JobTemplate($jobTemplateBody);
        $numberofInputAssets = 5;

        // Test
        $jobTempl->setNumberofInputAssets($numberofInputAssets);
        $result = $jobTempl->getNumberofInputAssets();

        // Assert
        $this->assertEquals($numberofInputAssets, $result);
    }

    /**
     * @covers WindowsAzure\MediaServices\Models\JobTemplate::getJobTemplateBody
     * @covers WindowsAzure\MediaServices\Models\JobTemplate::setJobTemplateBody
     */
    public function testGetSetJobTemplateBody()
    {

        // Setup
        $jobTemplateBody = 'JobTemplateBody';
        $jobTempl = new JobTemplate($jobTemplateBody);
        $jobTemplateBody = 'New job Template Body';

        // Test
        $jobTempl->setJobTemplateBody($jobTemplateBody);
        $result = $jobTempl->getJobTemplateBody();

        // Assert
        $this->assertEquals($jobTemplateBody, $result);
    }
}
