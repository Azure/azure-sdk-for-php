<?php
namespace Microsoft\Rest\Internal\Swagger2;

use Microsoft\Rest\Internal\Data\DataAbstract;

/**
 * https://github.com/OAI/OpenAPI-Specification/blob/master/versions/2.0.md#operationObject
 */
class OperationObject extends DataAbstract
{
    function operationId()
    {
        return $this->getChildValue('operationId');
    }

    /**
     * @return ParametersObject
     */
    function parameters()
    {
        return $this->getChild('parameters', ParametersObject::class);
    }

    /**
     * @return ResponsesObject
     */
    function responses()
    {
        return $this->getChild('responses', ResponsesObject::class);
    }
}