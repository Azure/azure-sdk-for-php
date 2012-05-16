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
 * @package   WindowsAzure\Services\ServiceBus\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
 
namespace WindowsAzure\Services\ServiceBus\Models;
use WindowsAzure\Resources;
use WindowsAzure\Services\ServiceBus\Models\QueueDescription;
use WindowsAzure\Utilities;

/**
 * An active WRAP access Token.
 *
 * @category  Microsoft
 * @package   WindowsAzure\Services\ServiceBus\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class QueueInfo
{
    /** 
     * The WRAP access token result. 
     * 
     * @var WrapAccessTokenResult
     */
    private $_name;
    private $_queueDescription;

    /**
     * Creates an QueueInfo with specified parameters.
     *
     * @param string           $name             The name of the queue.
     * @param QueueDescription $queueDescription The description of the queue.
     * 
     */
    public function __construct($name, $queueDescription = null)
    {
        $this->_name = $name;
        if (is_null($queueDescription))
        {
            $queueDescription = new QueueDescription();
        }

        $this->_queueDescription = $queueDescription;
    }

    /**
     * Gets the name of the 
     *
     * @return WrapAccessTokenResult
     */
    public function getName()
    {
        return $this->_name;
    }

    public function setName($name)
    {
        $this->_name = $name;
    }

    public function getQueueDescription()
    {
        return $this->_queueDescription;
    }

    public function setQueueDescription($queueDescription)
    {
        $this->_queueDescription = $queueDescription;
    }
    
    /**
     * Sets WRAP access token.
     *
     * @param string $wrapAccessTokenResult The WRAP access token result.
     * 
     * @return none
     */
    public function setWrapAccessTokenResult($wrapAccessTokenResult)
    {
        $this->_wrapAccessTokenResult = $wrapAccessTokenResult;
    }

    /**
     * Gets expiration time.  
     *
     * @return \DateTime
     */
    public function getExpirationDateTime()
    {
        return $this->_expirationDateTime;
    }

    /**
     * Sets expiration time.
     *
     * @param \DateTime $expirationDateTime value.
     * 
     * @return none
     */
    public function setExpirationDateTime($expirationDateTime)
    {
        $this->_expirationDateTime = $expirationDateTime;
    }
}

