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
 * @package   PEAR2\Tests\Framework
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
namespace PEAR2\Tests\Framework;
use PEAR2\Tests\Framework\TestResources;
use PEAR2\WindowsAzure\Core\WindowsAzureUtilities;
use PEAR2\WindowsAzure\ServiceRuntime\Protocol1RuntimeClient;
use PEAR2\WindowsAzure\ServiceRuntime\Protocol1RuntimeCurrentStateClient;
use PEAR2\WindowsAzure\ServiceRuntime\Protocol1RuntimeGoalStateClient;

/**
 * Unit tests for class Protocol1RuntimeClient
 *
 * @category  Microsoft
 * @package   PEAR2\Tests\Unit\WindowsAzure
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class Protocol1RuntimeClientTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers PEAR2\WindowsAzure\ServiceRuntime\Protocol1RuntimeClient::__construct
     */
    public function testConstruct()
    {
        $protocol1RuntimeCurrentStateClient =
            new Protocol1RuntimeCurrentStateClient(null, null);
        
        $protocol1RuntimeGoalStateClient = 
            new Protocol1RuntimeGoalStateClient(null, null, null, null);
        
        $endpoint = 'endpoint';
        
        // Setup
        $protocol1RuntimeClient = new Protocol1RuntimeClient(
            $protocol1RuntimeGoalStateClient,
            $protocol1RuntimeCurrentStateClient,
            $endpoint);
        
        // Test
        $this->assertInstanceOf('PEAR2\\WindowsAzure\\ServiceRuntime\\Protocol1RuntimeClient',
            $protocol1RuntimeClient);
    }
}

?>