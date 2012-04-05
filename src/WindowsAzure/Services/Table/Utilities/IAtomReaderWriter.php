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
 * @package   PEAR2\WindowsAzure\Services\Table\Utilities
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
 
namespace PEAR2\WindowsAzure\Services\Table\Utilities;

/**
 * Defines how to serialize and unserialize table wrapper xml
 *
 * @category  Microsoft
 * @package   PEAR2\WindowsAzure\Services\Table\Utilities
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
interface IAtomReaderWriter
{
    /**
     * Constructs XML representation for table entry.
     * 
     * @param string $name The name of the table.
     * 
     * @return string
     */
    public static function getTable($name);
    
    /**
     * Constructs array of tables from HTTP response body.
     * 
     * @param string $body The HTTP response body.
     * 
     * @return array
     */
    public static function parseTableEntries($body);
    
    /**
     * Constructs XML representation for entity.
     * 
     * @param Models\Entity $entity The entity instance.
     * 
     * @return string
     */
    public static function getEntity($entity);
    
    /**
     * Constructs entity from HTTP response body.
     * 
     * @param string $body The HTTP response body.
     * 
     * @return Models\Entity
     */
    public static function parseEntity($body);
    
    /**
     * Constructs array of entities from HTTP response body.
     * 
     * @param string $body The HTTP response body.
     * 
     * @return array
     */
    public static function parseEntities($body);
}

?>
