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
 * @package   WindowsAzure\Services\Queue\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
 
namespace WindowsAzure\Services\ServiceBus\Models;
use WindowsAzure\Resources;
use WindowsAzure\Utilities;
use WindowsAzure\Validate;

/**
 * The information regarding the rule.
 *
 * @category  Microsoft
 * @package   WindowsAzure\Services\ServiceBus\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */

class RuleInfo
{
    /** 
     * The name of the rule.
     * 
     * @var string
     */
    private $_name;
    
    /**
     * The description of the rule.
     * 
     * @var RuleDescription
     */
    private $_ruleDescription;

    /**
     * Creates an RuleInfo with specified parameters.
     *
     * @param string          $name            The name of the rule.
     * @param RuleDescription $ruleDescription The description of the rule.
     * 
     */
    public function __construct($name, $ruleDescription = null)
    {
        Validate::isString($name);

        if (is_null($ruleDescription))
        {
            $ruleDescription = new RuleDescription();
        }
        $this->_name = $name;
        $this->_ruleDescription = $ruleDescription;
    }

    /**
     * Gets the name of the 
     *
     * @return WrapAccessTokenResult
     */
    public function getName()
    {
        return $this->_name;
    }

    public function setName($name)
    {
        $this->_name = $name;
    }

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
    public function withCorrelationIdFilter($correlationId)
    {
        $filter = new CorrelationFilter();
        $filter->setCorrealtionId($correaltionId);
        $this->_ruleDescription->setFilter($filter);
    }

    /**
     * With sql expression filter. 
     * 
     * @param string $sqlExpression The SQL expression of the filter. 
     * 
     * @return none 
     */
    public function withSqlExpressionFilter($sqlExpression)
    {
        $filter = new SqlFilter();
        $filter->setSqlExpression($sqlExpression);
        $filter->setComaptibilityLevel(20);
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
}

