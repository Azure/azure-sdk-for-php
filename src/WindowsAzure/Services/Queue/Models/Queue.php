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
 * @package   PEAR2\WindowsAzure\Services\Queue\Models
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
 
namespace PEAR2\WindowsAzure\Services\Queue\Models;
use PEAR2\WindowsAzure\Resources;
use PEAR2\WindowsAzure\Utilities\Utilities;

/**
 * Azure queue object.
 *
 * @category  Microsoft
 * @package   PEAR2\WindowsAzure\Services\Queue\Models
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class Queue
{
    private $_name;
    private $_url;
    private $_metadata;

    /**
     * Creates new PEAR2\WindowsAzure\Services\Queue\Models\Queue object 
     * from parsed XML.
     * 
     * @param array $raw parsed XML.
     * 
     * @static
     * 
     * @return PEAR2\WindowsAzure\Services\Queue\Queue.
     */
    public static function createOneObject($raw)
    {
        $queue = new Queue($raw['Name'], $raw['Url']);
        $queue->setMetadata(Utilities::getValue($raw, Resources::METADATA, null));

        return $queue;
    }

    /**
     * Creates an array of PEAR2\WindowsAzure\Services\Queue\Models\Queue from 
     * parsed XML.
     * 
     * @param array $raw parsed XML.
     * 
     * @static
     * 
     * @return array.
     */
    public static function createArray($raw)
    {
        $queues = array();
        foreach ($raw as $rawQueue) {
            $queues[] = self::createOneObject($rawQueue);
        }

        return $queues;
    }

    /**
     * Constructor
     * 
     * @param string $name queue name.
     * @param string $url  queue url.
     * 
     * @return PEAR2\WindowsAzure\Services\Queue\Models\Queue.
     */
    function __construct($name, $url)
    {
        $this->_name = $name;
        $this->_url  = $url;
    }

    /**
     * Gets queue name.
     *
     * @return string.
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * Sets queue name.
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
     * Gets queue url.
     *
     * @return string.
     */
    public function getUrl()
    {
        return $this->_url;
    }

    /**
     * Sets queue url.
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
     * Gets queue metadata.
     *
     * @return array.
     */
    public function getMetadata()
    {
        return $this->_metadata;
    }

    /**
     * Sets queue metadata.
     *
     * @param string $metadata value.
     * 
     * @return none.
     */
    public function setMetadata($metadata)
    {
        $this->_metadata = $metadata;
    }
}

?>