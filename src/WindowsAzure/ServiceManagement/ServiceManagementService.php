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
 * @package   WindowsAzure\ServiceManagement
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
 
namespace WindowsAzure\ServiceManagement;
use WindowsAzure\Core\Configuration;
use WindowsAzure\Resources;

/**
 * Factory for creating IServiceManagement objects
 *
 * @category  Microsoft
 * @package   WindowsAzure\ServiceManagement
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class ServiceManagementService
{
    /**
     * Creates new object based on the builder type in the $config.
     *
     * @param WindowsAzure\Core\Configuration    $config  The config object.
     * @param WindowsAzure\Core\IServicesBuilder $builder The builder object.
     * 
     * @return WindowsAzure\ServiceManagement\IServiceManagement
     */
    public static function create($config, $builder = null)
    {
        return $config->create(Resources::SERVICE_MANAGEMENT_TYPE_NAME, $builder);
    }
}

?>
