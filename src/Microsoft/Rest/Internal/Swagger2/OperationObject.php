<?php
namespace Microsoft\Rest\Internal\Swagger2;

use Microsoft\Rest\Internal\DataRef;

/**
 * https://github.com/OAI/OpenAPI-Specification/blob/master/versions/2.0.md#operationObject
 */
class OperationObject extends DataRef
{
    /**
     * @return string
     */
    function operationId()
    {
        return $this->getChildValue('operationId');
    }

    /**
     * @return ParametersObject
     */
    function parameters()
    {
        return new ParametersObject($this, 'parameters');
    }
}