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
 * @package   WindowsAzure\MediaServices\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace Tests\Unit\WindowsAzure\MediaServices\Models;
use WindowsAzure\MediaServices\Models\TaskTemplate;

/**
 * Represents access policy object used in media services
 *
 * @category  Microsoft
 * @package   WindowsAzure\MediaServices\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.4.0_2014-01
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

class TaskTemplateTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\MediaServices\Models\TaskTemplate::__construct
     */
    public function test__construct(){

        // Setup
        $numberofInputAssets = 3;
        $numberofOutputAssets = 4;

        // Test
        $taskTempl = new TaskTemplate($numberofInputAssets, $numberofOutputAssets);

        // Assert
        $this->assertEquals($numberofInputAssets, $taskTempl->getNumberofInputAssets());
        $this->assertEquals($numberofOutputAssets, $taskTempl->getNumberofOutputAssets());
        $this->assertContains('nb:ttid:UUID:', $taskTempl->getId());

    }

    /**
     * @covers WindowsAzure\MediaServices\Models\TaskTemplate::createFromOptions
     * @covers WindowsAzure\MediaServices\Models\TaskTemplate::fromArray
     */
    public function testCreateFromOptions(){

        // Setup
        $options = array(
                'Id'                    => 'jdfghrf78',
                'Configuration'         => 'some configuration',
                'Created'               => '2013-11-27',
                'Description'           => 'description of task template',
                'Name'                  => 'Task Template name',
                'LastModified'          => '2013-11-27',
                'MediaProcessorId'      => '46id89',
                'NumberofInputAssets'   => 4,
                'NumberofOutputAssets'  => 3,
                'Options'               => 2,
                'EncryptionKeyId'       => '90key80',
                'EncryptionScheme'      => 'encryption scheme',
                'EncryptionVersion'     => 'version 2.1.1',
                'InitializationVector'  => 'Initialization Vector'
        );
        $created = new \Datetime($options['Created']);
        $modified = new \Datetime($options['LastModified']);

        // Test
        $task = TaskTemplate::createFromOptions($options);

        // Assert
        $this->assertEquals($options['Id'], $task->getId());
        $this->assertEquals($options['Configuration'], $task->getConfiguration());
        $this->assertEquals($created->getTimestamp(), $task->getCreated()->getTimestamp());
        $this->assertEquals($options['MediaProcessorId'], $task->getMediaProcessorId());
        $this->assertEquals($options['Name'], $task->getName());
        $this->assertEquals($options['Description'], $task->getDescription());
        $this->assertEquals($options['NumberofInputAssets'], $task->getNumberofInputAssets());
        $this->assertEquals($options['NumberofOutputAssets'], $task->getNumberofOutputAssets());
        $this->assertEquals($modified->getTimestamp(), $task->getLastModified()->getTimestamp());
        $this->assertEquals($options['Options'], $task->getOptions());
        $this->assertEquals($options['EncryptionKeyId'], $task->getEncryptionKeyId());
        $this->assertEquals($options['EncryptionScheme'], $task->getEncryptionScheme());
        $this->assertEquals($options['EncryptionVersion'], $task->getEncryptionVersion());
        $this->assertEquals($options['InitializationVector'], $task->getInitializationVector());
    }

    /**
     * @covers WindowsAzure\MediaServices\Models\TaskTemplate::getId
     */
    public function testGetId(){

        // Setup
        $options = array(
                'Id'                    => 'jdfghrf78',
                'NumberofInputAssets'   => 4,
                'NumberofOutputAssets'  => 3
        );
        $task = TaskTemplate::createFromOptions($options);

        // Test
        $result = $task->getId();

        // Assert
        $this->assertEquals($options['Id'], $result);
    }

    /**
     * @covers WindowsAzure\MediaServices\Models\TaskTemplate::getConfiguration
     * @covers WindowsAzure\MediaServices\Models\TaskTemplate::setConfiguration
     */
    public function testGetSetConfiguration(){

        // Setup
        $numberofInputAssets = 3;
        $numberofOutputAssets = 4;
        $task = new TaskTemplate($numberofInputAssets, $numberofOutputAssets);
        $config = 'configuration of task template';

        // Test
        $task->setConfiguration($config);
        $result = $task->getConfiguration();

        // Assert
        $this->assertEquals($config, $result);
    }

    /**
     * @covers WindowsAzure\MediaServices\Models\TaskTemplate::getMediaProcessorId
     * @covers WindowsAzure\MediaServices\Models\TaskTemplate::setMediaProcessorId
     */
    public function testGetSetMediaProcessorId(){

        // Setup
        $numberofInputAssets = 3;
        $numberofOutputAssets = 4;
        $task = new TaskTemplate($numberofInputAssets, $numberofOutputAssets);
        $mediaProcId = 'kdfjg57';

        // Test
        $task->setMediaProcessorId($mediaProcId);
        $result = $task->getMediaProcessorId();

        // Assert
        $this->assertEquals($mediaProcId, $result);
    }

    /**
     * @covers WindowsAzure\MediaServices\Models\TaskTemplate::getName
     * @covers WindowsAzure\MediaServices\Models\TaskTemplate::setName
     */
    public function testGetSetName(){

        // Setup
        $numberofInputAssets = 3;
        $numberofOutputAssets = 4;
        $task = new TaskTemplate($numberofInputAssets, $numberofOutputAssets);
        $name = 'task name';

        // Test
        $task->setName($name);
        $result = $task->getName();

        // Assert
        $this->assertEquals($name, $result);
    }

    /**
     * @covers WindowsAzure\MediaServices\Models\TaskTemplate::getOptions
     */
    public function testGetOptions(){

        // Setup
        $options = array(
                'NumberofInputAssets'   => 4,
                'NumberofOutputAssets'  => 3,
                'Options'               => 42

        );
        $task = TaskTemplate::createFromOptions($options);

        // Test
        $result = $task->getOptions();

        // Assert
        $this->assertEquals($options['Options'], $result);
    }

    /**
     * @covers WindowsAzure\MediaServices\Models\TaskTemplate::getEncryptionKeyId
     * @covers WindowsAzure\MediaServices\Models\TaskTemplate::setEncryptionKeyId
     */
    public function testGetSetEncryptionKeyId(){

        // Setup
        $numberofInputAssets = 3;
        $numberofOutputAssets = 4;
        $task = new TaskTemplate($numberofInputAssets, $numberofOutputAssets);
        $encrKeyId = '45key89';

        // Test
        $task->setEncryptionKeyId($encrKeyId);
        $result = $task->getEncryptionKeyId();

        // Assert
        $this->assertEquals($encrKeyId, $result);
    }

    /**
     * @covers WindowsAzure\MediaServices\Models\TaskTemplate::getEncryptionScheme
     * @covers WindowsAzure\MediaServices\Models\TaskTemplate::setEncryptionScheme
     */
    public function testGetSetEncryptionScheme(){

        // Setup
        $numberofInputAssets = 3;
        $numberofOutputAssets = 4;
        $task = new TaskTemplate($numberofInputAssets, $numberofOutputAssets);
        $encrScheme = 'encryption scheme';

        // Test
        $task->setEncryptionScheme($encrScheme);
        $result = $task->getEncryptionScheme();

        // Assert
        $this->assertEquals($encrScheme, $result);
    }

    /**
     * @covers WindowsAzure\MediaServices\Models\TaskTemplate::getEncryptionVersion
     * @covers WindowsAzure\MediaServices\Models\TaskTemplate::setEncryptionVersion
     */
    public function testGetSetEncryptionVersion(){

        // Setup
        $numberofInputAssets = 3;
        $numberofOutputAssets = 4;
        $task = new TaskTemplate($numberofInputAssets, $numberofOutputAssets);
        $encrVersion = '1.1.5';

        // Test
        $task->setEncryptionVersion($encrVersion);
        $result = $task->getEncryptionVersion();

        // Assert
        $this->assertEquals($encrVersion, $result);
    }

    /**
     * @covers WindowsAzure\MediaServices\Models\TaskTemplate::getInitializationVector
     * @covers WindowsAzure\MediaServices\Models\TaskTemplate::setInitializationVector
     */
    public function testGetSetInitializationVector(){

        // Setup
        $numberofInputAssets = 3;
        $numberofOutputAssets = 4;
        $task = new TaskTemplate($numberofInputAssets, $numberofOutputAssets);
        $initVector = 'initialization vector';

        // Test
        $task->setInitializationVector($initVector);
        $result = $task->getInitializationVector();

        // Assert
        $this->assertEquals($initVector, $result);
    }

    /**
     * @covers WindowsAzure\MediaServices\Models\TaskTemplate::getCreated
     */
    public function testGetCreated(){

        // Setup
        $options = array(
                'NumberofInputAssets'   => 4,
                'NumberofOutputAssets'  => 3,
                'Created'               => '2013-11-27'
        );
        $task = TaskTemplate::createFromOptions($options);
        $created = new \Datetime($options['Created']);

        // Test
        $result = $task->getCreated();

        // Assert
        $this->assertEquals($created->getTimestamp(), $result->getTimestamp());
    }

    /**
     * @covers WindowsAzure\MediaServices\Models\TaskTemplate::getLastModified
     */
    public function testGetLastModified(){

        // Setup
        $options = array(
                'NumberofInputAssets'   => 4,
                'NumberofOutputAssets'  => 3,
                'LastModified'               => '2013-11-27'
        );
        $task = TaskTemplate::createFromOptions($options);
        $modified = new \Datetime($options['LastModified']);

        // Test
        $result = $task->getLastModified();

        // Assert
        $this->assertEquals($modified->getTimestamp(), $result->getTimestamp());
    }

    /**
     * @covers WindowsAzure\MediaServices\Models\TaskTemplate::getDescription
     * @covers WindowsAzure\MediaServices\Models\TaskTemplate::setDescription
     */
    public function testGetDescription(){

        // Setup
        $numberofInputAssets = 3;
        $numberofOutputAssets = 4;
        $task = new TaskTemplate($numberofInputAssets, $numberofOutputAssets);
        $description = 'Description of task template';

        // Test
        $task->setDescription($description);
        $result = $task->getDescription();

        // Assert
        $this->assertEquals($description, $result);
    }

    /**
     * @covers WindowsAzure\MediaServices\Models\TaskTemplate::getNumberofInputAssets
     * @covers WindowsAzure\MediaServices\Models\TaskTemplate::setNumberofInputAssets
     */
    public function testGetSetNumberofInputAssets(){

        // Setup
        $numberofInputAssets = 3;
        $numberofOutputAssets = 4;
        $task = new TaskTemplate($numberofInputAssets, $numberofOutputAssets);
        $numberofInputAssets = 6;

        // Test
        $task->setNumberofInputAssets($numberofInputAssets);
        $result = $task->getNumberofInputAssets();

        // Assert
        $this->assertEquals($numberofInputAssets, $result);
    }

    /**
     * @covers WindowsAzure\MediaServices\Models\TaskTemplate::getNumberofOutputAssets
     * @covers WindowsAzure\MediaServices\Models\TaskTemplate::setNumberofOutputAssets
     */
    public function testGetSetNumberofOutputAssets(){

        // Setup
        $numberofInputAssets = 3;
        $numberofOutputAssets = 4;
        $task = new TaskTemplate($numberofInputAssets, $numberofOutputAssets);
        $numberofOutputAssets = 6;

        // Test
        $task->setNumberofOutputAssets($numberofOutputAssets);
        $result = $task->getNumberofOutputAssets();

        // Assert
        $this->assertEquals($numberofOutputAssets, $result);
    }
}