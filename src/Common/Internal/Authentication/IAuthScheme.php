<?php

/**
 * @category    Microsoft
 *
 * @author      Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright   2016 Microsoft Corporation
 * @license     https://github.com/yaqiyang/php-sdk-dev/blob/master/LICENSE
 *
 * @link        https://github.com/Azure/azure-sdk-for-php
 *
 * @version     Release: 0.10.0_2016
 */

namespace MicrosoftAzure\Common\Internal\Authentication;

/**
 * Interface for Azure authentication schemes.
 */
interface IAuthScheme
{
    /**
     * Gets authorization header for http requests.
     *
     * @param string $url         reuqest url.
     * @param string $httpMethod  request http method.
     * @param array  $queryParams query variables.
     * @param array  $headers     request headers.
     *
     * @return string
     */
    public function getAuthorizationHeader($url = '', $httpMethod = '', array $queryParams = [], array $headers = []);
}
