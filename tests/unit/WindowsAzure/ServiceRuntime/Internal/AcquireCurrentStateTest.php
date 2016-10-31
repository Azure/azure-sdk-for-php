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

use WindowsAzure\ServiceRuntime\Internal\AcquireCurrentState;
use WindowsAzure\ServiceRuntime\Internal\CurrentStatus;

/**
 * Unit tests for class AcquireCurrentState.
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
class AcquireCurrentStateTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \WindowsAzure\ServiceRuntime\Internal\AcquireCurrentState::__construct
     * @covers \WindowsAzure\ServiceRuntime\Internal\AcquireCurrentState::getIncarnation
     * @covers \WindowsAzure\ServiceRuntime\Internal\AcquireCurrentState::getStatus
     * @covers \WindowsAzure\ServiceRuntime\Internal\AcquireCurrentState::getExpiration
     */
    public function testConstruct()
    {
        $clientId = 'ClientId';
        $incarnation = 2;
        $status = CurrentStatus::BUSY;
        $expiration = new \DateTime();

        // Setup
        $acquireCurrentState = new AcquireCurrentState(
            $clientId,
            $incarnation,
            $status,
            $expiration
        );

        // Test
        $this->assertEquals($clientId, $acquireCurrentState->getClientId());
        $this->assertEquals($incarnation, $acquireCurrentState->getIncarnation());
        $this->assertEquals($status, $acquireCurrentState->getStatus());
        $this->assertEquals($expiration, $acquireCurrentState->getExpiration());
    }
}
