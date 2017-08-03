<?php
namespace Microsoft\Rest\Azure;

use Microsoft\Rest\Internal\Https\AzureHttps;
use Microsoft\Rest\Internal\Https\DefaultHttps;
use Microsoft\Rest\Internal\RunTime;
use Microsoft\Rest\RunTimeInterface;

final class AzureStatic
{
    /**
     * @param string $clientId
     * @param string $tenantId
     * @param string $clientSecret
     * @return RunTimeInterface
     */
    static function create($clientId, $tenantId, $clientSecret)
    {
        $https = new DefaultHttps();
        $azureHttps = new AzureHttps($https, $clientId, $tenantId, $clientSecret);
        return new RunTime($azureHttps);
    }

    private function __construct() { }
}