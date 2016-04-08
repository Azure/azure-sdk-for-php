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

/**
 * Holds result of getTable API.
 *
 * @category  Microsoft
 * @package   WindowsAzure\Table\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.4.2_2016-04
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class GetTableResult
{
    /**
     * @var string
     */
    private $_name;
    
    /**
     * Creates GetTableResult from HTTP response body.
     * 
     * @param string           $body           The HTTP response body.
     * @param AtomReaderWriter $atomSerializer The Atom reader and writer.
     * 
     * @return \WindowsAzure\Table\Models\GetTableResult
     */
    public static function create($body, $atomSerializer)
    {
        $result = new GetTableResult();
        
        $name = $atomSerializer->parseTable($body);
        $result->setName($name);
        
        return $result;
    }
    
    /**
     * Gets the name.
     * 
     * @return string
     */
    public function getName()
    {
        return $this->_name;
    }
    
    /**
     * Sets the name.
     * 
     * @param string $name The table name.
     * 
     * @return none
     */
    public function setName($name)
    {
        $this->_name = $name;
    }
}


