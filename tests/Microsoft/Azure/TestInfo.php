<?php
namespace Microsoft\Azure;

use Microsoft\Rest\Azure\AzureStatic;
use Microsoft\Rest\HttpMock;
use Microsoft\Rest\Internal\Https\AzureHttps;
use Microsoft\Rest\Internal\Https\DefaultHttps;
use Microsoft\Rest\Internal\Https\HttpsInterface;
use Microsoft\Rest\Internal\RunTime;
use PHPUnit\Framework\TestCase;

class TestInfo extends TestCase
{
    public $subscriptionId;

    public $runTime;

    /**
     * @var HttpsInterface
     */
    public $httpMock;

    function __construct()
    {
        parent::__construct();
        $json = json_decode(file_get_contents('C:/Users/sergey/Desktop/php-test.json'));
        $this->subscriptionId = $json->subscriptionId;
        // $this->runTime = AzureStatic::create($json->applicationId, $json->tenantId, $json->clientSecret);
        $this->httpMock = new HttpMock();
        $this->httpMock->real = new AzureHttps(
            new DefaultHttps(), $json->applicationId, $json->tenantId, $json->clientSecret);
        $this->runTime = new RunTime($this->httpMock);
    }
}
