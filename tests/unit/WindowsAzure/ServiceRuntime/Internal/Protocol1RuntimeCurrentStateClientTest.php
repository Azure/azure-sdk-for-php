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
use WindowsAzure\ServiceRuntime\Internal\AcquireCurrentState;
use WindowsAzure\ServiceRuntime\Internal\CurrentStatus;
use WindowsAzure\ServiceRuntime\Internal\FileInputChannel;
use WindowsAzure\ServiceRuntime\Internal\FileOutputChannel;
use WindowsAzure\ServiceRuntime\Internal\Protocol1RuntimeCurrentStateClient;
use WindowsAzure\ServiceRuntime\Internal\XmlCurrentStateSerializer;

/**
 * Unit tests for class Protocol1RuntimeCurrentStateClient.
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
class Protocol1RuntimeCurrentStateClientTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \WindowsAzure\ServiceRuntime\Internal\Protocol1RuntimeCurrentStateClient::__construct
     */
    public function testConstruct()
    {
        $serializer = new XmlCurrentStateSerializer();
        $outputChannel = new FileOutputChannel();

        // Setup
        $protocol1RuntimeCurrentStateClient =
            new Protocol1RuntimeCurrentStateClient(
                $serializer,
                $outputChannel);

        // Test
        $this->assertInstanceOf('WindowsAzure\ServiceRuntime\Internal\Protocol1RuntimeCurrentStateClient',
            $protocol1RuntimeCurrentStateClient);
    }

    /**
     * @covers \WindowsAzure\ServiceRuntime\Internal\Protocol1RuntimeCurrentStateClient::setEndpoint
     * @covers \WindowsAzure\ServiceRuntime\Internal\Protocol1RuntimeCurrentStateClient::setCurrentState
     */
    public function testSetCurrentState()
    {
        // Setup
        $rootDirectory = 'root';
        $fileName = 'test';
        $fileContents = '<?xml version="1.0" encoding="UTF-8"?>'."\n".
            '<CurrentState>'.
            '<StatusLease ClientId="clientId">'.
            '<Acquire>'.
            '<Incarnation>1</Incarnation>'.
            '<Status>Recycle</Status>'.
            '<Expiration>2000-01-01T00:00:00.0000000Z</Expiration>'.
            '</Acquire>'.
            '</StatusLease>'.
            '</CurrentState>';

        vfsStreamWrapper::register();
        vfsStreamWrapper::setRoot(new vfsStreamDirectory($rootDirectory));

        $file = vfsStream::newFile($fileName);
        vfsStreamWrapper::getRoot()->addChild($file);

        $serializer = new XmlCurrentStateSerializer();
        $fileOutputChannel = new FileOutputChannel();

        $protocol1RuntimeCurrentStateClient =
            new Protocol1RuntimeCurrentStateClient(
                $serializer,
                $fileOutputChannel
            );

        $protocol1RuntimeCurrentStateClient->setEndpoint(
            vfsStream::url($rootDirectory.'/'.$fileName)
        );

        // Test
        $recycleState = new AcquireCurrentState(
            'clientId',
            1,
            CurrentStatus::RECYCLE,
            new \DateTime('2000-01-01', new \DateTimeZone('UTC'))
        );

        $protocol1RuntimeCurrentStateClient->setCurrentState($recycleState);

        $fileInputChannel = new FileInputChannel();
        $fileInputStream = $fileInputChannel->getInputStream(
            vfsStream::url($rootDirectory.'/'.$fileName)
        );

        $inputChannelContents = stream_get_contents($fileInputStream);
        $this->assertEquals($fileContents, $inputChannelContents);
    }
}
