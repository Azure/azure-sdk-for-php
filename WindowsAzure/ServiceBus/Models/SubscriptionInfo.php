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
use WindowsAzure\ServiceBus\Models\SubscriptionDescription;
use WindowsAzure\Common\Internal\Utilities;

/**
 * An active WRAP access Token.
 *
 * @category  Microsoft
 * @package   WindowsAzure\ServiceBus\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class SubscriptionInfo
{
    /** 
     * The name of the subscription. 
     * 
     * @var string
     */
    private $_name;

    /** 
     * The description of the subscription. 
     * 
     * @var SubscriptionDescription
     */
    private $_subscriptionDescription;

    /**
     * Creates a SubscriptionInfo instance with specified parameters.
     *
     * @param string                  $name                    The name of 
     * the subscription.
     * @param SubscriptionDescription $subscriptionDescription The description 
     * of the subscription.
     * 
     */
    public function __construct($name = Resources::EMPTY_STRING, $subscriptionDescription = null)
    {
        $this->_name = $name;
        if (is_null($subscriptionDescription))
        {
            $subscriptionDescription = new SubscriptionDescription();
        }

        $this->_subscriptionDescription = $subscriptionDescription;
    }

    /**
     * Gets the name of the subscription.
     *
     * @return string
     */
    public function getName()
    {
        return $this->_name;
    }

    /** 
     * Sets the name of the subscription. 
     * 
     * @param string $name the name of the subscription. 
     */
    public function setName($name)
    {
        $this->_name = $name;
    }

    /**
     * Gets subscription description. 
     */
    public function getSubscriptionDescription()
    {
        return $this->_subscriptionDescription;
    }

    /**
     * Sets subscription description. 
     * 
     * @param string $subscriptionDescription The description of the subscription. 
     */
    public function setSubscriptionDescription($subscriptionDescription)
    {
        $this->_subscriptionDescription = $subscriptionDescription;
    }
    
}
?>
