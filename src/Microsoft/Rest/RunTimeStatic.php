<?php
namespace Microsoft\Rest;

use Microsoft\Rest\Internal\AzureCredentials;
use Microsoft\Rest\Internal\NoCredentials;
use Microsoft\Rest\Internal\RunTime;

final class RunTimeStatic
{
    /**
     * @param CredentialsInterface $credentials
     * @return RunTimeInterface
     */
    static function create(CredentialsInterface $credentials = null)
    {
        return new RunTime($credentials === null ? new NoCredentials() : $credentials);
    }

    /**
     * @param string $clientId
     * @param string $tenantId
     * @param string $clientSecret
     * @return CredentialsInterface
     */
    static function createAzureCredentials($clientId, $tenantId, $clientSecret)
    {
        return new AzureCredentials($clientId, $tenantId, $clientSecret);
    }

    private function __construct() { }
}