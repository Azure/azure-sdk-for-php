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
use PEAR2\WindowsAzure\Core\WindowsAzureUtilities;
use PEAR2\WindowsAzure\ServiceRuntime\GoalState;

/**
 * Unit tests for class CurrentState
 *
 * @category  Microsoft
 * @package   PEAR2\Tests\Unit\WindowsAzure\ServiceRuntime
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class GoalStateTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers PEAR2\WindowsAzure\ServiceRuntime\GoalState::getDeadline
     */
    public function testGetDeadline()
    {
        $deadline = WindowsAzureUtilities::rfc1123ToDateTime('Sun, 25 Sep 2011 19:42:18 GMT');
        
        // Setup
        $goalState = new GoalState(null, null, null, $deadline, null);
        
        // Test
        $this->assertEquals($deadline, $goalState->getDeadline());
    }
    
    /**
     * @covers PEAR2\WindowsAzure\ServiceRuntime\GoalState::getCurrentStateEndpoint
     */
    public function testGetCurrentStateEndpoint()
    {
        $deadline = WindowsAzureUtilities::rfc1123ToDateTime('Sun, 25 Sep 2011 19:42:18 GMT');
        $currentStateEndpoint = 'endpoint';
        
        // Setup
        $goalState = new GoalState(null, null, null, $deadline, $currentStateEndpoint);
        
        // Test
        $this->assertEquals($currentStateEndpoint, $goalState->getCurrentStateEndpoint());
    }
    
    /**
     * @covers PEAR2\WindowsAzure\ServiceRuntime\GoalState::getEnvironmentPath
     */
    public function testGetEnvironmentPath()
    {
        $deadline = WindowsAzureUtilities::rfc1123ToDateTime('Sun, 25 Sep 2011 19:42:18 GMT');
        $environmentPath = 'path';
        
        // Setup
        $goalState = new GoalState(null, null, $environmentPath, $deadline, null);
        
        // Test
        $this->assertEquals($environmentPath, $goalState->getEnvironmentPath());
    }
    
    /**
     * @covers PEAR2\WindowsAzure\ServiceRuntime\GoalState::getExpectedState
     */
    public function testGetExpectedState()
    {
        $deadline = WindowsAzureUtilities::rfc1123ToDateTime('Sun, 25 Sep 2011 19:42:18 GMT');
        $expectedState = 'expectedState';
        
        // Setup
        $goalState = new GoalState(null, $expectedState, null, $deadline, null);
        
        // Test
        $this->assertEquals($expectedState, $goalState->getExpectedState());
    }
    
    /**
     * @covers PEAR2\WindowsAzure\ServiceRuntime\GoalState::getIncarnation
     */
    public function testGetIncarnation()
    {
        $deadline = WindowsAzureUtilities::rfc1123ToDateTime('Sun, 25 Sep 2011 19:42:18 GMT');
        $incarnation = 1;
        
        // Setup
        $goalState = new GoalState($incarnation, null, null, $deadline, null);
        
        // Test
        $this->assertEquals($incarnation, $goalState->getIncarnation());
    }
    
    /**
     * @covers PEAR2\WindowsAzure\ServiceRuntime\GoalState::__construct
     */
    public function testConstructor()
    {
        $deadline = WindowsAzureUtilities::rfc1123ToDateTime('Sun, 25 Sep 2011 19:42:18 GMT');
        $incarnation = 1;
        
        // Setup
        $goalState = new GoalState($incarnation, null, null, $deadline, null);
        
        // Test
        $this->assertInstanceOf('PEAR2\\WindowsAzure\\ServiceRuntime\\GoalState',
            $goalState);
    }
}

?>