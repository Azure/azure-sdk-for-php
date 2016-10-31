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

use WindowsAzure\Common\Internal\Utilities;
use WindowsAzure\ServiceRuntime\Internal\GoalState;

/**
 * Unit tests for class CurrentState.
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
class GoalStateTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \WindowsAzure\ServiceRuntime\Internal\GoalState::getDeadline
     */
    public function testGetDeadline()
    {
        $deadline = Utilities::rfc1123ToDateTime('Sun, 25 Sep 2011 19:42:18 GMT');

        // Setup
        $goalState = new GoalState(null, null, null, $deadline, null);

        // Test
        $this->assertEquals($deadline, $goalState->getDeadline());
    }

    /**
     * @covers \WindowsAzure\ServiceRuntime\Internal\GoalState::getCurrentStateEndpoint
     */
    public function testGetCurrentStateEndpoint()
    {
        $deadline = Utilities::rfc1123ToDateTime('Sun, 25 Sep 2011 19:42:18 GMT');
        $currentStateEndpoint = 'endpoint';

        // Setup
        $goalState = new GoalState(null, null, null, $deadline, $currentStateEndpoint);

        // Test
        $this->assertEquals($currentStateEndpoint, $goalState->getCurrentStateEndpoint());
    }

    /**
     * @covers \WindowsAzure\ServiceRuntime\Internal\GoalState::getEnvironmentPath
     */
    public function testGetEnvironmentPath()
    {
        $deadline = Utilities::rfc1123ToDateTime('Sun, 25 Sep 2011 19:42:18 GMT');
        $environmentPath = 'path';

        // Setup
        $goalState = new GoalState(null, null, $environmentPath, $deadline, null);

        // Test
        $this->assertEquals($environmentPath, $goalState->getEnvironmentPath());
    }

    /**
     * @covers \WindowsAzure\ServiceRuntime\Internal\GoalState::getExpectedState
     */
    public function testGetExpectedState()
    {
        $deadline = Utilities::rfc1123ToDateTime('Sun, 25 Sep 2011 19:42:18 GMT');
        $expectedState = 'expectedState';

        // Setup
        $goalState = new GoalState(null, $expectedState, null, $deadline, null);

        // Test
        $this->assertEquals($expectedState, $goalState->getExpectedState());
    }

    /**
     * @covers \WindowsAzure\ServiceRuntime\Internal\GoalState::getIncarnation
     */
    public function testGetIncarnation()
    {
        $deadline = Utilities::rfc1123ToDateTime('Sun, 25 Sep 2011 19:42:18 GMT');
        $incarnation = 1;

        // Setup
        $goalState = new GoalState($incarnation, null, null, $deadline, null);

        // Test
        $this->assertEquals($incarnation, $goalState->getIncarnation());
    }

    /**
     * @covers \WindowsAzure\ServiceRuntime\Internal\GoalState::__construct
     */
    public function testConstructor()
    {
        $deadline = Utilities::rfc1123ToDateTime('Sun, 25 Sep 2011 19:42:18 GMT');
        $incarnation = 1;

        // Setup
        $goalState = new GoalState($incarnation, null, null, $deadline, null);

        // Test
        $this->assertInstanceOf('WindowsAzure\ServiceRuntime\Internal\GoalState',
            $goalState);
    }
}
