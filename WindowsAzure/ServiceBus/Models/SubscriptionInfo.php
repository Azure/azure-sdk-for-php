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

use WindowsAzure\Common\Internal\Atom\Entry;
use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\Common\Internal\Utilities;
use WindowsAzure\Common\Internal\Validate;
use WindowsAzure\ServiceBus\Models\SubscriptionDescription;

/**
 * The information of a subscription.
 *
 * @category  Microsoft
 * @package   WindowsAzure\ServiceBus\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class SubscriptionInfo extends Entry
{
    /** 
     * The description of the subscription. 
     * 
     * @var SubscriptionDescription
     */
    private $_subscriptionDescription;

    /**
     * Creates a SubscriptionInfo instance with specified parameters.
     *
     * @param string                  $title                   The title of 
     * the subscription.
     * @param SubscriptionDescription $subscriptionDescription The description 
     * of the subscription.
     * 
     */
    public function __construct($title = Resources::EMPTY_STRING, $subscriptionDescription = null)
    {
        Validate::isString($title, 'title');
        if (is_null($subscriptionDescription))
        {
            $subscriptionDescription = new SubscriptionDescription();
        }
        $this->_title = $title;
        $this->_subscriptionDescription = $subscriptionDescription;
    }

    /**
     * Populates the properties of the subscription info instance with a XML string. 
     * 
     * @param string $entryXml A XML string representing a subscription information instance.
     */
    public function parseXml($entryXml)
    {
        parent::parseXml($entryXml);
        $content = $this->_content;
        if (is_null($content))
        {
            $this->_subscriptionDescription = null;
        }   
        else
        {
            $this->_subscriptionDescription = SubscriptionDescription::create(
                $content->getText()
            );
        }
    }

    /**
     * Writes XML based on the subscription information. 
     * 
     * @return string
     */
    public function writeXml()
    {
        if (is_null($this->_subscriptionDescription)) {
            $this->_content = null;    
        }
        else {
            $this->_content = new Content();
            $this->_content->setText(
                XmlSerializer::objectSerialize(
                    $this->_subscriptionDescription,
                    'SubscriptionDescription'
                )
            );
        }
        return parent::writeXml();
    }

    /**
     * Gets the subscription description. 
     */
    public function getSubscriptionDescription()
    {
        return $this->_subscriptionDescription;
    }

    /**
     * Sets the subscription description. 
     * 
     * @param string $subscriptionDescription The description of the subscription. 
     */
    public function setSubscriptionDescription($subscriptionDescription)
    {
        $this->_subscriptionDescription = $subscriptionDescription;
    }
    
}
?>
