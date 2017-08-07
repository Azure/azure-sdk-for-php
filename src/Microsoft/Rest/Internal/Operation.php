<?php
namespace Microsoft\Rest\Internal;

use Microsoft\Rest\Internal\Data\DataAbstract;
use Microsoft\Rest\Internal\Path\PathStrPart;
use Microsoft\Rest\Internal\Types\TypeAbstract;
use Microsoft\Rest\OperationInterface;

final class Operation implements OperationInterface
{
    /**
     * @param array $parameters
     * @return mixed
     */
    function call(array $parameters)
    {
        $body = $this->parameters->getBody($parameters);
        /** @var string[] */
        $headers = $this->parameters->getHeaders($parameters);
        if ($body !== null) {
            $headers['content-type'] = 'application/json';
        }
        return $this->shared->send(
            $this->httpMethod,
            $this->parameters->getPath($parameters),
            $this->parameters->getQuery($parameters),
            $headers,
            $body);
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
     * @param array $sharedParameterMap
     * @param DataAbstract $operationData
     * @param PathStrPart[] $pathStrParts
     * @param string $httpMethod
     * @return Operation
     * @internal param string $host
     */
    static function createFromOperationData(
        OperationShared $shared,
        array $typeMap,
        array $sharedParameterMap,
        DataAbstract $operationData,
        array $pathStrParts,
        $httpMethod)
    {
        $operationId = $operationData->getChildValue('operationId');

        $parameters = Parameters::create(
            $typeMap,
            $sharedParameterMap,
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