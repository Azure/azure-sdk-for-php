<?php
namespace Microsoft\Rest\Internal\Swagger2;

use Microsoft\Rest\Internal\Data\DataAbstract;

/**
 * https://github.com/OAI/OpenAPI-Specification/blob/master/versions/2.0.md#pathItemObject
 */
class PathItemObject extends DataAbstract
{
    /**
     * @return OperationObject[]
     */
    function children()
    {
        return $this->getChildren(OperationObject::class);
    }
}