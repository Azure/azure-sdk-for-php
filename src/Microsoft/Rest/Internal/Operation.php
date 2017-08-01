<?php
namespace Microsoft\Rest\Internal;

use Microsoft\Rest\Internal\Data\DataAbstract;
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
     * @param string $path
     * @param string $httpMethod
     * @return Operation
     */
    static function createFromOperationData(array $typeMap, DataAbstract $operationData, $path, $httpMethod)
    {
        $operationId = $operationData->getChildValue('operationId');
        $parameters = [];
        $parametersData = $operationData->getChild('parameters');
        foreach ($parametersData->getChildren() as $child)
        {
            $parameters[$child->getKey()] = Parameter::createFromData($typeMap, $child);
        }
        $responses = [];
        foreach ($operationData->getChild('responses')->getChildren() as $child)
        {
            $schema = $child->getChildOrNull('schema');
            $responses[intval($child->getKey())]
                = $schema !== null ? TypeAbstract::createFromData($typeMap, $schema) : null;
        }
        return new Operation($path, $httpMethod, $operationId, $parameters, $responses);
    }

    /**
     * @var string
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
    private $parameters;

    /**
     * @var TypeAbstract[]
     */
    private $responses;

    /**
     * @param string $path
     * @param string $httpMethod
     * @param string $operationId
     * @param Parameter[] $parameters
     * @param TypeAbstract[] $responses
     */
    private function __construct(
        $path,
        $httpMethod,
        $operationId,
        array $parameters,
        array $responses)
    {
        $this->path = $path;
        $this->httpMethod = $httpMethod;
        $this->operationId = $operationId;
        $this->parameters = $parameters;
        $this->responses = $responses;
    }
}