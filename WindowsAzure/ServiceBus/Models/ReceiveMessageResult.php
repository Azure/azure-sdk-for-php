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

/**
 * This class constructs HTTP requests and receive HTTP responses for service bus.
 *
 * @category  Microsoft
 * @package   WindowsAzure\ServiceBus\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */

class ReceiveMessageResult
{
    /**
     * The brokered message. 
     *
     * @var BrokeredMessage 
     */
    private $_brokeredMessage;
    

    /**
     * Creates a receive message result instance with default parameters. 
     */
    public function __construct()
    {
    }

    /** 
     * Gets brokered message. 
     * 
     * @return BrokeredMessage
     */ 
    public function getBrokeredMessage()
    {
        return $this->_brokeredMessage;
    }

    /**
     * Sets brokered message. 
     * 
     * @param BrokeredMessage $brokeredMessage The brokered message. 
     */
    public function setBrokeredMessage($brokeredMessage)
    {
        $this->_brokeredMessage = $brokeredMessage;
    }
    
}
?>
