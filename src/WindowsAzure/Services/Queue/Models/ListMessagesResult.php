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
 * @package   PEAR2\WindowsAzure\Services\Queue\Models
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */

namespace PEAR2\WindowsAzure\Services\Queue\Models;
use PEAR2\WindowsAzure\Services\Queue\Models\AzureQueueMessage;
use PEAR2\WindowsAzure\Utilities;

/**
 * Holds results of listMessages wrapper.
 *
 * @category  Microsoft
 * @package   PEAR2\WindowsAzure\Services\Queue\Models
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class ListMessagesResult
{
    /**
     * Holds all message entries.
     * 
     * @var array.
     */
    private $_queueMessages;
    
    /**
     * Creates ListMessagesResult object from parsed XML response.
     *
     * @param array $parsedResponse XML response parsed into array.
     * 
     * @return PEAR2\WindowsAzure\Services\Queue\Models\ListMessagesResult.
     */
    public static function create($parsedResponse)
    {
        $result        = new ListMessagesResult();
        $queueMessages = array();
        
        if (!empty($parsedResponse)) {
            $rawMessages = Utilities::getArray($parsedResponse['QueueMessage']);
            foreach ($rawMessages as $value) {
                $queueMessages[] = AzureQueueMessage::createFromListMessages($value);
            }
        }
        $result->setQueueMessages($queueMessages);
        
        return $result;
    }
    
    /**
     * Gets queueMessages field.
     * 
     * @return array
     */
    public function getQueueMessages()
    {
        return $this->_queueMessages;
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
        $this->_queueMessages = array();
        
        foreach ($queueMessages as $value) {
            $this->_queueMessages[] = clone $value;
        }
    }
}

?>
