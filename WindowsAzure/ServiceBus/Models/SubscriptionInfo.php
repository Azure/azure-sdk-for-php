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
 * @link      https://github.com/WindowsAzure/azure-sdk-for-php
 */
 
namespace WindowsAzure\ServiceBus\Models;

use WindowsAzure\Common\Internal\Atom\Entry;
use WindowsAzure\Common\Internal\Atom\Content;
use WindowsAzure\Common\Internal\Serialization\XmlSerializer;
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
 * @link      https://github.com/WindowsAzure/azure-sdk-for-php
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
    public function __construct(
        $title = Resources::EMPTY_STRING, 
        $subscriptionDescription = null
    ) {
        Validate::isString($title, 'title');
        if (is_null($subscriptionDescription)) {
            $subscriptionDescription = new SubscriptionDescription();
        }
        $this->title                    = $title;
        $this->_subscriptionDescription = $subscriptionDescription;
    }

    /**
     * Populates the properties of the subscription info instance with a XML string. 
     * 
     * @param string $entryXml A XML string representing a subscription 
     * information instance.
     * 
     * @return none
     */
    public function parseXml($entryXml)
    {
        parent::parseXml($entryXml);
        $content = $this->content;
        if (is_null($content)) {
            $this->_subscriptionDescription = null;
        } else {
            $this->_subscriptionDescription = SubscriptionDescription::create(
                $content->getText()
            );
        }
    }

    /**
     * Writes XML based on the subscription information. 
     * 
     * @param XMLWriter $xmlWriter The XML writer. 
     * 
     * @return string
     */
    public function writeXml($xmlWriter)
    {
        if (is_null($this->_subscriptionDescription)) {
            $this->content = null;    
        } else {
            $this->content = new Content();
            $this->content->setText(
                XmlSerializer::objectSerialize(
                    $this->_subscriptionDescription,
                    'SubscriptionDescription'
                )
            );
        }
        return parent::writeXml($xmlWriter);
    }

    /**
     * Gets the subscription description. 
     *
     * @return none
     */
    public function getSubscriptionDescription()
    {
        return $this->_subscriptionDescription;
    }

    /**
     * Sets the subscription description. 
     * 
     * @param string $subscriptionDescription The description of 
     * the subscription. 
     * 
     * @return none
     */
    public function setSubscriptionDescription($subscriptionDescription)
    {
        $this->_subscriptionDescription = $subscriptionDescription;
    }
    
}
?>
