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
use WindowsAzure\Common\Internal\Atom\Entry;
use WindowsAzure\Common\Internal\Atom\Content;
use WindowsAzure\Common\Internal\Atom\AtomProperties;

/**
 * This class constructs HTTP requests and receive HTTP responses for blob
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
        $content->addChild($properties);

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
    protected function unwrapAtomEntry($entry, &$entity) {
        Validate::notNull($entry, 'entry');
        Validate::isA($entry, 'WindowsAzure\Common\Internal\Atom\Entry', 'entry');
        Validate::notNull($entity, 'entity');

        $content = $entry->getContent();
        if (!empty($content)) {
            foreach($content->getChildren() as $child){
                if (is_a($child, 'WindowsAzure\Common\Internal\Atom\AtomProperties')) {
                    $entity->fromArray($child->getProperties());
                    return;
                }
            }
        }
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
        $this->unwrapAtomEntry($entry, $asset);

        return $asset;
    }

    /**
     * Delete asset
     *
     * @param WindowsAzure\MediaServices\Models\Asset|string   $asset  Asset data or asset Id
     */
    public function deleteAsset($asset) {
        if (is_string($asset)) {
            $assetId = $asset;
        }
        else {
            Validate::isA($asset, 'WindowsAzure\Mediaservices\Models\Asset', 'asset');
            $assetId = $asset->getId();
        }

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
        $this->unwrapAtomEntry($entry, $accessPolicy);

        return $accessPolicy;
    }

    /**
     * Delete access policy
     *
     * @param WindowsAzure\MediaServices\Models\AccessPolicy|string   $accessPolicy  Access policy data or access policy Id
     */
    public function deleteAccessPolicy($accessPolicy) {
        if (is_string($accessPolicy)) {
            $accessPolicyId = $accessPolicy;
        }
        else {
            Validate::isA($accessPolicy, 'WindowsAzure\Mediaservices\Models\AccessPolicy', 'accessPolicy');
            $accessPolicyId = $accessPolicy->getId();
        }

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
        $this->unwrapAtomEntry($entry, $locator);

        return $locator;
    }

    /**
     * Delete locator
     *
     * @param WindowsAzure\MediaServices\Models\Locator|string   $asset  Asset data or asset Id
     */
    public function deleteLocator($locator) {
        if (is_string($locator)) {
            $locatorId = $locator;
        }
        else {
            Validate::isA($locator, 'WindowsAzure\Mediaservices\Models\Locator', 'locator');
            $locatorId = $locator->getId();
        }

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
}