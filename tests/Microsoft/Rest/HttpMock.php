<?php


namespace Microsoft\Rest;


use Microsoft\Rest\Internal\Https\HttpsInterface;

class HttpMock implements HttpsInterface
{
    public $method;
    public $url;
    public $headers;
    public $options;

    /**
     * @param string $method
     * @param string $url
     * @param string[] $headers
     * @param array $options
     * @return mixed
     */
    function send($method, $url, array $headers, array $options)
    {
        $this->method = $method;
        $this->url = $url;
        $this->headers = $headers;
        $this->options = $options;
        return null;
    }
}