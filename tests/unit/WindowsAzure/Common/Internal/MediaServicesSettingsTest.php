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

namespace Tests\unit\WindowsAzure\Common\Internal;

use WindowsAzure\Common\Internal\MediaServicesSettings;
use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\MediaServices\Authentication\ITokenProvider;

/**
 * Unit tests for class MediaServicesSettings.
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
class MediaServicesSettingsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \WindowsAzure\Common\Internal\MediaServicesSettings::__construct
     */
    public function testConstructorSuccess()
    {
        // Setup
        $endpointUri = 'http://valid.url/';
        $tokenProvider = $this->getMock('\WindowsAzure\MediaServices\Authentication\ITokenProvider');

        // Test
        $settings = new MediaServicesSettings($endpointUri, $tokenProvider);

        // Assert
        $this->assertEquals($endpointUri, $settings->getEndpointUri());
        $this->assertEquals($tokenProvider, $settings->getTokenProvider());
    }

    /**
     * @covers \WindowsAzure\Common\Internal\MediaServicesSettings::__construct
     */
    public function testConstructorShouldFail()
    {
        // Setup
        $endpointUri = 'http://valid.url/';
        $tokenProvider = null;

        // Assert
        $this->setExpectedException(\InvalidArgumentException::class);

        // Test
        $settings = new MediaServicesSettings($endpointUri, $tokenProvider);
    }

    /**
     * @covers \WindowsAzure\Common\Internal\MediaServicesSettings::__construct
     */
    public function testConstructorShouldFail2()
    {
        // Setup
        $endpointUri = null;
        $tokenProvider = null;

        // Assert
        $this->setExpectedException(\RuntimeException::class);

        // Test
        $settings = new MediaServicesSettings($endpointUri, $tokenProvider);
    }
}
