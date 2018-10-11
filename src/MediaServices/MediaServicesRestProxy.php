<?php

/**
 * LICENSE: Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * http://www.apache.org/licenses/LICENSE-2.0.
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
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace WindowsAzure\MediaServices;

use MicrosoftAzure\Storage\Blob\Models\BlobType;
use MicrosoftAzure\Storage\Table\Models\Entity;
use WindowsAzure\Common\Internal\Utilities;
use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\Common\Internal\Validate;
use WindowsAzure\Common\Internal\Http\HttpCallContext;
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
use WindowsAzure\MediaServices\Models\Operation;
use WindowsAzure\MediaServices\Models\OperationState;
use WindowsAzure\MediaServices\Models\Channel;
use WindowsAzure\MediaServices\Models\Program;
use Psr\Http\Message\ResponseInterface;

/**
 * This class constructs HTTP requests and receive HTTP responses for media services
 * service layer.
 *
 * @category  Microsoft
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @version   Release: 0.5.0_2016-11
 *
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class MediaServicesRestProxy extends ServiceRestProxy implements IMediaServices
{
    const BLOCK_ID_PREFIX = 'block-';
    const MAX_BLOCK_SIZE = 4194304; // 4 Mb
    const BLOCK_ID_PADDING = 6;

    /**
     * Headers used in batch requests.
     *
     * @var array
     */
    private $_batchHeaders = [
        Resources::DATA_SERVICE_VERSION => Resources::MEDIA_SERVICES_DATA_SERVICE_VERSION_VALUE,
        Resources::MAX_DATA_SERVICE_VERSION => Resources::MEDIA_SERVICES_MAX_DATA_SERVICE_VERSION_VALUE,
        Resources::ACCEPT_HEADER => Resources::ACCEPT_HEADER_VALUE,
        Resources::CONTENT_TYPE => Resources::XML_ATOM_CONTENT_TYPE,
    ];

    /**
     * Sends HTTP request with the specified parameters.
     *
     * @param string $method         HTTP method used in the request
     * @param array  $headers        HTTP headers
     * @param array  $queryParams    URL query parameters
     * @param array  $postParameters The HTTP POST parameters
     * @param string $path           URL path
     * @param int    $statusCode     Expected status code received in the response
     * @param string $body           Request body
     *
     * @return ResponseInterface
     */
    protected function sendHttp(
        $method,
        array $headers,
        array $queryParams,
        array $postParameters,
        $path,
        $statusCode,
        $body = Resources::EMPTY_STRING
    ) {
        // Add redirect to expected results
        if (!is_array($statusCode)) {
            $statusCode = [$statusCode];
        }
        array_push($statusCode, Resources::STATUS_MOVED_PERMANENTLY);

        $response = parent::sendHttp(
            $method,
            $headers,
            $queryParams,
            $postParameters,
            $path,
            $statusCode,
            $body
        );

        // Set new URI endpoint if we get redirect response and perform query
        if ($response->getStatusCode() == Resources::STATUS_MOVED_PERMANENTLY) {
            $responseHeaders = HttpClient::getResponseHeaders($response);
            $this->setUri($responseHeaders['location']);
            array_pop($statusCode);

            $response = parent::sendHttp(
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
     * Wraps media services entity with Atom entry.
     *
     * @param object $entity Media services entity
     * @param array  $links  AtomLinks to other media services entities
     *
     * @return string XML string representing Atom Entry
     */
    protected function wrapAtomEntry($entity, array $links = null)
    {
        Validate::notNull($entity, 'entity');

        $content = new Content();
        $content->setType(Resources::XML_CONTENT_TYPE);
        $content->setText(ContentPropertiesSerializer::serialize($entity));

        $atomEntry = new Entry();
        $atomEntry->setContent($content);

        if ($links) {
            $atomEntry->setLink($links);
        }

        $xmlWriter = new \XMLWriter();
        $xmlWriter->openMemory();
        $atomEntry->writeXml($xmlWriter);

        return $xmlWriter->outputMemory();
    }

    /**
     * Extract media service entity from Atom Entry object.
     *
     * @param Entry $entry Atom Entry containing properties of media services object
     *
     * @return array of properties name => value
     */
    protected function getPropertiesFromAtomEntry(Entry $entry)
    {
        $result = [];
        $content = $entry->getContent();
        if (!empty($content)) {
            $result = ContentPropertiesSerializer::unserialize(
                $content->getXml()->children(Resources::DSM_XML_NAMESPACE)
            );
        }

        return $result;
    }

    /**
     * Get array of properties of atom entities passed via feed or single entry.
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
            $entries = [$entry];
        } else {
            $feed = new Feed();
            $feed->parseXml($xmlString);
            $entries = $feed->getEntry();
        }

        $result = [];
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
     * Create entity.
     *
     * @param object $entity Entity data
     * @param string $path   REST path
     * @param array  $links  AtomLinks to other media services entities
     *
     * @return array Created entity data
     */
    private function _createEntity($entity, $path, array $links = null)
    {
        $method = Resources::HTTP_POST;
        $headers = [];
        $postParams = [];
        $queryParams = [];
        $statusCode = Resources::STATUS_CREATED;
        $body = $this->wrapAtomEntry($entity, $links);

        $response = $this->sendHttp(
            $method,
            $headers,
            $queryParams,
            $postParams,
            $path,
            $statusCode,
            $body
        );

        $entry = new Entry();
        $entry->parseXml($response->getBody());

        return $this->getPropertiesFromAtomEntry($entry);
    }

    /**
     * Send live operation (Channel, Program or Streaming Endpoint).
     *
     * @param object $entity     Entity data
     * @param string $path       REST path
     * @param string $method     HTTP method,
     * @param int    $statusCode HTTP status code,
     * @param array  $headers    HTTP headers
     *
     * @return Operation Created entity data
     */
    private function _sendOperation(
        $entity,
        $path,
        $method = Resources::HTTP_POST,
        $statusCode = Resources::STATUS_ACCEPTED,
        array $headers = [])
    {
        $postParams = [];
        $queryParams = [];

        $body = Resources::EMPTY_STRING;
        if (!is_string($entity) && !is_null($entity)) {
            $body = $this->wrapAtomEntry($entity, null);
        } elseif (is_string($entity)) {
            $body = $entity;
        }

        $response = $this->sendHttp(
            $method,
            $headers,
            $queryParams,
            $postParams,
            $path,
            $statusCode,
            $body
        );

        $responseBody = (string) $response->getBody();
        if (!empty($responseBody)) {
            $entry = new Entry();
            $entry->parseXml($responseBody);
            $entity = $this->getPropertiesFromAtomEntry($entry);
        } else {
            $entity = null;
        }

        $options = [];
        $headers = HttpClient::getResponseHeaders($response);

        // fill the operation identifier if present
        if (isset($headers['operation-id'])) {
            $options['Id'] = $headers['operation-id'];
        }

        // fill the target entity identifier if present
        if (!is_null($entity) && isset($entity['Id'])) {
            $options['TargetEntityId'] = $entity['Id'];
        }

        // set the operation to Succeeded or InProgress depending on the response status code
        if ($response->getStatusCode() == Resources::STATUS_NO_CONTENT) {
            $options['State'] = OperationState::Succeeded;
        } else {
            $options['State'] = OperationState::InProgress;
        }

        return Operation::createFromOptions($options);
    }

    /**
     * Get entity from Azure.
     *
     * @param string $path REST path
     *
     * @return Entity[]
     */
    private function _getEntity($path)
    {
        $method = Resources::HTTP_GET;
        $headers = [];
        $postParams = [];
        $queryParams = [];
        $statusCode = Resources::STATUS_OK;

        $response = $this->sendHttp(
            $method,
            $headers,
            $queryParams,
            $postParams,
            $path,
            $statusCode
        );

        $entry = new Entry();
        $entry->parseXml($response->getBody());

        return $this->getPropertiesFromAtomEntry($entry);
    }

    /**
     * Get entity list.
     *
     * @param string $path        REST path
     * @param array  $queryParams URL query parameters. An example is $queryParams = ['$top' => 20, '$skip' => 40] to
     *                            support paging
     *
     * @return Entity[]
     */
    private function _getEntityList($path, array $queryParams = [])
    {
        $method = Resources::HTTP_GET;
        $headers = [];
        $postParams = [];
        $statusCode = Resources::STATUS_OK;

        $response = $this->sendHttp(
            $method,
            $headers,
            $queryParams,
            $postParams,
            $path,
            $statusCode
        );

        return $this->getEntryList($response->getBody());
    }

    /**
     * Update entity.
     *
     * @param object $entity Entity data
     * @param string $path   REST path
     */
    private function _updateEntity($entity, $path)
    {
        $method = Resources::HTTP_MERGE;
        $headers = [];
        $postParams = [];
        $queryParams = [];
        $statusCode = Resources::STATUS_NO_CONTENT;
        $body = $this->wrapAtomEntry($entity);

        $this->sendHttp(
            $method,
            $headers,
            $queryParams,
            $postParams,
            $path,
            $statusCode,
            $body
        );
    }

    /**
     * Delete entity.
     *
     * @param string $path REST path
     */
    private function _deleteEntity($path)
    {
        $method = Resources::HTTP_DELETE;
        $headers = [];
        $postParams = [];
        $queryParams = [];
        $statusCode = Resources::STATUS_NO_CONTENT;

        $this->sendHttp(
            $method,
            $headers,
            $queryParams,
            $postParams,
            $path,
            $statusCode
        );
    }

    /**
     * Create new asset.
     *
     * @param Asset $asset Asset data
     *
     * @return Asset Created asset
     */
    public function createAsset(Asset $asset)
    {
        return Asset::createFromOptions($this->_createEntity($asset, 'Assets'));
    }

    /**
     * Get asset.
     *
     * @param Asset|string $asset Asset data or asset Id
     *
     * @return Asset
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
     * Get asset list.
     *
     * @param array $queryParams. An example is $queryParams = ['$top' => 20, '$skip' => 40] to support paging
     *
     * @return Asset[]
     */
    public function getAssetList(array $queryParams = [])
    {
        $propertyList = $this->_getEntityList('Assets', $queryParams);
        $result = [];

        foreach ($propertyList as $properties) {
            $result[] = Asset::createFromOptions($properties);
        }

        return $result;
    }

    /**
     * Get asset locators.
     *
     * @param Asset|string $asset Asset data or asset Id
     *
     * @return Locator[]
     */
    public function getAssetLocators($asset)
    {
        $assetId = Utilities::getEntityId(
            $asset,
            'WindowsAzure\MediaServices\Models\Asset'
        );

        $propertyList = $this->_getEntityList("Assets('{$assetId}')/Locators");
        $result = [];

        foreach ($propertyList as $properties) {
            $result[] = Locator::createFromOptions($properties);
        }

        return $result;
    }

    /**
     * Get asset ContentKeys.
     *
     * @param Asset|string $asset Asset data or asset Id
     *
     * @return ContentKey[]
     */
    public function getAssetContentKeys($asset)
    {
        $assetId = Utilities::getEntityId(
            $asset,
            'WindowsAzure\MediaServices\Models\Asset'
        );

        $propertyList = $this->_getEntityList("Assets('{$assetId}')/ContentKeys");
        $result = [];

        foreach ($propertyList as $properties) {
            $result[] = ContentKey::createFromOptions($properties);
        }

        return $result;
    }

    /**
     * Get parent assets of asset.
     *
     * @param Asset|string $asset Asset data or asset Id
     *
     * @return Asset[]
     */
    public function getAssetParentAssets($asset)
    {
        $assetId = Utilities::getEntityId(
            $asset,
            'WindowsAzure\MediaServices\Models\Asset'
        );

        $propertyList = $this->_getEntityList("Assets('{$assetId}')/ParentAssets");
        $result = [];

        foreach ($propertyList as $properties) {
            $result[] = Asset::createFromOptions($properties);
        }

        return $result;
    }

    /**
     * Get assetFiles of asset.
     *
     * @param Asset|string $asset Asset data or asset Id
     *
     * @return AssetFile[]
     */
    public function getAssetAssetFileList($asset)
    {
        $assetId = Utilities::getEntityId(
            $asset,
            'WindowsAzure\MediaServices\Models\Asset'
        );

        $propertyList = $this->_getEntityList("Assets('{$assetId}')/Files");
        $result = [];

        foreach ($propertyList as $properties) {
            $result[] = AssetFile::createFromOptions($properties);
        }

        return $result;
    }

    /**
     * Get storage account of asset.
     *
     * @param Asset|string $asset Asset data or asset Id
     *
     * @return StorageAccount
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
     * Update asset.
     *
     * @param Asset $asset New asset data with valid id
     */
    public function updateAsset(Asset $asset)
    {
        $this->_updateEntity($asset, "Assets('{$asset->getId()}')");
    }

    /**
     * Delete asset.
     *
     * @param Asset|string $asset Asset data or asset Id
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
     * Link ContentKey to Asset.
     *
     * @param Asset|string      $asset      Asset to link a ContentKey or Asset id
     * @param ContentKey|string $contentKey ContentKey to link or ContentKey id
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
            $this->getUri()."ContentKeys('{$contentKeyId}')"
        );

        $method = Resources::HTTP_POST;
        $path = "Assets('{$assetId}')/\$links/ContentKeys";
        $headers = [
            Resources::CONTENT_TYPE => Resources::XML_CONTENT_TYPE,
        ];
        $postParams = [];
        $queryParams = [];
        $statusCode = Resources::STATUS_NO_CONTENT;
        $body = $contentWriter->outputMemory();

        $this->sendHttp(
            $method,
            $headers,
            $queryParams,
            $postParams,
            $path,
            $statusCode,
            $body
        );
    }

    /**
     * Remove ContentKey from Asset.
     *
     * @param Asset|string      $asset      Asset to remove a ContentKey or
     *                                      Asset id
     * @param ContentKey|string $contentKey ContentKey to remove or
     *                                      ContentKey id
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

        $method = Resources::HTTP_DELETE;
        $path = "Assets('{$assetId}')/\$links/ContentKeys('{$contentKeyId}')";
        $headers = [];
        $postParams = [];
        $queryParams = [];
        $statusCode = Resources::STATUS_NO_CONTENT;

        $this->sendHttp(
            $method,
            $headers,
            $queryParams,
            $postParams,
            $path,
            $statusCode
        );
    }

    /**
     * Create new access policy.
     *
     * @param AccessPolicy $accessPolicy Access policy data
     *
     * @return AccessPolicy
     */
    public function createAccessPolicy(AccessPolicy $accessPolicy)
    {
        return AccessPolicy::createFromOptions(
            $this->_createEntity($accessPolicy, 'AccessPolicies')
        );
    }

    /**
     * Get AccessPolicy.
     *
     * @param AccessPolicy|string $accessPolicy AccessPolicy data or AccessPolicy Id
     *
     * @return AccessPolicy
     */
    public function getAccessPolicy($accessPolicy)
    {
        $accessPolicyId = Utilities::getEntityId(
            $accessPolicy,
            'WindowsAzure\MediaServices\Models\AccessPolicy'
        );

        return AccessPolicy::createFromOptions(
            $this->_getEntity("AccessPolicies('{$accessPolicyId}')")
        );
    }

    /**
     * Get list of AccessPolicies.
     *
     * @return AccessPolicy[]
     */
    public function getAccessPolicyList()
    {
        $propertyList = $this->_getEntityList('AccessPolicies');
        $result = [];

        foreach ($propertyList as $properties) {
            $result[] = AccessPolicy::createFromOptions($properties);
        }

        return $result;
    }

    /**
     * Delete access policy.
     *
     * @param AccessPolicy|string $accessPolicy Access policy data or access policy Id
     */
    public function deleteAccessPolicy($accessPolicy)
    {
        $accessPolicyId = Utilities::getEntityId(
            $accessPolicy,
            'WindowsAzure\MediaServices\Models\AccessPolicy'
        );

        $this->_deleteEntity("AccessPolicies('{$accessPolicyId}')");
    }

    /**
     * Create new locator.
     *
     * @param Locator $locator Locator data
     *
     * @return Locator
     */
    public function createLocator(Locator $locator)
    {
        return Locator::createFromOptions(
            $this->_createEntity($locator, 'Locators')
        );
    }

    /**
     * Get Locator.
     *
     * @param Locator|string $locator Locator data or locator Id
     *
     * @return Locator
     */
    public function getLocator($locator)
    {
        $locatorId = Utilities::getEntityId(
            $locator,
            'WindowsAzure\MediaServices\Models\Locator'
        );

        return Locator::createFromOptions(
            $this->_getEntity("Locators('{$locatorId}')")
        );
    }

    /**
     * Get Locator access policy.
     *
     * @param Locator|string $locator Locator data or locator Id
     *
     * @return AccessPolicy
     */
    public function getLocatorAccessPolicy($locator)
    {
        $locatorId = Utilities::getEntityId(
            $locator,
            'WindowsAzure\MediaServices\Models\Locator'
        );

        return AccessPolicy::createFromOptions(
            $this->_getEntity("Locators('{$locatorId}')/AccessPolicy")
        );
    }

    /**
     * Get Locator asset.
     *
     * @param Locator|string $locator Locator data or locator Id
     *
     * @return Asset
     */
    public function getLocatorAsset($locator)
    {
        $locatorId = Utilities::getEntityId(
            $locator,
            'WindowsAzure\MediaServices\Models\Locator'
        );

        return Asset::createFromOptions(
            $this->_getEntity("Locators('{$locatorId}')/Asset")
        );
    }

    /**
     * Get asset locators.
     *
     * @param Asset|string $asset Asset or AssetId
     *
     * @return Locator[]
     */
    public function getAssetLocatorList($asset)
    {
        $assetId = Utilities::getEntityId(
            $asset,
            'WindowsAzure\MediaServices\Models\Asset'
        );

        $locatorsList = $this->_getEntityList("Assets('{$assetId}')/Locators");

        $result = [];

        foreach ($locatorsList as $locator) {
            $result[] = Locator::createFromOptions($locator);
        }

        return $result;
    }

    /**
     * Get list of Locators.
     *
     * @return Locator[]
     */
    public function getLocatorList(array $queryParams = [])
    {
        $propertyList = $this->_getEntityList('Locators', $queryParams);
        $result = [];

        foreach ($propertyList as $properties) {
            $result[] = Locator::createFromOptions($properties);
        }

        return $result;
    }

    /**
     * Update locator.
     *
     * @param Locator $locator New locator data with valid id
     */
    public function updateLocator(Locator $locator)
    {
        $this->_updateEntity($locator, "Locators('{$locator->getId()}')");
    }

    /**
     * Delete locator.
     *
     * @param Locator|string $locator Asset data or asset Id
     */
    public function deleteLocator($locator)
    {
        $locatorId = Utilities::getEntityId(
            $locator,
            'WindowsAzure\MediaServices\Models\Locator'
        );

        $this->_deleteEntity("Locators('{$locatorId}')");
    }

    /**
     * Generate file info for all files in asset.
     *
     * @param Asset|string $asset Asset data or asset Id
     */
    public function createFileInfos($asset)
    {
        $assetId = Utilities::getEntityId(
            $asset,
            'WindowsAzure\MediaServices\Models\Asset'
        );
        $assetIdEncoded = urlencode($assetId);

        $method = Resources::HTTP_GET;
        $headers = [];
        $postParams = [];
        $queryParams = [];
        $path = "CreateFileInfos?assetid='{$assetIdEncoded}'";
        $statusCode = Resources::STATUS_NO_CONTENT;

        $this->sendHttp(
            $method,
            $headers,
            $queryParams,
            $postParams,
            $path,
            $statusCode
        );
    }

    /**
     * Get asset file.
     *
     * @param AssetFile|string $assetFile AssetFile data or assetFile Id
     *
     * @return AssetFile
     */
    public function getAssetFile($assetFile)
    {
        $assetFileId = Utilities::getEntityId(
            $assetFile,
            'WindowsAzure\MediaServices\Models\AssetFile'
        );

        return AssetFile::createFromOptions(
            $this->_getEntity("Files('{$assetFileId}')")
        );
    }

    /**
     * Get list of all asset files.
     *
     * @return AssetFile[]
     */
    public function getAssetFileList()
    {
        $propertyList = $this->_getEntityList('Files');
        $result = [];

        foreach ($propertyList as $properties) {
            $result[] = AssetFile::createFromOptions($properties);
        }

        return $result;
    }

    /**
     * Update asset file.
     *
     * @param AssetFile $assetFile New AssetFile data
     */
    public function updateAssetFile(AssetFile $assetFile)
    {
        $this->_updateEntity($assetFile, "Files('{$assetFile->getId()}')");
    }

    /**
     * Upload asset file to storage.
     *
     * @param Locator           $locator Write locator for file upload
     * @param string            $name    Uploading filename
     * @param string | resource $file    Uploading content or file handle
     */
    public function uploadAssetFile(Locator $locator, $name, $file)
    {
        Validate::isString($name, 'name');
        Validate::notNull($file, 'file');

        $urlFile = $locator->getBaseUri().'/'.$name;
        $url = $urlFile.$locator->getContentAccessComponent();

        if (is_resource($file)) {
            $this->_uploadAssetFileFromResource($url, $file);
        } else {
            $this->_uploadAssetFileFromString($url, $file);
        }
    }

    /**
     * Download asset file to a local path.
     *
     * @param AssetFile $assetFile Asset file to download
     * @param Locator   $locator   Read locator for downloading the asset file
     * @param string    $path      Destination root path
     *
     * @return int
     */
    public function downloadAssetFile(AssetFile $assetFile, Locator $locator, $path)
    {
        Validate::isString($path, 'path');
        Validate::pathExists($path);

        $downloadUrl = $locator->getBaseUri().'/'.$assetFile->getName().$locator->getContentAccessComponent();
        $filePath = $path.'/'.$assetFile->getName();

        return file_put_contents($filePath, fopen($downloadUrl, 'r'));
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
        return base64_encode(self::BLOCK_ID_PREFIX.str_pad($blockCount, self::BLOCK_ID_PADDING, '0', STR_PAD_LEFT));
    }

    /***
     * Upload asset file from resource
     *
     * @param string   $url      Url for upload
     * @param resource $resource Handle of uploading file
     */
    private function _uploadAssetFileFromResource($url, $resource)
    {
        $blockSize = self::MAX_BLOCK_SIZE;
        $blockIds = [];

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
     */
    private function _uploadAssetFileFromString($url, $body)
    {
        $blockSize = self::MAX_BLOCK_SIZE;
        $blockIds = [];

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
     */
    private function _uploadAssetFileSingle($url, $body)
    {
        $method = Resources::HTTP_PUT;
        $filters = [];
        $statusCode = Resources::STATUS_CREATED;
        $headers = [
            Resources::CONTENT_TYPE => Resources::BINARY_FILE_TYPE,
            Resources::X_MS_VERSION => Resources::STORAGE_API_LATEST_VERSION,
            Resources::X_MS_BLOB_TYPE => BlobType::BLOCK_BLOB,
        ];

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
     */
    private function _uploadBlock($url, $blockId, $blockContent)
    {
        $baseUrl = new Url($url);
        $baseUrl->setQueryVariable(Resources::QP_COMP, 'block');
        $baseUrl->setQueryVariable(Resources::QP_BLOCKID, $blockId);

        $method = Resources::HTTP_PUT;
        $filters = [];
        $statusCode = Resources::STATUS_CREATED;

        $headers = [
           Resources::CONTENT_TYPE => Resources::BINARY_FILE_TYPE,
           Resources::X_MS_VERSION => Resources::STORAGE_API_LATEST_VERSION,
           Resources::X_MS_BLOB_TYPE => BlobType::BLOCK_BLOB,
        ];

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
     */
    private function _commitBlocks($url, $blockIds)
    {
        $baseUrl = new Url($url);
        $baseUrl->setQueryVariable(Resources::QP_COMP, 'blocklist');

        $xml = new \XMLWriter();

        $xml->openMemory();
        $xml->setIndent(true);

        $xml->startDocument('1.0', 'UTF-8');

        $xml->startElement('BlockList');

        foreach ($blockIds as $blockId) {
            $xml->writeElement('Latest', $blockId);
        }

        $xml->endElement();

        $xml->endDocument();

        $xmlContent = $xml->outputMemory();

        $method = Resources::HTTP_PUT;
        $filters = [];
        $statusCode = Resources::STATUS_CREATED;
        $headers = [
            Resources::CONTENT_TYPE => Resources::BINARY_FILE_TYPE,
            Resources::X_MS_VERSION => Resources::STORAGE_API_LATEST_VERSION,
        ];

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
     * @param Job     $job         Job data
     * @param Asset[] $inputAssets Input assets list
     *
     * @return HttpCallContext
     */
    private function _getCreateEmptyJobContext(Job $job, array $inputAssets)
    {
        /** @var AtomLink[] $atomLinks */
        $atomLinks = [];
        foreach ($inputAssets as $inputAsset) {
            Validate::isA(
                $inputAsset,
                'WindowsAzure\MediaServices\Models\Asset',
                'inputAssets'
            );

            $href = urlencode($inputAsset->getId());

            $atomLink = new AtomLink();
            $atomLink->setHref($this->getUri()."Assets('{$href}')");
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
     * Create task HTTP call context.
     *
     * @param Task $task Task object to be created
     *
     * @return HttpCallContext
     */
    private function _getCreateTaskContext(Task $task)
    {
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
     * @param Job   $job         Job data
     * @param array $inputAssets Input assets list
     * @param array $tasks       Performed tasks array (optional)
     *
     * @return Job
     */
    public function createJob(Job $job, array $inputAssets, array $tasks = null)
    {
        $batch = new BatchRequest();
        $batch->appendContext($this->_getCreateEmptyJobContext($job, $inputAssets));

        if ($tasks != null) {
            foreach ($tasks as $task) {
                $batch->appendContext($this->_getCreateTaskContext($task));
            }
        }

        $batch->encode();

        $method = Resources::HTTP_POST;
        $headers = $batch->getHeaders();
        $postParams = [];
        $queryParams = [];
        $path = '$batch';
        $statusCode = Resources::STATUS_ACCEPTED;
        $body = $batch->getBody();

        $response = $this->sendHttp(
            $method,
            $headers,
            $queryParams,
            $postParams,
            $path,
            $statusCode,
            $body
        );

        $responses = (new BatchResponse($response, $batch))->getResponses();
        $jobResponse = $responses[0];

        $entry = new Entry();
        $entry->parseXml($jobResponse->getBody());
        $properties = $this->getPropertiesFromAtomEntry($entry);

        return Job::createFromOptions($properties);
    }

    /**
     * Get Job.
     *
     * @param Job|string $job Job data or job Id
     *
     * @return Job
     */
    public function getJob($job)
    {
        $jobId = Utilities::getEntityId(
            $job,
            'WindowsAzure\MediaServices\Models\Job'
        );

        return Job::createFromOptions($this->_getEntity("Jobs('{$jobId}')"));
    }

    /**
     * Get list of Jobs.
     *
     * @return array of Models\Job
     */
    public function getJobList(array $queryParams = [])
    {
        $propertyList = $this->_getEntityList('Jobs', $queryParams);
        $result = [];

        foreach ($propertyList as $properties) {
            $result[] = Job::createFromOptions($properties);
        }

        return $result;
    }

    /**
     * Get status of a job.
     *
     * @param Job|string $job Job data or job Id
     *
     * @return string
     */
    public function getJobStatus($job)
    {
        $jobId = Utilities::getEntityId(
            $job,
            'WindowsAzure\MediaServices\Models\Job'
        );
        $jobIdEncoded = urlencode($jobId);

        $method = Resources::HTTP_GET;
        $headers = [];
        $postParams = [];
        $queryParams = [];
        $path = "Jobs('{$jobIdEncoded}')/State";
        $statusCode = Resources::STATUS_OK;

        $response = $this->sendHttp(
            $method,
            $headers,
            $queryParams,
            $postParams,
            $path,
            $statusCode
        );

        return strip_tags($response->getBody());
    }

    /**
     * Get job tasks.
     *
     * @param Job|string $job Job data or job Id
     *
     * @return Task[]
     */
    public function getJobTasks($job)
    {
        $jobId = Utilities::getEntityId(
            $job,
            'WindowsAzure\MediaServices\Models\Job'
        );

        $propertyList = $this->_getEntityList("Jobs('{$jobId}')/Tasks");
        $result = [];

        foreach ($propertyList as $properties) {
            $result[] = Task::createFromOptions($properties);
        }

        return $result;
    }

    /**
     * Get job input assets.
     *
     * @param Job|string $job Job data or job Id
     *
     * @return Asset[]
     */
    public function getJobInputMediaAssets($job)
    {
        $jobId = Utilities::getEntityId(
            $job,
            'WindowsAzure\MediaServices\Models\Job'
        );

        $propertyList = $this->_getEntityList("Jobs('{$jobId}')/InputMediaAssets");
        $result = [];

        foreach ($propertyList as $properties) {
            $result[] = Asset::createFromOptions($properties);
        }

        return $result;
    }

    /**
     * Get job output assets.
     *
     * @param Job|string $job Job data or job Id
     *
     * @return Asset[]
     */
    public function getJobOutputMediaAssets($job)
    {
        $jobId = Utilities::getEntityId(
            $job,
            'WindowsAzure\MediaServices\Models\Job'
        );

        $propertyList = $this->_getEntityList("Jobs('{$jobId}')/OutputMediaAssets");
        $result = [];

        foreach ($propertyList as $properties) {
            $result[] = Asset::createFromOptions($properties);
        }

        return $result;
    }

    /**
     * Cancel a job.
     *
     * @param Job|string $job Job data or job Id
     */
    public function cancelJob($job)
    {
        $jobId = Utilities::getEntityId(
            $job,
            'WindowsAzure\MediaServices\Models\Job'
        );
        $jobIdEncoded = urlencode($jobId);

        $method = Resources::HTTP_GET;
        $headers = [];
        $postParams = [];
        $queryParams = [];
        $path = "CancelJob?jobid='{$jobIdEncoded}'";
        $statusCode = Resources::STATUS_NO_CONTENT;

        $this->sendHttp(
            $method,
            $headers,
            $queryParams,
            $postParams,
            $path,
            $statusCode
        );
    }

    /**
     * Delete job.
     *
     * @param Job|string $job Job data or job Id
     */
    public function deleteJob($job)
    {
        $jobId = Utilities::getEntityId(
            $job,
            'WindowsAzure\MediaServices\Models\Job'
        );

        $this->_deleteEntity("Jobs('{$jobId}')");
    }

    /**
     * Get list of tasks.
     *
     * @return Task[]
     */
    public function getTaskList()
    {
        $propertyList = $this->_getEntityList('Tasks');
        $result = [];

        foreach ($propertyList as $properties) {
            $result[] = Task::createFromOptions($properties);
        }

        return $result;
    }

    /**
     * Create a job HTTP call context.
     *
     * @param JobTemplate $jobTemplate JobTemplate data
     *
     * @return HttpCallContext
     */
    private function _getCreateEmptyJobTemplateContext(JobTemplate $jobTemplate)
    {
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
     * Create task template HTTP call context.
     *
     * @param TaskTemplate $taskTemplate Task template object to be created
     *
     * @return HttpCallContext
     */
    private function _getCreateTaskTemplateContext(TaskTemplate $taskTemplate)
    {
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
     * @param JobTemplate $jobTemplate   Job template data
     * @param array       $taskTemplates Performed tasks template array
     *
     * @return JobTemplate
     */
    public function createJobTemplate(JobTemplate $jobTemplate, array $taskTemplates)
    {
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

        $method = Resources::HTTP_POST;
        $headers = $batch->getHeaders();
        $postParams = [];
        $queryParams = [];
        $path = '$batch';
        $statusCode = Resources::STATUS_ACCEPTED;
        $body = $batch->getBody();

        $response = $this->sendHttp(
            $method,
            $headers,
            $queryParams,
            $postParams,
            $path,
            $statusCode,
            $body
        );

        $responses = (new BatchResponse($response, $batch))->getResponses();
        $jobTemplateResponse = $responses[0];

        $entry = new Entry();
        $entry->parseXml($jobTemplateResponse->getBody());
        $properties = $this->getPropertiesFromAtomEntry($entry);

        return JobTemplate::createFromOptions($properties);
    }

    /**
     * Get job template.
     *
     * @param JobTemplate|string $jobTemplate Job template data or jobTemplate Id
     *
     * @return JobTemplate
     */
    public function getJobTemplate($jobTemplate)
    {
        $jobTemplateId = Utilities::getEntityId(
            $jobTemplate,
            'WindowsAzure\MediaServices\Models\JobTemplate'
        );

        return JobTemplate::createFromOptions(
            $this->_getEntity("JobTemplates('{$jobTemplateId}')")
        );
    }

    /**
     * Get list of Job Templates.
     *
     * @return JobTemplate[]
     */
    public function getJobTemplateList(array $queryParams = [])
    {
        $propertyList = $this->_getEntityList('JobTemplates', $queryParams);
        $result = [];

        foreach ($propertyList as $properties) {
            $result[] = JobTemplate::createFromOptions($properties);
        }

        return $result;
    }

    /**
     * Get task templates for job template.
     *
     * @param JobTemplate|string $jobTemplate Job template data or jobTemplate Id
     *
     * @return TaskTemplate[]
     */
    public function getJobTemplateTaskTemplateList($jobTemplate)
    {
        $jobTemplateId = Utilities::getEntityId(
            $jobTemplate,
            'WindowsAzure\MediaServices\Models\JobTemplate'
        );

        $propertyList = $this->_getEntityList(
            "JobTemplates('{$jobTemplateId}')/TaskTemplates"
        );
        $result = [];

        foreach ($propertyList as $properties) {
            $result[] = TaskTemplate::createFromOptions($properties);
        }

        return $result;
    }

    /**
     * Delete job template.
     *
     * @param JobTemplate|string $jobTemplate Job template data or job template Id
     */
    public function deleteJobTemplate($jobTemplate)
    {
        $jobTemplateId = Utilities::getEntityId(
            $jobTemplate,
            'WindowsAzure\MediaServices\Models\JobTemplate'
        );

        $this->_deleteEntity("JobTemplates('{$jobTemplateId}')");
    }

    /**
     * Get list of task templates.
     *
     * @return TaskTemplate[]
     */
    public function getTaskTemplateList(array $queryParams = [])
    {
        $propertyList = $this->_getEntityList('TaskTemplates', $queryParams);
        $result = [];

        foreach ($propertyList as $properties) {
            $result[] = TaskTemplate::createFromOptions($properties);
        }

        return $result;
    }

    /**
     * Get list of all media processors asset files.
     *
     * @return MediaProcessor[]
     */
    public function getMediaProcessors()
    {
        $propertyList = $this->_getEntityList('MediaProcessors');
        $result = [];

        foreach ($propertyList as $properties) {
            $result[] = MediaProcessor::createFromOptions($properties);
        }

        return $result;
    }

    /**
     * Get media processor by name with latest version.
     *
     * @param string $name Media processor name
     *
     * @return MediaProcessor
     */
    public function getLatestMediaProcessor($name)
    {
        $mediaProcessors = $this->getMediaProcessors();

        $maxVersion = 0.0;
        $result = null;
        foreach ($mediaProcessors as $mediaProcessor) {
            if (($mediaProcessor->getName() == $name)
                && ($mediaProcessor->getVersion() > $maxVersion)
            ) {
                $result = $mediaProcessor;
                $maxVersion = $mediaProcessor->getVersion();
            }
        }

        return $result;
    }

    /**
     * Create new IngestManifest.
     *
     * @param IngestManifest $ingestManifest An IngestManifest data
     *
     * @return IngestManifest
     */
    public function createIngestManifest(IngestManifest $ingestManifest)
    {
        return IngestManifest::createFromOptions(
            $this->_createEntity($ingestManifest, 'IngestManifests')
        );
    }

    /**
     * Get IngestManifest.
     *
     * @param IngestManifest|string $ingestManifest An IngestManifest data or
     *                                              IngestManifest Id
     *
     * @return IngestManifest
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
     * Get IngestManifest list.
     *
     * @return IngestManifest[]
     */
    public function getIngestManifestList()
    {
        $propertyList = $this->_getEntityList('IngestManifests');
        $result = [];

        foreach ($propertyList as $properties) {
            $result[] = IngestManifest::createFromOptions($properties);
        }

        return $result;
    }

    /**
     * Get IngestManifest assets.
     *
     * @param IngestManifest|string $ingestManifest An IngestManifest data or
     *                                              IngestManifest Id
     *
     * @return IngestManifestAsset[]
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
        $result = [];

        foreach ($propertyList as $properties) {
            $result[] = IngestManifestAsset::createFromOptions($properties);
        }

        return $result;
    }

    /**
     * Get pending assets of IngestManifest.
     *
     * @param IngestManifest|string $ingestManifest An IngestManifest data or
     *                                              IngestManifest Id
     *
     * @return IngestManifestAsset[]
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
        $result = [];

        foreach ($propertyList as $properties) {
            $result[] = IngestManifestAsset::createFromOptions($properties);
        }

        return $result;
    }

    /**
     * Get storage account of IngestManifest.
     *
     * @param IngestManifest|string $ingestManifest An IngestManifest data
     *                                              or IngestManifest Id
     *
     * @return StorageAccount
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
     * Update IngestManifest.
     *
     * @param IngestManifest $ingestManifest New IngestManifest data with
     *                                       valid id
     */
    public function updateIngestManifest(IngestManifest $ingestManifest)
    {
        $this->_updateEntity(
            $ingestManifest,
            "IngestManifests('{$ingestManifest->getId()}')"
        );
    }

    /**
     * Delete IngestManifest.
     *
     * @param IngestManifest|string $ingestManifest An IngestManifest data or
     *                                              IngestManifest Id
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
     * Create new IngestManifestAsset.
     *
     * @param IngestManifestAsset $ingestManifestAsset An IngestManifestAsset data
     * @param Asset               $asset               An Asset data to be linked with IngestManifestAsset
     *
     * @return IngestManifestAsset
     */
    public function createIngestManifestAsset(
        IngestManifestAsset $ingestManifestAsset, Asset $asset)
    {
        $href = urlencode($asset->getId());

        $atomLink = new AtomLink();
        $atomLink->setHref($this->getUri()."Assets('{$href}')");
        $atomLink->setType(Resources::ATOM_ENTRY_CONTENT_TYPE);
        $atomLink->setTitle('Asset');
        $atomLink->setRel(Resources::MEDIA_SERVICES_ASSET_REL);

        return IngestManifestAsset::createFromOptions(
            $this->_createEntity(
                $ingestManifestAsset,
                'IngestManifestAssets',
                [$atomLink]
            )
        );
    }

    /**
     * Get IngestManifestAsset.
     *
     * @param IngestManifestAsset|string $ingestManifestAsset An
     *                                                        IngestManifestAsset data or IngestManifestAsset Id
     *
     * @return IngestManifestAsset
     */
    public function getIngestManifestAsset($ingestManifestAsset)
    {
        $ingestManifestAssetId = Utilities::getEntityId(
            $ingestManifestAsset,
            'WindowsAzure\MediaServices\Models\IngestManifestAsset'
        );

        return IngestManifestAsset::createFromOptions(
            $this->_getEntity("IngestManifestAssets('{$ingestManifestAssetId}')")
        );
    }

    /**
     * Get list of IngestManifestAsset.
     *
     * @return IngestManifestAsset[]
     */
    public function getIngestManifestAssetList()
    {
        $propertyList = $this->_getEntityList('IngestManifestAssets');
        $result = [];

        foreach ($propertyList as $properties) {
            $result[] = IngestManifestAsset::createFromOptions($properties);
        }

        return $result;
    }

    /**
     * Get IngestManifestFiles of IngestManifestAsset.
     *
     * @param IngestManifestAsset|string $ingestManifestAsset An IngestManifestAsset data or IngestManifestAsset Id
     *
     * @return IngestManifestFile[]
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
        $result = [];

        foreach ($propertyList as $properties) {
            $result[] = IngestManifestFile::createFromOptions($properties);
        }

        return $result;
    }

    /**
     * Delete IngestManifestAsset.
     *
     * @param IngestManifestAsset|string $ingestManifestAsset An IngestManifestAsset data or IngestManifestAsset Id
     */
    public function deleteIngestManifestAsset($ingestManifestAsset)
    {
        $ingestManifestAssetId = Utilities::getEntityId(
            $ingestManifestAsset,
            'WindowsAzure\MediaServices\Models\IngestManifestAsset'
        );

        $this->_deleteEntity("IngestManifestAssets('{$ingestManifestAssetId}')");
    }

    /**
     * Create new IngestManifestFile.
     *
     * @param IngestManifestFile $ingestManifestFile An IngestManifestFile
     *                                               data
     *
     * @return IngestManifestFile
     */
    public function createIngestManifestFile(IngestManifestFile $ingestManifestFile)
    {
        return IngestManifestFile::createFromOptions(
            $this->_createEntity($ingestManifestFile, 'IngestManifestFiles')
        );
    }

    /**
     * Get IngestManifestFile.
     *
     * @param IngestManifestFile|string $ingestManifestFile An
     *                                                      IngestManifestFile data or IngestManifestFile Id
     *
     * @return IngestManifestFile
     */
    public function getIngestManifestFile($ingestManifestFile)
    {
        $ingestManifestFileId = Utilities::getEntityId(
            $ingestManifestFile,
            'WindowsAzure\MediaServices\Models\IngestManifestFile'
        );

        return IngestManifestFile::createFromOptions(
            $this->_getEntity("IngestManifestFiles('{$ingestManifestFileId}')")
        );
    }

    /**
     * Get list of IngestManifestFile.
     *
     * @return IngestManifestFile[]
     */
    public function getIngestManifestFileList()
    {
        $propertyList = $this->_getEntityList('IngestManifestFiles');
        $result = [];

        foreach ($propertyList as $properties) {
            $result[] = IngestManifestFile::createFromOptions($properties);
        }

        return $result;
    }

    /**
     * Delete IngestManifestFile.
     *
     * @param IngestManifestFile|string $ingestManifestFile An IngestManifestFile data or IngestManifestFile Id
     */
    public function deleteIngestManifestFile($ingestManifestFile)
    {
        $ingestManifestFileId = Utilities::getEntityId(
            $ingestManifestFile,
            'WindowsAzure\MediaServices\Models\IngestManifestFile'
        );

        $this->_deleteEntity("IngestManifestFiles('{$ingestManifestFileId}')");
    }

    /**
     * Create new ContentKey.
     *
     * @param ContentKey $contentKey ContentKey data
     *
     * @return ContentKey Created ContentKey
     */
    public function createContentKey(ContentKey $contentKey)
    {
        return ContentKey::createFromOptions(
            $this->_createEntity($contentKey, 'ContentKeys')
        );
    }

    /**
     * Get list of ContentKey.
     *
     * @return ContentKey[]
     */
    public function getContentKeyList(array $queryParams = [])
    {
        $propertyList = $this->_getEntityList('ContentKeys', $queryParams);
        $result = [];

        foreach ($propertyList as $properties) {
            $result[] = ContentKey::createFromOptions($properties);
        }

        return $result;
    }

    /**
     * Get ContentKey.
     *
     * @param ContentKey|string $contentKey An ContentKey data or
     *                                      ContentKey Id
     *
     * @return ContentKey
     */
    public function getContentKey($contentKey)
    {
        $contentKeyId = Utilities::getEntityId(
            $contentKey,
            'WindowsAzure\MediaServices\Models\ContentKey'
        );

        return ContentKey::createFromOptions(
            $this->_getEntity("ContentKeys('{$contentKeyId}')")
        );
    }

    /**
     * Update ContentKey.
     *
     * @param ContentKey $contentKey ContentKey data
     */
    public function updateContentKey(ContentKey $contentKey)
    {
        $this->_updateEntity($contentKey, "ContentKeys('{$contentKey->getId()}')");
    }

    /**
     * Rebind ContentKey.
     *
     * @param ContentKey|string $contentKey            An ContentKey data or ContentKey Id
     * @param string            $x509Certificate X.509 certificate (with only the public key) that was used to encrypt
     *                                                 the clear storage encryption/common protection content keys
     *
     * @return string Content key
     */
    public function rebindContentKey($contentKey, $x509Certificate)
    {
        $contentKeyId = Utilities::getEntityId(
            $contentKey,
            'WindowsAzure\MediaServices\Models\ContentKey'
        );
        $contentKeyId = urlencode($contentKeyId);

        $x509Certificate = urlencode($x509Certificate);

        $method = Resources::HTTP_GET;
        $headers = [];
        $postParams = [];
        $queryParams = [];
        $statusCode = Resources::STATUS_OK;
        $path = "RebindContentKey?id='{$contentKeyId}'".
            "&x509Certificate='{$x509Certificate}'";

        $response = $this->sendHttp(
            $method,
            $headers,
            $queryParams,
            $postParams,
            $path,
            $statusCode
        );

        $key = (string) simplexml_load_string($response->getBody());

        return base64_decode($key);
    }

    /**
     * Delete ContentKey.
     *
     * @param Models\ContentKey|string $contentKey An ContentKey data or
     *                                             ContentKey Id
     */
    public function deleteContentKey($contentKey)
    {
        $contentKeyId = Utilities::getEntityId(
            $contentKey,
            'WindowsAzure\MediaServices\Models\ContentKey'
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

        $method = Resources::HTTP_GET;
        $path = "GetProtectionKeyId?contentKeyType={$contentKeyType}";
        $headers = [];
        $postParams = [];
        $queryParams = [];
        $statusCode = Resources::STATUS_OK;

        $response = $this->sendHttp(
            $method,
            $headers,
            $queryParams,
            $postParams,
            $path,
            $statusCode
        );

        return (string) simplexml_load_string($response->getBody());
    }

    /**
     * Retrieve the specific X.509 certificate that should be used to encrypt your
     * user-defined content key.
     *
     * @param string $protectionKeyId ProtectionKey id
     *
     * @return string
     */
    public function getProtectionKey($protectionKeyId)
    {
        Validate::isString($protectionKeyId, 'protectionKeyId');

        $method = Resources::HTTP_GET;
        $path = "GetProtectionKey?ProtectionKeyId='{$protectionKeyId}'";
        $headers = [];
        $postParams = [];
        $queryParams = [];
        $statusCode = Resources::STATUS_OK;

        $response = $this->sendHttp(
            $method,
            $headers,
            $queryParams,
            $postParams,
            $path,
            $statusCode
        );

        $encoded = (string) simplexml_load_string($response->getBody());
        $encoded = implode("\n", str_split($encoded, 76));
        $encoded = "-----BEGIN CERTIFICATE-----\n".$encoded;
        $encoded .= "\n-----END CERTIFICATE-----";

        return $encoded;
    }

    /**
     * Create new content key authorization policy.
     *
     * @param ContentKeyAuthorizationPolicy $contentKeyAuthorizationPolicy ContentKeyAuthorizationPolicy data
     *
     * @return ContentKeyAuthorizationPolicy Created ContentKeyAuthorizationPolicy
     */
    public function createContentKeyAuthorizationPolicy(
        ContentKeyAuthorizationPolicy $contentKeyAuthorizationPolicy)
    {
        return ContentKeyAuthorizationPolicy::createFromOptions(
            $this->_createEntity($contentKeyAuthorizationPolicy, 'ContentKeyAuthorizationPolicies')
        );
    }

    /**
     * Get content key authorization policy.
     *
     * @param ContentKeyAuthorizationPolicy|string $contentKeyAuthorizationPolicy ContentKeyAuthorizationPolicies data
     *                                                                            or content key authorization policy Id
     *
     * @return ContentKeyAuthorizationPolicy
     */
    public function getContentKeyAuthorizationPolicy($contentKeyAuthorizationPolicy)
    {
        $contentKeyAuthorizationPolicyId = Utilities::getEntityId(
            $contentKeyAuthorizationPolicy,
            'WindowsAzure\MediaServices\Models\ContentKeyAuthorizationPolicy'
        );

        return ContentKeyAuthorizationPolicy::createFromOptions(
            $this->_getEntity("ContentKeyAuthorizationPolicies('{$contentKeyAuthorizationPolicyId}')")
        );
    }

    /**
     * Get content key authorization policies list.
     *
     * @return ContentKeyAuthorizationPolicy[]
     */
    public function getContentKeyAuthorizationPolicyList()
    {
        $propertyList = $this->_getEntityList('ContentKeyAuthorizationPolicies');
        $result = [];

        foreach ($propertyList as $properties) {
            $result[] = ContentKeyAuthorizationPolicy::createFromOptions($properties);
        }

        return $result;
    }

    /**
     * Update content key authorization policy.
     *
     * @param ContentKeyAuthorizationPolicy $contentKeyAuthorizationPolicy New content key authorization policy data
     *                                                                     with valid id
     */
    public function updateContentKeyAuthorizationPolicy(ContentKeyAuthorizationPolicy $contentKeyAuthorizationPolicy)
    {
        $this->_updateEntity(
            $contentKeyAuthorizationPolicy,
            "ContentKeyAuthorizationPolicies('{$contentKeyAuthorizationPolicy->getId()}')"
        );
    }

    /**
     * Delete content key authorization policy.
     *
     * @param ContentKeyAuthorizationPolicy|string $contentKeyAuthorizationPolicy ContentKeyAuthorizationPolicy data or
     *                                                                            content key authorization policy Id
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
     * Create new content key authorization options.
     *
     * @param ContentKeyAuthorizationPolicyOption $contentKeyAuthorizationOptions data
     *
     * @return ContentKeyAuthorizationPolicyOption Created ContentKeyAuthorizationPolicyOption
     */
    public function createContentKeyAuthorizationPolicyOption(
        ContentKeyAuthorizationPolicyOption $contentKeyAuthorizationOptions)
    {
        return ContentKeyAuthorizationPolicyOption::createFromOptions(
            $this->_createEntity($contentKeyAuthorizationOptions, 'ContentKeyAuthorizationPolicyOptions')
        );
    }

    /**
     * Get content key authorization option by id.
     *
     * @param ContentKeyAuthorizationPolicy|string $contentKeyAuthorizationOptions ContentKeyAuthorizationPolicies data
     *                                                                             or content key authorization policy
     *                                                                             Id
     *
     * @return ContentKeyAuthorizationPolicyOption
     */
    public function getContentKeyAuthorizationPolicyOption($contentKeyAuthorizationOptions)
    {
        $contentKeyAuthorizationOptionsId = Utilities::getEntityId(
            $contentKeyAuthorizationOptions,
            'WindowsAzure\MediaServices\Models\ContentKeyAuthorizationPolicyOption'
        );

        return ContentKeyAuthorizationPolicyOption::createFromOptions(
            $this->_getEntity("ContentKeyAuthorizationPolicyOptions('{$contentKeyAuthorizationOptionsId}')")
        );
    }

    /**
     * Get content key authorization options.
     *
     * @return array of Models\ContentKeyAuthorizationPolicyOption
     */
    public function getContentKeyAuthorizationPolicyOptionList()
    {
        $propertyList = $this->_getEntityList('ContentKeyAuthorizationPolicyOptions');
        $result = [];

        foreach ($propertyList as $properties) {
            $result[] = ContentKeyAuthorizationPolicyOption::createFromOptions($properties);
        }

        return $result;
    }

    /**
     * Update content key authorization options.
     *
     * @param ContentKeyAuthorizationPolicyOption $contentKeyAuthorizationOptions New content key authorization options
     *                                                                            data with valid id
     */
    public function updateContentKeyAuthorizationPolicyOption(
        ContentKeyAuthorizationPolicyOption $contentKeyAuthorizationOptions)
    {
        $this->_updateEntity(
            $contentKeyAuthorizationOptions,
            "ContentKeyAuthorizationPolicyOptions('{$contentKeyAuthorizationOptions->getId()}')"
        );
    }

    /**
     * Delete content key authorization policy.
     *
     * @param ContentKeyAuthorizationPolicy|string $contentKeyAuthorizationOptions ContentKeyAuthorizationPolicy data or
     *                                                                             content key authorization policy Id
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
     * Get ContentKeyAuthorizationPolicy linked Options.
     *
     * @param ContentKeyAuthorizationPolicy|string $policy ContentKeyAuthorizationPolicy data or
     *                                                     ContentKeyAuthorizationPolicy Id
     *
     * @return ContentKeyAuthorizationPolicyOption[]
     */
    public function getContentKeyAuthorizationPolicyLinkedOptions($policy)
    {
        $policyId = Utilities::getEntityId(
            $policy,
            'WindowsAzure\MediaServices\Models\ContentKeyAuthorizationPolicy'
        );

        $propertyList = $this->_getEntityList("ContentKeyAuthorizationPolicies('{$policyId}')/Options");
        $result = [];

        foreach ($propertyList as $properties) {
            $result[] = ContentKeyAuthorizationPolicyOption::createFromOptions($properties);
        }

        return $result;
    }

    /**
     * Link ContentKeyAuthorizationPolicyOption to ContentKeyAuthorizationPolicy.
     *
     * @param ContentKeyAuthorizationPolicyOption|string $options ContentKeyAuthorizationPolicyOption to link a
     *                                                            ContentKeyAuthorizationPolicy or
     *                                                            ContentKeyAuthorizationPolicyOption id
     * @param ContentKeyAuthorizationPolicy|string       $policy  ContentKeyAuthorizationPolicy to link or
     *                                                            ContentKeyAuthorizationPolicy id
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
            $this->getUri()."ContentKeyAuthorizationPolicyOptions('{$optionsId}')"
        );

        $method = Resources::HTTP_POST;
        $path = "ContentKeyAuthorizationPolicies('{$policyId}')/\$links/Options";
        $headers = [
            Resources::CONTENT_TYPE => Resources::XML_CONTENT_TYPE,
        ];
        $postParams = [];
        $queryParams = [];
        $statusCode = Resources::STATUS_NO_CONTENT;
        $body = $contentWriter->outputMemory();

        $this->sendHttp(
            $method,
            $headers,
            $queryParams,
            $postParams,
            $path,
            $statusCode,
            $body
        );
    }

    /**
     * Remove ContentKeyAuthorizationPolicyOption from ContentKeyAuthorizationPolicy.
     *
     * @param ContentKeyAuthorizationPolicyOption|string $options ContentKeyAuthorizationPolicyOption to remove from
     *                                                            ContentKeyAuthorizationPolicy or
     *                                                            ContentKeyAuthorizationPolicyOption id
     * @param ContentKeyAuthorizationPolicy|string       $policy  ContentKeyAuthorizationPolicy to remove or
     *                                                            ContentKeyAuthorizationPolicy id
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

        $method = Resources::HTTP_DELETE;
        $path = "ContentKeyAuthorizationPolicies('{$policyId}')/\$links/Options('{$optionsId}')";
        $headers = [];
        $postParams = [];
        $queryParams = [];
        $statusCode = Resources::STATUS_NO_CONTENT;

        $this->sendHttp(
            $method,
            $headers,
            $queryParams,
            $postParams,
            $path,
            $statusCode
        );
    }

    /**
     * Create new asset delivery policy.
     *
     * @param AssetDeliveryPolicy $assetDeliveryPolicy AssetDeliveryPolicy data
     *
     * @return AssetDeliveryPolicy Created AssetDeliveryPolicy
     */
    public function createAssetDeliveryPolicy(AssetDeliveryPolicy $assetDeliveryPolicy)
    {
        return AssetDeliveryPolicy::createFromOptions($this->_createEntity($assetDeliveryPolicy, 'AssetDeliveryPolicies'));
    }

    /**
     * Get asset delivery policy.
     *
     * @param ContentKeyAuthorizationPolicy|string $assetDeliveryPolicy
     *
     * @return AssetDeliveryPolicy
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
     * Get asset delivery policies list.
     *
     * @return AssetDeliveryPolicy[]
     */
    public function getAssetDeliveryPolicyList()
    {
        $propertyList = $this->_getEntityList('AssetDeliveryPolicies');
        $result = [];

        foreach ($propertyList as $properties) {
            $result[] = AssetDeliveryPolicy::createFromOptions($properties);
        }

        return $result;
    }

    /**
     * Update asset delivery policy.
     *
     * @param AssetDeliveryPolicy $assetDeliveryPolicy New asset delivery policy data with valid id
     */
    public function updateAssetDeliveryPolicy(AssetDeliveryPolicy $assetDeliveryPolicy)
    {
        $this->_updateEntity($assetDeliveryPolicy, "AssetDeliveryPolicies('{$assetDeliveryPolicy->getId()}')");
    }

    /**
     * Delete asset delivery policy.
     *
     * @param AssetDeliveryPolicy|string $assetDeliveryPolicy AssetDeliveryPolicy data or asset delivery policy Id
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
     * Get AssetDeliveryPolicy list linked to an Asset.
     *
     * @param Asset|string $asset Asset data or Asset Id to retrieve the linked delivery policies
     *
     * @return AssetDeliveryPolicy[]
     */
    public function getAssetLinkedDeliveryPolicy($asset)
    {
        $assetId = Utilities::getEntityId(
            $asset,
            'WindowsAzure\MediaServices\Models\Asset'
        );

        $propertyList = $this->_getEntityList("Assets('{$assetId}')/DeliveryPolicies");
        $result = [];

        foreach ($propertyList as $properties) {
            $result[] = AssetDeliveryPolicy::createFromOptions($properties);
        }

        return $result;
    }

    /**
     * Link AssetDeliveryPolicy to Asset.
     *
     * @param Asset|string               $asset  Asset to link a AssetDeliveryPolicy or Asset id
     * @param AssetDeliveryPolicy|string $policy DeliveryPolicy to link or DeliveryPolicy id
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
            $this->getUri()."AssetDeliveryPolicies('{$policyId}')"
        );

        $method = Resources::HTTP_POST;
        $path = "Assets('{$assetId}')/\$links/DeliveryPolicies";
        $headers = [
            Resources::CONTENT_TYPE => Resources::XML_CONTENT_TYPE,
        ];
        $postParams = [];
        $queryParams = [];
        $statusCode = Resources::STATUS_NO_CONTENT;
        $body = $contentWriter->outputMemory();

        $this->sendHttp(
            $method,
            $headers,
            $queryParams,
            $postParams,
            $path,
            $statusCode,
            $body
        );
    }

    /**
     * Remove AssetDeliveryPolicy from Asset.
     *
     * @param Asset|string               $asset  Asset to remove a AssetDeliveryPolicy or
     *                                           Asset id
     * @param AssetDeliveryPolicy|string $policy DeliveryPolicy to remove or
     *                                           DeliveryPolicy id
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

        $method = Resources::HTTP_DELETE;
        $path = "Assets('{$assetId}')/\$links/DeliveryPolicies('{$policyId}')";
        $headers = [];
        $postParams = [];
        $queryParams = [];
        $statusCode = Resources::STATUS_NO_CONTENT;

        $this->sendHttp(
            $method,
            $headers,
            $queryParams,
            $postParams,
            $path,
            $statusCode
        );
    }

    /**
     * Link AssetDeliveryPolicy to Asset.
     *
     * @param ContentKey|string          $contentKey             Asset to link a AssetDeliveryPolicy or
     *                                                           Asset id
     * @param AssetDeliveryPolicy|string $contentKeyDeliveryType DeliveryPolicy to link or
     *                                                           DeliveryPolicy id
     *
     * @return string
     */
    public function getKeyDeliveryUrl($contentKey, $contentKeyDeliveryType)
    {
        $contentKeyId = Utilities::getEntityId(
            $contentKey,
            'WindowsAzure\MediaServices\Models\ContentKey'
        );
        $contentKeyId = urlencode($contentKeyId);

        $body = json_encode(['keyDeliveryType' => $contentKeyDeliveryType]);

        $method = Resources::HTTP_POST;
        $path = "ContentKeys('{$contentKeyId}')/GetKeyDeliveryUrl";
        $headers = [
            Resources::CONTENT_TYPE => Resources::JSON_CONTENT_TYPE,
        ];
        $postParams = [];
        $queryParams = [];
        $statusCode = Resources::STATUS_OK;

        $response = $this->sendHttp(
            $method,
            $headers,
            $queryParams,
            $postParams,
            $path,
            $statusCode,
            $body
        );

        return simplexml_load_string($response->getBody())->__toString();
    }

    /**
     * Get encoding reserved units settings.
     *
     * @return EncodingReservedUnit|null
     */
    public function getEncodingReservedUnit()
    {
        $units = $this->_getEntityList('EncodingReservedUnitTypes');
        if (isset($units) && count($units) > 0) {
            return EncodingReservedUnit::createFromOptions($units[0]);
        }

        return null;
    }

    /**
     * Update encoding reserved units settings.
     *
     * @param EncodingReservedUnit $encodingReservedUnit Update data valid idli
     */
    public function updateEncodingReservedUnit(EncodingReservedUnit $encodingReservedUnit)
    {
        $accountID = $encodingReservedUnit->getAccountId();
        $encodingReservedUnit->setAccountId(null); // never send account Id
        $this->_updateEntity($encodingReservedUnit, "EncodingReservedUnitTypes(guid'{$accountID}')");
        $encodingReservedUnit->setAccountId($accountID);
    }

    /**
     * Get the Operation entity.
     *
     * @param Operation|string $operation The operation id
     *
     * @return Operation
     */
    public function getOperation($operation)
    {
        $operationId = Utilities::getEntityId(
            $operation,
            'WindowsAzure\MediaServices\Models\Operation'
        );

        return Operation::createFromOptions($this->_getEntity("Operations('{$operationId}')"));
    }

    /**
     * Utility method to await for an Operation finishes.
     *
     * @param Operation $operation The Operation object to await for
     * @param int       $interval
     *
     * @return Operation
     */
    public function awaitOperation(Operation $operation, $interval = 5)
    {
        while ($operation->getState() == OperationState::InProgress) {
            $operation = $this->getOperation($operation);
            if ($operation->getState() == OperationState::InProgress) {
                sleep($interval);
            }
        }

        return $operation;
    }

    /**
     * Send Create operation.
     *
     * @param Channel $channel Channel data
     *
     * @return Operation The operation to track the channel create
     */
    public function sendCreateChannelOperation(Channel $channel)
    {
        return $this->_sendOperation($channel, 'Channels');
    }

    /**
     * Send Update operation.
     *
     * @param Channel $channel Channel data
     *
     * @return Operation The operation to track the channel update
     */
    public function sendUpdateChannelOperation(Channel $channel)
    {
        $channelId = $channel->getId();
        Validate::notNull($channelId, 'channelId');

        return $this->_sendOperation(
            $channel,
            "Channels('{$channelId}')",
            Resources::HTTP_MERGE,
            [Resources::STATUS_ACCEPTED, Resources::STATUS_NO_CONTENT]);
    }

    /**
     * Get existing channel.
     *
     * @param Channel|string $channel Channel data
     *
     * @return Channel Created Channel
     */
    public function getChannel($channel)
    {
        $channelId = Utilities::getEntityId(
            $channel,
            'WindowsAzure\MediaServices\Models\Channel'
        );

        return Channel::createFromOptions($this->_getEntity("Channels('{$channelId}')"));
    }

    /**
     * Delete channel.
     *
     * @param Channel|string $channel Channel data or channel Id
     *
     * @return Operation
     */
    public function sendDeleteChannelOperation($channel)
    {
        $channelId = Utilities::getEntityId(
            $channel,
            'WindowsAzure\MediaServices\Models\Channel'
        );

        return $this->_sendOperation(null, "Channels('{$channelId}')", Resources::HTTP_DELETE);
    }

    /**
     * Get list of Channels.
     *
     * @return Channel[]
     */
    public function getChannelList()
    {
        $entityList = $this->_getEntityList('Channels');
        $result = [];

        foreach ($entityList as $channel) {
            $result[] = Channel::createFromOptions($channel);
        }

        return $result;
    }

    /**
     * Start a channel.
     *
     * @param Channel|string $channel Channel data or channel Id
     *
     * @return Operation
     */
    public function sendStartChannelOperation($channel)
    {
        $channelId = Utilities::getEntityId(
            $channel,
            'WindowsAzure\MediaServices\Models\Channel'
        );
        $headers = [
            Resources::CONTENT_TYPE => Resources::JSON_CONTENT_TYPE,
        ];

        return $this->_sendOperation(
            null,
            "Channels('{$channelId}')/Start",
            Resources::HTTP_POST,
            Resources::STATUS_ACCEPTED,
            $headers);
    }

    /**
     * Stop a channel.
     *
     * @param Channel|string $channel Channel data or channel Id
     *
     * @return Operation
     */
    public function sendStopChannelOperation($channel)
    {
        $channelId = Utilities::getEntityId(
            $channel,
            'WindowsAzure\MediaServices\Models\Channel'
        );
        $headers = [
            Resources::CONTENT_TYPE => Resources::JSON_CONTENT_TYPE,
        ];

        return $this->_sendOperation(
            null,
            "Channels('{$channelId}')/Stop",
            Resources::HTTP_POST,
            Resources::STATUS_ACCEPTED,
            $headers);
    }

    /**
     * Reset a channel.
     *
     * @param Channel|string $channel Channel data or channel Id
     *
     * @return Operation
     */
    public function sendResetChannelOperation($channel)
    {
        $channelId = Utilities::getEntityId(
            $channel,
            'WindowsAzure\MediaServices\Models\Channel'
        );
        $headers = [
            Resources::CONTENT_TYPE => Resources::JSON_CONTENT_TYPE,
        ];

        return $this->_sendOperation(
            null,
            "Channels('{$channelId}')/Reset",
            Resources::HTTP_POST,
            Resources::STATUS_ACCEPTED,
            $headers);
    }

    /**
     * StartAdvertisement on a running channel.
     *
     * @param Channel|string $channel   Channel data or channel Id
     * @param string         $duration  The duration, in seconds, of the commercial break
     * @param string         $cueId     Unique ID for the commercial break
     * @param string         $showSlate Indicates to the live encoder within the Channel that it needs to switch to the
     *                                  default slate image during the commercial break
     *
     * @return Operation
     */
    public function sendStartAdvertisementChannelOperation($channel, $duration, $cueId, $showSlate)
    {
        $channelId = Utilities::getEntityId(
            $channel,
            'WindowsAzure\MediaServices\Models\Channel'
        );
        $headers = [
            Resources::CONTENT_TYPE => Resources::JSON_CONTENT_TYPE,
        ];
        $body = json_encode([
            'duration' => $duration,
            'cueId' => $cueId,
            'showSlate' => ($showSlate) ? 'true' : 'false',
        ]);

        return $this->_sendOperation(
            $body,
            "Channels('{$channelId}')/StartAdvertisement",
            Resources::HTTP_POST,
            Resources::STATUS_ACCEPTED,
            $headers);
    }

    /**
     * EndAdvertisement on a running channel.
     *
     * @param Channel|string $channel Channel data or channel Id
     * @param mixed          $cueId
     *
     * @return Operation
     */
    public function sendEndAdvertisementChannelOperation($channel, $cueId)
    {
        $channelId = Utilities::getEntityId(
            $channel,
            'WindowsAzure\MediaServices\Models\Channel'
        );
        $headers = [
            Resources::CONTENT_TYPE => Resources::JSON_CONTENT_TYPE,
        ];
        $body = json_encode([
            'cueId' => $cueId,
        ]);

        return $this->_sendOperation(
            $body,
            "Channels('{$channelId}')/EndAdvertisement",
            Resources::HTTP_POST,
            Resources::STATUS_ACCEPTED,
            $headers);
    }

    /**
     * ShowSlate on a running channel.
     *
     * @param Channel|string $channel  Channel data or channel Id
     * @param string         $duration The duration, in seconds, of the commercial break
     * @param $assetId
     *
     * @return Operation
     */
    public function sendShowSlateChannelOperation($channel, $duration, $assetId)
    {
        $channelId = Utilities::getEntityId(
            $channel,
            'WindowsAzure\MediaServices\Models\Channel'
        );
        $headers = [
            Resources::CONTENT_TYPE => Resources::JSON_CONTENT_TYPE,
        ];
        $body = json_encode([
            'duration' => $duration,
            'assetId' => $assetId,
        ]);

        return $this->_sendOperation(
            $body,
            "Channels('{$channelId}')/ShowSlate",
            Resources::HTTP_POST,
            Resources::STATUS_ACCEPTED,
            $headers);
    }

    /**
     * HideSlate on a running channel.
     *
     * @param Channel|string $channel Channel data or channel Id
     *
     * @return Operation
     */
    public function sendHideSlateChannelOperation($channel)
    {
        $channelId = Utilities::getEntityId(
            $channel,
            'WindowsAzure\MediaServices\Models\Channel'
        );
        $headers = [
            Resources::CONTENT_TYPE => Resources::JSON_CONTENT_TYPE,
        ];

        return $this->_sendOperation(
            null,
            "Channels('{$channelId}')/HideSlate",
            Resources::HTTP_POST,
            Resources::STATUS_ACCEPTED,
            $headers);
    }

    /**
     * Create a Channel.
     *
     * @param Channel $channel Channel data
     *
     * @return Channel the created channel
     */
    public function createChannel(Channel $channel)
    {
        $op = $this->sendCreateChannelOperation($channel);

        // waiting for create operation finishes
        $op = $this->awaitOperation($op);

        if ($op->getState() != OperationState::Succeeded) {
            return null;
        }

        // get and return the createChannel
        return $this->getChannel($op->getTargetEntityId());
    }

    /**
     * Update a Channel.
     *
     * @param Channel $channel Channel data
     *
     * @return Channel the updated channel
     */
    public function updateChannel(Channel $channel)
    {
        $op = $this->sendUpdateChannelOperation($channel);

        // waiting for create operation finishes
        $op = $this->awaitOperation($op);

        if ($op->getState() != OperationState::Succeeded) {
            return null;
        }

        // get and return the createChannel
        return $this->getChannel($channel->getId());
    }

    /**
     * Delete a Channel.
     *
     * @param Channel|string $channel Channel data or channel Id
     *
     * @return bool true if succeeded
     */
    public function deleteChannel($channel)
    {
        $op = $this->sendDeleteChannelOperation($channel);

        // waiting for delete operation finishes
        $op = $this->awaitOperation($op);

        // true if succeeded
        return $op->getState() == OperationState::Succeeded;
    }

    /**
     * Reset a Channel.
     *
     * @param Channel|string $channel Channel data or channel Id
     *
     * @return bool true if succeeded
     */
    public function resetChannel($channel)
    {
        $op = $this->sendResetChannelOperation($channel);

        // waiting for reset operation finishes
        $op = $this->awaitOperation($op);

        // true if succeeded
        return $op->getState() == OperationState::Succeeded;
    }

    /**
     * Start a Channel.
     *
     * @param Channel|string $channel Channel data or channel Id
     *
     * @return bool true if succeeded
     */
    public function startChannel($channel)
    {
        $op = $this->sendStartChannelOperation($channel);

        // waiting for create operation finishes
        $op = $this->awaitOperation($op);

        // true if succeeded
        return $op->getState() == OperationState::Succeeded;
    }

    /**
     * Stop a Channel.
     *
     * @param Channel|string $channel Channel data or channel Id
     *
     * @return bool true if succeeded
     */
    public function stopChannel($channel)
    {
        $op = $this->sendStopChannelOperation($channel);

        // waiting for create operation finishes
        $op = $this->awaitOperation($op);

        // true if succeeded
        return $op->getState() == OperationState::Succeeded;
    }

    /**
     * Start Advertisement on Channel.
     *
     * @param Channel|string $channel Channel data or channel Id
     * @param $duration
     * @param $cueId
     * @param $showSlate
     *
     * @return bool true if succeeded
     */
    public function startAdvertisementChannel($channel, $duration, $cueId, $showSlate)
    {
        $op = $this->sendStartAdvertisementChannelOperation($channel, $duration, $cueId, $showSlate);

        // waiting for create operation finishes
        $op = $this->awaitOperation($op);

        // true if succeeded
        return $op->getState() == OperationState::Succeeded;
    }

    /**
     * End Advertisement on Channel.
     *
     * @param Channel|string $channel Channel data or channel Id
     * @param $cueId
     *
     * @return bool true if succeeded
     */
    public function endAdvertisementChannel($channel, $cueId)
    {
        $op = $this->sendEndAdvertisementChannelOperation($channel, $cueId);

        // waiting for create operation finishes
        $op = $this->awaitOperation($op);

        // true if succeeded
        return $op->getState() == OperationState::Succeeded;
    }

    /**
     * Show Slate on Channel.
     *
     * @param Channel|string $channel Channel data or channel Id
     * @param $duration
     * @param $assetId
     *
     * @return bool true if succeeded
     */
    public function showSlateChannel($channel, $duration, $assetId)
    {
        $op = $this->sendShowSlateChannelOperation($channel, $duration, $assetId);

        // waiting for create operation finishes
        $op = $this->awaitOperation($op);

        // true if succeeded
        return $op->getState() == OperationState::Succeeded;
    }

    /**
     * Hide Slate on Channel.
     *
     * @param Channel|string $channel Channel data or channel Id
     *
     * @return bool true if succeeded
     */
    public function hideSlateChannel($channel)
    {
        $op = $this->sendHideSlateChannelOperation($channel);

        // waiting for create operation finishes
        $op = $this->awaitOperation($op);

        // true if succeeded
        return $op->getState() == OperationState::Succeeded;
    }

    /**
     * Get existing program.
     *
     * @param Program|string $program Program data
     *
     * @return Program Created Program
     */
    public function getProgram($program)
    {
        $programId = Utilities::getEntityId(
            $program,
            'WindowsAzure\MediaServices\Models\Program'
        );

        return Program::createFromOptions($this->_getEntity("Programs('{$programId}')"));
    }

    /**
     * Create new Program.
     *
     * @param Program $program Program data
     *
     * @return Program Created Program
     */
    public function createProgram(Program $program)
    {
        return Program::createFromOptions($this->_createEntity($program, 'Programs'));
    }

    /**
     * Get the list of Programs, if channel (or channel id) is provided, then
     * returns the Programs associated to that Channel.
     *
     * @param null $channel
     *
     * @return Program[]
     */
    public function getProgramList($channel = null)
    {
        if (is_null($channel)) {
            $entityList = $this->_getEntityList('Programs');
        } else {
            $channelId = Utilities::getEntityId($channel, 'WindowsAzure\MediaServices\Models\Channel');
            $entityList = $this->_getEntityList("Channels('{$channelId}')/Programs");
        }

        $result = [];

        foreach ($entityList as $program) {
            $result[] = Program::createFromOptions($program);
        }

        return $result;
    }

    /**
     * Start a Program.
     *
     * @param Program|string $program Program data or Program Id
     *
     * @return Operation
     */
    public function sendStartProgramOperation($program)
    {
        $programId = Utilities::getEntityId(
            $program,
            'WindowsAzure\MediaServices\Models\Program'
        );
        $headers = [
            Resources::CONTENT_TYPE => Resources::JSON_CONTENT_TYPE,
        ];

        return $this->_sendOperation(
            null,
            "Programs('{$programId}')/Start",
            Resources::HTTP_POST,
            Resources::STATUS_ACCEPTED,
            $headers);
    }

    /**
     * Stop a Program.
     *
     * @param Program|string $program Program data or program Id
     *
     * @return Operation
     */
    public function sendStopProgramOperation($program)
    {
        $programId = Utilities::getEntityId(
            $program,
            'WindowsAzure\MediaServices\Models\Program'
        );
        $headers = [
            Resources::CONTENT_TYPE => Resources::JSON_CONTENT_TYPE,
        ];

        return $this->_sendOperation(
            null,
            "Programs('{$programId}')/Stop",
            Resources::HTTP_POST,
            Resources::STATUS_ACCEPTED,
            $headers);
    }

    /**
     * Start a Program.
     *
     * @param Program|string $program Program data or program Id
     *
     * @return bool true if succeeded
     */
    public function startProgram($program)
    {
        $op = $this->sendStartProgramOperation($program);

        // waiting for create operation finishes
        $op = $this->awaitOperation($op);

        // true if succeeded
        return $op->getState() == OperationState::Succeeded;
    }

    /**
     * Stop a Program.
     *
     * @param Program|string $program Program data or program Id
     *
     * @return bool true if succeeded
     */
    public function stopProgram($program)
    {
        $op = $this->sendStopProgramOperation($program);

        // waiting for create operation finishes
        $op = $this->awaitOperation($op);

        // true if succeeded
        return $op->getState() == OperationState::Succeeded;
    }

    /**
     * Send Update Program operation.
     *
     * @param Program $program Programs data
     *
     * @return Operation The operation to track the program update
     */
    public function sendUpdateProgramOperation(Program $program)
    {
        $programId = $program->getId();
        Validate::notNull($programId, 'programId');

        return $this->_sendOperation(
            $program,
            "Programs('{$programId}')",
            Resources::HTTP_MERGE,
            [Resources::STATUS_ACCEPTED, Resources::STATUS_NO_CONTENT]);
    }

    /**
     * Update a Program.
     *
     * @param Program $program Program data
     *
     * @return Program the updated program
     */
    public function updateProgram(Program $program)
    {
        $op = $this->sendUpdateProgramOperation($program);

        // waiting for create operation finishes
        $op = $this->awaitOperation($op);

        if ($op->getState() != OperationState::Succeeded) {
            return null;
        }

        // get and return the createProgram
        return $this->getProgram($program->getId());
    }

    /**
     * Delete Program.
     *
     * @param Program|string $program Program data or program Id
     *
     * @return Operation
     */
    public function sendDeleteProgramOperation($program)
    {
        $programId = Utilities::getEntityId(
            $program,
            'WindowsAzure\MediaServices\Models\Program'
        );

        return $this->_sendOperation(
            null,
            "Programs('{$programId}')",
            Resources::HTTP_DELETE,
            Resources::STATUS_NO_CONTENT);
    }

    /**
     * Delete a Program.
     *
     * @param Program|string $program Program data or program Id
     *
     * @return bool true if succeeded
     */
    public function deleteProgram($program)
    {
        $op = $this->sendDeleteProgramOperation($program);

        // waiting for delete operation finishes
        $op = $this->awaitOperation($op);

        // true if succeeded
        return $op->getState() == OperationState::Succeeded;
    }
}
