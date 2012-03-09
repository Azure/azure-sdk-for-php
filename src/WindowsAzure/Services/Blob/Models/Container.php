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
use PEAR2\WindowsAzure\Resources;
use PEAR2\WindowsAzure\Utilities;

/**
 * Azure container object.
 *
 * @category  Microsoft
 * @package   PEAR2\WindowsAzure\Services\Blob\Models
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class Container
{
    private $_name;
    private $_url;
    private $_metadata;
    private $_properties;

    /**
     * Gets container name.
     *
     * @return string.
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * Sets container name.
     *
     * @param string $name value.
     * 
     * @return none.
     */
    public function setName($name)
    {
        $this->_name = $name;
    }

    /**
     * Gets container url.
     *
     * @return string.
     */
    public function getUrl()
    {
        return $this->_url;
    }

    /**
     * Sets container url.
     *
     * @param string $url value.
     * 
     * @return none.
     */
    public function setUrl($url)
    {
        $this->_url = $url;
    }

    /**
     * Gets container metadata.
     *
     * @return array.
     */
    public function getMetadata()
    {
        return $this->_metadata;
    }

    /**
     * Sets container metadata.
     *
     * @param string $metadata value.
     * 
     * @return none.
     */
    public function setMetadata($metadata)
    {
        $this->_metadata = $metadata;
    }
    
    /**
     * Gets container properties
     * 
     * @return PEAR2\WindowsAzure\Services\Blob\Models\ContainerProperties
     */
    public function getProperties()
    {
        return $this->_properties;
    }
    
    /**
     * Sets container properties
     * 
     * @param Models\ContainerProperties $properties container properties
     * 
     * @return none.
     */
    public function setProperties($properties)
    {
        $this->_properties = $properties;
    }
}

?>