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
        $path = $this->parameters->getPath($parameters);
        $query = $this->parameters->getQuery($parameters);
        $url = 'https://' . $this->host . $path . '?' . $query;
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
     * @param string $host
     * @param DataAbstract $operationData
     * @param PathStrPart[] $pathStrParts
     * @param string $httpMethod
     * @return Operation
     */
    static function createFromOperationData(
        array $typeMap, $host, DataAbstract $operationData, array $pathStrParts, $httpMethod)
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
            $host,
            $httpMethod,
            $operationId,
            $parameters,
            $responses);
    }

    /**
     * @var string
     */
    private $host;

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
     * @param string $host
     * @param string $httpMethod
     * @param string $operationId
     * @param Parameters $parameters
     * @param TypeAbstract[] $responses
     */
    private function __construct(
        $host,
        $httpMethod,
        $operationId,
        Parameters $parameters,
        array $responses)
    {
        $this->host = $host;
        $this->httpMethod = $httpMethod;
        $this->operationId = $operationId;
        $this->parameters = $parameters;
        $this->responses = $responses;
    }
}