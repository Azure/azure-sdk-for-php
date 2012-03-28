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
 * @package   PEAR2\WindowsAzure\Services\Table
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
 
namespace PEAR2\WindowsAzure\Services\Table\Utilities;
use PEAR2\WindowsAzure\Utilities;

/**
 * Serializes and unserializes results from table wrapper calls
 *
 * @category  Microsoft
 * @package   PEAR2\WindowsAzure\Services\Table
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class ManualAtomReaderWriter implements IAtomReaderWriter
{
    /**
	 * Fill text template with variables from key/value array
	 * 
	 * @param string $templateText Template text
	 * @param array  $variables Array containing key/value pairs
	 * 
     * @return string
	 */
	private static function _fillTemplate($templateText, $variables = array())
	{
	    foreach ($variables as $key => $value) {
	        $templateText = str_replace('{tpl:' . $key . '}', $value, $templateText);
	    }
	    return $templateText;
	}
    
    /**
     * Constructs XML representation for table entry
     * 
     * @param type $name the name of the table
     * 
     * @return string
     */
    public static function getTable($name)
    {
        $xml = '<?xml version="1.0" encoding="utf-8" standalone="yes"?>
                    <entry
                        xmlns:d="http://schemas.microsoft.com/ado/2007/08/dataservices"
                        xmlns:m="http://schemas.microsoft.com/ado/2007/08/dataservices/metadata"
                        xmlns="http://www.w3.org/2005/Atom">
                        <title />
                        <updated>{tpl:Updated}</updated>
                        <author>
                        <name />
                        </author>
                        <id />
                        <content type="application/xml">
                        <m:properties>
                            <d:TableName>{tpl:TableName}</d:TableName>
                        </m:properties>
                        </content>
                    </entry>';
        
        $xml = self::_fillTemplate(
            $xml, array(
                'TableName' => htmlspecialchars($name),
                'Updated' => Utilities::isoDate(),
            )
        );
        
        return $xml;
    }
}

?>
