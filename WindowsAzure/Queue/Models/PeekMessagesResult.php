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
use WindowsAzure\Queue\Models\WindowsAzureQueueMessage;
use WindowsAzure\Common\Internal\Utilities;

/**
 * Holds results of listMessages wrapper.
 *
 * @category  Microsoft
 * @package   WindowsAzure\Queue\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.4.2_2016-04
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class PeekMessagesResult
{
    /**
     * Holds all message entries.
     * 
     * @var array.
     */
    private $_queueMessages;
    
    /**
     * Creates PeekMessagesResult object from parsed XML response.
     *
     * @param array $parsedResponse XML response parsed into array.
     * 
     * @return WindowsAzure\Queue\Models\PeekMessagesResult.
     */
    public static function create($parsedResponse)
    {
        $result        = new PeekMessagesResult();
        $queueMessages = array();
        
        if (!empty($parsedResponse)) {
            $rawMessages = Utilities::getArray($parsedResponse['QueueMessage']);
            foreach ($rawMessages as $value) {
                $message = WindowsAzureQueueMessage::createFromPeekMessages($value);
                
                $queueMessages[] = $message;
            }
        }
        $result->setQueueMessages($queueMessages);
        
        return $result;
    }
    
    /**
     * Gets queueMessages field.
     * 
     * @return integer
     */
    public function getQueueMessages()
    {
        $clonedMessages = array();
        
        foreach ($this->_queueMessages as $value) {
            $clonedMessages[] = clone $value;
        }
        
        return $clonedMessages;
    }
    
    /**
     * Sets queueMessages field.
     * 
     * @param integer $queueMessages value to use.
     * 
     * @return none
     */
    public function setQueueMessages($queueMessages)
    {
        $this->_queueMessages = $queueMessages;
    }
}


