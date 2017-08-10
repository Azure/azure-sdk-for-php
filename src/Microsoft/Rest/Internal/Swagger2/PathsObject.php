<?php
namespace Microsoft\Rest\Internal\Swagger2;

use Microsoft\Rest\Internal\DataRef;

/**
 * https://github.com/OAI/OpenAPI-Specification/blob/master/versions/2.0.md#paths-object
 */
final class PathsObject extends DataRef
{
    /**
     * @return PathItemObject[]
     */
    function children()
    {
        return $this->getChildren(PathItemObject::class);
    }
}