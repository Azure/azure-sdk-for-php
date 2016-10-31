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

namespace Tests\unit\WindowsAzure\ServiceRuntime\Internal;

use org\bovigo\vfs\vfsStream;
use org\bovigo\vfs\vfsStreamDirectory;
use org\bovigo\vfs\vfsStreamWrapper;
use WindowsAzure\ServiceRuntime\Internal\ChunkedGoalStateDeserializer;
use WindowsAzure\ServiceRuntime\Internal\FileInputChannel;

/**
 * Unit tests for class ChunkedGoalStateDeserializer.
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
class ChunkedGoalStateDeserializerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \WindowsAzure\ServiceRuntime\Internal\ChunkedGoalStateDeserializer::__construct
     * @covers \WindowsAzure\ServiceRuntime\Internal\ChunkedGoalStateDeserializer::initialize
     * @covers \WindowsAzure\ServiceRuntime\Internal\ChunkedGoalStateDeserializer::deserialize
     */
    public function testDeserialize()
    {
        // Setup
        $rootDirectory = 'root';

        vfsStreamWrapper::register();
        vfsStreamWrapper::setRoot(new vfsStreamDirectory($rootDirectory));

        $roleEnvironmentPath = 'mypath';
        $currentStateEndpoint = 'endpoint';
        $incarnation = 1;
        $expectedState = 'started';

        $fileName = 'file';
        $fileContent = '<?xml version="1.0" encoding="utf-8"?>'.
            '<GoalState xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" '.
            'xmlns:xsd="http://www.w3.org/2001/XMLSchema">'.
            '<Incarnation>'.
            $incarnation.
            '</Incarnation>'.
            '<ExpectedState>'.
            $expectedState.
            '</ExpectedState>'.
            '<RoleEnvironmentPath>'.
            $roleEnvironmentPath.
            '</RoleEnvironmentPath>'.
            '<CurrentStateEndpoint>'.
            $currentStateEndpoint.
            '</CurrentStateEndpoint>'.
            '<Deadline>9999-12-31T23:59:59.9999999</Deadline>'.
            '</GoalState>';

        $fileContent = dechex(strlen($fileContent))."\n".$fileContent;

        $file = vfsStream::newFile($fileName);
        $file->setContent($fileContent);

        vfsStreamWrapper::getRoot()->addChild($file);

        $fileInputChannel = new FileInputChannel();
        $fileInputStream = $fileInputChannel->getInputStream(
            vfsStream::url($rootDirectory.'/'.$fileName)
        );

        $chunkedGoalStateDeserializer = new ChunkedGoalStateDeserializer();
        $chunkedGoalStateDeserializer->initialize($fileInputStream);
        $goalState = $chunkedGoalStateDeserializer->deserialize();

        // Test
        $this->assertNotEquals(null, $goalState);
        $this->assertEquals($roleEnvironmentPath, $goalState->getEnvironmentPath());
        $this->assertNotEquals(null, $goalState->getDeadline());
        $this->assertEquals($currentStateEndpoint, $goalState->getCurrentStateEndpoint());
        $this->assertEquals($incarnation, $goalState->getIncarnation());
        $this->assertEquals($expectedState, $goalState->getExpectedState());
    }

    /**
     * @covers \WindowsAzure\ServiceRuntime\Internal\ChunkedGoalStateDeserializer::__construct
     * @covers \WindowsAzure\ServiceRuntime\Internal\ChunkedGoalStateDeserializer::initialize
     * @covers \WindowsAzure\ServiceRuntime\Internal\ChunkedGoalStateDeserializer::deserialize
     */
    public function testDeserializeWithNewLineEnd()
    {
        // Setup
        $rootDirectory = 'root';

        vfsStreamWrapper::register();
        vfsStreamWrapper::setRoot(new vfsStreamDirectory($rootDirectory));

        $roleEnvironmentPath = 'mypath';
        $currentStateEndpoint = 'endpoint';
        $incarnation = 1;
        $expectedState = 'started';

        $fileName = 'file';
        $fileContent = '<?xml version="1.0" encoding="utf-8"?>'.
            '<GoalState xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" '.
            'xmlns:xsd="http://www.w3.org/2001/XMLSchema">'.
            '<Incarnation>'.
            $incarnation.
            '</Incarnation>'.
            '<ExpectedState>'.
            $expectedState.
            '</ExpectedState>'.
            '<RoleEnvironmentPath>'.
            $roleEnvironmentPath.
            '</RoleEnvironmentPath>'.
            '<CurrentStateEndpoint>'.
            $currentStateEndpoint.
            '</CurrentStateEndpoint>'.
            '<Deadline>9999-12-31T23:59:59.9999999</Deadline>'.
            '</GoalState>';

        $fileContent = dechex(strlen($fileContent))."\n".$fileContent."\n";

        $file = vfsStream::newFile($fileName);
        $file->setContent($fileContent);

        vfsStreamWrapper::getRoot()->addChild($file);

        $fileInputChannel = new FileInputChannel();
        $fileInputStream = $fileInputChannel->getInputStream(
            vfsStream::url($rootDirectory.'/'.$fileName)
        );

        $chunkedGoalStateDeserializer = new ChunkedGoalStateDeserializer();
        $chunkedGoalStateDeserializer->initialize($fileInputStream);
        $goalState = $chunkedGoalStateDeserializer->deserialize();

        // Test
        $this->assertNotEquals(null, $goalState);
        $this->assertEquals($roleEnvironmentPath, $goalState->getEnvironmentPath());
        $this->assertNotEquals(null, $goalState->getDeadline());
        $this->assertEquals($currentStateEndpoint, $goalState->getCurrentStateEndpoint());
        $this->assertEquals($incarnation, $goalState->getIncarnation());
        $this->assertEquals($expectedState, $goalState->getExpectedState());
    }

    /**
     * @covers \WindowsAzure\ServiceRuntime\Internal\ChunkedGoalStateDeserializer::__construct
     * @covers \WindowsAzure\ServiceRuntime\Internal\ChunkedGoalStateDeserializer::initialize
     * @covers \WindowsAzure\ServiceRuntime\Internal\ChunkedGoalStateDeserializer::deserialize
     */
    public function testDeserializeWithNewLineStart()
    {
        // Setup
        $rootDirectory = 'root';

        vfsStreamWrapper::register();
        vfsStreamWrapper::setRoot(new vfsStreamDirectory($rootDirectory));

        $roleEnvironmentPath = 'mypath';
        $currentStateEndpoint = 'endpoint';
        $incarnation = 1;
        $expectedState = 'started';

        $fileName = 'file';
        $fileContent = '<?xml version="1.0" encoding="utf-8"?>'.
            '<GoalState xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" '.
            'xmlns:xsd="http://www.w3.org/2001/XMLSchema">'.
            '<Incarnation>'.
            $incarnation.
            '</Incarnation>'.
            '<ExpectedState>'.
            $expectedState.
            '</ExpectedState>'.
            '<RoleEnvironmentPath>'.
            $roleEnvironmentPath.
            '</RoleEnvironmentPath>'.
            '<CurrentStateEndpoint>'.
            $currentStateEndpoint.
            '</CurrentStateEndpoint>'.
            '<Deadline>9999-12-31T23:59:59.9999999</Deadline>'.
            '</GoalState>';

        $fileContent = "\n".dechex(strlen($fileContent))."\n".$fileContent;

        $file = vfsStream::newFile($fileName);
        $file->setContent($fileContent);

        vfsStreamWrapper::getRoot()->addChild($file);

        $fileInputChannel = new FileInputChannel();
        $fileInputStream = $fileInputChannel->getInputStream(
            vfsStream::url($rootDirectory.'/'.$fileName)
        );

        $chunkedGoalStateDeserializer = new ChunkedGoalStateDeserializer();
        $chunkedGoalStateDeserializer->initialize($fileInputStream);
        $goalState = $chunkedGoalStateDeserializer->deserialize();

        // Test
        $this->assertNotEquals(null, $goalState);
        $this->assertEquals($roleEnvironmentPath, $goalState->getEnvironmentPath());
        $this->assertNotEquals(null, $goalState->getDeadline());
        $this->assertEquals($currentStateEndpoint, $goalState->getCurrentStateEndpoint());
        $this->assertEquals($incarnation, $goalState->getIncarnation());
        $this->assertEquals($expectedState, $goalState->getExpectedState());
    }
}
