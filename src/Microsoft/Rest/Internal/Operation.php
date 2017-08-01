<?php
namespace Microsoft\Rest\Internal;

use Microsoft\Rest\Internal\Data\DataAbstract;
use Microsoft\Rest\Internal\Path\PathPartAbstract;
use Microsoft\Rest\Internal\Path\PathStrPart;
use Microsoft\Rest\Internal\Types\TypeAbstract;
use Microsoft\Rest\OperationInterface;
use Microsoft\Rest\OperationResultInterface;

final class Operation implements OperationInterface
{
    /**
     * @param array $parameters
     * @return OperationResultInterface
     */
    function call(array $parameters)
    {
        return new OperationResult();
    }

    /**
     * @return string
     */
    function getId()
    {
        return $this->operationId;
    }

    /**
     * @param TypeAbstract[] $typeMap
     * @param DataAbstract $operationData
     * @param PathStrPart[] $pathStrParts
     * @param string $httpMethod
     * @return Operation
     * @throws \Exception
     */
    static function createFromOperationData(
        array $typeMap, DataAbstract $operationData, array $pathStrParts, $httpMethod)
    {
        $operationId = $operationData->getChildValue('operationId');

        /**
         * @var Parameter[]
         */
        $pathParameters = [];
        /**
         * @var Parameter[]
         */
        $queryParameters = [];
        /**
         * @var Parameter
         */
        $body = null;
        /**
         * @var Parameter[]
         */
        $headerParameters = [];
        foreach ($operationData->getChild('parameters')->getChildren() as $child)
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

        /**
         * @var TypeAbstract[]
         */
        $responses = [];
        foreach ($operationData->getChild('responses')->getChildren() as $child)
        {
            $schema = $child->getChildOrNull('schema');
            $responses[intval($child->getKey())]
                = $schema !== null ? TypeAbstract::createFromData($typeMap, $schema) : null;
        }

        return new Operation(
            $path,
            $httpMethod,
            $operationId,
            $queryParameters,
            $headerParameters,
            $responses,
            $body);
    }

    /**
     * @var PathPartAbstract[]
     */
    private $path;

    /**
     * @var string
     */
    private $httpMethod;

    /**
     * @var string
     */
    private $operationId;

    /**
     * @var Parameter[]
     */
    private $queryParameters;

    /**
     * @var Parameter[]
     */
    private $headerParameters;

    /**
     * @var TypeAbstract[]
     */
    private $responses;

    /**
     * @var Parameter|null
     */
    private $body;

    /**
     * @param PathPartAbstract[] $path
     * @param string $httpMethod
     * @param string $operationId
     * @param Parameter[] $queryParameters
     * @param Parameter[] $headerParameters
     * @param TypeAbstract[] $responses
     * @param Parameter|null $body
     */
    private function __construct(
        array $path,
        $httpMethod,
        $operationId,
        array $queryParameters,
        array $headerParameters,
        array $responses,
        Parameter $body = null)
    {
        $this->path = $path;
        $this->httpMethod = $httpMethod;
        $this->operationId = $operationId;
        $this->queryParameters = $queryParameters;
        $this->headerParameters = $headerParameters;
        $this->responses = $responses;
        $this->body = $body;
    }
}