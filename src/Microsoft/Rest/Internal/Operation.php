<?php
namespace Microsoft\Rest\Internal;

use Microsoft\Rest\Internal\Data\DataAbstract;
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
        return $this->shared->send(
            $this->httpMethod,
            $this->parameters->getPath($parameters),
            $this->parameters->getQuery($parameters));
    }

    /**
     * @return string
     */
    function getId()
    {
        return $this->operationId;
    }

    /**
     * @param OperationShared $shared
     * @param TypeAbstract[] $typeMap
     * @param DataAbstract $operationData
     * @param PathStrPart[] $pathStrParts
     * @param string $httpMethod
     * @return Operation
     * @internal param string $host
     */
    static function createFromOperationData(
        OperationShared $shared,
        array $typeMap,
        DataAbstract $operationData,
        array $pathStrParts,
        $httpMethod)
    {
        $operationId = $operationData->getChildValue('operationId');

        $parameters = Parameters::create(
            $typeMap,
            $operationId,
            $operationData->getChild('parameters'),
            $pathStrParts);

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
            $shared,
            $httpMethod,
            $operationId,
            $parameters,
            $responses);
    }

    /**
     * @var OperationShared
     */
    private $shared;

    /**
     * @var string
     */
    private $httpMethod;

    /**
     * @var string
     */
    private $operationId;

    /**
     * @var Parameters
     */
    private $parameters;

    /**
     * @var TypeAbstract[]
     */
    private $responses;

    /**
     * @param OperationShared $shared
     * @param string $httpMethod
     * @param string $operationId
     * @param Parameters $parameters
     * @param TypeAbstract[] $responses
     */
    private function __construct(
        OperationShared $shared,
        $httpMethod,
        $operationId,
        Parameters $parameters,
        array $responses)
    {
        $this->shared = $shared;
        $this->httpMethod = $httpMethod;
        $this->operationId = $operationId;
        $this->parameters = $parameters;
        $this->responses = $responses;
    }
}