<?php

/**
 * LICENSE: Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * http://www.apache.org/licenses/LICENSE-2.0.
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
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace WindowsAzure\MediaServices\Authentication;

use Firebase\JWT\JWT;
use WindowsAzure\Common\Internal\ServiceRestProxy;
use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\Common\Internal\Http\IHttpClient;
use WindowsAzure\Common\Internal\Serialization\JsonSerializer;
use WindowsAzure\MediaServices\Authentication\AccessToken;

/**
 * Azure AD rest proxy.
 *
 * @category  Microsoft
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @version   Release: 0.5.0_2016-11
 *
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class AzureAdClient extends ServiceRestProxy
{
    /**
     * Initializes new AzureAdRestProxy object.
     *
     * @param IHttpClient $channel The HTTP client used to send HTTP requests
     * @param string      $uri     The Azure Ad endpoint
     */
    public function __construct(IHttpClient $channel, $azureAdEndpoint)
    {
        parent::__construct(
            $channel,
            $azureAdEndpoint,
            '',
            new JsonSerializer()
        );
    }

    /**
     * Acquire an Azure AD access token given the Client ID and Client Secret
     *
     * @param string $resource     AzureAD resource asking for access to
     * @param string $clientId     AzureAD client Id
     * @param string $clientSecret OAuth request client_secret field value
     *
     * @return OAuthAccessToken
     */
    public function acquireTokenWithSymmetricKey($resource, $clientId, $clientSecret)
    {
        $method = Resources::HTTP_POST;
        $headers = [];
        $queryParams = [];
        $postParameters = [];
        $statusCode = Resources::STATUS_OK;

        $postParameters = $this->addPostParameter(
            $postParameters,
            Resources::OAUTH_RESOURCE,
            $resource
        );

        $postParameters = $this->addPostParameter(
            $postParameters,
            Resources::OAUTH_GRANT_TYPE,
            'client_credentials'
        );

        $postParameters = $this->addPostParameter(
            $postParameters,
            Resources::OAUTH_SCOPE,
            'openid'
        );

        $postParameters = $this->addPostParameter(
            $postParameters,
            Resources::OAUTH_CLIENT_SECRET,
            $clientSecret
        );

        $postParameters = $this->addPostParameter(
            $postParameters,
            Resources::OAUTH_CLIENT_ID,
            $clientId
        );

        $response = $this->sendHttp(
            $method,
            $headers,
            $queryParams,
            $postParameters,
            Resources::EMPTY_STRING,
            $statusCode
        );

        $data = $this->dataSerializer->unserialize($response->getBody());

        $accessToken = $data['access_token'];
        $expirationTime = time() + intval($data['expires_in']);
        return new AccessToken($accessToken, $expirationTime);
    }

    /**
     * Get access token using an asymmetric key
     *
     * @param string $grantType    OAuth request grant_type field value
     * @param string $credentials  Asymmetrict Credentials
     *
     * @return OAuthAccessToken
     */
    public function acquireTokenWithAsymmetricKey($resource, $credentials)
    {
        $method = Resources::HTTP_POST;
        $headers = [];
        $queryParams = [];
        $postParameters = [];
        $statusCode = Resources::STATUS_OK;

        $postParameters = $this->addPostParameter(
            $postParameters,
            Resources::OAUTH_CLIENT_ASSERTION_TYPE,
            'urn:ietf:params:oauth:client-assertion-type:jwt-bearer'
        );

        $postParameters = $this->addPostParameter(
            $postParameters,
            Resources::OAUTH_RESOURCE,
            $resource
        );

        $postParameters = $this->addPostParameter(
            $postParameters,
            Resources::OAUTH_GRANT_TYPE,
            'client_credentials'
        );

        $postParameters = $this->addPostParameter(
            $postParameters,
            Resources::OAUTH_SCOPE,
            'openid'
        );

        $postParameters = $this->addPostParameter(
            $postParameters,
            Resources::OAUTH_CLIENT_ASSERTION,
            $this->encodeCertificateAsJWT($credentials)
        );

        $response = $this->sendHttp(
            $method,
            $headers,
            $queryParams,
            $postParameters,
            Resources::EMPTY_STRING,
            $statusCode
        );

        $data = $this->dataSerializer->unserialize($response->getBody());

        $accessToken = $data['access_token'];
        $expirationTime = time() + intval($data['expires_in']);
        return new AccessToken($accessToken, $expirationTime);
    }

    /**
     * Acquire an Azure AD access token given the username and password
     *
     * @param string $resource     AzureAD resource asking for access to
     * @param string $clientId     AzureAD client Id
     * @param string $username     Username
     * @param string $password     Password
     *
     * @return OAuthAccessToken
     */
    public function acquireTokenWithUserCredentials($resource, $clientId, $username, $password)
    {
        $method = Resources::HTTP_POST;
        $headers = [];
        $queryParams = [];
        $postParameters = [];
        $statusCode = Resources::STATUS_OK;

        $postParameters = $this->addPostParameter(
            $postParameters,
            Resources::OAUTH_RESOURCE,
            $resource
        );

        $postParameters = $this->addPostParameter(
            $postParameters,
            Resources::OAUTH_GRANT_TYPE,
            'password'
        );

        $postParameters = $this->addPostParameter(
            $postParameters,
            Resources::OAUTH_SCOPE,
            'openid'
        );

        $postParameters = $this->addPostParameter(
            $postParameters,
            Resources::OAUTH_USERNAME,
            $username
        );

        $postParameters = $this->addPostParameter(
            $postParameters,
            Resources::OAUTH_PASSWORD,
            $password
        );

        $postParameters = $this->addPostParameter(
            $postParameters,
            Resources::OAUTH_CLIENT_ID,
            $clientId
        );

        $response = $this->sendHttp(
            $method,
            $headers,
            $queryParams,
            $postParameters,
            Resources::EMPTY_STRING,
            $statusCode
        );

        $data = $this->dataSerializer->unserialize($response->getBody());

        $accessToken = $data['access_token'];
        $expirationTime = time() + intval($data['expires_in']);
        return new AccessToken($accessToken, $expirationTime);
    }

    private function encodeCertificateAsJWT($credentials) {

        $head = [];
        $head['x5t'] = $credentials->getFingerprint();
        $head['x5c'] = [ $credentials->getCertificate() ];

        $token = [];

        $token['aud'] = $this->getUri();
        $token['sub'] = $credentials->getClientId();
        $token['iss'] = $credentials->getClientId();
        $token['nbf'] = (string)((new \DateTime("now", new \DateTimeZone('UTC')))->getTimestamp() - 60);
        $token['exp'] = (string)((new \DateTime("now", new \DateTimeZone('UTC')))->getTimestamp() + 520);

        return JWT::encode($token, $credentials->getPrivateKey(), 'RS256', null, $head);
    }
}