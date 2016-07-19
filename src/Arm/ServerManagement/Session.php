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
 * @version     Release: 0.10.0_2016, API Version: 2015-07-01-preview
 */

namespace MicrosoftAzure\Arm\ServerManagement;

use MicrosoftAzure\Common\Internal\Http\HttpClient;
use MicrosoftAzure\Common\Internal\Resources;
use MicrosoftAzure\Common\Internal\Utilities;
use MicrosoftAzure\Common\Internal\Validate;

/**
 * Session for REST API for Azure Server Management Service
 */
class Session
{
    /**
     * The service client object for the operations.
     *
     * @var ServerManagement
     */
    private $_client;

    /**
     * Creates a new instance for Session.
     *
     * @param ServerManagement, Service client for Session
     */
    public function __construct($client)
    {
        $this->_client = $client;
    }

    /**
     * Creates a session for a node
     *
     * @param string $resourceGroupName The resource group name uniquely
     * identifies the resource group within the user subscriptionId.
     * @param string $nodeName The node name (256 characters maximum).
     * @param string $session The sessionId from the user
     * @param array $sessionParameters Parameters supplied to the CreateOrUpdate operation. 
     * <pre>
     * [
     *    'properties' => [
     *       'userName' => '',
     *       'password' => ''
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
     *    'properties' => [
     *       'userName' => '',
     *       'created' => '',
     *       'updated' => ''
     *    ]
     * ];
     * </pre>
     * When the resposne status is Created(201), 
     * <pre>
     * [
     *    'properties' => [
     *       'userName' => '',
     *       'created' => '',
     *       'updated' => ''
     *    ]
     * ];
     * </pre>
     * Empty array with resposne status Accepted(202).<br>
     */
    public function create($resourceGroupName, $nodeName, $session, array $sessionParameters, array $customHeaders = [])
    {
        $response = $this->begincreateAsync($resourceGroupName, $nodeName, $session, $sessionParameters, $customHeaders);

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
     * Creates a session for a node
     *
     * @param string $resourceGroupName The resource group name uniquely
     * identifies the resource group within the user subscriptionId.
     * @param string $nodeName The node name (256 characters maximum).
     * @param string $session The sessionId from the user
     * @param array $sessionParameters Parameters supplied to the CreateOrUpdate operation. 
     * <pre>
     * [
     *    'properties' => [
     *       'userName' => '',
     *       'password' => ''
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
     *    'properties' => [
     *       'userName' => '',
     *       'created' => '',
     *       'updated' => ''
     *    ]
     * ];
     * </pre>
     * When the resposne status is Created(201), 
     * <pre>
     * [
     *    'properties' => [
     *       'userName' => '',
     *       'created' => '',
     *       'updated' => ''
     *    ]
     * ];
     * </pre>
     * Empty array with resposne status Accepted(202).<br>
     */
    public function beginCreate($resourceGroupName, $nodeName, $session, array $sessionParameters, array $customHeaders = [])
    {
        $response = $this->beginCreateAsync($resourceGroupName, $nodeName, $session, $sessionParameters, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Creates a session for a node
     *
     * @param string $resourceGroupName The resource group name uniquely
     * identifies the resource group within the user subscriptionId.
     * @param string $nodeName The node name (256 characters maximum).
     * @param string $session The sessionId from the user
     * @param array $sessionParameters Parameters supplied to the CreateOrUpdate operation. 
     * <pre>
     * [
     *    'properties' => [
     *       'userName' => '',
     *       'password' => ''
     *    ]
     * ];
     * </pre>
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function beginCreateAsync($resourceGroupName, $nodeName, $session, array $sessionParameters, array $customHeaders = [])
    {
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }
        if ($resourceGroupName == null) {
            Validate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($nodeName == null) {
            Validate::notNullOrEmpty($nodeName, '$nodeName');
        }
        if ($session == null) {
            Validate::notNullOrEmpty($session, '$session');
        }
        if ($sessionParameters == null) {
            Validate::notNullOrEmpty($sessionParameters, '$sessionParameters');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ServerManagement/nodes/{nodeName}/sessions/{session}';
        $statusCodes = [200, 201, 202];
        $method = 'PUT';

        $path = strtr($path, ['{subscriptionId}' => $this->_client->getSubscriptionId(), '{resourceGroupName}' => $resourceGroupName, '{nodeName}' => $nodeName, '{session}' => $session]);
        $queryParams = ['api-version' => $this->_client->getApiVersion()];
        $headers = $customHeaders;
        if ($this->_client->getAcceptLanguage() != null) {
            $headers['accept-language'] = $this->_client->getAcceptLanguage();
        }
        if ($this->_client->getGenerateClientRequestId()) {
            $headers[Resources::X_MS_REQUEST_ID] = Utilities::getGuid();
        }

        $headers['Content-Type'] = 'application/json; charset=utf-8';
        $body = $this->_client->getDataSerializer()->serialize($sessionParameters);

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
     * Deletes a session for a node
     *
     * @param string $resourceGroupName The resource group name uniquely
     * identifies the resource group within the user subscriptionId.
     * @param string $nodeName The node name (256 characters maximum).
     * @param string $session The sessionId from the user
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * Empty array with resposne status OK(200).<br>
     * Empty array with resposne status NoContent(204).<br>
     */
    public function delete($resourceGroupName, $nodeName, $session, array $customHeaders = [])
    {
        $response = $this->deleteAsync($resourceGroupName, $nodeName, $session, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Deletes a session for a node
     *
     * @param string $resourceGroupName The resource group name uniquely
     * identifies the resource group within the user subscriptionId.
     * @param string $nodeName The node name (256 characters maximum).
     * @param string $session The sessionId from the user
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function deleteAsync($resourceGroupName, $nodeName, $session, array $customHeaders = [])
    {
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }
        if ($resourceGroupName == null) {
            Validate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($nodeName == null) {
            Validate::notNullOrEmpty($nodeName, '$nodeName');
        }
        if ($session == null) {
            Validate::notNullOrEmpty($session, '$session');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ServerManagement/nodes/{nodeName}/sessions/{session}';
        $statusCodes = [200, 204];
        $method = 'DELETE';

        $path = strtr($path, ['{subscriptionId}' => $this->_client->getSubscriptionId(), '{resourceGroupName}' => $resourceGroupName, '{nodeName}' => $nodeName, '{session}' => $session]);
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
     * Gets a session for a node
     *
     * @param string $resourceGroupName The resource group name uniquely
     * identifies the resource group within the user subscriptionId.
     * @param string $nodeName The node name (256 characters maximum).
     * @param string $session The sessionId from the user
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is OK(200), 
     * <pre>
     * [
     *    'properties' => [
     *       'userName' => '',
     *       'created' => '',
     *       'updated' => ''
     *    ]
     * ];
     * </pre>
     */
    public function get($resourceGroupName, $nodeName, $session, array $customHeaders = [])
    {
        $response = $this->getAsync($resourceGroupName, $nodeName, $session, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Gets a session for a node
     *
     * @param string $resourceGroupName The resource group name uniquely
     * identifies the resource group within the user subscriptionId.
     * @param string $nodeName The node name (256 characters maximum).
     * @param string $session The sessionId from the user
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function getAsync($resourceGroupName, $nodeName, $session, array $customHeaders = [])
    {
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }
        if ($resourceGroupName == null) {
            Validate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($nodeName == null) {
            Validate::notNullOrEmpty($nodeName, '$nodeName');
        }
        if ($session == null) {
            Validate::notNullOrEmpty($session, '$session');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ServerManagement/nodes/{nodeName}/sessions/{session}';
        $statusCodes = [200];
        $method = 'GET';

        $path = strtr($path, ['{subscriptionId}' => $this->_client->getSubscriptionId(), '{resourceGroupName}' => $resourceGroupName, '{nodeName}' => $nodeName, '{session}' => $session]);
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
}
