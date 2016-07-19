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

namespace MicrosoftAzure\Common\Internal\Filters;

use MicrosoftAzure\Common\Internal\Resources;

/**
 * Adds authentication header to the http request object.
 */
class OAuthFilter implements IServiceFilter
{
    /**
     * @var MicrosoftAzure\Common\Internal\Authentication\OAuthScheme The authentication scheme.
     */
    private $_authenticationScheme;

    /**
     * Creates OAuthFilter with the passed in scheme.
     *
     * @param OAuthScheme $authenticationScheme The authentication scheme.
     */
    public function __construct($authenticationScheme)
    {
        $this->_authenticationScheme = $authenticationScheme;
    }

    /**
     * Adds authentication header to the request headers.
     *
     * @param $request HTTP channel object.
     *
     * @return $request HTTP channel object.
     */
    public function handleRequest($request)
    {
        $signedKey = $this->_authenticationScheme->getAuthorizationHeader();
        $request = $request->withHeader(Resources::AUTHENTICATION, $signedKey);

        return $request;
    }
}
