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
 * @package   WindowsAzure\Services\Subscriptions
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */

namespace WindowsAzure\Services\ServiceBus\Models;

use WindowsAzure\Core\Atom\Feed;
use WindowsAzure\Core\Atom\Content;

/**
 * The result of the list subscription reaction. 
 *
 * @category  Microsoft
 * @package   WindowsAzure\Services\ServiceBus
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class ListSubscriptionsResult
{
    /**
     * The description of the subscription. 
     * 
     * @var SubscriptionDescription
     */
    private $_subscriptionDescription;

    /**
     * Creates a list subscription result instance with specified response from the server. 
     * 
     * @param string $response The response of the list subscription result. 
     */
    public static function create($response)
    {
        $getSubscriptionsResult = new ListSubscriptionsResult();
        $feed = Feed::create($response);
        $content = $feed->getContent();
        $subscriptionDescription = XmlSerializer::objectDeserialize($content->getText());  
        $getSubscriptionsResult->setSubscriptionsDescription($subscriptionDescription);
    }
    
    /**
     * Gets the description of the subscription. 
     * 
     * @return SubscriptionDescription
     */
    public function getRuleDescription()
    {
        return $this->_subscriptionDescription;
    }

    /**
     * Sets the description of the rule. 
     * 
     * @param SubscriptionDescription $subscriptionDescription The description of the
     * subscription.
     */
    public function setRuleDescription($subscriptionDescription)
    {
        $this->_subscriptionDescription = $subscriptionDescription;
    }

}
?>
