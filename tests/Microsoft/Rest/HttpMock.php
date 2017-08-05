<?php


namespace Microsoft\Rest;


use Microsoft\Rest\Internal\Https\HttpsInterface;

class HttpMock implements HttpsInterface
{
    /**
     * @var HttpsInterface
     */
    public $real;

    public $method;
    public $url;
    public $headers;
    public $body;
    public $options;

    /**
     * @param string $method
     * @param string $url
     * @param string[] $headers
     * @param mixed $body
     * @param array $options
     * @return mixed
     */
    function send($method, $url, array $headers, $body, array $options)
    {
        $this->method = $method;
        $this->url = $url;
        $this->headers = $headers;
        $this->body = $body;
        $this->options = $options;
        return $this->real !== null ? $this->real->send($method, $url, $headers, $body, $options) : null;
    }
}