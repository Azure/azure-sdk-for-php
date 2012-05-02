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
 * @package   Tests\Framework
 * @author    Albert Cheng <gongchen at the largest software company>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
namespace Tests\Framework;
use Tests\Framework\ServiceRestProxyTestBase;
use Tests\Framework\TestResources;
use WindowsAzure\Core\Configuration;
use WindowsAzure\Services\Core\Models\ServiceProperties;
use WindowsAzure\Services\ServiceBus\WrapSettings;
use WindowsAzure\Services\ServiceBus\WrapService;

/**
 * TestBase class for each unit test class.
 *
 * @category  Microsoft
 * @package   Tests\Framework
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class WrapRestProxyTestBase extends ServiceRestProxyTestBase
{
    public function __construct()
    {
        $config = new Configuration();
        $config->setProperty(ServiceBusSettings::URI, TestResources::serviceBusUri());
        $config->setProperty(ServiceBusSettings::WRAP_URI, TestResources::wrapUri());
        $config->setProperty(ServiceBusSettings::WRAP_NAME, TestResources::wrapName());        
        $config->setProperty(ServiceBusSettings::WRAP_PASSWORD, TestResources::wrapPassword());        
        $wrapWrapper = WrapRestProxy::create($config);
        parent::__construct($config, $wrapWrapper);
    }
    
}

?>
