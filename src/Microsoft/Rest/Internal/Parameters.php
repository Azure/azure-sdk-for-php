<?php
namespace Microsoft\Rest\Internal;

use Microsoft\Rest\Internal\Data\DataAbstract;
use Microsoft\Rest\Internal\Path\PathBuilder;
use Microsoft\Rest\Internal\Path\PathPartAbstract;
use Microsoft\Rest\Internal\Path\PathStrPart;
use Microsoft\Rest\Internal\Swagger\Definitions;

final class Parameters
{
    /**
     * @param string $query
     * @param Parameter $parameter
     * @param string $value
     * @return string
     */
    private static function addQueryParameter($query, Parameter $parameter, $value)
    {
        return (strlen($query) > 0 ? $query . '&' : '?')
            . $parameter->getName()
            . "="
            . $parameter->urlEncode($value);
    }

    /**
     * @param array $parameters
     * @return string
     */
    function getQuery(array $parameters)
    {
        $query = $this->constQuery;
        foreach ($this->query as $queryParameter) {
            $name = $queryParameter->getName();
            $query = self::addQueryParameter($query, $queryParameter, strval($parameters[$name]));
        }
        return $query;
    }

    /**
     * @param array $parameters
     * @return string
     */
    function getPath(array $parameters)
    {
        $path = '';
        foreach ($this->path as $part) {
            $path .= $part->getValue($parameters);
        }
        return $path;
    }

    /**
     * @param array $parameters
     * @return mixed
     */
    function getBody(array $parameters)
    {
        return $this->body === null ? null : $this->body->toJson($parameters[$this->body->getName()]);
    }

    /**
     * @param mixed[] $parameters
     * @return string[]
     */
    function getHeaders(array $parameters)
    {
        $result = [];
        foreach ($this->headers as $header) {
            $name = $header->getName();
            $result[$name] = strval($parameters[$name]);
        }
        return $result;
    }

    /**
     * @param Definitions $typeMap
     * @param array $sharedParameterMap
     * @param DataAbstract $parameters
     * @param PathStrPart[] $pathStrParts
     * @return Parameters
     * @throws \Exception
     */
    static function create(
        Definitions $typeMap,
        array $sharedParameterMap,
        DataAbstract $parameters,
        array $pathStrParts)
    {
        /** @var Parameter[] */
        $pathParameters = [];
        /**
         * @var Parameter[]
         */
        $constQuery = '';
        $queryParameters = [];
        /**
         * @var Parameter[]
         */
        $headerParameters = [];
        /**
         * @var Parameter
         */
        $body = null;
        foreach ($parameters->getChildren() as $child)
        {
            $parameter = Parameter::createFromData($typeMap, $sharedParameterMap, $child);
            $in = $parameter->getIn();
            switch ($parameter->getIn()) {
                case 'path':
                    $pathParameters[$parameter->getName()] = $parameter;
                    break;
                case 'query':
                    if ($parameter->isConst()) {
                        $constQuery = self::addQueryParameter(
                            $constQuery,
                            $parameter,
                            $parameter->getConstValue());
                    } else {
                        $queryParameters[] = $parameter;
                    }
                    break;
                case 'header':
                    $headerParameters[] = $parameter;
                    break;
                case 'body':
                    if ($body !== null) {
                        throw new \Exception('only one body parameter is allowed.');
                    }
                    $body = $parameter;
                    break;
                default:
                    throw new \Exception('unknown \'in\':' . $in);
                    break;
            }
        }

        $path = PathBuilder::create($pathParameters, $pathStrParts);

        return new self(
            $path,
            $constQuery,
            $queryParameters,
            $headerParameters,
            $body);
    }

    /**
     * @param PathPartAbstract[] $path
     * @param string $constQuery
     * @param Parameter[] $query
     * @param Parameter[] $headers
     * @param Parameter|null $body
     */
    private function __construct(
        array $path,
        $constQuery,
        array $query,
        array $headers,
        Parameter $body = null)
    {
        $this->path = $path;
        $this->constQuery = $constQuery;
        $this->query = $query;
        $this->headers = $headers;
        $this->body = $body;
    }

    /**
     * @var PathPartAbstract[]
     */
    private $path;

    /**
     * @var string
     */
    private $constQuery;

    /**
     * @var Parameter[]
     */
    private $query;

    /**
     * @var Parameter[]
     */
    private $headers;

    /**
     * @var Parameter|null
     */
    private $body;
}