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
 * @package   WindowsAzure\ServiceManagement\Models
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
 
namespace WindowsAzure\ServiceManagement\Models;
use WindowsAzure\Resources;
use WindowsAzure\Utilities;

/**
 * The result of an asynchronous operation.
 *
 * @category  Microsoft
 * @package   WindowsAzure\ServiceManagement\Models
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class AsynchronousOperationResult
{
    /**
     * @var string
     */
    private $_requestId;
    
    public function create($headers)
    {
        $result = new AsynchronousOperationResult();
        $result->_requestId = Utilities::tryGetValue(
            $headers,
            Resources::X_MS_REQUEST_ID
        );
        
        return $result;
    }
    
    /**
     * Gets the requestid.
     * 
     * @return string
     */
    public function getRequestId()
    {
        return $this->_requestId;
    }
    
    /**
     * Sets the requestid.
     * 
     * @param string $requestid The requestid.
     * 
     * @return none
     */
    public function setRequestId($requestid)
    {
        $this->_requestId = $requestid;
    }
}

?>
