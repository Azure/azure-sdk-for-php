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
     * Creates a BlobRestProxy using the passed configuration.
     *
     * @param WindowsAzure\Common\Configuration $config The configuration object.
     * 
     * @return WindowsAzure\Blob\BlobRestProxy
     */
    public function createBlobService($config);
    
    /**
     * Creates a QueueRestProxy using the passed configuration.
     *
     * @param WindowsAzure\Common\Configuration $config The configuration object.
     * 
     * @return WindowsAzure\Queue\QueueRestProxy
     */
    public function createQueueService($config);
    
    /**
     * Creates a TableRestProxy using the passed configuration.
     *
     * @param WindowsAzure\Common\Configuration $config The configuration object.
     * 
     * @return WindowsAzure\Table\TableRestProxy
     */
    public function createTableService($config);
    
    /**
     * Creates a ServiceManagementRestProxy using the passed configuration.
     *
     * @param WindowsAzure\Common\Configuration $config The configuration object.
     * 
     * @return WindowsAzure\ServiceManagement\ServiceManagementRestProxy
     */
    public function createServiceManagementService($config);
    
    /**
     * Creates a ServiceBusRestProxy using the passed configuration.
     *
     * @param WindowsAzure\Common\Configuration $config The configuration object.
     * 
     * @return WindowsAzure\ServiceBus\ServiceBusRestProxy
     */
    public function createServiceBusService($config);
}


