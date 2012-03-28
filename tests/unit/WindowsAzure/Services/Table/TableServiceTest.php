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
 * @package   PEAR2\Tests\Unit\WindowsAzure\Services\Table
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */

namespace PEAR2\Tests\Unit\WindowsAzure\Services\Table;
use PEAR2\WindowsAzure\Services\Table\TableService;
use PEAR2\WindowsAzure\Services\Core\Configuration;
use PEAR2\Tests\Framework\TestResources;
use PEAR2\WindowsAzure\Services\Table\TableSettings;

/**
 * Unit tests for class TableService
 *
 * @category  Microsoft
 * @package   PEAR2\Tests\Unit\WindowsAzure\Services\Table
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class TableServiceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers PEAR2\WindowsAzure\Services\Table\TableService::create
     */
    public function testCreateWithConfig()
    {
        // Setup
        $uri = 'http://' . TestResources::accountName() . '.table.core.windows.net';
        $config = new Configuration();
        $config->setProperty(TableSettings::ACCOUNT_KEY, TestResources::accountKey());
        $config->setProperty(TableSettings::ACCOUNT_NAME, TestResources::accountName());        
        $config->setProperty(TableSettings::URI, $uri);
        
        // Test
        $tableWrapper = TableService::create($config);
        
        // Assert
        $this->assertInstanceOf('PEAR2\WindowsAzure\Services\Table\ITable', $tableWrapper);
    }
}

?>
