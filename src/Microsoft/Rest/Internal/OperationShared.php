<?php
namespace Microsoft\Rest\Internal;

use Microsoft\Rest\Internal\Https\HttpsInterface;

final class OperationShared
{
    /**
     * @param string $method
     * @param string $path
     * @param string $query
     * @return OperationResult
     */
    function httpSend($method, $path, $query)
    {
        return $this->https->send(
            $method,
            'https://' . $this->host . $path . '?' . $query,
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