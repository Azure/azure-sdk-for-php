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
 * @package   WindowsAzure\MediaServices\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace WindowsAzure\MediaServices\Templates;
use WindowsAzure\Common\Internal\Validate;
use WindowsAzure\Common\Internal\Utilities;

/**
 * Represents PlayReadyLicenseTemplate object used in media services
 *
 * @category  Microsoft
 * @package   WindowsAzure\MediaServices\Templates
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.4.2_2016-04
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class PlayReadyLicenseTemplate
{
    /**
     * PlayReadyLicenseTemplate AllowTestDevices 
     *
     * @var bool
     */
    private $_allowTestDevices;

    /**
     * PlayReadyLicenseTemplate BeginDate  
     *
     * @var \DateTime
     */
    private $_beginDate;

    /**
     * PlayReadyLicenseTemplate ExpirationDate  
     *
     * @var \DateTime
     */
    private $_expirationDate;

    /**
     * PlayReadyLicenseTemplate RelativeBeginDate  
     *
     * @var \DateInterval
     */
    private $_relativeBeginDate;

    /**
     * PlayReadyLicenseTemplate RelativeExpirationDate   
     *
     * @var \DateInterval
     */
    private $_relativeExpirationDate ;

    /**
     * PlayReadyLicenseTemplate GracePeriod    
     *
     * @var \DateInterval
     */
    private $_gracePeriod;

    /**
     * PlayReadyLicenseTemplate PlayRight  
     *
     * @var PlayReadyPlayRight
     */
    private $_playRight;

    /**
     * PlayReadyLicenseTemplate LicenseType  
     *
     * @var string 
     */
    private $_playReadyLicenseType;

    /**
     * PlayReadyLicenseTemplate ContentKey  
     *
     * @var PlayReadyContentKey 
     */
    private $_playReadyContentKey;

    /**
     * Create PlayReadyLicenseTemplate
     *
     * @return void
     */
    public function __construct()
    {        
        $this->_playReadyContentKey = new ContentEncryptionKeyFromHeader();
        $this->_playRight = new PlayReadyPlayRight();  
    }
    
    /**
     * Controls whether test devices can use the license or not.  If true, the MinimumSecurityLevel property of the license
     * is set to 150.  If false (the default), the MinimumSecurityLevel property of the license is set to 2000.
     *
     * @return bool AllowTestDevices
     */
    public function getAllowTestDevices()
    {
        return $this->_allowTestDevices;
    }

    /**
     * Controls whether test devices can use the license or not.  If true, the MinimumSecurityLevel property of the license
     * is set to 150.  If false (the default), the MinimumSecurityLevel property of the license is set to 2000.
     *
     * @param bool $value AllowTestDevices
     *
     * @return void
     */
    public function setAllowTestDevices($value)
    {
        $this->_allowTestDevices = $value;
    }

    /**
     * Configures the starting DateTime that the license is valid.  Attempts to use the license before this date and time will
     * result in an error on the client.
     *
     * @return \DateTime BeginDate 
     */
    public function getBeginDate()
    {
        return $this->_beginDate;
    }

    /**
     * Configures the starting DateTime that the license is valid.  Attempts to use the license before this date and time will
     * result in an error on the client.
     *
     * @param \DateTime $value BeginDate 
     *
     * @return void
     */
    public function setBeginDate($value)
    {
        $this->_beginDate = $value;
    }

    /**
     * Configures the DateTime value when the the license expires.  Attempts to use the license after this date and time will
     * result in an error on the client.
     *
     * @return \DateTime ExpirationDate
     */
    public function getExpirationDate()
    {
        return $this->_expirationDate;
    }

    /**
     * Configures the DateTime value when the the license expires.  Attempts to use the license after this date and time will
     * result in an error on the client.
     *
     * @param \DateTime $value ExpirationDate 
     *
     * @return void
     */
    public function setExpirationDate($value)
    {
        $this->_expirationDate = $value;
    }

    /**
     * Configures starting DateTime value when the license is valid.  Attempts to use the license before this date and time 
     * will result in an error on the client.  The DateTime value is calculated as DateTime.UtcNow + RelativeBeginDate when 
     * the license is issued
     *
     * @return \DateInterval RelativeBeginDate
     */
    public function getRelativeBeginDate()
    {
        return $this->_relativeBeginDate;
    }

    /**
     * Configures starting DateTime value when the license is valid.  Attempts to use the license before this date and time 
     * will result in an error on the client.  The DateTime value is calculated as DateTime.UtcNow + RelativeBeginDate when 
     * the license is issued
     *
     * @param \DateInterval $value RelativeBeginDate 
     *
     * @return void
     */
    public function setRelativeBeginDate($value)
    {
        $this->_relativeBeginDate = $value;
    }

    /**
     * Configures the DateTime value when the license expires.  Attempts to use the license after this date and time will result 
     * in an error on the client.  The DateTime value is calculated as DateTime.UtcNow + RelativeExpirationDate when the license 
     * is issued
     *
     * @return \DateInterval RelativeExpirationDate
     */
    public function getRelativeExpirationDate()
    {
        return $this->_relativeExpirationDate;
    }

    /**
     * Configures the DateTime value when the license expires.  Attempts to use the license after this date and time will result 
     * in an error on the client.  The DateTime value is calculated as DateTime.UtcNow + RelativeExpirationDate when the license 
     * is issued
     *
     * @param \DateInterval $value RelativeExpirationDate
     *
     * @return void
     */
    public function setRelativeExpirationDate($value)
    {
        $this->_relativeExpirationDate = $value;
    }

    /**
     * Configures the Grace Period setting of the PlayReady license.  This setting affects how DateTime based restrictions are
     * evaluated on certain devices in the situation that the devices secure clock becomes unset.
     *
     * @return \DateInterval GracePeriod
     */
    public function getGracePeriod()
    {
        return $this->_gracePeriod;
    }

    /**
     * Configures the Grace Period setting of the PlayReady license.  This setting affects how DateTime based restrictions are
     * evaluated on certain devices in the situation that the devices secure clock becomes unset.
     *
     * @param \DateInterval $value GracePeriod
     *
     * @return void
     */
    public function setGracePeriod($value)
    {
        $this->_gracePeriod = $value;
    }

    /**
     * Configures the PlayRight of the PlayReady license.  This Right gives the client the ability to play back the content.
     * The PlayRight also allows configuring restrictions specific to playback.  This Right is required.
     *
     * @return PlayReadyPlayRight PlayReadyPlayRight
     */
    public function getPlayRight()
    {
        return $this->_playRight;
    }

    /**
     * Configures the PlayRight of the PlayReady license.  This Right gives the client the ability to play back the content.
     * The PlayRight also allows configuring restrictions specific to playback.  This Right is required.
     *
     * @param PlayReadyPlayRight $value PlayReadyPlayRight
     *
     * @return void
     */
    public function setPlayRight($value)
    {
        $this->_playRight = $value;
    }

    /**
     * Configures whether the license is persistent (saved in persistent storage on the client) or non-persistent (only held in
     * memory while the player is using the license).  Persistent licenses are typically used to allow offline playback of the
     * content.
     *
     * @return string LicenseType
     */
    public function getLicenseType()
    {
        return $this->_playReadyLicenseType;
    }

    /**
     * Configures whether the license is persistent (saved in persistent storage on the client) or non-persistent (only held in
     * memory while the player is using the license).  Persistent licenses are typically used to allow offline playback of the
     * content.
     *
     * @param string $value LicenseType
     *
     * @return void
     */
    public function setLicenseType($value)
    {
        $this->_playReadyLicenseType = $value;
    }

    /**
     * Specifies the content key in the license.  This is typically set to an instance of the ContentEncryptionKeyFromHeader
     * object to allow the template to be applied to multiple content keys and have the content header tell the license
     * server the exact key to embed in the license issued to the client.
     *
     * @return PlayReadyContentKey PlayReadyContentKey 
     */
    public function getContentKey()
    {
        return $this->_playReadyContentKey;
    }

    /**
     * Specifies the content key in the license.  This is typically set to an instance of the ContentEncryptionKeyFromHeader
     * object to allow the template to be applied to multiple content keys and have the content header tell the license
     * server the exact key to embed in the license issued to the client.
     *
     * @param PlayReadyContentKey $value PlayReadyContentKey 
     *
     * @return void
     */
    public function setContentKey($value)
    {
        $this->_playReadyContentKey  = $value;
    }
}


