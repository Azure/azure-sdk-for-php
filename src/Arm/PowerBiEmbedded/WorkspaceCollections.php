<?php

/**
 * Code generated by Microsoft (R) AutoRest Code Generator 0.17.0.0
 * Changes may cause incorrect behavior and will be lost if the code is
 * regenerated.
 *
 * PHP version: 5.5
 *
 * @category    Microsoft
 *
 * @author      Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright   2016 Microsoft Corporation
 * @license     https://github.com/Azure/azure-sdk-for-php/blob/arm/LICENSE
 *
 * @link        https://github.com/Azure/azure-sdk-for-php/tree/arm
 *
 * @version     Release: 0.10.0_2016, API Version: 2016-01-29
 */

namespace MicrosoftAzure\Arm\PowerBiEmbedded;

use MicrosoftAzure\Common\Internal\Http\HttpClient;
use MicrosoftAzure\Common\Internal\Resources;
use MicrosoftAzure\Common\Internal\Utilities;
use MicrosoftAzure\Common\Internal\Validate;

/**
 * WorkspaceCollections for Client to manage your Power BI embedded workspace
 * collections and retrieve workspaces.
 */
class WorkspaceCollections
{
    /**
     * The service client object for the operations.
     *
     * @var PowerBIEmbeddedManagementClient
     */
    private $_client;

    /**
     * Creates a new instance for WorkspaceCollections.
     *
     * @param PowerBIEmbeddedManagementClient, Service client for WorkspaceCollections
     */
    public function __construct($client)
    {
        $this->_client = $client;
    }

    /**
     * Retrieves an existing Power BI Workspace Collection.
     *
     * @param string $resourceGroupName Azure resource group
     * @param string $workspaceCollectionName Power BI Embedded workspace
     * collection name
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is OK(200), 
     * <pre>
     * [
     *    'id' => '',
     *    'name' => '',
     *    'type' => '',
     *    'location' => '',
     *    'tags' => '',
     *    'sku' => [
     *       'name' => 'S1',
     *       'tier' => 'Standard'
     *    ],
     *    'properties' => ''
     * ];
     * </pre>
     */
    public function getByName($resourceGroupName, $workspaceCollectionName, array $customHeaders = [])
    {
        $response = $this->getByNameAsync($resourceGroupName, $workspaceCollectionName, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Retrieves an existing Power BI Workspace Collection.
     *
     * @param string $resourceGroupName Azure resource group
     * @param string $workspaceCollectionName Power BI Embedded workspace
     * collection name
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function getByNameAsync($resourceGroupName, $workspaceCollectionName, array $customHeaders = [])
    {
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }
        if ($resourceGroupName == null) {
            Validate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($workspaceCollectionName == null) {
            Validate::notNullOrEmpty($workspaceCollectionName, '$workspaceCollectionName');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.PowerBI/workspaceCollections/{workspaceCollectionName}';
        $statusCodes = [200];
        $method = 'GET';

        $path = strtr($path, ['{subscriptionId}' => $this->_client->getSubscriptionId(), '{resourceGroupName}' => $resourceGroupName, '{workspaceCollectionName}' => $workspaceCollectionName]);
        $queryParams = ['api-version' => $this->_client->getApiVersion()];
        $headers = $customHeaders;
        if ($this->_client->getAcceptLanguage() != null) {
            $headers['accept-language'] = $this->_client->getAcceptLanguage();
        }
        if ($this->_client->getGenerateClientRequestId()) {
            $headers[Resources::X_MS_REQUEST_ID] = Utilities::getGuid();
        }

        $body = '';

        $response = HttpClient::send(
            $method,
            $headers,
            $queryParams,
            [],
            $this->_client->getUrl($path),
            $statusCodes,
            $body,
            $this->_client->getFilters()
        );

        return $response;
    }

    /**
     * Creates a new Power BI Workspace Collection with the specified properties.
     * A Power BI Workspace Collection contains one or more Power BI Workspaces
     * and can be used to provision keys that provide API access to those Power
     * BI Workspaces.
     *
     * @param string $resourceGroupName Azure resource group
     * @param string $workspaceCollectionName Power BI Embedded workspace
     * collection name
     * @param array $body Create workspace collection request 
     * <pre>
     * [
     *    'location' => '',
     *    'tags' => '',
     *    'sku' => [
     *       'name' => 'S1',
     *       'tier' => 'Standard'
     *    ]
     * ];
     * </pre>
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is OK(200), 
     * <pre>
     * [
     *    'id' => '',
     *    'name' => '',
     *    'type' => '',
     *    'location' => '',
     *    'tags' => '',
     *    'sku' => [
     *       'name' => 'S1',
     *       'tier' => 'Standard'
     *    ],
     *    'properties' => ''
     * ];
     * </pre>
     */
    public function create($resourceGroupName, $workspaceCollectionName, array $body, array $customHeaders = [])
    {
        $response = $this->createAsync($resourceGroupName, $workspaceCollectionName, $body, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Creates a new Power BI Workspace Collection with the specified properties.
     * A Power BI Workspace Collection contains one or more Power BI Workspaces
     * and can be used to provision keys that provide API access to those Power
     * BI Workspaces.
     *
     * @param string $resourceGroupName Azure resource group
     * @param string $workspaceCollectionName Power BI Embedded workspace
     * collection name
     * @param array $body Create workspace collection request 
     * <pre>
     * [
     *    'location' => '',
     *    'tags' => '',
     *    'sku' => [
     *       'name' => 'S1',
     *       'tier' => 'Standard'
     *    ]
     * ];
     * </pre>
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function createAsync($resourceGroupName, $workspaceCollectionName, array $body, array $customHeaders = [])
    {
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }
        if ($resourceGroupName == null) {
            Validate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($workspaceCollectionName == null) {
            Validate::notNullOrEmpty($workspaceCollectionName, '$workspaceCollectionName');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }
        if ($body == null) {
            Validate::notNullOrEmpty($body, '$body');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.PowerBI/workspaceCollections/{workspaceCollectionName}';
        $statusCodes = [200];
        $method = 'PUT';

        $path = strtr($path, ['{subscriptionId}' => $this->_client->getSubscriptionId(), '{resourceGroupName}' => $resourceGroupName, '{workspaceCollectionName}' => $workspaceCollectionName]);
        $queryParams = ['api-version' => $this->_client->getApiVersion()];
        $headers = $customHeaders;
        if ($this->_client->getAcceptLanguage() != null) {
            $headers['accept-language'] = $this->_client->getAcceptLanguage();
        }
        if ($this->_client->getGenerateClientRequestId()) {
            $headers[Resources::X_MS_REQUEST_ID] = Utilities::getGuid();
        }

        $headers['Content-Type'] = 'application/json; charset=utf-8';
        $body = $this->_client->getDataSerializer()->serialize($body);

        $response = HttpClient::send(
            $method,
            $headers,
            $queryParams,
            [],
            $this->_client->getUrl($path),
            $statusCodes,
            $body,
            $this->_client->getFilters()
        );

        return $response;
    }

    /**
     * Update an existing Power BI Workspace Collection with the specified
     * properties.
     *
     * @param string $resourceGroupName Azure resource group
     * @param string $workspaceCollectionName Power BI Embedded workspace
     * collection name
     * @param array $body Update workspace collection request 
     * <pre>
     * [
     *    'tags' => '',
     *    'sku' => [
     *       'name' => 'S1',
     *       'tier' => 'Standard'
     *    ]
     * ];
     * </pre>
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is OK(200), 
     * <pre>
     * [
     *    'id' => '',
     *    'name' => '',
     *    'type' => '',
     *    'location' => '',
     *    'tags' => '',
     *    'sku' => [
     *       'name' => 'S1',
     *       'tier' => 'Standard'
     *    ],
     *    'properties' => ''
     * ];
     * </pre>
     */
    public function update($resourceGroupName, $workspaceCollectionName, array $body, array $customHeaders = [])
    {
        $response = $this->updateAsync($resourceGroupName, $workspaceCollectionName, $body, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Update an existing Power BI Workspace Collection with the specified
     * properties.
     *
     * @param string $resourceGroupName Azure resource group
     * @param string $workspaceCollectionName Power BI Embedded workspace
     * collection name
     * @param array $body Update workspace collection request 
     * <pre>
     * [
     *    'tags' => '',
     *    'sku' => [
     *       'name' => 'S1',
     *       'tier' => 'Standard'
     *    ]
     * ];
     * </pre>
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function updateAsync($resourceGroupName, $workspaceCollectionName, array $body, array $customHeaders = [])
    {
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }
        if ($resourceGroupName == null) {
            Validate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($workspaceCollectionName == null) {
            Validate::notNullOrEmpty($workspaceCollectionName, '$workspaceCollectionName');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }
        if ($body == null) {
            Validate::notNullOrEmpty($body, '$body');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.PowerBI/workspaceCollections/{workspaceCollectionName}';
        $statusCodes = [200];
        $method = 'PATCH';

        $path = strtr($path, ['{subscriptionId}' => $this->_client->getSubscriptionId(), '{resourceGroupName}' => $resourceGroupName, '{workspaceCollectionName}' => $workspaceCollectionName]);
        $queryParams = ['api-version' => $this->_client->getApiVersion()];
        $headers = $customHeaders;
        if ($this->_client->getAcceptLanguage() != null) {
            $headers['accept-language'] = $this->_client->getAcceptLanguage();
        }
        if ($this->_client->getGenerateClientRequestId()) {
            $headers[Resources::X_MS_REQUEST_ID] = Utilities::getGuid();
        }

        $headers['Content-Type'] = 'application/json; charset=utf-8';
        $body = $this->_client->getDataSerializer()->serialize($body);

        $response = HttpClient::send(
            $method,
            $headers,
            $queryParams,
            [],
            $this->_client->getUrl($path),
            $statusCodes,
            $body,
            $this->_client->getFilters()
        );

        return $response;
    }

    /**
     * Delete a Power BI Workspace Collection.
     *
     * @param string $resourceGroupName Azure resource group
     * @param string $workspaceCollectionName Power BI Embedded workspace
     * collection name
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * Empty array with resposne status Accepted(202).<br>
     */
    public function delete($resourceGroupName, $workspaceCollectionName, array $customHeaders = [])
    {
        $response = $this->begindeleteAsync($resourceGroupName, $workspaceCollectionName, $customHeaders);

        if ($response->getStatusCode() !== Resources::STATUS_OK) {
            $this->_client->awaitAsync($response);
        }

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Delete a Power BI Workspace Collection.
     *
     * @param string $resourceGroupName Azure resource group
     * @param string $workspaceCollectionName Power BI Embedded workspace
     * collection name
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * Empty array with resposne status Accepted(202).<br>
     */
    public function beginDelete($resourceGroupName, $workspaceCollectionName, array $customHeaders = [])
    {
        $response = $this->beginDeleteAsync($resourceGroupName, $workspaceCollectionName, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Delete a Power BI Workspace Collection.
     *
     * @param string $resourceGroupName Azure resource group
     * @param string $workspaceCollectionName Power BI Embedded workspace
     * collection name
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function beginDeleteAsync($resourceGroupName, $workspaceCollectionName, array $customHeaders = [])
    {
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }
        if ($resourceGroupName == null) {
            Validate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($workspaceCollectionName == null) {
            Validate::notNullOrEmpty($workspaceCollectionName, '$workspaceCollectionName');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.PowerBI/workspaceCollections/{workspaceCollectionName}';
        $statusCodes = [202];
        $method = 'DELETE';

        $path = strtr($path, ['{subscriptionId}' => $this->_client->getSubscriptionId(), '{resourceGroupName}' => $resourceGroupName, '{workspaceCollectionName}' => $workspaceCollectionName]);
        $queryParams = ['api-version' => $this->_client->getApiVersion()];
        $headers = $customHeaders;
        if ($this->_client->getAcceptLanguage() != null) {
            $headers['accept-language'] = $this->_client->getAcceptLanguage();
        }
        if ($this->_client->getGenerateClientRequestId()) {
            $headers[Resources::X_MS_REQUEST_ID] = Utilities::getGuid();
        }

        $body = '';

        $response = HttpClient::send(
            $method,
            $headers,
            $queryParams,
            [],
            $this->_client->getUrl($path),
            $statusCodes,
            $body,
            $this->_client->getFilters()
        );

        return $response;
    }

    /**
     * Check that the specified Power BI Workspace Collection name is valid and
     * not in use.
     *
     * @param string $location Azure location
     * @param array $body Check name availability request 
     * <pre>
     * [
     *    'name' => '',
     *    'type' => 'Microsoft.PowerBI/workspaceCollections'
     * ];
     * </pre>
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is OK(200), 
     * <pre>
     * [
     *    'nameAvailable' => 'false',
     *    'reason' => 'Unavailable|Invalid',
     *    'message' => ''
     * ];
     * </pre>
     */
    public function checkNameAvailability($location, array $body, array $customHeaders = [])
    {
        $response = $this->checkNameAvailabilityAsync($location, $body, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Check that the specified Power BI Workspace Collection name is valid and
     * not in use.
     *
     * @param string $location Azure location
     * @param array $body Check name availability request 
     * <pre>
     * [
     *    'name' => '',
     *    'type' => 'Microsoft.PowerBI/workspaceCollections'
     * ];
     * </pre>
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function checkNameAvailabilityAsync($location, array $body, array $customHeaders = [])
    {
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }
        if ($location == null) {
            Validate::notNullOrEmpty($location, '$location');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }
        if ($body == null) {
            Validate::notNullOrEmpty($body, '$body');
        }

        $path = '/subscriptions/{subscriptionId}/providers/Microsoft.PowerBI/locations/{location}/checkNameAvailability';
        $statusCodes = [200];
        $method = 'POST';

        $path = strtr($path, ['{subscriptionId}' => $this->_client->getSubscriptionId(), '{location}' => $location]);
        $queryParams = ['api-version' => $this->_client->getApiVersion()];
        $headers = $customHeaders;
        if ($this->_client->getAcceptLanguage() != null) {
            $headers['accept-language'] = $this->_client->getAcceptLanguage();
        }
        if ($this->_client->getGenerateClientRequestId()) {
            $headers[Resources::X_MS_REQUEST_ID] = Utilities::getGuid();
        }

        $headers['Content-Type'] = 'application/json; charset=utf-8';
        $body = $this->_client->getDataSerializer()->serialize($body);

        $response = HttpClient::send(
            $method,
            $headers,
            $queryParams,
            [],
            $this->_client->getUrl($path),
            $statusCodes,
            $body,
            $this->_client->getFilters()
        );

        return $response;
    }

    /**
     * Retrieves all existing Power BI Workspace Collections in the specified
     * resource group.
     *
     * @param string $resourceGroupName Azure resource group
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is OK(200), 
     * <pre>
     * [
     *    'value' => ''
     * ];
     * </pre>
     */
    public function listByResourceGroup($resourceGroupName, array $customHeaders = [])
    {
        $response = $this->listByResourceGroupAsync($resourceGroupName, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Retrieves all existing Power BI Workspace Collections in the specified
     * resource group.
     *
     * @param string $resourceGroupName Azure resource group
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function listByResourceGroupAsync($resourceGroupName, array $customHeaders = [])
    {
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }
        if ($resourceGroupName == null) {
            Validate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.PowerBI/workspaceCollections';
        $statusCodes = [200];
        $method = 'GET';

        $path = strtr($path, ['{subscriptionId}' => $this->_client->getSubscriptionId(), '{resourceGroupName}' => $resourceGroupName]);
        $queryParams = ['api-version' => $this->_client->getApiVersion()];
        $headers = $customHeaders;
        if ($this->_client->getAcceptLanguage() != null) {
            $headers['accept-language'] = $this->_client->getAcceptLanguage();
        }
        if ($this->_client->getGenerateClientRequestId()) {
            $headers[Resources::X_MS_REQUEST_ID] = Utilities::getGuid();
        }

        $body = '';

        $response = HttpClient::send(
            $method,
            $headers,
            $queryParams,
            [],
            $this->_client->getUrl($path),
            $statusCodes,
            $body,
            $this->_client->getFilters()
        );

        return $response;
    }

    /**
     * Retrieves all existing Power BI Workspace Collections in the specified
     * subscription.
     *
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is OK(200), 
     * <pre>
     * [
     *    'value' => ''
     * ];
     * </pre>
     */
    public function listBySubscription(array $customHeaders = [])
    {
        $response = $this->listBySubscriptionAsync($customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Retrieves all existing Power BI Workspace Collections in the specified
     * subscription.
     *
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function listBySubscriptionAsync(array $customHeaders = [])
    {
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }

        $path = '/subscriptions/{subscriptionId}/providers/Microsoft.PowerBI/workspaceCollections';
        $statusCodes = [200];
        $method = 'GET';

        $path = strtr($path, ['{subscriptionId}' => $this->_client->getSubscriptionId()]);
        $queryParams = ['api-version' => $this->_client->getApiVersion()];
        $headers = $customHeaders;
        if ($this->_client->getAcceptLanguage() != null) {
            $headers['accept-language'] = $this->_client->getAcceptLanguage();
        }
        if ($this->_client->getGenerateClientRequestId()) {
            $headers[Resources::X_MS_REQUEST_ID] = Utilities::getGuid();
        }

        $body = '';

        $response = HttpClient::send(
            $method,
            $headers,
            $queryParams,
            [],
            $this->_client->getUrl($path),
            $statusCodes,
            $body,
            $this->_client->getFilters()
        );

        return $response;
    }

    /**
     * Retrieves the primary and secondary access keys for the specified Power BI
     * Workspace Collection.
     *
     * @param string $resourceGroupName Azure resource group
     * @param string $workspaceCollectionName Power BI Embedded workspace
     * collection name
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is OK(200), 
     * <pre>
     * [
     *    'key1' => '',
     *    'key2' => ''
     * ];
     * </pre>
     */
    public function getAccessKeys($resourceGroupName, $workspaceCollectionName, array $customHeaders = [])
    {
        $response = $this->getAccessKeysAsync($resourceGroupName, $workspaceCollectionName, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Retrieves the primary and secondary access keys for the specified Power BI
     * Workspace Collection.
     *
     * @param string $resourceGroupName Azure resource group
     * @param string $workspaceCollectionName Power BI Embedded workspace
     * collection name
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function getAccessKeysAsync($resourceGroupName, $workspaceCollectionName, array $customHeaders = [])
    {
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }
        if ($resourceGroupName == null) {
            Validate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($workspaceCollectionName == null) {
            Validate::notNullOrEmpty($workspaceCollectionName, '$workspaceCollectionName');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.PowerBI/workspaceCollections/{workspaceCollectionName}/listKeys';
        $statusCodes = [200];
        $method = 'POST';

        $path = strtr($path, ['{subscriptionId}' => $this->_client->getSubscriptionId(), '{resourceGroupName}' => $resourceGroupName, '{workspaceCollectionName}' => $workspaceCollectionName]);
        $queryParams = ['api-version' => $this->_client->getApiVersion()];
        $headers = $customHeaders;
        if ($this->_client->getAcceptLanguage() != null) {
            $headers['accept-language'] = $this->_client->getAcceptLanguage();
        }
        if ($this->_client->getGenerateClientRequestId()) {
            $headers[Resources::X_MS_REQUEST_ID] = Utilities::getGuid();
        }

        $body = '';

        $response = HttpClient::send(
            $method,
            $headers,
            $queryParams,
            [],
            $this->_client->getUrl($path),
            $statusCodes,
            $body,
            $this->_client->getFilters()
        );

        return $response;
    }

    /**
     * Regenerates the primary or secondary access key for the specified Power BI
     * Workspace Collection.
     *
     * @param string $resourceGroupName Azure resource group
     * @param string $workspaceCollectionName Power BI Embedded workspace
     * collection name
     * @param array $body Access key to regenerate 
     * <pre>
     * [
     *    'keyName' => 'key1|key2'
     * ];
     * </pre>
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is OK(200), 
     * <pre>
     * [
     *    'key1' => '',
     *    'key2' => ''
     * ];
     * </pre>
     */
    public function regenerateKey($resourceGroupName, $workspaceCollectionName, array $body, array $customHeaders = [])
    {
        $response = $this->regenerateKeyAsync($resourceGroupName, $workspaceCollectionName, $body, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Regenerates the primary or secondary access key for the specified Power BI
     * Workspace Collection.
     *
     * @param string $resourceGroupName Azure resource group
     * @param string $workspaceCollectionName Power BI Embedded workspace
     * collection name
     * @param array $body Access key to regenerate 
     * <pre>
     * [
     *    'keyName' => 'key1|key2'
     * ];
     * </pre>
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function regenerateKeyAsync($resourceGroupName, $workspaceCollectionName, array $body, array $customHeaders = [])
    {
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }
        if ($resourceGroupName == null) {
            Validate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($workspaceCollectionName == null) {
            Validate::notNullOrEmpty($workspaceCollectionName, '$workspaceCollectionName');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }
        if ($body == null) {
            Validate::notNullOrEmpty($body, '$body');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.PowerBI/workspaceCollections/{workspaceCollectionName}/regenerateKey';
        $statusCodes = [200];
        $method = 'POST';

        $path = strtr($path, ['{subscriptionId}' => $this->_client->getSubscriptionId(), '{resourceGroupName}' => $resourceGroupName, '{workspaceCollectionName}' => $workspaceCollectionName]);
        $queryParams = ['api-version' => $this->_client->getApiVersion()];
        $headers = $customHeaders;
        if ($this->_client->getAcceptLanguage() != null) {
            $headers['accept-language'] = $this->_client->getAcceptLanguage();
        }
        if ($this->_client->getGenerateClientRequestId()) {
            $headers[Resources::X_MS_REQUEST_ID] = Utilities::getGuid();
        }

        $headers['Content-Type'] = 'application/json; charset=utf-8';
        $body = $this->_client->getDataSerializer()->serialize($body);

        $response = HttpClient::send(
            $method,
            $headers,
            $queryParams,
            [],
            $this->_client->getUrl($path),
            $statusCodes,
            $body,
            $this->_client->getFilters()
        );

        return $response;
    }

    /**
     * Migrates an existing Power BI Workspace Collection to a different resource
     * group and/or subscription.
     *
     * @param string $resourceGroupName Azure resource group
     * @param array $body Workspace migration request 
     * <pre>
     * [
     *    'targetResourceGroup' => '',
     *    'resources' => ''
     * ];
     * </pre>
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * Empty array with resposne status OK(200).<br>
     */
    public function migrate($resourceGroupName, array $body, array $customHeaders = [])
    {
        $response = $this->migrateAsync($resourceGroupName, $body, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Migrates an existing Power BI Workspace Collection to a different resource
     * group and/or subscription.
     *
     * @param string $resourceGroupName Azure resource group
     * @param array $body Workspace migration request 
     * <pre>
     * [
     *    'targetResourceGroup' => '',
     *    'resources' => ''
     * ];
     * </pre>
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function migrateAsync($resourceGroupName, array $body, array $customHeaders = [])
    {
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }
        if ($resourceGroupName == null) {
            Validate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }
        if ($body == null) {
            Validate::notNullOrEmpty($body, '$body');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/moveResources';
        $statusCodes = [200];
        $method = 'POST';

        $path = strtr($path, ['{subscriptionId}' => $this->_client->getSubscriptionId(), '{resourceGroupName}' => $resourceGroupName]);
        $queryParams = ['api-version' => $this->_client->getApiVersion()];
        $headers = $customHeaders;
        if ($this->_client->getAcceptLanguage() != null) {
            $headers['accept-language'] = $this->_client->getAcceptLanguage();
        }
        if ($this->_client->getGenerateClientRequestId()) {
            $headers[Resources::X_MS_REQUEST_ID] = Utilities::getGuid();
        }

        $headers['Content-Type'] = 'application/json; charset=utf-8';
        $body = $this->_client->getDataSerializer()->serialize($body);

        $response = HttpClient::send(
            $method,
            $headers,
            $queryParams,
            [],
            $this->_client->getUrl($path),
            $statusCodes,
            $body,
            $this->_client->getFilters()
        );

        return $response;
    }
}
