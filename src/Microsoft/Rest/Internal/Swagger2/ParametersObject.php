<?php
namespace Microsoft\Rest\Internal\Swagger2;

use Microsoft\Rest\Internal\DataRef;

class ParametersObject extends DataRef
{
    /**
     * @return ParameterObject[]
     */
    function children()
    {
        return $this->getChildren(ParameterObject::class);
    }
}