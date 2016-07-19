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
 * VirtualNetworkPeerings for The Microsoft Azure Network management API
 * provides a RESTful set of web services that interact with Microsoft Azure
 * Networks service to manage your network resrources. The API has entities
 * that capture the relationship between an end user and the Microsoft Azure
 * Networks service.
 */
class VirtualNetworkPeerings
{
    /**
     * The service client object for the operations.
     *
     * @var NetworkManagementClient
     */
    private $_client;

    /**
     * Creates a new instance for VirtualNetworkPeerings.
     *
     * @param NetworkManagementClient, Service client for VirtualNetworkPeerings
     */
    public function __construct($client)
    {
        $this->_client = $client;
    }

    /**
     * The delete virtual network peering operation deletes the specified peering.
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $virtualNetworkName The name of the virtual network.
     * @param string $virtualNetworkPeeringName The name of the virtual network
     * peering.
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * Empty array with resposne status OK(200).<br>
     * Empty array with resposne status NoContent(204).<br>
     * Empty array with resposne status Accepted(202).<br>
     */
    public function delete($resourceGroupName, $virtualNetworkName, $virtualNetworkPeeringName, array $customHeaders = [])
    {
        $response = $this->begindeleteAsync($resourceGroupName, $virtualNetworkName, $virtualNetworkPeeringName, $customHeaders);

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
     * The delete virtual network peering operation deletes the specified peering.
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $virtualNetworkName The name of the virtual network.
     * @param string $virtualNetworkPeeringName The name of the virtual network
     * peering.
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * Empty array with resposne status OK(200).<br>
     * Empty array with resposne status NoContent(204).<br>
     * Empty array with resposne status Accepted(202).<br>
     */
    public function beginDelete($resourceGroupName, $virtualNetworkName, $virtualNetworkPeeringName, array $customHeaders = [])
    {
        $response = $this->beginDeleteAsync($resourceGroupName, $virtualNetworkName, $virtualNetworkPeeringName, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * The delete virtual network peering operation deletes the specified peering.
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $virtualNetworkName The name of the virtual network.
     * @param string $virtualNetworkPeeringName The name of the virtual network
     * peering.
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function beginDeleteAsync($resourceGroupName, $virtualNetworkName, $virtualNetworkPeeringName, array $customHeaders = [])
    {
        if ($resourceGroupName == null) {
            Validate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($virtualNetworkName == null) {
            Validate::notNullOrEmpty($virtualNetworkName, '$virtualNetworkName');
        }
        if ($virtualNetworkPeeringName == null) {
            Validate::notNullOrEmpty($virtualNetworkPeeringName, '$virtualNetworkPeeringName');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/virtualNetworks/{virtualNetworkName}/virtualNetworkPeerings/{virtualNetworkPeeringName}';
        $statusCodes = [200, 204, 202];
        $method = 'DELETE';

        $path = strtr($path, ['{resourceGroupName}' => $resourceGroupName, '{virtualNetworkName}' => $virtualNetworkName, '{virtualNetworkPeeringName}' => $virtualNetworkPeeringName, '{subscriptionId}' => $this->_client->getSubscriptionId()]);
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
     * The Get virtual network peering operation retreives information about the
     * specified virtual network peering.
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $virtualNetworkName The name of the virtual network.
     * @param string $virtualNetworkPeeringName The name of the virtual network
     * peering.
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is OK(200), 
     * <pre>
     * [
     *    'properties' => [
     *       'allowVirtualNetworkAccess' => 'false',
     *       'allowForwardedTraffic' => 'false',
     *       'allowGatewayTransit' => 'false',
     *       'useRemoteGateways' => 'false',
     *       'remoteVirtualNetwork' => [
     *          'id' => ''
     *       ],
     *       'peeringState' => 'Initiated|Connected|Disconnected',
     *       'provisioningState' => ''
     *    ],
     *    'name' => '',
     *    'etag' => ''
     * ];
     * </pre>
     */
    public function get($resourceGroupName, $virtualNetworkName, $virtualNetworkPeeringName, array $customHeaders = [])
    {
        $response = $this->getAsync($resourceGroupName, $virtualNetworkName, $virtualNetworkPeeringName, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * The Get virtual network peering operation retreives information about the
     * specified virtual network peering.
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $virtualNetworkName The name of the virtual network.
     * @param string $virtualNetworkPeeringName The name of the virtual network
     * peering.
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function getAsync($resourceGroupName, $virtualNetworkName, $virtualNetworkPeeringName, array $customHeaders = [])
    {
        if ($resourceGroupName == null) {
            Validate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($virtualNetworkName == null) {
            Validate::notNullOrEmpty($virtualNetworkName, '$virtualNetworkName');
        }
        if ($virtualNetworkPeeringName == null) {
            Validate::notNullOrEmpty($virtualNetworkPeeringName, '$virtualNetworkPeeringName');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/virtualNetworks/{virtualNetworkName}/virtualNetworkPeerings/{virtualNetworkPeeringName}';
        $statusCodes = [200];
        $method = 'GET';

        $path = strtr($path, ['{resourceGroupName}' => $resourceGroupName, '{virtualNetworkName}' => $virtualNetworkName, '{virtualNetworkPeeringName}' => $virtualNetworkPeeringName, '{subscriptionId}' => $this->_client->getSubscriptionId()]);
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
     * The Put virtual network peering operation creates/updates a peering in the
     * specified virtual network
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $virtualNetworkName The name of the virtual network.
     * @param string $virtualNetworkPeeringName The name of the peering.
     * @param array $virtualNetworkPeeringParameters Parameters supplied to the create/update virtual
     *  network peering operation 
     * <pre>
     * [
     *    'properties' => [
     *       'allowVirtualNetworkAccess' => 'false',
     *       'allowForwardedTraffic' => 'false',
     *       'allowGatewayTransit' => 'false',
     *       'useRemoteGateways' => 'false',
     *       'remoteVirtualNetwork' => [
     *          'id' => ''
     *       ],
     *       'peeringState' => 'Initiated|Connected|Disconnected',
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
     *       'allowVirtualNetworkAccess' => 'false',
     *       'allowForwardedTraffic' => 'false',
     *       'allowGatewayTransit' => 'false',
     *       'useRemoteGateways' => 'false',
     *       'remoteVirtualNetwork' => [
     *          'id' => ''
     *       ],
     *       'peeringState' => 'Initiated|Connected|Disconnected',
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
     *       'allowVirtualNetworkAccess' => 'false',
     *       'allowForwardedTraffic' => 'false',
     *       'allowGatewayTransit' => 'false',
     *       'useRemoteGateways' => 'false',
     *       'remoteVirtualNetwork' => [
     *          'id' => ''
     *       ],
     *       'peeringState' => 'Initiated|Connected|Disconnected',
     *       'provisioningState' => ''
     *    ],
     *    'name' => '',
     *    'etag' => ''
     * ];
     * </pre>
     */
    public function createOrUpdate($resourceGroupName, $virtualNetworkName, $virtualNetworkPeeringName, array $virtualNetworkPeeringParameters, array $customHeaders = [])
    {
        $response = $this->begincreateOrUpdateAsync($resourceGroupName, $virtualNetworkName, $virtualNetworkPeeringName, $virtualNetworkPeeringParameters, $customHeaders);

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
     * The Put virtual network peering operation creates/updates a peering in the
     * specified virtual network
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $virtualNetworkName The name of the virtual network.
     * @param string $virtualNetworkPeeringName The name of the peering.
     * @param array $virtualNetworkPeeringParameters Parameters supplied to the create/update virtual
     *  network peering operation 
     * <pre>
     * [
     *    'properties' => [
     *       'allowVirtualNetworkAccess' => 'false',
     *       'allowForwardedTraffic' => 'false',
     *       'allowGatewayTransit' => 'false',
     *       'useRemoteGateways' => 'false',
     *       'remoteVirtualNetwork' => [
     *          'id' => ''
     *       ],
     *       'peeringState' => 'Initiated|Connected|Disconnected',
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
     *       'allowVirtualNetworkAccess' => 'false',
     *       'allowForwardedTraffic' => 'false',
     *       'allowGatewayTransit' => 'false',
     *       'useRemoteGateways' => 'false',
     *       'remoteVirtualNetwork' => [
     *          'id' => ''
     *       ],
     *       'peeringState' => 'Initiated|Connected|Disconnected',
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
     *       'allowVirtualNetworkAccess' => 'false',
     *       'allowForwardedTraffic' => 'false',
     *       'allowGatewayTransit' => 'false',
     *       'useRemoteGateways' => 'false',
     *       'remoteVirtualNetwork' => [
     *          'id' => ''
     *       ],
     *       'peeringState' => 'Initiated|Connected|Disconnected',
     *       'provisioningState' => ''
     *    ],
     *    'name' => '',
     *    'etag' => ''
     * ];
     * </pre>
     */
    public function beginCreateOrUpdate($resourceGroupName, $virtualNetworkName, $virtualNetworkPeeringName, array $virtualNetworkPeeringParameters, array $customHeaders = [])
    {
        $response = $this->beginCreateOrUpdateAsync($resourceGroupName, $virtualNetworkName, $virtualNetworkPeeringName, $virtualNetworkPeeringParameters, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * The Put virtual network peering operation creates/updates a peering in the
     * specified virtual network
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $virtualNetworkName The name of the virtual network.
     * @param string $virtualNetworkPeeringName The name of the peering.
     * @param array $virtualNetworkPeeringParameters Parameters supplied to the create/update virtual
     *  network peering operation 
     * <pre>
     * [
     *    'properties' => [
     *       'allowVirtualNetworkAccess' => 'false',
     *       'allowForwardedTraffic' => 'false',
     *       'allowGatewayTransit' => 'false',
     *       'useRemoteGateways' => 'false',
     *       'remoteVirtualNetwork' => [
     *          'id' => ''
     *       ],
     *       'peeringState' => 'Initiated|Connected|Disconnected',
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
    public function beginCreateOrUpdateAsync($resourceGroupName, $virtualNetworkName, $virtualNetworkPeeringName, array $virtualNetworkPeeringParameters, array $customHeaders = [])
    {
        if ($resourceGroupName == null) {
            Validate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($virtualNetworkName == null) {
            Validate::notNullOrEmpty($virtualNetworkName, '$virtualNetworkName');
        }
        if ($virtualNetworkPeeringName == null) {
            Validate::notNullOrEmpty($virtualNetworkPeeringName, '$virtualNetworkPeeringName');
        }
        if ($virtualNetworkPeeringParameters == null) {
            Validate::notNullOrEmpty($virtualNetworkPeeringParameters, '$virtualNetworkPeeringParameters');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/virtualNetworks/{virtualNetworkName}/virtualNetworkPeerings/{virtualNetworkPeeringName}';
        $statusCodes = [200, 201];
        $method = 'PUT';

        $path = strtr($path, ['{resourceGroupName}' => $resourceGroupName, '{virtualNetworkName}' => $virtualNetworkName, '{virtualNetworkPeeringName}' => $virtualNetworkPeeringName, '{subscriptionId}' => $this->_client->getSubscriptionId()]);
        $queryParams = ['api-version' => $this->_client->getApiVersion()];
        $headers = $customHeaders;
        if ($this->_client->getAcceptLanguage() != null) {
            $headers['accept-language'] = $this->_client->getAcceptLanguage();
        }
        if ($this->_client->getGenerateClientRequestId()) {
            $headers[Resources::X_MS_REQUEST_ID] = Utilities::getGuid();
        }

        $headers['Content-Type'] = 'application/json; charset=utf-8';
        $body = $this->_client->getDataSerializer()->serialize($virtualNetworkPeeringParameters);

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
     * The List virtual network peerings opertion retrieves all the peerings in a
     * virtual network.
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $virtualNetworkName The name of the virtual network.
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
    public function listOperation($resourceGroupName, $virtualNetworkName, array $customHeaders = [])
    {
        $response = $this->listOperationAsync($resourceGroupName, $virtualNetworkName, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * The List virtual network peerings opertion retrieves all the peerings in a
     * virtual network.
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $virtualNetworkName The name of the virtual network.
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function listOperationAsync($resourceGroupName, $virtualNetworkName, array $customHeaders = [])
    {
        if ($resourceGroupName == null) {
            Validate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($virtualNetworkName == null) {
            Validate::notNullOrEmpty($virtualNetworkName, '$virtualNetworkName');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/virtualNetworks/{virtualNetworkName}/virtualNetworkPeerings';
        $statusCodes = [200];
        $method = 'GET';

        $path = strtr($path, ['{resourceGroupName}' => $resourceGroupName, '{virtualNetworkName}' => $virtualNetworkName, '{subscriptionId}' => $this->_client->getSubscriptionId()]);
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
     * The List virtual network peerings opertion retrieves all the peerings in a
     * virtual network.
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
     * The List virtual network peerings opertion retrieves all the peerings in a
     * virtual network.
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
