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
     * @return Operation
     * @throws ExpectedPropertyException
     */
    static function createFromOperationData(array $typeMap, DataAbstract $operationData)
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
        return new Operation($operationId, $parameters, $responses);
    }

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
     * @param string $operationId
     * @param Parameter[] $parameters
     * @param TypeAbstract[] $responses;
     */
    private function __construct(
        $operationId,
        array $parameters,
        array $responses)
    {
        $this->operationId = $operationId;
        $this->parameters = $parameters;
        $this->responses = $responses;
    }
}