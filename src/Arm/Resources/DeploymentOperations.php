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
 * @version     Release: 0.10.0_2016, API Version: 2016-02-01
 */

namespace MicrosoftAzure\Arm\Resources;

use MicrosoftAzure\Common\Internal\Http\HttpClient;
use MicrosoftAzure\Common\Internal\Resources;
use MicrosoftAzure\Common\Internal\Utilities;
use MicrosoftAzure\Common\Internal\Validate;

/**
 * DeploymentOperations.
 */
class DeploymentOperations
{
    /**
     * The service client object for the operations.
     *
     * @var ResourceManagementClient
     */
    private $_client;

    /**
     * Creates a new instance for DeploymentOperations.
     *
     * @param ResourceManagementClient, Service client for DeploymentOperations
     */
    public function __construct($client)
    {
        $this->_client = $client;
    }

    /**
     * Get a list of deployments operations.
     *
     * @param string $resourceGroupName The name of the resource group. The name
     * is case insensitive.
     * @param string $deploymentName The name of the deployment.
     * @param string $operationId Operation Id.
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is OK(200), 
     * <pre>
     * [
     *    'id' => '',
     *    'operationId' => '',
     *    'properties' => [
     *       'provisioningState' => '',
     *       'timestamp' => '',
     *       'serviceRequestId' => '',
     *       'statusCode' => '',
     *       'statusMessage' => '',
     *       'targetResource' => [
     *          'id' => '',
     *          'resourceName' => '',
     *          'resourceType' => ''
     *       ],
     *       'request' => [
     *          'content' => ''
     *       ],
     *       'response' => [
     *          'content' => ''
     *       ]
     *    ]
     * ];
     * </pre>
     */
    public function get($resourceGroupName, $deploymentName, $operationId, array $customHeaders = [])
    {
        $response = $this->getAsync($resourceGroupName, $deploymentName, $operationId, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Get a list of deployments operations.
     *
     * @param string $resourceGroupName The name of the resource group. The name
     * is case insensitive.
     * @param string $deploymentName The name of the deployment.
     * @param string $operationId Operation Id.
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function getAsync($resourceGroupName, $deploymentName, $operationId, array $customHeaders = [])
    {
        if ($resourceGroupName == null) {
            Validate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($deploymentName == null) {
            Validate::notNullOrEmpty($deploymentName, '$deploymentName');
        }
        if ($operationId == null) {
            Validate::notNullOrEmpty($operationId, '$operationId');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }

        $path = '/subscriptions/{subscriptionId}/resourcegroups/{resourceGroupName}/deployments/{deploymentName}/operations/{operationId}';
        $statusCodes = [200];
        $method = 'GET';

        $path = strtr($path, ['{resourceGroupName}' => $resourceGroupName, '{deploymentName}' => $deploymentName, '{operationId}' => $operationId, '{subscriptionId}' => $this->_client->getSubscriptionId()]);
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
     * Gets a list of deployments operations.
     *
     * @param string $resourceGroupName The name of the resource group. The name
     * is case insensitive.
     * @param string $deploymentName The name of the deployment.
     * @param int $top Query parameters.
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
    public function listOperation($resourceGroupName, $deploymentName, $top = null, array $customHeaders = [])
    {
        $response = $this->listOperationAsync($resourceGroupName, $deploymentName, $top, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Gets a list of deployments operations.
     *
     * @param string $resourceGroupName The name of the resource group. The name
     * is case insensitive.
     * @param string $deploymentName The name of the deployment.
     * @param int $top Query parameters.
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function listOperationAsync($resourceGroupName, $deploymentName, $top = null, array $customHeaders = [])
    {
        if ($resourceGroupName == null) {
            Validate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($deploymentName == null) {
            Validate::notNullOrEmpty($deploymentName, '$deploymentName');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }

        $path = '/subscriptions/{subscriptionId}/resourcegroups/{resourceGroupName}/deployments/{deploymentName}/operations';
        $statusCodes = [200];
        $method = 'GET';

        $path = strtr($path, ['{resourceGroupName}' => $resourceGroupName, '{deploymentName}' => $deploymentName, '{subscriptionId}' => $this->_client->getSubscriptionId()]);
        $queryParams = ['$top' => $top, 'api-version' => $this->_client->getApiVersion()];
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
     * Gets a list of deployments operations.
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
     * Gets a list of deployments operations.
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
