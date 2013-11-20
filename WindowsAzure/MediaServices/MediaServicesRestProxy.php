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
 * @package   WindowsAzure\Blob
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace WindowsAzure\MediaServices;
use WindowsAzure\Common\Internal\Utilities;
use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\Common\Internal\Validate;
use WindowsAzure\Common\Models\ServiceProperties;
use WindowsAzure\Common\Internal\ServiceRestProxy;
use WindowsAzure\MediaServices\Internal\IMediaServices;
use WindowsAzure\MediaServices\Models\Asset;
use WindowsAzure\MediaServices\Models\AccessPolicy;
use WindowsAzure\MediaServices\Models\Locator;
use WindowsAzure\MediaServices\Models\AssetFile;
use WindowsAzure\Common\Internal\Atom\Feed;
use WindowsAzure\Common\Internal\Atom\Entry;
use WindowsAzure\Common\Internal\Atom\Content;
use WindowsAzure\Common\Internal\Atom\AtomProperties;
use WindowsAzure\Blob\Models\BlobType;
use WindowsAzure\Common\Internal\Http\HttpClient;
use WindowsAzure\Common\Internal\Http\Url;

/**
 * This class constructs HTTP requests and receive HTTP responses for media services
 * service layer.
 *
 * @category  Microsoft
 * @package   WindowsAzure\MediaServices
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class MediaServicesRestProxy extends ServiceRestProxy implements IMediaServices
{
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
    )
    {
        // Add redirect to expected results
        if (!is_array($statusCode))
        {
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
        if ($response->getStatus() == Resources::STATUS_MOVED_PERMANENTLY)
        {
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
     * @param object    $entity Media services entity
     *
     * @return XML string representing Atom Entry
     */
    protected function wrapAtomEntry($entity) {
        Validate::notNull($entity, 'entity');

        $properties = new AtomProperties();
        $properties->setPropertiesFromObject($entity);

        $content = new Content();
        $content->setType(Resources::XML_CONTENT_TYPE);
        $content->setProperties($properties);

        $atomEntry = new Entry();
        $atomEntry->setContent($content);

        $xmlWriter = new \XMLWriter();
        $xmlWriter->openMemory();
        $atomEntry->writeXml($xmlWriter);

        return $xmlWriter->outputMemory();
    }

    /**
     * Extract media service entity from Atom Entry object
     * @param WindowsAzure\Common\Internal\Atom\Entry   $entry  Atom Entry containing properties of media services object
     * @param object                                    $entity Media services entity
     */
    protected function getPropertiesFromAtomEntry($entry) {
        Validate::notNull($entry, 'entry');
        Validate::isA($entry, 'WindowsAzure\Common\Internal\Atom\Entry', 'entry');

        $content = $entry->getContent();
        if (!empty($content)) {
            $properties = $content->getProperties();
            if (!empty($properties)) {
                return $properties->getProperties();
            }
        }

        return array();
    }

    /**
     * Create new asset
     *
     * @param WindowsAzure\MediaServices\Models\Asset   $asset  Asset data
     *
     * @return WindowsAzure\MediaServices\Models\Asset  Created asset
     */
    public function createAsset($asset) {
        Validate::isA($asset, 'WindowsAzure\Mediaservices\Models\Asset', 'asset');

        $method      = Resources::HTTP_POST;
        $headers     = array();
        $postParams  = array();
        $queryParams = array();
        $path        = 'Assets';
        $statusCode  = Resources::STATUS_CREATED;
        $body = $this->wrapAtomEntry($asset);

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
        $properties = $this->getPropertiesFromAtomEntry($entry);
        if (!empty($properties)) {
            return Asset::createFromOptions($properties);
        }

        return null;
    }

    /**
     * Delete asset
     *
     * @param WindowsAzure\MediaServices\Models\Asset|string   $asset  Asset data or asset Id
     */
    public function deleteAsset($asset) {

        $assetId = Utilities::getEntityId($asset, 'WindowsAzure\MediaServices\Models\Asset');

        $method      = Resources::HTTP_DELETE;
        $headers     = array();
        $postParams  = array();
        $queryParams = array();
        $path        = "Assets('{$assetId}')";
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
     * @param WindowsAzure\MediaServices\Models\AccessPolicy   $accessPolicy  Access policy data
     *
     * @return WindowsAzure\MediaServices\Models\AccessPolicy  Created access policy
     */
    public function createAccessPolicy($accessPolicy) {
        Validate::isA($accessPolicy, 'WindowsAzure\Mediaservices\Models\AccessPolicy', 'accessPolicy');

        $method      = Resources::HTTP_POST;
        $headers     = array();
        $postParams  = array();
        $queryParams = array();
        $path        = 'AccessPolicies';
        $statusCode  = Resources::STATUS_CREATED;
        $body = $this->wrapAtomEntry($accessPolicy);

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
        $properties = $this->getPropertiesFromAtomEntry($entry);
        if (!empty($properties)) {
            return AccessPolicy::createFromOptions($properties);
        }

        return null;
    }

    /**
     * Delete access policy
     *
     * @param WindowsAzure\MediaServices\Models\AccessPolicy|string   $accessPolicy  Access policy data or access policy Id
     */
    public function deleteAccessPolicy($accessPolicy) {
        $accessPolicyId = Utilities::getEntityId($accessPolicy, 'WindowsAzure\Mediaservices\Models\AccessPolicy');

        $method      = Resources::HTTP_DELETE;
        $headers     = array();
        $postParams  = array();
        $queryParams = array();
        $path        = "AccessPolicies('{$accessPolicyId}')";
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
     * Create new locator
     *
     * @param WindowsAzure\MediaServices\Models\Locator   $locator  Locator data
     *
     * @return WindowsAzure\MediaServices\Models\Locator  Created locator
     */
    public function createLocator($locator) {
        Validate::isA($locator, 'WindowsAzure\Mediaservices\Models\Locator', 'locator');

        $method      = Resources::HTTP_POST;
        $headers     = array();
        $postParams  = array();
        $queryParams = array();
        $path        = 'Locators';
        $statusCode  = Resources::STATUS_CREATED;
        $body = $this->wrapAtomEntry($locator);

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
        $properties = $this->getPropertiesFromAtomEntry($entry);
        if (!empty($properties)) {
            return Locator::createFromOptions($properties);
        }

        return null;
    }

    /**
     * Delete locator
     *
     * @param WindowsAzure\MediaServices\Models\Locator|string   $asset  Asset data or asset Id
     */
    public function deleteLocator($locator) {
        $locatorId = Utilities::getEntityId($locator, 'WindowsAzure\Mediaservices\Models\Locator');

        $method      = Resources::HTTP_DELETE;
        $headers     = array();
        $postParams  = array();
        $queryParams = array();
        $path        = "Locators('{$locatorId}')";
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
     * Generate file info for all files in asset
     *
     * @param WindowsAzure\MediaServices\Models\Asset|string   $asset  Asset data or asset Id
     */
    public function createFileInfos($asset) {

        $assetId        = Utilities::getEntityId($asset, 'WindowsAzure\MediaServices\Models\Asset');
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
     * Get list of asset files. If asset and assetFile both not null filter is equal to assetFile.
     *
     * @param WindowsAzure\MediaServices\Models\AssetFile|string    $assetFile  AssetFile data or assetFile Id to filter file list
     * @param WindowsAzure\MediaServices\Models\Asset|string        $asset      Asset data or asset Id to filter file list
     *
     * @return array
     */
    public function getAssetFiles($assetFile = null, $asset = null) {

        if (($assetFile == null) && ($asset == null)) {
            $path = 'Files';
        }

        if ($asset != null) {
            $assetId = Utilities::getEntityId($asset, 'WindowsAzure\MediaServices\Models\Asset');
            $path = "Assets('{$assetId}')/Files";
        }

        if ($assetFile != null) {
            $assetFileId = Utilities::getEntityId($assetFile, 'WindowsAzure\Mediaservices\Models\AssetFile');
            $path = "Files('{$assetFileId}')";
        }

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

        $feed = new Feed();
        $feed->parseXml($response->getBody());
        $entries = $feed->getEntry();
        $result = array();
        if (is_array($entries)) {
            foreach($entries as $entry) {
                $properties = $this->getPropertiesFromAtomEntry($entry);
                if (!empty($properties)) {
                    $result[] = AssetFile::createFromOptions($properties);
                }
            }
        }

        return $result;
    }

    /**
     * Upload asset file to storage.
     *
     * @param WindowsAzure\MediaServices\Models\Locator $locator    Write locator for file upload
     * @param string                                    $name       Uploading file filename
     * @param string                                    $body       Uploading file content
     *
     * @return null
     */
    public function uploadAssetFile($locator, $name, $body) {

        Validate::isA($locator, 'WindowsAzure\Mediaservices\Models\Locator', 'locator');
        Validate::isString($name, 'name');
        Validate::notNull($body, 'body');

        $method      = Resources::HTTP_PUT;
        $url         = new Url($locator->getBaseUri() . '/' . $name . $locator->getContentAccessComponent());
        $filters     = array();
        $postParams  = array();
        $queryParams = array();
        $statusCode  = Resources::STATUS_CREATED;
        $headers     = array(
            Resources::CONTENT_TYPE     => Resources::BINARY_FILE_TYPE,
            Resources::X_MS_VERSION     => Resources::STORAGE_API_LATEST_VERSION,
            Resources::X_MS_BLOB_TYPE   => BlobType::BLOCK_BLOB,
        );

        $httpClient = new HttpClient();
        $httpClient->setMethod($method);
        $httpClient->setHeaders($headers);
        $httpClient->setExpectedStatusCode($statusCode);
        $httpClient->send($filters, $url);
    }
}