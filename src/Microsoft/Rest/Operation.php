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
     * @param string $value
     * @param bool $isParameter
     */
    public function addPathPart($value, $isParameter = false)
    {
        $this->path[] = new PathPart($value, $isParameter);
    }

    /**
     * @param string $name
     * @param string $location
     */
    public function addParameter($name, $location)
    {
        $this->parameters[] = new ParameterInfo($name, $location);
    }

    /**
     * @param Client $client
     * @param string $operationId
     * @param string $httpMethod
     */
    public function __construct(Client $client, $operationId, $httpMethod)
    {
        $this->client = $client;
        $this->operationId = $operationId;
        $this->httpMethod = $httpMethod;
    }

    /**
     * @param $client
     * @param $path
     * @param $httpMethod
     * @param array $data
     * @return Operation
     */
    public static function createFromData($client, $path, $httpMethod, array $data)
    {
        return new Operation($client, $path, $httpMethod, $data["operationId"]);
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