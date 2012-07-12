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
 * @package   WindowsAzure\Common\Internal
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
 
namespace WindowsAzure\Common\Internal;

/**
 * By implementing this interface you can control how 
 * WindowsAzure\Common\Configuration creates your object when create
 * function is called. This can be useful if you want to add any processing layer
 * to the REST API wrapper (like handeling exceptions). So you can have a builder
 * with this build function:
 * <code>
 * $queueRestWrapper   = new QueueRestProxy(...)
 * $exceptionProcessor = new ExceptionProcessor($queueRestWrapper);
 * </code>
 *
 * @category  Microsoft
 * @package   WindowsAzure\Common\Internal
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
interface IServicesBuilder
{
    /**
     * Builds a blob object.
     *
     * @param string $connectionString The configuration connection string.
     * 
     * @return WindowsAzure\Blob\Internal\IBlob
     */
    public function createBlobService($connectionString);
    
    /**
     * Builds a queue object.
     *
     * @param string $connectionString The configuration connection string.
     * 
     * @return WindowsAzure\Queue\Internal\IQueue
     */
    public function createQueueService($connectionString);
    
    /**
     * Builds a table object.
     *
     * @param string $connectionString The configuration connection string.
     * 
     * @return WindowsAzure\Table\Internal\ITable
     */
    public function createTableService($connectionString);
    
    /**
     * Builds a service management object.
     *
     * @param string $connectionString The configuration connection string.
     * 
     * @return WindowsAzure\ServiceManagement\Internal\IServiceManagement
     */
    public function createServiceManagementService($connectionString);
    
    /**
     * Builds a servicebus object.
     * 
     * @param string $connectionString The configuration connection string.
     * 
     * @return WindowsAzure\ServiceBus\Internal\IServiceBus
     */
    public function createServiceBusService($connectionString);
}


