<?php
namespace Microsoft\Rest\Internal;

use Microsoft\Rest\Internal\Https\HttpsInterface;

final class OperationShared
{
    /**
     * @param string $method
     * @param string $path
     * @param string $query
     * @return mixed
     */
    function send($method, $path, $query)
    {
        $url = 'https://'
            . $this->host
            . $path
            . $query;
        return $this->https->send(
            $method,
            $url,
            [],
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