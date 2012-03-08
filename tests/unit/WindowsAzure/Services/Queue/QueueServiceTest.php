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
 * @package   PEAR2\Tests\Unit\WindowsAzure
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */

use PEAR2\WindowsAzure\Services\Queue\QueueService;
use PEAR2\WindowsAzure\Services\Core\Configuration;
use PEAR2\Tests\Unit\TestResources;
use PEAR2\WindowsAzure\Services\Queue\QueueSettings;

/**
 * Unit tests for class QueueService
 *
 * @category  Microsoft
 * @package   PEAR2\Tests\Unit\WindowsAzure
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class QueueServiceTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers PEAR2\WindowsAzure\Services\Queue\QueueService::create
     */
    public function testCreateWithConfig()
    {
        // Setup
        $uri = 'http://' . TestResources::accountName() . '.queue.core.windows.net';
        $config = new Configuration();
        $config->setProperty(QueueSettings::ACCOUNT_KEY, TestResources::accountKey());
        $config->setProperty(QueueSettings::ACCOUNT_NAME, TestResources::accountName());        
        $config->setProperty(QueueSettings::URI, $uri);
        
        // Test
        $queueWrapper = QueueService::create($config);
        
        // Assert
        $this->assertInstanceOf('PEAR2\\WindowsAzure\\Services\\Queue\\IQueue', $queueWrapper);
    }
}

?>
