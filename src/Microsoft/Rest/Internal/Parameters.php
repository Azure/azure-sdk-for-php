<?php
namespace Microsoft\Rest\Internal;

use Microsoft\Rest\Internal\Data\DataAbstract;
use Microsoft\Rest\Internal\Path\PathPartAbstract;
use Microsoft\Rest\Internal\Path\PathStrPart;
use Microsoft\Rest\Internal\Types\TypeAbstract;

final class Parameters
{
    /**
     * @param array $parameters
     * @return string
     */
    function getQuery(array $parameters)
    {
        $query = '';
        foreach ($this->query as $queryParameter) {
            if (strlen($query) > 0) {
                $query .= '&';
            }
            $name = $queryParameter->getName();
            $query .= $name . '=' . urlencode(strval($parameters[$name]));
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
     * @param TypeAbstract[] $typeMap
     * @param string $operationId
     * @param DataAbstract $parameters
     * @param PathStrPart[] $pathStrParts
     * @return Parameters
     * @throws \Exception
     */
    static function create(
        array $typeMap,
        $operationId,
        DataAbstract $parameters,
        array $pathStrParts)
    {
        /**
         * @var Parameter[]
         */
        $pathParameters = [];
        /**
         * @var Parameter[]
         */
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
            $parameter = Parameter::createFromData($typeMap, $child);
            $in = $parameter->getIn();
            switch ($parameter->getIn()) {
                case 'path':
                    $pathParameters[$parameter->getName()] = $parameter;
                    break;
                case 'query':
                    $queryParameters[] = $parameter;
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

        $path = [];
        foreach ($pathStrParts as $part) {
            $path[] = $part->createPathPart($pathParameters, $operationId);
        }

        return new self(
            $path,
            $queryParameters,
            $headerParameters,
            $body);
    }

    /**
     * @param PathPartAbstract[] $path
     * @param Parameter[] $query
     * @param Parameter[] $headers
     * @param Parameter|null $body
     */
    private function __construct(
        array $path,
        array $query,
        array $headers,
        Parameter $body = null)
    {
        $this->path = $path;
        $this->query = $query;
        $this->headers = $headers;
        $this->body = $body;
    }

    /**
     * @var PathPartAbstract[]
     */
    private $path;

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