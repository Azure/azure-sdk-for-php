<?php
namespace Microsoft\Rest\Internal\Path;

use Microsoft\Rest\Internal\Parameter;

final class ParameterPathPart extends PathPartAbstract
{
    static function create(array $pathParameters, $parameterName, $operationId)
    {
        if (!isset($pathParameters[$parameterName])) {
            throw new PathParseException(
                'no path parameter \'' . $parameterName . '\' in \'' . $operationId . '\'',
                '');
        }
        return new ParameterPathPart($pathParameters[$parameterName]);
    }

    /**
     * @param Parameter $parameter
     */
    function __construct(Parameter $parameter)
    {
        $this->parameter = $parameter;
    }

    /**
     * @var Parameter
     */
    private $parameter;
}