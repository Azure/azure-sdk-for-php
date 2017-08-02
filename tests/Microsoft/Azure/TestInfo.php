<?php
namespace Microsoft\Azure;

use Microsoft\Rest\AzureStatic;
use PHPUnit\Framework\TestCase;

class TestInfo extends TestCase
{
    public $subscriptionId;

    public $runTime;

    function __construct()
    {
        parent::__construct();
        $json = json_decode(file_get_contents('C:/Users/sergey/Desktop/php-test.json'));
        $this->subscriptionId = $json->subscriptionId;
        $this->runTime = AzureStatic::create($json->applicationId, $json->tenantId, $json->clientSecret);
    }
}