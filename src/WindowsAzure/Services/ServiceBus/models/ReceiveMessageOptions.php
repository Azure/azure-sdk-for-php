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
 * @package   WindowsAzure\Services\Queue
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
namespace WindowsAzure\Services\ServiceBus\Models;

/**
 * This class constructs HTTP requests and receive HTTP responses for service bus.
 *
 * @category  Microsoft
 * @package   WindowsAzure\Services\ServiceBus
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */

class ReceiveMessageOptions
{
    private $_timeout;
    private $_receiveMode;
    private $_isReceiveAndDelete;
    private $_isPeekLock;

    public function getTimeout()
    {   
        return $this->_timeout;
    }

    public function setTimeout($timeout)
    {   
        $this->_timeout = $timeout;
    }

    public function getReceiveMode()
    {
        return $this->_receiveMode;
    }
    
    public function setReceiveMode($receiveMode)
    {   
        $this->_receiveMode = $receiveMode;
    }

    public function getIsReceiveAndDelete()
    {
        return $this->_isReceiveAndDelete;
    }

    public function setIsReceiveAndDelete($isReceiveAndDelete)
    {   
        $this->_isReceiveAndDelete = $isReceiveAndDelete;
    }
    
    public function getPeekLock()
    {
        return $this->_peekLock;
    }    

    public function setPeekLock($peekLock)
    {   
        $this->_peekLock = $peekLock;
    }
}
?>
