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
 * @package   WindowsAzure\Services\Table\Models
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
 
namespace WindowsAzure\Services\Table\Models;
use WindowsAzure\Resources;
use WindowsAzure\Utilities;
use WindowsAzure\Validate;
use WindowsAzure\Core\ServiceException;

/**
 * Represents an error returned from call to batch API.
 *
 * @category  Microsoft
 * @package   WindowsAzure\Services\Table\Models
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class BatchError
{
    /**
     * @var WindowsAzure\Core\ServiceException 
     */
    private $_error;
    
    /**
     * @var integer
     */
    private $_contentId;
    
    /**
     * Creates BatchError object.
     * 
     * @param WindowsAzure\Core\ServiceException $error   The error object.
     * @param array                              $headers The response headers.
     * 
     * @return \WindowsAzure\Services\Table\Models\BatchError 
     */
    public static function create($error, $headers)
    {
        Validate::isTrue(
            $error instanceof ServiceException,
            Resources::INVALID_EXC_OBJ_MSG
        );
        Validate::isArray($headers, 'headers');
        
        $result = new BatchError();
        $clean  = Utilities::keysToLower($headers);
        
        $result->setError($error);
        $contentId = Utilities::tryGetValue($clean, Resources::CONTENT_ID);
        $result->setContentId(is_null($contentId) ? null : intval($contentId));
        
        return $result;
    }
    
    /**
     * Gets the error.
     * 
     * @return WindowsAzure\Core\ServiceException
     */
    public function getError()
    {
        return $this->_error;
    }
    
    /**
     * Sets the error.
     * 
     * @param WindowsAzure\Core\ServiceException $error The error object.
     * 
     * @return none
     */
    public function setError($error)
    {
        $this->_error = $error;
    }
    
    /**
     * Gets the contentId.
     * 
     * @return integer
     */
    public function getContentId()
    {
        return $this->_contentId;
    }
    
    /**
     * Sets the contentId.
     * 
     * @param integer $contentId The contentId object.
     * 
     * @return none
     */
    public function setContentId($contentId)
    {
        $this->_contentId = $contentId;
    }
}

?>
