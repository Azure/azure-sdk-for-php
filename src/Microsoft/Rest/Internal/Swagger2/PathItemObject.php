<?php
namespace Microsoft\Rest\Internal\Swagger2;

use Microsoft\Rest\Internal\DataRef;

/**
 * https://github.com/OAI/OpenAPI-Specification/blob/master/versions/2.0.md#pathItemObject
 */
final class PathItemObject extends DataRef
{
    /**
     * @return OperationObject[]
     */
    function children()
    {
        return $this->getChildren(OperationObject::class);
    }
}