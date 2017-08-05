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
     * @param string $body
     * @param array $options
     * @return mixed
     */
    function send($method, $url, array $headers, $body, array $options)
    {
        $request = new Request(
            $method,
            $url,
            $headers,
            $body
        );
        $response = $this->client->send($request, $options);
        return json_decode(
            $response->getBody()->getContents(),
            TRUE,
            512,
            JSON_BIGINT_AS_STRING);
    }

    /**
     * @var Client
     */
    private $client;
}