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
use WindowsAzure\Utilities;
use WindowsAzure\Resources;

/**
 * Holds result of updateEntity and mergeEntity APIs
 *
 * @category  Microsoft
 * @package   WindowsAzure\Services\Table\Models
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class UpdateEntityResult
{
    /**
     * @var string
     */
    private $_etag;
    
    /**
     * Creates UpdateEntityResult from HTTP response headers.
     * 
     * @param array $headers The HTTP response headers.
     * 
     * @return \WindowsAzure\Services\Table\Models\UpdateEntityResult 
     */
    public static function create($headers)
    {
        $result = new UpdateEntityResult();
        $clean  = Utilities::keysToLower($headers);
        $result->setEtag($clean[Resources::ETAG]);
        
        return $result;
    }
    
    /**
     * Gets entity etag.
     *
     * @return string
     */
    public function getEtag()
    {
        return $this->_etag;
    }

    /**
     * Sets entity etag.
     *
     * @param string $etag The entity Etag.
     *
     * @return none
     */
    public function setEtag($etag)
    {
        $this->_etag = $etag;
    }
}

?>
