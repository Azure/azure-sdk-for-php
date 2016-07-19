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
 * Represents the OAuth settings used to access the Azure resource management APIs (ARM)
 * or other OAuth enabled services.
 */
class OAuthSettings
{
    /**
     * @var string
     */
    private $_tenant_id;

    /**
     * @var string
     */
    private $_client_id;

    /**
     * @var string
     */
    private $_client_secret;

    /**
     * @var string
     */
    private $_grant_type;

    /**
     * @var string
     */
    private $_azure_resource;

    /**
     * @var string
     */
    private $_oauthEndpointUri;

    /**
     * Creates an OAuth settings instance.
     *
     * @param string $tenant_id      tenant id for the user account
     * @param string $client_id      client id
     * @param string $client_secret  client secret
     * @param string $grant_type     grant type
     * @param string $azure_resource resource for the token
     */
    public function __construct($tenant_id, $client_id, $client_secret,
        $grant_type = 'client_credentials', $azure_resource = 'https://management.core.windows.net/')
    {
        Validate::notNullOrEmpty($tenant_id, 'tenant_id');
        Validate::notNullOrEmpty($client_id, 'client_id');
        Validate::notNullOrEmpty($client_secret, 'client_secret');

        $this->_tenant_id = $tenant_id;
        $this->_client_id = $client_id;
        $this->_client_secret = $client_secret;
        $this->_grant_type = $grant_type;
        $this->_azure_resource = $azure_resource;

        $this->_oauthEndpointUri = sprintf(Resources::ACCESS_TOKEN_URL, $this->_tenant_id);
    }

    /**
     * Gets an array of OAuth parameters.
     *
     * @return array of all parameters for OAuth
     */
    public function getOAuthParams()
    {
        return [
             'grant_type' => $this->_grant_type,
             'client_id' => $this->_client_id,
             'client_secret' => $this->_client_secret,
             'resource' => $this->_azure_resource,
        ];
    }

    /**
     * Gets tenant id.
     *
     * @return string
     */
    public function getTenantId()
    {
        return $this->_tenant_id;
    }

    /**
     * Gets OAuth endpoint uri.
     *
     * @return string
     */
    public function getOAuthEndpointUri()
    {
        return $this->_oauthEndpointUri;
    }
}
