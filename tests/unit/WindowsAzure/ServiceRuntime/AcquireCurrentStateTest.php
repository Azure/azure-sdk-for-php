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
 * @package   PEAR2\Tests\Unit\WindowsAzure\ServiceRuntime
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
namespace PEAR2\Tests\Unit\WindowsAzure\ServiceRuntime;
use PEAR2\Tests\Framework\TestResources;
use PEAR2\WindowsAzure\ServiceRuntime\AcquireCurrentState;
use PEAR2\WindowsAzure\ServiceRuntime\CurrentStatus;

/**
 * Unit tests for class AcquireCurrentState.
 *
 * @category  Microsoft
 * @package   PEAR2\Tests\Unit\WindowsAzure\ServiceRuntime
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class AcquireCurrentStateTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers PEAR2\WindowsAzure\ServiceRuntime\AcquireCurrentState::__construct
     * @covers PEAR2\WindowsAzure\ServiceRuntime\AcquireCurrentState::getIncarnation
     * @covers PEAR2\WindowsAzure\ServiceRuntime\AcquireCurrentState::getStatus
     * @covers PEAR2\WindowsAzure\ServiceRuntime\AcquireCurrentState::getExpiration
     */
    public function testConstruct()
    {
        $clientId    = 'ClientId';
        $incarnation = 2;
        $status      = CurrentStatus::BUSY;
        $expiration  = new \DateTime();
        
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

?>