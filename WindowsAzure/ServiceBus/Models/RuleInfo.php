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
use WindowsAzure\Common\Internal\Atom\Content;
use WindowsAzure\Common\Internal\Atom\Entry;
use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\Common\Internal\Utilities;
use WindowsAzure\Common\Internal\Validate;
use WindowsAzure\Common\Internal\Serialization\XmlSerializer;

/**
 * The information of a rule.
 *
 * @category  Microsoft
 * @package   WindowsAzure\ServiceBus\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */

class RuleInfo extends Entry
{
    /**
     * The description of the rule.
     * 
     * @var RuleDescription
     */
    private $_ruleDescription;

    /**
     * Creates an RuleInfo with specified parameters.
     *
     * @param string          $title           The title of the rule.
     * @param RuleDescription $ruleDescription The description of the rule.
     * 
     */
    public function __construct($title = Resources::EMPTY_STRING, $ruleDescription = null)
    {
        Validate::isString($title, 'title');

        if (is_null($ruleDescription))
        {
            $ruleDescription = new RuleDescription();
        }
        $this->_title = $title;
        $this->_ruleDescription = $ruleDescription;
    }

    /**
     * Populates the properties with a specified XML string based on ATOM ENTRY schema. 
     * 
     * @param string $xmlString An XML string representing a rule info instance.
     */
    public function parseXml($xmlString)
    {
        parent::parseXml($xmlString);
        $content = $this->_content;
        if (is_null($content)) {
            $this->_ruleDescription = null;
        }
        else {
            $this->_ruleDescription = RuleDescription::create($content->getText());
        }
    }

    /**
     * Writes an XML string representing the rule info instance. 
     * 
     * @return string
     */
    public function writeXml()
    {
        if (is_null($this->_ruleDescription)) {
            $this->_content = null;    
        }
        else {
            $this->_content = new Content();
            $this->_content->setText(
                XmlSerializer::objectSerialize(
                    $this->_ruleDescription, 'RuleDescription'
                )
            );
        }

        return parent::writeXml();
    }

    /**
     * Gets the filter. 
     *
     * @return Filter
     */
    public function getFilter()
    {
        return $this->_ruleDescription->getFilter();
    }

    /**
     * Sets the filter. 
     * 
     * @param Filter $filter The filter. 
     */
    public function setFilter($filter)
    {
        $this->_ruleDescription->setFilter($filter);
    }

    /**
     * Gets the action. 
     * 
     * @return Action
     */
    public function getAction()
    {
        return $this->_ruleDescription->getAction();
    }

    /**
     * Sets the action. 
     * 
     * @param Action $action The action. 
     */
    public function setAction($action)
    {
        $this->_ruleDescription->setAction($action);
    }

    /**
     * Gets the description of the rule. 
     * 
     * @return RuleDescription
     */
    public function getRuleDescription()
    {
        return $this->_ruleDescription;
    }

    /**
     * Sets the rule description. 
     * 
     * @param $ruleDescription The description of the rule. 
     * 
     * @return none 
     */
    public function setRuleDescription($ruleDescription)
    {
        $this->_ruleDescription = $ruleDescription;
    }
    
    /**
     * With correlation ID filter. 
     * 
     * @param string $correlationId The ID of the correlation.
     * 
     * @return none 
     */
    public function withCorrelationFilter($correlationId)
    {
        $filter = new CorrelationFilter();
        $filter->setCorrelationId($correlationId);
        $this->_ruleDescription->setFilter($filter);
    }

    /**
     * With sql expression filter. 
     * 
     * @param string $sqlExpression The SQL expression of the filter. 
     * 
     * @return none 
     */
    public function withSqlFilter($sqlExpression)
    {
        $filter = new SqlFilter();
        $filter->setSqlExpression($sqlExpression);
        $filter->setCompatibilityLevel(20);
        $this->_ruleDescription->setFilter($filter);
    }

    /**
     * With true filter. 
     * 
     * @return none 
     */
    public function withTrueFilter()
    {
        $filter = new TrueFilter();
        $filter->setCompatibilityLevel(20);
        $this->_ruleDescription->setFilter($filter);
    }

    /**
     * With false filter. 
     * 
     * @return none 
     */
    public function withFalseFilter() 
    {
        $filter = new FalseFilter();
        $filter->setCompatibilityLevel(20);
        $this->_ruleDescription->setFilter($filter);
    }

    /**
     * With empty rule action. 
     * 
     */
    public function withEmptyRuleAction()
    {
        $action = new EmptyRuleAction();
        $action->setCompatibilityLevel(20);
        $this->_ruleDescription->setAction($action);
    }

    /**
     * With SQL rule action. 
     * 
     * @param string $sqlExpression 
     */
    public function withSqlRuleAction($sqlExpression)
    {
        $action = new SqlRuleAction();
        $action->setCompatibilityLevel(20);
        $action->setSqlExpression($sqlExpression);
        $this->_ruleDescription->setAction($action);
    }

}

