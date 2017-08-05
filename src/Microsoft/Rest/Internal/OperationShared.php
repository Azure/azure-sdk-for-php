<?php
namespace Microsoft\Rest\Internal;

use Microsoft\Rest\Internal\Https\HttpsInterface;

final class OperationShared
{
    /**
     * @param string $method
     * @param string $path
     * @param string $query
     * @param string[] $headers
     * @param string $body
     * @return mixed
     */
    function send($method, $path, $query, array $headers, $body)
    {
        $url = 'https://'
            . $this->host
            . $path
            . $query;
        return $this->https->send(
            $method,
            $url,
            $headers,
            $body,
            []);
    }

    /**
     * @param HttpsInterface $https
     * @param string $host
     */
    function __construct(
        HttpsInterface $https,
        $host)
    {
        $this->https = $https;
        $this->host = $host;
    }

    /**
     * @var HttpsInterface
     */
    private $https;

    /**
     * @var string
     */
    private $host;
}