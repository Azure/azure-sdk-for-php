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
 * @package   WindowsAzure\Services\Blob\Models
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
 
namespace WindowsAzure\Services\Blob\Models;
use WindowsAzure\Services\Blob\Models\AccessPolicy;

/**
 * Holds container signed identifiers.
 * 
 * @category  Microsoft
 * @package   WindowsAzure\Services\Blob\Models
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class SignedIdentifier
{
    private $_id;
    private $_accessPolicy;
    
    /**
     * Gets id.
     *
     * @return string.
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * Sets id.
     *
     * @param string $id value.
     * 
     * @return none.
     */
    public function setId($id)
    {
        $this->_id = $id;
    }
    
    /**
     * Gets accessPolicy.
     *
     * @return string.
     */
    public function getAccessPolicy()
    {
        return $this->_accessPolicy;
    }

    /**
     * Sets accessPolicy.
     *
     * @param string $accessPolicy value.
     * 
     * @return none.
     */
    public function setAccessPolicy($accessPolicy)
    {
        $this->_accessPolicy = $accessPolicy;
    }
    
    /**
     * Converts this current object to XML representation.
     * 
     * @return array.
     */
    public function toXml()
    {
        $array = array();
        
        $array['SignedIdentifier']['Id']           = $this->_id;
        $array['SignedIdentifier']['AccessPolicy'] = $this->_accessPolicy->toXml();
        
        return $array;
    }
}

?>
