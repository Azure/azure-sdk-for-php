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
 * @package   WindowsAzure\MediaServices
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace WindowsAzure\MediaServices;
use WindowsAzure\Common\Internal\Utilities;
use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\Common\Internal\Validate;
use WindowsAzure\Common\Internal\Http\HttpCallContext;
use WindowsAzure\Common\Models\ServiceProperties;
use WindowsAzure\Common\Internal\ServiceRestProxy;
use WindowsAzure\MediaServices\Internal\IMediaServices;
use WindowsAzure\MediaServices\Models\Asset;
use WindowsAzure\MediaServices\Models\AccessPolicy;
use WindowsAzure\MediaServices\Models\Locator;
use WindowsAzure\MediaServices\Models\AssetFile;
use WindowsAzure\MediaServices\Models\Job;
use WindowsAzure\MediaServices\Models\Task;
use WindowsAzure\MediaServices\Models\MediaProcessor;
use WindowsAzure\MediaServices\Models\JobTemplate;
use WindowsAzure\MediaServices\Models\TaskTemplate;
use WindowsAzure\MediaServices\Internal\ContentPropertiesSerializer;
use WindowsAzure\Common\Internal\Atom\Feed;
use WindowsAzure\Common\Internal\Atom\Entry;
use WindowsAzure\Common\Internal\Atom\Content;
use WindowsAzure\Common\Internal\Atom\AtomLink;
use WindowsAzure\Blob\Models\BlobType;
use WindowsAzure\Common\Internal\Http\HttpClient;
use WindowsAzure\Common\Internal\Http\Url;
use WindowsAzure\Common\Internal\Http\BatchRequest;
use WindowsAzure\Common\Internal\Http\BatchResponse;
use WindowsAzure\MediaServices\Models\StorageAccount;
use WindowsAzure\MediaServices\Models\IngestManifest;
use WindowsAzure\MediaServices\Models\IngestManifestAsset;
use WindowsAzure\MediaServices\Models\IngestManifestFile;
use WindowsAzure\MediaServices\Models\ContentKey;
use WindowsAzure\MediaServices\Models\ContentKeyAuthorizationPolicy;
use WindowsAzure\MediaServices\Models\ContentKeyAuthorizationPolicyOption;
use WindowsAzure\MediaServices\Models\AssetDeliveryPolicy;
use WindowsAzure\MediaServices\Models\EncodingReservedUnit;
use WindowsAzure\MediaServices\Models\EncodingReservedUnitType;

/**
 * This class constructs HTTP requests and receive HTTP responses for media services
 * service layer.
 *
 * @category  Microsoft
 * @package   WindowsAzure\MediaServices
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.4.2_2016-04
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class MediaServicesRestProxy extends ServiceRestProxy implements IMediaServices
{
    const BLOCK_ID_PREFIX = 'block-';
    const MAX_BLOCK_SIZE = 4194304; // 4 Mb
    const BLOCK_ID_PADDING = 6;

    /**
     * Headers used in batch requests
     *
     * @var array
     */
    private $_batchHeaders = array(
        Resources::DATA_SERVICE_VERSION     => Resources::MEDIA_SERVICES_DATA_SERVICE_VERSION_VALUE,
        Resources::MAX_DATA_SERVICE_VERSION => Resources::MEDIA_SERVICES_MAX_DATA_SERVICE_VERSION_VALUE,
        Resources::ACCEPT_HEADER            => Resources::ACCEPT_HEADER_VALUE,
        Resources::CONTENT_TYPE             => Resources::XML_ATOM_CONTENT_TYPE
    );

    /**
     * Sends HTTP request with the specified parameters.
     *
     * @param string $method         HTTP method used in the request
     * @param array  $headers        HTTP headers.
     * @param array  $queryParams    URL query parameters.
     * @param array  $postParameters The HTTP POST parameters.
     * @param string $path           URL path
     * @param int    $statusCode     Expected status code received in the response
     * @param string $body           Request body
     *
     * @return \HTTP_Request2_Response
     */
    protected function send(
        $method,
        $headers,
        $queryParams,
        $postParameters,
        $path,
        $statusCode,
        $body = Resources::EMPTY_STRING
    ) {
        // Add redirect to expected results
        if (!is_array($statusCode)) {
            $statusCode = array($statusCode, );
        }
        array_push($statusCode, Resources::STATUS_MOVED_PERMANENTLY);

        $response = parent::send(
            $method,
            $headers,
            $queryParams,
            $postParameters,
            $path,
            $statusCode,
            $body
        );

        // Set new URI endpoint if we get redirect response and perform query
        if ($response->getStatus() == Resources::STATUS_MOVED_PERMANENTLY) {
            $this->setUri($response->getHeader('location'));
            array_pop($statusCode);

            $response = parent::send(
                $method,
                $headers,
                $queryParams,
                $postParameters,
                $path,
                $statusCode,
                $body
            );
        }


        return $response;
    }

    /**
     * Wraps media services entity with Atom entry
     *
     * @param object $entity Media services entity
     * @param array  $links  AtomLinks to other media services entities
     *
     * @return XML string representing Atom Entry
     */
    protected function wrapAtomEntry($entity, $links = null)
    {
        Validate::notNull($entity, 'entity');

        $content = new Content();
        $content->setType(Resources::XML_CONTENT_TYPE);
        $content->setText(ContentPropertiesSerializer::serialize($entity));

        $atomEntry = new Entry();
        $atomEntry->setContent($content);

        if ($links) {
            Validate::isArray($links, 'links');

            $atomEntry->setLink($links);
        }

        $xmlWriter = new \XMLWriter();
        $xmlWriter->openMemory();
        $atomEntry->writeXml($xmlWriter);

        return $xmlWriter->outputMemory();
    }

    /**
     * Extract media service entity from Atom Entry object
     *
     * @param WindowsAzure\Common\Internal\Atom\Entry $entry Atom Entry containing
     * properties of media services object
     *
     * @return array of properties name => value
     */
    protected function getPropertiesFromAtomEntry($entry)
    {
        Validate::notNull($entry, 'entry');
        Validate::isA($entry, 'WindowsAzure\Common\Internal\Atom\Entry', 'entry');

        $result  = array();
        $content = $entry->getContent();
        if (!empty($content)) {
            $result = ContentPropertiesSerializer::unserialize(
                $content->getXml()->children(Resources::DSM_XML_NAMESPACE)
            );
        }

        return $result;
    }

    /**
     * Get array of properties of atom entites passed via feed or single entry
     *
     * @param string $xmlString Atom xml
     *
     * @return array of properties arrays
     */
    protected function getEntryList($xmlString)
    {
        $xml = simplexml_load_string($xmlString);

        if ($xml->getName() == Resources::ENTRY) {
            $entry = new Entry();
            $entry->fromXml($xml);
            $entries = array($entry);
        } else {
            $feed = new Feed();
            $feed->parseXml($xmlString);
            $entries = $feed->getEntry();
        }

        $result = array();
        if (is_array($entries)) {
            foreach ($entries as $entry) {
                $properties = $this->getPropertiesFromAtomEntry($entry);
                if (!empty($properties)) {
                    $result[] = $properties;
                }
            }
        }

        return $result;
    }

    /**
     * Create entity
     *
     * @param object $entity Entity data
     * @param string $path   REST path
     * @param array  $links  AtomLinks to other media services entities
     *
     * @return array Created entity data
     */
    private function _createEntity($entity, $path, $links = null)
    {
        $method      = Resources::HTTP_POST;
        $headers     = array();
        $postParams  = array();
        $queryParams = array();
        $statusCode  = Resources::STATUS_CREATED;
        $body        = $this->wrapAtomEntry($entity, $links);

        $response = $this->send(
            $method,
            $headers,
            $postParams,
            $queryParams,
            $path,
            $statusCode,
            $body
        );

        $entry = new Entry();
        $entry->parseXml($response->getBody());
        return $this->getPropertiesFromAtomEntry($entry);
    }

    /**
     * Get entity from Azure
     *
     * @param string $path REST path
     *
     * @return array Entity data
     */
    private function _getEntity($path)
    {
        $method      = Resources::HTTP_GET;
        $headers     = array();
        $postParams  = array();
        $queryParams = array();
        $statusCode  = Resources::STATUS_OK;

        $response = $this->send(
            $method,
            $headers,
            $postParams,
            $queryParams,
            $path,
            $statusCode
        );

        $entry = new Entry();
        $entry->parseXml($response->getBody());

        return $this->getPropertiesFromAtomEntry($entry);
    }

    /**
     * Create entity list
     *
     * @param string $path REST path
     *
     * @return array Entities list data
     */
    private function _getEntityList($path)
    {
        $method      = Resources::HTTP_GET;
        $headers     = array();
        $postParams  = array();
        $queryParams = array();
        $statusCode  = Resources::STATUS_OK;

        $response = $this->send(
            $method,
            $headers,
            $postParams,
            $queryParams,
            $path,
            $statusCode
        );

        return $this->getEntryList($response->getBody());
    }

    /**
     * Update entity
     *
     * @param object $entity Entity data
     * @param string $path   REST path
     *
     * @return none
     */
    private function _updateEntity($entity, $path)
    {
        $method      = Resources::HTTP_MERGE;
        $headers     = array();
        $postParams  = array();
        $queryParams = array();
        $statusCode  = Resources::STATUS_NO_CONTENT;
        $body        = $this->wrapAtomEntry($entity);

        $this->send(
            $method,
            $headers,
            $postParams,
            $queryParams,
            $path,
            $statusCode,
            $body
        );
    }
    
    /**
     * Delete entity
     *
     * @param string $path REST path
     *
     * @return none
     */
    private function _deleteEntity($path)
    {
        $method      = Resources::HTTP_DELETE;
        $headers     = array();
        $postParams  = array();
        $queryParams = array();
        $statusCode  = Resources::STATUS_NO_CONTENT;

        $this->send(
            $method,
            $headers,
            $postParams,
            $queryParams,
            $path,
            $statusCode
        );
    }

    /**
     * Create new asset
     *
     * @param WindowsAzure\MediaServices\Models\Asset $asset Asset data
     *
     * @return WindowsAzure\MediaServices\Models\Asset Created asset
     */
    public function createAsset($asset)
    {
        Validate::isA($asset, 'WindowsAzure\Mediaservices\Models\Asset', 'asset');

        return Asset::createFromOptions($this->_createEntity($asset, 'Assets'));
    }

    /**
     * Get asset
     *
     * @param WindowsAzure\MediaServices\Models\Asset|string $asset Asset data or
     * asset Id
     *
     * @return WindowsAzure\MediaServices\Models\Asset
     */
    public function getAsset($asset)
    {
        $assetId = Utilities::getEntityId(
            $asset,
            'WindowsAzure\MediaServices\Models\Asset'
        );

        return Asset::createFromOptions($this->_getEntity("Assets('{$assetId}')"));
    }

    /**
     * Get asset list
     *
     * @return array of Models\Asset
     */
    public function getAssetList()
    {
        $propertyList = $this->_getEntityList("Assets");
        $result       = array();

        foreach ($propertyList as $properties) {
            $result[] = Asset::createFromOptions($properties);
        }

        return $result;
    }

    /**
     * Get asset locators
     *
     * @param WindowsAzure\MediaServices\Models\Asset|string $asset Asset data or
     * asset Id
     *
     * @return array of Models\Locator
     */
    public function getAssetLocators($asset)
    {
        $assetId = Utilities::getEntityId(
            $asset,
            'WindowsAzure\MediaServices\Models\Asset'
        );

        $propertyList = $this->_getEntityList("Assets('{$assetId}')/Locators");
        $result       = array();

        foreach ($propertyList as $properties) {
            $result[] = Locator::createFromOptions($properties);
        }

        return $result;
    }

    /**
     * Get asset ContentKeys
     *
     * @param WindowsAzure\MediaServices\Models\Asset|string $asset Asset data or
     * asset Id
     *
     * @return array
     */
    public function getAssetContentKeys($asset)
    {
        $assetId = Utilities::getEntityId(
            $asset,
            'WindowsAzure\MediaServices\Models\Asset'
        );

        $propertyList = $this->_getEntityList("Assets('{$assetId}')/ContentKeys");
        $result       = array();

        foreach ($propertyList as $properties) {
            $result[] = ContentKey::createFromOptions($properties);
        }

        return $result;
    }

    /**
     * Get parent assets of asset
     *
     * @param WindowsAzure\MediaServices\Models\Asset|string $asset Asset data or
     * asset Id
     *
     * @return array of Models\Asset
     */
    public function getAssetParentAssets($asset)
    {
        $assetId = Utilities::getEntityId(
            $asset,
            'WindowsAzure\MediaServices\Models\Asset'
        );

        $propertyList = $this->_getEntityList("Assets('{$assetId}')/ParentAssets");
        $result       = array();

        foreach ($propertyList as $properties) {
            $result[] = Asset::createFromOptions($properties);
        }

        return $result;
    }

    /**
     * Get assetFiles of asset
     *
     * @param WindowsAzure\MediaServices\Models\Asset|string $asset Asset data or
     * asset Id
     *
     * @return array of Models\AssetFile
     */
    public function getAssetAssetFileList($asset)
    {
        $assetId = Utilities::getEntityId(
            $asset,
            'WindowsAzure\MediaServices\Models\Asset'
        );

        $propertyList = $this->_getEntityList("Assets('{$assetId}')/Files");
        $result       = array();

        foreach ($propertyList as $properties) {
            $result[] = AssetFile::createFromOptions($properties);
        }

        return $result;
    }

    /**
     * Get storage account of asset
     *
     * @param WindowsAzure\MediaServices\Models\Asset|string $asset Asset data or
     * asset Id
     *
     * @return WindowsAzure\MediaServices\Models\StorageAccount
     */
    public function getAssetStorageAccount($asset)
    {
        $assetId = Utilities::getEntityId(
            $asset,
            'WindowsAzure\MediaServices\Models\Asset'
        );

        return StorageAccount::createFromOptions(
            $this->_getEntity("Assets('{$assetId}')/StorageAccount")
        );
    }

    /**
     * Update asset
     *
     * @param WindowsAzure\MediaServices\Models\Asset $asset New asset data with
     * valid id
     *
     * @return none
     */
    public function updateAsset($asset)
    {
        Validate::isA($asset, 'WindowsAzure\MediaServices\Models\Asset', 'asset');

        $this->_updateEntity($asset, "Assets('{$asset->getId()}')");
    }

    /**
     * Delete asset
     *
     * @param WindowsAzure\MediaServices\Models\Asset|string $asset Asset data or
     * asset Id
     *
     * @return none
     */
    public function deleteAsset($asset)
    {
        $assetId = Utilities::getEntityId(
            $asset,
            'WindowsAzure\MediaServices\Models\Asset'
        );

        $this->_deleteEntity("Assets('{$assetId}')");
    }

    /**
     * Link ContentKey to Asset
     *
     * @param Models\Asset|string      $asset      Asset to link a ContentKey or
     * Asset id
     *
     * @param Models\ContentKey|string $contentKey ContentKey to link or
     * ContentKey id
     *
     * @return none
     */
    public function linkContentKeyToAsset($asset, $contentKey)
    {
        $assetId = Utilities::getEntityId(
            $asset,
            'WindowsAzure\MediaServices\Models\Asset'
        );
        $assetId = urlencode($assetId);

        $contentKeyId = Utilities::getEntityId(
            $contentKey,
            'WindowsAzure\MediaServices\Models\ContentKey'
        );

        $contentKeyId = urlencode($contentKeyId);

        $contentWriter = new \XMLWriter();
        $contentWriter->openMemory();
        $contentWriter->writeElementNS(
            'data',
            'uri',
            Resources::DS_XML_NAMESPACE,
            $this->getUri() . "ContentKeys('{$contentKeyId}')"
        );

        $method      = Resources::HTTP_POST;
        $path        = "Assets('{$assetId}')/\$links/ContentKeys";
        $headers     = array(
            Resources::CONTENT_TYPE => Resources::XML_CONTENT_TYPE,
        );
        $postParams  = array();
        $queryParams = array();
        $statusCode  = Resources::STATUS_NO_CONTENT;
        $body        = $contentWriter->outputMemory();

        $this->send(
            $method,
            $headers,
            $postParams,
            $queryParams,
            $path,
            $statusCode,
            $body
        );
    }

    /**
     * Remove ContentKey from Asset
     *
     * @param Models\Asset|string      $asset      Asset to remove a ContentKey or
     * Asset id
     *
     * @param Models\ContentKey|string $contentKey ContentKey to remove or
     * ContentKey id
     *
     * @return none
     */
    public function removeContentKeyFromAsset($asset, $contentKey)
    {
        $assetId = Utilities::getEntityId(
            $asset,
            'WindowsAzure\MediaServices\Models\Asset'
        );

        $contentKeyId = Utilities::getEntityId(
            $contentKey,
            'WindowsAzure\MediaServices\Models\ContentKey'
        );

        $method      = Resources::HTTP_DELETE;
        $path        = "Assets('{$assetId}')/\$links/ContentKeys('{$contentKeyId}')";
        $headers     = array();
        $postParams  = array();
        $queryParams = array();
        $statusCode  = Resources::STATUS_NO_CONTENT;

        $this->send(
            $method,
            $headers,
            $postParams,
            $queryParams,
            $path,
            $statusCode
        );
    }

    /**
     * Create new access policy
     *
     * @param WindowsAzure\MediaServices\Models\AccessPolicy $accessPolicy Access
     * policy data
     *
     * @return WindowsAzure\MediaServices\Models\AccessPolicy
     */
    public function createAccessPolicy($accessPolicy)
    {
        Validate::isA(
            $accessPolicy,
            'WindowsAzure\Mediaservices\Models\AccessPolicy',
            'accessPolicy'
        );

        return AccessPolicy::createFromOptions(
            $this->_createEntity($accessPolicy, 'AccessPolicies')
        );
    }

    /**
     * Get AccessPolicy.
     *
     * @param WindowsAzure\MediaServices\Models\AccessPolicy|string $accessPolicy A
     * AccessPolicy data or AccessPolicy Id
     *
     * @return WindowsAzure\MediaServices\Models\AccessPolicy
     */
    public function getAccessPolicy($accessPolicy)
    {
        $accessPolicyId = Utilities::getEntityId(
            $accessPolicy,
            'WindowsAzure\Mediaservices\Models\AccessPolicy'
        );

        return AccessPolicy::createFromOptions(
            $this->_getEntity("AccessPolicies('{$accessPolicyId}')")
        );
    }

    /**
     * Get list of AccessPolicies.
     *
     * @return array of Models\AccessPolicy
     */
    public function getAccessPolicyList()
    {
        $propertyList = $this->_getEntityList('AccessPolicies');
        $result       = array();

        foreach ($propertyList as $properties) {
            $result[] = AccessPolicy::createFromOptions($properties);
        }

        return $result;
    }

    /**
     * Delete access policy
     *
     * @param WindowsAzure\MediaServices\Models\AccessPolicy|string $accessPolicy A
     * Access policy data or access policy Id
     *
     * @return none
     */
    public function deleteAccessPolicy($accessPolicy)
    {
        $accessPolicyId = Utilities::getEntityId(
            $accessPolicy,
            'WindowsAzure\Mediaservices\Models\AccessPolicy'
        );

        $this->_deleteEntity("AccessPolicies('{$accessPolicyId}')");
    }

    /**
     * Create new locator
     *
     * @param WindowsAzure\MediaServices\Models\Locator $locator Locator data
     *
     * @return WindowsAzure\MediaServices\Models\Locator
     */
    public function createLocator($locator)
    {
        Validate::isA(
            $locator,
            'WindowsAzure\Mediaservices\Models\Locator',
            'locator'
        );

        return Locator::createFromOptions(
            $this->_createEntity($locator, 'Locators')
        );
    }

    /**
     * Get Locator.
     *
     * @param WindowsAzure\MediaServices\Models\Locator|string $locator Locator data
     * or locator Id
     *
     * @return WindowsAzure\MediaServices\Models\Locator
     */
    public function getLocator($locator)
    {
        $locatorId = Utilities::getEntityId(
            $locator,
            'WindowsAzure\Mediaservices\Models\Locator'
        );

        return Locator::createFromOptions(
            $this->_getEntity("Locators('{$locatorId}')")
        );
    }

    /**
     * Get Locator access policy.
     *
     * @param WindowsAzure\MediaServices\Models\Locator|string $locator Locator data
     * or locator Id
     *
     * @return WindowsAzure\MediaServices\Models\Locator
     */
    public function getLocatorAccessPolicy($locator)
    {
        $locatorId = Utilities::getEntityId(
            $locator,
            'WindowsAzure\Mediaservices\Models\Locator'
        );

        return AccessPolicy::createFromOptions(
            $this->_getEntity("Locators('{$locatorId}')/AccessPolicy")
        );
    }

    /**
     * Get Locator asset.
     *
     * @param WindowsAzure\MediaServices\Models\Locator|string $locator Locator data
     * or locator Id
     *
     * @return WindowsAzure\MediaServices\Models\Locator
     */
    public function getLocatorAsset($locator)
    {
        $locatorId = Utilities::getEntityId(
            $locator,
            'WindowsAzure\Mediaservices\Models\Locator'
        );

        return Asset::createFromOptions(
            $this->_getEntity("Locators('{$locatorId}')/Asset")
        );
    }

    /**
     * Get list of Locators.
     *
     * @return array of Models\Locator
     */
    public function getLocatorList()
    {
        $propertyList = $this->_getEntityList('Locators');
        $result       = array();

        foreach ($propertyList as $properties) {
            $result[] = Locator::createFromOptions($properties);
        }

        return $result;
    }

    /**
     * Update locator
     *
     * @param WindowsAzure\MediaServices\Models\Locator $locator New locator data
     * with valid id
     *
     * @return none
     */
    public function updateLocator($locator)
    {
        Validate::isA(
            $locator,
            'WindowsAzure\MediaServices\Models\Locator',
            'locator'
        );

        $this->_updateEntity($locator, "Locators('{$locator->getId()}')");
    }

    /**
     * Delete locator
     *
     * @param WindowsAzure\MediaServices\Models\Locator|string $locator Asset data
     * or asset Id
     *
     * @return none
     */
    public function deleteLocator($locator)
    {
        $locatorId = Utilities::getEntityId(
            $locator,
            'WindowsAzure\Mediaservices\Models\Locator'
        );

        $this->_deleteEntity("Locators('{$locatorId}')");
    }

    /**
     * Generate file info for all files in asset
     *
     * @param WindowsAzure\MediaServices\Models\Asset|string $asset Asset data or
     * asset Id
     *
     * @return none
     */
    public function createFileInfos($asset)
    {
        $assetId        = Utilities::getEntityId(
            $asset,
            'WindowsAzure\MediaServices\Models\Asset'
        );
        $assetIdEncoded = urlencode($assetId);

        $method      = Resources::HTTP_GET;
        $headers     = array();
        $postParams  = array();
        $queryParams = array();
        $path        = "CreateFileInfos?assetid='{$assetIdEncoded}'";
        $statusCode  = Resources::STATUS_NO_CONTENT;

        $this->send(
            $method,
            $headers,
            $postParams,
            $queryParams,
            $path,
            $statusCode
        );
    }

    /**
     * Get asset file.
     *
     * @param WindowsAzure\MediaServices\Models\AssetFile|string $assetFile AssetFile
     * data or assetFile Id
     *
     * @return WindowsAzure\MediaServices\Models\AssetFile
     */
    public function getAssetFile($assetFile)
    {
        $assetFileId = Utilities::getEntityId(
            $assetFile,
            'WindowsAzure\Mediaservices\Models\AssetFile'
        );

        return AssetFile::createFromOptions(
            $this->_getEntity("Files('{$assetFileId}')")
        );
    }


    /**
     * Get list of all asset files.
     *
     * @return array of Models\AssetFile
     */
    public function getAssetFileList()
    {
        $propertyList = $this->_getEntityList('Files');
        $result       = array();

        foreach ($propertyList as $properties) {
            $result[] = AssetFile::createFromOptions($properties);
        }

        return $result;
    }

    /**
     * Update asset file
     *
     * @param WindowsAzure\MediaServices\Models\AssetFile $assetFile New AssetFile
     * data
     *
     * @return none
     */
    public function updateAssetFile($assetFile)
    {
        Validate::isA(
            $assetFile,
            'WindowsAzure\MediaServices\Models\AssetFile',
            'assetFile'
        );

        $this->_updateEntity($assetFile, "Files('{$assetFile->getId()}')");
    }

    /**
     * Upload asset file to storage.
     *
     * @param WindowsAzure\MediaServices\Models\Locator $locator Write locator for
     * file upload
     *
     * @param string            $name Uploading filename
     * @param string | resource $file Uploading content or file handle
     *
     * @return none
     */
    public function uploadAssetFile($locator, $name, $file)
    {
        Validate::isA(
            $locator,
            'WindowsAzure\Mediaservices\Models\Locator',
            'locator'
        );
        Validate::isString($name, 'name');
        Validate::notNull($file, 'body');

        $urlFile    = $locator->getBaseUri() . '/' . $name;
        $url        = $urlFile . $locator->getContentAccessComponent();

        if (is_resource($file)) {
            $this->_uploadAssetFileFromResource($url, $file);
        }
        else {
            $this->_uploadAssetFileFromString($url, $file);
        }
    }

    /***
     * Generates ID for uploading block
     *
     * @param int $blockCount Count of existing blocks
     *
     * @return string
     */
    private function _generateBlockId($blockCount)
    {
        return base64_encode (self::BLOCK_ID_PREFIX . str_pad($blockCount, self::BLOCK_ID_PADDING, '0', STR_PAD_LEFT));
    }

    /***
     * Upload asset file from resource
     *
     * @param string   $url      Url for upload
     * @param resource $resource Handle of uploading file
     *
     * @return none
     */
    private function _uploadAssetFileFromResource($url, $resource)
    {
        $blockSize = self::MAX_BLOCK_SIZE;
        $blockIds = array();

        $blockContent = fread($resource, $blockSize);
        if (feof($resource)) {
            $this->_uploadAssetFileSingle($url, $blockContent);

            return;
        }

        $blockId = $this->_generateBlockId(count($blockIds));

        $blockIds[] = $blockId;
        $this->_uploadBlock($url, $blockId, $blockContent);

        while (!feof($resource)) {
            $blockContent = fread($resource, $blockSize);

            $blockId = $this->_generateBlockId(count($blockIds));

            $blockIds[] = $blockId;
            $this->_uploadBlock($url, $blockId, $blockContent);
        }

        $this->_commitBlocks($url, $blockIds);
    }

    /***
     * Upload asset file from string
     *
     * @param string $url  Url for upload
     * @param string $body File content
     *
     * @return none
     */
    private function _uploadAssetFileFromString($url, $body)
    {
        $blockSize = self::MAX_BLOCK_SIZE;
        $blockIds = array();

        $fileSize = strlen($body);

        if ($fileSize < $blockSize) {
            $this->_uploadAssetFileSingle($url, $body);

            return;
        }

        $totalBytesRemaining = $fileSize;
        $uploadedBytes = 0;

        while ($totalBytesRemaining > 0) {
            $blockContent = substr($body, $uploadedBytes, $blockSize);

            $blockId = $this->_generateBlockId(count($blockIds));

            $blockIds[] = $blockId;
            $this->_uploadBlock($url, $blockId, $blockContent);
            $uploadedBytes += $blockSize;

            $totalBytesRemaining -= $blockSize;
            if ($totalBytesRemaining < $blockSize) {
                $blockSize = $totalBytesRemaining;
            }
        }

        $this->_commitBlocks($url, $blockIds);
    }

    /***
     * Upload asset file via single request
     *
     * @param string $url  Url for upload
     * @param string $body File content
     *
     * @return none
     */
    private function _uploadAssetFileSingle($url, $body)
    {
        $method     = Resources::HTTP_PUT;
        $filters    = array();
        $statusCode = Resources::STATUS_CREATED;
        $headers    = array(
            Resources::CONTENT_TYPE   => Resources::BINARY_FILE_TYPE,
            Resources::X_MS_VERSION   => Resources::STORAGE_API_LATEST_VERSION,
            Resources::X_MS_BLOB_TYPE => BlobType::BLOCK_BLOB,
        );

        $httpClient = new HttpClient();
        $httpClient->setMethod($method);
        $httpClient->setHeaders($headers);
        $httpClient->setExpectedStatusCode($statusCode);
        $httpClient->setBody($body);
        $httpClient->send($filters, new Url($url));
    }

    /***
     * Upload a new block to be committed as part of a block blob
     *
     * @param string $url          Url for upload
     * @param string $blockId      Block Id
     * @param string $blockContent Uploading content
     *
     * @return none
     */
    private function _uploadBlock($url, $blockId, $blockContent) {
       $baseUrl = new Url($url);
       $baseUrl->setQueryVariable(Resources::QP_COMP, 'block');
       $baseUrl->setQueryVariable(Resources::QP_BLOCKID, $blockId);

       $method     = Resources::HTTP_PUT;
       $filters    = array();
       $statusCode = Resources::STATUS_CREATED;

       $headers    = array(
           Resources::CONTENT_TYPE   => Resources::BINARY_FILE_TYPE,
           Resources::X_MS_VERSION   => Resources::STORAGE_API_LATEST_VERSION,
           Resources::X_MS_BLOB_TYPE => BlobType::BLOCK_BLOB,
       );

       $httpClient = new HttpClient();
       $httpClient->setMethod($method);
       $httpClient->setHeaders($headers);
       $httpClient->setExpectedStatusCode($statusCode);
       $httpClient->setBody($blockContent);

       $httpClient->send($filters, $baseUrl);
    }

    /***
     * Commit block blob
     *
     * @param string $url      Url for commit
     * @param array  $blockIds Blocks identifiers
     *
     * @return none
     */
    private function _commitBlocks($url, $blockIds) {
        $baseUrl = new Url($url);
        $baseUrl->setQueryVariable(Resources::QP_COMP, 'blocklist');

        $xml = new \XMLWriter();

        $xml->openMemory();
        $xml->setIndent(true);

        $xml->startDocument('1.0','UTF-8');

        $xml->startElement('BlockList');

        foreach ($blockIds as $blockId) {
            $xml->writeElement('Latest', $blockId);
        }

        $xml->endElement();

        $xml->endDocument();

        $xmlContent = $xml->outputMemory();

        $method     = Resources::HTTP_PUT;
        $filters    = array();
        $statusCode = Resources::STATUS_CREATED;
        $headers    = array(
            Resources::CONTENT_TYPE   => Resources::BINARY_FILE_TYPE,
            Resources::X_MS_VERSION   => Resources::STORAGE_API_LATEST_VERSION,
        );

        $httpClient = new HttpClient();
        $httpClient->setMethod($method);
        $httpClient->setHeaders($headers);
        $httpClient->setExpectedStatusCode($statusCode);
        $httpClient->setBody($xmlContent);
        $httpClient->send($filters, $baseUrl);
    }

    /**
     * Create a job HTTP call context.
     *
     * @param WindowsAzure\MediaServices\Models\Job $job         Job data
     * @param array                                 $inputAssets Input assets list
     *
     * @return WindowsAzure\Common\Internal\Http\HttpCallContext
     */
    private function _getCreateEmptyJobContext($job, $inputAssets)
    {
        Validate::isA($job, 'WindowsAzure\MediaServices\Models\Job', 'job');
        Validate::isArray($inputAssets, 'inputAssets');

        $atomLinks = array();
        foreach ($inputAssets as $inputAsset) {
            Validate::isA(
                $inputAsset,
                'WindowsAzure\MediaServices\Models\Asset',
                'inputAssets'
            );

            $href = urlencode($inputAsset->getId());

            $atomLink = new AtomLink();
            $atomLink->setHref($this->getUri() . "Assets('{$href}')");
            $atomLink->setType(Resources::ATOM_FEED_CONTENT_TYPE);
            $atomLink->setTitle('InputAssets');
            $atomLink->setRel(Resources::MEDIA_SERVICES_INPUT_ASSETS_REL);

            $atomLinks[] = $atomLink;
        }

        $result = new HttpCallContext();
        $result->setMethod(Resources::HTTP_POST);
        $result->setHeaders($this->_batchHeaders);
        $result->setUri($this->getUri());
        $result->setPath('/Jobs');
        $result->setBody($this->wrapAtomEntry($job, $atomLinks));
        $result->addStatusCode(Resources::STATUS_CREATED);

        return $result;
    }


    /**
     * Create task HTTP call context
     *
     * @param WindowsAzure\MediaServices\Models\Task $task Task object to be created
     *
     * @return WindowsAzure\Common\Internal\Http\HttpCallContext
     */
    private function _getCreateTaskContext($task)
    {
        Validate::isA($task, 'WindowsAzure\MediaServices\Models\Task', 'task');

        $result = new HttpCallContext();
        $result->setMethod(Resources::HTTP_POST);
        $result->setHeaders($this->_batchHeaders);
        $result->setUri($this->getUri());
        $result->setPath('/$1/Tasks');
        $result->setBody($this->wrapAtomEntry($task));
        $result->addStatusCode(Resources::STATUS_CREATED);

        return $result;
    }

    /**
     * Create a job.
     *
     * @param WindowsAzure\MediaServices\Models\Job $job         Job data
     * @param array                                 $inputAssets Input assets list
     * @param array                                 $tasks       Performed tasks
     * array (optional)
     *
     * @return Models\Job
     */
    public function createJob($job, $inputAssets, $tasks = null)
    {
        Validate::isA($job, 'WindowsAzure\MediaServices\Models\Job', 'job');
        Validate::isArray($inputAssets, 'inputAssets');

        $batch = new BatchRequest();
        $batch->appendContext($this->_getCreateEmptyJobContext($job, $inputAssets));

        if ($tasks != null) {
            foreach ($tasks as $task) {
                $batch->appendContext($this->_getCreateTaskContext($task));
            }
        }

        $batch->encode();

        $method      = Resources::HTTP_POST;
        $headers     = $batch->getHeaders();
        $postParams  = array();
        $queryParams = array();
        $path        = '$batch';
        $statusCode  = Resources::STATUS_ACCEPTED;
        $body        = $batch->getBody();

        $response = $this->send(
            $method,
            $headers,
            $postParams,
            $queryParams,
            $path,
            $statusCode,
            $body
        );

        $batchResponse = new BatchResponse($response->getBody(), $batch);
        $responses     = $batchResponse->getContexts();
        $jobResponse   = $responses[0];

        $entry = new Entry();
        $entry->parseXml($jobResponse->getBody());
        $properties = $this->getPropertiesFromAtomEntry($entry);

        return Job::createFromOptions($properties);
    }

    /**
     * Get Job.
     *
     * @param WindowsAzure\MediaServices\Models\Job|string $job Job data or job Id
     *
     * @return WindowsAzure\MediaServices\Models\Job
     */
    public function getJob($job)
    {
        $jobId = Utilities::getEntityId(
            $job,
            'WindowsAzure\Mediaservices\Models\Job'
        );

        return Job::createFromOptions($this->_getEntity("Jobs('{$jobId}')"));
    }

    /**
     * Get list of Jobs.
     *
     * @return array of Models\Job
     */
    public function getJobList()
    {
        $propertyList = $this->_getEntityList('Jobs');
        $result       = array();

        foreach ($propertyList as $properties) {
            $result[] = Job::createFromOptions($properties);
        }

        return $result;
    }

    /**
     * Get status of a job
     *
     * @param WindowsAzure\MediaServices\Models\Job|string $job Job data or job Id
     *
     * @return string
     */
    public function getJobStatus($job)
    {
        $jobId        = Utilities::getEntityId(
            $job,
            'WindowsAzure\MediaServices\Models\Job'
        );
        $jobIdEncoded = urlencode($jobId);

        $method      = Resources::HTTP_GET;
        $headers     = array();
        $postParams  = array();
        $queryParams = array();
        $path        = "Jobs('{$jobIdEncoded}')/State";
        $statusCode  = Resources::STATUS_OK;

        $response = $this->send(
            $method,
            $headers,
            $postParams,
            $queryParams,
            $path,
            $statusCode
        );

        return strip_tags($response->getBody());
    }

    /**
     * Get job tasks.
     *
     * @param WindowsAzure\MediaServices\Models\Job|string $job Job data or job Id
     *
     * @return array of Models\Task
     */
    public function getJobTasks($job)
    {
        $jobId = Utilities::getEntityId(
            $job,
            'WindowsAzure\Mediaservices\Models\Job'
        );

        $propertyList = $this->_getEntityList("Jobs('{$jobId}')/Tasks");
        $result       = array();

        foreach ($propertyList as $properties) {
            $result[] = Task::createFromOptions($properties);
        }

        return $result;
    }


    /**
     * Get job input assets.
     *
     * @param WindowsAzure\MediaServices\Models\Job|string $job Job data or job Id
     *
     * @return array of Models\Asset
     */
    public function getJobInputMediaAssets($job)
    {
        $jobId = Utilities::getEntityId(
            $job,
            'WindowsAzure\Mediaservices\Models\Job'
        );

        $propertyList = $this->_getEntityList("Jobs('{$jobId}')/InputMediaAssets");
        $result       = array();

        foreach ($propertyList as $properties) {
            $result[] = Asset::createFromOptions($properties);
        }

        return $result;
    }

    /**
     * Get job output assets.
     *
     * @param WindowsAzure\MediaServices\Models\Job|string $job Job data or job Id
     *
     * @return array of Models\Asset
     */
    public function getJobOutputMediaAssets($job)
    {
        $jobId = Utilities::getEntityId(
            $job,
            'WindowsAzure\Mediaservices\Models\Job'
        );

        $propertyList = $this->_getEntityList("Jobs('{$jobId}')/OutputMediaAssets");
        $result       = array();

        foreach ($propertyList as $properties) {
            $result[] = Asset::createFromOptions($properties);
        }

        return $result;
    }

    /**
     * Cancel a job
     *
     * @param WindowsAzure\MediaServices\Models\Job|string $job Job data or job Id
     *
     * @return none
     */
    public function cancelJob($job)
    {
        $jobId        = Utilities::getEntityId(
            $job,
            'WindowsAzure\MediaServices\Models\Job'
        );
        $jobIdEncoded = urlencode($jobId);

        $method      = Resources::HTTP_GET;
        $headers     = array();
        $postParams  = array();
        $queryParams = array();
        $path        = "CancelJob?jobid='{$jobIdEncoded}'";
        $statusCode  = Resources::STATUS_NO_CONTENT;

        $this->send(
            $method,
            $headers,
            $postParams,
            $queryParams,
            $path,
            $statusCode
        );
    }

    /**
     * Delete job
     *
     * @param WindowsAzure\MediaServices\Models\Job|string $job Job data or job Id
     *
     * @return none
     */
    public function deleteJob($job)
    {
        $jobId = Utilities::getEntityId(
            $job,
            'WindowsAzure\Mediaservices\Models\Job'
        );

        $this->_deleteEntity("Jobs('{$jobId}')");
    }

    /**
     * Get list of tasks.
     *
     * @return array of Models\Task
     */
    public function getTaskList()
    {
        $propertyList = $this->_getEntityList('Tasks');
        $result       = array();

        foreach ($propertyList as $properties) {
            $result[] = Task::createFromOptions($properties);
        }

        return $result;
    }

    /**
     * Create a job HTTP call context.
     *
     * @param WindowsAzure\MediaServices\Models\Job $jobTemplate JobTemplate data
     *
     * @return WindowsAzure\Common\Internal\Http\HttpCallContext
     */
    private function _getCreateEmptyJobTemplateContext($jobTemplate)
    {
        Validate::isA(
            $jobTemplate,
            'WindowsAzure\MediaServices\Models\JobTemplate',
            'jobTemplate'
        );

        $result = new HttpCallContext();
        $result->setMethod(Resources::HTTP_POST);
        $result->setHeaders($this->_batchHeaders);
        $result->setUri($this->getUri());
        $result->setPath('/JobTemplates');
        $result->setBody($this->wrapAtomEntry($jobTemplate));
        $result->addStatusCode(Resources::STATUS_CREATED);

        return $result;
    }


    /**
     * Create task template HTTP call context
     *
     * @param WindowsAzure\MediaServices\Models\TaskTemplate $taskTemplate Task
     * template object to be created
     *
     * @return WindowsAzure\Common\Internal\Http\HttpCallContext
     */
    private function _getCreateTaskTemplateContext($taskTemplate)
    {
        Validate::isA(
            $taskTemplate,
            'WindowsAzure\MediaServices\Models\TaskTemplate',
            'taskTemplate'
        );

        $result = new HttpCallContext();
        $result->setMethod(Resources::HTTP_POST);
        $result->setHeaders($this->_batchHeaders);
        $result->setUri($this->getUri());
        $result->setPath('/$1/TaskTemplates');
        $result->setBody($this->wrapAtomEntry($taskTemplate));
        $result->addStatusCode(Resources::STATUS_CREATED);

        return $result;
    }

    /**
     * Create a job.
     *
     * @param WindowsAzure\MediaServices\Models\JobTemplate $jobTemplate   Job
     * template data
     *
     * @param array                                         $taskTemplates Performed
     * tasks template array
     *
     * @return Models\JobTemplate
     */
    public function createJobTemplate($jobTemplate, $taskTemplates)
    {
        Validate::isA(
            $jobTemplate,
            'WindowsAzure\MediaServices\Models\JobTemplate',
            'jobTemplate'
        );
        Validate::isArray($taskTemplates, 'taskTemplates');

        $batch = new BatchRequest();
        $batch->appendContext(
            $this->_getCreateEmptyJobTemplateContext($jobTemplate)
        );

        if ($taskTemplates != null) {
            foreach ($taskTemplates as $taskTemplate) {
                $batch->appendContext(
                    $this->_getCreateTaskTemplateContext($taskTemplate)
                );
            }
        }

        $batch->encode();

        $method      = Resources::HTTP_POST;
        $headers     = $batch->getHeaders();
        $postParams  = array();
        $queryParams = array();
        $path        = '$batch';
        $statusCode  = Resources::STATUS_ACCEPTED;
        $body        = $batch->getBody();

        $response = $this->send(
            $method,
            $headers,
            $postParams,
            $queryParams,
            $path,
            $statusCode,
            $body
        );

        $batchResponse       = new BatchResponse($response->getBody(), $batch);
        $responses           = $batchResponse->getContexts();
        $jobTemplateResponse = $responses[0];

        $entry = new Entry();
        $entry->parseXml($jobTemplateResponse->getBody());
        $properties = $this->getPropertiesFromAtomEntry($entry);

        return JobTemplate::createFromOptions($properties);
    }

    /**
     * Get job template.
     *
     * @param WindowsAzure\MediaServices\Models\JobTemplate|string $jobTemplate Job
     * template data or jobTemplate Id
     *
     * @return WindowsAzure\MediaServices\Models\JobTemplate
     */
    public function getJobTemplate($jobTemplate)
    {
        $jobTemplateId = Utilities::getEntityId(
            $jobTemplate,
            'WindowsAzure\Mediaservices\Models\JobTemplate'
        );

        return JobTemplate::createFromOptions(
            $this->_getEntity("JobTemplates('{$jobTemplateId}')")
        );
    }

    /**
     * Get list of Job Templates.
     *
     * @return array of Models\JobTemplate
     */
    public function getJobTemplateList()
    {
        $propertyList = $this->_getEntityList('JobTemplates');
        $result       = array();

        foreach ($propertyList as $properties) {
            $result[] = JobTemplate::createFromOptions($properties);
        }

        return $result;
    }

    /**
     * Get task templates for job template.
     *
     * @param WindowsAzure\MediaServices\Models\JobTemplate|string $jobTemplate Job
     * template data or jobTemplate Id
     *
     * @return array of Models\TaskTemplate
     */
    public function getJobTemplateTaskTemplateList($jobTemplate)
    {
        $jobTemplateId = Utilities::getEntityId(
            $jobTemplate,
            'WindowsAzure\Mediaservices\Models\JobTemplate'
        );

        $propertyList = $this->_getEntityList(
            "JobTemplates('{$jobTemplateId}')/TaskTemplates"
        );
        $result       = array();

        foreach ($propertyList as $properties) {
            $result[] = TaskTemplate::createFromOptions($properties);
        }

        return $result;
    }


    /**
     * Delete job template
     *
     * @param WindowsAzure\MediaServices\Models\JobTemplate|string $jobTemplate Job
     * template data or job template Id
     *
     * @return none
     */
    public function deleteJobTemplate($jobTemplate)
    {
        $jobTemplateId = Utilities::getEntityId(
            $jobTemplate,
            'WindowsAzure\Mediaservices\Models\JobTemplate'
        );

        $this->_deleteEntity("JobTemplates('{$jobTemplateId}')");
    }

    /**
     * Get list of task templates.
     *
     * @return array of Models\Tasktemplate
     */
    public function getTaskTemplateList()
    {
        $propertyList = $this->_getEntityList('TaskTemplates');
        $result       = array();

        foreach ($propertyList as $properties) {
            $result[] = TaskTemplate::createFromOptions($properties);
        }

        return $result;
    }

    /**
     * Get list of all media processors asset files
     *
     * @return array of Models\MediaProcessor
     */
    public function getMediaProcessors()
    {
        $propertyList = $this->_getEntityList('MediaProcessors');
        $result       = array();

        foreach ($propertyList as $properties) {
            $result[] = MediaProcessor::createFromOptions($properties);
        }

        return $result;
    }

    /**
     * Get media processor by name with latest version
     *
     * @param string $name Media processor name
     *
     * @return WindowsAzure\MediaServices\Models\JobTemplate\MediaProcessor
     */
    public function getLatestMediaProcessor($name)
    {
        $mediaProcessors = $this->getMediaProcessors();

        $maxVersion = 0.0;
        $result     = null;
        foreach ($mediaProcessors as $mediaProcessor) {
            if (($mediaProcessor->getName() == $name)
                && ($mediaProcessor->getVersion() > $maxVersion)
            ) {
                $result     = $mediaProcessor;
                $maxVersion = $mediaProcessor->getVersion();
            }
        }

        return $result;
    }

    /**
     * Create new IngestManifest
     *
     * @param Models\IngestManifest $ingestManifest An IngestManifest data
     *
     * @return WindowsAzure\MediaServices\Models\IngestManifest
     */
    public function createIngestManifest($ingestManifest)
    {
        Validate::isA(
            $ingestManifest,
            'WindowsAzure\Mediaservices\Models\IngestManifest', 'ingestManifest'
        );

        return IngestManifest::createFromOptions(
            $this->_createEntity($ingestManifest, 'IngestManifests')
        );
    }

    /**
     * Get IngestManifest
     *
     * @param Models\IngestManifest|string $ingestManifest An IngestManifest data or
     * IngestManifest Id
     *
     * @return WindowsAzure\MediaServices\Models\IngestManifest
     */
    public function getIngestManifest($ingestManifest)
    {
        $ingestManifestId = Utilities::getEntityId(
            $ingestManifest,
            'WindowsAzure\MediaServices\Models\IngestManifest'
        );

        return IngestManifest::createFromOptions(
            $this->_getEntity("IngestManifests('{$ingestManifestId}')")
        );
    }

    /**
     * Get IngestManifest list
     *
     * @return array of Models\IngestManifest
     */
    public function getIngestManifestList()
    {
        $propertyList = $this->_getEntityList("IngestManifests");
        $result       = array();

        foreach ($propertyList as $properties) {
            $result[] = IngestManifest::createFromOptions($properties);
        }

        return $result;
    }

    /**
     * Get IngestManifest assets
     *
     * @param Models\IngestManifest|string $ingestManifest An IngestManifest data or
     * IngestManifest Id
     *
     * @return array of Models\IngestManifestAsset
     */
    public function getIngestManifestAssets($ingestManifest)
    {
        $ingestManifestId = Utilities::getEntityId(
            $ingestManifest,
            'WindowsAzure\MediaServices\Models\IngestManifest'
        );

        $propertyList = $this->_getEntityList(
            "IngestManifests('{$ingestManifestId}')/IngestManifestAssets"
        );
        $result       = array();

        foreach ($propertyList as $properties) {
            $result[] = IngestManifestAsset::createFromOptions($properties);
        }

        return $result;
    }

    /**
     * Get pending assets of IngestManifest
     *
     * @param Models\IngestManifest|string $ingestManifest An IngestManifest data or
     * IngestManifest Id
     *
     * @return array of Models\IngestManifestAsset
     */
    public function getPendingIngestManifestAssets($ingestManifest)
    {
        $ingestManifestId = Utilities::getEntityId(
            $ingestManifest,
            'WindowsAzure\MediaServices\Models\IngestManifest'
        );

        $propertyList = $this->_getEntityList(
            "IngestManifests('{$ingestManifestId}')/PendingIngestManifestAssets"
        );
        $result       = array();

        foreach ($propertyList as $properties) {
            $result[] = IngestManifestAsset::createFromOptions($properties);
        }

        return $result;
    }

    /**
     * Get storage account of IngestManifest
     *
     * @param Models\IngestManifest|string $ingestManifest An IngestManifest data
     * or IngestManifest Id
     *
     * @return WindowsAzure\MediaServices\Models\StorageAccount
     */
    public function getIngestManifestStorageAccount($ingestManifest)
    {
        $ingestManifestId = Utilities::getEntityId(
            $ingestManifest,
            'WindowsAzure\MediaServices\Models\IngestManifest'
        );

        return StorageAccount::createFromOptions(
            $this->_getEntity(
                "IngestManifests('{$ingestManifestId}')/StorageAccount"
            )
        );
    }

    /**
     * Update IngestManifest
     *
     * @param Models\IngestManifest $ingestManifest New IngestManifest data with
     * valid id
     *
     * @return none
     */
    public function updateIngestManifest($ingestManifest)
    {
        Validate::isA(
            $ingestManifest,
            'WindowsAzure\MediaServices\Models\IngestManifest',
            'ingestManifest'
        );

        $this->_updateEntity(
            $ingestManifest,
            "IngestManifests('{$ingestManifest->getId()}')"
        );
    }

    /**
     * Delete IngestManifest
     *
     * @param Models\IngestManifest|string $ingestManifest An IngestManifest data or
     * IngestManifest Id
     *
     * @return none
     */
    public function deleteIngestManifest($ingestManifest)
    {
        $ingestManifestId = Utilities::getEntityId(
            $ingestManifest,
            'WindowsAzure\MediaServices\Models\IngestManifest'
        );

        $this->_deleteEntity("IngestManifests('{$ingestManifestId}')");
    }

    /**
     * Create new IngestManifestAsset
     *
     * @param Models\IngestManifestAsset $ingestManifestAsset An IngestManifestAsset
     * data
     *
     * @param Models\Asset               $asset               An Asset data to be
     * linked with IngestManifestAsset
     *
     * @return WindowsAzure\MediaServices\Models\IngestManifestAsset
     */
    public function createIngestManifestAsset($ingestManifestAsset, $asset)
    {
        Validate::isA(
            $ingestManifestAsset,
            'WindowsAzure\Mediaservices\Models\IngestManifestAsset',
            'ingestManifestAsset'
        );

        Validate::isA(
            $asset,
            'WindowsAzure\Mediaservices\Models\Asset',
            'asset'
        );

        $href = urlencode($asset->getId());

        $atomLink = new AtomLink();
        $atomLink->setHref($this->getUri() . "Assets('{$href}')");
        $atomLink->setType(Resources::ATOM_ENTRY_CONTENT_TYPE);
        $atomLink->setTitle('Asset');
        $atomLink->setRel(Resources::MEDIA_SERVICES_ASSET_REL);

        return IngestManifestAsset::createFromOptions(
            $this->_createEntity(
                $ingestManifestAsset,
                'IngestManifestAssets',
                array($atomLink)
            )
        );
    }

    /**
     * Get IngestManifestAsset.
     *
     * @param Models\IngestManifestAsset|string $ingestManifestAsset An
     * IngestManifestAsset data or IngestManifestAsset Id
     *
     * @return WindowsAzure\MediaServices\Models\IngestManifestAsset
     */
    public function getIngestManifestAsset($ingestManifestAsset)
    {
        $ingestManifestAssetId = Utilities::getEntityId(
            $ingestManifestAsset,
            'WindowsAzure\Mediaservices\Models\IngestManifestAsset'
        );

        return IngestManifestAsset::createFromOptions(
            $this->_getEntity("IngestManifestAssets('{$ingestManifestAssetId}')")
        );
    }

    /**
     * Get list of IngestManifestAsset.
     *
     * @return array of Models\IngestManifestAsset
     */
    public function getIngestManifestAssetList()
    {
        $propertyList = $this->_getEntityList('IngestManifestAssets');
        $result       = array();

        foreach ($propertyList as $properties) {
            $result[] = IngestManifestAsset::createFromOptions($properties);
        }

        return $result;
    }

    /**
     * Get IngestManifestFiles of IngestManifestAsset
     *
     * @param Models\IngestManifestAsset|string $ingestManifestAsset An
     * IngestManifestAsset data or IngestManifestAsset Id
     *
     * @return array of Models\IngestManifestFiles
     */
    public function getIngestManifestAssetFiles($ingestManifestAsset)
    {
        $ingestManifestAssetId = Utilities::getEntityId(
            $ingestManifestAsset,
            'WindowsAzure\MediaServices\Models\IngestManifestAsset'
        );

        $propertyList = $this->_getEntityList(
            "IngestManifestAssets('{$ingestManifestAssetId}')/IngestManifestFiles"
        );
        $result       = array();

        foreach ($propertyList as $properties) {
            $result[] = ingestManifestFile::createFromOptions($properties);
        }

        return $result;
    }


    /**
     * Delete IngestManifestAsset
     *
     * @param Models\IngestManifestAsset|string $ingestManifestAsset An
     * IngestManifestAsset data or IngestManifestAsset Id
     *
     * @return none
     */
    public function deleteIngestManifestAsset($ingestManifestAsset)
    {
        $ingestManifestAssetId = Utilities::getEntityId(
            $ingestManifestAsset,
            'WindowsAzure\Mediaservices\Models\IngestManifestAsset'
        );

        $this->_deleteEntity("IngestManifestAssets('{$ingestManifestAssetId}')");
    }

    /**
     * Create new IngestManifestFile
     *
     * @param Models\IngestManifestFile $ingestManifestFile An IngestManifestFile
     * data
     *
     * @return WindowsAzure\MediaServices\Models\IngestManifestFile
     */
    public function createIngestManifestFile($ingestManifestFile)
    {
        Validate::isA(
            $ingestManifestFile,
            'WindowsAzure\Mediaservices\Models\IngestManifestFile',
            'ingestManifestFile'
        );

        return IngestManifestFile::createFromOptions(
            $this->_createEntity($ingestManifestFile, 'IngestManifestFiles')
        );
    }

    /**
     * Get IngestManifestFile.
     *
     * @param Models\IngestManifestFile|string $ingestManifestFile An
     * IngestManifestFile data or IngestManifestFile Id
     *
     * @return WindowsAzure\MediaServices\Models\IngestManifestFile
     */
    public function getIngestManifestFile($ingestManifestFile)
    {
        $ingestManifestFileId = Utilities::getEntityId(
            $ingestManifestFile,
            'WindowsAzure\Mediaservices\Models\IngestManifestFile'
        );

        return IngestManifestFile::createFromOptions(
            $this->_getEntity("IngestManifestFiles('{$ingestManifestFileId}')")
        );
    }

    /**
     * Get list of IngestManifestFile.
     *
     * @return array of Models\IngestManifestFile
     */
    public function getIngestManifestFileList()
    {
        $propertyList = $this->_getEntityList('IngestManifestFiles');
        $result       = array();

        foreach ($propertyList as $properties) {
            $result[] = IngestManifestFile::createFromOptions($properties);
        }

        return $result;
    }

    /**
     * Delete IngestManifestFile
     *
     * @param Models\IngestManifestFile|string $ingestManifestFile An
     * IngestManifestFile data or IngestManifestFile Id
     *
     * @return none
     */
    public function deleteIngestManifestFile($ingestManifestFile)
    {
        $ingestManifestFileId = Utilities::getEntityId(
            $ingestManifestFile,
            'WindowsAzure\Mediaservices\Models\IngestManifestFile'
        );

        $this->_deleteEntity("IngestManifestFiles('{$ingestManifestFileId}')");
    }

    /**
     * Create new ContentKey
     *
     * @param Models\ContentKey $contentKey ContentKey data
     *
     * @return Models\ContentKey Created ContentKey
     */
    public function createContentKey($contentKey)
    {
        Validate::isA(
            $contentKey,
            'WindowsAzure\Mediaservices\Models\ContentKey',
            'contentKey'
        );

        return ContentKey::createFromOptions(
            $this->_createEntity($contentKey, 'ContentKeys')
        );
    }

    /**
     * Get list of ContentKey.
     *
     * @return array
     */
    public function getContentKeyList()
    {
        $propertyList = $this->_getEntityList('ContentKeys');
        $result       = array();

        foreach ($propertyList as $properties) {
            $result[] = ContentKey::createFromOptions($properties);
        }

        return $result;
    }

    /**
     * Get ContentKey.
     *
     * @param Models\ContentKey|string $contentKey An ContentKey data or
     * ContentKey Id
     *
     * @return Models\ContentKey
     */
    public function getContentKey($contentKey)
    {
        $contentKeyId = Utilities::getEntityId(
            $contentKey,
            'WindowsAzure\Mediaservices\Models\ContentKey'
        );

        return ContentKey::createFromOptions(
            $this->_getEntity("ContentKeys('{$contentKeyId}')")
        );
    }

    /**
     * Update ContentKey
     *
     * @param Models\ContentKey $contentKey ContentKey data
     *
     * @return Models\ContentKey Updated ContentKey
     */
    public function updateContentKey($contentKey)
    {
        Validate::isA(
            $contentKey,
            'WindowsAzure\Mediaservices\Models\ContentKey',
            'contentKey'
        );

        $this->_updateEntity($contentKey, "ContentKeys('{$contentKey->getId()}')");
    }

    /**
     * Rebind ContentKey.
     *
     * @param Models\ContentKey|string $contentKey      An ContentKey data or
     * ContentKey Id
     *
     * @param string                   $x509Certificate X.509 certificate (with only
     * the public key) that was used to encrypt the clear storage encryption/common
     * protection content keys
     *
     *
     * @return string Content key
     */
    public function rebindContentKey($contentKey, $x509Certificate)
    {
        $contentKeyId = Utilities::getEntityId(
            $contentKey,
            'WindowsAzure\Mediaservices\Models\ContentKey'
        );
        $contentKeyId = urlencode($contentKeyId);

        $x509Certificate = urlencode($x509Certificate);

        $method      = Resources::HTTP_GET;
        $headers     = array();
        $postParams  = array();
        $queryParams = array();
        $statusCode  = Resources::STATUS_OK;
        $path        = "RebindContentKey?id='{$contentKeyId}'" .
            "&x509Certificate='{$x509Certificate}'";

        $response = $this->send(
            $method,
            $headers,
            $postParams,
            $queryParams,
            $path,
            $statusCode
        );

        $key = (string)simplexml_load_string($response->getBody());

        return base64_decode($key);
    }

    /**
     * Delete ContentKey
     *
     * @param Models\ContentKey|string $contentKey An ContentKey data or
     * ContentKey Id
     *
     * @return none
     */
    public function deleteContentKey($contentKey)
    {
        $contentKeyId = Utilities::getEntityId(
            $contentKey,
            'WindowsAzure\Mediaservices\Models\ContentKey'
        );

        $this->_deleteEntity("ContentKeys('{$contentKeyId}')");
    }

    /**
     * The GetProtectionKeyId function retrieves an X.509 certificate thumbprint that
     * is used to ensure that you have the correct certificate installed on your
     * machine when encrypting your user-defined content key.
     *
     * @param int $contentKeyType ContentKey type
     *
     * @return string
     */
    public function getProtectionKeyId($contentKeyType)
    {
        Validate::isInteger($contentKeyType, 'contentKeyType');

        $method      = Resources::HTTP_GET;
        $path        = "GetProtectionKeyId?contentKeyType={$contentKeyType}";
        $headers     = array();
        $postParams  = array();
        $queryParams = array();
        $statusCode  = Resources::STATUS_OK;

        $response = $this->send(
            $method,
            $headers,
            $postParams,
            $queryParams,
            $path,
            $statusCode
        );

        return (string)simplexml_load_string($response->getBody());
    }

    /**
     * Retrieve the specific X.509 certificate that should be used to encrypt your
     * user-defined content key
     *
     * @param string $protectionKeyId ProtectionKey id
     *
     * @return string
     */
    public function getProtectionKey($protectionKeyId)
    {
        Validate::isString($protectionKeyId, 'protectionKeyId');

        $method      = Resources::HTTP_GET;
        $path        = "GetProtectionKey?ProtectionKeyId='{$protectionKeyId}'";
        $headers     = array();
        $postParams  = array();
        $queryParams = array();
        $statusCode  = Resources::STATUS_OK;

        $response = $this->send(
            $method,
            $headers,
            $postParams,
            $queryParams,
            $path,
            $statusCode
        );

        $encoded  = (string)simplexml_load_string($response->getBody());
        $encoded  = implode("\n", str_split($encoded, 76));
        $encoded  = "-----BEGIN CERTIFICATE-----\n" . $encoded;
        $encoded .= "\n-----END CERTIFICATE-----";

        return $encoded;
    }

    /**
     * Create new content key authorization policy
     *
     * @param Models\ContentKeyAuthorizationPolicy $contentKeyAuthorizationPolicy ContentKeyAuthorizationPolicy data
     *
     * @return Models\ContentKeyAuthorizationPolicy Created ContentKeyAuthorizationPolicy
     */
    public function createContentKeyAuthorizationPolicy($contentKeyAuthorizationPolicy)
    {
        Validate::isA($contentKeyAuthorizationPolicy, 'WindowsAzure\MediaServices\Models\ContentKeyAuthorizationPolicy', 'contentKeyAuthorizationPolicy');

        return ContentKeyAuthorizationPolicy::createFromOptions($this->_createEntity($contentKeyAuthorizationPolicy, 'ContentKeyAuthorizationPolicies'));
    }

    /**
     * Get content key authorization policy
     *
     * @param Models\ContentKeyAuthorizationPolicy|string $contentKeyAuthorizationPolicy ContentKeyAuthorizationPolicies data or
     * content key authorization policy Id
     *
     * @return Models\ContentKeyAuthorizationPolicy
     */
    public function getContentKeyAuthorizationPolicy($contentKeyAuthorizationPolicy)
    {
        $contentKeyAuthorizationPolicyId = Utilities::getEntityId(
            $contentKeyAuthorizationPolicy,
            'WindowsAzure\MediaServices\Models\ContentKeyAuthorizationPolicy'
        );

        return ContentKeyAuthorizationPolicy::createFromOptions($this->_getEntity("ContentKeyAuthorizationPolicies('{$contentKeyAuthorizationPolicyId}')"));
    }

    /**
     * Get content key authorization policies list
     *
     * @return array of Models\ContentKeyAuthorizationPolicy
     */
    public function getContentKeyAuthorizationPolicyList()
    {
        $propertyList = $this->_getEntityList("ContentKeyAuthorizationPolicies");
        $result       = array();

        foreach ($propertyList as $properties) {
            $result[] = ContentKeyAuthorizationPolicy::createFromOptions($properties);
        }

        return $result;
    }

    /**
     * Update content key authorization policy
     *
     * @param Models\ContentKeyAuthorizationPolicy $contentKeyAuthorizationPolicy New content key authorization policy data with
     * valid id
     *
     * @return void
     */
    public function updateContentKeyAuthorizationPolicy($contentKeyAuthorizationPolicy)
    {
        Validate::isA($contentKeyAuthorizationPolicy, 'WindowsAzure\MediaServices\Models\ContentKeyAuthorizationPolicy', 'contentKeyAuthorizationPolicy');

        $this->_updateEntity($contentKeyAuthorizationPolicy, "ContentKeyAuthorizationPolicies('{$contentKeyAuthorizationPolicy->getId()}')");
    }

    /**
     * Delete content key authorization policy
     *
     * @param Models\ContentKeyAuthorizationPolicy|string $contentKeyAuthorizationPolicy Models\ContentKeyAuthorizationPolicy data or
     * content key authorization policy Id
     *
     * @return void
     */
    public function deleteContentKeyAuthorizationPolicy($contentKeyAuthorizationPolicy)
    {
        $contentKeyAuthorizationPolicyId = Utilities::getEntityId(
            $contentKeyAuthorizationPolicy,
            'WindowsAzure\MediaServices\Models\ContentKeyAuthorizationPolicy'
        );

        $this->_deleteEntity("ContentKeyAuthorizationPolicies('{$contentKeyAuthorizationPolicyId}')");
    }

    /**
     * Create new content key authorization options
     *
     * @param Models\ContentKeyAuthorizationPolicyOption ContentKeyAuthorizationPolicyOption ContentKeyAuthorizationPolicyOption data
     *
     * @return Models\ContentKeyAuthorizationPolicyOption Created ContentKeyAuthorizationPolicyOption
     */
    public function createContentKeyAuthorizationPolicyOption($contentKeyAuthorizationOptions)
    {
        Validate::isA($contentKeyAuthorizationOptions, 'WindowsAzure\MediaServices\Models\ContentKeyAuthorizationPolicyOption', 'contentKeyAuthorizationOptions');

        return ContentKeyAuthorizationPolicyOption::createFromOptions($this->_createEntity($contentKeyAuthorizationOptions, 'ContentKeyAuthorizationPolicyOptions'));
    }

    /**
     * Get content key authorization option by id
     *
     * @param Models\ContentKeyAuthorizationPolicy|string $contentKeyAuthorizationPolicy ContentKeyAuthorizationPolicies data or
     * content key authorization policy Id
     *
     * @return Models\ContentKeyAuthorizationPolicyOption
     */
    public function getContentKeyAuthorizationPolicyOption($contentKeyAuthorizationOptions)
    {
        $contentKeyAuthorizationOptionsId = Utilities::getEntityId(
            $contentKeyAuthorizationOptions,
            'WindowsAzure\MediaServices\Models\ContentKeyAuthorizationPolicyOption'
        );

        return ContentKeyAuthorizationPolicyOption::createFromOptions($this->_getEntity("ContentKeyAuthorizationPolicyOptions('{$contentKeyAuthorizationOptionsId}')"));
    }
    
    /**
     * Get content key authorization options
     *
     * @return array of Models\ContentKeyAuthorizationPolicyOption
     */
    public function getContentKeyAuthorizationPolicyOptionList()
    {
        $propertyList = $this->_getEntityList("ContentKeyAuthorizationPolicyOptions");
        $result       = array();

        foreach ($propertyList as $properties) {
            $result[] = ContentKeyAuthorizationPolicyOption::createFromOptions($properties);
        }

        return $result;
    }

    /**
     * Update content key authorization options
     *
     * @param Models\ContentKeyAuthorizationPolicyOption $contentKeyAuthorizationOptions New content key authorization options data with
     * valid id
     *
     * @return void
     */
    public function updateContentKeyAuthorizationPolicyOption($contentKeyAuthorizationOptions)
    {
        Validate::isA($contentKeyAuthorizationOptions, 'WindowsAzure\MediaServices\Models\ContentKeyAuthorizationPolicyOption', 'contentKeyAuthorizationOptions');

        $this->_updateEntity($contentKeyAuthorizationOptions, "ContentKeyAuthorizationPolicyOptions('{$contentKeyAuthorizationOptions->getId()}')");
    }

    /**
     * Delete content key authorization policy
     *
     * @param Models\ContentKeyAuthorizationPolicy|string $contentKeyAuthorizationPolicy Models\ContentKeyAuthorizationPolicy data or
     * content key authorization policy Id
     *
     * @return void
     */
    public function deleteContentKeyAuthorizationPolicyOption($contentKeyAuthorizationOptions)
    {
        $contentKeyAuthorizationOptionsId = Utilities::getEntityId(
            $contentKeyAuthorizationOptions,
            'WindowsAzure\MediaServices\Models\ContentKeyAuthorizationPolicyOption'
        );

        $this->_deleteEntity("ContentKeyAuthorizationPolicyOptions('{$contentKeyAuthorizationOptionsId}')");
    }

    /**
     * Get ContentKeyAuthorizationPolicy linked Options
     *
     * @param \WindowsAzure\MediaServices\Models\ContentKeyAuthorizationPolicy|string $asset ContentKeyAuthorizationPolicy data or
     * ContentKeyAuthorizationPolicy Id
     *
     * @return array
     */
    public function getContentKeyAuthorizationPolicyLinkedOptions($policy)
    {
        $policyId = Utilities::getEntityId(
            $policy,
            'WindowsAzure\MediaServices\Models\ContentKeyAuthorizationPolicy'
        );

        $propertyList = $this->_getEntityList("ContentKeyAuthorizationPolicies('{$policyId}')/Options");
        $result       = array();

        foreach ($propertyList as $properties) {
            $result[] = ContentKeyAuthorizationPolicyOption::createFromOptions($properties);
        }

        return $result;
    }

    /**
     * Link ContentKeyAuthorizationPolicyOption to ContentKeyAuthorizationPolicy
     *
     * @param Models\ContentKeyAuthorizationPolicyOption|string        $options        ContentKeyAuthorizationPolicyOption to link a ContentKeyAuthorizationPolicy or ContentKeyAuthorizationPolicyOption id
     *
     * @param Models\ContentKeyAuthorizationPolicy|string               $policy         ContentKeyAuthorizationPolicy to link or ContentKeyAuthorizationPolicy id
     *
     * @return void
     */
    public function linkOptionToContentKeyAuthorizationPolicy($options, $policy)
    {
        $optionsId = Utilities::getEntityId(
            $options,
            'WindowsAzure\MediaServices\Models\ContentKeyAuthorizationPolicyOption'
        );
        $optionsId = urlencode($optionsId);

        $policyId = Utilities::getEntityId(
            $policy,
            'WindowsAzure\MediaServices\Models\ContentKeyAuthorizationPolicy'
        );

        $policyId = urlencode($policyId);

        $contentWriter = new \XMLWriter();
        $contentWriter->openMemory();
        $contentWriter->writeElementNS(
            'd',
            'uri',
            Resources::DS_XML_NAMESPACE,
            $this->getUri() . "ContentKeyAuthorizationPolicyOptions('{$optionsId}')"
        );

        $method      = Resources::HTTP_POST;
        $path        = "ContentKeyAuthorizationPolicies('{$policyId}')/\$links/Options";
        $headers     = array(
            Resources::CONTENT_TYPE => Resources::XML_CONTENT_TYPE,
        );
        $postParams  = array();
        $queryParams = array();
        $statusCode  = Resources::STATUS_NO_CONTENT;
        $body        = $contentWriter->outputMemory();

        $this->send(
            $method,
            $headers,
            $postParams,
            $queryParams,
            $path,
            $statusCode,
            $body
        );
    }

    /**
     * Remove ContentKeyAuthorizationPolicyOption from ContentKeyAuthorizationPolicy
     *
     * @param Models\ContentKeyAuthorizationPolicyOption|string        $options        ContentKeyAuthorizationPolicyOption to remove from ContentKeyAuthorizationPolicy or ContentKeyAuthorizationPolicyOption id
     *
     * @param Models\ContentKeyAuthorizationPolicy|string               $policy         ContentKeyAuthorizationPolicy to remove or ContentKeyAuthorizationPolicy id
     *
     * @return void
     */
    public function removeOptionsFromContentKeyAuthorizationPolicy($options, $policy)
    {
        $optionsId = Utilities::getEntityId(
                    $options,
                    'WindowsAzure\MediaServices\Models\ContentKeyAuthorizationPolicyOption'
                );

        $policyId = Utilities::getEntityId(
            $policy,
            'WindowsAzure\MediaServices\Models\ContentKeyAuthorizationPolicy'
        );

        $method      = Resources::HTTP_DELETE;
        $path        = "ContentKeyAuthorizationPolicies('{$policyId}')/\$links/Options('{$optionsId}')";
        $headers     = array();
        $postParams  = array();
        $queryParams = array();
        $statusCode  = Resources::STATUS_NO_CONTENT;

        $this->send(
            $method,
            $headers,
            $postParams,
            $queryParams,
            $path,
            $statusCode
        );
    }

    /**
     * Create new asset delivery policy
     *
     * @param Models\AssetDeliveryPolicy $assetDeliveryPolicy AssetDeliveryPolicy data
     *
     * @return Models\AssetDeliveryPolicy Created AssetDeliveryPolicy
     */
    public function createAssetDeliveryPolicy($assetDeliveryPolicy)
    {
        Validate::isA($assetDeliveryPolicy, 'WindowsAzure\MediaServices\Models\AssetDeliveryPolicy', 'assetDeliveryPolicy');

        return AssetDeliveryPolicy::createFromOptions($this->_createEntity($assetDeliveryPolicy, 'AssetDeliveryPolicies'));
    }

    /**
     * Get asset delivery policy
     *
     * @return Models\AssetDeliveryPolicy
     */
    public function getAssetDeliveryPolicy($assetDeliveryPolicy)
    {
        $assetDeliveryPolicyId = Utilities::getEntityId(
            $assetDeliveryPolicy,
            'WindowsAzure\MediaServices\Models\ContentKeyAuthorizationPolicy'
        );

        return AssetDeliveryPolicy::createFromOptions($this->_getEntity("AssetDeliveryPolicies('{$assetDeliveryPolicyId}')"));
    }

    /**
     * Get asset delivery policies list
     *
     * @return array of Models\AssetDeliveryPolicy
     */
    public function getAssetDeliveryPolicyList()
    {
        $propertyList = $this->_getEntityList("AssetDeliveryPolicies");
        $result       = array();

        foreach ($propertyList as $properties) {
            $result[] = AssetDeliveryPolicy::createFromOptions($properties);
        }

        return $result;
    }

    /**
     * Update asset delivery policy
     *
     * @param Models\AssetDeliveryPolicy $assetDeliveryPolicy New asset delivery policy data with
     * valid id
     *
     * @return void
     */
    public function updateAssetDeliveryPolicy($assetDeliveryPolicy)
    {
        Validate::isA($assetDeliveryPolicy, 'WindowsAzure\MediaServices\Models\AssetDeliveryPolicy', 'assetDeliveryPolicy');

        $this->_updateEntity($assetDeliveryPolicy, "AssetDeliveryPolicies('{$assetDeliveryPolicy->getId()}')");
    }

    /**
     * Delete asset delivery policy
     *
     * @param Models\AssetDeliveryPolicy|string $assetDeliveryPolicy Models\AssetDeliveryPolicy data or
     * asset delivery policy Id
     *
     * @return void
     */
    public function deleteAssetDeliveryPolicy($assetDeliveryPolicy)
    {
        $assetDeliveryPolicyId = Utilities::getEntityId(
            $assetDeliveryPolicy,
            'WindowsAzure\MediaServices\Models\AssetDeliveryPolicy'
        );

        $this->_deleteEntity("AssetDeliveryPolicies('{$assetDeliveryPolicyId}')");
    }

    /**
     * Get AssetDeliveryPolicy list linked to an Asset 
     *
     * @param \WindowsAzure\MediaServices\Models\Asset|string $asset Asset data or
     * Asset Id to retrieve the linked delivery policies.
     *
     * @return array
     */
    public function getAssetLinkedDeliveryPolicy($asset)
    {
        $assetId = Utilities::getEntityId(
            $asset,
            'WindowsAzure\MediaServices\Models\Asset'
        );

        $propertyList = $this->_getEntityList("Assets('{$assetId}')/DeliveryPolicies");
        $result       = array();                                   

        foreach ($propertyList as $properties) {
            $result[] = AssetDeliveryPolicy::createFromOptions($properties);
        }

        return $result;
    }

    /**
     * Link AssetDeliveryPolicy to Asset
     *
     * @param Models\Asset|string      $asset      Asset to link a AssetDeliveryPolicy or
     * Asset id
     *
     * @param Models\AssetDeliveryPolicy|string $policy DeliveryPolicy to link or
     * DeliveryPolicy id
     *
     * @return void
     */
    public function linkDeliveryPolicyToAsset($asset, $policy)
    {
        $assetId = Utilities::getEntityId(
            $asset,
            'WindowsAzure\MediaServices\Models\Asset'
        );
        $assetId = urlencode($assetId);

        $policyId = Utilities::getEntityId(
            $policy,
            'WindowsAzure\MediaServices\Models\AssetDeliveryPolicy'
        );

        $policyId = urlencode($policyId);

        $contentWriter = new \XMLWriter();
        $contentWriter->openMemory();
        $contentWriter->writeElementNS(
            'data',
            'uri',
            Resources::DS_XML_NAMESPACE,
            $this->getUri() . "AssetDeliveryPolicies('{$policyId}')"
        );

        $method      = Resources::HTTP_POST;
        $path        = "Assets('{$assetId}')/\$links/DeliveryPolicies";
        $headers     = array(
            Resources::CONTENT_TYPE => Resources::XML_CONTENT_TYPE,
        );
        $postParams  = array();
        $queryParams = array();
        $statusCode  = Resources::STATUS_NO_CONTENT;
        $body        = $contentWriter->outputMemory();

        $this->send(
            $method,
            $headers,
            $postParams,
            $queryParams,
            $path,
            $statusCode,
            $body
        );
    }

    /**
     * Remove AssetDeliveryPolicy from Asset
     *
     * @param Models\Asset|string      $asset      Asset to remove a AssetDeliveryPolicy or
     * Asset id
     *
     * @param Models\AssetDeliveryPolicy|string $contentKey DeliveryPolicy to remove or
     * DeliveryPolicy id
     *
     * @return void
     */
    public function removeDeliveryPolicyFromAsset($asset, $policy)
    {
        $assetId = Utilities::getEntityId(
            $asset,
            'WindowsAzure\MediaServices\Models\Asset'
        );

        $policyId = Utilities::getEntityId(
            $policy,
            'WindowsAzure\MediaServices\Models\AssetDeliveryPolicy'
        );

        $method      = Resources::HTTP_DELETE;
        $path        = "Assets('{$assetId}')/\$links/DeliveryPolicies('{$policyId}')";
        $headers     = array();
        $postParams  = array();
        $queryParams = array();
        $statusCode  = Resources::STATUS_NO_CONTENT;

        $this->send(
            $method,
            $headers,
            $postParams,
            $queryParams,
            $path,
            $statusCode
        );
    }

    /**
     * Link AssetDeliveryPolicy to Asset
     *
     * @param Models\Asset|string      $asset      Asset to link a AssetDeliveryPolicy or
     * Asset id
     *
     * @param Models\AssetDeliveryPolicy|string $policy DeliveryPolicy to link or
     * DeliveryPolicy id
     *
     * //@return void
     */
    public function getKeyDeliveryUrl($contentKey, $contentKeyDeliveryType)
    {
        $contentKeyId = Utilities::getEntityId(
            $contentKey,
            'WindowsAzure\MediaServices\Models\ContentKey'
        );
        $contentKeyId = urlencode($contentKeyId);
        
        $body        = json_encode(['keyDeliveryType' => $contentKeyDeliveryType]);

        $method      = Resources::HTTP_POST;
        $path        = "ContentKeys('{$contentKeyId}')/GetKeyDeliveryUrl";
        $headers     = array(
            Resources::CONTENT_TYPE => Resources::JSON_CONTENT_TYPE,
        );
        $postParams  = array();
        $queryParams = array();
        $statusCode  = Resources::STATUS_OK;

        $response = $this->send(
            $method,
            $headers,
            $postParams,
            $queryParams,
            $path,
            $statusCode,
            $body
        );

        return simplexml_load_string($response->getBody())->__toString();

    }

    /**
     * Get encoding reserved units settings.
     *
     *
     * @return Models\EncodingReservedUnit
     */
    public function getEncodingReservedUnit()
    {
        $units = $this->_getEntityList("EncodingReservedUnitTypes");
        if (isset($units) && count($units) > 0) {
            return EncodingReservedUnit::createFromOptions($units[0]);
        }
        return null;        
    }

    /**
     * Update encoding reserved units settings.
     *
     * @param Models\EncodingReservedUnit $encodingReservedUnit Update data
     * valid idli
     *
     * @return void
     */
    public function updateEncodingReservedUnit($encodingReservedUnit)
    {
        Validate::isA($encodingReservedUnit, 'WindowsAzure\MediaServices\Models\EncodingReservedUnit', 'encodingReservedUnit');
        $accountID = $encodingReservedUnit->getAccountId();
        $encodingReservedUnit->setAccountId(null); // never send account Id
        $this->_updateEntity($encodingReservedUnit, "EncodingReservedUnitTypes(guid'{$accountID}')");
        $encodingReservedUnit->setAccountId($accountID);
    }
}
