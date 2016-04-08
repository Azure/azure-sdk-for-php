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
 * @package   WindowsAzure\Table\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
 
namespace WindowsAzure\Table\Models;
use WindowsAzure\Common\Internal\Utilities;
use WindowsAzure\Common\Internal\Resources;

/**
 * Holds result of calling insertEntity wrapper
 *
 * @category  Microsoft
 * @package   WindowsAzure\Table\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.4.2_2016-04
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class InsertEntityResult
{
    /**
     * @var Entity
     */
    private $_entity;
    
    /**
     * Create InsertEntityResult object from HTTP response parts.
     * 
     * @param string            $body           The HTTP response body.
     * @param array             $headers        The HTTP response headers.
     * @param IAtomReaderWriter $atomSerializer The atom reader and writer.
     * 
     * @return \WindowsAzure\Table\Models\InsertEntityResult
     * 
     * @static
     */
    public static function create($body, $headers, $atomSerializer)
    {
        $result = new InsertEntityResult();
        $entity = $atomSerializer->parseEntity($body);
        $entity->setETag(Utilities::tryGetValue($headers, Resources::ETAG));
        $result->setEntity($entity);
        
        return $result;
    }
    
    /**
     * Gets table entity.
     * 
     * @return Entity
     */
    public function getEntity()
    {
        return $this->_entity;
    }
    
    /**
     * Sets table entity.
     * 
     * @param Entity $entity The table entity instance.
     * 
     * @return none
     */
    public function setEntity($entity)
    {
        $this->_entity = $entity;
    }
}


