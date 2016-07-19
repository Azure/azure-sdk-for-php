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

/**
 * Holds OAuth access token data.
 */
class OAuthAccessToken
{
    /**
     * Access token itself.
     *
     * @var string
     */
    private $_accessToken;

    /**
     * Unix time the access token is valid before.
     *
     * @var int
     */
    private $_expiresOn;

    /**
     * Scope of access token.
     *
     * @var string.
     */
    private $_scope;

    /**
     * Creates object from $parsedResponse.
     *
     * @param array $parsedResponse JSON response parsed into array.
     *
     * @return MicrosoftAzure\Common\Internal\Authentication\OAuthAccessToken
     */
    public static function create($parsedResponse)
    {
        $result = new self();

        $result->setAccessToken($parsedResponse[Resources::OAUTH_ACCESS_TOKEN]);
        $result->setExpiresOn($parsedResponse[Resources::OAUTH_EXPIRES_ON]);

        if (array_key_exists(Resources::OAUTH_SCOPE, $parsedResponse)) {
            $result->setScope($parsedResponse[Resources::OAUTH_SCOPE]);
        }

        return $result;
    }

    /**
     * Gets access token.
     *
     * @return string
     */
    public function getAccessToken()
    {
        return $this->_accessToken;
    }

    /**
     * Sets access token.
     *
     * @param string $accessToken OAuth access token
     *
     * @return none
     */
    public function setAccessToken($accessToken)
    {
        $this->_accessToken = $accessToken;
    }

    /**
     * Gets expired date of access token in unixdate.
     *
     * @return int
     */
    public function getExpiresOn()
    {
        return $this->_expiresOn;
    }

    /**
     * Sets access token expires date.
     *
     * @param int $expiresOn OAuth access token expire date
     *
     * @return none
     */
    public function setExpiresOn($expiresOn)
    {
        $this->_expiresOn = $expiresOn;
    }

    /**
     * Gets access token scope.
     *
     * @return string
     */
    public function getScope()
    {
        return $this->_scope;
    }

    /**
     * Sets access token scope.
     *
     * @param string $scope OAuth access token scope
     *
     * @return none
     */
    public function setScope($scope)
    {
        $this->_scope = $scope;
    }
}
