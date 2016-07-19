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
 * @version     Release: 0.10.0_2016, API Version: 2016-06-01
 */

namespace MicrosoftAzure\Arm\Network;

use MicrosoftAzure\Common\Internal\Http\HttpClient;
use MicrosoftAzure\Common\Internal\Resources;
use MicrosoftAzure\Common\Internal\Utilities;
use MicrosoftAzure\Common\Internal\Validate;

/**
 * Routes for The Microsoft Azure Network management API provides a RESTful
 * set of web services that interact with Microsoft Azure Networks service to
 * manage your network resrources. The API has entities that capture the
 * relationship between an end user and the Microsoft Azure Networks service.
 */
class Routes
{
    /**
     * The service client object for the operations.
     *
     * @var NetworkManagementClient
     */
    private $_client;

    /**
     * Creates a new instance for Routes.
     *
     * @param NetworkManagementClient, Service client for Routes
     */
    public function __construct($client)
    {
        $this->_client = $client;
    }

    /**
     * The delete route operation deletes the specified route from a route table.
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $routeTableName The name of the route table.
     * @param string $routeName The name of the route.
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * Empty array with resposne status Accepted(202).<br>
     * Empty array with resposne status OK(200).<br>
     * Empty array with resposne status NoContent(204).<br>
     */
    public function delete($resourceGroupName, $routeTableName, $routeName, array $customHeaders = [])
    {
        $response = $this->begindeleteAsync($resourceGroupName, $routeTableName, $routeName, $customHeaders);

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
     * The delete route operation deletes the specified route from a route table.
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $routeTableName The name of the route table.
     * @param string $routeName The name of the route.
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * Empty array with resposne status Accepted(202).<br>
     * Empty array with resposne status OK(200).<br>
     * Empty array with resposne status NoContent(204).<br>
     */
    public function beginDelete($resourceGroupName, $routeTableName, $routeName, array $customHeaders = [])
    {
        $response = $this->beginDeleteAsync($resourceGroupName, $routeTableName, $routeName, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * The delete route operation deletes the specified route from a route table.
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $routeTableName The name of the route table.
     * @param string $routeName The name of the route.
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function beginDeleteAsync($resourceGroupName, $routeTableName, $routeName, array $customHeaders = [])
    {
        if ($resourceGroupName == null) {
            Validate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($routeTableName == null) {
            Validate::notNullOrEmpty($routeTableName, '$routeTableName');
        }
        if ($routeName == null) {
            Validate::notNullOrEmpty($routeName, '$routeName');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/routeTables/{routeTableName}/routes/{routeName}';
        $statusCodes = [202, 200, 204];
        $method = 'DELETE';

        $path = strtr($path, ['{resourceGroupName}' => $resourceGroupName, '{routeTableName}' => $routeTableName, '{routeName}' => $routeName, '{subscriptionId}' => $this->_client->getSubscriptionId()]);
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
     * The Get route operation retreives information about the specified route
     * from the route table.
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $routeTableName The name of the route table.
     * @param string $routeName The name of the route.
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is OK(200), 
     * <pre>
     * [
     *    'properties' => [
     *       'addressPrefix' => '',
     *       'nextHopType' => 'VirtualNetworkGateway|VnetLocal|Internet|VirtualAppliance|None',
     *       'nextHopIpAddress' => '',
     *       'provisioningState' => ''
     *    ],
     *    'name' => '',
     *    'etag' => ''
     * ];
     * </pre>
     */
    public function get($resourceGroupName, $routeTableName, $routeName, array $customHeaders = [])
    {
        $response = $this->getAsync($resourceGroupName, $routeTableName, $routeName, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * The Get route operation retreives information about the specified route
     * from the route table.
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $routeTableName The name of the route table.
     * @param string $routeName The name of the route.
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function getAsync($resourceGroupName, $routeTableName, $routeName, array $customHeaders = [])
    {
        if ($resourceGroupName == null) {
            Validate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($routeTableName == null) {
            Validate::notNullOrEmpty($routeTableName, '$routeTableName');
        }
        if ($routeName == null) {
            Validate::notNullOrEmpty($routeName, '$routeName');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/routeTables/{routeTableName}/routes/{routeName}';
        $statusCodes = [200];
        $method = 'GET';

        $path = strtr($path, ['{resourceGroupName}' => $resourceGroupName, '{routeTableName}' => $routeTableName, '{routeName}' => $routeName, '{subscriptionId}' => $this->_client->getSubscriptionId()]);
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
     * The Put route operation creates/updates a route in the specified route table
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $routeTableName The name of the route table.
     * @param string $routeName The name of the route.
     * @param array $routeParameters Parameters supplied to the create/update routeoperation 
     * <pre>
     * [
     *    'properties' => [
     *       'addressPrefix' => '',
     *       'nextHopType' => 'VirtualNetworkGateway|VnetLocal|Internet|VirtualAppliance|None',
     *       'nextHopIpAddress' => '',
     *       'provisioningState' => ''
     *    ],
     *    'name' => '',
     *    'etag' => ''
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
     *       'addressPrefix' => '',
     *       'nextHopType' => 'VirtualNetworkGateway|VnetLocal|Internet|VirtualAppliance|None',
     *       'nextHopIpAddress' => '',
     *       'provisioningState' => ''
     *    ],
     *    'name' => '',
     *    'etag' => ''
     * ];
     * </pre>
     * When the resposne status is Created(201), 
     * <pre>
     * [
     *    'properties' => [
     *       'addressPrefix' => '',
     *       'nextHopType' => 'VirtualNetworkGateway|VnetLocal|Internet|VirtualAppliance|None',
     *       'nextHopIpAddress' => '',
     *       'provisioningState' => ''
     *    ],
     *    'name' => '',
     *    'etag' => ''
     * ];
     * </pre>
     */
    public function createOrUpdate($resourceGroupName, $routeTableName, $routeName, array $routeParameters, array $customHeaders = [])
    {
        $response = $this->begincreateOrUpdateAsync($resourceGroupName, $routeTableName, $routeName, $routeParameters, $customHeaders);

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
     * The Put route operation creates/updates a route in the specified route table
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $routeTableName The name of the route table.
     * @param string $routeName The name of the route.
     * @param array $routeParameters Parameters supplied to the create/update routeoperation 
     * <pre>
     * [
     *    'properties' => [
     *       'addressPrefix' => '',
     *       'nextHopType' => 'VirtualNetworkGateway|VnetLocal|Internet|VirtualAppliance|None',
     *       'nextHopIpAddress' => '',
     *       'provisioningState' => ''
     *    ],
     *    'name' => '',
     *    'etag' => ''
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
     *       'addressPrefix' => '',
     *       'nextHopType' => 'VirtualNetworkGateway|VnetLocal|Internet|VirtualAppliance|None',
     *       'nextHopIpAddress' => '',
     *       'provisioningState' => ''
     *    ],
     *    'name' => '',
     *    'etag' => ''
     * ];
     * </pre>
     * When the resposne status is Created(201), 
     * <pre>
     * [
     *    'properties' => [
     *       'addressPrefix' => '',
     *       'nextHopType' => 'VirtualNetworkGateway|VnetLocal|Internet|VirtualAppliance|None',
     *       'nextHopIpAddress' => '',
     *       'provisioningState' => ''
     *    ],
     *    'name' => '',
     *    'etag' => ''
     * ];
     * </pre>
     */
    public function beginCreateOrUpdate($resourceGroupName, $routeTableName, $routeName, array $routeParameters, array $customHeaders = [])
    {
        $response = $this->beginCreateOrUpdateAsync($resourceGroupName, $routeTableName, $routeName, $routeParameters, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * The Put route operation creates/updates a route in the specified route table
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $routeTableName The name of the route table.
     * @param string $routeName The name of the route.
     * @param array $routeParameters Parameters supplied to the create/update routeoperation 
     * <pre>
     * [
     *    'properties' => [
     *       'addressPrefix' => '',
     *       'nextHopType' => 'VirtualNetworkGateway|VnetLocal|Internet|VirtualAppliance|None',
     *       'nextHopIpAddress' => '',
     *       'provisioningState' => ''
     *    ],
     *    'name' => '',
     *    'etag' => ''
     * ];
     * </pre>
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function beginCreateOrUpdateAsync($resourceGroupName, $routeTableName, $routeName, array $routeParameters, array $customHeaders = [])
    {
        if ($resourceGroupName == null) {
            Validate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($routeTableName == null) {
            Validate::notNullOrEmpty($routeTableName, '$routeTableName');
        }
        if ($routeName == null) {
            Validate::notNullOrEmpty($routeName, '$routeName');
        }
        if ($routeParameters == null) {
            Validate::notNullOrEmpty($routeParameters, '$routeParameters');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/routeTables/{routeTableName}/routes/{routeName}';
        $statusCodes = [200, 201];
        $method = 'PUT';

        $path = strtr($path, ['{resourceGroupName}' => $resourceGroupName, '{routeTableName}' => $routeTableName, '{routeName}' => $routeName, '{subscriptionId}' => $this->_client->getSubscriptionId()]);
        $queryParams = ['api-version' => $this->_client->getApiVersion()];
        $headers = $customHeaders;
        if ($this->_client->getAcceptLanguage() != null) {
            $headers['accept-language'] = $this->_client->getAcceptLanguage();
        }
        if ($this->_client->getGenerateClientRequestId()) {
            $headers[Resources::X_MS_REQUEST_ID] = Utilities::getGuid();
        }

        $headers['Content-Type'] = 'application/json; charset=utf-8';
        $body = $this->_client->getDataSerializer()->serialize($routeParameters);

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
     * The List network security rule opertion retrieves all the routes in a route
     * table.
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $routeTableName The name of the route table.
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is OK(200), 
     * <pre>
     * [
     *    'value' => '',
     *    'nextLink' => ''
     * ];
     * </pre>
     */
    public function listOperation($resourceGroupName, $routeTableName, array $customHeaders = [])
    {
        $response = $this->listOperationAsync($resourceGroupName, $routeTableName, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * The List network security rule opertion retrieves all the routes in a route
     * table.
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $routeTableName The name of the route table.
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function listOperationAsync($resourceGroupName, $routeTableName, array $customHeaders = [])
    {
        if ($resourceGroupName == null) {
            Validate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($routeTableName == null) {
            Validate::notNullOrEmpty($routeTableName, '$routeTableName');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/routeTables/{routeTableName}/routes';
        $statusCodes = [200];
        $method = 'GET';

        $path = strtr($path, ['{resourceGroupName}' => $resourceGroupName, '{routeTableName}' => $routeTableName, '{subscriptionId}' => $this->_client->getSubscriptionId()]);
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
     * The List network security rule opertion retrieves all the routes in a route
     * table.
     *
     * @param string $nextPageLink The NextLink from the previous successful call
     * to List operation.
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is OK(200), 
     * <pre>
     * [
     *    'value' => '',
     *    'nextLink' => ''
     * ];
     * </pre>
     */
    public function listNext($nextPageLink, array $customHeaders = [])
    {
        $response = $this->listNextAsync($nextPageLink, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * The List network security rule opertion retrieves all the routes in a route
     * table.
     *
     * @param string $nextPageLink The NextLink from the previous successful call
     * to List operation.
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function listNextAsync($nextPageLink, array $customHeaders = [])
    {
        if ($nextPageLink == null) {
            Validate::notNullOrEmpty($nextPageLink, '$nextPageLink');
        }

        $path = '{nextLink}';
        $statusCodes = [200];
        $method = 'GET';

        $path = strtr($path, []);
        $queryParams = [];
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
