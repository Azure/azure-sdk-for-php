<?php
namespace Microsoft\Rest;

final class Operation
{
    /**
     * @param array $parameters
     * @return OperationResult
     * @throws \Exception
     */
    public function call(array $parameters)
    {
        // TODO: Implement call() method.
        throw new \Exception("not implemented");
    }

    /**
     * @param Client $client
     * @param PathPart[] $path
     * @param string $httpMethod  one of "GET", "PUT", "POST", "DELETE", "OPTIONS", "HEAD", or "PATCH".
     * @param string $operationId
     * @param ParameterInfo[] $parameters
     */
    public function __construct(
        Client $client,
        array $path,
        $httpMethod,
        $operationId,
        array $parameters)
    {
        $this->client = $client;
        $this->path = $path;
        $this->httpMethod = $httpMethod;
        $this->operationId = $operationId;
        $this->parameters = $parameters;
    }

    /**
     * @var Client
     */
    private $client;

    /**
     * @var string
     */
    private $operationId;

    /**
     * @var string
     */
    private $httpMethod;

    /**
     * @var PathPart[]
     */
    private $path;

    /**
     * @var ParameterInfo[]
     */
    private $parameters = [];
}