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
use WindowsAzure\ServiceBus\Internal\Atom\Feed;
use WindowsAzure\ServiceBus\Internal\Atom\Content;

/**
 * The results of a create rule request.
 *
 * @category  Microsoft
 * @package   WindowsAzure\ServiceBus\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */

class CreateRuleResult
{
    /**
     * The description of the rule. 
     *
     * @var string 
     */
    private $_ruleDescription;

    /**
     * Creates a create rule result object from response. 
     * 
     * @var string $response The response of the string. 
     */
    public static function create($response)
    {
        $createRuleResult = new CreateRuleResult();
        $feed = Feed::create($response);
        $content = $feed->getContent();
        $ruleDescription = RuleDescription::create($content->getText()); 
        $createRuleResult->setRuleDescription($ruleDescription);
        return $createRuleResult;
    }

    /**
     * Creates a create rule result instance with default parameters. 
     */
    public function __construct()
    {
    }

    /**
     * Gets rule description.
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
     * @param RuleDescription $ruleDescription The description of the rule. 
     */
    public function setRuleDescription($ruleDescription)
    {
        $this->_ruleDescription = $ruleDescription;
    } 
}
?>
