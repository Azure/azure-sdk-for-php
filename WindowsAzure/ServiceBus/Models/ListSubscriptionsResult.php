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

use WindowsAzure\Common\Internal\Atom\Feed;
use WindowsAzure\Common\Internal\Atom\Content;

/**
 * The result of the list subscription reaction. 
 *
 * @category  Microsoft
 * @package   WindowsAzure\ServiceBus\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class ListSubscriptionsResult extends Feed
{
    /**
     * The information of the subscription. 
     * 
     * @var SubscriptionInfo
     */
    private $_subscriptionInfo;

    /**
     * Creates a list subscription result instance with specified response from the server. 
     * 
     * @param string $response The response of the list subscription result. 
     */
    public function parseXml($response)
    {
        parent::parseXml($response);
        $listSubscriptionsResultXml = new \SimpleXMLElement($response);
        $this->_subscriptionInfo = array();
        foreach ($listSubscriptionsResultXml->entry as $entry)
        {
            $subscriptionInfo = new SubscriptionInfo();
            $subscriptionInfo->parseXml($entry->asXml());
            $this->_subscriptionInfo[] = $subscriptionInfo;
        }
    }

    /**
     * Creates a list subscriptions result with default parameters. 
     */
    public function __construct()
    {
    }
    
    /**
     * Gets the information of the subscription. 
     * 
     * @return SubscriptionInfo
     */
    public function getSubscriptionInfo()
    {
        return $this->_subscriptionInfo;
    }

    /**
     * Sets the information of the rule. 
     * 
     * @param SubscriptionInfo $subscriptionInfo The information of the
     * subscription.
     */
    public function setSubscriptionInfo($subscriptionInfo)
    {
        $this->_subscriptionInfo = $subscriptionInfo;
    }

}
?>
