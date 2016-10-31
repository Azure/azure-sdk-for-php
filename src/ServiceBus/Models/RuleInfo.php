<?php

/**
 * LICENSE: Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * http://www.apache.org/licenses/LICENSE-2.0.
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
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @link      https://github.com/WindowsAzure/azure-sdk-for-php
 */

namespace WindowsAzure\ServiceBus\Models;

use WindowsAzure\Common\Internal\Atom\Content;
use WindowsAzure\Common\Internal\Atom\Entry;
use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\Common\Internal\Validate;
use WindowsAzure\Common\Internal\Serialization\XmlSerializer;
use WindowsAzure\ServiceBus\Internal\Action;
use WindowsAzure\ServiceBus\Internal\Filter;

/**
 * The information of a rule.
 *
 * @category  Microsoft
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @version   Release: 0.5.0_2016-11
 *
 * @link      https://github.com/WindowsAzure/azure-sdk-for-php
 */
class RuleInfo
{
    /**
     * The entry of the rule info.
     *
     * @var Entry
     */
    private $_entry;

    /**
     * The description of the rule.
     *
     * @var RuleDescription
     */
    private $_ruleDescription;

    /**
     * Creates an RuleInfo with specified parameters.
     *
     * @param string          $title           The title of the rule
     * @param RuleDescription $ruleDescription The description of the rule
     */
    public function __construct(
        $title = Resources::EMPTY_STRING,
        $ruleDescription = null
    ) {
        Validate::isString($title, 'title');

        if (is_null($ruleDescription)) {
            $ruleDescription = new RuleDescription();
        }
        $this->_ruleDescription = $ruleDescription;
        $this->_entry = new Entry();
        $this->_entry->setTitle($title);
        $this->_entry->setAttribute(
            Resources::XMLNS,
            Resources::SERVICE_BUS_NAMESPACE
        );
    }

    /**
     * Populates the properties with a specified XML string based on ATOM
     * ENTRY schema.
     *
     * @param string $xmlString An XML string representing a rule info instance
     */
    public function parseXml($xmlString)
    {
        $this->_entry->parseXml($xmlString);
        $content = $this->_entry->getContent();
        if (is_null($content)) {
            $this->_ruleDescription = null;
        } else {
            $this->_ruleDescription = RuleDescription::create($content->getText());
        }
    }

    /**
     * Writes an XML string representing the rule info instance.
     *
     * @param \XMLWriter $xmlWriter The XML writer
     */
    public function writeXml(\XMLWriter $xmlWriter)
    {
        $content = null;
        if (!is_null($this->_ruleDescription)) {
            $content = new Content();
            $content->setText(
                XmlSerializer::objectSerialize(
                    $this->_ruleDescription, 'RuleDescription'
                )
            );
        }
        $this->_entry->setContent($content);
        $this->_entry->writeXml($xmlWriter);
    }

    /**
     * Gets the entry.
     *
     * @return Entry
     */
    public function getEntry()
    {
        return $this->_entry;
    }

    /**
     * Sets the entry.
     *
     * @param Entry $entry The entry of the queue info
     */
    public function setEntry($entry)
    {
        $this->_entry = $entry;
    }

    /**
     * Gets the title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->_entry->getTitle();
    }

    /**
     * Sets the title.
     *
     * @param string $title The title of the rule info
     */
    public function setTitle($title)
    {
        $this->_entry->setTitle($title);
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
     * @param Filter $filter The filter
     */
    public function setFilter(Filter $filter)
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
     * @param Action $action The action
     */
    public function setAction(Action $action)
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
     * @param RuleDescription $ruleDescription The description of the rule
     */
    public function setRuleDescription(RuleDescription $ruleDescription)
    {
        $this->_ruleDescription = $ruleDescription;
    }

    /**
     * With correlation ID filter.
     *
     * @param string $correlationId The ID of the correlation
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
     * @param string $sqlExpression The SQL expression of the filter
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
     */
    public function withTrueFilter()
    {
        $filter = new TrueFilter();
        $this->_ruleDescription->setFilter($filter);
    }

    /**
     * With false filter.
     */
    public function withFalseFilter()
    {
        $filter = new FalseFilter();
        $this->_ruleDescription->setFilter($filter);
    }

    /**
     * With empty rule action.
     */
    public function withEmptyRuleAction()
    {
        $action = new EmptyRuleAction();
        $this->_ruleDescription->setAction($action);
    }

    /**
     * With SQL rule action.
     *
     * @param string $sqlExpression The SQL expression
     *                              of the rule action
     */
    public function withSqlRuleAction($sqlExpression)
    {
        $action = new SqlRuleAction();
        $action->setCompatibilityLevel(20);
        $action->setSqlExpression($sqlExpression);
        $this->_ruleDescription->setAction($action);
    }

    /**
     * Gets the name of the rule description.
     *
     * @return string
     */
    public function getName()
    {
        return $this->_ruleDescription->getName();
    }

    /**
     * Sets the name of the rule description.
     *
     * @param string $name The name of the rule description
     */
    public function setName($name)
    {
        $this->_ruleDescription->setName($name);
    }
}
