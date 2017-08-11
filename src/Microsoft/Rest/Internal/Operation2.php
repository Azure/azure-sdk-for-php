<?php
namespace Microsoft\Rest\Internal;

use Microsoft\Rest\Internal\Schemas\Definitions;
use Microsoft\Rest\Internal\Swagger2\OperationObject;

final class Operation2
{
    /**
     * Operation2 constructor.
     * @param Definitions $definitions
     * @param string $path
     * @param string $httpMethod
     * @param OperationObject $operationObject
     */
    function __construct(
        Definitions $definitions,
        $path,
        $httpMethod,
        OperationObject $operationObject)
    {
        $this->path = $path;
        $this->httpMethod = strtoupper($httpMethod);

        $this->parameters = [];
        foreach ($operationObject->parameters()->children() as $parameterObject) {
            $this->parameters[] = new Parameter2($definitions, $parameterObject);
        }
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
     * @var Parameter2[]
     */
    private $parameters;
}