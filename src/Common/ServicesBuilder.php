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

use MicrosoftAzure\Common\Internal\Authorization\OAuthSettings;
use MicrosoftAzure\Common\Internal\Resources;
use MicrosoftAzure\Common\Internal\Serialization\JsonSerializer;
use MicrosoftAzure\Common\Internal\Serialization\XmlSerializer;

/**
 * Builds azure service clients.
 */
class ServicesBuilder
{
    /**
     * @var ServicesBuilder
     */
    private static $_instance = null;

    /**
     * Gets the serializer used in the REST services construction.
     *
     * @return MicrosoftAzure\Common\Internal\Serialization\ISerializer
     */
    protected function xmlSerializer()
    {
        return new XmlSerializer();
    }

    /**
     * Gets the serializer used in the REST services construction.
     *
     * @return MicrosoftAzure\Common\Internal\Serialization\ISerializer
     */
    protected function jsonSerializer()
    {
        return new JsonSerializer();
    }

    /**
     * Gets the StorageManagementClient.
     *
     * @return MicrosoftAzure\StorageResourceProvider\StorageManagementClient
     */
    public function createStorageManagementClient($tenant_id, $client_id, $client_secret)
    {
        $oauthSettings = new OAuthSettings($tenant_id, $client_id, $client_secret);

        return new StorageManagementClient($oauthSettings);
    }

    /**
     * Gets the user agent string used in request header.
     *
     * @return string
     */
    private static function getUserAgent()
    {
        // e.g. User-Agent: Azure-Storage/0.10.0 (PHP 5.5.32)
        return 'Azure-Storage/'.Resources::SDK_VERSION.' (PHP '.PHP_VERSION.')';
    }

    /**
     * Gets the static instance of this class.
     *
     * @return ServicesBuilder
     */
    public static function getInstance()
    {
        if (!isset(self::$_instance)) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }
}
