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
 * @package   WindowsAzure\Queue\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
 
namespace WindowsAzure\Queue\Models;
use WindowsAzure\Common\Internal\Utilities;
use WindowsAzure\Common\Internal\Serialization\XmlSerializer;

/**
 * Wrappers queue message text.
 *
 * @category  Microsoft
 * @package   WindowsAzure\Queue\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.4.2_2016-04
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class QueueMessage
{
    private $_messageText;
    public static $xmlRootName = 'QueueMessage';
    
    /**
     * Gets message text field.
     * 
     * @return string.
     */
    public function getMessageText()
    {
        return $this->_messageText;
    }
    
    /**
     * Sets message text field.
     * 
     * @param string $messageText message contents.
     * 
     * @return string.
     */
    public function setMessageText($messageText)
    {
        $this->_messageText = $messageText;
    }
    
    /**
     * Converts this current object to XML representation.
     * 
     * @param XmlSerializer $xmlSerializer The XML serializer.
     * 
     * @return string. 
     */
    public function toXml($xmlSerializer)
    {
        $array      = array('MessageText' => $this->_messageText);
        $properties = array(XmlSerializer::ROOT_NAME => self::$xmlRootName);
        
        return $xmlSerializer->serialize($array, $properties);
    }
}


