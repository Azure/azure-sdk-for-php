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
            $parameters[$child->getKey()] = Parameter::createFromData($client, $child);
        }
        $responses = [];
        foreach ($operationData->getChild('responses')->getChildren() as $child)
        {
            $schema = $child->getChildOrNull('schema');
            $responses[intval($child->getKey())]
                = $schema !== null ? TypeAbstract::createFromData($client, $schema) : null;
        }
        return new Operation($client, $operationId, $parameters, $responses);
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
     * @var TypeAbstract[]
     */
    private $responses;

    /**
     * @param Client $client
     * @param string $operationId
     * @param Parameter[] $parameters
     * @param TypeAbstract[] $responses;
     */
    private function __construct(
        Client $client,
        $operationId,
        array $parameters,
        array $responses)
    {
        $this->client = $client;
        $this->operationId = $operationId;
        $this->parameters = $parameters;
        $this->responses = $responses;
    }
}