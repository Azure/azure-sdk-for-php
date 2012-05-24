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
use WindowsAzure\Common\Internal\Utilities;

/**
 *  The description of the rule.
 *
 * @category  Microsoft
 * @package   WindowsAzure\ServiceBus\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */

class RuleDescription
{
    /**
     * The filter of the rule. 
     * 
     * @var Filter
     */
    private $_filter;
    
    /**
     * The action of the rule. 
     * 
     * @var Action
     */
    private $_action;

    /**
     * The name of the rule. 
     * 
     * @var string 
     */
    private $_name;


    /**
     * Creates a rule description instance with default parameters. 
     */
    public function __construct()
    {   
    }

    /**
     * Creates a Rule Description with specified XML string. 
     * 
     * @param string $ruleDescriptionXml A XML string describing the Rule.
     */
    public static function create($ruleDescriptionXml)
    {
        $ruleDescription = new RuleDescription();
        $root = simplexml_load_string($ruleDescriptionXml);
        $ruleDescriptionArray = (array)$root;
        if (array_key_exists('Filter', $ruleDescriptionArray))
        {
            $ruleDescription->setFilter($ruleDescriptionArray['Filter']);
        } 

        if (array_key_exists('Action', $ruleDescriptionArray))
        {
            $ruleDescription->setAction($ruleDescriptionArray['Action']);
        } 

        if (array_key_exists('Name', $ruleDescriptionArray))
        {
            $ruleDescription->setName($ruleDescriptionArray['Name']);
        } 
       
        return $ruleDescription;
    }
    
    /**
     * Gets the filter. 
     *
     * @return Filter
     */
    public function getFilter()
    {
        return $this->_filter;
    }

    /**
     * Sets the filter of the rule description. 
     * 
     * @param Filter $filter The filter of the rule description. 
     */
    public function setFilter($filter)
    {
        $this->_filter = $filter;
    }

    /**
     * Gets the action. 
     *
     * @return Action
     */
    public function getAction()
    {
        return $this->_action;
    }

    /**
     * Sets the action of the rule description. 
     * 
     * @param Action $action The action of the rule description. 
     */
    public function setAction($action)
    {
        $this->_action = $action;
    }

    /**
     * Gets the name. 
     *
     * @return string
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * Sets the name of the rule description. 
     * 
     * @param string $name The name of the rule description. 
     */
    public function setName($name)
    {
        $this->_name = $name;
    }


}
?>
