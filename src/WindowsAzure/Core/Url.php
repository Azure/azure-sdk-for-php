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
 * @package   PEAR2\WindowsAzure\Core
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
 
namespace PEAR2\WindowsAzure\Core;
use PEAR2\WindowsAzure\Validate;
use PEAR2\WindowsAzure\Resources;
use PEAR2\WindowsAzure\Core\IUrl;
require_once 'Net/URL2.php';

/**
 * Default IUrl implementation.
 *
 * @category  Microsoft
 * @package   PEAR2\WindowsAzure\Core
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class Url implements IUrl
{
    /**
     * @var \Net_URL2
     */
    private $_url;

    /**
     * Constructor
     * 
     * @param string $url the url to set.
     * 
     * @return PEAR2\WindowsAzure\Core\Url
     */
    public function __construct($url)
    {
        $errorMessage = Resources::INVALID_URL_MSG;
        Validate::isTrue(filter_var($url, FILTER_VALIDATE_URL), $errorMessage);
        
        $this->_url = new \Net_URL2($url);
    }
    
    /**
     * Returns the query portion of the url
     * 
     * @return string
     */
    public function getQuery()
    {
        return $this->_url->getQuery();
    }

    /**
     * Returns the query portion of the url in array form
     * 
     * @return array
     */
    public function getQueryVariables()
    {
        return $this->_url->getQueryVariables();
    }

    /**
     * Sets a an existing query parameter to value or creates a new one if the $key
     * doesn't exist.
     * 
     * @param string $key   query parameter name.
     * @param string $value query value.
     * @param bool   $force sets the header even if $value is not set.
     * 
     * @return none.
     */
    public function setQueryVariable($key, $value, $force = false)
    {
        Validate::isString($key);
        Validate::notNullOrEmpty($key);
        Validate::isString($value);

        if (isset($value)) {
            $this->_url->setQueryVariable(strtolower($key), $value);
        } else if ($force) {
            $this->_url->setQueryVariable(strtolower($key), $value);
        }
    }
    
    /**
     * Gets actual URL string.
     * 
     * @return string.
     */
    public function getUrl()
    {
        return $this->_url->getURL();
    }
    
    /**
     * Sets url path
     * 
     * @param string $urlPath url path to set.
     * 
     * @return none.
     */
    public function setUrlPath($urlPath)
    {
        Validate::isString($urlPath);
        Validate::notNullOrEmpty($urlPath);
        
        $this->_url->setPath($urlPath);
    }
    
    /**
     * Appends url path
     * 
     * @param string $urlPath url path to append.
     * 
     * @return none.
     */
    public function appendUrlPath($urlPath)
    {
        Validate::isString($urlPath);
        Validate::notNullOrEmpty($urlPath);
        
        $newUrlPath = parse_url($this->_url, PHP_URL_PATH) . $urlPath;
        $this->_url->setPath($newUrlPath);
    }
    
    /**
     * Gets actual URL string.
     * 
     * @return string.
     */
    public function __toString()
    {
        return $this->_url->getURL();
    }
    
    /**
     * Resets URL path and query string.
     * 
     * @return none.
     */
    public function reset()
    {
        // Reset url path section
        $this->setUrlPath('/');
        
        // Clear query variables
        $this->_url->setQuery(Resources::EMPTY_STRING);
    }
}

?>
