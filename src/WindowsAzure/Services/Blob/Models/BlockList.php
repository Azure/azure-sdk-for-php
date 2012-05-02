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
 * @package   WindowsAzure\Services\Blob\Models
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
 
namespace WindowsAzure\Services\Blob\Models;
use WindowsAzure\Utilities;

/**
 * Holds block list used for commitBlobBlocks
 *
 * @category  Microsoft
 * @package   WindowsAzure\Services\Blob\Models
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class BlockList
{
    /**
     * @var array
     */
    private $_entries;
    public static $xmlRootName = 'BlockList';
    
    /**
     * Adds new entry to the block list entries
     * 
     * @param string $blockId The block id
     * @param string $type    The entry type, you can use BlobBlockType
     * 
     * @return none.
     */
    public function setEntry($blockId, $type)
    {
        $this->_entries[$blockId] = $type;
    }
    
    /**
     * Gets blob block entry type
     * 
     * @param string $blockId The id of the block
     * 
     * @return string
     */
    public function getEntry($blockId)
    {
        return $this->_entries[$blockId];
    }
    
    /**
     * Gets all blob block entries
     * 
     * @return string
     */
    public function getEntries()
    {
        return $this->_entries;
    }
    
    /**
     * Converts the  BlockList object to XML representation
     * 
     * @return string
     */
    public function toXml()
    {
        $xml  = '<?xml version="1.0" encoding="utf-8"?>' . "\r\n";
        $xml .= '<BlockList>' . "\r\n";
        
        foreach ($this->_entries as $key => $value) {
            $xml .= '     ';
            $xml .= '<' . $value . '>' . base64_encode($key) . '</' . $value . '>';
            $xml .= "\r\n";
        }
        
        $xml .= '</BlockList>';
        
        return $xml;
    }
}

?>
