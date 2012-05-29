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
use WindowsAzure\ServiceBus\Models\RuleInfo;

/**
 * The result of a get rule request.
 *
 * @category  Microsoft
 * @package   WindowsAzure\ServiceBus\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */

class GetRuleResult
{
    /**
     * The information of the rule. 
     * 
     * @var RuleInfo
     */
    private $_ruleInfo;
    
    /**
     * Populate the properties with a specified get rule request response body. 
     * 
     * @param string $getRuleResponse The body of the response from a get rule request. 
     */
    public function parseXml($getRuleResponse)
    {
        $this->_ruleInfo = new RuleInfo();
        $this->_ruleInfo->parseXml($getRuleResponse);
    }

    /**
     * Creates a get rule result with default parameters. 
     */
    public function __construct()
    {
    }

    /**
     * Gets the information of the rule. 
     * 
     * @return RuleInfo
     */
    public function getRuleInfo()
    {
        return $this->_ruleInfo;
    }

    /**
     * Sets the information of the rule. 
     * 
     * @param RuleInfo $ruleInfo The information of the rule. 
     */
    public function setRuleInfo($ruleInfo)
    {
        $this->_ruleInfo = $ruleInfo;
    }

}
?>
