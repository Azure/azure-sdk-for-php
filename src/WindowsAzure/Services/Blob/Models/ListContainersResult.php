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
use PEAR2\WindowsAzure\Services\Blob\Models\Container;
use PEAR2\WindowsAzure\Utilities;
use PEAR2\WindowsAzure\Core\WindowsAzureUtilities;

/**
 * Container to hold list container response object.
 *
 * @category  Microsoft
 * @package   PEAR2\WindowsAzure\Services\Blob\Models
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class ListContainersResult
{
    private $_containers;
    private $_prefix;
    private $_marker;
    private $_nextMarker;
    private $_maxResults;

    /**
     * Creates ListBlobResult object from parsed XML response.
     *
     * @param array $parsedResponse XML response parsed into array.
     * 
     * @return PEAR2\WindowsAzure\Services\Blob\Models\ListBlobResult.
     */
    public static function create($parsedResponse)
    {
        $result              = new ListContainersResult();
        $result->_prefix     = Utilities::tryGetValue(
            $parsedResponse, Resources::PREFIX
        );
        $result->_marker     = Utilities::tryGetValue(
            $parsedResponse, Resources::MARKER
        );
        $result->_nextMarker = Utilities::tryGetValue(
            $parsedResponse, Resources::NEXT_MARKER
        );
        $result->_maxResults = Utilities::tryGetValue(
            $parsedResponse, Resources::MAX_RESULTS
        );
        $result->_containers = array();
        $rawContainer        = array();
        
        if (is_array($parsedResponse['Containers'])) {
            $containersArray = $parsedResponse['Containers']['Container'];
            $rawContainer    = Utilities::getArray($containersArray);
        }
        
        foreach ($rawContainer as $value) {
            $container = new Container();
            $container->setName($value['Name']);
            $container->setUrl($value['Url']);
            $container->setMetadata(
                Utilities::tryGetValue($value, Resources::METADATA)
            );
            $properties = new ContainerProperties();
            $date       = $value['Properties']['Last-Modified'];
            $date       = WindowsAzureUtilities::rfc1123ToDateTime($date);
            $properties->setLastModified($date);
            $properties->setEtag($value['Properties']['Etag']);
            $container->setProperties($properties);
            $result->_containers[] = $container;
        }
        
        return $result;
    }

    /**
     * Sets containers.
     *
     * @param array $containers list of containers
     * 
     * @return none.
     */
    public function setContainers($containers)
    {
        $this->_containers = array();
        foreach ($containers as $container) {
            $this->_containers[] = clone $container;
        }
    }
    
    /**
     * Gets containers.
     *
     * @return array.
     */
    public function getContainers()
    {
        return $this->_containers;
    }

    /**
     * Gets perfix.
     *
     * @return string.
     */
    public function getPrefix()
    {
        return $this->_prefix;
    }

    /**
     * Sets perfix.
     *
     * @param string $prefix value.
     * 
     * @return none.
     */
    public function setPrefix($prefix)
    {
        $this->_prefix = $prefix;
    }

    /**
     * Gets marker.
     * 
     * @return string.
     */
    public function getMarker()
    {
        return $this->_marker;
    }

    /**
     * Sets marker.
     *
     * @param string $marker value.
     * 
     * @return none.
     */
    public function setMarker($marker)
    {
        $this->_marker = $marker;
    }

    /**
     * Gets max results.
     * 
     * @return string.
     */
    public function getMaxResults()
    {
        return $this->_maxResults;
    }

    /**
     * Sets max results.
     *
     * @param string $maxResults value.
     * 
     * @return none.
     */
    public function setMaxResults($maxResults)
    {
        $this->_maxResults = $maxResults;
    }

    /**
     * Gets next marker.
     * 
     * @return string.
     */
    public function getNextMarker()
    {
        return $this->_nextMarker;
    }

    /**
     * Sets next marker.
     *
     * @param string $nextMarker value.
     * 
     * @return none.
     */
    public function setNextMarker($nextMarker)
    {
        $this->_nextMarker = $nextMarker;
    }
}

?>
