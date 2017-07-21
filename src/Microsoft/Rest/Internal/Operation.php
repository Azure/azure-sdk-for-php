<?php
namespace Microsoft\Rest\Internal;

use Microsoft\Rest\Internal\Data\DataAbstract;
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
     * @param Client $client
     * @param DataAbstract $operationData
     * @return OperationInterface
     * @throws ExpectedPropertyException
     */
    static function createFromOperationData(Client $client, DataAbstract $operationData)
    {
        $operationId = $operationData->getChildValue('operationId');
        $parameters = [];
        $parametersData = $operationData->getChild('parameters');
        foreach ($parametersData->getChildren() as $child)
        {
            $parameters[$child->getKey()] = Parameter::createFromData($child);
        }
        return new Operation($client, $operationId, $parameters);
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
     * @var Parameter[]
     */
    private $parameters;

    /**
     * @param Client $client
     * @param string $operationId
     * @param Parameter[] $parameters
     */
    private function __construct(Client $client, $operationId, array $parameters)
    {
        $this->client = $client;
        $this->operationId = $operationId;
        $this->parameters = $parameters;
    }
}