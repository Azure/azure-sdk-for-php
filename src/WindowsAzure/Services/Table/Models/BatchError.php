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
 * @package   PEAR2\WindowsAzure\Services\Table\Models
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
 
namespace PEAR2\WindowsAzure\Services\Table\Models;
use PEAR2\WindowsAzure\Resources;
use PEAR2\WindowsAzure\Utilities;

/**
 * Represents an error returned from call to batch API.
 *
 * @category  Microsoft
 * @package   PEAR2\WindowsAzure\Services\Table\Models
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class BatchError
{
    /**
     * @var ServiceException 
     */
    private $_error;
    
    /**
     * @var inetegr
     */
    private $_contentId;
    
    /**
     * Creates BatchError object.
     * 
     * @param PEAR2\WindowsAzure\Core\ServiceException $error   The error object.
     * @param array                                    $headers The response headers.
     * 
     * @return \PEAR2\WindowsAzure\Services\Table\Models\BatchError 
     */
    public static function create($error, $headers)
    {
        $result    = new BatchError();
        
        $result->setError($error);
        $contentId = Utilities::tryGetValue($headers, Resources::CONTENT_ID);
        $result->setContentId(is_null($contentId) ? null : intval($contentId));
        
        return $result;
    }
    
    /**
     * Gets the error.
     * 
     * @return PEAR2\WindowsAzure\Core\ServiceException
     */
    public function getError()
    {
        return $this->_error;
    }
    
    /**
     * Sets the error.
     * 
     * @param PEAR2\WindowsAzure\Core\ServiceException $error The error object.
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
     * @return inetegr
     */
    public function getContentId()
    {
        return $this->_contentId;
    }
    
    /**
     * Sets the contentId.
     * 
     * @param inetegr $contentId The contentId object.
     * 
     * @return none
     */
    public function setContentId($contentId)
    {
        $this->_contentId = $contentId;
    }
}

?>
