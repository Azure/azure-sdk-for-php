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
 * @package   PEAR2\WindowsAzure\ServiceRuntime
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */

namespace PEAR2\WindowsAzure\ServiceRuntime;
use PEAR2\WindowsAzure\Resources;

/**
 * The runtime version manager.
 *
 * @category  Microsoft
 * @package   PEAR2\WindowsAzure\ServiceRuntime\RuntimeVersionManager
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class RuntimeVersionManager
{
    /**
     * The protocol client.
     * 
     * @var Protocol1RuntimeClient
     */
    private $_protocolClient;
    
    /**
     * The supported versions list.
     * 
     * @var array
     */
    private $_supportedVersionList;
    
    /**
     * Constructor
     * 
     * @param Protocol1RuntimeClient $protocolClient The protocol client.
     */
    public function __construct($protocolClient)
    {
        $this->_protocolClient = $protocolClient;
    }
    
    /**
     * Gets the runtime client.
     * 
     * @param string $versionEndpoint The endpoint's version.
     *
     * @return Protocol1RuntimeClient
     */
    public function getRuntimeClient($versionEndpoint)
    {
        throw new \Exception(Resources::NOT_IMPLEMENTED_MSG);
    }
}

?>