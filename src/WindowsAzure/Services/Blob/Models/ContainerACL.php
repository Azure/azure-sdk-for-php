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
use WindowsAzure\Validate;
use WindowsAzure\Resources;
use WindowsAzure\Services\Blob\Models\AccessPolicy;
use WindowsAzure\Services\Blob\Models\SignedIdentifier;
use WindowsAzure\Core\WindowsAzureUtilities;
use WindowsAzure\Services\Blob\Models\PublicAccessType;
use WindowsAzure\Core\Serialization\XmlSerializer;

/**
 * Holds conatiner ACL members.
 * 
 * @category  Microsoft
 * @package   WindowsAzure\Services\Blob\Models
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class ContainerAcl
{
    /**
     * @var \DateTime
     */
    private $_lastModified;

    /**
     * @var string
     */
    private $_etag;

    /**
     * All available types can be found in PublicAccessType
     *
     * @var string
     */
    private $_publicAccess;

    /**
     * @var array
     */
    private $_signedIdentifiers = array();
    
    /*
     * The root name of XML elemenet representation.
     * 
     * @var string
     */
    public static $xmlRootName = 'SignedIdentifiers';


    /**
     * Parses the given array into signed identifiers
     * 
     * @param string $publicAccess container public access
     * @param string $etag         container etag
     * @param string $lastModified last modification in string representation
     * @param array  $parsed       parsed response into array representation
     * 
     * @return none.
     */
    public static function create($publicAccess, $etag, $lastModified, $parsed)
    {
        $date = WindowsAzureUtilities::rfc1123ToDateTime($lastModified);
        
        $result                     = new ContainerAcl();
        $result->_etag              = $etag;
        $result->_lastModified      = $date;
        $result->_publicAccess      = $publicAccess;
        $result->_signedIdentifiers = array();
        
        if (!empty($parsed) && is_array($parsed['SignedIdentifier'])) {
            $entries = $parsed['SignedIdentifier'];
            $temp    = Utilities::getArray($entries);

            foreach ($temp as $value) {
                $start      = urldecode($value['AccessPolicy']['Start']);
                $expiry     = urldecode($value['AccessPolicy']['Expiry']);
                $permission = $value['AccessPolicy']['Permission'];
                $id         = $value['Id'];
                $result->addSignedIdentifier($id, $start, $expiry, $permission);
            }
        }
        
        return $result;
    }

    /**
     * Gets container signed modifiers.
     *
     * @return array.
     */
    public function getSignedIdentifiers()
    {
        return $this->_signedIdentifiers;
    }

    /**
     * Sets container signed modifiers.
     *
     * @param array $signedIdentifiers value.
     *
     * @return none.
     */
    public function setSignedIdentifiers($signedIdentifiers)
    {
        $this->_signedIdentifiers = $signedIdentifiers;
    }

    /**
     * Gets container lastModified.
     *
     * @return \DateTime.
     */
    public function getLastModified()
    {
        return $this->_lastModified;
    }

    /**
     * Sets container lastModified.
     *
     * @param \DateTime $lastModified value.
     *
     * @return none.
     */
    public function setLastModified($lastModified)
    {
        Validate::isDate($lastModified);
        $this->_lastModified = $lastModified;
    }

    /**
     * Gets container etag.
     *
     * @return string.
     */
    public function getEtag()
    {
        return $this->_etag;
    }

    /**
     * Sets container etag.
     *
     * @param string $etag value.
     *
     * @return none.
     */
    public function setEtag($etag)
    {
        Validate::isString($etag, 'etag');
        $this->_etag = $etag;
    }

    /**
     * Gets container publicAccess.
     *
     * @return string.
     */
    public function getPublicAccess()
    {
        return $this->_publicAccess;
    }

    /**
     * Sets container publicAccess.
     *
     * @param string $publicAccess value.
     *
     * @return none.
     */
    public function setPublicAccess($publicAccess)
    {
        Validate::isTrue(
            PublicAccessType::isValid($publicAccess),
            Resources::INVALID_BLOB_PAT_MSG
        );
        $this->_publicAccess = $publicAccess;
    }

    /**
     * Adds new signed modifier
     * 
     * @param string $id         a unique id for this modifier
     * @param string $start      The time at which the Shared Access Signature 
     * becomes valid. The time must be specified in a valid ISO 8061 format. 
     * If omitted, start time for this call is assumed to be the time when the 
     * Blob service receives the request.
     * @param string $expiry     The time at which the Shared Access Signature 
     * becomes invalid. The time must be specified in a valid ISO 8061 format. 
     * This field may be omitted if it has been specified as part of a 
     * container-level access policy.
     * @param string $permission The permissions associated with the Shared 
     * Access Signature. The user is restricted to operations allowed by the 
     * permissions. Valid permissions values are read (r), write (w), delete (d) and
     * list (l).
     * 
     * @return none.
     * 
     * @see http://msdn.microsoft.com/en-us/library/windowsazure/hh508996.aspx
     */
    public function addSignedIdentifier($id, $start, $expiry, $permission)
    {
        Validate::isString($id, 'id');
        Validate::isString($start, 'start');
        Validate::isString($expiry, 'expiry');
        Validate::isString($permission, 'permission');
        
        $accessPolicy = new AccessPolicy();
        $accessPolicy->setStart($start);
        $accessPolicy->setExpiry($expiry);
        $accessPolicy->setPermission($permission);
        
        $signedIdentifier = new SignedIdentifier();
        $signedIdentifier->setId($id);
        $signedIdentifier->setAccessPolicy($accessPolicy);
        
        $this->_signedIdentifiers[] = $signedIdentifier;
    }
    
    /**
     * Converts this object to array representation for XML serialization 
     * 
     * @return array.
     */
    public function toArray()
    {
        $array = array();
        
        foreach ($this->_signedIdentifiers as $value) {
            $array[] = $value->toArray();
        }
        
        return $array;
    }
    
    /**
     * Converts this current object to XML representation.
     * 
     * @param XmlSerializer $xmlSerializer The XML serializer.
     * 
     * @return string.
     */
    public function toXml($xmlSerializer)
    {
        $properties = array(
            XmlSerializer::DEFAULT_TAG => 'SignedIdentifier',
            XmlSerializer::ROOT_NAME   => self::$xmlRootName
        );
        
        return $xmlSerializer->serialize($this->toArray(), $properties);
    }
}

?>
