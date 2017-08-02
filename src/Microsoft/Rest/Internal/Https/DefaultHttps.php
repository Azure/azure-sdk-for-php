<?php
namespace Microsoft\Rest\Internal\Https;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

final class DefaultHttps implements HttpsInterface
{
    function __construct()
    {
        $this->client = new Client();
    }

    /**
     * @param string $method
     * @param string $url
     * @param string[] $headers
     * @param array $options
     * @return mixed
     */
    function send($method, $url, array $headers, array $options)
    {
        $request = new Request(
            $method,
            $url,
            $headers
        );
        return $this->client->send($request, $options);
    }

    /**
     * @var Client
     */
    private $client;
}