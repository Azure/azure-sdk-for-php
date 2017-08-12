<?php
namespace Microsoft\Rest\Internal\Swagger2;

use Microsoft\Rest\Internal\Data\DataAbstract;

/**
 * Class PathsObject
 * @package Microsoft\Rest\Internal\Swagger2
 * https://github.com/OAI/OpenAPI-Specification/blob/master/versions/2.0.md#pathsObject
 */
class PathsObject extends DataAbstract
{
    /**
     * @return PathItemObject[]
     */
    function children()
    {
        return $this->getChildren(PathItemObject::class);
    }
}