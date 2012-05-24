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

class ReceiveMessageOptions
{
    /**
     * The timeout value of receiving message. 
     *
     * @var integer
     */
    private $_timeout;

    /**
     * The mode of receiving message. 
     * 
     * @var string 
     */
    private $_receiveMode;

    /**
     * Is receive and delete mode.
     * 
     * @var boolean
     */
    private $_isReceiveAndDelete;

    /**
     * Is peek lock mode.
     * 
     * @var boolean
     */
    private $_isPeekLock;


    /** 
     * Creates a receive message option instance with default parameters.
     */
    public function __construct()
    {
    }
    /**
     * Gets the timeout of the receive message request. 
     * 
     * @return integer
     */
    public function getTimeout()
    {   
        return $this->_timeout;
    }

    /**
     * Sets the timeout of the receive message request. 
     *
     * @param integer $timeout The timeout of the receive message request. 
     */
    public function setTimeout($timeout)
    {   
        $this->_timeout = $timeout;
    }

    /**
     * Gets the receive mode. 
     * 
     * @return string 
     */ 
    public function getReceiveMode()
    {
        return $this->_receiveMode;
    }
    
    /**
     * Sets the receive mode. 
     * 
     * @param string $receiveMode The mode of receiving the message. 
     */
    public function setReceiveMode($receiveMode)
    {   
        $this->_receiveMode = $receiveMode;
    }

    /**
     * Gets is receive and delete. 
     * 
     * @return boolean 
     */
    public function getIsReceiveAndDelete()
    {
        return $this->_isReceiveAndDelete;
    }

    /**
     * Sets whether the mode of receiving is receive and delete. 
     * 
     * @param boolean $isReceiveAndDelete value. 
     * 
     * @return none
     */
    public function setIsReceiveAndDelete($isReceiveAndDelete)
    {   
        $this->_isReceiveAndDelete = $isReceiveAndDelete;
    }
    
    /**
     * Gets peek lock. 
     * 
     * @return peek lock. 
     *
     */
    public function getIsPeekLock()
    {
        return $this->_isPeekLock;
    }    

    /**
     * Sets peek lock. 
     * 
     * @return none
     */
    public function setIsPeekLock($isPeekLock)
    {   
        $this->_isPeekLock = $isPeekLock;
    }
}
?>
