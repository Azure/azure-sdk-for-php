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
 * @link      http://pear.php.net/package/azure-sdk-for-php
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
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
interface IServiceBuilder
{
    /**
     * Creates an object passed $type configured with $config.
     *
     * @param WindowsAzure\Common\Configuration $config The configuration.
     * @param string                            $type   The type name.
     * 
     * @return mix
     */
    public function build($config, $type);
}

?>
