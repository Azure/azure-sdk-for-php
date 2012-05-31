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
 * @package   WindowsAzure\ServiceBus\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
namespace WindowsAzure\ServiceBus\Models;
use WindowsAzure\Common\Internal\Resources;

/**
 * The base class for rule filter.
 *
 * @category  Microsoft
 * @package   WindowsAzure\ServiceBus\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */

class Filter 
{
    /** 
     * The attributes of the filter. 
     *
     * @var array
     */ 
    protected $_attributes;

    /**
     * The compatibility level of the filter. 
     * 
     * @var string 
     */
    private $_compatibilityLevel;

    /**
     * Creates a filter with default parameters. 
     */
    public function __construct()
    {
        $this->_attributes              = array();
        $this->_attributes['xmlns:xsi'] = Resources::XSI_XML_NAMESPACE;
    }

    public static function create($filterXmlString)
    {
        echo $filterXmlString;
        echo '\n';
        $filterXml = simplexml_load_string($filterXmlString);
        $attributes = (array)$filterXml->attributes();

        if (array_key_exists('i:type', $attributes))
        {
            $type = (string)$attributes['i:type'];
            if ($type === 'TrueFilter')
            {
                return new TrueFilter();
            }

            if ($type === 'FalseFilter')
            {
                return new FalseFilter();
            }

            return new Filter();
        }
    }

    /**
     * Gets the attributes. 
     *
     * @return array
     */ 
    public function getAttributes()
    {
        return $this->_attributes;
    }

    /**
     * Sets an attribute. 
     *
     * @param string $key   The key of the attribute.
     * @param string $value The value of the attribute.
     */
    public function setAttribute($key, $value)
    {
        $this->_attributes[$key] = $value;
    }   

    /**
     * Gets the compatibility level. 
     * 
     * @return string 
     */
    public function getCompatibilityLevel()
    {
        return $this->_compatibilityLevel;
    }

    /**
     * Sets the compatibility level. 
     * 
     * @param string $compatibilityLevel The compatibility level. 
     */
    public function setCompatibilityLevel($compatibilityLevel)
    {
        $this->_compatibilityLevel = $compatibilityLevel;
    }
}
?>
