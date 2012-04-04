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
use PEAR2\WindowsAzure\Resources;
use PEAR2\WindowsAzure\Services\Table\Models\EdmType;
use PEAR2\WindowsAzure\Services\Table\Models\Entity;

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
class AtomReaderWriter implements IAtomReaderWriter
{
    /**
     * Fills text template with variables from key/value array.
     * 
     * @param string $templateText The template text.
     * @param array  $variables    The array containing key/value pairs.
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
     * Generate Windows Azure representation from entity. Creates atompub markup 
     * from properties.
     * 
     * @param Models\Entity $entity The entity instance.
     * 
     * @return string
     */
    private static function _generatePropertiesXml($entity)
    {
        $xml        = array();
        $properties = $entity->getProperties();

        foreach ($properties as $name => $entry) {
            $value   = array();
            $value[] = '<d:' . $name;
            if (!is_null($entry->getEdmType())) {
                $value[] = ' m:type="' . $entry->getEdmType() . '"';
            }
            if (is_null($entry->getValue())) {
                $value[] = ' m:null="true"'; 
            }
            $value[] = '>';

            if (!is_null($entry->getValue())) {
                if ($entry->getEdmType() == EdmType::BOOLEAN) {
                    $value[] = ($entry->getValue() == true ? '1' : '0');
                } else if ($entry->getEdmType() == EdmType::DATETIME) {
                    $value[] = Utilities::convertToEdmDateTime($entry->getValue());
                } else {
                    $value[] = htmlspecialchars($entry->getValue());
                }
            }

            $value[] = '</d:' . $name . '>';
            $xml[]   = implode('', $value);
        }

        return implode('', $xml);
    }
    
    /** 
     * Parse result from Microsoft_Http_Response.
     *
     * @param string $body Response from HTTP call.
     * 
     * @return object
     */
    private static function _parseBody($body)
    {
        $xml = simplexml_load_string($body);

        if ($xml !== false) {
            // Fetch all namespaces 
            $namespaces = array_merge(
                $xml->getNamespaces(true), $xml->getDocNamespaces(true)
            );

            // Register all namespace prefixes
            foreach ($namespaces as $prefix => $ns) { 
                if ($prefix != '') {
                    $xml->registerXPathNamespace($prefix, $ns);
                } 
            } 
        }

        return $xml;
    }
    
    /**
     * Constructs XML representation for table entry.
     * 
     * @param type $name the name of the table.
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
                'Updated'   => Utilities::isoDate(),
            )
        );
        
        return $xml;
    }
    
    /**
     * Constructs array of tables from HTTP response body.
     * 
     * @param string $body The HTTP response body.
     * 
     * @return array
     */
    public static function parseTableEntries($body)
    {
        $tables = array();
        $result = self::_parseBody($body);
        
        if (!$result || !$result->entry) {
            return array();
        }
        
        $rawEntries = null;
        if (count($result->entry) > 1) {
            $rawEntries = $result->entry;
        } else {
            $rawEntries = array($result->entry);
        }

        foreach ($rawEntries as $entry) {
            $tableName = $entry->xpath('.//m:properties/d:TableName');
            $tables[]  = (string)$tableName[0];
        }
        
        return $tables;
    }
    
    /**
     * Constructs XML representation for entity.
     * 
     * @param Models\Entity $entity The entity instance.
     * 
     * @return string
     */
    public static function getEntity($entity)
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
                    {tpl:Properties}
                </m:properties>
            </content>
        </entry>';
        
        $xml = self::_fillTemplate(
            $xml, array(
                'Updated'    => Utilities::isoDate(),
                'Properties' => self::_generatePropertiesXml($entity)
            )
        );
        
        return $xml;
    }
    
    /**
     * Parses an entity entry from given SimpleXML object.
     * 
     * @param \SimpleXML $result The SimpleXML object representing the entity.
     * 
     * @return \PEAR2\WindowsAzure\Services\Table\Models\Entity
     */
    private static function _parseOneEntity($result)
    {
        $services = 'http://schemas.microsoft.com/ado/2007/08/dataservices';
        $metadata = 'http://schemas.microsoft.com/ado/2007/08/dataservices/metadata';
        $prop     = $result->content->xpath('.//m:properties');
        $prop     = $prop[0]->children($services);
        $entity   = new Entity();
        
        // Set Etag
        $etag = $result->attributes($metadata);
        $etag = $etag[Resources::ETAG];
        $entity->setEtag((string)$etag);
        
        foreach ($prop as $key => $value) {
            $attributes = $value->attributes($metadata);
            $type       = $attributes['type'];
            $entity->newProperty((string)$key, (string)$type, (string)$value);
        }
        
        return $entity;
    }
    
    /**
     * Constructs entity from HTTP response body.
     * 
     * @param string $body The HTTP response body.
     * 
     * @return Entity
     */
    public static function parseEntity($body)
    {
        $result = self::_parseBody($body);
        $entity = self::_parseOneEntity($result);
        return $entity;
    }
    
    /**
     * Constructs array of entities from HTTP response body.
     * 
     * @param string $body The HTTP response body.
     * 
     * @return array
     */
    public static function parseEntities($body)
    {
        $result = self::_parseBody($body);

        $rawEntries = null;
        if ($result->entry) {
            if (count($result->entry) > 1) {
                $rawEntries = $result->entry;
            } else {
                $rawEntries = array($result->entry);
            }
        } else {
            return array();
        }
        
        $entities = array();
        foreach ($rawEntries as $entity) {
            $entities[] = self::_parseOneEntity($entity);
        }
        
        return $entities;
    }
}

?>
