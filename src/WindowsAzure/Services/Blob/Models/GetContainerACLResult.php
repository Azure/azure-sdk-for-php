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
 * @package   PEAR2\WindowsAzure\Services\Blob\Models
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
 
namespace PEAR2\WindowsAzure\Services\Blob\Models;
use PEAR2\WindowsAzure\Services\Blob\Models\ContainerACL;

/**
 * Holds container ACL
 *
 * @category  Microsoft
 * @package   PEAR2\WindowsAzure\Services\Blob\Models
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class GetContainerACLResult
{
    private $_containerACL;
    
    /**
     * Parses the given array into signed identifiers
     * 
     * @param string $publicAccess container public access
     * @param string $etag         container etag
     * @param string $lastModified last modification in string representation
     * @param array  $parsed       parsed response into array representation
     * 
     * @return none.
     */
    public static function create($publicAccess, $etag, $lastModified, $parsed)
    {
        $result = new GetContainerACLResult();
        $acl    = ContainerACL::create($publicAccess, $etag, $lastModified, $parsed);
        $result->setContainerACL($acl);
        
        return $result;
    }
    
    /**
     * Gets container ACL
     * 
     * @return ContainerACL
     */
    public function getContainerACL()
    {
        return $this->_containerACL;
    }
    
    /**
     * Sets container ACL
     * 
     * @param ContainerACL $containerACL value.
     * 
     * @return none.
     */
    public function setContainerACL($containerACL)
    {
        $this->_containerACL = $containerACL;
    }
}

?>
