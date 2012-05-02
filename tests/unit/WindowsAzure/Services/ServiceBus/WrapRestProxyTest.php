<?php

/**
 * Unit tests for the SDK
 *
 * PHP version 5
 *
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
 * @package    Tests\Unit\WindowsAzure\Services\Queue
 * @author     Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright  2012 Microsoft Corporation
 * @license    http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link       http://pear.php.net/package/azure-sdk-for-php
 */

namespace Tests\Unit\WindowsAzure\Services\Queue;
use WindowsAzure\Core\WindowsAzureUtilities;
use Tests\Framework\QueueServiceRestProxyTestBase;
use WindowsAzure\Core\Configuration;
use WindowsAzure\Services\Core\Models\ServiceProperties;
use WindowsAzure\Services\Queue\QueueRestProxy;
use WindowsAzure\Services\Queue\IQueue;
use WindowsAzure\Services\Queue\QueueService;
use WindowsAzure\Services\Queue\QueueSettings;
use WindowsAzure\Services\Queue\Models\ListQueuesOptions;
use WindowsAzure\Services\Queue\Models\ListQueuesResult;
use WindowsAzure\Services\Queue\Models\CreateQueueOptions;
use WindowsAzure\Services\Queue\Models\GetQueueMetadataResult;
use WindowsAzure\Services\Queue\Models\ListMessagesResult;
use WindowsAzure\Services\Queue\Models\ListMessagesOptions;
use WindowsAzure\Services\Queue\Models\PeekMessagesResult;
use WindowsAzure\Services\Queue\Models\PeekMessagesOptions;
use WindowsAzure\Services\Queue\Models\UpdateMessageResult;
use WindowsAzure\Services\Queue\Models\QueueServiceOptions;
use Tests\Framework\TestResources;
use WindowsAzure\Resources;
use WindowsAzure\Core\ServiceException;

/**
 * Unit tests for QueueRestProxy class
 *
 * @package    Tests\Unit\WindowsAzure\Services\Queue
 * @author     Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright  2012 Microsoft Corporation
 * @license    http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version    Release: @package_version@
 * @link       http://pear.php.net/package/azure-sdk-for-php
 */
class WrapRestProxyTest extends WrapRestProxyTestBase
{
    public 
}

?>