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

use MicrosoftAzure\Common\Internal\Resources;
use MicrosoftAzure\Common\Internal\Validate;

/**
 * OAuth authentication scheme.
 */
class OAuthScheme implements IAuthScheme
{
    /**
     * @var MicrosoftAzure\Common\OAuthServiceClient The OAuth service to call the API and get the tokens.
     */
    protected $oauthService;

    /**
     * @var MicrosoftAzure\Common\Internal\Authentication\OAuthAccessToken The OAuth access token.
     */
    protected $oauthAccessToken;

    /**
     * Constructor.
     *
     * @param MicrosoftAzure\Common\OAuthServiceClient $oauthService oauthService
     */
    public function __construct($oauthService)
    {
        Validate::notNull($oauthService, 'oauthService');
        $this->oauthService = $oauthService;
    }

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
    public function getAuthorizationHeader($url = '', $httpMethod = '', array $queryParams = [], array $headers = [])
    {
        if (($this->oauthAccessToken == null) || (time() > $this->oauthAccessToken->getExpiresOn())) {
            $this->oauthAccessToken = $this->oauthService->getOAuthAccessToken();
        }

        return Resources::OAUTH_ACCESS_TOKEN_PREFIX.$this->oauthAccessToken->getAccessToken();
    }
}
