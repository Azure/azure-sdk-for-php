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

namespace MicrosoftAzure\Common;

use MicrosoftAzure\Common\Internal\Authentication\OAuthAccessToken;
use MicrosoftAzure\Common\Internal\Http\HttpClient;
use MicrosoftAzure\Common\Internal\Resources;
use MicrosoftAzure\Common\Internal\Serialization\JsonSerializer;

/**
 * OAuth Service Client.
 */
class OAuthServiceClient extends RestServiceClient
{
    /**
     * @var MicrosoftAzure\Common\Internal\Authorization\OAuthSettings
     */
    protected $oauthSettings;

    /**
     * Initializes new OAuthServiceClient object.
     *
     * @param MicrosoftAzure\Common\Internal\Authorization\OAuthSettings $oauthSettings oauthSettings.
     */
    public function __construct($oauthSettings)
    {
        $this->oauthSettings = $oauthSettings;

        parent::__construct(
            $oauthSettings->getOAuthEndpointUri(),
            new JsonSerializer()
        );
    }

    /**
     * Get OAuth access token.
     *
     * @return MicrosoftAzure\Common\Internal\Internal\Authentication\OAuthAccessToken
     */
    public function getOAuthAccessToken()
    {
        $oath_url = $this->getUri();
        $method = Resources::HTTP_POST;
        $headers = array();
        $queryParams = array();
        $postParams = $this->oauthSettings->getOAuthParams();
        $statusCode = Resources::STATUS_OK;

        $response = HttpClient::send(
                $method,
                $headers,
                $queryParams,
                $postParams,
                $oath_url,
                $statusCode
        );

        $parsed = $this->dataSerializer->deserialize($response->getBody()->getContents());

        return OAuthAccessToken::create($parsed);
    }
}
