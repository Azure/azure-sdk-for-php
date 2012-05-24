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
 * The results of a create subscription request.
 *
 * @category  Microsoft
 * @package   WindowsAzure\ServiceBus\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */

class CreateSubscriptionResult
{
    /**
     * The description of the subscription. 
     *
     * @var string 
     */
    private $_subscriptionDescription;

    /**
     * Creates a create subscription result object from response. 
     * 
     * @var string $response The response of the string. 
     */
    public static function create($response)
    {
        $createSubscriptionResult = new CreateSubscriptionResult();
        $feed = Feed::create($response);
        $content = $feed->getContent();
        $subscriptionDescription = SubscriptionDescription::create(
            $content->getText()
        ); 
        $createSubscriptionResult->setSubscriptionDescription($subscriptionDescription);
        return $createSubscriptionResult;
    }

    /**
     * Creates a create subscription result instance with default parameters. 
     */
    public function __construct()
    {   
    }

    /**
     * Gets subscription description.
     * 
     * @return SubscriptionDescription
     */
    public function getSubscriptionDescription()
    {
        return $this->_subscriptionDescription;
    }

    /**
     * Sets the subscription description. 
     * 
     * @param SubscriptionDescription $subscriptionDescription The description of the subscription. 
     */
    public function setSubscriptionDescription($subscriptionDescription)
    {
        $this->_subscriptionDescription = $subscriptionDescription;
    } 
}
?>
