<?php
namespace Microsoft\Rest\Internal\Https;

interface HttpsInterface
{
    /**
     * @param string $method
     * @param string $url
     * @param string[] $headers
     * @param string $body
     * @param array $options
     * @return mixed
     */
    function send(
        $method,
        $url,
        array $headers,
        $body,
        array $options);
}