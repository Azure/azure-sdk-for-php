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
namespace PEAR2\Tests\Unit\WindowsAzure\ServiceRuntime;
use PEAR2\Tests\Framework\TestResources;
use PEAR2\WindowsAzure\Core\WindowsAzureUtilities;
use PEAR2\WindowsAzure\ServiceRuntime\FileOutputChannel;
use PEAR2\WindowsAzure\ServiceRuntime\Protocol1RuntimeCurrentStateClient;
use PEAR2\WindowsAzure\ServiceRuntime\XmlCurrentStateSerializer;

/**
 * Unit tests for class Protocol1RuntimeCurrentStateClient
 *
 * @category  Microsoft
 * @package   PEAR2\Tests\Unit\WindowsAzure
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class Protocol1RuntimeCurrentStateClientTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers PEAR2\WindowsAzure\ServiceRuntime\Protocol1RuntimeCurrentStateClient::__construct
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
        $this->assertInstanceOf('PEAR2\\WindowsAzure\\ServiceRuntime\\Protocol1RuntimeCurrentStateClient',
            $protocol1RuntimeCurrentStateClient);
    }
}

?>