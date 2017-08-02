<?php
namespace Microsoft\Rest\Internal\Https;

interface HttpsInterface
{
    /**
     * @param string $method
     * @param string $url
     * @param string[] $headers
     * @param array $options
     * @return mixed
     */
    function send($method, $url, array $headers, array $options);
}