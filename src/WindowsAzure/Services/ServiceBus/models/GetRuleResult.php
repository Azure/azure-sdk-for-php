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
 * @package   WindowsAzure\Services\Queue
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */

namespace WindowsAzure\Services\ServiceBus\Models;

use WindowsAzure\Core\Atom\Feed;
use WindowsAzure\Core\Atom\Content;

/**
 * This class constructs HTTP requests and receive HTTP responses for service bus.
 *
 * @category  Microsoft
 * @package   WindowsAzure\Services\ServiceBus
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */

class GetRuleResult
{
    /**
     * The description of the rule. 
     * 
     * @var RuleDescription
     */
    private $_ruleDescription;
    
    /**
     * Creates a get rule result with specified response. 
     * 
     * @param string $response The response of the get rule request from the server. 
     */
    public static function create($response)
    {
        $getRuleResult = new GetRuleResult();
        $feed = Feed::create($response);
        $entry = $feed->getEntry();
        $content = $entry->getContent();
        $ruleDescription = XmlSerializer::objectUnserialize($content->getText());
        $getRuleResult->setRuleDescription($ruleDescription);
        return $getRuleResult;
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
     * Sets the description of the rule. 
     * 
     * @param RuleDescription 
     */
    public function setRuleDescription($ruleDescription)
    {
        $this->_ruleDescription = $ruleDescription;
    }

}
?>
