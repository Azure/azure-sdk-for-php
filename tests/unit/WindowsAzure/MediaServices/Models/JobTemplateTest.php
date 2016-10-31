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
 * @version   Release: 0.5.0_2016-11
 *
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class JobTemplateTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \WindowsAzure\MediaServices\Models\JobTemplate::__construct
     */
    public function test__construct()
    {

        // Setup
        $jobTemplateBody = 'JobTemplateBody';

        // Test
        $jobTemplate = new JobTemplate($jobTemplateBody);

        //Assert
        $this->assertEquals($jobTemplateBody, $jobTemplate->getJobTemplateBody());
        $this->assertEquals(JobTemplate::TYPE_ACCOUNT_LEVEL, $jobTemplate->getTemplateType());
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\JobTemplate::createFromOptions
     * @covers \WindowsAzure\MediaServices\Models\JobTemplate::fromArray
     */
    public function testCreateFromOptions()
    {

        // Setup
        $jobTemplateBody = 'JobTemplateBody';
        $templateType = JobTemplate::TYPE_ACCOUNT_LEVEL;
        $options = [
                'Id' => 'sfgsfg34',
                'Name' => 'Some Name',
                'Created' => '2013-11-25',
                'LastModified' => '2013-11-25',
                'JobTemplateBody' => 'Some Body Of Job Template',
                'NumberofInputAssets' => 6,
                'TemplateType' => JobTemplate::TYPE_SYSTEM_LEVEL,
        ];
        $created = new \Datetime($options['Created']);
        $modified = new \Datetime($options['LastModified']);

        // Test
        $jobTemplate = JobTemplate::createFromOptions($options);

        // Assert
        $this->assertEquals($options['Id'], $jobTemplate->getId());
        $this->assertEquals($options['Name'], $jobTemplate->getName());
        $this->assertEquals($created->getTimestamp(), $jobTemplate->getCreated()->getTimestamp());
        $this->assertEquals($modified->getTimestamp(), $jobTemplate->getLastModified()->getTimestamp());
        $this->assertEquals($options['JobTemplateBody'], $jobTemplate->getJobTemplateBody());
        $this->assertEquals($options['NumberofInputAssets'], $jobTemplate->getNumberofInputAssets());
        $this->assertEquals($options['TemplateType'], $jobTemplate->getTemplateType());
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\JobTemplate::getName
     * @covers \WindowsAzure\MediaServices\Models\JobTemplate::setName
     */
    public function testGetSetName()
    {

        // Setup
        $jobTemplateBody = 'JobTemplateBody';
        $jobTemplate = new JobTemplate($jobTemplateBody);
        $name = 'New Name';

        // Test
        $jobTemplate->setName($name);
        $result = $jobTemplate->getName();

        // Assert
        $this->assertEquals($name, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\JobTemplate::getLastModified
     */
    public function testGetLastModified()
    {

        // Setup
        $jobTemplateBody = 'JobTemplateBody';
        $templateType = JobTemplate::TYPE_ACCOUNT_LEVEL;
        $options = [
                'LastModified' => '2013-11-25',
                'JobTemplateBody' => $jobTemplateBody,
                'TemplateType' => $templateType,
        ];
        $modified = new \Datetime($options['LastModified']);
        $jobTemplate = JobTemplate::createFromOptions($options);

        // Test
        $result = $jobTemplate->getLastModified();

        // Assert
        $this->assertEquals($modified, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\JobTemplate::getCreated
     */
    public function testGetCreated()
    {

        // Setup
        $jobTemplateBody = 'JobTemplateBody';
        $templateType = JobTemplate::TYPE_ACCOUNT_LEVEL;
        $options = [
                'Created' => '2013-11-25',
                'JobTemplateBody' => $jobTemplateBody,
                'TemplateType' => $templateType,
        ];
        $created = new \Datetime($options['Created']);
        $jobTemplate = JobTemplate::createFromOptions($options);

        // Test
        $result = $jobTemplate->getCreated();

        // Assert
        $this->assertEquals($created, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\JobTemplate::getId
     */
    public function testGetId()
    {

        // Setup
        $jobTemplateBody = 'JobTemplateBody';
        $templateType = JobTemplate::TYPE_ACCOUNT_LEVEL;
        $options = [
                'Id' => 'sfdk567',
                'JobTemplateBody' => $jobTemplateBody,
                'TemplateType' => $templateType,
        ];
        $jobTemplate = JobTemplate::createFromOptions($options);

        // Test
        $result = $jobTemplate->getId();

        // Assert
        $this->assertEquals($options['Id'], $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\JobTemplate::getTemplateType
     * @covers \WindowsAzure\MediaServices\Models\JobTemplate::setTemplateType
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
     * @covers \WindowsAzure\MediaServices\Models\JobTemplate::getNumberofInputAssets
     * @covers \WindowsAzure\MediaServices\Models\JobTemplate::setNumberofInputAssets
     */
    public function testGetSetNumberOfInputAssets()
    {

        // Setup
        $jobTemplateBody = 'JobTemplateBody';
        $jobTemplate = new JobTemplate($jobTemplateBody);
        $numberOfInputAssets = 5;

        // Test
        $jobTemplate->setNumberofInputAssets($numberOfInputAssets);
        $result = $jobTemplate->getNumberofInputAssets();

        // Assert
        $this->assertEquals($numberOfInputAssets, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\JobTemplate::getJobTemplateBody
     * @covers \WindowsAzure\MediaServices\Models\JobTemplate::setJobTemplateBody
     */
    public function testGetSetJobTemplateBody()
    {

        // Setup
        $jobTemplateBody = 'JobTemplateBody';
        $jobTemplate = new JobTemplate($jobTemplateBody);
        $jobTemplateBody = 'New job Template Body';

        // Test
        $jobTemplate->setJobTemplateBody($jobTemplateBody);
        $result = $jobTemplate->getJobTemplateBody();

        // Assert
        $this->assertEquals($jobTemplateBody, $result);
    }
}
